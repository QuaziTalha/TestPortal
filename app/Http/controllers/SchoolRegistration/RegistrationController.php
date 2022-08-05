<?php

namespace App\Http\controllers\SchoolRegistration;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class RegistrationController extends Controller
{
    // --- ===  Registration Form View Funxtion === --- \\
    public function SchoolRegistration()
    {
        return view('SchoolRegistration.Registration');
    }
    // --- ===  Registration Form View Funxtion === --- \\

    // --- === School Register Function === --- \\
    public function SchoolRegister(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'school_name' => 'bail|required',
            'school_contact_number' => 'required|numeric|digits:10',
            'school_email' => 'required|email',
            'school_password' => 'required|min:4',
            'school_logo' => 'image|mimes:jpeg,png',
            'school_image' => 'image|mimes:jpeg,png',
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
        }

        // --- === Insert Base64 Images === --- \\

        // --- === Insert Values Into Data Base === --- \\
        $data = DB::table('p_schools')->insert([
            'school_name' => $req->input('school_name'),
            'udise_code' => $req->input('udise_code'),
            'school_address' => $req->input('school_address'),
            'school_contact_number' => $req->input('school_contact_number'),
            'school_email' => $req->input('school_email'),
            'school_password' => $req->input('school_password'),
            'school_slug' => $req->input('slug'),
            'school_logo' => $logo_name,
            'school_image' => $image_name,
            'school_token' => $token,
        ]);
        if ($data == 1) {
            $req->session()->put('school_name', $req->input('school_name'));
            $req->session()->put('school_logo', $logo_name);
            $req->session()->put('token', $token);
            $req->session()->save();
            return response()->json(['success' => true, 'message' => 'School registration successfully completed.', 'token' => $token]);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wronge.']);
        }
        // --- === Insert Values Into Data Base === --- \\
    }
    // --- === School Register Function === --- \\

    // --- === School Login Function === --- \\
    public function SchoolLogin(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'school_email' => 'bail|required|email',
            'school_password' => 'required|min:4',

        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        $school = DB::table('p_schools')
            ->select('p_schools.school_token', 'p_schools.school_name', 'p_schools.school_about', 'p_schools.school_logo','p_schools.school_id')
            ->where('school_email', $req->input('school_email'))
            ->where('school_password', $req->input('school_password'))
            ->get();

        if (count($school) > 0) {
            $data = $school[0];
            $req->session()->put('token', $data->school_token);
            $req->session()->put('school_id', $data->school_id);
            $req->session()->put('school_name', $data->school_name);
            $req->session()->put('school_about', $data->school_about);
            $req->session()->put('school_logo', $data->school_logo);
            $req->session()->put('school_logo', $data->school_logo);
            $req->session()->save();

            return response()->json(['success' => true, 'message' => 'Login successfull please wait for redirecting.', 'token' => $data->school_token]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credintials please check and retry..']);
        }
    }
    // --- === School Login Function === --- \\
}