<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $data ['title'] = 'Admin Dashboard';
        return view('admin.dashboard',$data);
    }

    public function order(){
        $data ['title'] = 'My Orders';
        $data ['orders'] = Order::get();
        return view('admin.pages.orders.index',$data);
    }

    public function orderView($id){
        $data ['title'] = 'Order Details';
        $data ['order'] = Order::where('id',$id)->first();
        return view('admin.pages.orders.view',$data);
    }
}
