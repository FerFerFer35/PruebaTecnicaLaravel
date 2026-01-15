<x-app>
    <div class="max-w-7xl mx-auto">

        <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
            <h1 class="text-2xl font-bold text-gray-800">
                Ingresos
            </h1>

            <a href="{{ route('createIncome.create') }}"
                class="w-full md:w-auto px-4 py-2 rounded-lg
                       bg-indigo-600 text-white hover:bg-indigo-700 transition text-center">
                Nuevo Ingreso
            </a>
        </div>

        <form method="GET" action="{{ route('showIncomes.index') }}"
            class="bg-white border border-gray-200 rounded-xl p-4 mb-6">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Proveedor
                    </label>

                    <input type="text" name="provider" value="{{ request('provider') }}"
                        placeholder="Nombre del proveedor"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Fecha
                    </label>

                    <input type="date" name="date" value="{{ request('date') }}"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2
                               focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="flex items-end gap-2">
                    <button type="submit"
                        class="w-full px-4 py-2 rounded-lg
                               bg-indigo-600 text-white hover:bg-indigo-700 transition">
                        Filtrar
                    </button>

                    <a href="{{ route('showIncomes.index') }}"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300
                               text-gray-700 hover:bg-gray-100 transition text-center">
                        Limpiar
                    </a>
                </div>

            </div>
        </form>

        <x-financial-table :items="$incomes" type="income" />

        <div class="mt-6 flex justify-center">
            {{ $incomes->links() }}
        </div>

    </div>
</x-app>
