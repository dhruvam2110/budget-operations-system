<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\EmployeesExport;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Department;
use Auth;
use Hash;
use Excel;


class EmployeeController extends Controller
{

    //view employee list page
    public function listEmployee() {

        $employees = Admin::where('deleted_at', NULL)->orderBy('id', 'DESC')->get();
        return view('admin.employee.all_employees', compact('employees'));
    }

    //view add employee form page
    public function addEmployee() {

        return view('admin.employee.add_employee');
    }

    //save new employee
    public function saveEmployee(Request $request) {

        $employees = new Admin;
        $employees->name = $request->name;
        $employees->emp_code = $request->emp_code;
        $employees->email = $request->email;
        $employees->mob_num = $request->mob_num;
        $employees->gender = $request->gender;
        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('ProfilePicture'), $image);
            $employees->image = $image;
        }
        $employees->save();
        $route = $request->action == "save_add_employee" ? 'admin.addEmployee' : 'admin.listEmployee';
        return redirect(route($route))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Employee added!',
                'message' => 'Employee added successfully.',
            ],
        ]);
    }

    //view edit employee form page
    public function editEmployee($id){

        $employees = Admin::where('id', base64_decode($id))->first();
        return view('admin.employee.edit_employee', compact('employees'));
    }

    //update employee data
    public function updateEmployee(Request $request) {

        $employees = Admin::where('id', $request->id)->first();
        $employees->name = $request->name;
        $employees->emp_code = $request->emp_code;
        $employees->email = $request->email;
        $employees->mob_num = $request->mob_num;
        $employees->gender = $request->gender;
        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('ProfilePicture'), $image);
            $employees->image = $image;
        }
        $employees->save();

        return redirect(route('admin.listEmployee'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Employee updated!',
                'message' => 'Employee updated successfully.',
            ],
        ]);
    }

    //soft delete employee
    public function deleteEmployee($id) {

        $employees = Admin::where('id', base64_decode($id))->delete();
        return redirect(route('admin.listEmployee'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Employee deleted!',
                'message' => 'Employee deleted successfully.',
            ],
        ]);
    }   

    //change status of employee
    public function changeStatusEmployee($id) {
        
        $employees = Admin::where('id', $id)->first();
        if ($employees->is_active == '1') {

            $employees->is_active = 0;
            $employees->save();
            $arr = array('message' => 'Employee status: Inactive.', 'title' => 'Employee status!');
            echo json_encode($arr);
        } else {

            $employees->is_active = 1;
            $employees->save();
            $arr = array('message' => 'Employee status: Active.', 'title' => 'Employee status!');
            echo json_encode($arr);
        }
    }

    //download excel of employee
    public function downloadEmployee() { 

        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    //remote validation for employee code in add employee page
    public function addEmployeeCodeExist(Request $request) {

        $emp = Admin::where('emp_code', $request->emp_code)->first();

        if($emp != NULL) {

            echo 'false';
        } else {

            echo 'true';
        }
    }

    //remote validation for employee code in edit employee page
    public function editEmployeeCodeExist(Request $request){

        $emp = Admin::where('id', $request->id)->first();
        if($emp->emp_code == $request->emp_code){

            echo 'true';
        } else {

            $emp_code = Admin::where('emp_code', $request->emp_code)->first();
            if($emp_code != NULL){

                echo 'false';
            } else {

                echo 'true';
            }
        }
    }

    //remote validation for email in add employee page
    public function addEmployeeEmailExist(Request $request){

        $email = $request->email;
        $emp = Admin::where('email', $email)->first();

        if($emp != NULL){

            echo 'false';
        } else {

            echo 'true';
        }
    }

    //remote validation for email in edit employee page
    public function editEmployeeEmailExist(Request $request){

        $emp = Admin::where('id', $request->id)->first();
        $email = $request->email;
        if($emp->email == $email){

            echo 'true';
        } else {

            $emp_email = Admin::where('email', $email)->first();
            if($emp_email != NULL){

                echo 'false';
            } else {
                
                echo 'true';
            }
        }
    }
}