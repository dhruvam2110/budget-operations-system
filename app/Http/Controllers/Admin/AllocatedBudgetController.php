<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\AllocatedBudgetExport;
use Illuminate\Http\Response;
use App\Models\AllocatedBudget;
use App\Models\DepartmentExpenditure;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\BudgetAmount;
use Excel;
use Auth;
use Hash;
use DB;

class AllocatedBudgetController extends Controller
{
    
    //view allocated budget list page
    public function listAllocatedBudget($id) {

        $budget = AllocatedBudget::where('budget_id', base64_decode($id))->orderBy('id', 'DESC')->with('dep', 'year')->get();
        $dep = Department::where('is_active', 1)->orderBy('id', 'DESC')->get();
        $date = BudgetAmount::where('id', base64_decode($id))->first();

        return view('admin.allocated_budget.all_allocated_budget', compact('date', 'budget', 'dep'));
    }

    //edit allocated budget form
    public function editAllocatedBudget($id) {

        $bud = AllocatedBudget::with('dep', 'year')->where('id', $id)->first();
        $sum = AllocatedBudget::where('budget_id', $bud->budget_id)->sum('budget_allocated');
        $remaining = ($bud->year->budget_allocated - $sum) + $bud->budget_allocated;
        return response()->json(['department_details' => $bud, 'remaining_amount' => $remaining]);
    }

    //save and update new allocated budget
    public function saveAllocatedBudget(Request $request) { 

        if($request->id == NULL) {

            $bud = new AllocatedBudget;
            $bud->dep_id = $request->dep_id;
            $bud->budget_id = $request->year;
            $bud->budget_allocated = $request->budget_allocated;
            $bud->save();

            return redirect(route('admin.listAllocatedBudget', base64_encode($bud->budget_id)))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Budget allocated successfully!',
                    'message' => "You have successfully allocated the budget.",
                ],
            ]); 
            
        } else {

            $bud = AllocatedBudget::where('id', $request->id)->with('dep', 'year')->first();
            $bud->budget_allocated = $request->budget_allocated;
            $bud->save();

            $update = AllocatedBudget::where('id', $request->id)->first();
            $update->budget_used = DepartmentExpenditure::where('dep_id', $request->id)->sum('expense');
            $update->budget_remaining = $update->budget_allocated - DepartmentExpenditure::where('dep_id', $request->id)->sum('expense');
            $update->save();

            return redirect(route('admin.listAllocatedBudget', base64_encode($bud->budget_id)))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Alloted budget updated successfully!',
                    'message' => "You have successfully updated the allocated budget.",
                ],
            ]);
        }
    }

    //download excel of allocated budget
    public function downloadAllocatedBudget($id) {   

        return Excel::download(new AllocatedBudgetExport, 'AllocatedBudget- '.base64_decode($id).'.xlsx');
    }

    //add form remote validation
    public function addAllocatedAmountDepartmentExist(Request $request) {

        if($request->id == NULL) {

            $bud = AllocatedBudget::where('budget_id', $request->budget_year)->where('dep_id', $request->dep_id)->first();

            if($bud != NULL) {
                echo 'false';
            } else {
                echo 'true';
            }

        } else {

            $dep_budget = AllocatedBudget::where('id', $request->id)->first();
            if($dep_budget->dep_id == $request->dep_id){
                echo 'true';

            } else {

                $dep_budget_amt = AllocatedBudget::where('budget_id', $request->budget_year)->where('dep_id', $request->dep_id)->first();
                
                if($dep_budget_amt != NULL) {
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    //budget status switch
    public function changeStatusDepartmentBudgetAmount($id) {

        $bud_status = AllocatedBudget::where('id', $id)->first();
        if ($bud_status->is_active == '1') {

            $bud_status->is_active = 0;
            $bud_status->save();
            $arr = array('message' => "Budget allocated status: Inactive.", 'title' => 'Allocated Budget status!');
            echo json_encode($arr);
        } else {

            $bud_status->is_active = 1;
            $bud_status->save();
            $arr = array('message' => "Budget allocated status: Active.", 'title' => 'Allocated Budget status!');
            echo json_encode($arr);
        }
    }

    //delete budget
    public function deleteAllocatedBudget($id) { 

        $bud = AllocatedBudget::where('id', base64_decode($id))->first();
        $expense = DepartmentExpenditure::where('dep_id', $bud->id)->get();
        $bud_delete = AllocatedBudget::where('id', base64_decode($id))->delete();
        foreach ($expense as $ek => $ev) {
            $ev->delete();
        }
        return redirect(route('admin.listAllocatedBudget', base64_encode($bud->budget_id)))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Allocated budget deleted!',
                'message' => "You have successfully deleted the allocated budget.",
            ],
        ]);
    }

    //remaining allocated budget amount
    public function remainingAllocatedBudget($id) {

        $total_allocated = BudgetAmount::where('id', $id)->sum('budget_allocated');
        $sum = AllocatedBudget::where('budget_id', $id)->sum('budget_allocated');
        $remaining = $total_allocated - $sum;
        return response()->json($remaining);
    }

    //validation for allocated budget
    public function remainingAllocatedBudgetRemote(Request $request) {
        
        if($request->id == NULL)
        {

            if($request->budget_allocated > $request->budget_remaining){
                echo 'false';                
            } else {
                echo 'true';
            }
        } else {

            $allocation = DepartmentExpenditure::where('dep_id', $request->id)->where('deleted_at', NULL)->sum('expense');

            if($request->budget_allocated > $request->budget_remaining || $request->budget_allocated < $allocation){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
}