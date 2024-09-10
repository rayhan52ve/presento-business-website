@extends('Frontend.master')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li><a href="{{ route('front.blog') }}">Blog</a></li>
                    <li>{{ $post->title }}</li>
                </ol>
                <h2>{{ $post->title }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img src="{{ asset('uploads/post/original/' . $post->photo) }}" alt=""
                                    class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ $post->title }}</a>
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
                                            href="blog-single.html">{{$post->comments->count()}} Comments</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">

                                {!! $post->description !!}

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

                        <div class="blog-comments">

                            <div class="reply-form my-4">
                                <h4>Leave a Comment</h4>
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control" placeholder="Your Comment*" required></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null}}">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>

                                </form>

                            </div>

                            <h4 class="comments-count">{{$post->comments->count()}} Comments</h4>

                            @forelse ($post->comments as $comment)
                                <div class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img
                                                src="{{ asset('frontend/assets/img/blog/comments-1.jpg') }}"
                                                alt="">
                                        </div>
                                        <div>
                                            <h5><a href="">{{ $comment->user?->name }}</a></h5>
                                            <time datetime="2020-01-01">{{ $comment->created_at->format('M d, Y') }}</time>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>

                                            <h5><a href=""><i class="bi bi-reply-fill"></i> Reply Here</a></h5>
                                            <form action="{{ route('comment.store') }}" method="POST">
                                                @csrf
                                                <div class="d-flex">
                                                    <input type="text" name="comment" class="form-control form-control-sm"
                                                        placeholder="Your Replay*" required>
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? null }}">
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                    <button type="submit" class="btn btn-dark btn-sm"><i class="fa-solid fa-arrow-right" style="color: #B197FC;"></i></button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    @foreach ($comment->replay as $replay)
                                        <div class="comment comment-reply">
                                            <div class="d-flex">
                                                <div class="comment-img"><img
                                                        src="{{ asset('frontend/assets/img/blog/comments-4.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div>
                                                    <h5><a href="#">{{ $replay->user?->name }}</a></h5>
                                                    <time
                                                        datetime="2020-01-01">{{ $replay->created_at->format('M d, Y') }}</time>
                                                    <p>
                                                        {{ $replay->comment }}
                                                    </p>
                                                </div>
                                            </div>

                                        </div><!-- End comment reply #1-->
                                    @endforeach

                                </div><!-- End comment #2-->
                            @empty
                                <h6 class="text-center">No Comments Yet</h6>
                            @endforelse

                        </div><!-- End blog comments -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">

                        @include('Frontend.modules.blog.inc.sidebar')


                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->

    </main><!-- End #main -->
@endsection
