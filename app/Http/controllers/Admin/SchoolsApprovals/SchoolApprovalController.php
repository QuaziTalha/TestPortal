<?php

namespace App\Http\controllers\Admin\SchoolsApprovals;

use App\Http\controllers\Controller;
use DataTables;
use DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Session;

class SchoolApprovalController extends Controller
{
    //  --- === Schools Approvals View Function === --- \\
    public function SchoolsApprovals()
    {
        return view('Admin.SchoolsApprovals.SchoolApprovals');
    }
    //  --- === Schools Approvals View Function === --- \\

    //  --- === Schools Details View Function === --- \\

    public function SchoolDetails($school_token)
    {
        $schools = DB::table('p_schools')->where('p_schools.school_token', $school_token)->get();
        $row = '';
        foreach ($schools as $data) {
            $row = $data;
            $row->brochure = DB::table('p_schools__brochures')->where('school_id', $row->school_id)->get();
            $row->courses = DB::table('p_schools__courses')->where('school_id', $row->school_id)->get();
            $row->facility = DB::table('p_schools__facilities')->where('school_id', $row->school_id)->get();
            $row->gallery = DB::table('p_schools__gallery')->where('school_id', $row->school_id)->get();
            $row->eligibility = DB::table('p_schools__eligibilities')->where('school_id', $row->school_id)->get();
            $row->infrastructure = DB::table('p_schools__infrastructure')->where('school_id', $row->school_id)->get();
        };
        Session::put('school_token', $school_token);
        return view('Admin.SchoolsApprovals.SchoolDetails',  ['data' => $row]);
    }

    //  --- === Schools Details View Function === --- \\

    // --- === Get School List Data  === --- \\
    public function GetSchoolList()
    {
        $data = DB::table('p_schools')
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
                <row style="display: inline-flex;"><button type="button" id="approve-btn" class="btn btn-icon rounded-pill btn-success approval-btn" title="Approves" onclick="Approve(' . $data->school_id . ')"><i class="fa-solid fa-check"></i></button>

                <a href="' . url('Admin/SchoolDetails/' . $data->school_token) . '"><button type="button" title="View Detail" title="View Details" id="view-btn" class="btn btn-icon rounded-pill btn-primary approval-btn"><i class="fa fa-eye"></i></button></a>

                <button type="button" id="disapprove-btn" title="Disapprove" class="btn btn-icon rounded-pill btn-danger approval-btn" onclick="DisapproveModal(' . $data->school_id . ')"><i class="fa-solid fa-xmark"></i></button>
                </row>';
            })
            ->make(true);
    }
    // --- === Get School List Data  === --- \\

    // --- === Approve School Function === --- \\
    public function ApproveSchool(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'school_id' => 'bail|required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all(), 'info' => false]);
        }
        // --- === Validation === --- \\

        // --- === Check if Approved === --- \\
        $school = DB::table('p_schools')
            ->where('school_id', $req->input('school_id'))
            ->first();

            if ($school->school_status == 1) {
                return response()->json(['success' => false,'message' => "This school already is approved", 'info' => true]);
            }
        // --- === Check if Approved === --- \\

        // --- === Updating School Status and Response  === --- \\
        $data = DB::table('p_schools')
            ->where('school_id', $req->input('school_id'))
            ->update([
                'school_status' => 1
            ]);
        if ($data == 1) {
            return response()->json(['success' => true, 'message' => "School status updated successfully", 'info' => false]);
        } else {
            return response()->json(['success' => false, 'message' => "Oops somethinge went wrong", 'info' => false]);
        }
        // --- === Updating School Status and Response  === --- \\
    }
    // --- === Approve School Function === --- \\

    // --- === Disapprove School Function === --- \\
    public function DisapproveSchool(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'school_id' => 'bail|required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        // --- === Updating School Status and Response  === --- \\
        $data = DB::table('p_schools')
            ->where('school_id', $req->input('school_id'))
            ->update([
                'school_status' => '2',
                'school_status_remark' => $req->input('school_status_remark')
            ]);
        if ($data == 1) {
            return response()->json(['success' => true, 'message' => "School status updated successfully"]);
        } else {
            return response()->json(['success' => false, 'message' => "Oops somethinge went wrong"]);
        }
        // --- === Updating School Status and Response  === --- \\
    }
    // --- === Disapprove School Function === --- \\
}
