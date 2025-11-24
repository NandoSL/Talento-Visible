<form action="{{ route('newsletter.store') }}" method="post" class="newslater-form">
    @csrf
    <input type="text" name="email" class="form-control" placeholder="{{ get_phrase('Email address') }}">
    <button class="eBtn gradient">{{ get_phrase('Submit') }}</button>
</form>
