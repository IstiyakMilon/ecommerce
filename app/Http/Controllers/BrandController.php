<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();

        return view('admin.add_brand');
    }

    public function save_brand(Request $request)
    {
        $this->AdminAuthCheck();

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_description'] = $request->brand_description;
        $data['publication_status'] = $request->publication_status;
        // echo $category_name;
        DB::table('tbl_brand')->insert($data);

        Session::put('message', 'Brand Added Successfully');

        return Redirect::to('/add-brand');
    }

    public function show_brand()
    {
        $this->AdminAuthCheck();

        $all_brand = DB::table('tbl_brand')->get();
        $manage_brand_data = view('admin.all_brand')->with('all_brand_info', $all_brand);

        return view('admin_layout')->with('admin.all_brand', $manage_brand_data);
        //return view('admin.all_brand');
    }

    public function inactive_brand($brand_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_brand')
          ->where('brand_id', $brand_id)
          ->update(['publication_status' => 0]);
        Session::put('message', 'brand Inactivated Successfully');

        return Redirect::to('/all-brand');
    }

    public function active_brand($brand_id)
    {
        $this->AdminAuthCheck();

        DB::table('tbl_brand')
          ->where('brand_id', $brand_id)
          ->update(['publication_status' => 1]);
        Session::put('message', 'brand Activated Successfully');

        return Redirect::to('/all-brand');
    }

    public function edit_brand($brand_id)
    {
        $this->AdminAuthCheck();

        $brand_data = DB::table('tbl_brand')
         ->where('brand_id', $brand_id)
         ->first();
        $manage_brand_info = view('admin.edit_brand')->with('brand_info', $brand_data);

        return view('admin_layout')->with('admin.edit_brand', $manage_brand_info);
        // return view('admin.edit_category');
    }

    public function update_brand($brand_id, Request $request)
    {
        $this->AdminAuthCheck();

        $brand_name = $request->brand_name;
        $brand_description = $request->brand_description;
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_description'] = $request->category_description;

        DB::table('tbl_brand')
          ->where('brand_id', $brand_id)
          ->update(['brand_name' => $brand_name, 'brand_description' => $brand_description]);
        Session::put('message', 'Brand Updatedated Successfully');

        return Redirect::to('/all-brand');
    }

    public function delete_brand($brand_id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_brand')->where('brand_id', $brand_id)->delete();
        Session::put('message', 'Brand Deleted Successfully');

        return Redirect::to('/all-brand');
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
