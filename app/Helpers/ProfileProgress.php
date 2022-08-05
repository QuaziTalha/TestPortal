<?php
namespace App\Helpers;

use DB;
use Session;

class ProfileProgress
{

    public function ProfileProgress()
    {
        $schools = DB::table('p_schools')
            ->select(
                'p_schools.*',
                'p_schools__brochures.*',
                'p_schools__courses.*',
                'p_schools__facilities.*',
                'p_schools__gallery.*',
                'p_schools__eligibilities.*',
                'p_schools__infrastructure.*',
                'p_schools__blogs.*',
                'p_schools__brochures.school_id as brochure_school_id',
                'p_schools__courses.school_id as course_school_id',
                'p_schools__facilities.school_id as facility_school_id',
                'p_schools__gallery.school_id as gallery_school_id',
                'p_schools__eligibilities.school_id as eligibility_school_id',
                'p_schools__infrastructure.school_id as infrastructure_school_id',
                'p_schools__blogs.school_id as blog_school_id',
            )
            ->leftjoin('p_schools__brochures', 'p_schools__brochures.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__courses', 'p_schools__courses.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__facilities', 'p_schools__facilities.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__gallery', 'p_schools__gallery.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__blogs', 'p_schools__blogs.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__infrastructure', 'p_schools__infrastructure.school_id', 'p_schools.school_id')
            ->leftjoin('p_schools__eligibilities', 'p_schools__eligibilities.school_id', 'p_schools.school_id')
            ->groupBy('p_schools.school_name')
            ->where('p_schools.school_token', Session::get('token'))
            ->get();

        $school = $schools[0];

        $progress_count = 0;

        if ($school->school_id == "" && $school->school_id == null) {
            $progress_count++;
        }
        if ($school->school_name == "" && $school->school_name == null) {
            $progress_count++;
        }
        if ($school->school_type == "" && $school->school_type == null) {
            $progress_count++;
        }
        if ($school->school_about == "" && $school->school_about == null) {
            $progress_count++;
        }
        if ($school->syllabus_type == "" && $school->syllabus_type == null) {
            $progress_count++;
        }
        if ($school->syllabus_pattern == "" && $school->syllabus_pattern == null) {
            $progress_count++;
        }
        if ($school->stablisment_since == "" && $school->stablisment_since == null) {
            $progress_count++;
        }
        if ($school->school_medium == "" && $school->school_medium == null) {
            $progress_count++;
        }
        if ($school->management_type == "" && $school->management_type == null) {
            $progress_count++;
        }
        if ($school->udise_code == "" && $school->udise_code == null) {
            $progress_count++;
        }
        if ($school->min_fees == "" && $school->min_fees == null) {
            $progress_count++;
        }
        if ($school->max_fees == "" && $school->max_fees == null) {
            $progress_count++;
        }
        if ($school->school_city == "" && $school->school_city == null) {
            $progress_count++;
        }
        if ($school->school_pin_code == "" && $school->school_pin_code == null) {
            $progress_count++;
        }
        if ($school->school_address == "" && $school->school_address == null) {
            $progress_count++;
        }
        if ($school->school_location == "" && $school->school_location == null) {
            $progress_count++;
        }
        if ($school->school_latlng == "" && $school->school_latlng == null) {
            $progress_count++;
        }
        if ($school->school_contact_number == "" && $school->school_contact_number == null) {
            $progress_count++;
        }
        if ($school->primary_mobile_number == "" && $school->primary_mobile_number == null) {
            $progress_count++;
        }
        if ($school->secondary_mobile_number == "" && $school->secondary_mobile_number == null) {
            $progress_count++;
        }
        if ($school->school_whatsapp == "" && $school->school_whatsapp == null) {
            $progress_count++;
        }
        if ($school->school_website == "" && $school->school_website == null) {
            $progress_count++;
        }
        if ($school->school_email == "" && $school->school_email == null) {
            $progress_count++;
        }
        if ($school->total_teacher == "" && $school->total_teacher == null) {
            $progress_count++;
        }
        if ($school->school_password == "" && $school->school_password == null) {
            $progress_count++;
        }
        if ($school->school_logo == "" && $school->school_logo == null) {
            $progress_count++;
        }
        if ($school->school_image == "" && $school->school_image == null) {
            $progress_count++;
        }
        if ($school->school_token == "" && $school->school_token == null) {
            $progress_count++;
        }
        if ($school->school_slug == "" && $school->school_slug == null) {
            $progress_count++;
        }
        if ($school->brochure_id == "" && $school->brochure_id == null) {
            $progress_count++;
        }
        if ($school->brochure_title == "" && $school->brochure_title == null) {
            $progress_count++;
        }
        if ($school->brochure_title == "" && $school->brochure_title == null) {
            $progress_count++;
        }
        if ($school->brochure_file == "" && $school->brochure_file == null) {
            $progress_count++;
        }
        if ($school->course_id == "" && $school->course_id == null) {
            $progress_count++;
        }
        if ($school->course_name == "" && $school->course_name == null) {
            $progress_count++;
        }
        if ($school->course_fees == "" && $school->course_fees == null) {
            $progress_count++;
        }
        if ($school->facility_id == "" && $school->facility_id == null) {
            $progress_count++;
        }
        if ($school->facility_name == "" && $school->facility_name == null) {
            $progress_count++;
        }
        if ($school->facility_picture == "" && $school->facility_picture == null) {
            $progress_count++;
        }
        if ($school->gallery_id == "" && $school->gallery_id == null) {
            $progress_count++;
        }
        if ($school->gallery_image == "" && $school->gallery_image == null) {
            $progress_count++;
        }
        if ($school->eligibity_id == "" && $school->eligibity_id == null) {
            $progress_count++;
        }
        if ($school->eligibity == "" && $school->eligibity == null) {
            $progress_count++;
        }
        if ($school->eligibity_value == "" && $school->eligibity_value == null) {
            $progress_count++;
        }
        if ($school->brochure_school_id == "" && $school->brochure_school_id == null) {
            $progress_count++;
        }
        if ($school->course_school_id == "" && $school->course_school_id == null) {
            $progress_count++;
        }
        if ($school->facility_school_id == "" && $school->facility_school_id == null) {
            $progress_count++;
        }
        if ($school->gallery_school_id == "" && $school->gallery_school_id == null) {
            $progress_count++;
        }
        if ($school->eligibility_school_id == "" && $school->eligibility_school_id == null) {
            $progress_count++;
        }
        if ($school->blog_id == "" && $school->blog_id == null) {
            $progress_count++;
        }
        if ($school->blog_title == "" && $school->blog_title == null) {
            $progress_count++;
        }
        if ($school->blog_description == "" && $school->blog_description == null) {
            $progress_count++;
        }
        if ($school->blog_date == "" && $school->blog_date == null) {
            $progress_count++;
        }
        if ($school->blog_image == "" && $school->blog_image == null) {
            $progress_count++;
        }
        if ($school->blog_school_id == "" && $school->blog_school_id == null) {
            $progress_count++;
        }
        if ($school->infrastructure_school_id == "" && $school->infrastructure_school_id == null) {
            $progress_count++;
        }
        if ($school->infrastructure_id == "" && $school->infrastructure_id == null) {
            $progress_count++;
        }
        if ($school->building_type == "" && $school->building_type == null) {
            $progress_count++;
        }
        if ($school->total_class_rooms == "" && $school->total_class_rooms == null) {
            $progress_count++;
        }
        if ($school->library == "" && $school->library == null) {
            $progress_count++;
        }
        if ($school->computer_lab == "" && $school->computer_lab == null) {
            $progress_count++;
        }
        if ($school->science_lab == "" && $school->science_lab == null) {
            $progress_count++;
        }
        if ($school->play_ground == "" && $school->play_ground == null) {
            $progress_count++;
        }
        if ($school->girls_toilet == "" && $school->girls_toilet == null) {
            $progress_count++;
        }
        if ($school->boys_toilet == "" && $school->boys_toilet == null) {
            $progress_count++;
        }
        if ($school->drinking_water == "" && $school->drinking_water == null) {
            $progress_count++;
        }
        if ($school->smart_class == "" && $school->smart_class == null) {
            $progress_count++;
        }
        if ($school->disable_friendly == "" && $school->disable_friendly == null) {
            $progress_count++;
        }
        if ($school->mealt == "" && $school->mealt == null) {
            $progress_count++;
        }
        $total = count(get_object_vars($school));
        $portion = $progress_count;
        $percentage = ($portion / $total) * 100; // 20
        return round($percentage);
    }

    public static function instance()
    {
        return new ProfileProgress();
    }
}