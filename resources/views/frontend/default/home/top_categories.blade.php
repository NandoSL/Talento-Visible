<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title text-center">
                <span class="title-head">{{ get_phrase('Categories') }}</span>
                <h2 class="title">{{ get_phrase('Explore Top Courses Categories') }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach (App\Models\Category::where('parent_id', 0)->take(12)->get() as $category)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
                <a href="{{ route('courses', $category->slug) }}" class="single-category">
                    <span>
                        <i class="{{ $category->icon }}"></i>
                    </span>
                    <h4>{{ $category->title }}</h4>
                    <p>{{ count_category_courses($category->id) }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
