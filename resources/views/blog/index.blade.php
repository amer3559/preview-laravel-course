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

            <div class="row">
        @foreach ($posts as $index => $post)
                <div class="card mb-3 col-12 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <div class="row">
                            <div class="col-11">
                                <div class="row">
                                    <div class="datagrid-title">
                                        <h3 class="card-title  align-center col-12">{{ $post->title }}</h3>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="datagrid">
                                        <div class="datagrid-item">
                                            <div class="datagrid-title">content</div>
                                            <div class="datagrid-content">{{ $post->content }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="row">
                                    <div class="datagrid">
                                        <div class="datagrid-item">
                                            <div class="datagrid-content">
                                                <div class="d-flex align-items-center">
                                <span class="avatar avatar-xs me-2 rounded">
                                   <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-tag"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" /></svg>
                                </span>
                                                    tage1
                                                </div>
                                            </div>
                                        </div>
                                        <div class="datagrid-item">
                                            <div class="datagrid-content">
                                                <div class="d-flex  align-items-center">
                                <span class="">
                                   <a href="#" title="like"
                                      class="btn-icon" aria-label="Button">
                                                        <svg class="icon-pulse" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-thumb-up"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3" /></svg>
                                                    </a>
                                </span>
                                                    <span class="badge bg-blue">5</span>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="datagrid-content">
                                                <div class="d-flex align-items-center">
                                <span class="avatar avatar-xs me-2 rounded">
                                    @include('components.more-icon')
                                </span>
                                                    more...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        @endforeach
            </div>

@endsection
