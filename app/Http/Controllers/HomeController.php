<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(Request $request)
    {
        $usertype = auth()->user()->usertype;

        // if($usertype == 1)
        // {
        //     return view('admin2.home');
        // }
        if($usertype == 0 || $usertype == 1)
        {
            $search = $request->search ?? "";
        
            if($search == "")
            {
                $cart = cart::all();
                $product = Product::latest()->paginate(3);
                return view('user.home',
            [
                'search' => $search,
                'products'=> $product,
                'cart' => $cart
            ]);
            }
            else
            {
                $cart = cart::all();
                 $product = Product::latest()->where('title', 'LIKE', "%$search%")->get();
                 return view('user.home',
            [
                'search' => $search,
                'products'=> $product,
                'cart' => $cart
            ]);
            }
        }
    }

    public function index(Request $request)
    {

        // if(Auth::id())
        // {
        //     return redirect('home');
        // }
        // else
        // {
            $search = $request->search ?? "";
        
            if($search == "")
            {
                $user = (auth()->user()->id ?? "");
                if($user != "")
                {
                    $cart =  User::find($user)->cart()->get();
                  
                }
                else
                {
                    $cart = "";
                }
                // dd($cart);
                $product = Product::latest()->paginate(3);
                return view('user.home',
            [
                'search' => $search,
                'products'=> $product,
                'carts' => $cart
            ]);
            }
            else
            {
                 $user = (auth()->user()->id ?? "");
                if($user != "")
                {
                    $cart =  User::find($user)->cart()->get();
                  
                }
                else
                {
                    $cart = "";
                }
                 $product = Product::latest()->where('title', 'LIKE', "%$search%")->get();
                 return view('user.home',
            [
                'search' => $search,
                'products'=> $product,
                'carts' => $cart
            ]);
            }



            // }


        }

        public function addproduct(Request $request, $id)
        {

            // $product['product_id'] = Product::find($id);

            if(Auth::id())
            {

           $product = Product::find($id);

            $data = [
                'user_id' => auth()->user()->id,
                'title'=> $product->title,
                'price'=> $product->price,
                'description'=> $product->description,
                'quantity' => $request->cart,
                'image' => $product->image
            ];
         

            cart::create($data);

            return back();
            }
            else

            return redirect()->route('login');

            // dd($product);
            // return view('user.showcart',
            // [
            //     'product' =>  $product,
            //     'quantity' => $request->cart
            // ]);

            
        }

        public function showcart(Request $reqeust)
        {   
            if(Auth::id())
            {

                $user = (auth()->user()->id ?? "");
                $cart = User::find($user)->cart()->get();
            }
            else{
                $user = "";
                $cart = "";
            }
            
            // $cart = cart::all();
            
            return view('user.showcart',
        [
            'carts' => $cart
        ]);
        }

        public function deletecart(Request $reqeust,$id)
        {   

            if(Auth::id())
            {

                $cart = cart::find($id);
                
                $cart->delete();
                
                return back();
            }

            else redirect('/');
        }

        public function checkout(Request $request)
        {   
            
            // $data = [
            //     'title'=> $request->title,
            //     'price'=> $request->price,
            //     'description'=> $request->title,
            //     'quantity'=> $request->title
            // ];

            foreach ($request->title as $key => $value) {
                // print_r($request->title[$key]. ' ');
                // print_r($request->title[$key]. ' ');
                // print_r($request->price[$key]. ' ');
                // print_r($request->description[$key]. ' ');
                // print_r($key .' ') ;

                $data = [
                'name' => auth()->user()->id,
                'title'=> $request->title[$key],
                'price'=> $request->price[$key],
                'description'=> $request->description[$key],
                'quantity'=> $request->quantity[$key],
                'image'=> $request->image[$key]
            ];

            order::create($data);
            cart::truncate();

            
            // dd($request->total);
            // dd($data);

            // cart::all()->delete();
       
                
                
            }
            return redirect('/');
        //     return view('user.checkout',
        // [
        //     'carts' => $data
        // ]);
        }

        public function orders()
        {
            $user = (auth()->user()->id ?? "");
                if($user != "")
                {
                    $cart =  User::find($user)->order()->get();
                  
                }
                else
                {
                    $cart = "";
                }

            return view('user.orders',
        [
            'carts' => $cart,
            'user' => $user
        ]);
        }


}
