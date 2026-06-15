<x-guest-layout>
    <h1 class="text-2xl font-extrabold text-green-900 mb-1">Autentificare</h1>
    <p class="text-gray-500 text-sm mb-6">Intră în contul tău pentru a continua.</p>

    @if (session('status'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="email@exemplu.com">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Parolă</label>
            <input id="password" type="password" name="password" required
                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition"
                   placeholder="••••••••">
        </div>
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                <span class="ms-2 text-sm text-gray-600">Ține-mă minte</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-green-700 hover:underline">Ai uitat parola?</a>
            @endif
        </div>
        <button type="submit" class="w-full bg-green-700 text-white font-semibold py-3 rounded-xl hover:bg-green-800 hover:shadow-lg transition-all">
            Autentificare
        </button>
    </form>

    @if (Route::has('register'))
        <p class="text-center text-sm text-gray-500 mt-6">
            Nu ai cont?
            <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Înregistrează-te</a>
        </p>
    @endif
</x-guest-layout>
