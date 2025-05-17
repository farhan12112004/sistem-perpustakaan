<x-layout>
    <x-slot:title>Edit Transaksi</x-slot:title>

    <div class="container w-300 bg-white p-6 ml-2 rounded-xl">
        <h1 class="text-3xl font-bold mb-6">Edit Transaksi</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('update.transaksi', $transaksi->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Input Anggota -->
            <div>
                <label for="anggota_id" class="block text-sm font-medium text-gray-700">Anggota</label>
                <select id="anggota_id" name="anggota_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    @foreach($anggotas as $anggota)
                        <option value="{{ $anggota->id }}" {{ old('anggota_id', $transaksi->anggota_id) == $anggota->id ? 'selected' : '' }}>
                            {{ $anggota->nama }} ({{ $anggota->nomor_anggota }})
                        </option>
                    @endforeach
                </select>
                @error('anggota_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Buku -->
            <div>
                <label for="buku_id" class="block text-sm font-medium text-gray-700">Buku</label>
                <select id="buku_id" name="buku_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    @foreach($bukus as $buku)
                        <option value="{{ $buku->id }}" {{ old('buku_id', $transaksi->buku_id) == $buku->id ? 'selected' : '' }}>
                            {{ $buku->judul_buku }} ({{ $buku->kategori }})
                        </option>
                    @endforeach
                </select>
                @error('buku_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Tanggal Pinjam -->
            <div>
                <label for="tglpinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="date" id="tglpinjam" name="tglpinjam"
                       value="{{ old('tglpinjam', $transaksi->tglpinjam) }}"
                       class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                @error('tglpinjam')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Tanggal Kembali -->
            <div>
                <label for="tglkembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" id="tglkembali" name="tglkembali"
                       value="{{ old('tglkembali', $transaksi->tglkembali) }}"
                       class="mt-1 p-2 w-full border border-gray-300 rounded">
                @error('tglkembali')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    <option value="Dipinjam" {{ old('status', $transaksi->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Dikembalikan" {{ old('status', $transaksi->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    <option value="Terlambat" {{ old('status', $transaksi->status) == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 cursor-pointer hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">Update</button>

        </form>
    </div>
</x-layout>
