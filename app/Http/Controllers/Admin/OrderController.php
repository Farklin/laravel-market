<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all(){
        $orders = Order::orderBy('created_at','DESC')->get();
        return view('admin.order.orders', compact('orders')); 
    }
    public function index($id){
        $order = Order::findOrFail($id); 
        return view('admin.order.order', compact('order')); 
    }
}
