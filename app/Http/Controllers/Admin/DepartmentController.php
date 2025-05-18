<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\DepartmentExport;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Admin;
use App\Models\AllocatedBudget;
use App\Models\DepartmentExpenditure;
use Excel;
use Auth;
use Hash;
use DB;

class DepartmentController extends Controller
{

    //view department list page
    public function listDepartment() {

        $dep = Department::with('emp')->where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        return view('admin.department.all_departments', compact('dep'));
    }

    //view add department form page
    public function addDepartment() {

        $emp = Admin::where('deleted_at', NULL)->where('is_active', '1')->orderBy('id', 'DESC')->get();
        return view('admin.department.add_department', compact('emp'));
    }

    //save new department
    public function saveDepartment(Request $request) {

        $dep = new Department;
        $dep->dep_name = $request->dep_name;
        $dep->dep_code = $request->dep_code;
        $dep->emp_code = $request->dep_hod_code;
        $dep->save();
        $route = $request->action == 'save_add_department' ? 'admin.addDepartment' : 'admin.listDepartment';
        return redirect(route($route))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Department added!',
                'message' => 'Department added successfully.',
            ],
        ]);
    }

    //view edit department form page
    public function editDepartment($id) {

        $dep = Department::where('id', base64_decode($id))->first();
        $emp = Admin::where('deleted_at', NULL)->where('is_active', '1')->orderBy('id', 'DESC')->get();
        $hod_name = Admin::where('id', Department::where('id', base64_decode($id))->pluck('emp_code'))->first();
        return view('admin.department.edit_department', compact('emp', 'dep', 'hod_name'));
    }

    //update department data
    public function updateDepartment(Request $request) {

        $dep = Department::where('id', $request->id)->first();
        $dep->dep_name = $request->dep_name;
        $dep->dep_code = $request->dep_code;
        $dep->emp_code = $request->dep_hod_code;
        $dep->save();
        return redirect(route('admin.listDepartment'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Department updated!',
                'message' => 'Department updated successfully.',
            ],
        ]);
    }

    //soft delete department
    public function deleteDepartment($id) {

        $dep = Department::where('id', base64_decode($id))->delete();
        $budget = AllocatedBudget::where('dep_id', base64_decode($id))->get();
        foreach ($budget as $bk => $bv) {
            DepartmentExpenditure::where('dep_id', $bv->id)->delete();
            $bv->delete();
        }
        return redirect(route('admin.listDepartment'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Department deleted!',
                'message' => 'Department deleted successfully.',
            ],
        ]);
    }

    //change status of department
    public function changeStatusDepartment($id) {
        
        $dep = Department::where('id', $id)->first();
        if ($dep->is_active == '1') {

            $dep->is_active = 0;
            $dep->save();
            $arr = array('message' => 'Department status: Inactive.', 'title' => 'Department status!');
            echo json_encode($arr);
        } else {

            $dep->is_active = 1;
            $dep->save();
            $arr = array('message' => 'Department status: Active.', 'title' => 'Department status!');
            echo json_encode($arr);
        }
    }

    //download excel of department
    public function downloadDepartment() {   

        return Excel::download(new DepartmentExport, 'department.xlsx');
    }

    //remote validation for add department page
    public function addDepartmentNameExist(Request $request) {

        $dep = Department::where('dep_name', $request->dep_name)->first();

        if($dep != NULL) {

            echo 'false';
        } else {

            echo 'true';
        }
    }

    //remote validation for edit department page
    public function editDepartmentNameExist(Request $request) {

        $dep = Department::where('id', $request->id)->first();
        if($dep->dep_name == $request->dep_name) {

            echo 'true';
        } else {

            $dep_name = Department::where('dep_name', $request->dep_name)->first();
            if($dep_name != NULL){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function addDepartmentHodNameExist(Request $request) {

        $dep = Department::where('emp_code', $request->dep_hod_code)->first();

        if($dep != NULL) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function editDepartmentHodNameExist(Request $request) {

        $dep = Department::where('id', $request->id)->first();
        if($dep->emp_code == $request->dep_hod_code){

            echo 'true';
        } else {
            $dep_hod_exist = Department::where('emp_code', $request->dep_hod_code)->first();
            if($dep_hod_exist != NULL){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function addDepartmentCodeExist(Request $request) {

        $dep = Department::where('dep_code', $request->dep_code)->first();

        if($dep != NULL){
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function editDepartmentCodeExist(Request $request) {

        $dep = Department::where('id', $request->id)->first();
        if($dep->dep_code == $request->dep_code){

            echo 'true';
        } else {
            
            $dep_code = Department::where('dep_code', $request->dep_code)->first();
            if($dep_code != NULL){
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }
}