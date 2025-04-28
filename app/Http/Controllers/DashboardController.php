<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Product::with('category')->get();

        $today = Carbon::today();
        $SalesToday = Order::whereDate('order_date', $today)->count();
        $AmountToday = Order::whereDate('order_date', $today)->sum('order_amount');
        $LastOrders = Order::whereDate('order_date', $today)
            ->orderBy('order_date', 'desc')
            ->limit(5)
            ->get();
        $LowStock = Product::orderBy('product_qty', 'asc')
            ->limit(10)
            ->get();

        return view('dashboard', compact('SalesToday', 'AmountToday', 'LastOrders', 'LowStock', 'datas'));
    }
}
