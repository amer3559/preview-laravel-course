@extends('layouts.pages-layout')
@php
    use App\Enums\UserRoleEnum;
@endphp

@section('pageTitle', isset($pageTile)? $pageTile: 'visitors')


@section('pageHeader')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                    welcome our visitors
                </div>
                <h2 class="page-title">
                    Update : {{$user->name}}
                </h2>
            </div>

        </div>
    </div>

@endsection

@section('content')
@if (session()->has('success'))
    <div class="row">
            <div class="alert alert-success alert-dismissible" role="alert" >
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="alert-title">{!! session('success') !!}</h4>

                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
     </div>
@endif

    <form action="{{route('users.update', $user->id)}}" method="post" class="row">
    @csrf
        <div class="mb-3 col-md-6">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" required/>
        </div>
        <div class="mb-3 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Number of age years</label>
                            <input type="number"  min="0"  class="form-control" name="age_year" value="{{$user->age_year}}" required/>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Number of age months</label>
                            <input type="number"  min="0" max="12" class="form-control" name="age_month" value="{{$user->age_month}}" required/>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Number of age days</label>
                            <input type="number"  min="0" max="30" class="form-control" name="age_day" value="{{$user->age_day}}" required/>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    <div class="mb-3 col-md-12">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="{{$user->address}}"/>
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone_number" value="{{$user->phone_number}}"/>
    </div>
    <div class="mb-3 col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control">
    </div>
    <div class="mb-3 col-md-6">
        <div class="form-label">Gender</div>
        <div>
            @foreach ((new ReflectionClass(App\Enums\GenderEnum::class))->getConstants() as $type)
                <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="{{$type}}" {{ $type == $user->gender ? 'checked' : '' }}>
                    <span class="form-check-label">{{$type}}</span>
                </label>
            @endforeach

        </div>
    </div>
        <div class="mb-3 col-md-6">
            <label class="form-label">Role</label>
            <select class="form-select" name="role">
                @foreach ((new ReflectionClass(App\Enums\UserRoleEnum::class))->getConstants() as $role)
                    <option value="{{$role}}" {{ $role == $user->role ? 'selected' : '' }}>{{$role}}</option>
                @endforeach
            </select>
        </div>
    <!-- Add more form fields as needed -->
    <button type="submit" class="btn btn-primary col-md-2">Submit</button>
</form>

@endsection
