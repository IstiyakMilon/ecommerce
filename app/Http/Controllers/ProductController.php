<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.add_product');
    }

    public function save_product(Request $request)
    {
        $category_id = $request->category_id;

        $brand_id = $request->brand_id;

        $product_name = $request->product_name;

        $product_long_description = $request->product_long_description;
        $product_short_description = $request->product_short_description;
        $product_price = $request->product_price;
        $product_size = $request->product_size;
        $product_color = $request->product_color;
        echo $product_color;
        $publication_status = $request->publication_status;
        echo $publication_status;

        $image = $request->file('product_image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $product_image = $image_url;
                DB::table('tbl_products')->insert(['category_id' => $category_id, 'brand_id' => $brand_id, 'product_name' => $product_name, 'product_short_description' => $product_short_description, 'product_long_description' => $product_long_description, 'product_price' => $product_price, 'product_image' => $product_image, 'product_size' => $product_size, 'product_color' => $product_color, 'publication_status' => $publication_status]);

                Session::put('message', 'Product Added Successfully');

                return Redirect::to('/add-product');
            }
        }
        DB::table('tbl_products')->insert(['category_id' => $category_id, 'brand_id' => $brand_id, 'product_name' => $product_name, 'product_short_description' => $product_short_description, 'product_long_description' => $product_long_description, 'product_price' => $product_price, 'product_size' => $product_size, 'product_color' => $product_color, 'publication_status' => $publication_status]);

        Session::put('message', 'Product Added Successfully without');

        return Redirect::to('/add-product');
        // echo $category_name;
        // DB::table('tbl_brand')->insert($data);

        // Session::put('message', 'Brand Added Successfully');

        // return Redirect::to('/add-brand');
    }

    public function all_product()
    {
        $all_product = DB::table('tbl_products')
                       ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                       ->join('tbl_brand', 'tbl_products.brand_id', '=', 'tbl_brand.brand_id')
                       ->get();

        $manage_product = view('admin.all_product')->with('all_product_data', $all_product);

        return view('admin_layout')->with('admin.all_product', $manage_product);
        // echo '<pre>';
        // print_r($all_product);
        // echo '</pre>';
        // exit();
    }
}
