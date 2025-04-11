@extends('layouts.app')
@section('content')
            <!-- Page header -->
            <section class="page-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class=" col-md-6">
                            <div class="page-title">
                                <h2>Blogs</h2>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">blog</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- page header end -->
    
            <!-- Archive content -->
            <section class="archive-content">
                <div class="container">
                    <div class="row " id="main-content">
                        <div class="col-md-7 col-lg-8 content">
                            <!-- Archive posts -->
                            <div class="archive-posts theiaStickySidebar">

                                @foreach ($posts as $item)
                                    <div class="card border-0 mb-5">
                                        <div class="row no-gutters align-items-center align-items-center">
                                            <div class="col-md-5">
                                                <a href="archive-layout-one.html#"> <img src="{{ asset('storage/' . $item->image) }}" class="card-img"
                                                        alt=""></a>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <ul class="category-tag-list">
                                                        <li class="category-tag-name">
                                                            <a href="archive-layout-one.html#">{{ $item->category->name }}</a>
                                                        </li>
        
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="archive-layout-one.html#">{{ $item->title }}</a></h5>
                                                    <p class="card-text">{{ Str::limit($item->content, 150, '...') }}<p>
    
                                                            <div class="author-date">
                                                                <a class="author" href="archive-layout-one.html#">
                                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnFRPx77U9mERU_T1zyHcz9BOxbDQrL4Dvtg&s" alt=""
                                                                        class="rounded-circle" />
                                                                    <span class="writer-name-small">Julie</span>
                                                                </a>
                                                                <a class="date" href="archive-layout-one.html#">
                                                                    <span>{{ $item->created_at->format('d M, Y') }}</span>
                                                                </a>
                                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>                                

                            <!-- Archive posts end -->
                        </div>
                        <div class="col-md-5 col-lg-4 sidebar">
                            <!-- Sidebar posts -->
                            <div id="sticker" class="theiaStickySidebar">
                                <div class="sidebar-posts">
                                    <div class="sidebar-title">
                                        <h5><i class="fas fa-circle"></i>Popular Posts</h5>
                                    </div>
                                    <div class="sidebar-content p-0">
                                        @foreach ($topItems as $item)
                                        <div class="card border-0">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-3 col-md-3">
                                                    <a href="archive-layout-one.html#">
                                                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-9 col-md-9">
                                                    <div class="card-body">
                                                        <ul class="category-tag-list mb-0">
                                                            <li class="category-tag-name">
                                                                <a href="archive-layout-one.html#">{{$item->category->name}}</a>
                                                            </li>
                                                        </ul>
                                                        <h5 class="card-title title-font"><a href="archive-layout-one.html#"></a>
                                                        </h5>
                                                        <div class="author-date">
                                                            <a class="date" href="archive-layout-one.html#">
                                                                <span>{{ $item->created_at->format('d M, Y') }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>                                            
                                        @endforeach
                                    </div>
                                </div>
                                <div class="popular-tags mt-4">
                                    <div class="sidebar-title">
                                        <h5><i class="fas fa-circle"></i>Popular tags</h5>
                                    </div>
                                    <div class="sidebar-content">
                                        <ul class="sidebar-list tags-list">
                                            @foreach ($tags as $item)
                                                <li><a href="archive-layout-one.html#">{{ $item->name }}</a></li>
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
                                            @foreach ($categories as $item)
                                                <div class="card small-card">
                                                    <a href="archive-layout-one.html#"><img src="https://demo.codevibrant.com/html/kavya/assets/images/shoes.jpg" class="card-img"
                                                            alt="" /></a>
                                                    <div class="card-img-overlay">
        
                                                        <h5 class="card-title title-font mb-0">
                                                            <a href="archive-layout-one.html#">{{$item->name}}</a>
                                                        </h5>
                                                    </div>
                                                </div>                                                
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar posts end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Archive content end -->
            <!-- Pagination section -->
            <section class="pagination-section">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="archive-layout-one.html#" tabindex="-1"><i class="fas fa-arrow-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="archive-layout-one.html#">1</a></li>
                        <li class="page-item"><a class="page-link" href="archive-layout-one.html#">2</a></li>
                        <li class="page-item"><a class="page-link" href="archive-layout-one.html#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="archive-layout-one.html#"><i class="fas fa-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </section>
            <!-- pagination section end -->
@endsection