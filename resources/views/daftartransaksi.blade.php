<x-layout>
    <x-slot:title>Daftar Transaksi</x-slot:title>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow mb-2">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <h1 class="text-2xl font-bold w-full sm:w-auto">Daftar Transaksi</h1>
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 w-full sm:w-auto">
            <!-- Form Pencarian -->
            <form action="{{ route('index.transaksi') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari berdasarkan nama..." 
                    class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transform hover:scale-[103%] transition-all duration-300">
                   <i class="fas fa-search"></i>
                </button>
            </form>

            <!-- Tombol Tambah transaksi -->
            <a href="{{ route('create.transaksi') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transform hover:scale-[103%] transition-all duration-300">
                + Tambah transaksi
            </a>
        </div>
    </div>
    <br>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    </div>

    <div class = "rounded-lg max-w-7xl mx-auto bg-white p-6 shadow mb-2">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-sm sm:text-base">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">No</th>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">Nama Anggota</th>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">Judul Buku</th>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">Tanggal Pinjam</th>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">Tanggal Kembali</th>
                         <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold"></th>
                        <th class="py-2 px-4 border-b bg-gray-800 text-white font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $index => $transaksi)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaksi->anggota->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaksi->buku->judul_buku }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaksi->tglpinjam }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaksi->tglkembali }}</td>
                            <td class="py-2 px-4 border-b">{{ $transaksi->status }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0 items-center justify-center">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('edit.transaksi', $transaksi->id) }}"
                                       class="inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded transition transform hover:scale-105">
                                       <i class="fa-solid fa-marker p-1"></i>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('delete.transaksi', $transaksi->id) }}" method="POST" class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center bg-red-500 hover:bg-red-700 text-white p-2 rounded transition transform hover:scale-105">
                                           <i class="fa-solid fa-delete-left p-1"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($transaksis->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4">Tidak ada data transaksi.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>
