@extends('layouts.pages-layout')
@php
    use App\Enums\AttendanceEnum;
@endphp

@section('pageTitle', isset($pageTile)? $pageTile: 'tickets')


@section('pageHeader')
    <div class="page-header">
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
                    Add new
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

 <div class="row">
     <div class="col-md-7 col-6">
         <form action="{{route('tickets.store')}}" method="post" class="row">
             @csrf
             <div class="mb-3 col-md-12">
                 <label class="form-label">Patients</label>
                 <select class="form-select" name="patient_id" id="userId" required>
                     @foreach ($visitors as $visitor)
                         <option value="{{$visitor->id}}" >{{$visitor->name}}</option>
                     @endforeach
                 </select>
             </div>
             <div class="mb-3 col-md-12">
                 <div class="form-label">Attendance</div>
                 <div>
                     @foreach ((new ReflectionClass(App\Enums\AttendanceEnum::class))->getConstants() as $type)
                         <label class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="attendance" value="{{$type}}"
                                 {{ $type == App\Enums\AttendanceEnum::FRESH ? 'checked' : '' }}>
                             <span class="form-check-label">{{$type}}</span>
                         </label>
                     @endforeach

                 </div>
             </div>
             <div class="mb-3 col-md-12">
                 <label class="form-label">Doctors</label>
                 <select class="form-select" name="doctor_id" required>
                     @foreach ($doctors as $doctor)
                         <option value="{{$doctor->id}}" >{{$doctor->name}}</option>
                     @endforeach
                 </select>
             </div>
             <div class="mb-3 col-md-6">
                 <label class="form-label">Number</label>
                 <input type="text" class="form-control" name="number" placeholder="ticket number" required/>
             </div>
             <div class="mb-3 col-md-6">
                 <label class="form-label">Status</label>
                 <select class="form-select" name="status" >
                     @foreach ((new ReflectionClass(App\Enums\TicketCaseEnum::class))->getConstants() as $status)
                         <option value="{{$status}}" {{ $status == App\Enums\TicketCaseEnum::WAITING ? 'selected' : '' }}>{{$status}}</option>
                     @endforeach
                 </select>
             </div>
{{--             <div class="hr-text col-md-12">Service info</div>--}}
{{--             <div class="mb-3 col-md-12">--}}
{{--                 <label class="form-label">Diagnosis</label>--}}
{{--                 <input type="text" class="form-control" name="diagnosis" placeholder="diagnosis"/>--}}
{{--             </div>--}}
{{--             <div class="mb-3 col-md-12">--}}
{{--                 <label for="Treatment" class="form-label">Treatment</label>--}}
{{--                 <textarea class="form-control" id="Treatment" name="treatment" rows="3"></textarea>--}}
{{--             </div>--}}

             <!-- Add more form fields as needed -->
             <button type="submit" class="btn btn-primary col-md-2">Submit</button>
         </form>
     </div>

     <div class="col-md-5 col-6">
         <div class="row" id="userContainer">
             <div class="hr-text col-md-12">User info</div>
             <div class="col-12" id="infoContainer"></div>
         </div>
     </div>

 </div>

@endsection

 @section('scripts')

     <script>
         $(document).ready(function() {
             const vistorId = "#userId";
             // Function to handle the AJAX request
             function makeAjaxRequest(userId) {
                let userIfoTemp =`
                             <div class="alert alert-warning col-12" role="alert">
                                 There is no data!
                             </div>
                     `;

                 $.ajax({
                     url: "{{ route('users.show') }}/" + userId,
                     type: "GET", // Use the appropriate HTTP method (POST, GET, etc.)
                     success: function(response) {
                         // Handle the success response from the server
                         console.log('response', response);
                         let user = response.response;
                         if(user){
                             userIfoTemp = `
                            <form class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Name</label>
                                    <input disabled type="text" class="form-control" name="name" value="${user.name}" required />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Number of age years</label>
                                                    <input disabled type="number" min="0" class="form-control" name="age_year" value="${user.age_year}"  required />
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Number of age months</label>
                                                    <input disabled type="number" min="0" max="12" class="form-control" name="age_month" value="${user.age_month}"  required />
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label class="form-label">Number of age days</label>
                                                    <input disabled type="number" min="0" max="30" class="form-control" name="age_day" value="${user.age_day}" required />
                                                </div>

                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Address</label>
                                    <input disabled type="text" class="form-control" name="address" value="${user.address}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input disabled type="text" class="form-control" name="phone_number" value="${user.phone_number}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input disabled type="email" id="email" name="email" value="${user.email}" class="form-control">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Gender</label>
                                    <input disabled type="text" class="form-control" name="gender" value="${user.gender}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Role</label>
                                    <input disabled type="text" class="form-control" name="role" value="${user.role}" />
                                </div>
                            </form>
                         `;
                         }

                         $("#infoContainer").html('');
                         $("#infoContainer").html(userIfoTemp);
                     },
                     error: function(xhr, status, error) {
                         // Handle the error response from the server
                         console.log('error', error);

                         $("#infoContainer").html('');
                         $("#infoContainer").html(userIfoTemp);
                     }
                 });

             }

             // Bind the change event to the select dropdown
             $(vistorId).change(function() {
                 let userId = $(this).val(); // Get the selected value
                 if (userId !== "") {
                     makeAjaxRequest(userId); // Call the AJAX function with the selected role
                 }
             });
         //    reload page
             makeAjaxRequest($(vistorId).val());

         });
     </script>
 @endsection
