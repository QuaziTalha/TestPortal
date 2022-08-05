<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class SchoolGalleryController extends Controller
{
    // --- === School Gallery View Function === --- \\
    public function SchoolGallery($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolGallery');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- === School Gallery View Function === --- \\

    // --- === School Gallery List Function === --- \\
    public function SchoolGalleryList(Request $req)
    {
        $brochure = DB::table('p_schools__gallery')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();

        $data = json_encode($brochure);
        return $data;
    }
    // --- === School Gallery List Function === --- \\

    // --- === School Gallery Store Function === --- \\
    public function GalleryStore(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'gallery_image' => 'bail|required|image|mimes:jpeg,png',

        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        if ($req->hasfile('gallery_image')) {
            $Image_Name = 'image_' . mt_rand(100, 99999) . '.' . $req->file('gallery_image')->extension();
            $Image = $req->file('gallery_image')->move('public/portal_images/school_gallery/', $Image_Name);
        }

        $gallery = DB::table('p_schools__gallery')
            ->insert([
                'school_id' => $req->session()->get('school_id'),
                'gallery_image' => $Image_Name,
            ]);

        if ($gallery == 1) {
            return response()->json(['success' => true, 'message' => 'Brochure stored successfully']);
        } else {
            return response()->json(['success' => true, 'message' => 'Oops something went wronge.']);
        }
    }
    // --- === School Gallery Store Function === --- \\

    // --- === School Gallery Remove Function === --- \\
    public function GalleryRemove(Request $req)
    {
        if ($req->input('gallery_image') != "") {
            if (file_exists('public/portal_images/school_gallery/' . $req->input('gallery_image'))) {
                unlink('public/portal_images/school_gallery/' . $req->input('gallery_image'));
            }
        }
        DB::table('p_schools__gallery')->where('gallery_id', $req->input('gallery_id'))->delete();
    }
    // --- === School Gallery Remove Function === --- \\
}