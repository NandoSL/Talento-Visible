<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyCoursesController extends Controller
{
    public function index()
    {
        $page_data['my_courses'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->where('enrollments.user_id', Auth::user()->id)
            ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
            ->paginate(8);


        foreach ($page_data['my_courses'] as $course) {
            $course->course_duration = Lesson::where('course_id', $course->course_id)
                ->select(DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS duracion'))
                ->value('duracion') ?? "00:00:00";
        }

        $page_data['my_courses_data'] = Enrollment::join('courses', 'enrollments.course_id', 'courses.id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->where('enrollments.user_id', Auth::user()->id)
            ->select('enrollments.*', 'courses.slug', 'courses.title', 'courses.thumbnail', 'users.name as user_name', 'users.photo as user_photo')
            ->paginate(0);

        $page_data['courses_hours'] = 0;
        $page_data['courses_completed'] = 0;
        $page_data['courses_promedio'] = 0;

        foreach ($page_data['my_courses_data'] as $course) {
            $total = progress_bar($course->course_id);
            if ($total == 100) {
                $page_data['courses_completed'] += 1;
            }
            $page_data['courses_promedio'] += $total;
        }

        $view_path = 'frontend.' . get_frontend_settings('theme') . '.student.my_courses.index';
        return view($view_path, $page_data);
    }
}
