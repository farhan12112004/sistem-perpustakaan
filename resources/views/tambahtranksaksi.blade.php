<x-layout>
    <x-slot:title>Tambah Transaksi</x-slot:title>

    <div class="container w-300 bg-white p-6 ml-2 rounded-xl">
        <h1 class="text-3xl font-bold mb-6">Tambah Transaksi</h1>

        <form action="{{ route('create.transaksi') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="anggota_id" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                <select id="anggota_id" name="anggota_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    @foreach($anggotas as $anggota)
                        <option value="{{ $anggota->id }}">{{ $anggota->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="buku_id" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <select id="buku_id" name="buku_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    @foreach($bukus as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tglpinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="date" id="tglpinjam" name="tglpinjam" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="tglkembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" id="tglkembali" name="tglkembali" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 cursor-pointer hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">Simpan</button>
        </form>
    </div>
</x-layout>
