<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SchoolInfrastructure extends Controller
{
    // --- === School Infrastructure View Function === --- \\
    public function SchoolInfrastructureView(Request $req,$token)
    {
        $data = DB::table('p_schools')->select('school_token','school_id')->where('school_token', $token)->get();
        
        if (count($data) > 0) {
            $infrastructure = DB::table('p_schools__infrastructure')->where('school_id', $data[0]->school_id)->get();
                return view('Schools.SchoolInfrastructure',['data' => $infrastructure]);
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === School Infrastructure View Function === --- \\

    // --- === School Infrastructure Update Function === --- \\
    public function InfrastructureUpdate(Request $req)
    {
        if ($req->input('school_id') == "" && $req->input('school_id') == null) {
            $data = DB::table('p_schools__infrastructure')->insert([
                'school_id' => $req->session()->get('school_id'),
                'building_type' => $req->input('building_type'),
                'total_class_rooms' => $req->input('total_class_rooms'),
                'library' => $req->input('library'),
                'computer_lab' => $req->input('computer_lab'),
                'science_lab' => $req->input('science_lab'),
                'play_ground' => $req->input('play_ground'),
                'girls_toilet' => $req->input('girls_toilet'),
                'boys_toilet' => $req->input('boys_toilet'),
                'drinking_water' => $req->input('drinking_water'),
                'smart_class' => $req->input('smart_class'),
                'disable_friendly' => $req->input('disable_friendly'),
                'mealt' => $req->input('mealt'),
            ]);
            if ($data == 1) {
                return response()->json(['success' => true, 'message' => 'Infrastructure Details Store Successfully.']);
            }else {
                return response()->json(['success' => false, 'message' => 'Oops Somethinge Went Wronge.']);
            }
        }else {
            $data = DB::table('p_schools__infrastructure')
            ->where('school_id',$req->input('school_id'))
            ->update([
                'building_type' => $req->input('building_type'),
                'total_class_rooms' => $req->input('total_class_rooms'),
                'library' => $req->input('library'),
                'computer_lab' => $req->input('computer_lab'),
                'science_lab' => $req->input('science_lab'),
                'play_ground' => $req->input('play_ground'),
                'girls_toilet' => $req->input('girls_toilet'),
                'boys_toilet' => $req->input('boys_toilet'),
                'drinking_water' => $req->input('drinking_water'),
                'smart_class' => $req->input('smart_class'),
                'disable_friendly' => $req->input('disable_friendly'),
                'mealt' => $req->input('mealt'),
            ]);
            if ($data == 1) {
                return response()->json(['success' => true, 'message' => 'Infrastructure Details Updated Successfully.']);
            }else {
                return response()->json(['success' => false, 'message' => 'Oops Somethinge Went Wronge.']);
            }
        }
    }
    // --- === School Infrastructure Update Function === --- \\
}