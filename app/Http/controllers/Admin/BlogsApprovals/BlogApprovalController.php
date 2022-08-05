<?php

namespace App\Http\controllers\Admin\BlogsApprovals;

use App\Http\controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Validator;

class BlogApprovalController extends Controller
{
    //  --- === Blogs Approvals View Function === --- \\
    public function BlogsApprovals()
    {
        return view('Admin.BlogsApprovals.BlogsApproval');
    }
    //  --- === Blogs Approvals View Function === --- \\

    // --- === Get Blog List Data  === --- \\
    public function GetBlogList()
    {
        $data = DB::table('p_schools__blogs')
            ->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '
                <row style="display: inline-flex;">
                <button type="button" id="approve-btn" title="Approve" class="btn btn-icon rounded-pill btn-success approval-btn" onclick="Approve(' . $data->blog_id . ')"><i class="fa-solid fa-check"></i></button>

                <button type="button" title="View Detail" id="view-btn" onclick="Details(this)" class="btn btn-icon rounded-pill btn-primary approval-btn" data-title="'. $data->blog_title .'"  data-desc="'.htmlspecialchars($data->blog_description).'" data-date="'.$data->blog_date.'" data-image="'.$data->blog_image.'"><i class="fa-solid fa-eye"></i></button>

                <button type="button" id="disapprove-btn" title="Disapprove" class="btn btn-icon rounded-pill btn-danger approval-btn" onclick="DisapproveModal(' . $data->blog_id . ')"><i class="fa-solid fa-xmark"></i></button>
                </row>';
            })
            ->make(true);
    }
    // --- === Get Blog List Data  === --- \\

    // --- === Approve Blog Function === --- \\
    public function ApproveBlog(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'blog_id' => 'bail|required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        // --- === Updating Blog Status and Response  === --- \\
        $data = DB::table('p_schools__blogs')
            ->where('blog_id', $req->input('blog_id'))
            ->update([
                'blog_status' => '1'
            ]);
        if ($data == 1) {
            return response()->json(['success' => true, 'message' => "Blog status updated successfully"]);
        } else {
            return response()->json(['success' => false, 'message' => "Oops somethinge went wrong"]);
        }
        // --- === Updating Blog Status and Response  === --- \\
    }
    // --- === Approve Blog Function === --- \\

      // --- === Disapprove Blog Function === --- \\
      public function DisapproveBlog(Request $req)
      {
          // --- === Validation === --- \\
          $validator = Validator::make($req->all(), [
              'blog_id' => 'bail|required',
          ]);
          if (!$validator->passes()) {
              return response()->json(['success' => false, 'message' => $validator->errors()->all()]);
          }
          // --- === Validation === --- \\

          // --- === Updating Blog Status and Response  === --- \\
          $data = DB::table('p_schools__blogs')
              ->where('blog_id', $req->input('blog_id'))
              ->update([
                  'blog_status' => '2',
                  'blog_status_remark' => $req->input('blog_status_remark')
              ]);
          if ($data == 1) {
              return response()->json(['success' => true, 'message' => "Blog status updated successfully"]);
          } else {
              return response()->json(['success' => false, 'message' => "Oops somethinge went wrong"]);
          }
          // --- === Updating Blog Status and Response  === --- \\
      }
      // --- === Disapprove Blog Function === --- \\
}
