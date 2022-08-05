<?php

namespace App\Http\controllers\Admin\Scholarships;

use App\Http\controllers\Controller;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Illuminate\Support\Facades\Storage;

class ScholarshipsController extends Controller
{
    //  --- === Scholarships View Function === --- \\
    public function Scholarships()
    {
        return view('Admin.Scholarships.Scholarships');
    }
    //  --- === Scholarships View Function === --- \\

    // --- === Scholarship List Function === --- \\
    public function GetScholarshipList()
    {
        $data = DB::table('p_schools__scholarships')
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
                <row style="display: inline-flex;">
                <button type="button" id="edit-btn" title="Edit" class="btn btn-icon rounded-pill btn-success approval-btn" onclick="InsertModal(this)" data-id="'.$data->scholarship_id.'" data-name="'.$data->scholarship_name.'" data-desc="'.$data->scholarship_desc.'"><i class="fa-solid fa-pencil"></i></button>

                <button type="button" title="View Detail" id="view-btn" onclick="Details(this)" class="btn btn-icon rounded-pill btn-primary approval-btn" data-title="'. $data->scholarship_name .'"  data-desc="'.$data->scholarship_desc.'" data-image="'.$data->scholarship_file.'"><i class="fa-solid fa-eye"></i></button>

                <button type="button" id="delete-btn" title="Delete" class="btn btn-icon rounded-pill btn-danger approval-btn" onclick="DeleteScholarship(this)" data-id="'.$data->scholarship_id.'"><i class="fa-solid fa-trash"></i></button></row>';
            })
            ->make(true);
    }
// --- === Scholarship List Function === --- \\

    // --- ===Scholarship Store and Update Function === --- \\
    public function ScholarshipStore(Request $req)
    {
        /* Defining Values */
        $scholarship_id = $req->input('scholarship_id');
        $scholarship_name = $req->input('scholarship_name');
        $scholarship_desc = $req->input('scholarship_desc');
        $file = $req->file('scholarship_file');

        /* Defining Values */


        /* Inserting New Entry If scholarship_id is not Provided */
        if ($scholarship_id == null && $scholarship_id == "") {

            /* Error Handling for File */
            if ($req->hasfile('scholarship_file')) {
                $file_name = 'scholarship_file_' . rand(1, 91898) .'.'.  $req->file('scholarship_file')->extension();
                $file->move('public/portal_images/scholarship_files/',$file_name);
            } else {
                return response()->json(['success' => false, 'message' => 'An Error Occurred while moving File.']);
            }
            /* Error Handling for File */

            /* Insert Query and Response */
            $insert = DB::table('p_schools__scholarships')->insert([
                'scholarship_name' => $scholarship_name,
                'scholarship_desc' => $scholarship_desc,
                'scholarship_file' => $file_name,
            ]);
            if ($insert == 1) {
                return response()->json(['success' => true, 'message' => "Scholarship created successfully"]);
            } else {
                return response()->json(['success' => false, 'message' => "Oops somethinge went wrong"]);
            }
            /* Insert Query and Response */
        }
        /* Inserting New Entry If scholarship_id is not Provided */

        /* Else Updating Entry with Provided scholarship_id */
        else {
            /* Fetching Data From Existing Entry */
            $data = DB::table('p_schools__scholarships')->where('scholarship_id', $scholarship_id)->first();
            /* Fetching Data From Existing Entry */

            /* Deleting Existing File and putting new File If Provided */
            if ($req->hasfile('scholarship_file')) {
                $file_name = 'scholarship_file_' . rand(1, 91898) .'.'.  $req->file('scholarship_file')->extension();
                $file->move('public/portal_images/scholarship_files/',$file_name);
                if ($data->scholarship_file != "" && $data->scholarship_file != null) {
                    /* Deleting Previous File */
                    if (file_exists("public/portal_images/scholarship_files" . $data->scholarship_file)) {
                        unlink("public/portal_images/scholarship_images/" . $data->scholarship_file);
                    } else {
                        error_log($data->scholarship_file . " file does not exist");//If Previous File is Somehow Deleted Only make an error log.
                    }
                    /* Deleting Previous File */
                }
            }
            /* Deleting Existing File and putting new File If Provided */

            /* Else just Set image_name to the previous value in DB */
            else {
                $file_name = $data->scholarship_file;
            }
            /* Else just Set image_name to the previous value in DB */

            /* Update Query and Reponse */
            $data = DB::table('p_schools__scholarships')
            ->where('scholarship_id', "=" ,$scholarship_id)
                ->update([
                    'scholarship_name' => $scholarship_name,
                    'scholarship_desc' => $scholarship_desc,
                    'scholarship_file' => $file_name,
                ]);
            if ($data == 1) {
                return response()->json(['success' => true, 'message' => "Scholarship updated successfully"]);
            } else {
                return response()->json(['success' => false, 'message' => "Oops somethinge went wrong", 'error' => $data]);
            }
            /* Update Query and Reponse */
        }
        /* Else Updating Entry with Provided scholarship_id */
    }
// --- ===Scholarship Store and Update Function === --- \\

// --- ===Scholarship Delete Function === --- \\
public function ScholarshipDelete(Request $req)
{
    $data = DB::table('p_schools__scholarships')->where('scholarship_id', $req->input('scholarship_id'))->first();
    if ($data->scholarships_file != "" && $data->scholarships_file != null) {
        if (file_exists('public/portal_images/scholarships_images/' . $data->scholarships_file)) {
            unlink('public/portal_images/scholarships_images/' . $data->scholarships_file);
        }
    }
    $delete = DB::table('p_schools__scholarships')->where('scholarship_id', $req->input('scholarship_id'))->delete();
    if ($delete == 1) {
        return response()->json(['success' => true, 'message' => "Scholarship deleted successfully"]);
    } else {
        return response()->json(['success' => false, 'message' => "Oops somethinge went wrong"]);
    }
}
// --- ===Scholarship Delete Function === --- \\
}
