<x-app title="utilities">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">
                Resumen por proveedor
            </h2>

            <form method="GET" action="{{ route('utilities.filter') }}" class="w-full sm:max-w-sm">
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
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 whitespace-nowrap">Proveedor</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 whitespace-nowrap">Ingresos</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 whitespace-nowrap">Gastos</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 whitespace-nowrap">Utilidad</th>
                        <th class="px-3 py-2 sm:px-4 sm:py-3 text-center whitespace-nowrap">Detalle</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($providers as $provider)
                        @php
                            $totalIncome = $provider->incomes->sum('amount');
                            $totalExpense = $provider->expenses->sum('amount');
                            $difference = $totalIncome - $totalExpense;
                        @endphp

                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-3 py-2 sm:px-4 sm:py-4 font-medium text-gray-800">
                                {{ $provider->name }}
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-4">
                                ${{ number_format($totalIncome, 2) }}
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-4">
                                ${{ number_format($totalExpense, 2) }}
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-4 font-semibold">
                                <span class="{{ $difference >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    ${{ number_format($difference, 2) }}
                                </span>
                            </td>

                            <td class="px-3 py-2 sm:px-4 sm:py-4 text-center">
                                <button onclick="toggleDetails({{ $provider->id }})"
                                    class="w-full sm:w-auto px-3 py-1.5 text-xs font-medium
                                           rounded-lg border border-gray-300
                                           hover:bg-gray-100 transition">
                                    Ver
                                </button>
                            </td>
                        </tr>

                        <tr id="details-{{ $provider->id }}" class="hidden bg-gray-50">
                            <td colspan="5" class="px-4 py-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    <div>
                                        <h4 class="font-semibold text-gray-700 mb-3">
                                            Ingresos
                                        </h4>

                                        @if ($provider->incomes->isEmpty())
                                            <p class="text-sm text-gray-500">
                                                Sin ingresos registrados
                                            </p>
                                        @else
                                            <ul class="space-y-1 text-sm text-gray-600">
                                                @foreach ($provider->incomes as $income)
                                                    <li>
                                                        • ${{ number_format($income->amount, 2) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                    <div>
                                        <h4 class="font-semibold text-gray-700 mb-3">
                                            Gastos
                                        </h4>

                                        @if ($provider->expenses->isEmpty())
                                            <p class="text-sm text-gray-500">
                                                Sin gastos registrados
                                            </p>
                                        @else
                                            <ul class="space-y-1 text-sm text-gray-600">
                                                @foreach ($provider->expenses as $expense)
                                                    <li>
                                                        • ${{ number_format($expense->amount, 2) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center sm:justify-end">
            {{ $providers->links() }}
        </div>

    </div>
</x-app>

<script>
    function toggleDetails(providerId) {
        const row = document.getElementById('details-' + providerId);
        row.classList.toggle('hidden');
    }
</script>
