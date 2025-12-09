@extends('layouts.instructor')
@push('title', get_phrase('Manage profile'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $auth = auth()->user();
    @endphp

    <div class="ol-card radius-8px ">
        <div class="ol-card-body my-3 py-4 px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    <span>{{ get_phrase('Manage profile') }}</span>
                </h4>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="ol-card d-flex p-3">
            <div class="width-" style="--w:5%">
                <div class="bg-color-degraded width- height- txt-color p-3 round-"style="--color1: #f39c36; --color2: #d86100; --w:100%; --txt-color:#FFF; text-align: center; --br:15px; --h:100%">
                    <i class="fi fi-rr-user fonsize" style="--fs:1.8vw"></i>
                </div>
            </div>
            <div class="p-1">
                <div class="fonsize txt-bold" style="--fs:1.8vw;">Mi perfil de instructor</div>
                <div class="sub-title">Actualiza tu información personal y profesional</div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-xl-7">
            <form action="{{ route('instructor.manage.profile.update') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="ol-card mb-5 rounded-top">
                    <input type="hidden" name="type" value="general">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#f39c3663;--w:100%;    ">
                        <i class="fi fi-rr-camera txt-color fonsize" style="--fs:1.8vw;--txt-color:#f39c36"></i>
                        <b class="fonsize" style="--fs:1vw;">Foto de Perfil</b>
                    </div>
                    <div class="d-flex p-4 -width height-" style="--w:100%; --h:100%;">
                        <div id="preview" class="d-flex width- height- txt-color txt-bold round- pad- fonsize"
                            style="--txt-color:#FFF;--fs:1.8vw;--w:200px; background-color:#d86100; 
                            --br:100%; --p:70px; --h:200px; display:flex; align-items:center; justify-content:center;">
                            <span>IN</span>
                        </div>
                        <div class="p-4 lh-lg">
                            <div class="">
                                Tamaño recomendado: 400x400px<br>
                                <button class="p-1 bg-color-solid bor-button round-" onclick="document.getElementById('avatar').click()" style="--border-color:#dbdbdb; --b-bg-c:#FFF; --br:15px">
                                    <i class="fi fi-rr-camera txt-color fonsize" style="--fs:1.2vw;--txt-color:#f39c36"></i>
                                    <label>Adjuntar documento</label>
                                </button>
                                <input type="file" id="avatar" name="foto" accept="image/png, image/jpeg" style="display:none;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ol-card mb-5 rounded-top">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#36aaf363;--w:100%;    ">
                        <i class="fi fi-rr-user txt-color fonsize" style="--fs:1.8vw;--txt-color:#368cf3"></i>
                        <b class="fonsize" style="--fs:1vw;">Informacion Basica</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Name') }}</label>
                        <input type="text" class="form-control ol-form-control" name="name" value="{{ $auth->name }}" required />
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Email') }}</label>
                        <input type="email" class="form-control ol-form-control" name="email" value="{{ $auth->email }}" required />
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">Titulo profesional</label>
                        <input type="text" placeholder="Ej:Desarrolador Full Stack Senior" class="form-control ol-form-control" name="profesional_title" {{--  required --}}  />
                    </div>
                </div>
                <div class="ol-card mb-5 rounded-top">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#ab36f333;--w:100%;    ">
                        <i class="fi fi-rr-graduation-cap txt-color fonsize" style="--fs:1.8vw;--txt-color:#8d36f3"></i>
                        <b class="fonsize" style="--fs:1vw;">Información Profesional</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">Años de experiencia</label>
                        <select class="form-control ol-form-control" name="years_of_experience" {{--  required --}} >
                            <option selected disabled>Seleccionar</option>
                            <option value="0-1">0-1 años</option>
                            <option value="1-3">1-3 años</option>
                            <option value="3-5">3-5 años</option>
                            <option value="5-10">5-10 años</option>
                            <option value="+10">Mas de 10 años</option>
                        </select>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">Especialidad</label>
                        <input type="text" class="form-control ol-form-control" name="speciality" placeholder="Ej:Desarrollo Web,Data Science" {{--  required --}} />
                    </div>
                </div>
                <div class="ol-card mb-5 rounded-top">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#f3eb3663;--w:100%;    ">
                        
                        <b class="fonsize" style="--fs:1vw;">Redes Sociales</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Facebook link') }}</label>
                        <input type="text" class="form-control ol-form-control" name="facebook" value="{{ $auth->facebook }}" />
                    </div>
        
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Twitter link') }}</label>
                        <input type="text" class="form-control ol-form-control" name="twitter" value="{{ $auth->twitter }}" />
                    </div>
        
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Linkedin link') }}</label>
                        <input type="text" class="form-control ol-form-control" name="linkedin" value="{{ $auth->linkedin }}" />
                    </div>
                </div>
                <div class="ol-card mb-5 rounded-top">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#7af33663;--w:100%;    ">
                        <i class="fi fi-rr-file-spreadsheet txt-color fonsize" style="--fs:1.8vw;--txt-color:#20bd43"></i>
                        <b class="fonsize" style="--fs:1vw;">Breve biografia</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('A short title about yourself') }}</label>
                        <textarea rows="5" id="short-title" class="form-control ol-form-control" name="about" placeholder="{{ $auth->about }}"></textarea>
                        <label class="mt-2">Máximo 200 caracteres - Esto se mostrará en tus cursos</label>
                    </div>
                </div>
                <div class="ol-card mb-5 rounded-top">
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#f3eb3663;--w:100%;    ">
                        <i class="fi fi-rr-face-glasses txt-color fonsize" style="--fs:1.8vw;--txt-color:#d09514"></i>
                        <b class="fonsize" style="--fs:1vw;">Habilidades</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <input type="text" class="form-control ol-form-control" name="skills" placeholder="Ej:JavaScript,REact, Node.js, Python, Docker (separadas por comas)" />
                    </div>
                </div>
                {{-- 
                <div class="ol-card mb-5 rounded-top"> 
                    <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#d2d2d263;--w:100%;    ">
                        <i class="fi fi-rr-file-spreadsheet  fonsize" style="--fs:1.8vw;"></i>
                        <b class="fonsize" style="--fs:1vw;">{{ get_phrase('Biography') }}</b>
                    </div>
                    <div class="fpb7 mb-2">
                        <label class="form-label ol-form-label">{{ get_phrase('Biography') }}</label>
                        <textarea rows="5" class="form-control ol-form-control text_editor" name="biography" placeholder="">{!! removeScripts($auth->biography) !!}</textarea>
                    </div>
                </div>
                --}}
                <div class="fpb7 mb-2">
                        <button type="submit" class="btn mt-4 ol-btn-primary">{{ get_phrase('Update profile') }}</button>
                    </div>
            </form>
        </div>
        <!-- end 1st colum -->
        <div class="col-xl-5">
            <div class="ol-card p-2">
                <div class="bg-color-solid  rounded-top width- p-4" style=" --bg-color:#d2d2d263;--w:100%;    ">
                    <i class="fi fi-rr-lock  fonsize" style="--fs:1.8vw;"></i>
                    <b class="fonsize" style="--fs:1vw;">Cambiar Contraseña</b><br>
                    <label>Actualiza tu contraseña regularmente</label>
                </div>
                <div class="ol-card-body">
                    <form action="{{ route('instructor.manage.profile.update') }}" method="post"> @csrf
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('Current password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="current_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('New password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="new_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <label class="form-label ol-form-label">{{ get_phrase('Confirm password') }}</label>
                            <input type="password" class="form-control ol-form-control" name="confirm_password" required />
                        </div>
                        <div class="fpb7 mb-2">
                            <button type="submit" class="bg-color-solid txt-color width- round- p-2" style="--bg-color:#000; --txt-color:#FFF; --w:100%; --br:15px">{{ get_phrase('Update password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
    document.getElementById("avatar").addEventListener("change", function(event) {

        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById("preview");

            // ❌ Quitar todos los estilos inline
            preview.removeAttribute("style");
            preview.removeAttribute("class");

            // ❌ Quitar clases si también deseas
            // preview.className = "";

            // Mostrar la imagen
            preview.innerHTML = `
                <img src="${e.target.result}" 
                    style="width:200px; height:200px; object-fit:cover; border-radius:50%;" />
            `;
        };

        reader.readAsDataURL(file);
    });
    </script>


@endpush
