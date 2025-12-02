<div class="card-centered-section">
    <div class="card-middle-banner">
        <img src="{{ get_image('assets/backend/images/img/no-file-search.jpeg') }}" alt="">
    </div>
    <p class="title2 fs-20px text-center">{{ get_phrase('No data found') }}</p>
    <p>{{ get_phrase('No hay inscripciones registradas en el rango de fechas seleccionado') }}</p>
        <br>
    <a href="{{ route('admin.student.enroll') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new enrollment') }}</span>
                </a>
</br>
</div>
