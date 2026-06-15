@props(['title', 'subtitle' => null])

<section class="relative overflow-hidden bg-gradient-to-br from-green-700 via-green-700 to-green-900 text-white">
    {{-- Forme decorative --}}
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-green-500/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-32 -left-24 w-96 h-96 bg-green-400/10 rounded-full blur-3xl"></div>
    {{-- Pattern subtil --}}
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 32px 32px;"></div>

    <div class="relative max-w-6xl mx-auto px-4 py-24 text-center">
        <div class="w-16 h-1 bg-green-300 rounded-full mx-auto mb-6"></div>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4">{{ $title }}</h1>
        @if($subtitle)
            <p class="text-green-100 text-lg md:text-xl max-w-2xl mx-auto">{{ $subtitle }}</p>
        @endif
    </div>
</section>
