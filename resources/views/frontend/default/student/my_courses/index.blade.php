@extends('layouts.default')
@push('title', get_phrase('My Courses'))
@section('content')
    @php
        $sidebar = session('sidebar', false);
    @endphp
    <section class="my-course-content">
        {{-- <div class="profile-banner-area"></div> --}}
        {{-- <div class="container profile-banner-area-container"> --}}
        <div class="profile-banner-area-container">
            <div class="row">
                @include('frontend.default.student.left_sidebar')

                <div class="{{ $sidebar ? 'content-3' : 'content-2' }} bg-r" id="profile-contenedor">
                    <div class="container header-content-student">
                        <h1>
                            <span class="g-title mb-2 mt-20 ml-20">{{ get_phrase('My Courses') }} | </span>
                            {{ get_settings('system_title') }}
                        </h1>
                        <h3 class="mt-20 ml-20">Continúa tu aprendizaje donde lo dejaste</h3>
                    </div>

                    {{--
                    <pre><code>@json($my_courses, JSON_PRETTY_PRINT)</code></pre>
                    --}}

                    <div style="padding: 0 15rem">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card card-course">
                                    <div class="card-body card-info-course" style="padding: 3rem">
                                        <div class="text-info-course">
                                            <p class="card-text">Cursos activos</p>
                                            <p class="card-text count">{{ $my_courses->count() }}</p>
                                        </div>
                                        <div class="svg-info-course">
                                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.40672 21.45C4.87409 21.45 4.42298 21.2652 4.0534 20.8956C3.68381 20.526 3.49902 20.0749 3.49902 19.5423V4.4077C3.49902 3.87507 3.68381 3.42396 4.0534 3.05438C4.42298 2.68479 4.87409 2.5 5.40672 2.5H16.5913C17.1239 2.5 17.575 2.68479 17.9446 3.05438C18.3142 3.42396 18.499 3.87507 18.499 4.4077V10.3923C18.499 10.6051 18.4188 10.7917 18.2586 10.9519C18.0983 11.1122 17.9118 11.1923 17.699 11.1923C17.4862 11.1923 17.2996 11.1122 17.1394 10.9519C16.9791 10.7917 16.899 10.6051 16.899 10.3923V4.4077C16.899 4.33077 16.8669 4.26024 16.8028 4.19613C16.7387 4.13203 16.6682 4.09998 16.5913 4.09998H11.999V9.8134C11.999 10.0116 11.9096 10.1589 11.7307 10.2553C11.5519 10.3517 11.3772 10.3448 11.2067 10.2346L9.724 9.32495L8.24132 10.2346C8.07081 10.3448 7.89612 10.3517 7.71727 10.2553C7.53844 10.1589 7.44902 10.0116 7.44902 9.8134V4.09998H5.40672C5.32979 4.09998 5.25926 4.13203 5.19515 4.19613C5.13105 4.26024 5.099 4.33077 5.099 4.4077V19.5423C5.099 19.6192 5.13105 19.6897 5.19515 19.7538C5.25926 19.8179 5.32979 19.85 5.40672 19.85H11.0048C11.2176 19.85 11.4041 19.9301 11.5644 20.0904C11.7246 20.2506 11.8048 20.4371 11.8048 20.65C11.8048 20.8628 11.7246 21.0493 11.5644 21.2096C11.4041 21.3698 11.2176 21.45 11.0048 21.45H5.40672ZM17.696 22.3461C16.4326 22.3461 15.3589 21.9031 14.475 21.0171C13.591 20.1312 13.149 19.0565 13.149 17.7931C13.149 16.5297 13.592 15.4561 14.478 14.5721C15.3639 13.6881 16.4386 13.2462 17.702 13.2462C18.9654 13.2462 20.039 13.6891 20.923 14.5751C21.807 15.4611 22.2489 16.5358 22.2489 17.7991C22.2489 19.0625 21.806 20.1362 20.92 21.0201C20.034 21.9041 18.9593 22.3461 17.696 22.3461ZM17.5432 19.3134L19.1778 18.2134C19.3355 18.1198 19.4143 17.9743 19.4143 17.7769C19.4143 17.5794 19.3355 17.4339 19.1778 17.3404L17.5432 16.2404C17.3727 16.1134 17.1964 16.1014 17.0144 16.2043C16.8323 16.3072 16.7413 16.4647 16.7413 16.6769V18.8769C16.7413 19.089 16.8323 19.2466 17.0144 19.3495C17.1964 19.4523 17.3727 19.4403 17.5432 19.3134ZM11.0048 4.09998H5.099H16.899H11.0048Z"
                                                    fill="#6B7385" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card card-course">
                                    <div class="card-body card-info-course" style="padding: 3rem">
                                        <div class="text-info-course">
                                            <p class="card-text">Horas totales</p>
                                            <p class="card-text count">0</p>
                                        </div>
                                        <div class="svg-info-course">
                                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.40672 21.45C4.87409 21.45 4.42298 21.2652 4.0534 20.8956C3.68381 20.526 3.49902 20.0749 3.49902 19.5423V4.4077C3.49902 3.87507 3.68381 3.42396 4.0534 3.05438C4.42298 2.68479 4.87409 2.5 5.40672 2.5H16.5913C17.1239 2.5 17.575 2.68479 17.9446 3.05438C18.3142 3.42396 18.499 3.87507 18.499 4.4077V10.3923C18.499 10.6051 18.4188 10.7917 18.2586 10.9519C18.0983 11.1122 17.9118 11.1923 17.699 11.1923C17.4862 11.1923 17.2996 11.1122 17.1394 10.9519C16.9791 10.7917 16.899 10.6051 16.899 10.3923V4.4077C16.899 4.33077 16.8669 4.26024 16.8028 4.19613C16.7387 4.13203 16.6682 4.09998 16.5913 4.09998H11.999V9.8134C11.999 10.0116 11.9096 10.1589 11.7307 10.2553C11.5519 10.3517 11.3772 10.3448 11.2067 10.2346L9.724 9.32495L8.24132 10.2346C8.07081 10.3448 7.89612 10.3517 7.71727 10.2553C7.53844 10.1589 7.44902 10.0116 7.44902 9.8134V4.09998H5.40672C5.32979 4.09998 5.25926 4.13203 5.19515 4.19613C5.13105 4.26024 5.099 4.33077 5.099 4.4077V19.5423C5.099 19.6192 5.13105 19.6897 5.19515 19.7538C5.25926 19.8179 5.32979 19.85 5.40672 19.85H11.0048C11.2176 19.85 11.4041 19.9301 11.5644 20.0904C11.7246 20.2506 11.8048 20.4371 11.8048 20.65C11.8048 20.8628 11.7246 21.0493 11.5644 21.2096C11.4041 21.3698 11.2176 21.45 11.0048 21.45H5.40672ZM17.696 22.3461C16.4326 22.3461 15.3589 21.9031 14.475 21.0171C13.591 20.1312 13.149 19.0565 13.149 17.7931C13.149 16.5297 13.592 15.4561 14.478 14.5721C15.3639 13.6881 16.4386 13.2462 17.702 13.2462C18.9654 13.2462 20.039 13.6891 20.923 14.5751C21.807 15.4611 22.2489 16.5358 22.2489 17.7991C22.2489 19.0625 21.806 20.1362 20.92 21.0201C20.034 21.9041 18.9593 22.3461 17.696 22.3461ZM17.5432 19.3134L19.1778 18.2134C19.3355 18.1198 19.4143 17.9743 19.4143 17.7769C19.4143 17.5794 19.3355 17.4339 19.1778 17.3404L17.5432 16.2404C17.3727 16.1134 17.1964 16.1014 17.0144 16.2043C16.8323 16.3072 16.7413 16.4647 16.7413 16.6769V18.8769C16.7413 19.089 16.8323 19.2466 17.0144 19.3495C17.1964 19.4523 17.3727 19.4403 17.5432 19.3134ZM11.0048 4.09998H5.099H16.899H11.0048Z"
                                                    fill="#6B7385" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card card-course">
                                    <div class="card-body card-info-course" style="padding: 3rem">
                                        <div class="text-info-course">
                                            <p class="card-text">Completados</p>
                                            <p class="card-text count">0</p>
                                        </div>
                                        <div class="svg-info-course">
                                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.40672 21.45C4.87409 21.45 4.42298 21.2652 4.0534 20.8956C3.68381 20.526 3.49902 20.0749 3.49902 19.5423V4.4077C3.49902 3.87507 3.68381 3.42396 4.0534 3.05438C4.42298 2.68479 4.87409 2.5 5.40672 2.5H16.5913C17.1239 2.5 17.575 2.68479 17.9446 3.05438C18.3142 3.42396 18.499 3.87507 18.499 4.4077V10.3923C18.499 10.6051 18.4188 10.7917 18.2586 10.9519C18.0983 11.1122 17.9118 11.1923 17.699 11.1923C17.4862 11.1923 17.2996 11.1122 17.1394 10.9519C16.9791 10.7917 16.899 10.6051 16.899 10.3923V4.4077C16.899 4.33077 16.8669 4.26024 16.8028 4.19613C16.7387 4.13203 16.6682 4.09998 16.5913 4.09998H11.999V9.8134C11.999 10.0116 11.9096 10.1589 11.7307 10.2553C11.5519 10.3517 11.3772 10.3448 11.2067 10.2346L9.724 9.32495L8.24132 10.2346C8.07081 10.3448 7.89612 10.3517 7.71727 10.2553C7.53844 10.1589 7.44902 10.0116 7.44902 9.8134V4.09998H5.40672C5.32979 4.09998 5.25926 4.13203 5.19515 4.19613C5.13105 4.26024 5.099 4.33077 5.099 4.4077V19.5423C5.099 19.6192 5.13105 19.6897 5.19515 19.7538C5.25926 19.8179 5.32979 19.85 5.40672 19.85H11.0048C11.2176 19.85 11.4041 19.9301 11.5644 20.0904C11.7246 20.2506 11.8048 20.4371 11.8048 20.65C11.8048 20.8628 11.7246 21.0493 11.5644 21.2096C11.4041 21.3698 11.2176 21.45 11.0048 21.45H5.40672ZM17.696 22.3461C16.4326 22.3461 15.3589 21.9031 14.475 21.0171C13.591 20.1312 13.149 19.0565 13.149 17.7931C13.149 16.5297 13.592 15.4561 14.478 14.5721C15.3639 13.6881 16.4386 13.2462 17.702 13.2462C18.9654 13.2462 20.039 13.6891 20.923 14.5751C21.807 15.4611 22.2489 16.5358 22.2489 17.7991C22.2489 19.0625 21.806 20.1362 20.92 21.0201C20.034 21.9041 18.9593 22.3461 17.696 22.3461ZM17.5432 19.3134L19.1778 18.2134C19.3355 18.1198 19.4143 17.9743 19.4143 17.7769C19.4143 17.5794 19.3355 17.4339 19.1778 17.3404L17.5432 16.2404C17.3727 16.1134 17.1964 16.1014 17.0144 16.2043C16.8323 16.3072 16.7413 16.4647 16.7413 16.6769V18.8769C16.7413 19.089 16.8323 19.2466 17.0144 19.3495C17.1964 19.4523 17.3727 19.4403 17.5432 19.3134ZM11.0048 4.09998H5.099H16.899H11.0048Z"
                                                    fill="#6B7385" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card card-course">
                                    <div class="card-body card-info-course" style="padding: 3rem">
                                        <div class="text-info-course">
                                            <p class="card-text">Progreso</p>
                                            <p class="card-text count">0</p>
                                        </div>
                                        <div class="svg-info-course">
                                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.40672 21.45C4.87409 21.45 4.42298 21.2652 4.0534 20.8956C3.68381 20.526 3.49902 20.0749 3.49902 19.5423V4.4077C3.49902 3.87507 3.68381 3.42396 4.0534 3.05438C4.42298 2.68479 4.87409 2.5 5.40672 2.5H16.5913C17.1239 2.5 17.575 2.68479 17.9446 3.05438C18.3142 3.42396 18.499 3.87507 18.499 4.4077V10.3923C18.499 10.6051 18.4188 10.7917 18.2586 10.9519C18.0983 11.1122 17.9118 11.1923 17.699 11.1923C17.4862 11.1923 17.2996 11.1122 17.1394 10.9519C16.9791 10.7917 16.899 10.6051 16.899 10.3923V4.4077C16.899 4.33077 16.8669 4.26024 16.8028 4.19613C16.7387 4.13203 16.6682 4.09998 16.5913 4.09998H11.999V9.8134C11.999 10.0116 11.9096 10.1589 11.7307 10.2553C11.5519 10.3517 11.3772 10.3448 11.2067 10.2346L9.724 9.32495L8.24132 10.2346C8.07081 10.3448 7.89612 10.3517 7.71727 10.2553C7.53844 10.1589 7.44902 10.0116 7.44902 9.8134V4.09998H5.40672C5.32979 4.09998 5.25926 4.13203 5.19515 4.19613C5.13105 4.26024 5.099 4.33077 5.099 4.4077V19.5423C5.099 19.6192 5.13105 19.6897 5.19515 19.7538C5.25926 19.8179 5.32979 19.85 5.40672 19.85H11.0048C11.2176 19.85 11.4041 19.9301 11.5644 20.0904C11.7246 20.2506 11.8048 20.4371 11.8048 20.65C11.8048 20.8628 11.7246 21.0493 11.5644 21.2096C11.4041 21.3698 11.2176 21.45 11.0048 21.45H5.40672ZM17.696 22.3461C16.4326 22.3461 15.3589 21.9031 14.475 21.0171C13.591 20.1312 13.149 19.0565 13.149 17.7931C13.149 16.5297 13.592 15.4561 14.478 14.5721C15.3639 13.6881 16.4386 13.2462 17.702 13.2462C18.9654 13.2462 20.039 13.6891 20.923 14.5751C21.807 15.4611 22.2489 16.5358 22.2489 17.7991C22.2489 19.0625 21.806 20.1362 20.92 21.0201C20.034 21.9041 18.9593 22.3461 17.696 22.3461ZM17.5432 19.3134L19.1778 18.2134C19.3355 18.1198 19.4143 17.9743 19.4143 17.7769C19.4143 17.5794 19.3355 17.4339 19.1778 17.3404L17.5432 16.2404C17.3727 16.1134 17.1964 16.1014 17.0144 16.2043C16.8323 16.3072 16.7413 16.4647 16.7413 16.6769V18.8769C16.7413 19.089 16.8323 19.2466 17.0144 19.3495C17.1964 19.4523 17.3727 19.4403 17.5432 19.3134ZM11.0048 4.09998H5.099H16.899H11.0048Z"
                                                    fill="#6B7385" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="my-panel mt-5"> --}}
                    <div style="padding: 4rem">
                        <div class="row">
                            {{--
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner"> --}}
                            @foreach ($my_courses as $index => $course)
                                {{--
                                        @if ($index % 3 === 0)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <div class="row">
                                        @endif
                                    --}}
                                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                                    <div class="card Ecard g-card c-card">
                                        <div class="card-head">
                                            <img src="{{ get_image($course->thumbnail) }}" alt="course-thumbnail"
                                                onerror="this.src='{{ asset('assets/frontend/default/image/course-1.png') }}'">
                                        </div>
                                        <div class="card-body entry-details">
                                            <div class="entry-title" style="text-align: center">
                                                <h3 class="w-100 ellipsis-line-2">{{ ucfirst($course->title) }}</h3>
                                            </div>
                                            <div class="info-card mb-15">
                                                <div class="creator">
                                                    <img src="{{ $course->user_photo
                                                        ? get_image($course->user_photo)
                                                        : asset('assets/frontend/default/image/foto-perfil.png') }}"
                                                        alt="author-image"
                                                        onerror="this.src='{{ asset('assets/frontend/default/image/instructor.png') }}'">
                                                    <h5>{{ $course->user_name }}</h5>
                                                </div>
                                            </div>
                                            <div class="single-progress">
                                                <div class="d-flex justify-content-between align-items-center mb-10">
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
                                                $watch_history = App\Models\Watch_history::where(
                                                    'course_id',
                                                    $course->course_id,
                                                )
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
                                                    $url = route('course.player', [
                                                        'slug' => $course->slug,
                                                        'id' => $lesson_id,
                                                    ]);
                                                }
                                            @endphp
                                            <a href="{{ $url }}"
                                                class="eBtn learn-btn w-100 text-center mt-20 f-500">{{ __('Continue Course') }}</a>
                                        </div>
                                    </div>
                                </div>
                                {{--
                                        @if (($index + 1) % 3 === 0 || $index === count($my_courses) - 1)
                                </div>
                            </div>
                            @endif
                            --}}
                            @endforeach
                            @if ($my_courses->count() == 0)
                                <div class="row bg-white radius-10">
                                    <div class="col-md-12">
                                        @include('frontend.default.empty')
                                    </div>
                                </div>
                                {{--
                                @else
                                <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        --}}
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
