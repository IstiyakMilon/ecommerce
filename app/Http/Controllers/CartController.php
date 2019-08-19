<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $qty = $request->qty;

        $product_id = $request->product_id;

        $product_info = DB::table('tbl_products')->where('product_id', $product_id)->first();

        // dd($product_info);
        $id = $product_info->product_id;

        $name = $product_info->product_name;

        $price = $product_info->product_price;

        $weight = 1;

        $image = $product_info->product_image;
        Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => $weight, 'options' => ['image' => $image]]);

        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        $all_published_products = DB::table('tbl_products')
                                ->where('publication_status', 1)
                                ->get();
        $manage_published_products = view('pages.add_to_cart')->with('all_published_category', $all_published_products);

        return view('layout')->with('pages.add_to_cart', $manage_published_products);
    }

    public function delete_to_cart($rowId)
    {
        Cart::remove($rowId);

        return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->quantity;
        Cart::update($rowId, $qty);

        return Redirect::to('/show-cart');
    }
}
