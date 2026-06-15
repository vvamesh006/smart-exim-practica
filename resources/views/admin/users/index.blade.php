@extends('admin.layout')
@section('title', 'Utilizatori')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Utilizatori înregistrați</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3">Utilizator</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Rol</th>
                    <th class="px-6 py-3">Înregistrat</th>
                    <th class="px-6 py-3 text-right">Acțiuni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <span class="w-9 h-9 rounded-full bg-green-700 text-white flex items-center justify-center text-sm font-bold">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </span>
                                <span class="font-medium">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if($user->isAdmin())
                                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-medium">★ Administrator</span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full font-medium">Client</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-xs">{{ $user->created_at->format('d.m.Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            @if($user->id === auth()->id())
                                <span class="text-gray-400 text-xs italic">Contul tău</span>
                            @else
                                <form action="{{ route('admin.users.role', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    @if($user->isAdmin())
                                        <button type="submit" class="border border-gray-300 text-gray-600 px-4 py-1.5 rounded-lg text-xs hover:bg-gray-50"
                                                onclick="return confirm('Retragi rolul de admin de la {{ $user->name }}?');">
                                            Retrage admin
                                        </button>
                                    @else
                                        <button type="submit" class="bg-green-600 text-white px-4 py-1.5 rounded-lg text-xs font-medium hover:bg-green-700"
                                                onclick="return confirm('Faci admin pe {{ $user->name }}?');">
                                            ★ Fă admin
                                        </button>
                                    @endif
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
