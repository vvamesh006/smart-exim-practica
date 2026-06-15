<x-guest-layout>
    <h1 class="text-2xl font-extrabold text-green-900 mb-1">Creează un cont</h1>
    <p class="text-gray-500 text-sm mb-6">Înregistrează-te pentru a putea plasa comenzi.</p>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nume complet</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="Numele tău">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="email@exemplu.com">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Parolă</label>
            <input id="password" type="password" name="password" required
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="••••••••">
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmă parola</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="••••••••">
        </div>
        <button type="submit" class="w-full bg-green-700 text-white font-semibold py-3 rounded-xl hover:bg-green-800 hover:shadow-lg transition-all">
            Creează cont
        </button>
    </form>

    <p class="text-center text-sm text-gray-500 mt-6">
        Ai deja cont?
        <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline">Autentifică-te</a>
    </p>
</x-guest-layout>
