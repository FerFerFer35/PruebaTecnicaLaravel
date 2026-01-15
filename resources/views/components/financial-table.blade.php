@props(['items', 'type'])

<div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
    <table class="min-w-[900px] w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase text-gray-600">
            <tr>
                <th class="px-6 py-3">ID</th>
                <th class="px-6 py-3">Proveedor</th>
                <th class="px-6 py-3">Monto</th>
                <th class="px-6 py-3">Fecha</th>
                <th class="px-6 py-3">Descripción</th>
                <th class="px-6 py-3 text-center">Acciones</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @forelse ($items as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium">
                        {{ $item->id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $item->provider->name }}
                    </td>

                    <td class="px-6 py-4">
                        ${{ number_format($item->amount, 2) }}
                    </td>

                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($item->concept_date)->format('d/m/Y') }}
                    </td>

                    <td class="px-6 py-4 max-w-xs truncate">
                        {{ $item->description }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        <div class="flex flex-col gap-2 sm:flex-row sm:justify-center">

                            <a href="{{ route($type . 's.edit', $item->id) }}"
                                class="px-3 py-1.5 text-xs font-medium rounded-lg
                                      border border-indigo-600 text-indigo-600
                                      hover:bg-indigo-50 transition">
                                Editar
                            </a>

                            <form action="{{ route($type . 's.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('¿Seguro que deseas eliminar este registro?')"
                                    class="w-full px-3 py-1.5 text-xs font-medium rounded-lg
                                           border border-red-600 text-red-600
                                           hover:bg-red-50 transition">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                        No hay registros disponibles.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
