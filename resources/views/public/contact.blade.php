@extends('layouts.public')
@section('title', 'Contact')

@section('content')
    <x-page-hero title="Contactează-ne" subtitle="Suntem aici să răspundem oricăror întrebări ai avea." />

    <section class="max-w-6xl mx-auto px-4 py-20">
        <div class="grid lg:grid-cols-2 gap-12">

            {{-- Coloana stanga: detalii contact --}}
            <div>
                <h2 class="text-3xl font-extrabold text-green-900 mb-6">Suntem la dispoziția ta</h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-10">
                    Ai o întrebare despre produsele sau serviciile noastre? Completează formularul sau
                    folosește datele de mai jos — echipa noastră îți va răspunde cât mai curând posibil.
                </p>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">📍</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Adresă</h3>
                            <p class="text-gray-500">Satul Colicăuți, Raionul Briceni,<br>Republica Moldova</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">📞</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Telefon</h3>
                            <p class="text-gray-500">+373 22 000 000</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">✉️</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-500">contact@smart-exim.md</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">🕐</div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Program</h3>
                            <p class="text-gray-500">Luni – Vineri: 08:00 – 18:00<br>Sâmbătă – Duminică: Închis</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Coloana dreapta: formular --}}
            <div>
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-10">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-6 flex items-center gap-2">
                            <span>✅</span> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-6">
                            <ul class="list-disc list-inside text-sm">
                                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif

                    @guest
                        <div class="text-center py-8">
                            <div class="text-5xl mb-4">🔒</div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">Autentifică-te pentru a trimite un mesaj</h3>
                            <p class="text-gray-500 mb-6">Trebuie să ai un cont pentru a ne contacta prin formular.</p>
                            <a href="{{ route('login') }}" class="inline-block bg-green-700 text-white font-semibold px-6 py-3 rounded-xl hover:bg-green-800 transition">Autentifică-te</a>
                        </div>
                    @else
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Trimite-ne un mesaj</h3>
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nume complet *</label>
                                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required placeholder="Numele tău"
                                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required placeholder="email@exemplu.com"
                                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Subiect</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Despre ce dorești să discutăm?"
                                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mesaj *</label>
                                <textarea name="message" rows="5" required placeholder="Scrie mesajul tău aici..."
                                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition">{{ old('message') }}</textarea>
                            </div>
                            <button type="submit"
                                    class="group w-full flex items-center justify-center gap-2 bg-green-700 text-white font-semibold px-6 py-4 rounded-xl hover:bg-green-800 hover:shadow-lg transition-all">
                                Trimite mesajul
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    @endguest
                </div>
            </div>

        </div>
    </section>

    <!-- HARTA -->
    <section class="max-w-6xl mx-auto px-4 pb-20">
        <h2 class="text-3xl font-extrabold text-green-900 text-center mb-8">📍 Unde ne găsești</h2>
        <div class="rounded-3xl overflow-hidden shadow-xl border-4 border-green-100">
            <iframe
                src="https://maps.google.com/maps?q=Colic%C4%83u%C8%9Bi%2C%20Briceni%2C%20Moldova&t=&z=12&ie=UTF8&iwloc=B&output=embed"
                class="w-full h-96 border-0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="Locația Smart-Exim">
            </iframe>
        </div>
    </section>
@endsection
