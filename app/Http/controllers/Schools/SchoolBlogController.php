<?php

namespace App\Http\controllers\Schools;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;

class SchoolBlogController extends Controller
{
    // --- ===  School Blog View Function === --- \\
    public function SchoolBlog($token)
    {
        $data = DB::table('p_schools')->select('school_token')->where('school_token', $token)->get();

        if (count($data) > 0) {
            return view('Schools.SchoolBlog');
        } else {
            return view('Web.Home.404');
        }
    }
    // --- ===  School Blog View Function === --- \\

    // --- ===  Get Blog Function === --- \\
    public function GetBlogs(Request $req)
    {
        $blogs = DB::table('p_schools__blogs')
            ->where('school_id', $req->session()->get('school_id'))
            ->get();
        $data = json_encode($blogs);
        return $data;
    }
    // --- ===  Get Blog Function === --- \\

    // --- ===  School Blog Form View Function === --- \\
    public function SchoolBlogForm()
    {
        return view('Schools.SchoolBlogForm');
    }
    // --- ===  School Blog Form View Function === --- \\

    // --- ===  School Blog Store Function === --- \\
    public function SchoolBlogStore(Request $req)
    {

        // return $req->input();
        date_default_timezone_set("Asia/Kolkata");

        $date = date('d-m-Y');

        if ($req->input('blog_id') == null && $req->input('blog_id') == "") {
            if ($req->input('school_image') != "") {
                $image = $req->input('school_image');
                // ----- ========== ========= ----- \\
                $image_parts = explode(";base64,", $image);
                $image_type = explode("image/", $image_parts[0]);
                $image_file_type = $image_type[1];
                $image_name = 'blog_image_' . rand(1, 91898) . '.png';
                $image = base64_decode($image_parts[1]);
                file_put_contents(public_path('portal_images/blog_images/' . $image_name), $image);
                // ----- ========== ========= ----- \\
            }

            $data = DB::table('p_schools__blogs')->insert([
                'school_id' => $req->session()->get('school_id'),
                'blog_title' => $req->input('blog_title'),
                'blog_description' => $req->input('blog_description'),
                'blog_date' => $date,
                'blog_image' => $image_name,
            ]);

            if ($data == 1) {
                return response()->json(['success' => true, 'message' => "Blog created successfully"]);
            } else {
                return response()->json(['success' => false, 'message' => "Oops somethinge went wronge"]);
            }

        } else {
            if ($req->input('school_image') != "") {
                $image = $req->input('school_image');
                // ----- ========== ========= ----- \\
                $image_parts = explode(";base64,", $image);
                $image_type = explode("image/", $image_parts[0]);
                $image_file_type = $image_type[1];
                $image_name = 'blog_image_' . rand(1, 91898) . '.png';
                $image = base64_decode($image_parts[1]);
                file_put_contents(public_path('portal_images/blog_images/' . $image_name), $image);
                // ----- ========== ========= ----- \\

                if (file_exists('public/portal_images/blog_images/' . $req->input('old_image'))) {
                    unlink('public/portal_images/blog_images/' . $req->input('old_image'));
                }
            } else {
                $image_name = $req->input('old_image');
            }

            $data = DB::table('p_schools__blogs')
                ->where('blog_id', $req->input('blog_id'))
                ->update([
                    'school_id' => $req->session()->get('school_id'),
                    'blog_title' => $req->input('blog_title'),
                    'blog_description' => $req->input('blog_description'),
                    'blog_date' => $date,
                    'blog_image' => $image_name,
                ]);

            if ($data == 1) {
                return response()->json(['success' => true, 'message' => "Blog updated successfully"]);
            } else {
                return response()->json(['success' => false, 'message' => "Oops somethinge went wronge"]);
            }
        }
    }
    // --- ===  School Blog Store Function === --- \\

    // --- ===  School Blog Store Function === --- \\
    public function SchoolBlogEdit($blog_id)
    {
        $data = DB::table('p_schools__blogs')->where('blog_id', $blog_id)->get();
        return view('Schools.SchoolBlogForm', ['data' => $data[0]]);
    }
    // --- ===  School Blog Store Function === --- \\

    // --- ===  School Blog Remove Function === --- \\
    public function BlogRemove(Request $req)
    {
        if ($req->input('blog_image') != "" && $req->input('blog_image') != null) {
            if (file_exists('public/portal_images/blog_images/' . $req->input('blog_image'))) {
                unlink('public/portal_images/blog_images/' . $req->input('blog_image'));
            }
        }
        DB::table('p_schools__blogs')->where('blog_id', $req->input('blog_id'))->delete();
    }
    // --- ===  School Blog Remove Function === --- \\
}
