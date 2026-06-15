@extends('layouts.public')
@section('title', 'Modifică comanda')

@section('content')
    <x-page-hero title="Modifică comanda" subtitle="Actualizează detaliile cât timp oferta este în așteptare." />

    <section class="max-w-3xl mx-auto px-4 py-16">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">

            <div class="flex items-center gap-4 bg-green-50 p-6 border-b border-green-100">
                <div class="w-20 h-20 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                    @if($order->product && $order->product->image)
                        <img src="{{ asset('storage/' . $order->product->image) }}" alt="" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-3xl">🍎</div>
                    @endif
                </div>
                <div>
                    <p class="text-sm text-gray-500">Modifici comanda pentru:</p>
                    <h2 class="text-xl font-bold text-green-800">{{ $order->product->name ?? '—' }}</h2>
                </div>
            </div>

            <div class="p-8">
                @if($errors->any())
                    <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Cantitate (kg) *</label>
                        <input type="number" name="quantity" value="{{ old('quantity', $order->quantity) }}" min="1000" step="100" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                        <p class="text-xs text-gray-500 mt-1">Minim 1000 kg (1 tonă).</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Prețul propus (€ / kg) *</label>
                        <div class="relative">
                            <input type="number" name="proposed_price" value="{{ old('proposed_price', $order->proposed_price) }}" min="0" step="0.01" required
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 pr-16 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">€ / kg</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Locație de livrare *</label>
                        <input type="text" name="location" value="{{ old('location', $order->location) }}" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telefon de contact *</label>
                        <input type="text" name="phone" value="{{ old('phone', $order->phone) }}" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Observații</label>
                        <textarea name="notes" rows="4"
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">{{ old('notes', $order->notes) }}</textarea>
                    </div>
                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="flex-grow bg-green-700 text-white font-semibold px-6 py-4 rounded-xl hover:bg-green-800 hover:shadow-lg transition-all">
                            Salvează modificările
                        </button>
                        <a href="{{ route('orders.index') }}" class="px-6 py-4 rounded-xl border border-gray-300 hover:bg-gray-50 transition">Anulează</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
