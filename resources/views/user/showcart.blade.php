@extends('user.layout.main')

@section('content')
    

    <!-- Page Content -->
    <!-- Banner Starts Here -->

    <!-- Banner Ends Here -->

    <div class="container" style="padding: 120px">
        <div class="table-responsive">
            <table class="table table-bordered  text-center">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col" style="width: 100px">Total</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    <form method="post" action="{{url('/checkout')}}">
                        @csrf

                        @unless ($carts== "")
                            
                    
                    @foreach ($carts as $cart)
                        <tr>


                            <th scope="row">{{ $sno }}</th>
                            {{-- {{dd($product-)}} --}}
                            <td>{{ $cart->title }} </td>
                            <input type="hidden" name="title[]" value="{{ $cart->title }}">
                            <td> <img src="{{ asset('storage/' . $cart->image) }}"
                                    style="width: 100px;height:70px;border-radius:0" alt="">
                            </td><input type="hidden" name="image[]" value="{{ $cart->image }}">
                            <td>{{ $cart->description }}</td><input type="hidden" name="description[]" value="{{ $cart->description }}">
                            <td>{{ $cart->price }} </td><input type="hidden" name="price[]" value="{{ $cart->price }}">
                            <td>x {{ $cart->quantity }}</td><input type="hidden" name="quantity[]" value="{{ $cart->quantity }}">
                            <td>{{ $cart->quantity * $cart->price }}</td>
                            <td> <a href="{{url('/deletecart',$cart->id)}}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @php
                            $sno++;
                        @endphp
                    @endforeach
                     

                    <tr class="">
                        <th colspan="6">Final</th>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            @php
                                $total = $total + $cart->quantity * $cart->price;

                            @endphp
                        @endforeach

                        
                        <td> {{ $total }} </td>
                        <td><button type="submit" class="btn btn-success">Checkout</button></td>
                        <input type="hidden" name="total" value="{{$total}}">
                        @endunless

                    </tr>

                    </form>

                </tbody>
            </table>

        </div>
    </div>

@endsection


