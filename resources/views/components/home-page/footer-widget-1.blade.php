<div class="footer-widget">
    <h4>{{ get_phrase('Top Categories') }}</h4>
    <ul>
        @foreach (top_categories() as $category)
            <li>
                <a href="{{ route('courses', $category->slug) }}">
                    {{ ucfirst($category->title) }}</a>
            </li>
        @endforeach
    </ul>
</div>
