@extends('layouts.public')
@section('title', 'Proces')

@section('content')
    <x-page-hero title="Procesul nostru" subtitle="De la sămânță până în magazin — urmărește călătoria produselor noastre prin fiecare etapă." />

    <!-- TIMELINE PROCES -->
    <section class="max-w-7xl mx-auto px-6 py-24">
        <div class="relative">
            {{-- linia verticala --}}
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-green-300 via-green-400 to-green-300 -translate-x-1/2 rounded-full"></div>

            @php
                $etape = [
                    ['nr' => '01', 'img' => 'productie.jpg',   'titlu' => 'Producție',            'text' => 'Totul începe în livezile și câmpurile noastre, unde cultivăm mere, cireșe și cereale folosind soiuri selectate și practici agricole moderne.'],
                    ['nr' => '02', 'img' => 'protectie.jpg',   'titlu' => 'Protecția culturilor', 'text' => 'Protejăm culturile împotriva dăunătorilor și a condițiilor meteo extreme prin sisteme antiploaie, plase de protecție și tratamente responsabile.'],
                    ['nr' => '03', 'img' => 'tehnica.jpg',     'titlu' => 'Tehnica agricolă',     'text' => 'Folosim utilaje și tehnologie agricolă de ultimă generație pentru a asigura eficiența și calitatea în fiecare etapă a cultivării și recoltării.'],
                    ['nr' => '04', 'img' => 'depozitare.jpg',  'titlu' => 'Depozitare',           'text' => 'După recoltare, produsele sunt păstrate în camere frigorifice cu temperatură controlată, care le mențin prospețimea pentru o perioadă îndelungată.'],
                    ['nr' => '05', 'img' => 'calitate.jpg',    'titlu' => 'Controlul calității',  'text' => 'Fiecare lot trece prin verificări riguroase de calitate, pentru a ne asigura că doar produsele care îndeplinesc cele mai înalte standarde ajung mai departe.'],
                    ['nr' => '06', 'img' => 'impachetare.jpg', 'titlu' => 'Împachetare',          'text' => 'Produsele sunt ambalate cu grijă în cutii de carton de diferite mărimi, ideale pentru depozitare și transport sigur.'],
                    ['nr' => '07', 'img' => 'transport.jpg',   'titlu' => 'Transport',            'text' => 'În final, livrăm produsele către parteneri din întreaga lume, în condiții climaterice controlate, ajungând proaspete pe rafturile magazinelor.'],
                ];
            @endphp

            <div class="space-y-16 md:space-y-0">
                @foreach($etape as $i => $etapa)
                    <div class="md:grid md:grid-cols-2 md:gap-20 items-center relative md:mb-24">

                        {{-- bulina cu numarul pe linie (doar desktop) --}}
                        <div class="hidden md:flex absolute left-1/2 -translate-x-1/2 z-10 w-16 h-16 rounded-full bg-green-700 text-white items-center justify-center font-bold text-xl shadow-xl border-4 border-white">
                            {{ $etapa['nr'] }}
                        </div>

                        @if($i % 2 == 0)
                            {{-- imagine stanga, text dreapta --}}
                            <div class="rounded-3xl overflow-hidden shadow-xl md:pr-6">
                                <img src="{{ asset('images/proces/' . $etapa['img']) }}" alt="{{ $etapa['titlu'] }}" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="mt-5 md:mt-0 md:pl-6">
                                <span class="md:hidden inline-block bg-green-700 text-white text-sm font-bold px-3 py-1 rounded-full mb-3">Pasul {{ $etapa['nr'] }}</span>
                                <span class="hidden md:inline-block text-green-500 font-bold text-sm tracking-widest mb-2">PASUL {{ $etapa['nr'] }}</span>
                                <h3 class="text-3xl font-extrabold text-green-800 mb-4">{{ $etapa['titlu'] }}</h3>
                                <p class="text-gray-600 text-lg leading-relaxed">{{ $etapa['text'] }}</p>
                            </div>
                        @else
                            {{-- text stanga, imagine dreapta --}}
                            <div class="mt-5 md:mt-0 md:pr-6 order-2 md:order-1">
                                <span class="md:hidden inline-block bg-green-700 text-white text-sm font-bold px-3 py-1 rounded-full mb-3">Pasul {{ $etapa['nr'] }}</span>
                                <span class="hidden md:inline-block text-green-500 font-bold text-sm tracking-widest mb-2">PASUL {{ $etapa['nr'] }}</span>
                                <h3 class="text-3xl font-extrabold text-green-800 mb-4">{{ $etapa['titlu'] }}</h3>
                                <p class="text-gray-600 text-lg leading-relaxed">{{ $etapa['text'] }}</p>
                            </div>
                            <div class="rounded-3xl overflow-hidden shadow-xl md:pl-6 order-1 md:order-2">
                                <img src="{{ asset('images/proces/' . $etapa['img']) }}" alt="{{ $etapa['titlu'] }}" class="w-full h-80 object-cover hover:scale-105 transition-transform duration-500">
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="bg-green-50 py-20">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <div class="text-5xl mb-4">🛒</div>
            <h2 class="text-3xl font-extrabold text-green-900 mb-4">De la livada noastră, direct la tine</h2>
            <p class="text-gray-600 text-lg mb-8">
                Acesta este drumul pe care îl parcurge fiecare produs Smart-Exim pentru a ajunge proaspăt și de calitate pe masa ta.
            </p>
            <a href="{{ route('products') }}" class="inline-block bg-green-700 text-white font-semibold px-8 py-3 rounded-lg hover:bg-green-800 transition-all shadow">
                Vezi produsele noastre
            </a>
        </div>
    </section>
@endsection
