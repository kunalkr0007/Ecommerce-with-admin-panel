@extends('admin2.layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title"> View Product </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Product</li>
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
                    <h4 class="card-title">Product Details</h4>

                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead class="table-primary">
                                <tr>
                                    <th> # </th>
                                    <th> Title </th>
                                    <th> Price </th>
                                    <th> Description </th>
                                    <th> Quantity </th>
                                    <th> Photo </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sno = 1;
                                @endphp

                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{$sno}} </td>
                                        <td> {{ $product->title }} </td>
                                        <td> $ {{ $product->price }} </td>
                                        <td> {{ $product->description }} </td>
                                        <td> {{ $product->quantity }} </td>
                                        <td> <img src="{{ asset('storage/' . $product->image) }}"
                                                style="width: 100px;height:70px;border-radius:0" alt=""> </td>
                                        <td><a href="{{url('/product/update/'.$product->id)}}" href class="btn btn-primary">Update</a>
                                       <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger">Delete</a> </td>
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
