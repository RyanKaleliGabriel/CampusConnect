<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use App\Models\Mpesa;


use PAM\API\B2C;
use PAM\API\PayLoad;
use PAM\API\RegC2bUrl;
use PAM\API\ShortCode;
use PAM\API\App;
use PAM\API\STKPush;
use PAM\API\Balance;


class CpoController extends Controller
{
    public function viewallcustomers()
    {
        $customers = Customer::all();
        return view('customers.all', compact('customers'));
    }

    public function createcustomer()
    {
        return view('customers.make');
    }

    public function storecustomer(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
        ]);
        return Redirect::route('customers')->with('success', 'Customer added to database');
    }

    public function editcustomer($id)
    {
        $customer = Customer::query()->where('id', $id)->first();
        return view('customers.edit', compact('customer'));
    }

    public function updatecustomer(Request $request)
    {
        $customer = Customer::query()->where('id', $request->id)->update([
            'name' => $request->name,
        ]);
        return Redirect::route('customers');
    }
    public function destroycustomer($id)
    {
        $customer = Customer::query()->where('id', $id)->delete();
        return Redirect::route('customers');
    }

    public function viewallproducts()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('products.showall', compact('products', 'customers'));
    }

    public function createproduct()
    {
        $customers = Customer::all();
        return view('products.add',  compact('customers'));
    }

    public function storeproduct(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'max:5000'],
            'name' => ['required', 'string'],
        ]);
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('storage'), $imageName);

        $product = Product::create([
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price

        ]);
        return Redirect::route('products');
    }
    public function editproduct($id)
    {
        $product = Product::query()->where('id', $id)->first();
        return view('products.edit', compact('product'));
    }
    public function updateproduct(Request $request)
    {
        $product = Product::query()->where('id', $request->id)->update([
            'name' => $request->name,
        ]);
        return Redirect::route('products');
    }

    public function destroyproduct($id)
    {
        $product = Product::query()->where('id', $id)->delete();
        return Redirect::route('products');
    }


    public function viewallorders()
    {
        $orders = Order::all();
        return view('orders.orders', compact('orders'));
    }

    public function createorder()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('orders.make', compact('products', 'customers'));
    }
    public function storeorder(Request $request)
    {
        $order = Order::create([
            'customer_id' => $request->customerID,
            'product_id' => $request->productID
        ]);
        return Redirect::route('orders');
    }
    public function editorder($id)
    {
        $orders = Order::all();
        $order = Order::query()->where('id', $id)->first();
        return view('orders.edit', compact('order', 'orders'));
    }

    public function updateorder(Request $request)
    {
        $order = Order::query()->where('id', $request->id)->update([
            'customer_id' => $request->customerID,
            'product_id' => $request->productID
        ]);
        return Redirect::route('orders');
    }

    public function destroyorder($id)
    {
        $order = Order::query()->where('id', $id)->delete();
        return Redirect::route('orders');
    }

    public function payorder()
    {
        $response =  (new STKPush())->initiateSTK([
            "CallingCode" => "254", // 254 or 255
            "Secret" => env('PAM_APP_SHORTCODE_SECRET_KEY'),
            "TransactionType" => "CustomerPayBillOnline", // CustomerPayBillOnline or CustomerBuyGoodsOnline
            "PhoneNumber" => '0704383812',
            'Amount' => ceil(10),
            "ResultUrl" => route('stk.push'),
            "Description" => "Testing Payment"
        ]);
        if ($response->success) {
            Mpesa::query()->create([
                'reference_number' => $response->data->ReferenceNumber,
                'phone_number' => '0704383812',
                'amount' => ceil(10),
                'description' => 'Payments for House',
                'attempts' => 1,
                'is_initiated' => true,
                'queued_at' => now()
            ]);
            return redirect()->route('customers');
        }
    }
}
