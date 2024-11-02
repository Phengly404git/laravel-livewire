<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_user = User::where('role','0')->count();
        $total_order = Order::count();
        $todayDate = Carbon::now()->format('d-m-Y');
        $monthDate = Carbon::now()->format('m');
        $yearDate = Carbon::now()->format('Y');
        $total_order_today = Order::whereDate('created_at',$todayDate)->count();
        $total_order_month = Order::whereMonth('created_at',$monthDate)->count();
        $total_order_year = Order::whereYear('created_at',$yearDate)->count();
        $total_product = Product::count();
        $total_category = Category::count();
        $total_brand = Brand::count();

        return view('admin.dashboard',[
            'total_user' =>$total_user,
            'total_product'=>$total_product,
            'total_category'=>$total_category,
            'total_order'=>$total_order,
            'total_order_today'=>$total_order_today,
            'total_order_month'=>$total_order_month,
            'total_order_year'=>$total_order_year,
            'total_brand'=>$total_brand
        ]);
    }
}
