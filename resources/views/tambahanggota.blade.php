<x-layout>
    <x-slot:title>Tambah Anggota</x-slot:title>

    <div class="container w-300 bg-white p-6 ml-2 rounded-xl">
        <h1 class="text-3xl font-bold mb-6">Tambah Anggota</h1>

        <form action="{{ route('create.anggota') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>

            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat" class="mt-1 p-2 w-full border border-gray-300 rounded" required></textarea>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 cursor-pointer hover:bg-blue-700 transform hover:scale-105 transition-all duration-300">Simpan</button>
        </form>
    </div>
</x-layout>