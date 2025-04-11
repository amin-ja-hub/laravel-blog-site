@extends('layouts.app')
@section('title')
home
@endsection

@section('content')

    <!-- Banner section -->
    <section class="banner-section">
        <div class="main-banner">
        <div class="container">
            <div class="banner-bg">
            <div class="banner-bg-left">
            </div>
            <div class="banner-bg-right">
                <div class="banner-carousel">
                    @foreach ($randomPosts as $item)
                        <div class="banner-item">
                            <div class="banner-img">
                            <a href="single-layout-one.html"> <img src="{{ asset('storage/' . $item->image) }}" alt=""></a>
                            </div>
                            <div class="banner-text">
                            <ul class="category-tag-list">
                                <li class="category-tag-name">
                                <a href="index.html#">{{ $item->category->name }}</a>
                                </li>
                            </ul>
                            <div class="title-font">
                                <a href="single-layout-one.html">{{$item->title}}</a>
                            </div>
                            <p class="mb-3">{{ Str::limit($item->content, 150, '...') }}</p>                   
                            <a href="single-layout-one.html" class="btn btn-solid btn-read">Read More</a>
                            </div>
                        </div>     
                    @endforeach

                </div>
            </div>
            </div>


        </div>

        </div>
        <div class="container">
        <div class="more-content-grid py-30">
            <div class="row">
                @foreach ($latestPosts as $item)
                <div class="col-md-4">
                    <div class="card">
                    <a href="single-layout-one.html">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top " alt="" />
                    </a>
                    <div class="card-body px-0">
                        <ul class="category-tag-list">
                        <li class="category-tag-name">
                            <a href="index.html#">{{ $item->category->name }}</a>
                        </li>
                        </ul>
                        <h5 class="card-title title-font">
                        <a href="single-layout-one.html">
                            {{ $item->title }}
                        </a>
                        </h5>
                        <div class="author-date">
                        <a class="author" href="index.html#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" alt="" class="rounded-circle" />
                            <span class="writer-name-small">{{ $item->user->name }}</span>
                        </a>
                        <a class="date" href="index.html#">
                            <span>{{ $item->created_at->format('d M, Y') }}</span>
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
    <!-- Banner section end -->

    <!-- Popular posts -->
    <section class="popular-posts section-padding">
        <div class="container">
        <div class="section-title">
            <h2>Popular posts</h2>
        </div>
        <div class="row">
            <div class="col-md-7 col-lg-8">
                @foreach ($firstSection as $item)
                    <div class="card mb-4">
                        <div class="row no-gutters align-items-center">
                        <div class="col-md-4">
                            <a href="single-layout-one.html">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img " alt="">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <ul class="category-tag-list">
                                <li class="category-tag-name">
                                <a href="index.html#">{{ $item->category->name }}</a>
                                </li>
                            </ul>
                            <h5 class="card-title title-font"><a href="single-layout-one.html">{{ $item->title }}</a>
                            </h5>
                            <p class="card-text"><p class="mb-3">{{ Str::limit($item->content, 150, '...') }}</p><p>
                                <div class="author-date">
                                    <a class="author" href="index.html#">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" alt="" class="rounded-circle" />
                                    <span class="writer-name-small">{{ $item->user->name }}</span>
                                    </a>
                                    <a class="date" href="index.html#">
                                    <span>{{ $item->created_at->format('d M, Y') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="col-md-5 col-lg-4">
            <div class="recent-posts">
                <div class="sidebar-title">
                <h5><i class="fas fa-circle"></i>Trending</h5>
                </div>
                <div class="sidebar-content">
                <ul class="sidebar-list">
                    @foreach ($secondSection as $item)
                        <li class="sidebar-item">
                            <div class="num-left">
                                {{$loop->iteration}}
                            </div>
                            <div class="content-right">
                                <a href="single-layout-one.html">{{ $item->title }}</a>
        
                            </div>
                        </li>          
                    @endforeach


                </ul>
                </div>
            </div>
            <div class="sidebar-posts mt-4">
                <div class="sidebar-title">
                <h5><i class="fas fa-circle"></i>Categories</h5>
                </div>
                <div class="sidebar-content">
                <div class="category-name-list">
                    <div class="card small-card">
                        <a href="single-layout-one.html"><img src="https://demo.codevibrant.com/html/kavya/assets/images/shoes.jpg" class="card-img" alt="" /></a>
                        <div class="card-img-overlay">
                            <h5 class="card-title title-font mb-0">
                            <a href="index.html#">Travel</a>
                            </h5>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Popular posts end -->

    <!-- Recommended Posts -->
    <section class="recommended-posts">
        <div class="container">
        <div class="section-title">
            <h2>Recommended posts</h2>
        </div>
        <div class="more-content-grid ">
            <div class="row">
                @foreach ($worstItems as $item)
                    <div class="col-md-4">
                        <div class="card">
                        <a href="single-layout-one.html">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="" />
                        </a>
                        <div class="card-body px-0">
                            <ul class="category-tag-list">
                            <li class="category-tag-name">
                                <a href="index.html#">{{ $item->category->name }}</a>
                            </li>
                            </ul>
                            <h5 class="card-title title-font">
                            <a href="single-layout-one.html">
                                {{ $item->title }}</a>
                            </h5>
                            <div class="author-date">
                            <a class="author" href="index.html#">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" alt="" class="rounded-circle" />
                                <span class="writer-name-small">{{ $item->user->name }}</span>
                            </a>
                            <a class="date" href="index.html#">
                                <span>{{ $item->created_at->format('d M, Y') }}</span>
                            </a>
                            </div>

                        </div>
                        </div>
                    </div>                    
                @endforeach

            </div>
        </div>
        </div>
    </section>
    <!-- Recommended posts end -->

@endsection