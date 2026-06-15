@extends('layouts.public')
@section('title', 'Servicii')

@section('content')
    <x-page-hero title="Serviciile noastre" subtitle="De la împachetare la livrare — oferim soluții complete pentru produsele tale." />

    <!-- SERVICII -->
    <section class="max-w-6xl mx-auto px-4 py-20 space-y-20">

        @php
            $servicii = [
                [
                    'img' => 'impachetare.jpg',
                    'emoji' => '📦',
                    'titlu' => 'Împachetare',
                    'text' => 'Oferim servicii de ambalare profesională în cutii de carton de diferite mărimi, ideale pentru depozitarea și transportul fructelor. Ambalajele noastre protejează produsele și le păstrează prospețimea pe tot parcursul livrării.',
                    'puncte' => ['Cutii de 10kg, 14kg și 16kg', 'Ambalaj sustenabil și rezistent', 'Protecție optimă pentru fructe'],
                ],
                [
                    'img' => 'frigorifice.jpg',
                    'emoji' => '❄️',
                    'titlu' => 'Camere frigorifice',
                    'text' => 'Dispunem de 24 de camere frigorifice moderne, fiecare cu o capacitate de 180 de tone, dotate cu sisteme avansate de control al temperaturii. Acestea mențin prospețimea fructelor pentru perioade îndelungate.',
                    'puncte' => ['24 de camere disponibile', 'Capacitate de 180 tone fiecare', 'Temperatură controlată automat'],
                ],
                [
                    'img' => 'transport.jpg',
                    'emoji' => '🚚',
                    'titlu' => 'Transport',
                    'text' => 'Asigurăm transport rutier sigur pentru mărfurile dumneavoastră, la nivel național și internațional. Flota noastră livrează produsele în condiții climaterice controlate, ajungând proaspete la destinație.',
                    'puncte' => ['Livrare națională și internațională', 'Condiții climaterice controlate', 'Livrare la timp, garantată'],
                ],
            ];
        @endphp

        @foreach($servicii as $i => $serviciu)
            <div class="grid md:grid-cols-2 gap-12 items-center">
                @if($i % 2 == 0)
                    {{-- imagine stanga --}}
                    <div class="rounded-3xl overflow-hidden shadow-xl">
                        <img src="{{ asset('images/servicii/' . $serviciu['img']) }}" alt="{{ $serviciu['titlu'] }}" class="w-full h-80 object-cover">
                    </div>
                    <div>
                        @include('public.partials.serviciu-text', ['serviciu' => $serviciu])
                    </div>
                @else
                    {{-- imagine dreapta --}}
                    <div class="order-2 md:order-1">
                        @include('public.partials.serviciu-text', ['serviciu' => $serviciu])
                    </div>
                    <div class="rounded-3xl overflow-hidden shadow-xl order-1 md:order-2">
                        <img src="{{ asset('images/servicii/' . $serviciu['img']) }}" alt="{{ $serviciu['titlu'] }}" class="w-full h-80 object-cover">
                    </div>
                @endif
            </div>
        @endforeach

    </section>

    <!-- CTA -->
    <section class="bg-green-50 py-16">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-extrabold text-green-900 mb-4">Ai nevoie de serviciile noastre?</h2>
            <p class="text-gray-600 text-lg mb-8">Contactează-ne și îți oferim o soluție personalizată pentru afacerea ta.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-green-700 text-white font-semibold px-8 py-3 rounded-lg hover:bg-green-800 transition-all shadow">
                Contactează-ne
            </a>
        </div>
    </section>
@endsection
