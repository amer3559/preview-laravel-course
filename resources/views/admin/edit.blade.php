@extends('layouts.admin')
@section('pageTitle', isset($pageTile)? $pageTile: 'update post')

@section('pageHeader')
    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                edit post
            </div>
            <h2 class="page-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 5l0 2"></path>
                    <path d="M15 11l0 2"></path>
                    <path d="M15 17l0 2"></path>
                    <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path>
                </svg>
              {{$post->title}}
            </h2>
        </div>

    </div>
@endsection

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input
                        type="text"
                        class="form-control"
                        id="content"
                        name="content"
                        value="{{ $post->content }}">
                </div>
                <div class="form-group">
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]"
                                       value="{{ $tag->id }}"
                                    {{ $post->tags->contains($tag->id) ? 'checked' : '' }}> {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @csrf
                <input type="hidden" name="id" value="{{ $postId }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
