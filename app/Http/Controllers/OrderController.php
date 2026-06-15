<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('public.orders.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $validated = $this->validateOrder($request);

        $validated['user_id'] = auth()->id();
        $validated['product_id'] = $product->id;
        $validated['status'] = 'in_asteptare';

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Comanda a fost trimisă! Oferta ta de preț este în curs de evaluare.');
    }

    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('public.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        $this->authorizeOrder($order);
        $order->load('product');
        return view('public.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $this->authorizeOrder($order);
        $validated = $this->validateOrder($request);
        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', 'Comanda a fost actualizată cu succes.');
    }

    public function destroy(Order $order)
    {
        $this->authorizeOrder($order);
        $order->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Comanda a fost anulată.');
    }

    // Doar proprietarul si doar daca e inca in asteptare
    private function authorizeOrder(Order $order): void
    {
        abort_if($order->user_id !== auth()->id(), 403);
        abort_if($order->status !== 'in_asteptare', 403, 'Comanda nu mai poate fi modificată.');
    }

    private function validateOrder(Request $request): array
    {
        return $request->validate([
            'quantity'       => 'required|integer|min:1000',
            'location'       => 'required|string|max:255',
            'phone'          => 'required|string|max:50',
            'proposed_price' => 'required|numeric|min:0',
            'notes'          => 'nullable|string',
        ], [
            'quantity.min'            => 'Comanda minimă este de 1000 kg (1 tonă). Comercializăm doar în cantități mari.',
            'proposed_price.required' => 'Te rugăm să propui un preț pentru comandă.',
        ]);
    }
}
