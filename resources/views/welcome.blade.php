@extends('layouts.master')
@section('pageTitle', isset($pageTile)? $pageTile: 'welcome')
@section('stylesheets')
    <link href="{{asset('css/home.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    @include('components.carousel')
@endsection
