@extends('layouts.pages-layout')
@section('pageTitle', isset($pageTile)? $pageTile: 'home')
@section('stylesheets')
    <link href="{{asset('css/home.css')}}" rel="stylesheet"/>
@endsection
@section('content')
{{--  Carousel  --}}
<div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" alt="" src="{{asset('images/slider1.jpg')}}"  />
        </div>
        <div class="carousel-item active">
            <img class="d-block w-100" alt="" src="{{asset('images/slider2.jpg')}}"  />
        </div>
        <div class="carousel-item active">
            <img class="d-block w-100" alt="" src="{{asset('images/slider3.jpg')}}"  />
        </div>

    </div>
    <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
@endsection
