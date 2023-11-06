<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              {{-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> --}}
              
              <form action="" class="form-inline p-4" style="float: right">
                <input type="search" class="form-control" name="search" value={{$search}} >
                <input class="btn btn-success" type="submit" value="Search">
              </form>

            </div>
          </div>

          @foreach ($products as $product)
              
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="{{asset('storage/'.$product->image)}}" alt="" style="height: 250px" class="shadow-sm"></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}} </h4></a>
                <h6>${{$product->price}} </h6>
                <p>{{$product->description}}.</p>

                {{-- <div class="d-flex"> --}}
                  <form action="{{url('addproduct/'.$product->id)}}" method="post" class="d-flex">
                    @csrf

                    <input type="number" class="col-md-3 " min="1" max="10" value="1" name="cart" style="margin-inline-end: 10px">
                    <button class="btn btn-primary btn-sm " type="submit">Add </button>

                  </form>
                {{-- </div> --}}
              

              </div>
            </div>
          </div>
          @endforeach

          
        </div>
        <div class="justify-content-end container row">
       {{$search == "" ? $products->links('pagination::bootstrap-5'): "" }}
        </div>
      </div>
    </div>