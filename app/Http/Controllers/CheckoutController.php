<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class CheckoutController extends Controller
{
    public function login_customer()
    {
        return view('pages.login');
    }

    public function customer_registration(Request $request)
    {
        $customer_name = $request->customer_name;
        $customer_email = $request->customer_email;
        $password = md5($request->password);
        $mobile_number = $request->mobile_number;
        $customer_id = DB::table('tbl_customer')->insertGetId(['customer_name' => $customer_name, 'email_address' => $customer_email, 'password' => $password, 'mobile_number' => $mobile_number]);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer_name);

        return Redirect::to('/checkout');
    }

    public function customer_login(Request $request)
    {
        $customer_email = $request->customer_email;
        $password = md5($request->password);

        $result = DB::table('tbl_customer')
         ->where('email_address', $customer_email)
         ->where('password', $password)
         ->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            // echo Session::get('customer_name');

            return Redirect::to('/checkout');
        } else {
            Session::put('message', 'Email or Password is wrong');

            return view('pages.login');
        }
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function logout_customer()
    {
        Session::flush();
        // Session::put('customer_name', null);
        // Session::put('customer_id', null);

        return Redirect::to('/');
    }

    public function save_shipping_details(Request $request)
    {
        $shipping_email = $request->shipping_email;
        $shipping_first_name = $request->shipping_first_name;
        $shipping_last_name = $request->shipping_last_name;
        $shipping_address = $request->shipping_address;
        $shipping_mobile_number = $request->shipping_mobile_number;
        $shipping_city = $request->shipping_city;
        $shipping_id = DB::table('tbl_shipping')
                       ->insertGetId(['shipping_email' => $shipping_email, 'shipping_first_name' => $shipping_first_name, 'shipping_last_name' => $shipping_last_name, 'shipping_address' => $shipping_address, 'shipping_mobile_number' => $shipping_mobile_number, 'shipping_city' => $shipping_city]);
        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }
}
