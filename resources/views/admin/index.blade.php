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
    @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{ Session::get('info') }}</p>
            </div>
        </div>
    @endif
    <table class="table table-responsive table-center">
        <thead>
        <tr>
            <th>#</th>
            <th class="text-nowrap">Title</th>
            <th class="text-nowrap">Content</th>
            <th class="text-nowrap">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $index => $post)
            <tr>
                <th>{{++$index}}</th>
                <th>{{ $post->title }}</th>
                <th>{{ $post->content }}</th>
                <td>
                    <a href="{{ route('admin.edit', $post->id) }}" title="edit"
                       class="btn btn-info  btn-icon" aria-label="Button">
                        @include('components.edit-icon')
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
