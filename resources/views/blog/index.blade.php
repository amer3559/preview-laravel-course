@extends('layouts.master')

@section('pageTitle', isset($pageTile)? $pageTile: 'blog.index')

@section('pageHeader')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                The beautiful blog:)
            </div>
            <h2 class="page-title">
            <span class="text-red">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-tabler icons-tabler-outline icon-tabler-access-point">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12l0 .01" />
                    <path d="M14.828 9.172a4 4 0 0 1 0 5.656" />
                    <path d="M17.657 6.343a8 8 0 0 1 0 11.314" />
                    <path d="M9.168 14.828a4 4 0 0 1 0 -5.656" />
                    <path d="M6.337 17.657a8 8 0 0 1 0 -11.314" />
                </svg>
            </span>
                new posts
            </h2>
        </div>
    </div>
@endsection

@section('content')
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
                <th>{{ $post['title'] }}</th>
                <th>{{ $post['content'] }}</th>
                <td>
                    <a href="{{route('blog.post', $post->id )}}" title="read more..."
                       class="btn btn-info  btn-icon" aria-label="Button">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-dots-circle-horizontal"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M8 12l0 .01" /><path d="M12 12l0 .01" /><path d="M16 12l0 .01" /></svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
