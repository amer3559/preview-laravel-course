@extends('layouts.pages-layout')
@php
    use App\Enums\AttendanceEnum;
@endphp

@section('pageTitle', isset($pageTile)? $pageTile: 'running tickets')

@section('pageHeader')

    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                here our running tickets
            </div>
            <h2 class="page-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-capture" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                    <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                    <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                </svg>
                {{isset($pageTile)? $pageTile: 'running tickets'}}
            </h2>
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

    <div class="row">
        @foreach ($tickets as $index => $ticket)
            <div class="card mb-3 col-12 d-flex flex-column">
                {{-- <a href="#">--}}
                {{-- <img class="card-img-top" src="{{ asset('static/logo.png') }}" alt="" />--}}
                {{-- </a>--}}
                <div class="card-body d-flex flex-column">
                    <div class="row">
                        <h3 class="card-title col-11">Ticket number : {{$ticket->number}}</h3>
                        <div class="col-1 d-flex justify-content-end align-items-center">
                            <span class="badge bg-blue">{{++$index}}</span>
                        </div>
                    </div>

                    <div class="">
                        <div class="hr-text col-md-12">Visitor info </div>
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Patient</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2 rounded" style="background-image: url({{ asset('static/logo.png') }})"></span>
                                        {{$ticket->visitor->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Age</div>
                                <div class="datagrid-content">{{$ticket->visitor->age_year}} years : {{$ticket->visitor->age_month}} months : {{$ticket->visitor->age_day}} days </div>

                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Gender</div>
                                <div class="datagrid-content">{{$ticket->visitor->gender}}</div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">address</div>
                                <div class="datagrid-content">
                                    {{$ticket->visitor->address}}
                                </div>
                            </div>
                        </div>
                        <div class="hr-text col-md-12">Ticket info</div>
                        <div class="datagrid" style="grid-template-columns: 10% 88%;">
                            <div class="datagrid-item">
                                <div class="datagrid-title">ATTENDANCE</div>
                                <div class="datagrid-content">
                            <span class="status @if($ticket->attendance == App\Enums\AttendanceEnum::FRESH) status-success @else status-warning @endif">
                                {{$ticket->attendance}}
                            </span>
                                </div>
                            </div>
                            <form class="row" id="my-form" action="{{route('operations.finish', $ticket->id)}}" method="post">
                                @csrf
                                <div class="datagrid-item col-md-6">
                                    {{-- <div class="datagrid-title">Diagnosis</div>--}}
                                    {{-- <div class="datagrid-content">--}}
                                    {{-- <input type="text" class="form-control " name="diagnosis" />--}}
                                    {{-- </div>--}}
                                    <div class="form-group">
                                        <label for="diagnosis">Diagnosis</label>
                                        <textarea class="form-control" id="diagnosis" name="diagnosis"></textarea>
                                    </div>
                                </div>
                                <div class="datagrid-item col-md-6">
                                    {{-- <div class="datagrid-title">Treatment</div>--}}
                                    {{-- <div class="datagrid-content">--}}
                                    {{-- <input type="text" class="form-control " name="treatment" />--}}
                                    {{-- </div>--}}
                                    <div class="form-group">
                                        <label for="treatment">Treatment</label>
                                        <textarea class="form-control" id="treatment" name="treatment"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-4 mt-auto">
                        <span class="avatar" style="background-image: url({{ asset('static/logo.png') }})"></span>
                        <div class="ms-3">
                            <a href="#" class="text-body">{{$ticket->doctor->role}}</a>
                            <div class="text-secondary">{{$ticket->doctor->name}}</div>
                        </div>
                        <div class="ms-auto">
                            <input type="submit" class="btn btn-danger" value="Finish" form="my-form" />
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
