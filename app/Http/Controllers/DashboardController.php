<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Product::with('category')->latest()->take(5)->get();
        return view('dashboard', compact('datas'));
    }
}
