@extends('admin2.layout.main')

@section('content')
    <div class="page-header ">
        <h3 class="page-title  "> Add Product </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
      <div class="col-md-6 m-auto grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

                    <h4 class="card-title">Add Product</h4>
                    <p class="card-description"> Product Details </p>

                    <form method="post" action="{{ url('uploadproduct') }}" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Title:</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="exampleInputUsername2"
                                    placeholder="Give a product title">
                                @error('title')
                                    <small class="text-danger ">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Price:</label>
                            <div class="col-sm-9">
                                <input type="number" name="price" class="form-control" id="exampleInputEmail2"
                                    placeholder="Give a price">
                                @error('price')
                                    <small class="text-danger ">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description:</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" class="form-control" id="description"
                                    placeholder="Give a description">
                                @error('description')
                                    <small class="text-danger ">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label">Quantity:</label>
                            <div class="col-sm-9">
                                <input type="number" name="quantity" class="form-control" id="quantity"
                                    placeholder="Product Quantity">
                                @error('quantity')
                                    <small class="text-danger ">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 col-form-label">Photo:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" id="photo">
                                {{-- <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number"> --}}
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        {{-- <button class="btn btn-dark">Cancel</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
