<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// --- === All Controller === --- \\
use App\Http\controllers\SchoolRegistration\RegistrationController;
use App\Http\controllers\Schools\EligibilityController;
use App\Http\controllers\Schools\FacilityController;
use App\Http\controllers\Schools\SchoolBrochureController;
use App\Http\controllers\Schools\SchoolController;
use App\Http\controllers\Schools\SchoolCourseController;
use App\Http\controllers\Schools\SchoolGalleryController;
use App\Http\controllers\Schools\SchoolInfrastructure;
use App\Http\controllers\Schools\SchoolBlogController;
use App\Http\controllers\Auth\AccountsController;
use App\Http\controllers\Website\HomeController;


// ---- === Admin Controller === ---\\
use App\Http\controllers\Admin\Auth\AdminAuthController;
use App\Http\controllers\Admin\Dashboard\DashboardController;
use App\Http\controllers\Admin\Merchandise\MerchandiseController;
use App\Http\controllers\Admin\Scholarships\ScholarshipsController;
use App\Http\controllers\Admin\SchoolsApprovals\SchoolApprovalController;
use App\Http\controllers\Admin\BlogsApprovals\BlogApprovalController;
// ---- === Admin Controller === ---\\

// --- === All Controller === --- \\

// --- === Globale Function For All Routes === --- \\
View::composer(['*'], function ($view) {
    $total_count = DB::table('p_schools')->where('p_schools.school_token', Session::get('token'))->get();
    $blogs = DB::table('p_schools__blogs')->orderBy('blog_id', 'desc')->get();
    $row = '';
        foreach ($total_count as $data) {
            $row = $data;
            $row->brochure = DB::table('p_schools__brochures')->where('school_id', $row->school_id)->get();
            $row->courses = DB::table('p_schools__courses')->where('school_id', $row->school_id)->get();
            $row->facility = DB::table('p_schools__facilities')->where('school_id', $row->school_id)->get();
            $row->gallery = DB::table('p_schools__gallery')->where('school_id', $row->school_id)->get();
            $row->eligibility = DB::table('p_schools__eligibilities')->where('school_id', $row->school_id)->get();
        }

    $view->with(['count_data' => $row, 'blogs' => $blogs]);
});
// --- === Globale Function For All Routes === --- \\

// --- === Website Routes === --- \\
Route::get('/', [HomeController::class, 'Home']);
Route::get('/AboutUs', [HomeController::class, 'AboutUs']);
Route::get('SchoolDetail/{school_slug}', [HomeController::class, 'SchoolDetail']);
Route::get('SchoolSearch', [HomeController::class, 'SchoolSearch']);
Route::get('AllSchoolList', [HomeController::class, 'AllSchoolList']);
Route::get('AllBlogs', [HomeController::class, 'AllBlogs']);
Route::get('BlogDetail/{blog_id}', [HomeController::class, 'BlogDetail']);
Route::get('AllMerchandise', [HomeController::class, 'AllMerchandise']);
Route::get('MerchandiseDetail/{merchandise_id}', [HomeController::class, 'MerchandiseDetail']);
Route::get('AllScholarship', [HomeController::class, 'AllScholarship']);
Route::get('ScholarshipDetail/{scholarship_id}', [HomeController::class, 'ScholarshipDetail']);
Route::get('ProfileProgress', [HomeController::class, 'ProfileProgress']);
// --- === Website Routes === --- \\

Route::post('UserLogin', [AccountsController::class, 'UserLogin']);
Route::post('UserRegister', [AccountsController::class, 'UserRegister']);
Route::get('UserLogout', [AccountsController::class, 'UserLogout']);

// --- === School Registration Form === --- \\
Route::get('SchoolRegistration', [RegistrationController::class, 'SchoolRegistration']);
Route::post('SchoolRegister', [RegistrationController::class, 'SchoolRegister']);
Route::post('SchoolLogin', [RegistrationController::class, 'SchoolLogin']);
// --- === School Registration Form === --- \\

// --- === School Profiles Routes Start === --- \\
Route::group(['prefix' => 'Schools', 'middleware' => 'UserMiddleware'], function () {
    Route::get('SchoolProfile/{token}', [SchoolController::class, 'School']);
    Route::get('SchoolProfileEdit/{token}', [SchoolController::class, 'SchoolEdit']);
    Route::post('SchoolProfileUpdate', [SchoolController::class, 'SchoolProfileUpdate'])->name('SchoolProfileUpdate');
    // --- === School Brochure === --- \\
    Route::get('SchoolBrochure/{token}', [SchoolBrochureController::class, 'SchoolBrochure']);
    Route::get('SchoolBrochureList', [SchoolBrochureController::class, 'SchoolBrochureList'])->name('SchoolBrochureList');
    Route::post('BrochureStore', [SchoolBrochureController::class, 'BrochureStore'])->name('BrochureStore');
    Route::get('BrochureRemove', [SchoolBrochureController::class, 'BrochureRemove'])->name('BrochureRemove');
    // --- === School Brochure === --- \\

    // --- === School Course === --- \\
    Route::get('SchoolCourse/{token}', [SchoolCourseController::class, 'SchoolCourse']);
    Route::get('CourseList', [SchoolCourseController::class, 'CourseList'])->name('CourseList');
    Route::post('CourseStore', [SchoolCourseController::class, 'CourseStore'])->name('CourseStore');
    Route::get('CourseEdit', [SchoolCourseController::class, 'CourseEdit'])->name('CourseEdit');
    Route::get('CourseRemove', [SchoolCourseController::class, 'CourseRemove'])->name('CourseRemove');
    // --- === School Course === --- \\

    // --- === School Gallery === --- \\
    Route::get('SchoolGallery/{token}', [SchoolGalleryController::class, 'SchoolGallery']);
    Route::get('SchoolGalleryList', [SchoolGalleryController::class, 'SchoolGalleryList'])->name('SchoolGalleryList');
    Route::post('GalleryStore', [SchoolGalleryController::class, 'GalleryStore'])->name('GalleryStore');
    Route::get('GalleryRemove', [SchoolGalleryController::class, 'GalleryRemove'])->name('GalleryRemove');
    // --- === School Gallery === --- \\

    // --- === School Eligibility === --- \\
    Route::get('SchoolEligibilities/{token}', [EligibilityController::class, 'SchoolEligibilities']);
    Route::get('EligibilityList', [EligibilityController::class, 'EligibilityList'])->name('EligibilityList');
    Route::post('EligibilityStore', [EligibilityController::class, 'EligibilityStore'])->name('EligibilityStore');
    Route::get('EligibilityEdit', [EligibilityController::class, 'EligibilityEdit'])->name('EligibilityEdit');
    Route::get('EligibilityRemove', [EligibilityController::class, 'EligibilityRemove'])->name('EligibilityRemove');
    // --- === School Eligibility === --- \\

    // --- === School Facility === --- \\
    Route::get('SchoolFacilities/{token}', [FacilityController::class, 'SchoolFacilities']);
    Route::get('FacilityList', [FacilityController::class, 'FacilityList'])->name('FacilityList');
    Route::post('FacilityStore', [FacilityController::class, 'FacilityStore'])->name('FacilityStore');
    Route::get('FacilityRemove', [FacilityController::class, 'FacilityRemove'])->name('FacilityRemove');
    // --- === School Facility === --- \\

    // --- === School Infrastructure === --- \\
    Route::get('SchoolInfrastructure/{token}', [SchoolInfrastructure::class, 'SchoolInfrastructureView']);
    Route::post('InfrastructureUpdate', [SchoolInfrastructure::class, 'InfrastructureUpdate'])->name('InfrastructureUpdate');
    // --- === School Infrastructure === --- \\

    // --- === School Blog === --- \\
    Route::get('SchoolBlog/{token}', [SchoolBlogController::class, 'SchoolBlog']);
    Route::get('GetBlogs', [SchoolBlogController::class, 'GetBlogs'])->name('GetBlogs');
    Route::get('SchoolBlogForm', [SchoolBlogController::class, 'SchoolBlogForm'])->name('SchoolBlogForm');
    Route::post('SchoolBlogStore', [SchoolBlogController::class, 'SchoolBlogStore'])->name('SchoolBlogStore');
    Route::get('SchoolBlogEdit/{blog_id}', [SchoolBlogController::class, 'SchoolBlogEdit']);
    Route::get('BlogRemove', [SchoolBlogController::class, 'BlogRemove'])->name('BlogRemove');
    // --- === School Blog === --- \\
});
// --- === School Profiles Routes Start === --- \\

// --- === Campus Connect Portal Start === --- \\
Route::get('AdminLogin', [AdminAuthController::class, 'AdminLogin']);
Route::post('AdminSignIn', [AdminAuthController::class, 'AdminSignIn']);
Route::get('AdminLogout', [AdminAuthController::class, 'AdminLogout']);

Route::group(['prefix' => 'Admin', 'middleware' => 'AdminMiddleware'], function () {
    // --- === Admin Dashboard === --- \\
    Route::get('Dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');
    // --- === Admin Dashboard === --- \\

    // --- === School Approval Route === --- \\
    Route::get('SchoolsApprovals', [SchoolApprovalController::class, 'SchoolsApprovals'])->name('SchoolsApprovals');
    Route::get('GetSchoolList', [SchoolApprovalController::class, 'GetSchoolList'])->name('GetSchoolList');
    Route::get('SchoolDetails/{school_token}', [SchoolApprovalController::class, 'SchoolDetails'])->name('SchoolDetails');
    Route::get('ApproveSchool', [SchoolApprovalController::class, 'ApproveSchool'])->name('ApproveSchool');
    Route::get('DisapproveSchool', [SchoolApprovalController::class, 'DisapproveSchool'])->name('DisapproveSchool');
    // --- === School Approval Route === --- \\

    // --- === Blog Approval Route === --- \\
    Route::get('BlogsApprovals', [BlogApprovalController::class, 'BlogsApprovals'])->name('BlogsApprovals');
    Route::get('GetBlogList', [BlogApprovalController::class, 'GetBlogList'])->name('GetBlogList');
    Route::get('ApproveBlog', [BlogApprovalController::class, 'ApproveBlog'])->name('ApproveBlog');
    Route::get('DisapproveBlog', [BlogApprovalController::class, 'DisapproveBlog'])->name('DisapproveBlog');
    // --- === Blog Approval Route === --- \\

    // --- === Merchandise Route === --- \\
    Route::get('Merchandise', [MerchandiseController::class, 'Merchandise'])->name('Merchandise');
    Route::get('GetMerchandiseList', [MerchandiseController::class, 'GetMerchandiseList'])->name('GetMerchandiseList');
    Route::post('MerchandiseStore', [MerchandiseController::class, 'MerchandiseStore'])->name('MerchandiseStore');
    Route::get('MerchandiseDelete', [MerchandiseController::class, 'MerchandiseDelete'])->name('MerchandiseDelete');
    Route::get('Test', function () {
        return view('Admin.test');
    });
    // --- === Merchandise Route === --- \\

    // --- === Scholarships Route === --- \\
    Route::get('Scholarships', [ScholarshipsController::class, 'Scholarships'])->name('Scholarships');
    Route::get('GetScholarshipList', [ScholarshipsController::class, 'GetScholarshipList'])->name('GetScholarshipList');
    Route::post('ScholarshipStore', [ScholarshipsController::class, 'ScholarshipStore'])->name('ScholarshipStore');
    Route::get('ScholarshipDelete', [ScholarshipsController::class, 'ScholarshipDelete'])->name('ScholarshipDelete');
    // --- === Scholarships Route === --- \\
});

// --- === Campus Connect Portal End === --- \\
