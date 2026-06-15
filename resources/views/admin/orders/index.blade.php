@extends('admin.layout')
@section('title', 'Comenzi')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Comenzi primite</h1>

    @php
        $statusBadge = [
            'in_asteptare' => ['bg-yellow-100 text-yellow-700', '⏳ În așteptare'],
            'acceptata'    => ['bg-green-100 text-green-700', '✅ Acceptată'],
            'respinsa'     => ['bg-red-100 text-red-700', '❌ Respinsă'],
            'livrata'      => ['bg-blue-100 text-blue-700', '📦 Livrată'],
        ];
    @endphp

    <div class="space-y-4">
        @forelse($orders as $order)
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="font-bold text-lg">{{ $order->product->name ?? '—' }}</h3>
                            <span class="text-xs px-3 py-1 rounded-full font-medium {{ $statusBadge[$order->status][0] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ $statusBadge[$order->status][1] ?? $order->status }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600">
                            👤 {{ $order->user->name ?? '—' }} ({{ $order->user->email ?? '' }})
                        </p>
                        <p class="text-sm text-gray-600 mt-1">
                            📦 {{ number_format($order->quantity) }} kg ·
                            💰 <strong>{{ number_format($order->proposed_price, 2) }} € / kg</strong> ·
                            📍 {{ $order->location }} ·
                            📞 {{ $order->phone }}
                        </p>
                        @if($order->notes)
                            <p class="text-sm text-gray-400 mt-1">„{{ $order->notes }}"</p>
                        @endif
                        <p class="text-xs text-gray-400 mt-1">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        @if($order->status === 'in_asteptare')
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="acceptata">
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700">✅ Acceptă</button>
                            </form>
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="respinsa">
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-700">❌ Respinge</button>
                            </form>
                        @elseif($order->status === 'acceptata')
                            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="livrata">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">📦 Marchează livrată</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline"
                              onsubmit="return confirm('Sigur ștergi această comandă?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="border border-gray-300 text-gray-500 px-4 py-2 rounded-lg text-sm hover:bg-gray-50">Șterge</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-sm p-12 text-center text-gray-500">Nu există comenzi încă.</div>
        @endforelse
    </div>
@endsection
