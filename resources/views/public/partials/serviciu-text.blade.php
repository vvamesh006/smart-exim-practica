<span class="inline-block bg-green-100 text-green-700 text-3xl w-16 h-16 rounded-2xl flex items-center justify-center mb-5">
    {{ $serviciu['emoji'] }}
</span>
<h2 class="text-3xl md:text-4xl font-extrabold text-green-900 mb-4">{{ $serviciu['titlu'] }}</h2>
<p class="text-gray-600 text-lg leading-relaxed mb-6">{{ $serviciu['text'] }}</p>
<ul class="space-y-3">
    @foreach($serviciu['puncte'] as $punct)
        <li class="flex items-center gap-3">
            <span class="flex-shrink-0 inline-flex items-center justify-center w-6 h-6 rounded-full bg-green-600 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </span>
            <span class="text-gray-700">{{ $punct }}</span>
        </li>
    @endforeach
</ul>
