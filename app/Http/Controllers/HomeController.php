<?php

namespace App\Http\Controllers;

use DB;

class HomeController extends Controller
{
    public function index()
    {
        $all_published_product = DB::table('tbl_products')
                       ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                       ->join('tbl_brand', 'tbl_products.brand_id', '=', 'tbl_brand.brand_id')
                       ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_brand.brand_name')
                       ->where('tbl_products.publication_status', 1)
                       ->limit(9)
                       ->get();

        $manage_published_product = view('pages.home_content')->with('all_published_product', $all_published_product);

        return view('layout')->with('pages.home_content', $manage_published_product);
        // return view('pages.home_content');
    }

    public function showProduct_by_Category($category_id)
    {
        $all_product_by_category = DB::table('tbl_products')
                       ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                       ->select('tbl_products.*', 'tbl_category.category_name')
                       ->where('tbl_category.category_id', $category_id)
                       ->where('tbl_products.publication_status', 1)
                       ->limit(12)
                       ->get();

        $manage_product_by_category = view('pages.product_by_category')->with('all_product_by_category', $all_product_by_category);

        return view('layout')->with('pages.product_by_category', $manage_product_by_category);
        // return view('pages.home_content');
    }
}
