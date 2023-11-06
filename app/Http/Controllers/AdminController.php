<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // return view('admin.product');
        // if(auth()->user()->usertype == 1)
        // return view('admin2.home');

        $product = Product::latest()->get();
        $users = User::where('usertype', 0)->get(); 
        $order = order::all();

        return view('admin2.home',
    [
        'products' => $product,
        'users' => $users,
        'orders' => $order
    ]);

        // else
        // return back();
    }

    public function addProduct()
    {
        // return view('admin.product');
        return view('admin2.product');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        // return view('admin.product');
        return view('admin2.update-product',
    [
        'product' => $product
    ]);
    }

    public function updateProduct($id,Request $request)
    {
        $formFields = $request->validate(
            [
                'title' => 'required',
                'price' => 'required',
                'description' => 'required',
                'quantity' => 'required',
            ]
            );
            if($request->hasFile('image')){
                $imagename = time(). '.' .$request->file('image')->getClientOriginalExtension();
                $formFields['image'] = $request->file('image')->storeAs('productimage', $imagename, 'public');
            }
            // dd($imagename);

        $product = Product::find($id);
        $product->update($formFields);
        // return view('admin.product');

        return back()->with('message', 'Product Updated Successfully');
    }

    public function viewProduct()
    {
        $product = Product::latest()->get();

        return view('admin2.show-product',
    [
        'products' => $product
    ]);
    }

    public function deleteProduct($id)
    {
      $product = Product::find($id);
      $product->delete();
      return back()->with('message', 'Product Deleted Successfully');


    
    }

    public function userview()
    {
        // return view('admin.product');
        return view('admin2.table');
    }

    public function uploadproduct(Request $request)
    {
        $formFields = $request->validate(
            [
                'title' => 'required',
                'price' => 'required',
                'description' => 'required',
                'quantity' => 'required',
            ]
            );

            $imagename = time(). '.' .$request->file('image')->getClientOriginalExtension();
            // dd($imagename);
            $formFields['image'] = $request->file('image')->storeAs('productimage', $imagename, 'public');
        // dd($formFields);
        Product::create($formFields);

        return redirect()->back()->with('message', 'Product Added Successfully');
        
    }

    public function usershow()
    {
        $users = User::where('usertype', 0)->get(); 

        return view('admin2.user',
        [
            'users' => $users
        ]);
    }

    public function userorder($id)
    {
        // $users = User::where('usertype', 0)->get(); 
        $orders = User::find($id)->order()->get();
    

        return view('admin2.userorder',
        [
            'orders' => $orders
        ]);
    }

    public function allorder()
    {
        // $find = order::find(1);
        // dd($find);
        // $order = order::find(1)->user()->get();

        // foreach ($order as $order ) {
            
        //     dd($order->name);
        // }
        $order = order::all();

        return view('admin2.order',
    [
        'orders' => $order
    ]);
    }

    public function statusProduct(Request $request,$id)
    {

        $data = ['status'=> $request->status];

        // dd($data);

        $order = order::find($id);

        $order->update($data);
        // dd($request->status);

       

        return back();
        
    }
    
}
