<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products'  => Product::count(),
            'orders'    => Order::count(),
            'pending'   => Order::where('status', 'in_asteptare')->count(),
            'accepted'  => Order::where('status', 'acceptata')->count(),
            'users'     => User::count(),
            'admins'    => User::where('role', 'admin')->count(),
            'messages'  => ContactMessage::count(),
        ];

        $recentOrders = Order::with(['product', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }
}
