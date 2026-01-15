<header x-data="{ open: false }" class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center min-h-16 py-2">

            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div
                    class="w-9 h-9 bg-indigo-600 text-white rounded-lg
                           flex items-center justify-center font-bold">
                    R
                </div>
            </a>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                <a href="{{ route('utilities.summary') }}" class="nav-link">Utilidades</a>
                <a href="{{ route('showIncomes.index') }}" class="nav-link">Ingresos</a>
                <a href="{{ route('showExpenses.index') }}" class="nav-link">Gastos</a>
                <a href="{{ route('showProviders.index') }}" class="nav-link">Proveedores</a>
                <a href="{{ route('incomes.chart') }}" class="nav-link">Grafica de ingresos y gastos</a>
            </nav>

            <div class="flex items-center gap-3">
                <span class="hidden sm:block text-sm text-gray-500">
                    Prueba Técnica
                </span>

                <button @click="open = !open" class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none">
                    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" x-transition @click.outside="open = false" class="md:hidden pb-4">
            <nav class="flex flex-col gap-2 mt-3">
                <a href="{{ route('home') }}" @click="open = false" class="mobile-link">Inicio</a>
                <a href="{{ route('utilities.summary') }}" @click="open = false" class="mobile-link">Utilidades</a>
                <a href="{{ route('showIncomes.index') }}" @click="open = false" class="mobile-link">Ingresos</a>
                <a href="{{ route('showExpenses.index') }}" @click="open = false" class="mobile-link">Gastos</a>
                <a href="{{ route('showProviders.index') }}" @click="open = false" class="mobile-link">Proveedores</a>
                <a href="{{ route('incomes.chart') }}" class="nav-link">Grafica de ingresos y gastos</a>
            </nav>
        </div>

    </div>
</header>
