<x-layout>
    <x-slot:title>Sistem Perpustakaan</x-slot:title>

    <!-- Tambahkan meta viewport di layout utama (jika belum ada di <head>) -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <!-- Main Content -->
    <div class="flex-1 p-4 sm:p-6">
        <h1 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center sm:text-left">Sistem Informasi Perpustakaan</h1>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 mb-6">
            <!-- Kartu Buku -->
            <a href="{{ route('index.buku') }}" class="block bg-white p-4 sm:p-6 rounded-lg shadow hover:shadow-lg transform transition-all hover:bg-blue-50 duration-300 hover:scale-[103%]">
                <div class="flex items-center">
                    <div class="text-blue-500 p-3 mr-4 text-3xl"><i class="fa-solid fa-book-open"></i></div>
                    <div>
                        <h2 class="text-base sm:text-lg font-semibold text-gray-700">Total Buku</h2>
                        <p class="text-xl sm:text-2xl font-bold">{{ $totalBuku }}</p>
                    </div>
                </div>
            </a>

            <!-- Kartu Anggota -->
            <a href="{{ route('index.anggota') }}" class="block bg-white p-4 sm:p-6 rounded-lg shadow hover:shadow-lg transition-all hover:bg-green-50 duration-300 hover:scale-[103%]">
                <div class="flex items-center">
                    <div class=" text-green-500 p-3 rounded-full mr-4 text-3xl"><i class="fa-solid fa-user"></i></div>
                    <div>
                        <h2 class="text-base sm:text-lg font-semibold text-gray-700">Total Anggota</h2>
                        <p class="text-xl sm:text-2xl font-bold">{{ $totalAnggota }}</p>
                    </div>
                </div>
            </a>

            <!-- Kartu Transaksi -->
            <a href="{{ route('index.transaksi') }}" class="block bg-white p-4 sm:p-6 rounded-lg shadow hover:shadow-lg transition-all hover:bg-yellow-50 duration-300 hover:scale-[103%]">
                <div class="flex items-center">
                    <div class=" text-yellow-500 p-3 mr-4 text-3xl"><i class="fas fa-right-left"></i></i></div>
                    <div>
                        <h2 class="text-base sm:text-lg font-semibold text-gray-700">Total Transaksi</h2>
                        <p class="text-xl sm:text-2xl font-bold">{{ $totalTransaksi }}</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pilihan Tahun -->
        <form method="GET" action="{{ route('dashboard') }}" class="mb-4">
            <label for="tahun" class="block text-sm font-medium text-gray-700 mb-1">Pilih Tahun</label>
            <select name="tahun" id="tahun" onchange="this.form.submit()" class="w-[80px] cursor-pointer max-w-xs p-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                @foreach ($availableYears as $thn)
                    <option value="{{ $thn }}" {{ $tahun == $thn ? 'selected' : '' }}>{{ $thn }}</option>
                @endforeach
            </select>
        </form>

        <!-- Grafik Peminjaman -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h2 class="text-lg sm:text-xl font-semibold mb-3 text-center">Grafik Peminjaman Buku</h2>
            <div class="relative h-[300px] sm:h-[400px] w-full overflow-x-auto">
                <canvas id="grafikPeminjamanBuku" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafikPeminjamanBuku').getContext('2d');
        const grafikPeminjamanBuku = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Peminjaman Buku',
                    data: @json($peminjamanData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false,
                    pointRadius: 5,
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Peminjaman'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    tooltip: {
                        enabled: true
                    }
                }
            }
        });
    </script>
</x-layout>
