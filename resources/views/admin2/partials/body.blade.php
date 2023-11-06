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
                                    <td> {{ $sno }} </td>
                                    <td> {{ $product->title }} </td>
                                    <td> $ {{ $product->price }} </td>
                                    <td> {{ $product->description }} </td>
                                    <td> {{ $product->quantity }} </td>
                                    <td> <img src="{{ asset('storage/' . $product->image) }}"
                                            style="width: 100px;height:70px;border-radius:0" alt=""> </td>
                                    <td><a href="{{ url('/product/update/' . $product->id) }}" href
                                            class="btn btn-primary">Update</a>
                                        <a href="{{ url('/product/delete/' . $product->id) }}"
                                            class="btn btn-danger">Delete</a>
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
                                    <td> {{ $sno }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->phone }} </td>
                                    <td> {{ $user->address }} </td>
                                    <td>
                                        <a href="{{ url('/user/order/' . $user->id) }}"
                                            class="btn btn-primary">View</a>
                                        <a href="{{ url('/user/delete/' . $user->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
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
                                    <td> {{ $sno }} </td>
                                    <td> {{ $order->title }} </td>
                                    <td> $ {{ $order->price }} </td>
                                    <td> {{ $order->description }} </td>
                                    <td> {{ $order->quantity }} </td>
                                    <td> <img src="{{ asset('storage/' . $order->image) }}"
                                            style="width: 100px;height:70px;border-radius:0" alt=""> </td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="post" action="{{ url('/product/status/' . $order->id) }}"
                                                class="d-flex">
                                                @method('PUT')
                                                @csrf
                                                <select class="form-select form-select-sm w-50" name="status"
                                                    id="" style="margin-inline-end: 10px">

                                                    <option {{ $order->status == 0 ? 'selected' : '' }} value="0">
                                                        Processing</option>
                                                    <option {{ $order->status == 1 ? 'selected' : '' }} value="1">
                                                        Shipped</option>
                                                    <option {{ $order->status == 2 ? 'selected' : '' }} value="2">
                                                        Delievered</option>

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

