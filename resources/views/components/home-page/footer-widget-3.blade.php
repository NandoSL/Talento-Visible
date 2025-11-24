<h4>{{ get_phrase('Company') }}</h4>
<ul>
    <li>
        <a href="#">
            {{ get_phrase('Phone : ') }}
            {{ get_settings('phone') }}
        </a>
    </li>
    <li>
        <a href="#">
            {{ get_phrase('Email : ') }}
            {{ get_settings('system_email') }}
        </a>
    </li>
</ul>
