@extends('layouts.public')
@section('title', 'Produse')

@section('content')
    <x-page-hero title="Produsele noastre" subtitle="Fructe proaspete și cereale de calitate, cultivate cu grijă în Republica Moldova." />

    <section class="max-w-6xl mx-auto px-4 py-16">
        {{-- Filtre categorii --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <a href="{{ route('products') }}"
               class="px-6 py-2.5 rounded-full font-medium transition-all {{ !request('category') ? 'bg-green-700 text-white shadow-lg' : 'bg-white border border-gray-200 text-gray-600 hover:border-green-500 hover:text-green-700' }}">
                🌿 Toate
            </a>
            @foreach($categories as $category)
                @php
                    $emoji = ['Mere' => '🍎', 'Cireșe' => '🍒', 'Cereale' => '🌾'][$category->name] ?? '🌱';
                @endphp
                <a href="{{ route('products', ['category' => $category->id]) }}"
                   class="px-6 py-2.5 rounded-full font-medium transition-all {{ request('category') == $category->id ? 'bg-green-700 text-white shadow-lg' : 'bg-white border border-gray-200 text-gray-600 hover:border-green-500 hover:text-green-700' }}">
                    {{ $emoji }} {{ $category->name }}
                </a>
            @endforeach
        </div>

        @if($products->isEmpty())
            <p class="text-gray-500 text-center py-12">Nu există produse în această categorie.</p>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all flex flex-col group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative">
                            @if($product->image)
                                <img src="{{ (str_starts_with($product->image, 'images/') ? asset($product->image) : asset('storage/' . $product->image)) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300 text-6xl">
                                    @php $e = ['Mere' => '🍎', 'Cireșe' => '🍒', 'Cereale' => '🌾'][$product->category->name ?? ''] ?? '🍎'; @endphp
                                    {{ $e }}
                                </div>
                            @endif
                            @if($product->category)
                                <span class="absolute top-3 left-3 bg-white/90 backdrop-blur text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-green-700 mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed flex-grow">{{ $product->description }}</p>
                            <div class="mt-5">
                                @auth
                                    <a href="{{ route('orders.create', $product) }}"
                                       class="block text-center w-full bg-green-700 text-white font-semibold px-4 py-3 rounded-xl hover:bg-green-800 hover:shadow-lg transition-all">
                                        🛒 Comandă produs
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="block text-center w-full bg-gray-100 text-gray-600 font-semibold px-4 py-3 rounded-xl hover:bg-gray-200 transition-all">
                                        Autentifică-te pentru a comanda
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
