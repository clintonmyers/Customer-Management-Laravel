<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class CustomerController extends Controller
{
    use AuthenticatesUsers;

    public function show() {
        return Auth::user()->customers;
    }

    public function add(Request $request) {
        $customers = Auth::user()->customers;
        $myArr = json_decode($customers);
        array_push($myArr, $request->input('new-customer'));
        $customers = json_encode($myArr);
        DB::update('update users set customers = ? where id = ?', [$customers, Auth::user()->id]);
        return view('home');
    }

    public function remove($index) {
        $customers = Auth::user()->customers;
        $myArr = json_decode($customers);
        unset($myArr[intval($index)]);
        $myArr = array_values($myArr);
        $customers = json_encode($myArr);
        DB::update('update users set customers = ? where id = ?', [$customers, Auth::user()->id]);
        return view('home');
    }
}
