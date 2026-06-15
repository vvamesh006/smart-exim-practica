<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['product', 'user'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:in_asteptare,acceptata,respinsa,livrata',
        ]);
        $order->update(['status' => $request->status]);
        return back()->with('success', 'Statusul comenzii a fost actualizat.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', 'Comanda a fost ștearsă.');
    }
}
