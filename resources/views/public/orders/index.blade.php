@extends('layouts.public')
@section('title', 'Comenzile mele')

@section('content')
    <x-page-hero title="Comenzile mele" subtitle="Istoricul comenzilor tale și statusul ofertelor." />

    <section class="max-w-5xl mx-auto px-4 py-16">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif

        @forelse($orders as $order)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-4">
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                        @if($order->product && $order->product->image)
                            <img src="{{ (str_starts_with($order->product->image, 'images/') ? asset($order->product->image) : asset('storage/' . $order->product->image)) }}" alt="" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-2xl">🍎</div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-lg text-gray-800">{{ $order->product->name ?? 'Produs șters' }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ number_format($order->quantity) }} kg · 💰 {{ number_format($order->proposed_price, 2) }} € / kg · 📍 {{ $order->location }}
                        </p>
                        @if($order->notes)
                            <p class="text-sm text-gray-400 mt-1">„{{ $order->notes }}"</p>
                        @endif
                        <p class="text-xs text-gray-400 mt-1">Trimisă pe {{ $order->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100">
                    @if($order->status === 'in_asteptare')
                        <div class="flex items-center gap-3 bg-yellow-50 text-yellow-800 px-4 py-3 rounded-xl mb-4">
                            <span class="text-xl">⏳</span>
                            <div>
                                <p class="font-semibold">Răspunsul este în curs de așteptare</p>
                                <p class="text-sm text-yellow-700">Oferta ta de preț este evaluată de echipa noastră.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <a href="{{ route('orders.edit', $order) }}" class="bg-green-700 text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition">
                                ✏️ Modifică comanda
                            </a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                  onsubmit="return confirm('Sigur anulezi această comandă?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border border-red-300 text-red-600 px-5 py-2 rounded-lg text-sm font-medium hover:bg-red-50 transition">
                                    Anulează comanda
                                </button>
                            </form>
                        </div>
                    @elseif($order->status === 'acceptata')
                        <div class="flex items-center gap-3 bg-green-50 text-green-800 px-4 py-3 rounded-xl">
                            <span class="text-xl">✅</span>
                            <div>
                                <p class="font-semibold">Comanda a fost acceptată!</p>
                                <p class="text-sm text-green-700">În cel mai scurt timp, un operator va lua legătura cu tine.</p>
                            </div>
                        </div>
                    @elseif($order->status === 'respinsa')
                        <div class="flex items-center gap-3 bg-red-50 text-red-800 px-4 py-3 rounded-xl">
                            <span class="text-xl">❌</span>
                            <div>
                                <p class="font-semibold">Oferta nu a putut fi acceptată</p>
                                <p class="text-sm text-red-700">Te rugăm să ne contactezi pentru o nouă negociere.</p>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-3 bg-gray-50 text-gray-700 px-4 py-3 rounded-xl">
                            <span class="text-xl">📦</span>
                            <p class="font-semibold">Status: {{ $order->status }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-16">
                <div class="text-6xl mb-4">📭</div>
                <p class="text-gray-500 text-lg mb-6">Nu ai plasat încă nicio comandă.</p>
                <a href="{{ route('products') }}" class="inline-block bg-green-700 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-800">
                    Vezi produsele
                </a>
            </div>
        @endforelse
    </section>
@endsection
