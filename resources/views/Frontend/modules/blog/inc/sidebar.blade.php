<style>
    .sidebar-sub-category {
        padding-left: 20px !important;
    }

    .sidebar-sub-category li {
        padding: 0px !important;
    }

    .sidebar-sub-category li a {
        font-size: 13px;
        color: grey !important;
    }
</style>
<div class="sidebar">

    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
        <form action="{{route('front.search')}}" method="GET">
            <input type="text" name="search" value="{{$search ?? null}}">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
        <ul>
            @foreach ($categories as $cat)
                <li><a href="{{ route('front.category', $cat->slug) }}">{{ $cat->name }}
                        <span>({{ $cat->sub_categories->count() }})</span></a>
                    <ul class="sidebar-sub-category">
                        @foreach ($cat->sub_categories as $sub_cat)
                            <li><a href="{{ route('front.subCategory', [$cat->slug, $sub_cat->slug]) }}">-
                                    {{ $sub_cat->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
        @foreach ($recentPosts as $post)
            <div class="post-item clearfix">
                <img src="{{ asset('uploads/post/original/' . $post->photo) }}" alt="">
                <h4><a href="{{ route('front.singleBlog', $post->slug) }}">{{$post->title}}</a></h4>
                <time datetime="2020-01-01">{{$post->created_at->format('M d, Y')}}</time>
            </div>
        @endforeach

    </div><!-- End sidebar recent posts-->

    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
        <ul>
            @foreach ($tags as $tag)
                <li><a href="{{ route('front.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div><!-- End sidebar tags-->

</div><!-- End sidebar -->
