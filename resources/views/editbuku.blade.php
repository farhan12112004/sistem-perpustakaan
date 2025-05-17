<x-layout>
    <x-slot:title>Edit Buku</x-slot:title>

    <div class="container w-300 bg-white p-6 ml-2 rounded-xl">
        <h1 class="text-3xl font-bold mb-6">Edit Buku</h1>

        <form action="{{ route('update.buku', $buku->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="judul_buku" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <input type="text" id="judul_buku" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $buku->kategori) }}" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    <option value="Tersedia" {{ $buku->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Dipinjam" {{ $buku->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 cursor-pointer hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">Update</button>
        </form>
    </div>
</x-layout>
