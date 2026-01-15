<x-app>
    <div class="max-w-5xl mx-auto">

        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">

            <h1 class="text-2xl font-bold text-gray-800">
                Proveedores
            </h1>

            <form method="GET" action="{{ route('showProviders.index') }}" class="w-full md:max-w-md">

                <div class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar proveedor..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-2
                   focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-indigo-600 text-white
                   hover:bg-indigo-700 transition whitespace-nowrap">
                        Buscar
                    </button>
                </div>
            </form>



            <a href="{{ route('createProvider.create') }}"
                class="inline-flex justify-center px-4 py-2 rounded-lg
          bg-indigo-600 text-white hover:bg-indigo-700 transition
          w-full md:w-auto">
                Crear proveedor
            </a>


        </div>

        @if ($providers->count() === 0)
            <div class="bg-white border border-gray-200 rounded-xl p-6 text-center text-gray-500">
                No hay proveedores registrados.
            </div>
        @else
            <div class="overflow-x-auto bg-white border border-gray-200 rounded-xl shadow-sm">
                <table class="min-w-[600px] w-full text-sm text-left text-gray-700">

                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-6 py-3 w-24">ID</th>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3 text-center w-32">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @foreach ($providers as $provider)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-800">
                                    {{ $provider->id }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $provider->name }}
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <div class="flex flex-col gap-2 sm:flex-row sm:justify-center">

                                        <a href="{{ route('findProvider.show', $provider->id) }}"
                                            class="px-3 py-1.5 text-xs font-medium rounded-lg
                  border border-indigo-600 text-indigo-600
                  hover:bg-indigo-50 transition text-center">
                                            Editar
                                        </a>

                                        <form action="{{ route('provider.destroy', $provider->id) }}" method="POST"
                                            onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="w-full px-3 py-1.5 text-xs font-medium rounded-lg
                       border border-red-600 text-red-600
                       hover:bg-red-50 transition">
                                                Eliminar
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6 flex justify-center">
                    {{ $providers->links() }}
                </div>

            </div>
        @endif

    </div>
</x-app>
