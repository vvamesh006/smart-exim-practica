@extends('layouts.public')
@section('title', 'Despre noi')

@section('content')
    <x-page-hero title="Despre noi" subtitle="Tradiție, calitate și pasiune pentru agricultură." />

    <!-- TEXT + IMAGINE -->
    <section class="max-w-6xl mx-auto px-4 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="rounded-2xl overflow-hidden shadow-xl">
                <img src="{{ asset('images/carduri/despre.jpg') }}" alt="Smart-Exim — livezi și culturi" class="w-full h-full object-cover">
            </div>
            <div>
                <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full mb-5">
                    Smart-Exim SRL
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-green-900 mb-6 leading-tight">
                    Peste două decenii de experiență în agricultură
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-4">
                    Cu peste două decenii de experiență, ne străduim continuu să cultivăm și să exportăm
                    cele mai bune mere, cireșe și cereale. Sustenabilitatea este în prim-planul operațiunilor
                    noastre și optăm pentru a fi lideri în industria agricolă.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Experiența noastră extinsă în acest domeniu ne-a permis să fim receptivi la schimbările
                    constante ale pieței și cerințelor clientului.
                </p>
            </div>
        </div>
    </section>

    <!-- VALORI -->
    <section class="bg-green-50 py-20">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-green-900 mb-12">Valorile noastre</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition-all">
                    <div class="text-5xl mb-4">🌱</div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Sustenabilitate</h3>
                    <p class="text-gray-500">Folosim practici agricole responsabile, cu grijă pentru mediu și generațiile viitoare.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition-all">
                    <div class="text-5xl mb-4">⭐</div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Calitate</h3>
                    <p class="text-gray-500">Fiecare produs trece prin standarde stricte de calitate, de la cultivare la livrare.</p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm text-center hover:shadow-md transition-all">
                    <div class="text-5xl mb-4">🤝</div>
                    <h3 class="text-xl font-semibold text-green-700 mb-2">Încredere</h3>
                    <p class="text-gray-500">Construim relații pe termen lung cu partenerii și clienții noștri din întreaga lume.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MISIUNEA NOASTRA -->
    <section class="max-w-6xl mx-auto px-4 py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full mb-5">
                    🎯 Misiunea noastră
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-green-900 mb-6 leading-tight">
                    Calitate de la livadă până la masa ta
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-4">
                    Misiunea noastră este să cultivăm și să livrăm produse agricole de cea mai înaltă
                    calitate, cu respect pentru natură și pentru oamenii care le aleg. Punem preț pe
                    prospețime, sustenabilitate și pe încrederea fiecărui partener.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Ne propunem să fim un partener de încredere pentru fermieri și comercianți, contribuind
                    la dezvoltarea agriculturii din Republica Moldova și la promovarea produselor locale pe
                    piețele internaționale.
                </p>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-xl order-first md:order-last">
                <img src="{{ asset('images/carduri/misiune.jpg') }}" alt="Misiunea Smart-Exim" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- CERTIFICARE GLOBAL G.A.P. -->
    <section class="bg-green-50 py-20">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden md:flex items-stretch">

                <div class="bg-gradient-to-br from-green-600 to-green-800 text-white p-10 flex flex-col items-center justify-center text-center md:w-2/5">
                    <div class="w-28 h-28 rounded-full bg-white/15 border-4 border-white/40 flex items-center justify-center mb-5">
                        <span class="text-5xl">✅</span>
                    </div>
                    <div class="text-2xl font-extrabold tracking-wide">GLOBAL G.A.P.</div>
                    <div class="text-green-100 text-sm mt-1">Certificare internațională</div>
                </div>

                <div class="p-10 md:w-3/5">
                    <span class="inline-block bg-green-100 text-green-700 text-sm font-semibold px-4 py-1 rounded-full mb-4">
                        🏅 Certificat de calitate
                    </span>
                    <h2 class="text-3xl font-extrabold text-green-900 mb-4 leading-tight">
                        Deținem certificarea GLOBAL G.A.P.
                    </h2>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        GLOBAL G.A.P. (Good Agricultural Practice) este standardul internațional de referință
                        pentru bune practici agricole. Această certificare confirmă că produsele noastre sunt
                        cultivate în condiții sigure, sustenabile și responsabile față de mediu și consumatori.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Pentru clienții și partenerii noștri, certificarea GLOBAL G.A.P. înseamnă garanția
                        siguranței alimentare, a trasabilității complete și a respectării celor mai înalte
                        standarde de calitate la nivel global.
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
