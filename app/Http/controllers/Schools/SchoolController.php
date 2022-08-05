<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class SchoolController extends Controller
{
    // --- === DashBoard View Function === --- \\
    public function School($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolDashboard');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === DashBoard View Function === --- \\

    // --- === Dashboard Edit Function === --- \\
    public function SchoolEdit($token)
    {
        $data = DB::table('p_schools')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolProfile', ['data' => $data[0]]);
        } else {
            return response()->json(['success' => false, 'message' => 'This school not found first register your school.']);
        }
    }
    // --- === Dashboard Edit Function === --- \\

    // --- === Dashboard Update Function === --- \\
    public function SchoolProfileUpdate(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'school_name' => 'bail|required',
            // 'syllabus_type' => 'required',
            // 'min_fees' => 'required|numeric',
            // 'max_fees' => 'required|numeric',
            // 'school_contact_number' => 'required|numeric|digits:10',
            // 'primary_mobile_number' => 'required|numeric|digits:10',
            // 'school_email' => 'required|email',
            // 'school_password' => 'required|min:4',
            // 'school_logo' => 'image|mimes:jpeg,png',
            // 'school_image' => 'image|mimes:jpeg,png',
        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        $token = uniqid();

        // --- === Insert Base64 Images === --- \\
        $logo_name = $image = $logo = $path = "";
        if ($req->input('school_logo') != "") {
            $logo = $req->input('school_logo');
            // ----- ========== ========= ----- \\
            $logo_parts = explode(";base64,", $logo);
            $logo_type = explode("image/", $logo_parts[0]);
            $image_type = $logo_type[1];
            $logo_name = 'school_logo_' . rand(1, 91898) . '.png';
            $logo = base64_decode($logo_parts[1]);
            file_put_contents(public_path('portal_images/school_logo/' . $logo_name), $logo);
            // ----- ========== ========= ----- \\
            if (file_exists('public/portal_images/school_logo/' . $req->input('old_logo'))) {
                unlink('public/portal_images/school_logo/' . $req->input('old_logo'));
            }
        } else {
            $logo_name = $req->input('old_logo');
        }

        if ($req->input('school_image') != "") {
            $image = $req->input('school_image');
            // ----- ========== ========= ----- \\
            $image_parts = explode(";base64,", $image);
            $image_type = explode("image/", $image_parts[0]);
            $image_file_type = $image_type[1];
            $image_name = 'school_image_' . rand(1, 91898) . '.png';
            $image = base64_decode($image_parts[1]);
            file_put_contents(public_path('portal_images/school_images/' . $image_name), $image);
            // ----- ========== ========= ----- \\

            if (file_exists('public/portal_images/school_images/' . $req->input('old_image'))) {
                unlink('public/portal_images/school_images/' . $req->input('old_image'));
            }
        } else {
            $image_name = $req->input('old_image');
        }

        // --- === Insert Base64 Images === --- \\

        // --- === Insert Values Into Data Base === --- \\
        $data = DB::table('p_schools')
            ->where('school_id', $req->input('school_id'))
            ->update([
                'school_name' => $req->input('school_name'),
                'school_type' => $req->input('school_type'),
                'syllabus_pattern' => $req->input('syllabus_pattern'),
                'school_medium' => $req->input('school_medium'),
                'management_type' => $req->input('management_type'),
                'stablisment_since' => $req->input('stablisment_since'),
                'udise_code' => $req->input('udise_code'),
                'min_fees' => $req->input('min_fees'),
                'max_fees' => $req->input('max_fees'),
                'school_location' => $req->input('school_location'),
                'school_address' => $req->input('school_address'),
                'school_latlng' => $req->input('school_latlng'),
                'school_contact_number' => $req->input('school_contact_number'),
                'primary_mobile_number' => $req->input('primary_mobile_number'),
                'school_whatsapp' => $req->input('school_whatsapp'),
                'secondary_mobile_number' => $req->input('secondary_mobile_number'),
                'school_about' => $req->input('school_about'),
                'school_email' => $req->input('school_email'),
                'school_website' => $req->input('school_website'),
                'school_password' => $req->input('school_password'),
                'total_teacher' => $req->input('total_teacher'),
                'school_slug' => $req->input('slug'),
                'school_logo' => $logo_name,
                'school_image' => $image_name,
            ]);
        if ($data == 1) {
            return response()->json(['success' => true, 'message' => 'School registration successfully completed.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wronge.']);
        }
        // --- === Insert Values Into Data Base === --- \\
    }
    // --- === Dashboard Update Function === --- \\
}
