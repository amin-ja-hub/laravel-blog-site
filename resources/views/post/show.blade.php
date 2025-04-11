@extends('layouts.app')
@section('content')
    <!-- single layout blog content -->
    <section class="single-layout">
        <div class="container">
            <div class="blog-img-main">
            <img src="{{ asset('storage/' . $post->image) }}" alt="">
            </div>
            <div class="row align-items-center">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="blog-content-wrap">
                <div class="blog-title-wrap">
                    <div class="author-date">
                    <a class="author" href="{{ route('posts.show', ['post' => $item->id]) }}#">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="" class="rounded-circle" />
                        <span class="">{{ $post->user->name}}</span>
                    </a>
                    <a class="date" href="{{ route('posts.show', ['post' => $item->id]) }}#">
                        <span>{{ $post->created_at->format('d M, Y') }}</span>
                    </a>
                    </div>
                    <ul class="category-tag-list mb-0">
                    <li class="category-tag-name">
                        <a href="{{ route('posts.show', ['post' => $item->id]) }}#">{{$post->category->name}}</a>
                    </li>
                    </ul>
                    <h1 class="title-font">{{$post->title}}</h1>
                </div>
    
                <div class="blog-desc">
                    {!! $post->content !!}
                </div>
                <div class="tags-wrap">
                    <div class="blog-tags">
                    <ul class="sidebar-list tags-list">
                        <p>Tags:</p>
                        @foreach ($tags as $tag)
                            <li><a href="{{ route('posts.search', ['filter' => tag]) }}">{{ $tag }}</a></li>
                        @endforeach
                    </ul>
                    </div>
                    <div class="share-buttons">
                    <p>Share Now:</p>
                    <ul class="share-list">
                        <li><a href="{{ route('posts.show', ['post' => $item->id]) }}#"><img src="https://demo.codevibrant.com/html/kavya/assets/images/facebook.png" alt=""></a></li>
                        <li><a href="{{ route('posts.show', ['post' => $item->id]) }}#"><img src="https://demo.codevibrant.com/html/kavya/assets/images/twitter.png" alt=""></a></li>
                        <li><a href="{{ route('posts.show', ['post' => $item->id]) }}#"><img src="https://demo.codevibrant.com/html/kavya/assets/images/pinterest.png" alt=""></a></li>
                        <li><a href="{{ route('posts.show', ['post' => $item->id]) }}#"><img src="https://demo.codevibrant.com/html/kavya/assets/images/messenger.png" alt=""></a></li>
                    </ul>
                    </div>
                </div>
     
                <div class="blog-author-info">
                    <div class="author-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" alt="">
                    </div>
                    <div class="author-desc">
                    <small>written by</small>
                    <h5>{{ $post->user->name }}</h5>
                    </div>
                </div>

            
                    <div class="comment-section">
                        <form action="{{ route('comment.store', ['post' => $post->id]) }}" method="POST" class="comment-form">
                            @csrf
                            <h5>Leave a comment</h5>
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <textarea name="content" rows="7" class="form-control" placeholder="Write your comment..." required></textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-solid">Submit</button>
                        </form>
                    </div>
                
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            @foreach ($comments as $comment)
                                <div class="media mb-3 p-3 border rounded bg-light">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" class="rounded-circle me-3" width="50" height="50" alt="User Avatar">
                                    <div class="media-body">
                                        <h6 class="mb-1">
                                            <strong>{{ $comment->user->name }}</strong>
                                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                        </h6>
                                        <p class="mb-0">{{ $comment->body }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- Single Layout Blog content end -->
    
        <!-- Related posts -->
        <section class="related-posts">
            <div class="container">
                <div class="related-title">
                    <h3>Related Posts</h3>
                </div>
                <div class="row">
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="col-md-6 col-lg-3">
                            <div class="card small-card simple-overlay-card">
                                <a href="{{ route('posts.show', ['post' => $relatedPost->id]) }}">
                                    <img src="{{ asset('storage/' . $relatedPost->image) }}" class="card-img" alt="">
                                </a>
                                <div class="card-img-overlay">
                                    <ul class="category-tag-list mb-0">
                                        <li class="category-tag-name">
                                            <a href="{{ route('posts.show', ['post' => $relatedPost->id]) }}">
                                                {{ $relatedPost->category->name }}
                                            </a>
                                        </li>
                                    </ul>
                                    <h5 class="card-title title-font">
                                        <a href="{{ route('posts.show', ['post' => $relatedPost->id]) }}">
                                            {{ $relatedPost->title }}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
        </section>
        <!-- Related posts end -->
@endsection