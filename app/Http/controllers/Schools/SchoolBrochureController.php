<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class SchoolBrochureController extends Controller
{
    // --- === School Brochure View Function === --- \\
    public function SchoolBrochure($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolBrochure');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === School Brochure View Function === --- \\

    // --- === School Brochure List Function === --- \\
    public function SchoolBrochureList(Request $req)
    {
        $brochure = DB::table('p_schools__brochures')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        $data = json_encode($brochure);
        return $data;
    }
    // --- === School Brochure List Function === --- \\

    // --- === Brochure Store Function === --- \\
    public function BrochureStore(Request $req)
    {
        $data = DB::table('p_schools__brochures')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        if (count($data) > 0) {
            return response()->json(['success' => false, 'message' => 'You already have a brochure, delete it first.']);
        }

        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'brochure_title' => 'bail|required',
            'brochure_file' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        if ($req->hasfile('brochure_file')) {
            $Brochure_Name = 'brochure_' . mt_rand(100, 99999) . '.' . $req->file('brochure_file')->extension();
            $Brochure_File = $req->file('brochure_file')->move('public/portal_images/school_brochure/', $Brochure_Name);
        }

        $brochure = DB::table('p_schools__brochures')
            ->insert([
                'school_id' => $req->session()->get('school_id'),
                'brochure_title' => $req->input('brochure_title'),
                'brochure_file' => $Brochure_Name,
            ]);

        if ($brochure == 1) {
            return response()->json(['success' => true, 'message' => 'Brochure stored successfully']);
        } else {
            return response()->json(['success' => true, 'message' => 'Oops something went wronge.']);
        }
    }
    // --- === Brochure Store Function === --- \\

    // --- === Brochure Remove Function === --- \\
    public function BrochureRemove(Request $req)
    {
        if ($req->input('brochure_file') != "") {
            if (file_exists('public/portal_images/school_brochure/' . $req->input('brochure_file'))) {
                unlink('public/portal_images/school_brochure/' . $req->input('brochure_file'));
            }
        }
        DB::table('p_schools__brochures')->where('brochure_id', $req->input('brochure_id'))->delete();
    }
    // --- === Brochure Remove Function === --- \\
}
