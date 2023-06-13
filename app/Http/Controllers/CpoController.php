<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;


class CpoController extends Controller
{
    public function viewallcustomers(){
        $customers = Customer::all();
        return view('customers.all', compact('customers'));
    }

    public function createcustomer(){
        return view('customers.make');
    }

    public function storecustomer(Request $request)
    {
        $customer = Customer::create([
            'name'=> $request->name,
        ]); 
        return \Redirect::route('customers')->with('success', 'Customer added to database');
    }

    public function editcustomer($id){
        $customer = Customer::query()->where('id', $id)->first();
        return view('customers.edit', compact('customer'));
    }

    public function updatecustomer(Request $request){
        $customer = Customer::query()->where('id', $request->id)->update([
            'name'=>$request->name,
        ]);
        return \Redirect::route('customers');
    }
    public function destroycustomer($id){
        $customer = Customer::query()->where('id', $id)->delete();
        return \Redirect::route('customers');
    }

    public function viewallproducts(){
        $products = Product::all();
        return view('products.showall', compact('products'));
    }

    public function createproduct(){
        $customers = Customer::all();
        return view('products.add',  compact('customers'));
    }

    public function storeproduct(Request $request){
        
        $product = Product::create([
            'name'=>$request->name,
            'customer'=>$request->customer
        ]);
        return \Redirect::route('products');
    }
    public function editproduct($id){
        $product = Product::query()->where('id', $id)->first();
        return view('products.edit', compact('product'));
    }
    public function updateproduct(Request $request)
    {
        $product = Product::query()->where('id', $request->id)->update([
            'name'=>$request->name,
        ]);
        return \Redirect::route('products');
    }

    public function destroyproduct($id){
        $product = Product::query()->where('id', $id)->delete();
        return \Redirect::route('products');
    }


    public function viewallorders(){
        $orders = Order::all();
        return view('orders.orders', compact('orders'));
    }

    public function createorder(){
        $products = Product::all();
        $customers = Customer::all();
        return view('orders.make', compact('products','customers'));
    }
    public function storeorder(Request $request){
        $order = Order::create([
            'customer_id'=>$request->customerID,
            'product_id'=>$request->productID
        ]);
        return \Redirect::route('orders');
    }
    public function editorder($id){
        $orders = Order::all();
        $order = Order::query()->where('id', $id)->first();
        return view('orders.edit', compact('order', 'orders'));
    }
    public function updateorder(Request $request)
    {
        $order = Order::query()->where('id', $request->id)->update([
            'customer_id'=>$request->customerID,
            'product_id'=>$request->productID
        ]);
        return \Redirect::route('orders');
    }

    public function destroyorder($id)
    {
        $order = Order::query()->where('id', $id)->delete();
        return \Redirect::route('orders');
    }
}
