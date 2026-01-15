@php
    $isEdit = isset($expense);
@endphp

<form action="{{ $isEdit ? route('updateExpense.update', $expense->id) : route('expense.store') }}" method="POST"
    class="space-y-5">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Proveedor
        </label>

        <select name="provider_id"
            class="w-full rounded-lg border
                @error('provider_id') border-red-500 @else border-gray-300 @enderror
                focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">Selecciona un proveedor</option>

            @foreach ($providers as $provider)
                <option value="{{ $provider->id }}" @selected(old('provider_id', $isEdit ? $expense->provider_id : '') == $provider->id)>
                    {{ $provider->name }}
                </option>
            @endforeach
        </select>

        @error('provider_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Monto
        </label>

        <input type="number" step="0.01" name="amount" value="{{ old('amount', $isEdit ? $expense->amount : '') }}"
            class="w-full rounded-lg border
                @error('amount') border-red-500 @else border-gray-300 @enderror
                focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

        @error('amount')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Fecha
        </label>

        <input type="date" name="concept_date" max="{{ now()->toDateString() }}"
            value="{{ old(
                'concept_date',
                $isEdit ? \Carbon\Carbon::parse($expense->concept_date)->format('Y-m-d') : now()->toDateString(),
            ) }}"
            class="w-full rounded-lg border
        @error('concept_date') border-red-500 @else border-gray-300 @enderror
        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />


        @error('concept_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
            Descripción
        </label>

        <textarea name="description" rows="3"
            class="w-full rounded-lg border
                @error('description') border-red-500 @else border-gray-300 @enderror
                focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $isEdit ? $expense->description : '') }}</textarea>

        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('showExpenses.index') }}"
            class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
            Cancelar
        </a>

        <button type="submit"
            class="px-5 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition font-medium">
            {{ $isEdit ? 'Actualizar' : 'Guardar' }}
        </button>
    </div>
</form>
