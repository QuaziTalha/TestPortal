<?php

namespace App\Http\controllers\Admin\Auth;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    // --- === Admin Login View === --- \\
    public function AdminLogin()
    {
        return view('Admin.Auth.Login');
    }
    // --- === Admin Login View === --- \\

    // --- === Admin Sign In Function === --- \\
    public function AdminSignIn(Request $req)
    {
        $admin = DB::table('p_schools__admin')
            ->where('admin_email', $req->input('admin_email'))
            ->where('admin_password', $req->input('admin_password'))
            ->get();

        if (count($admin) > 0) {
            $data = $admin[0];
            $req->session()->put('admin_id', $data->admin_id );
            $req->session()->put('admin_name', $data->admin_name);
            $req->session()->put('admin_email', $data->admin_email);
            $req->session()->put('admin_mobile', $data->admin_mobile);
            $req->session()->put('admin_password', $data->admin_password);
            $req->session()->save();

            return response()->json(['success' => true, 'message' => 'Login successfull please wait for redirecting.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credintials please check and retry..']);
        }
    }
    // --- === Admin Sign In Function === --- \\
    
    // --- === Admin Sign Out Function === --- \\
    public function AdminLogout(Request $req)
    {
        $req->session()->flush();
        $req->session()->regenerate();
        return redirect('AdminLogin');
    }
    // --- === Admin Sign Out Function === --- \\
}