<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
<script src="{{ asset('build/assets/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


    <style>
        .hamburger span {
            display: block;
            height: 2px;
            width: 25px;
            background: #fff;
            margin: 5px auto;
            transition: all 0.3s ease-in-out;
        }

        .hamburger.open span:nth-child(1) {
            transform: rotate(45deg) translateY(8px);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open span:nth-child(3) {
            transform: rotate(-45deg) translateY(-8px);
        }
    </style>
</head>
<body class="bg-slate-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-md px-6 py-3 flex justify-between items-center relative h-[60px] md:h-[85px]">
      <div class="text-lg sm:text-2xl md:text-3xl font-bold text-white flex items-center gap-3">
  <i class="fas fa-university text-lg sm:text-2xl md:text-3xl"></i>
  <span class="leading-tight">Sistem Informasi Perpustakaan</span>
</div>

        <!-- Hamburger -->
        <button id="menu-btn" class="lg:hidden focus:outline-none hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex space-x-6 text-sm lg:text-base items-center font-semibold">
            <li><a href="{{ route('dashboard') }}" class="text-white hover:text-blue-400">Dashboard</a></li>
            <li><a href="{{ route('index.buku') }}" class="text-white hover:text-blue-400">Buku</a></li>
            <li><a href="{{ route('index.anggota') }}" class="text-white hover:text-blue-400">Anggota</a></li>
            <li><a href="{{ route('index.transaksi') }}" class="text-white hover:text-blue-400">Transaksi</a></li>

            <!-- Dropdown Laporan -->
            <li class="relative">
                <button id="laporan-btn" class="text-white hover:text-blue-400 flex items-center gap-1 pe-3 focus:outline-none hover:bg-blue-700 transform  px-4 py-2 rounded transition duration-300 ease-in-out hover:scale-105">
                    <i class="fas fa-chart-line text-white text-lg"></i>
                </button>
                <ul id="laporan-menu" class="hidden absolute bg-white shadow-md rounded-md py-2 w-[100px] mt-2 z-50">
                    <li>
                        <a href="{{ route('transaksi.cetak') }}" target="_blank" class="block px-4 py-2 hover:bg-blue-100">Laporan Transaksi</a>
                    </li>
                    <li>
                        <a href="{{ route('anggota.cetak') }}" target="_blank" class="block px-4 py-2 hover:bg-blue-100">Laporan Anggota</a>
                    </li>
                </ul>
            </li>

            <li class="list-none">
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white bg-gray-800 hover:bg-red-500 transform  px-4 py-2 rounded transition duration-300 ease-in-out hover:scale-105"><i class="fa-solid fa-power-off"></i></button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Mobile Menu -->
   <ul id="mobile-menu" class="hidden lg:hidden absolute bg-gray-900 rounded-xl opacity-90 w-64 h-full right-0 shadow-lg z-10 py-6 px-6 space-y-2 text-lg border-t font-semibold text-white border-gray-200">
        <li><a href="{{ route('dashboard') }}" class="block hover:text-blue-500 pb-3"><i class="fa-solid fa-house px-3 py-auto"></i>Dashboard</a></li>
        <li><a href="{{ route('index.buku') }}" class="block hover:text-blue-500 pb-3"><i class="fa-solid fa-book px-3 py-auto"></i>Buku</a></li>
        <li><a href="{{ route('index.anggota') }}" class="block hover:text-blue-500 pb-3"><i class="fa-solid fa-user px-3 py-auto"></i>Anggota</a></li>
        <li><a href="{{ route('index.transaksi') }}" class="block hover:text-blue-500 pb-3"><i class="fa-solid fa-exchange-alt px-3 py-auto"></i>Transaksi</a></li>
        <li><a href="{{ route('transaksi.cetak') }}" target="_blank" class="block hover:text-blue-500 pb-3"><i class="fa-solid fa-file-alt px-3 py-auto"></i>Laporan Transaksi</a></li>
        <li><a href="{{ route('anggota.cetak') }}" target="_blank" class="block hover:text-blue-500 pb-5"><i class="fa-solid fa-file-alt px-3 py-auto"></i>Laporan Anggota</a></li>
        <li>
            
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <div class="text-center">
  <button class="bg-red-500 text-white px-4 py-2 rounded mt-6 transform transition-all duration-300 ease-in-out hover:bg-red-600 hover:scale-105"><i class="fa-solid fa-sign-out-alt px-3 py-auto"></i>Logout</button>
</div>
            </form>
        </li>
    </ul>

    <!-- Content -->
    <main class="p-4 sm:p-6 max-w-7xl mx-auto">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Hamburger menu toggle
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                menuBtn.classList.toggle('open');
            });

            // Dropdown laporan toggle
            const laporanBtn = document.getElementById('laporan-btn');
            const laporanMenu = document.getElementById('laporan-menu');

            laporanBtn?.addEventListener('click', (e) => {
                e.stopPropagation();
                laporanMenu?.classList.toggle('hidden');
            });

            // Klik di luar dropdown tutup menu
            document.addEventListener('click', () => {
                laporanMenu?.classList.add('hidden');
            });
        });
    </script>

</body>
</html>
