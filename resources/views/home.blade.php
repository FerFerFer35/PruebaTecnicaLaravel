<x-app>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Utilidades
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Resumen de utilidades por proveedor.
                </p>

                <div class="flex gap-3">
                    <a href="{{ route('utilities.summary') }}"
                        class="px-4 py-2 rounded-lg bg-violet-600 text-white hover:bg-violet-700 transition">
                        Ver
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Ingresos
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Registro y consulta de ingresos.
                </p>

                <div class="flex gap-3">
                    <a href="{{ route('showIncomes.index') }}"
                        class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 transition">
                        Ver
                    </a>

                    <a href="{{ route('createIncome.create') }}"
                        class="px-4 py-2 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition">
                        Crear
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Gastos
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Control de egresos operativos.
                </p>

                <div class="flex gap-3">
                    <a href="{{ route('showExpenses.index') }}"
                        class="px-4 py-2 rounded-lg bg-rose-600 text-white hover:bg-rose-700 transition">
                        Ver
                    </a>

                    <a href="{{ route('createExpense.create') }}"
                        class="px-4 py-2 rounded-lg bg-rose-100 text-rose-700 hover:bg-rose-200 transition">
                        Crear
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Proveedores
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Gestión de proveedores registrados.
                </p>

                <div class="flex gap-3">
                    <a href="{{ route('showProviders.index') }}"
                        class="px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-indigo-700 transition">
                        Ver
                    </a>

                    <a href="{{ route('createProvider.create') }}"
                        class="px-4 py-2 rounded-lg bg-sky-100 text-sky-700 hover:bg-sky-200 transition">
                        Crear
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                    Grafica de ingresos y gastos
                </h3>
                <p class="text-sm text-gray-500 mb-4">
                    Visualización de ingresos y gastos mensuales
                </p>

                <div class="flex gap-3">
                    <a href="{{ route('incomes.chart') }}"
                        class="px-4 py-2 rounded-lg bg-sky-600 text-white hover:bg-indigo-700 transition">
                        Ver
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app>
