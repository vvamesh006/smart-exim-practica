@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Bun venit, {{ auth()->user()->name }}! 👋</h1>
        <p class="text-gray-500 mt-1">Iată o privire de ansamblu asupra activității.</p>
    </div>

    {{-- Carduri statistici --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-extrabold text-gray-800">{{ $stats['products'] }}</p>
                    <p class="text-gray-500 text-sm mt-1">Produse</p>
                </div>
                <span class="text-3xl">🍎</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-extrabold text-gray-800">{{ $stats['orders'] }}</p>
                    <p class="text-gray-500 text-sm mt-1">Comenzi totale</p>
                </div>
                <span class="text-3xl">📦</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-extrabold text-gray-800">{{ $stats['pending'] }}</p>
                    <p class="text-gray-500 text-sm mt-1">În așteptare</p>
                </div>
                <span class="text-3xl">⏳</span>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-3xl font-extrabold text-gray-800">{{ $stats['users'] }}</p>
                    <p class="text-gray-500 text-sm mt-1">Utilizatori</p>
                </div>
                <span class="text-3xl">👥</span>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-6">
        {{-- Comenzi recente --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold">Comenzi recente</h2>
                <a href="{{ route('admin.orders.index') }}" class="text-green-700 text-sm font-medium hover:underline">Vezi toate →</a>
            </div>
            @forelse($recentOrders as $order)
                <div class="flex items-center gap-3 py-3 border-b border-gray-50 last:border-0">
                    <span class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center text-lg">📦</span>
                    <div class="flex-grow">
                        <p class="font-medium text-sm">{{ $order->product->name ?? '—' }}</p>
                        <p class="text-xs text-gray-400">{{ $order->user->name ?? '—' }} · {{ number_format($order->quantity) }} kg · {{ number_format($order->proposed_price, 2) }} €/kg</p>
                    </div>
                    @php
                        $badge = [
                            'in_asteptare' => ['bg-yellow-100 text-yellow-700', 'În așteptare'],
                            'acceptata'    => ['bg-green-100 text-green-700', 'Acceptată'],
                            'respinsa'     => ['bg-red-100 text-red-700', 'Respinsă'],
                            'livrata'      => ['bg-blue-100 text-blue-700', 'Livrată'],
                        ];
                    @endphp
                    <span class="text-xs px-2.5 py-1 rounded-full {{ $badge[$order->status][0] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $badge[$order->status][1] ?? $order->status }}
                    </span>
                </div>
            @empty
                <p class="text-gray-400 text-sm py-8 text-center">Nu există comenzi încă.</p>
            @endforelse
        </div>

        {{-- Rezumat + actiuni --}}
        <div class="space-y-6">
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h2 class="text-xl font-bold mb-4">Rezumat</h2>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between"><span class="text-gray-500">Comenzi acceptate</span><span class="font-semibold">{{ $stats['accepted'] }}</span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Administratori</span><span class="font-semibold">{{ $stats['admins'] }}</span></div>
                    <div class="flex justify-between"><span class="text-gray-500">Mesaje primite</span><span class="font-semibold">{{ $stats['messages'] }}</span></div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-green-600 to-green-800 text-white rounded-2xl shadow-sm p-6">
                <h2 class="text-lg font-bold mb-4">Acțiuni rapide</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.products.create') }}" class="block bg-white/15 hover:bg-white/25 px-4 py-2.5 rounded-lg text-sm transition">+ Adaugă produs nou</a>
                    <a href="{{ route('admin.orders.index') }}" class="block bg-white/15 hover:bg-white/25 px-4 py-2.5 rounded-lg text-sm transition">Vezi comenzile</a>
                    <a href="{{ route('admin.users.index') }}" class="block bg-white/15 hover:bg-white/25 px-4 py-2.5 rounded-lg text-sm transition">Gestionează utilizatori</a>
                </div>
            </div>
        </div>
    </div>
@endsection
