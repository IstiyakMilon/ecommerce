<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();

        return view('admin.add_slider');
    }

    public function save_slider(Request $request)
    {
        $this->AdminAuthCheck();

        $publication_status = $request->publication_status;
        $image = $request->file('slider_image');

        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $slider_image = $image_url;
                DB::table('tbl_slider')->insert(['slider_image' => $slider_image, 'publication_status' => $publication_status]);

                Session::put('message', 'Slider Image Added Successfully');

                return Redirect::to('/add-slider');
            }
        }
        // DB::table('tbl_products')->insert(['category_id' => $category_id, 'brand_id' => $brand_id, 'product_name' => $product_name, 'product_short_description' => $product_short_description, 'product_long_description' => $product_long_description, 'product_price' => $product_price, 'product_size' => $product_size, 'product_color' => $product_color, 'publication_status' => $publication_status]);

        // Session::put('message', 'Product Added Successfully without');

        // return Redirect::to('/add-product');
        // echo $category_name;
        // DB::table('tbl_brand')->insert($data);

        // Session::put('message', 'Brand Added Successfully');

        // return Redirect::to('/add-brand');
    }

    public function all_slider()
    {
        $this->AdminAuthCheck();
        $all_slider = DB::table('tbl_slider')->get();

        $manage_slider = view('admin.all_slider')->with('all_slider', $all_slider);

        return view('admin_layout')->with('admin.all_slider', $manage_slider);
        // echo '<pre>';
        // print_r($all_product);
        // echo '</pre>';
        // exit();
    }

    public function inactive_slider($slider_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_slider')
          ->where('slider_id', $slider_id)
          ->update(['publication_status' => 0]);
        Session::put('message', 'Slider Inactivated Successfully');

        return Redirect::to('/all-slider');
    }

    public function active_slider($slider_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_slider')
          ->where('slider_id', $slider_id)
          ->update(['publication_status' => 1]);
        Session::put('message', 'Slider Activated Successfully');

        return Redirect::to('/all-slider');
    }

    public function delete_slider($slider_id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_slider')->where('slider_id', $slider_id)->delete();
        Session::put('message', 'Slider Deleted Successfully');

        return Redirect::to('/all-slider');
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }
}
