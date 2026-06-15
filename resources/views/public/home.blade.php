@extends('layouts.public')
@section('title', 'Acasă')

@section('content')
    <!-- HERO VIDEO FULLSCREEN -->
    <section class="relative w-full h-screen overflow-hidden bg-black">
        <div class="absolute inset-0 w-full h-full pointer-events-none">
            <iframe
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                style="width: 100vw; height: 56.25vw; min-height: 130vh; min-width: 231vh;"
                src="https://www.youtube.com/embed/1xyS77rklFE?autoplay=1&mute=1&loop=1&playlist=1xyS77rklFE&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&fs=0&playsinline=1"
                title=""
                frameborder="0"
                allow="autoplay; encrypted-media"
                allowfullscreen>
            </iframe>
        </div>

        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/25 to-black/50 pointer-events-none"></div>

        <button onclick="smoothScrollToContent()" class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 text-white animate-bounce hover:text-green-300 transition-colors cursor-pointer" aria-label="Derulează în jos">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 drop-shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </button>
    </section>

    <!-- SECTIUNE INTRO -->
    <section id="continut" class="bg-green-50 py-24 scroll-mt-24 reveal">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <div class="text-6xl mb-6">🌱</div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-6">
                Producem. Împachetăm. Livrăm.
            </h2>
            <p class="text-lg md:text-xl text-green-800/80 leading-relaxed max-w-3xl mx-auto">
                Experimentați prospețimea și calitatea fructelor noastre crescute local, cum ar fi
                merele, cireșele și cerealele. De la cultivare la ambalare și livrare, ne ocupăm de
                fiecare pas al procesului pentru a asigura calitatea de top a produselor din Republica Moldova.
            </p>
            <a href="{{ route('process') }}"
               class="inline-block mt-10 border-2 border-green-700 text-green-700 font-semibold px-8 py-3 rounded-lg hover:bg-green-700 hover:text-white transition-all">
                Află Mai Multe
            </a>
        </div>
    </section>

    <!-- 6 CARDURI FIXE -->
    <section class="bg-gradient-to-b from-gray-50 to-gray-100 py-20 reveal">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">

                @php
                    $carduri = [
                        ['img' => 'mere.jpg',        'titlu' => 'Mere',        'text' => '60 ha de livezi super intensive M9, cu peste 15 varietăți de mere cu certificare GLOBAL G.A.P.'],
                        ['img' => 'cirese.jpg',      'titlu' => 'Cireșe',      'text' => '8 ha de cireșe semănate cu GiSelA®6, cultivate cu sistem superintensiv și protecție antiploaie.'],
                        ['img' => 'cereale.jpg',     'titlu' => 'Cereale',     'text' => 'Producem porumb, soia, grâu și floarea soarelui de înaltă calitate, folosind practici agricole sustenabile.'],
                        ['img' => 'depozite.jpg',    'titlu' => 'Depozite',    'text' => '24 de camere frigorifice pentru închiriere, fiecare cu o capacitate de 180 de tone și dotate cu sistem avansat de temperatură controlată.'],
                        ['img' => 'impachetare.jpg', 'titlu' => 'Împachetare', 'text' => 'Cutii din carton, ideale pentru depozitarea și transportul cireșelor și merelor, disponibile în mărimi de 10kg, 14kg și 16kg.'],
                        ['img' => 'transport.jpg',   'titlu' => 'Transport',   'text' => 'Oferim transport sigur pentru bunurile dumneavoastră la nivel mondial, cu livrare la timp și condiții climaterice controlate.'],
                    ];
                @endphp

                @foreach($carduri as $card)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all">
                        <div class="p-5">
                            <div class="h-48 rounded-xl bg-gray-100 overflow-hidden">
                                <img src="{{ asset('images/carduri/' . $card['img']) }}" alt="{{ $card['titlu'] }}" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="px-6 pb-8">
                            <h3 class="text-2xl font-bold text-green-600 mb-3">{{ $card['titlu'] }}</h3>
                            <p class="text-gray-500 leading-relaxed">{{ $card['text'] }}</p>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="flex justify-center gap-4 mt-14">
                <a href="{{ route('products') }}" class="bg-green-500 text-white font-semibold px-8 py-3 rounded-lg hover:bg-green-600 transition-all shadow">
                    Produse
                </a>
                <a href="{{ route('services') }}" class="border-2 border-green-500 text-green-600 font-semibold px-8 py-3 rounded-lg hover:bg-green-50 transition-all">
                    Servicii
                </a>
            </div>
        </div>
    </section>

    <!-- DE CE SA ALEGI -->
    <section class="bg-white py-24 reveal">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ asset('images/carduri/camp.jpg') }}" alt="Câmp agricol Smart-Exim" class="w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-green-900 mb-10 leading-tight">
                    De ce să alegi Smart-Exim?
                </h2>
                @php
                    $avantaje = [
                        'Afacere de familie', 'Echipă experimentată',
                        'Produse locale, de sezon', 'Ambalaj sustenabil',
                        'Preț competitiv', 'Transport sigur',
                        'Lanț de producție transparent', 'Satisfacție garantată a clientului',
                    ];
                @endphp
                <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                    @foreach($avantaje as $avantaj)
                        <div class="flex items-start gap-3">
                            <span class="flex-shrink-0 mt-0.5 inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <span class="text-gray-600 text-lg">{{ $avantaj }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION (desprinsa) -->
    <section class="bg-white py-16 reveal">
        <div class="max-w-5xl mx-auto px-4">
            <div class="relative overflow-hidden bg-gradient-to-r from-green-700 to-green-800 rounded-3xl shadow-2xl py-16 px-6">
                <div class="absolute -top-16 -right-16 w-64 h-64 bg-green-600/30 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-green-500/20 rounded-full blur-3xl"></div>

                <div class="relative max-w-3xl mx-auto text-center">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Aveți întrebări?</h2>
                    <p class="text-lg md:text-xl text-green-100 mb-10">
                        Nu ezitați să ne contactați! Echipa noastră vă stă la dispoziție.
                    </p>
                    <a href="{{ route('contact') }}"
                       class="group inline-flex items-center gap-3 bg-white text-green-700 font-bold px-10 py-4 rounded-full shadow-lg hover:shadow-2xl hover:bg-green-50 hover:scale-105 transition-all duration-300">
                        Contactează-ne
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTICI -->
    <section class="bg-green-600 py-20 reveal">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center text-white">
                @php
                    $statistici = [
                        ['icon' => '🌱', 'cifra' => '20+',        'eticheta' => 'Ani de Experiență'],
                        ['icon' => '📍', 'cifra' => '70Ha',       'eticheta' => 'Livezi Intensive'],
                        ['icon' => '🍎', 'cifra' => '5.000 tone', 'eticheta' => 'Fructe pe An'],
                        ['icon' => '🌡️', 'cifra' => '24',         'eticheta' => 'Camere Frigorifice'],
                    ];
                @endphp
                @foreach($statistici as $stat)
                    <div class="flex flex-col items-center">
                        <div class="text-5xl mb-4">{{ $stat['icon'] }}</div>
                        <div class="text-4xl md:text-5xl font-extrabold mb-2">{{ $stat['cifra'] }}</div>
                        <div class="text-green-100 text-lg font-medium">{{ $stat['eticheta'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PARTENERI INTERNATIONALI (carusel) -->
    <section class="bg-white py-24 reveal overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-extrabold text-green-900 mb-4">Parteneri internaționali</h2>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Suntem mândri să avem ca parteneri lanțuri de magazine din întreaga lume.
            </p>
        </div>
        <div class="relative w-full">
            <div class="flex gap-6 animate-scroll-x w-max">
                @php
                    $tari = [
                        ['flag' => '🇷🇺', 'nume' => 'Rusia',     'img' => 'rusia.jpg'],
                        ['flag' => '🇵🇱', 'nume' => 'Polonia',   'img' => 'polonia.jpg'],
                        ['flag' => '🇧🇾', 'nume' => 'Belarus',   'img' => 'belarus.jpg'],
                        ['flag' => '🇦🇪', 'nume' => 'Dubai',     'img' => 'dubai.jpg'],
                        ['flag' => '🇮🇱', 'nume' => 'Israel',    'img' => 'israel.jpg'],
                        ['flag' => '🇸🇪', 'nume' => 'Suedia',    'img' => 'suedia.jpg'],
                        ['flag' => '🇱🇹', 'nume' => 'Lituania',  'img' => 'lituania.jpg'],
                        ['flag' => '🇷🇴', 'nume' => 'România',   'img' => 'romania.jpg'],
                    ];
                    $tariDublate = array_merge($tari, $tari);
                @endphp
                @foreach($tariDublate as $tara)
                    <div class="flex-shrink-0 w-72 rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-white">
                        <div class="h-44 overflow-hidden">
                            <img src="{{ asset('images/tari/' . $tara['img']) }}" alt="{{ $tara['nume'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex items-center justify-center gap-3 py-5">
                            <span class="text-3xl">{{ $tara['flag'] }}</span>
                            <span class="text-xl font-bold text-green-700">{{ $tara['nume'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        @keyframes scroll-x {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        .animate-scroll-x {
            animation: scroll-x 35s linear infinite;
        }
        .animate-scroll-x:hover {
            animation-play-state: paused;
        }
    </style>

    <script>
        function smoothScrollToContent() {
            const target = document.getElementById('continut');
            const top = target.getBoundingClientRect().top + window.scrollY - 80;
            const start = window.scrollY;
            const distance = top - start;
            const duration = 1100;
            let startTime = null;
            function easeInOutCubic(t) {
                return t < 0.5 ? 4 * t * t * t : 1 - Math.pow(-2 * t + 2, 3) / 2;
            }
            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                window.scrollTo(0, start + distance * easeInOutCubic(progress));
                if (progress < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }

        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.15 });
        reveals.forEach(el => observer.observe(el));
    </script>
@endsection
