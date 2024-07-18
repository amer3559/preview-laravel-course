@extends('layouts.master')
@section('pageTitle', isset($pageTile)? $pageTile: 'about')

@section('content')
    @include('components.about')
@endsection
