@extends('layouts.admin')

@section('pageTitle', isset($pageTile)? $pageTile: 'admin.index')

@section('pageHeader')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                admin dashboard
            </div>
            <h2 class="page-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24"
                     viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 5l0 2"></path>
                    <path d="M15 11l0 2"></path>
                    <path d="M15 17l0 2"></path>
                    <path
                        d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                    </path>
                </svg>
                all posts
            </h2>
        </div>
        <div class="col-auto ms-auto">
            <div class="btn-list">
            <span class="d-none d-sm-inline">
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-search"
                         width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414">
                        </path>
                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M20.2 20.2l1.8 1.8"></path>
                    </svg>
                </button>
            </span>
                <a href="{{route('admin.create')}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Add
                </a>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <p><strong>Learning Laravel</strong>
                <a href="{{ route('admin.edit', ['id' => 1]) }}">Edit</a>
            </p>
        </div>
    </div>
@endsection
