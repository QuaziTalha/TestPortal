<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class SchoolCourseController extends Controller
{
    // --- === School Course View Function === --- \\
    public function SchoolCourse($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolCourse');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === School Course View Function === --- \\

    // --- === School Course List Function === --- \\
    public function CourseList(Request $req)
    {
        $brochure = DB::table('p_schools__courses')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        $data = json_encode($brochure);
        return $data;
    }
    // --- === School Course List Function === --- \\

    // --- === School Course Store Function === --- \\
    public function CourseStore(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'course_name' => 'bail|required',
            'course_fees' => 'required',

        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        if ($req->input('course_id') == "" && $req->input('course_id') == null) {
            $data = DB::table('p_schools__courses')->insert([
                'school_id' => $req->session()->get('school_id'),
                'course_name' => $req->input('course_name'),
                'course_fees' => $req->input('course_fees'),
            ]);

            if ($data == 1) {
                return response()->json(['success' => true, 'message' => 'Course stored successfully']);
            } else {
                return response()->json(['success' => true, 'message' => 'Oops something went wronge.']);
            }
        } else {
            $data = DB::table('p_schools__courses')->where('course_id', $req->input('course_id'))->update([
                'school_id' => $req->session()->get('school_id'),
                'course_name' => $req->input('course_name'),
                'course_fees' => $req->input('course_fees'),
            ]);

            if ($data == 1) {
                return response()->json(['success' => true, 'message' => 'Course updated successfully']);
            } else {
                return response()->json(['success' => true, 'message' => 'Oops something went wronge.']);
            }
        }
    }
    // --- === School Course Store Function === --- \\

    // --- === School Course Edit Function === --- \\
    public function CourseEdit(Request $req)
    {
        $data = DB::table('p_schools__courses')->where('course_id', $req->input('course_id'))->get();
        return $data[0];
    }
    // --- === School Course Edit Function === --- \\

    // --- === School Course Remove Function === --- \\
    public function CourseRemove(Request $req)
    {
        $data= DB::table('p_schools__courses')->where('course_id',$req->input('course_id'))->delete();
    }
    // --- === School Course Remove Function === --- \\
}
