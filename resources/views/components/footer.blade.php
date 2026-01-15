<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-6">

            <div class="text-center md:text-left">
                <p class="text-sm text-gray-500">
                    © {{ date('Y') }} REPSA. Todos los derechos reservados.
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Prueba técnica desarrollada con Laravel & Tailwind CSS.
                </p>
            </div>

            <nav class="flex justify-center md:justify-end space-x-6 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Inicio
                </a>
                <a href="{{ route('utilities.summary') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Utilidades
                </a>
                <a href="{{ route('showIncomes.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Ingresos
                </a>
                <a href="{{ route('showExpenses.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Gastos
                </a>
                <a href="{{ route('showProviders.index') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Proveedores
                </a>
                <a href="{{ route('incomes.chart') }}" class="text-gray-500 hover:text-indigo-600 transition">
                    Grafica de ingresos y gastos
                </a>
            </nav>

        </div>

    </div>
</footer>
