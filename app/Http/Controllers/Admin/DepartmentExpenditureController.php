<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\DepartmentExpenditureExport;
use Illuminate\Http\Response;
use App\Models\DepartmentExpenditure;
use App\Models\AllocatedBudget;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\BudgetAmount;
use Excel;
use Auth;
use Hash;
use DB;

class DepartmentExpenditureController extends Controller
{
    
    //list department expenditure
    public function listDepartmentExpenditure(Request $request, $id) {

        $exp_details = DepartmentExpenditure::where('dep_id', base64_decode($id))->orderBy('id', 'DESC')->with('bud')->get();
        $dep_details = AllocatedBudget::where('id', base64_decode($id))->with('dep', 'year')->first();
        $reset = 0;
        $filter = $request->expense_type_filter;
        if($filter != NULL) {

            $reset = 1;
            $exp_details = $exp_details->where('expense_type', $filter);
        }
        return view('admin.department_expenditure.all_department_expenditure', compact('exp_details', 'dep_details', 'filter', 'reset'));
    }

    //remaining budget
    public function remainingBudget($id) {

        $total_allocated = AllocatedBudget::where('id', $id)->first();
        $budget_used = DepartmentExpenditure::where('dep_id', $id)->sum('expense');
        $remaining = $total_allocated->budget_allocated - $budget_used;
        return response()->json($remaining);
    }

    //save expense
    public function saveDepartmentExpense(Request $request) {

        if($request->id == NULL) {

            $exp = new DepartmentExpenditure;
            $exp->budget_id = $request->budget_id;
            $exp->dep_id = $request->dep_id;
            $exp->expense_type = $request->expense_type;
            $exp->item_name = $request->item_name;
            $exp->quantity = $request->quantity;
            $exp->price_per_quantity = $request->price_per_quantity;
            $exp->service_name = $request->service_name;
            $exp->service_start_date = $request->start_date;
            $exp->service_end_date = $request->end_date;
            $exp->remarks = $request->remarks;
            $exp->month = $request->month;
            $price = $request->quantity * $request->price_per_quantity;
            if($request->expense_type == 'Capex') {

                $exp->expense = $price;
            } elseif($request->expense_type == 'Opex') {

                $exp->expense = $request->opex_expense;
            } else {

                $exp->expense = $request->salary_expense;
            }
            $exp->save();

            $update = AllocatedBudget::where('id', $request->dep_id)->first();
            $update->budget_used = DepartmentExpenditure::where('dep_id', $request->dep_id)->sum('expense');
            $update->budget_remaining = $update->budget_allocated - DepartmentExpenditure::where('dep_id', $request->dep_id)->sum('expense');
            $update->save();

            return redirect(route('admin.listDepartmentExpenditure', base64_encode($exp->dep_id)))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Expense added successfully!',
                    'message' => "You have successfully added the expense.",
                ],
            ]);
        } else {

            $bud = DepartmentExpenditure::where('id', $request->id)->first();
            if($bud->expense_type == "Capex") {

                $bud->item_name = $request->item_name;
                $bud->quantity = $request->quantity;
                $bud->price_per_quantity = $request->price_per_quantity;
                $price = $request->quantity * $request->price_per_quantity;
                $bud->expense = $price;
            } else if($bud->expense_type == "Opex") {

                $bud->service_name = $request->service_name;
                $bud->service_start_date = $request->start_date;
                $bud->service_end_date = $request->end_date;
                $bud->remarks = $request->remarks;
                $bud->expense = $request->opex_expense;
            } else {

                $bud->month = $request->month;
                $bud->expense = $request->salary_expense;             
            }
            $bud->budget_id = $request->budget_id;
            $bud->save();

            $update = AllocatedBudget::where('id', $request->dep_id)->first();
            $update->budget_used = DepartmentExpenditure::where('dep_id', $request->dep_id)->sum('expense');
            $update->budget_remaining = $update->budget_allocated - DepartmentExpenditure::where('dep_id', $request->dep_id)->sum('expense');
            $update->save();

            return redirect(route('admin.listDepartmentExpenditure', base64_encode($bud->dep_id)))->with('messages', [
                [
                    'type' => 'success',
                    'title' => 'Expense edited successfully!',
                    'message' => "You have successfully edited the expense.",
                ],
            ]);
        }
    }

    //edit department expenditure
    public function editDepartmentExpense($id) {

        $expense = DepartmentExpenditure::where('id', $id)->with('bud')->first();
        $used = DepartmentExpenditure::where('dep_id', $expense->dep_id)->sum('expense');
        $remaining = ($expense->bud->budget_allocated - $used) + $expense->expense;
        return response()->json(['expense_details' => $expense, 'remaining_amount' => $remaining]);
    }

    //expense status switch
    public function changeStatusExpense($id) {

        $exp_status = DepartmentExpenditure::where('id', $id)->first();
        $amount = $exp_status->expense;
        $update = AllocatedBudget::where('id', $exp_status->dep_id)->first();

        if ($exp_status->is_active == '1') {

            $exp_status->is_active = 0;
            $exp_status->save();
            $update->budget_used = $update->budget_used - $amount;
            $update->budget_remaining = $update->budget_remaining + $amount;
            $update->save();
            $arr = array('message' => "Expense status: Inactive.", 'title' => 'Expense status!');
            echo json_encode($arr);
        } else {

            $exp_status->is_active = 1;
            $exp_status->save();
            $update->budget_used = $update->budget_used + $amount;
            $update->budget_remaining = $update->budget_remaining - $amount;
            $update->save();
            $arr = array('message' => "Expense status: Active.", 'title' => 'Expense status!');
            echo json_encode($arr);
        }
    }

    //delete department expense
    public function deleteExpense($id) {

        $exp = DepartmentExpenditure::where('id', base64_decode($id))->first();
        $exp_delete = DepartmentExpenditure::where('id', base64_decode($id))->delete();

        $update = AllocatedBudget::where('id', $exp->dep_id)->first();
        $update->budget_used = DepartmentExpenditure::where('dep_id', $exp->dep_id)->sum('expense');
        $update->budget_remaining = $update->budget_allocated - DepartmentExpenditure::where('dep_id', $exp->dep_id)->sum('expense');
        $update->save();

        return redirect(route('admin.listDepartmentExpenditure', base64_encode($exp->dep_id)))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Expense deleted!',
                'message' => "You have successfully deleted the expense.",
            ],
        ]);
    }

    //excel
    public function downloadDepartmentExpenditure($id) {

        return Excel::download(new DepartmentExpenditureExport, 'DepartmentExpense- '.base64_decode($id).'.xlsx');
    }

    //salary exist remote validation
    public function salaryExistDepartmentExpenditure(Request $request) {

        if($request->id == NULL) {
            $month = DepartmentExpenditure::where('dep_id', $request->dep_id)->where('month', $request->month)->first();

            if($month != NULL) {
                echo 'false';
            } else {
                echo 'true';
            }

        } else {
            $month = DepartmentExpenditure::where('id', $request->id)->first();

            if($month->month == $request->month){

                echo 'true';
            } else {

                $salary_expense = DepartmentExpenditure::where('dep_id', $request->dep_id)->where('month', $request->month)->first();
                if($salary_expense != NULL){
                    echo 'false';
                } else {
                    echo 'true';
                }
            }
        }
    }

    //form expense not increase remaining budget amount remote
    public function expenseExceedsRemainingDepartmentExpenditure(Request $request) {

        $total_allocated = AllocatedBudget::where('id', $request->dep_id)->first();
        $budget_used = DepartmentExpenditure::where('dep_id', $request->dep_id)->sum('expense');
        $remaining = $total_allocated->budget_allocated - $budget_used;
        if($request->expense_type == 'Opex') {

            if($request->opex_expense > $remaining) {

                echo 'false';
            } else {
                echo 'true';
            }
        } else if($request->expense_type == 'Capex'){

            if($request->expense > $remaining){

                echo 'false';
            } else {
                echo 'true';
            }
        } else {

            if($request->salary_expense > $remaining){

                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
}