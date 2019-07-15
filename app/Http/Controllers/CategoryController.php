<?php

namespace App\Http\Controllers;

use Session;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.add_category');
    }

    public function all_category()
    {
        $all_category = DB::table('tbl_category')->get();

        $manage_category = view('admin.all_category')->with('all_category_data', $all_category);

        return view('admin_layout')->with('admin.all_category', $manage_category);

        //return view('admin.all_category');
    }

    public function save_category(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        // echo $category_name;
        DB::table('tbl_category')->insert($data);

        Session::put('message', 'Category Added Successfully');

        return Redirect::to('/add-category');
    }

    public function inactive_category($category_id)
    {
        DB::table('tbl_category')
          ->where('category_id', $category_id)
          ->update(['publication_status' => 0]);
        Session::put('message', 'Category Inactivated Successfully');

        return Redirect::to('/all-category');
    }

    public function active_category($category_id)
    {
        DB::table('tbl_category')
          ->where('category_id', $category_id)
          ->update(['publication_status' => 1]);
        Session::put('message', 'Category Activated Successfully');

        return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
        $category_data = DB::table('tbl_category')
         ->where('category_id', $category_id)
         ->first();
        $manage_category_info = view('admin.edit_category')->with('category_info', $category_data);

        return view('admin_layout')->with('admin.edit_caegory', $manage_category_info);
        // return view('admin.edit_category');
    }

    public function update_category($category_id, Request $request)
    {
        $category_name = $request->category_name;
        $category_description = $request->category_description;
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_description'] = $request->category_description;

        DB::table('tbl_category')
          ->where('category_id', $category_id)
          ->update(['category_name' => $category_name, 'category_description' => $category_description]);
        Session::put('message', 'Category Updatedated Successfully');

        return Redirect::to('/all-category');
        // echo $id;
    }

    public function delete_category($category_id)
    {
        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message', 'Category Deleted Successfully');

        return Redirect::to('/all-category');
    }
}
