@extends('layouts.default')
@push('title', get_phrase('My Courses'))
@section('content')
<section class="my-course-content">
    <div class="profile-banner-area"></div>
    <div class="container profile-banner-area-container">
        <div class="row">
            @include('frontend.default.student.left_sidebar')

            <div class="col-lg-9">
                <h4 class="g-title">{{ get_phrase('My Courses') }}</h4>

                <div class="my-panel mt-5">
                    <div class="row">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($my_courses as $index => $course)
                                    @if ($index % 3 === 0)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="row">
                                    @endif
                                    <div class="col-lg-4 col-md-4 col-sm-6 mb-30">
                                        <div class="card Ecard g-card c-card">
                                            <div class="card-head">
                                                <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail">
                                            </div>
                                            <div class="card-body entry-details">
                                                <div class="info-card mb-15">
                                                    <div class="creator">
                                                        <img src="{{ $course->user_photo ? get_image($course->user_photo) : asset('assets/frontend/default/image/foto-perfil.png') }}"
                                                            alt="author-image">
                                                        <h5>{{ $course->user_name }}</h5>
                                                    </div>
                                                </div>
                                                <div class="entry-title">
                                                    <h3 class="w-100 ellipsis-line-2">{{ ucfirst($course->title) }}</h3>
                                                </div>
                                                <div class="single-progress">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-10">
                                                        <h5>{{ __('Progress') }}</h5>
                                                        <p>{{ progress_bar($course->course_id) }}%</p>
                                                    </div>
                                                    <div class="progress" role="progressbar" aria-label="Basic example"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar"
                                                            style="width: {{ progress_bar($course->course_id) }}%">
                                                        </div>
                                                    </div>
                                                </div>

                                                @php
                                                $watch_history = App\Models\Watch_history::where('course_id',
                                                $course->course_id)
                                                ->where('student_id', auth()->user()->id)
                                                ->first();

                                                $lesson = App\Models\Lesson::where('course_id', $course->course_id)
                                                ->orderBy('sort', 'asc')
                                                ->first();

                                                if (!$watch_history && !$lesson) {
                                                $url = route('course.player', ['slug' => $course->slug]);
                                                } else {
                                                if ($watch_history) {
                                                $lesson_id = $watch_history->watching_lesson_id;
                                                } elseif ($lesson) {
                                                $lesson_id = $lesson->id;
                                                }
                                                $url = route('course.player', ['slug' => $course->slug, 'id' =>
                                                $lesson_id]);
                                                }
                                                @endphp
                                                <a href="{{ $url }}"
                                                    class="eBtn learn-btn w-100 text-center mt-20 f-500">{{ __('Continue Course') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @if (($index + 1) % 3 === 0 || $index === count($my_courses) - 1)
                                        </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if ($my_courses->count() == 0)
                                <div class="row bg-white radius-10">
                                    <div class="col-md-12">
                                        @include('frontend.default.empty')
                                    </div>
                                </div>
                                @else
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="false"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                .carousel-control-prev-icon,
                .carousel-control-next-icon {
                    width: 30px;
                    height: 30px;
                    border-radius: 30%;
                    padding: 15px;
                }

                .carousel-control-prev:hover .carousel-control-prev-icon,
                .carousel-control-next:hover .carousel-control-next-icon {
                    background-color: #92a1fe;
                    /* Color en hover, opcional */
                }
                </style>
</section>
<!------------ My wishlist area End  ------------>
@endsection
@push('js')
    
@endpush