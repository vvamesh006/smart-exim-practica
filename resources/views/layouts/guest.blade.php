<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Smart-Exim') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
    <div class="min-h-screen flex">

        {{-- Stanga: imagine / brand --}}
        <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-green-700 via-green-700 to-green-900 items-center justify-center p-12">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-green-500/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-32 -left-24 w-96 h-96 bg-green-400/10 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 32px 32px;"></div>
            <div class="relative text-center text-white">
                <img src="{{ asset('images/logo.png') }}" alt="Smart-Exim" class="h-40 w-auto mx-auto bg-white rounded-2xl p-4 mb-8 shadow-2xl">
                <h2 class="text-3xl font-extrabold mb-3">Bine ai venit la Smart-Exim</h2>
                <p class="text-green-100 text-lg max-w-md">Comerț cu ridicata, intermedieri și transport rutier de mărfuri agricole din Republica Moldova.</p>
            </div>
        </div>

        {{-- Dreapta: formular --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-gray-50 px-6 py-12">
            <div class="w-full max-w-md">
                {{-- logo pe mobil --}}
                <a href="/" class="lg:hidden block text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Smart-Exim" class="h-24 w-auto mx-auto">
                </a>
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-10">
                    {{ $slot }}
                </div>
                <p class="text-center text-sm text-gray-400 mt-6">
                    <a href="/" class="hover:text-green-700 transition-colors">← Înapoi la site</a>
                </p>
            </div>
        </div>

    </div>
</body>
</html>
