@extends('admin.layout')
@section('title', 'Servicii')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Servicii</h1>
        <a href="{{ route('admin.services.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">
            + Adaugă serviciu
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 text-sm">
                <tr>
                    <th class="px-6 py-3">Titlu</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Acțiuni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($services as $service)
                    <tr>
                        <td class="px-6 py-4 font-medium">{{ $service->title }}</td>
                        <td class="px-6 py-4">
                            @if($service->is_active)
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Activ</span>
                            @else
                                <span class="bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">Inactiv</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:underline">Editează</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Sigur ștergi acest serviciu?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-8 text-center text-gray-500">Nu există servicii încă.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
