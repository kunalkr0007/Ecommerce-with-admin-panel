@extends('admin2.layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> View Users </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">View User</li>
            </ol>
        </nav>
    </div>

     @if (session()->has('message'))

        <div class="col-md-4 ms-auto justify-content-end mb-3 mt-0 alert alert-success alert-dismissible fade show" role="alert">
            <d5>{{session('message')}}.</d5>
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Details</h4>

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead class="table-primary">
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th> Address </th>
                                    <th> Actions </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sno = 1;
                                @endphp

                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{$sno}} </td>
                                        <td> {{ $user->name }} </td>
                                        <td>  {{ $user->email }} </td>
                                        <td> {{ $user->phone }} </td>
                                        <td> {{ $user->address }} </td>
                                       <td>
                                           <a href="{{url('/user/order/'.$user->id)}}"  class="btn btn-primary">View Order</a>
                                           <a href="{{url('/user/delete/'.$user->id)}}" class="btn btn-danger">Delete</a> </td>
                                        </td>
                                    </tr>
                                    @php  $sno++; @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
