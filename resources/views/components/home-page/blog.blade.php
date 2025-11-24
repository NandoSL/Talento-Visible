@php
    $blogs = App\Models\Blog::where('status', 1)->orderBy('is_popular', 'desc')->orderBy('id', 'desc')->take(3)->get();
@endphp
<div class="row justify-content-center mt-50">
    @foreach ($blogs as $key => $blog)
        <div class="col-lg-4 col-md-6 col-sm-6 mb-20">
            <div class="Ecard card b-card">
                <div class="card-head">
                    <img src="{{ get_image($blog->thumbnail) }}" alt="blog-thumbnail">
                    <span>{{ get_blog_category_name($blog->category_id) }}</span>
                </div>
                <div class="card-body">
                    <h4>{{ ucfirst($blog->title) }}</h4>
                    <div class="description ellipsis-line-2 mt-3">
                        {{ ellipsis(strip_tags($blog->description), 160) }}
                    </div>
                    <p></p>
                    <div class="b_bottom d-flex justify-content-between">
                        <a href="{{ route('blog.details', $blog->slug) }}" class="read-text mt-0 stretched-link">{{ get_phrase('Read More') }}<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        <span>{{ date('d M, Y', strtotime($blog->created_at)) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
