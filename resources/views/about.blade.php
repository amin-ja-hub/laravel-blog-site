@extends('layouts.app')
@section('title')
home
@endsection

@section('content')
    <!-- header end -->
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                <h2>About</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="about.html#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- page header end -->
    <!-- About section -->
    <section class="about-section">
        <div class="container">
            <div class="about-inner">
            <div class="row no-gutters">
                <div class="col-md-7">
                <div class="about-text">
                    <h3 class="about-title">About title</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur beatae tempora molestiae, sed
                    aspernatur natus accusantium temporibus corrupti nam magni nulla recusandae similique atque,
                    repellendus facere repellat veniam quam provident. Lorem ipsum dolor sit amet consectetur, adipisicing
                    elit. Soluta, perferendis.</p>
                </div>
                </div>
                <div class="col-md-5">
                <div class="about-img">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/about.jpg" alt="">
                </div>
                </div>

            </div>
            </div>
            <div class="about-inner-2">
            <div class="row no-gutters align-items-center">
                <div class="col-md-7">
                <div class="about-img">
                    <img src="https://demo.codevibrant.com/html/kavya/assets/images/beautiful-girl.jpg" alt="">
                </div>
                </div>
                <div class="col-md-5">
                <div class="about-text">
                    <h3 class="about-title">About title</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur beatae tempora molestiae, sed
                    aspernatur natus accusantium temporibus corrupti nam magni nulla recusandae similique atque,
                    repellendus facere repellat veniam quam provident.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- About section -->
@endsection