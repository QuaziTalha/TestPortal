<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class EligibilityController extends Controller
{
    // --- === School Eligibility View Function === --- \\
    public function SchoolEligibilities($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolEligibility');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === School Eligibility View Function === --- \\

    // --- === School Eligibility List Function === --- \\
    public function EligibilityList(Request $req)
    {
        $eligibity = DB::table('p_schools__eligibilities')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        $data = json_encode($eligibity);
        return $data;
    }
    // --- === School Eligibility List Function === --- \\

    // --- === School Eligibility Store Function === --- \\
    public function EligibilityStore(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'eligibity' => 'bail|required',
            'eligibity_value' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        if ($req->input('eligibity_id') == "" && $req->input('eligibity_id') == null) {
            $eligibity = DB::table('p_schools__eligibilities')->insert([
                'school_id' => $req->session()->get('school_id'),
                'eligibity' => $req->input('eligibity'),
                'eligibity_value' => $req->input('eligibity_value'),
            ]);
            if ($eligibity == 1) {
                return response()->json(['success' => true, 'message' => 'Eligibity stored successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Oops something went wronge.']);
            }
        } else {
            $eligibity = DB::table('p_schools__eligibilities')
                ->where('eligibity_id', $req->input('eligibity_id'))
                ->update([
                    'school_id' => $req->session()->get('school_id'),
                    'eligibity' => $req->input('eligibity'),
                    'eligibity_value' => $req->input('eligibity_value'),
                ]);
            if ($eligibity == 1) {
                return response()->json(['success' => true, 'message' => 'Eligibity update successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Oops something went wronge.']);
            }
        }
    }
    // --- === School Eligibility Store Function === --- \\

    // --- === School Eligibility Edit Function === --- \\
    public function EligibilityEdit(Request $req)
    {
        $eligibity = DB::table('p_schools__eligibilities')
            ->where('school_id', $req->session()->get('school_id'))
            ->where('eligibity_id', $req->input('eligibity_id'))
            ->get();

        return $eligibity;
    }
    // --- === School Eligibility Edit Function === --- \\

    // --- === School Eligibility Remove Function === --- \\
    public function EligibilityRemove(Request $req)
    {
        DB::table('p_schools__eligibilities')->where('eligibity_id', $req->input('eligibity_id'))->delete();
    }
    // --- === School Eligibility Remove Function === --- \\
}
