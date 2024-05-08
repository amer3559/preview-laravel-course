@extends('layouts.pages-layout')

@section('pageTitle', isset($pageTile)? $pageTile: 'tickets')

@section('pageHeader')

    <div class="row align-items-center">
        <div class="col">
            <div class="page-pretitle">
                here our tickets
            </div>
            <h2 class="page-title">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M15 5l0 2"></path>
                    <path d="M15 11l0 2"></path>
                    <path d="M15 17l0 2"></path>
                    <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2"></path>
                </svg>
                fresh tickets
            </h2>
        </div>
        <div class="col-auto ms-auto">
            <div class="btn-list">
        <span class="d-none d-sm-inline">

                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M11.36 20.213l-2.36 .787v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414"></path>
   <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
   <path d="M20.2 20.2l1.8 1.8"></path>
</svg>
    </button>
        </span>
                <a href="{{route('tickets.create')}}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Add
                </a>
                <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @php
        use App\Enums\GenderEnum;
    @endphp
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New visitor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Your name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="phone number" />
                    </div>
                    <label class="form-label">Gender</label>
                    <div class="form-selectgroup-boxes row mb-3">

                        @foreach ((new ReflectionClass(App\Enums\GenderEnum::class))->getConstants() as $role)

                            <div class="col-md-6">
                                <label class="form-selectgroup-item">
                                    <input type="radio" name="gender-type" value="1" class="form-selectgroup-input"  />
                                    <span class="form-selectgroup-label d-flex align-items-center p-3">
                <span class="me-3">
                  <span class="form-selectgroup-check"></span>
                </span>
                <span class="form-selectgroup-label-content">
                  <span class="form-selectgroup-title strong mb-1">{{$role}}</span>

                </span>
              </span>
                                </label>
                            </div>
                        @endforeach


                    </div>

                </div>

                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Create new
                    </a>
                </div>
            </div>
        </div>
    </div>

        @if(Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            @if (is_array($data))
                @foreach ($data as $msg)
                    <div class="alert alert-success" role="alert" style="display: flex; justify-content: space-between;">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                        {{ $msg }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @else
                <div class="alert alert-success" role="alert">
                    <i class="fa fa-check"></i>
                    {{ $data }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        @endif
    <table class="table table-responsive table-center" >
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th colspan="3" class="text-nowrap">Ticket</th>
            <th rowspan="2" class="text-nowrap">Patient</th>
            <th rowspan="2" class="text-nowrap">Attendance</th>
            <th rowspan="2" class="text-nowrap">Doctor</th>
            <th rowspan="2" class="text-nowrap">Diagnosis</th>
            <th rowspan="2" class="text-nowrap">Treatment</th>
            <th rowspan="2" colspan="2" class="text-nowrap">Actions</th>

        </tr>
        <tr>
            <th>Number</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tickets as $index => $ticket)
            <tr
                @if($ticket->status == App\Enums\TicketCaseEnum::FINISHED )
                 class="table-dark"
                @elseif($ticket->status == App\Enums\TicketCaseEnum::WAITING )
                 class="table-primary"
                @else
                 class="table-danger"
                @endif
            >
                <th>{{++$index}}</th>
                <td>{{$ticket->number}}</td>
                <td>{{ $ticket->created_at}}</td>
                <td>{{$ticket->status}}</td>
                <td>{{$ticket->visitor->name}}</td>
                <td>{{$ticket->attendance}}</td>
                <td>{{$ticket->doctor->name}}</td>
                <td>{{$ticket->diagnosis}}</td>
                <td>{{$ticket->treatment}}</td>

                <td>
                    @if($ticket->status == App\Enums\TicketCaseEnum::WAITING)
                     <a href="{{route('tickets.edit', $ticket->id)}}" title="Edit" class="btn btn-warning  btn-icon" aria-label="Button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                            <path d="M16 5l3 3"></path>
                            <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                        </svg>
                     </a>
                    @endif
                </td>
                <td>
                    @if($ticket->status == App\Enums\TicketCaseEnum::WAITING)
                    <form method="post" action="{{route('tickets.destroy',$ticket->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>





@endsection
