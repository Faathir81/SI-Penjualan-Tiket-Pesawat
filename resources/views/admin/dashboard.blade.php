<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ __("You're logged in!") }}</p>

                    <!-- Chart Section -->
                    <div x-data="salesChart()" class="mt-6 bg-gray-100 p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-semibold text-indigo-600 mb-4">Product Sales Overview</h3>
                        <canvas id="salesChart"></canvas>
                    </div>

                    <!-- Button to Navigate -->
                    <div class="mt-6">
                        <a href="products"
                            class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-md shadow hover:bg-indigo-600 focus:outline-none">
                            Manage Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Alpine.js Chart Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('salesChart', () => ({
                init() {
                    this.renderChart();
                },
                renderChart() {
                    const ctx = document.getElementById('salesChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                            datasets: [{
                                label: 'Sales (Rp)',
                                data: [1200, 1900, 1500, 2100, 1800, 2200],
                                borderColor: '#3B82F6',
                                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                }
                            }
                        }
                    });
                }
            }));
        });
    </script>
</x-app-layout>