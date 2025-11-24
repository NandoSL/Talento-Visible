<div class="row justify-content-center">
    @foreach (App\Models\Category::where('parent_id', 0)->take(32)->get() as $category)
        <div class="col-md-4 col-sm-6 mb-30">
            <a href="{{ route('courses', $category->slug) }}" class="single-category">
                <div class="single-category-logo">
                    <img src="{{get_image($category->category_logo)}}" alt="">
                </div>
                <div class="single-category-name">
                    <h4>{{ $category->title }}</h4>
                    <p>{{ count_category_courses($category->id) }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>