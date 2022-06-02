<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Admin\Coupon;
use DB;
use Auth;
use Cart;

class CartController extends Controller
{
    public function AddToCart($id)
    {
        $product = Product::where('id', $id)->first();

        if (!$product->discount_price) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image_one,
                    'color' => '',
                    'size' => '',
                ]
            ]);

            return response()->json([
                'success' => 'Product Added on Your Cart'
            ]);

        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->product_name,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->image_one,
                    'color' => '',
                    'size' => '',
                ]
            ]);

            return response()->json([
                'success' => 'Product Added on Your Cart'
            ]);
        }
    }

    public function Check()
    {
        $content = Cart::content();

        return response()->json($content);
    }

    public function ShowCart()
    {
        $carts = Cart::content();
        return view('frontend.product.cart', compact('carts'));
    }

    public function RemoveCart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Product Remove from Cart Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
