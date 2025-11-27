<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class MyCoursesController extends Controller
{
    public function index()
    {
        $page_data['my_courses'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->where('enrollments.user_id', Auth::user()->id)
            ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
            ->paginate(6);

        // $page_data['key_resources'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
        //     ->join('users', 'courses.user_id', '=', 'users.id')
        //     ->where('enrollments.user_id', Auth::user()->id)->where('courses.category_id', 2)
        //     ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
        //     ->paginate(6);

        // $page_data['primer'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
        //     ->join('users', 'courses.user_id', '=', 'users.id')
        //     ->where('enrollments.user_id', Auth::user()->id)->where('courses.category_id', 3)
        //     ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
        //     ->paginate(6);

        // $page_data['accelerator'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
        //     ->join('users', 'courses.user_id', '=', 'users.id')
        //     ->where('enrollments.user_id', Auth::user()->id)->where('courses.category_id', 4)
        //     ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
        //     ->paginate(6);

        $view_path = 'frontend.' . get_frontend_settings('theme') . '.student.my_courses.index';
        return view($view_path, $page_data);
    }
}
