<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\SponsorExport;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Sponsor;
use Excel;

class SponsorController extends Controller
{
    //view sponsor list page
    public function listSponsor() {
        
        $sponsor = Sponsor::where('deleted_at', NULL)->orderBy('study_year', 'DESC')->get();
        return view('admin.sponsor.all_sponsors', compact('sponsor'));
    }

    //view add sponsor form page
    public function addSponsor() {
        
        $sponsor = Sponsor::where('deleted_at', NULL)->where('is_active', '1')->orderBy('id', 'DESC')->get();
        return view('admin.sponsor.add_sponsor', compact('sponsor'));
    }

    //save new sponsor
    public function saveSponsor(Request $request) {
        
        $sponsor = new Sponsor;
        $sponsor->sponsor_name = $request->sponsor_name;
        $sponsor->drug_name = $request->drug_name;
        $sponsor->study_year = $request->study_year;
        $sponsor->study_revenue = $request->study_revenue;
        $sponsor->save();
        $route = $request->action == 'save_add_sponsor' ? 'admin.addSponsor' : 'admin.listSponsor';
        return redirect(route($route))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Sponsor added!',
                'message' => 'Sponsor added successfully.',
            ],
        ]);
    }

    //change status of sponsor
    public function changeStatusSponsor($id ) {
        
        $sponsor = Sponsor::where('id', $id)->first();
        if ($sponsor->is_active == '1') {

            $sponsor->is_active = 0;
            $sponsor->save();
            $arr = array('message' => 'Sponsor status: Inactive.', 'title' => 'Sponsor status!');
            echo json_encode($arr);
        } else {

            $sponsor->is_active = 1;
            $sponsor->save();
            $arr = array('message' => 'Sponsor status: Active.', 'title' => 'Sponsor status!');
            echo json_encode($arr);
        }
    }

    //download sponsor
    public function downloadSponsor() {
        
        return Excel::download(new SponsorExport, 'sponsors.xlsx');
    }

    //view edit page for sponsor
    public function editSponsor($id) {
        
        $sponsor = Sponsor::where('id', base64_decode($id))->first();
        return view('admin.sponsor.edit_sponsor', compact('sponsor'));
    }

    public function updateSponsor(Request $request) {
        
        $sponsor = Sponsor::where('id', $request->id)->first();
        $sponsor->sponsor_name = $request->sponsor_name;
        $sponsor->drug_name = $request->drug_name;
        $sponsor->study_year = $request->study_year;
        $sponsor->study_revenue = $request->study_revenue;
        $sponsor->save();
        return redirect(route('admin.listSponsor'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Sponsor updated!',
                'message' => 'Sponsor updated successfully.',
            ],
        ]);
    }

    public function deleteSponsor($id) {
        
        $sponsor = Sponsor::where('id', base64_decode($id))->delete();
        return redirect(route('admin.listSponsor'))->with('messages', [
            [
                'type' => 'success',
                'title' => 'Sponsor deleted!',
                'message' => 'Sponsor deleted successfully.',
            ],
        ]);
    }
}