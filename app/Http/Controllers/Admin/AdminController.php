<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\BudgetAmount;
use App\Models\AllocatedBudget;
use App\Models\Department;
use App\Models\DepartmentExpenditure;
use App\Models\Sponsor;
use Carbon\Carbon;
use Auth;
use Hash;
use DB;

class AdminController extends Controller
{
    
    //view dashboard
    public function home() {

        $empty = 1;
        $year = Carbon::now()->format('Y').' - '.substr(Carbon::now()->format('Y'), 2)+1;
        $rev = 0;
        $sponsor_year_count = 0;
        $sponsor = [];

        if(Sponsor::where('study_year', $year)->count() != NULL){

            //revenue graph
            $sponsor = Sponsor::where('study_year', $year)->where('is_active', '1')->get();
            $sponsor_year_count = $sponsor->count();
            $rev = 1;
        }

        if(BudgetAmount::where('deleted_at', NULL)->count('id') != NULL) {

            //expenditure pie chart
            $budget_id = BudgetAmount::where('year', $year)->first();
            $bud_pie = 1;

            if($budget_id != NULL){

                $dep = AllocatedBudget::where('budget_id', $budget_id->id)->with('dep', 'year')->get();
                $dep_count = $dep->count();
                $expenditure_count = DepartmentExpenditure::where('deleted_at', NULL)->where('budget_id', $budget_id->id)->count();
                
                //budget allocated
                $total_budget_amt_allocated = AllocatedBudget::where('budget_id', $budget_id->id)->sum('budget_allocated');
                $total_budget_amt_not_allocated = $budget_id->budget_allocated - $total_budget_amt_allocated;
            } else {

                $dep = [];
                $empty = 0;
                $dep_count = 0;
                $expenditure_count = DepartmentExpenditure::where('deleted_at', NULL)->count();
                $total_budget_amt_allocated = 0;
                $total_budget_amt_not_allocated = 0;
            }

            //budget amount
            $budget_amount = BudgetAmount::where('deleted_at', NULL)->orderBy('year', 'ASC')->get();
            $bud_count = $budget_amount->count();

            //detailed expenditure
            foreach ($budget_amount as $by) {

                $capex_sum[] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Capex')->sum('expense');
                $opex_sum[] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Opex')->sum('expense');
                $salary_sum[] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Salary')->sum('expense');
            }

            //revenue vs expenditure
            $revenue_year = BudgetAmount::where('deleted_at', NULL)->orderBy('year', 'DESC')->get();
            $k = 0;
            foreach ($revenue_year as $by) {

                $capex[$k] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Capex')->sum('expense');
                $opex[$k] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Opex')->sum('expense');
                $salary[$k] = DepartmentExpenditure::where('budget_id', $by->id)->where('expense_type', 'Salary')->sum('expense');
                $total_expense[$k] = $capex[$k] + $opex[$k] + $salary[$k];
                $k++;
            }

            foreach ($revenue_year as $rev_year) {
                
                $revenue_sum[] = Sponsor::where('study_year', $rev_year->year)->sum('study_revenue');
            }

            return view('admin.dashboard.dashboard', compact('dep', 'year', 'sponsor', 'sponsor_year_count', 'total_budget_amt_not_allocated', 'budget_id', 'budget_amount', 'bud_count', 'capex_sum', 'opex_sum', 'salary_sum', 'total_expense', 'revenue_sum', 'revenue_year', 'dep_count', 'empty', 'expenditure_count', 'bud_pie', 'rev'));
        } else {

            $empty = 0;
            $expenditure_count = 0;
            $dep_count = 0;
            $bud_pie = 0;
            $total_expense = [];
            return view('admin.dashboard.dashboard', compact('year', 'total_expense', 'empty', 'sponsor',  'sponsor_year_count', 'expenditure_count', 'dep_count', 'bud_pie', 'rev'));
        }
    }

    //view change password page
    public function changePassword() {
        
        return view('admin.profile.change_password');
    }

    //update password
    public function updatePassword(Request $request) {     

        if (!(Hash::check($request->oldpassword, Auth::guard('admin')->user()->password))){
            return redirect(route('admin.changePassword'))->with('messages', [
                [
                    'type' => 'error',
                    'title' => 'Try again!',
                    'message' => 'Current password incorrect.',
                ],
            ]);
        }

        if(strcmp($request->oldpassword, $request->newpassword) == 0) {

            return redirect(route('admin.changePassword'))->with('messages', [
                [
                    'type' => 'error',
                    'title' => 'Try again!',
                    'message' => 'New password cannot be the same as your current password.',
                ],
            ]);
        }

        $user = Auth::guard('admin')->user();
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return redirect(route('admin.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Password changed!',
                'message' => 'Password changed successfully.',
            ],
        ]);
    }

    //view edit profile page
    public function editProfile(){
        
        return view('admin.profile.edit_profile');
    }

    //update profile
    public function updateProfile(Request $request){

        $user = Auth::guard('admin')->user();
        $def_img = $user->image;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mob_num = $request->mob_num;
        $user->gender = $request->gender;
        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('ProfilePicture'), $image);
            // $request->image->storeAs('images', $image, 'public');
            Auth::guard('admin')->user()->update(['image'=>$image]);
        }
        $user->save();
        return redirect(route('admin.dashboard'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Profile updated!',
                'message' => 'Profile updated successfully.',
            ],
        ]);
    } 

    //Email Remote
    public function editProfileEmailExist(Request $request) {

        $emp = Admin::where('id', $request->id)->first();
        if($emp->email == $request->email){

            echo 'true';
        } else {
            $emp_email = Admin::where('email', $request->email)->first();
            if($emp_email != NULL){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
}