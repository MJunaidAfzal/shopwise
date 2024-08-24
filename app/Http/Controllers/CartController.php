<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['action' => 'added' ,'message' => 'Product Already Added in Cart' ] );
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();

                    return response()->json(['action' => 'add' ,'message' => 'Product Added in Cart' ] );

                }


            }
        }
        else
        {
            return response()->json(['status' => 'Login to Continue' ] );
        }
    }

    public function cart(){
        $data ['title'] = 'My Cart';
        $data ['cartItems'] = Cart::where('user_id',Auth::id())->get();
        return view('web.pages.cart',$data);
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        if($cart){
            return redirect()->back()->with('success' , 'Product deleted from cart');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}

