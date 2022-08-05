<?php

namespace App\Http\controllers\Auth;

use App\Http\controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Validator;

class AccountsController extends Controller
{
    // --- === User Registration === --- \\
    public function UserRegister(Request $req)
    {

        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'user_name' => 'bail|required',
            'user_email' => 'required|email',
            'user_password' => 'required|min:4',
            'user_mobile' => 'required|numeric|digits:10',
        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }

        // --- === Validation === --- \\

        $UserExist = DB::table('portal_users')
            ->where('user_email', $req->input('user_email'))
            ->orWhere('user_mobile', $req->input('user_mobile'))
            ->orWhere('user_name', $req->input('user_name'))
            ->get();
        if (count($UserExist) > 0) {
            return response()->json(['success' => false, 'message' => 'This user already exists.try to Login.']);

        };
        $data = DB::table('portal_users')->insertGetId([
            'user_name' => $req->input('user_name'),
            'user_email' => $req->input('user_email'),
            'user_password' => $req->input('user_password'),
            'user_mobile' => $req->input('user_mobile'),
        ]);

        if ($data != 0) {
            $req->session()->put('user_id', $data);
            $req->session()->put('user_name', $req->input('user_name'));
            $req->session()->put('user_email', $req->input('user_email'));
            $req->session()->put('user_password', $req->input('user_password'));
            $req->session()->save();
            return response()->json(['success' => true, 'message' => 'Registration stored successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Oops something went wronge.']);
        }

    }
    // --- === User Registration === --- \\

    // --- === User Login === --- \\
    public function UserLogin(Request $req)
    {
        // --- === Validation === --- \\
        $validator = Validator::make($req->all(), [
            'user_password' => 'bail|required',
            'user_mobile' => 'required|numeric|digits:10',
        ]);
        if (!$validator->passes()) {
            return response()->json(['validate' => true, 'message' => $validator->errors()->all()]);
        }
        // --- === Validation === --- \\

        $data = DB::table('portal_users')
            ->where('user_mobile', $req->input('user_mobile'))
            ->where('user_password', $req->input('user_password'))
            ->get();

        if (count($data) > 0) {

            $data = $data[0];
            $req->session()->put('user_id', $data->user_id);
            $req->session()->put('user_name', $data->user_name);
            $req->session()->put('user_email', $data->user_email);
            $req->session()->put('user_password', $data->user_password);
            $req->session()->save();
            return response()->json(['success' => true, 'message' => 'Login successfull wait..']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid credentials please try again.']);

        }
    }
    // --- === User Login === --- \\

    // --- === User Logout Function === --- \\
    public function UserLogout(Request $req)
    {
        $req->session()->flush();
        $req->session()->regenerate();
        return redirect('/');
    }
    // --- === User Logout Function === --- \\
}