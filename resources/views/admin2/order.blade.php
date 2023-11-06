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
                        <table class="table table-dark " style="color:rgb(223, 223, 223)">
                            <thead class="table-primary">
                                <tr>
                                    <th> # </th>
                                    <th> Title </th>
                                    <th> Price </th>
                                    <th> Description </th>
                                    <th> Quantity </th>
                                    <th> Photo </th>
                                    <th> Action </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sno = 1;
                                @endphp

                                @foreach ($orders as $order)
                                    <tr>
                                        <td> {{$sno}} </td>
                                        <td> {{ $order->title }} </td>
                                        <td> $ {{ $order->price }} </td>
                                        <td> {{ $order->description }} </td>
                                        <td> {{ $order->quantity }} </td>
                                        <td> <img src="{{ asset('storage/' . $order->image) }}"
                                                style="width: 100px;height:70px;border-radius:0" alt=""> </td>
                                        <td>
                                            <div class="d-flex" >
                                                <form method="post" action="{{url('/product/status/'.$order->id)}}" class="d-flex">
                                                    @method('PUT')
                                                    @csrf
                                                <select class="form-select form-select-sm w-50" name="status" id="" style="margin-inline-end: 10px">
                                          
                                            <option  {{$order->status == 0 ? 'selected' : ""}} value="0">Processing</option>
                                            <option
                                             {{$order->status == 1 ? 'selected' : ""}}
                                             value="1">Shipped</option>
                                            <option  {{$order->status == 2 ? 'selected' : ""}} value="2">Delievered</option>

                                        </select>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                            </div>
                                       </td>
                                       <td>
                                        
                                           @if ($order->status == 0)
                                               <span class="badge badge-warning">Processing</span>
                                                 @elseif($order->status == 1) 
                                               <span class="badge badge-info">Shipped</span>
                                                 @else
                                               <span class="badge badge-success">Delievered</span>   
                                               
                                           @endif 
                                        
                                    
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
