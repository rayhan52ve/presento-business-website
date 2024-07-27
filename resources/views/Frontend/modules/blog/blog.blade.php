@extends('Frontend.master')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>{{$pageSubTitle}}</li>
                </ol>
                <h2>{{$pageTitle}}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        @forelse ($posts as $post)
                            <article class="entry">

                                <div class="entry-img">
                                    <img src="{{ asset('uploads/post/original/' . $post->photo) }}" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="{{ route('front.singleBlog', $post->slug) }}">{{ $post->title }}</a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="blog-single.html">{{ $post->user?->name }}</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="blog-single.html"><time
                                                    datetime="2020-01-01">{{ $post->created_at->format('M d, Y') }}</time></a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                                href="blog-single.html">{{$post->comments->count()}}
                                                Comments</a></li>
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        {{ strip_tags(substr($post->description, 0, 500)) . '.....' }}<a href="{{ route('front.singleBlog', $post->slug) }}"><i>Read More</i></a>
                                    </p>
                                    {{-- <div class="read-more">
                                        <a href="{{ route('front.singleBlog', $post->slug) }}">Read More</a>
                                    </div> --}}
                                </div>

                                <div class="entry-footer">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a class="text-success"
                                                href="{{ route('front.category', $post->category->slug) }}">{{ $post->category->name }}</a><a
                                                href="{{ route('front.subCategory', [$post->category->slug, $post->sub_category->slug]) }}"><small
                                                    class="text-info"> - ({{ $post->sub_category->name }})</small></a></li>
                                    </ul>
    
                                    <i class="bi bi-tags"></i>
                                    <ul class="tags">
                                        @foreach ($post->tags as $tag)
                                            <li><a href="{{ route('front.tag', $tag->slug) }}">{{ $tag->name }}</a></li>
                                            {{-- @if (!$loop->last)
                                                ,
                                            @endif --}}
                                        @endforeach
                                    </ul>
                                </div>

                            </article><!-- End blog entry -->
                        @empty
                            <h3 class="text-center text-danger my-5">No Data Found</h3>
                        @endforelse

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                {{-- Previous Page Link --}}
                                @if ($posts->onFirstPage())
                                    <li class="disabled"><a href="#" aria-disabled=”true”><span>&laquo;</span></a></li>
                                @else
                                    <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif

                                {{-- Pagination Elements --}}
                                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                    @if ($i == $posts->currentPage())
                                        <li class="active"><a href="#">{{ $i }}</a></li>
                                    @else
                                        <li><a href="{{ $posts->url($i) }}">{{ $i }}</a></li>
                                    @endif
                                @endfor

                                {{-- Next Page Link --}}
                                @if ($posts->hasMorePages())
                                    <li><a href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><a href="#"><span>&raquo;</span></a></li>
                                @endif
                            </ul>
                        </div>

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        @include('Frontend.modules.blog.inc.sidebar')

                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
