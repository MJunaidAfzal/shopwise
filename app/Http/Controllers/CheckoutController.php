<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $data ['title'] = 'Checkout';
        $data ['cartsItem'] = Cart::where('user_id',Auth::id())->get();
        return view('web.pages.checkout',$data);
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->total_price = $request->input('total_price');
        $order->tracking_no = 'shopwise'.rand(1111,9999);
        $order->save();

        $cartsItem = Cart::where('user_id',Auth::id())->get();
        foreach($cartsItem as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);

            // $prod = Product::where('id',$item->prod_id)->first();
            // $prod->qty = $prod->qty - $item->prod_qty;
            // $prod->update();
        }

        if(Auth::user()->address1 == null)
        {
            $user = User::where('id',Auth::id())->first();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }


        $cartsItem = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartsItem);

        return redirect('/')->with('success','Your Order Placed Successfully');
    }
}
