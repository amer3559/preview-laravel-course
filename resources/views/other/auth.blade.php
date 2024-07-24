@extends('layouts.master')

@section('pageTitle', isset($pageTile)? $pageTile: 'Auth')

@section('content')
    @include('components.login')
@endsection

