<x-app>
    <div class="max-w-6xl mx-auto px-4">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Ingresos vs Gastos mensuales
        </h2>

        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
            <div class="relative h-96">
                <canvas id="financeChart"></canvas>
            </div>
        </div>

    </div>
</x-app>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('financeChart');

    const labels = @json($labels);
    const incomeData = @json($incomeData);
    const expenseData = @json($expenseData);

    const maxValue = Math.max(
        ...incomeData,
        ...expenseData
    );

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Ingresos ($)',
                    data: incomeData,
                    backgroundColor: 'rgba(34, 197, 94, 0.7)',
                    borderColor: 'rgb(34, 197, 94)',
                    borderWidth: 1,
                    borderRadius: 6,
                    maxBarThickness: 40
                },
                {
                    label: 'Gastos ($)',
                    data: expenseData,
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: 'rgb(239, 68, 68)',
                    borderWidth: 1,
                    borderRadius: 6,
                    maxBarThickness: 40
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: maxValue * 1.15,
                    grace: '10%',
                    ticks: {
                        callback: value => '$' + value.toLocaleString()
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: context =>
                            `${context.dataset.label}: $${context.raw.toLocaleString()}`
                    }
                },
                legend: {
                    position: 'top'
                }
            }
        }
    });
</script>
