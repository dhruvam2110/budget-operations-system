<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\BudgetAmountExport;
use Illuminate\Http\Response;
use App\Models\BudgetAmount;
use App\Models\AllocatedBudget;
use App\Models\DepartmentExpenditure;
use Illuminate\Http\Request;
use App\Models\Admin;
use Excel;
use Auth;
use Hash;
use DB;

class BudgetAmountController extends Controller
{
    
    //view budget amount list page
    public function listBudgetAmount(){
        
        $bud_amt = BudgetAmount::where('deleted_at', NULL)->orderBy('year', 'DESC')->get();
        return view('admin.budget_amount.all_budgetamount', compact('bud_amt'));
    }

    //view add budget amount form page
    public function addBudgetAmount(){

        return view('admin.budget_amount.add_budgetamount');
    }

    //save new budget amount
    public function saveBudgetAmount(Request $request){

        $bud_amt = new BudgetAmount;
        $bud_amt->year = $request->year;
        $bud_amt->budget_allocated = $request->budget_allocated;
        $bud_amt->save();
        $route = $request->action == "save_add_budget" ? 'admin.addBudgetAmount' : 'admin.listBudgetAmount';
        return redirect(route($route))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Budget allocated!',
                'message' => "Budget status of the financial year: $request->year saved.",
            ],
        ]);
    }

    //view edit budget amount form page
    public function editBudgetAmount($id){ 

        $bud = BudgetAmount::where('id', base64_decode($id))->first();
        return view('admin.budget_amount.edit_budgetamount', compact('bud'));
    }

    //update budget amount data
    public function updateBudgetAmount(Request $request){

        $bud_year = BudgetAmount::where('id', $request->id)->first();
        $bud_amt = BudgetAmount::where('id', $request->id)->first();
        $bud_amt->year = $request->year;
        $bud_amt->budget_allocated = $request->budget_allocated;
        $bud_amt->save();
        return redirect(route('admin.listBudgetAmount'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Allocated budget updated!',
                'message' => "Budget status of the financial year: $bud_year->year updated.",
            ],
        ]);
    }

    //soft delete budget amount
    public function deleteBudgetAmount($id){

        $bud_year = BudgetAmount::where('id', base64_decode($id))->first();
        $budget_allocated = AllocatedBudget::where('budget_id', $bud_year->id)->get();
        $expense = DepartmentExpenditure::where('budget_id', $bud_year->id)->get();
        $bud_amt = BudgetAmount::where('id', base64_decode($id))->delete();
        foreach ($budget_allocated as $bk => $bv) {
            
            $bv->delete();
        }
        foreach ($expense as $ek => $ev) {
            
            $ev->delete();
        }
        return redirect(route('admin.listBudgetAmount'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Allocated budget deleted!',
                'message' => "Budget status of the financial year: $bud_year->year deleted.",
            ],
        ]);
    }

    //change status of budget amount
    public function changeStatusBudgetAmount($id){
        
        $bud_year = BudgetAmount::where('id', $id)->first();
        $bud_amt = BudgetAmount::where('id', $id)->first();
        if ($bud_amt->is_active == '1') {

            $bud_amt->is_active = 0;
            $bud_amt->save();
            $arr = array('message' => "Budget status of the financial year $bud_year->year: Inactive.", 'title' => 'Budget amount status!');
            echo json_encode($arr);
        } else {

            $bud_amt->is_active = 1;
            $bud_amt->save();
            $arr = array('message' => "Budget status of the financial year $bud_year->year: Active.", 'title' => 'Budget amount status!');
            echo json_encode($arr);
        }
    }

    //download excel of budget amount
    public function downloadBudgetAmount() {

        return Excel::download(new BudgetAmountExport, 'BudgetAmount.xlsx');
    }

    //remote validation for add budget amount page
    public function addBudgetAmountYearExist(Request $request){

        $bud = BudgetAmount::where('year', $request->year)->first();
        if($bud != NULL){
            echo 'false';
        } else {
            echo 'true';
        }
    }

    //remote validation for edit budget amount page
    public function editBudgetAmountYearExist(Request $request){

        $bud = BudgetAmount::where('id', $request->id)->first();
        if($bud->year == $request->year){
            echo 'true';
        } else {
            $bud_amt = BudgetAmount::where('year', $request->year)->first();
            if($bud_amt != NULL){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    //edit allocated budget amount check remote
    public function editBudgetAmountCheck(Request $request){

        $allocation = AllocatedBudget::where('budget_id', $request->id)->where('deleted_at', NULL)->sum('budget_allocated');
        
        if($request->budget_allocated < $allocation){
            echo 'false';
        } else {
            echo 'true';
        }
    }
}