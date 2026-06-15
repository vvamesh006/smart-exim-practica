<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panou admin') — Smart-Exim</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="flex min-h-screen">

    <aside class="w-72 bg-gradient-to-b from-green-800 to-green-900 text-green-100 flex flex-col">
        {{-- Logo --}}
        <div class="p-6 border-b border-green-700/50 text-center">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Smart-Exim" class="h-28 w-auto mx-auto bg-white rounded-2xl p-3 shadow-lg">
            </a>
            <p class="text-xs text-green-300 mt-3 tracking-widest uppercase">Panou de administrare</p>
        </div>

        {{-- Meniu --}}
        <nav class="flex-grow p-4 space-y-1">
            @php
                $nav = [
                    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['route' => 'admin.products.index', 'label' => 'Produse', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                    ['route' => 'admin.orders.index', 'label' => 'Comenzi', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                    ['route' => 'admin.users.index', 'label' => 'Utilizatori', 'icon' => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-1.13a4 4 0 10-4-4 4 4 0 004 4z'],
                    ['route' => 'admin.messages.index', 'label' => 'Mesaje', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                ];
            @endphp
            @foreach($nav as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ $active ? 'bg-white/15 text-white font-semibold shadow-sm' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                    </svg>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        {{-- User + iesire --}}
        <div class="p-4 border-t border-green-700/50">
            <div class="flex items-center gap-3 px-2 mb-3">
                <span class="w-10 h-10 rounded-full bg-white text-green-800 flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </span>
                <div class="leading-tight">
                    <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-green-300">★ Administrator</p>
                </div>
            </div>
            <a href="{{ route('home') }}" class="block px-4 py-2 text-sm rounded-lg hover:bg-white/10 transition">← Înapoi la site</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-300 rounded-lg hover:bg-white/10 transition">Ieșire</button>
            </form>
        </div>
    </aside>

    <main class="flex-grow p-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-2">
                <span>✅</span> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-xl mb-6">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>

</div>
</body>
</html>
