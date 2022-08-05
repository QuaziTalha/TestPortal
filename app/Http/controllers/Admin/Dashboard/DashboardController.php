<?php

namespace App\Http\controllers\Admin\Dashboard;

use App\Http\controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    // --- === Dashboard View Function === --- \\
    public function Dashboard()
    {
        $schools = DB::table('p_schools')->get();
        $schools->brochure = DB::table('p_schools__brochures')->get();
        $schools->courses = DB::table('p_schools__courses')->get();
        $schools->blogs = DB::table('p_schools__blogs')->get();
        $schools->merchandise = DB::table('p_schools__merchandise')->get();
        $schools->facility = DB::table('p_schools__facilities')->get();
        $schools->gallery = DB::table('p_schools__gallery')->get();
        $schools->eligibility = DB::table('p_schools__eligibilities')->get();
        $schools->infrastructure = DB::table('p_schools__infrastructure')->get();
        $schools->distinctcity = DB::table('p_schools')->select('school_city')->distinct()->get();
            // return count($schools->school_city);
        return view('Admin.Dashboard.Dashboard',['schools' => $schools]);
    }
    // --- === Dashboard View Function === --- \\
}
