<!DOCTYPE html>
<html lang="ro">
@php $isHome = request()->routeIs('home'); @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Smart-Exim') — Smart-Exim SRL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; left: 0; bottom: -4px;
            width: 0; height: 2px; background-color: #15803d;
            transition: width 0.25s ease;
        }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active::after { width: 100%; }
        #mainHeader { transition: background-color 0.3s ease, box-shadow 0.3s ease; }
    </style>
</head>
<body class="bg-white text-gray-800 flex flex-col min-h-screen">

    @php $activeClass = 'text-green-600 active'; @endphp

    <header id="mainHeader"
            data-home="{{ $isHome ? '1' : '0' }}"
            class="fixed top-0 left-0 w-full z-50 {{ $isHome ? 'bg-transparent' : 'bg-white/90 backdrop-blur-md shadow-md' }}">
        <nav class="max-w-6xl mx-auto px-4 py-1 flex items-center justify-between">
            <a href="{{ route('home') }}" class="transition-transform hover:scale-105">
                <img src="{{ asset('images/logo.png') }}" alt="Smart-Exim" class="h-20 md:h-28 w-auto">
            </a>

            {{-- Meniu desktop --}}
            <div id="navLinks" class="hidden md:flex gap-7 items-center text-[16px] font-semibold transition-colors {{ $isHome ? 'text-white' : 'text-gray-700' }}">
                <a href="{{ route('home') }}" class="nav-link hover:text-green-600 transition-colors {{ request()->routeIs('home') ? $activeClass : '' }}">Acasă</a>
                <a href="{{ route('about') }}" class="nav-link hover:text-green-600 transition-colors {{ request()->routeIs('about') ? $activeClass : '' }}">Despre noi</a>
                <a href="{{ route('process') }}" class="nav-link hover:text-green-600 transition-colors {{ request()->routeIs('process') ? $activeClass : '' }}">Proces</a>
                <a href="{{ route('products') }}" class="nav-link hover:text-green-600 transition-colors {{ request()->routeIs('products') ? $activeClass : '' }}">Produse</a>
                <a href="{{ route('services') }}" class="nav-link hover:text-green-600 transition-colors {{ request()->routeIs('services') ? $activeClass : '' }}">Servicii</a>
                <a href="{{ route('contact') }}" class="bg-green-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-800 hover:shadow-lg transition-all {{ request()->routeIs('contact') ? 'ring-2 ring-green-300' : '' }}">
                    Contact
                </a>
                @auth
                    <span class="opacity-40">|</span>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Admin</a>
                    @else
                        <a href="{{ route('orders.index') }}" class="hover:text-green-600">Comenzile mele</a>
                    @endif
                    <div class="flex items-center gap-2 bg-green-50 px-3 py-1.5 rounded-full">
                        <span class="w-7 h-7 rounded-full bg-green-700 text-white flex items-center justify-center text-xs font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <span class="text-sm text-gray-700 leading-tight">
                            {{ auth()->user()->name }}
                            <span class="block text-[11px] {{ auth()->user()->isAdmin() ? 'text-green-700 font-semibold' : 'text-gray-400' }}">
                                {{ auth()->user()->isAdmin() ? '★ Administrator' : 'Client' }}
                            </span>
                        </span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors text-sm">Ieșire</button>
                    </form>
                @else
                    <span class="opacity-40">|</span>
                    <a href="{{ route('login') }}" class="hover:text-green-600">Autentificare</a>
                @endauth
            </div>

            {{-- Buton hamburger (mobil) --}}
            <button id="menuBtn" class="md:hidden p-2 rounded-lg {{ $isHome ? 'text-white' : 'text-gray-700' }}" aria-label="Meniu">
                <svg id="iconOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="iconClose" class="w-8 h-8 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>

        {{-- Meniu mobil (dropdown) --}}
        <div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg border-t border-gray-100">
            <div class="px-4 py-4 space-y-1 text-gray-700 font-medium">
                <a href="{{ route('home') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50 {{ request()->routeIs('home') ? 'bg-green-50 text-green-700' : '' }}">Acasă</a>
                <a href="{{ route('about') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50 {{ request()->routeIs('about') ? 'bg-green-50 text-green-700' : '' }}">Despre noi</a>
                <a href="{{ route('process') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50 {{ request()->routeIs('process') ? 'bg-green-50 text-green-700' : '' }}">Proces</a>
                <a href="{{ route('products') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50 {{ request()->routeIs('products') ? 'bg-green-50 text-green-700' : '' }}">Produse</a>
                <a href="{{ route('services') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50 {{ request()->routeIs('services') ? 'bg-green-50 text-green-700' : '' }}">Servicii</a>
                <a href="{{ route('contact') }}" class="block py-2.5 px-3 rounded-lg bg-green-700 text-white text-center mt-2 hover:bg-green-800">Contact</a>

                <div class="border-t border-gray-100 my-2"></div>

                @auth
                    <div class="flex items-center gap-3 px-3 py-2">
                        <span class="w-9 h-9 rounded-full bg-green-700 text-white flex items-center justify-center text-sm font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>
                        <div class="leading-tight">
                            <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                            <p class="text-xs {{ auth()->user()->isAdmin() ? 'text-green-700' : 'text-gray-400' }}">
                                {{ auth()->user()->isAdmin() ? '★ Administrator' : 'Client' }}
                            </p>
                        </div>
                    </div>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50">Panou admin</a>
                    @else
                        <a href="{{ route('orders.index') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50">Comenzile mele</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-2.5 px-3 rounded-lg text-red-600 hover:bg-red-50">Ieșire</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-2.5 px-3 rounded-lg hover:bg-green-50">Autentificare</a>
                @endauth
            </div>
        </div>
    </header>

    @unless($isHome)
        <div class="h-20 md:h-24"></div>
    @endunless

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-green-900 text-green-100 mt-12">
        <div class="max-w-6xl mx-auto px-4 py-12 grid sm:grid-cols-2 md:grid-cols-3 gap-10">
            <div>
                <img src="{{ asset('images/logo.png') }}" alt="Smart-Exim" class="h-24 md:h-28 w-auto bg-white rounded-lg p-2 mb-4">
                <p class="text-sm text-green-200/80 leading-relaxed">
                    Comerț cu ridicata, intermedieri și transport rutier de mărfuri agricole din Republica Moldova.
                </p>
                <div class="flex gap-3 mt-5">
                    <a href="#" aria-label="Facebook" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-800 hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-800 hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.012-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" aria-label="WhatsApp" class="w-9 h-9 flex items-center justify-center rounded-full bg-green-800 hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4 fill-current text-white" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Navigare</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">Acasă</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">Despre noi</a></li>
                    <li><a href="{{ route('process') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">Proces</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">Produse</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white hover:translate-x-1 inline-block transition-all">Servicii</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Contact</h3>
                <ul class="space-y-3 text-sm text-green-200/80">
                    <li class="flex items-start gap-2">
                        <span>📍</span>
                        <span>Satul Colicăuți, Raionul Briceni,<br>Republica Moldova</span>
                    </li>
                    <li class="flex items-center gap-2"><span>📞</span> +373 22 000 000</li>
                    <li class="flex items-center gap-2"><span>✉️</span> contact@smart-exim.md</li>
                    <li class="flex items-center gap-2"><span>🕐</span> Luni – Vineri: 08:00 – 18:00</li>
                </ul>
            </div>
        </div>

        <div class="bg-black/20 py-4">
            <div class="max-w-6xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-2 text-xs text-green-200/70 text-center">
                <span>© {{ date('Y') }} Smart-Exim SRL. Toate drepturile rezervate.</span>
                <a href="{{ route('privacy') }}" class="hover:text-white transition-colors underline">Politica de confidențialitate</a>
            </div>
        </div>
    </footer>

    <script>
        const header = document.getElementById('mainHeader');
        const navLinks = document.getElementById('navLinks');
        const isHome = header.dataset.home === '1';

        // Meniu mobil
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const iconOpen = document.getElementById('iconOpen');
        const iconClose = document.getElementById('iconClose');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            iconOpen.classList.toggle('hidden');
            iconClose.classList.toggle('hidden');
            // cand meniul mobil e deschis pe home, fundalul header devine alb
            if (isHome && !mobileMenu.classList.contains('hidden')) {
                header.classList.add('bg-white/95', 'shadow-md');
                menuBtn.classList.remove('text-white');
                menuBtn.classList.add('text-gray-700');
            }
        });

        // Header transparent -> alb la scroll (doar home)
        if (isHome) {
            function onScroll() {
                const menuOpen = !mobileMenu.classList.contains('hidden');
                if (window.scrollY > 50 || menuOpen) {
                    header.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-md');
                    header.classList.remove('bg-transparent');
                    navLinks.classList.remove('text-white');
                    navLinks.classList.add('text-gray-700');
                    menuBtn.classList.remove('text-white');
                    menuBtn.classList.add('text-gray-700');
                } else {
                    header.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-md');
                    header.classList.add('bg-transparent');
                    navLinks.classList.add('text-white');
                    navLinks.classList.remove('text-gray-700');
                    menuBtn.classList.add('text-white');
                    menuBtn.classList.remove('text-gray-700');
                }
            }
            window.addEventListener('scroll', onScroll);
            onScroll();
        }
    </script>

</body>
</html>
