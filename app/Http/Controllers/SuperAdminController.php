<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();

        return view('admin.dashboard');
        // $admin_id = Session::get('admin_id');
        // // echo $admin_id;
        // if ($admin_id) {
        //     return view('admin.dashboard');
        // } else {
        //     return Redirect::to('/admin')->send();
        // }
    }

    public function logout()
    {
        // Session::flush();
        Session::put('admin_name', null);
        Session::put('admin_id', null);

        return Redirect::to('/admin');
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
