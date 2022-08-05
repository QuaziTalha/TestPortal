<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class FacilityController extends Controller
{
    // --- School Facilities View Function === --- \\
    public function SchoolFacilities($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolFacility');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- School Facilities View Function === --- \\

    // --- School Facilities List Function === --- \\
    public function FacilityList(Request $req)
    {
        $facility = DB::table('p_schools__facilities')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        $data = json_encode($facility);
        return $data;
    }
    // --- School Facilities List Function === --- \\

    // --- School Facilities Store Function === --- \\
    public function FacilityStore(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'facility_name' => 'bail|required',
            'facility_picture' => 'required|image|mimes:jpeg,png',

        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        // --- If image is exists --- \\
        if ($req->hasfile('facility_picture')) {
            $Image_Name = 'facility_image_' . mt_rand(100, 99999) . '.' . $req->file('facility_picture')->extension();
            $Image = $req->file('facility_picture')->move('public/portal_images/school_facility/', $Image_Name);
        }
        // --- If image is exists --- \\

        $facility = DB::table('p_schools__facilities')
            ->insert([
                'school_id' => $req->session()->get('school_id'),
                'facility_name' => $req->input('facility_name'),
                'facility_picture' => $Image_Name,
            ]);

        if ($facility == 1) {
            return response()->json(['success' => true, 'message' => 'Brochure stored successfully']);
        } else {
            return response()->json(['success' => true, 'message' => 'Oops something went wronge.']);
        }
    }
    // --- School Facilities Store Function === --- \\

    // --- School Facilities Remove Function === --- \\
    public function FacilityRemove(Request $req)
    {
        if ($req->input('facility_picture') != "") {
            if (file_exists('public/portal_images/school_facility/' . $req->input('facility_picture'))) {
                unlink('public/portal_images/school_facility/' . $req->input('facility_picture'));
            }
        }
        DB::table('p_schools__facilities')->where('facility_id', $req->input('facility_id'))->delete();
    }
    // --- School Facilities Remove Function === --- \\
}