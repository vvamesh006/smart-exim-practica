@extends('admin.layout')
@section('title', 'Produse')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Produse</h1>
        <a href="{{ route('admin.products.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
            + Adaugă produs
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-600 text-sm">
                <tr>
                    <th class="px-6 py-3">Imagine</th>
                    <th class="px-6 py-3">Nume</th>
                    <th class="px-6 py-3">Categorie</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Acțiuni</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr>
                        <td class="px-6 py-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="h-12 w-12 object-cover rounded-lg">
                            @else
                                <div class="h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-300">—</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->category->name ?? '—' }}</td>
                        <td class="px-6 py-4">
                            @if($product->is_active)
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">Activ</span>
                            @else
                                <span class="bg-gray-200 text-gray-600 text-xs px-2 py-1 rounded-full">Inactiv</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:underline">Editează</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Sigur ștergi acest produs?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Nu există produse încă.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
