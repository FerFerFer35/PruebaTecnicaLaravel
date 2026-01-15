@php
    $isEdit = isset($provider);
@endphp

<form action="{{ $isEdit ? route('providers.update', $provider) : route('providers.store') }}" method="POST"
    class="space-y-5">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    @if ($isEdit)
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-1">
                ID
            </label>
            <input type="text" value="{{ $provider->id }}" disabled
                class="w-full rounded-lg border-gray-300 bg-gray-100 text-gray-500 cursor-not-allowed">
        </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Nombre
        </label>

        <input type="text" name="name" value="{{ old('name', $isEdit ? $provider->name : '') }}"
            class="w-full rounded-lg border
                @error('name')
                    border-red-500
                @else
                    border-gray-300
                @enderror
                focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('showProviders.index') }}"
            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
            Cancelar
        </a>

        <button type="submit"
            class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition font-medium">
            {{ $isEdit ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>
</form>
