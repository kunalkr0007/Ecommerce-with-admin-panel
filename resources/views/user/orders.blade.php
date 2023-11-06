@extends('user.layout.main')

@section('content')

 <div class="container" style="padding: 120px">
    <h1 class="mb-4">{{auth()->user()->name ?? ""}} Orders</h1>
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
                        <th scope="col">Status</th>
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
                           
                            <td> <img src="{{ asset('storage/' . $cart->image) }}"
                                    style="width: 100px;height:70px;border-radius:0" alt="">
                            </td>
                            <td>{{ $cart->description }}</td>
                            <td>{{ $cart->price }} </td>
                            <td>x {{ $cart->quantity }}</td>
                            <td>{{ $cart->quantity * $cart->price }}</td>
                            <td> <a href="{{url('/deletecart',$cart->id)}}" >

                              @if ($cart->status == 0)
                                               <span class="badge badge-warning">Processing</span>
                                                 @elseif($cart->status == 1) 
                                               <span class="badge badge-info">Shipped</span>
                                                 @else
                                               <span class="badge badge-success">Delievered</span>   
                                               
                                           @endif 
                               
                            </a></td>
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

                        
                        <td colspan="2"> {{ $total }} </td>
                        
                        @endunless

                    </tr>

                    </form>

                </tbody>
            </table>

        </div>
    </div>
    
@endsection