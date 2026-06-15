@extends('admin.layout')
@section('title', 'Mesaje')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Mesaje primite</h1>
        <span class="bg-green-100 text-green-700 text-sm font-medium px-3 py-1 rounded-full">
            {{ $messages->where('is_read', false)->count() }} necitite
        </span>
    </div>

    <div class="space-y-4">
        @forelse($messages as $message)
            <div class="bg-white rounded-xl shadow-sm border {{ $message->is_read ? 'border-gray-100' : 'border-green-300 bg-green-50/30' }} p-6">
                <div class="flex flex-col lg:flex-row lg:items-start gap-4">
                    <div class="flex-grow">
                        <div class="flex items-center gap-3 mb-1">
                            <h3 class="font-bold text-lg">{{ $message->name }}</h3>
                            @if(!$message->is_read)
                                <span class="bg-green-600 text-white text-xs px-2 py-0.5 rounded-full">Nou</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-500 mb-2">
                            ✉️ {{ $message->email }}
                            @if($message->subject) · <strong>{{ $message->subject }}</strong> @endif
                        </p>
                        <p class="text-gray-700 bg-gray-50 rounded-lg p-3">{{ $message->message }}</p>
                        <p class="text-xs text-gray-400 mt-2">{{ $message->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    <div class="flex lg:flex-col gap-2">
                        <form action="{{ route('admin.messages.read', $message) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="w-full whitespace-nowrap bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                {{ $message->is_read ? '↩️ Marchează necitit' : '✓ Marchează citit' }}
                            </button>
                        </form>
                        <a href="mailto:{{ $message->email }}" class="text-center whitespace-nowrap border border-gray-300 text-gray-600 px-4 py-2 rounded-lg text-sm hover:bg-gray-50 transition">
                            Răspunde
                        </a>
                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                              onsubmit="return confirm('Sigur ștergi acest mesaj?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-full whitespace-nowrap text-red-600 px-4 py-2 rounded-lg text-sm hover:bg-red-50 transition">
                                Șterge
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                <div class="text-5xl mb-3">📭</div>
                <p class="text-gray-500">Nu există mesaje încă.</p>
            </div>
        @endforelse
    </div>
@endsection
