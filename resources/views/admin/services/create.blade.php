@extends('admin.layout')
@section('title', 'Adaugă serviciu')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Adaugă serviciu nou</h1>

    @if($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-xl shadow-sm space-y-4 max-w-2xl">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Titlu serviciu *</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Descriere</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description') }}</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Imagine serviciu</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:bg-blue-700 file:text-white hover:file:bg-blue-800">
            <p class="text-xs text-gray-500 mt-1">JPG, PNG sau WEBP, maxim 4MB.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded">
            <label for="is_active" class="text-sm">Serviciu activ (vizibil pe site)</label>
        </div>
        <div class="flex gap-3 pt-2">
            <button type="submit" class="bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-800">Salvează</button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">Anulează</a>
        </div>
    </form>
@endsection
