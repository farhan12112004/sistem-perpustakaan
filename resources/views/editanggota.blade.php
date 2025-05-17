<x-layout>
    <x-slot:title>Daftar Anggota</x-slot:title>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h1 class="text-2xl font-bold">Daftar Anggota</h1>
            <a href="{{ route('create.anggota') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transform hover:scale-105 transition-all duration-300">
                + Tambah Anggota
            </a>
        </div>

        {{-- Form Pencarian --}}
        <form action="{{ route('list.anggota') }}" method="GET" class="mb-4">
            <div class="flex flex-col sm:flex-row gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama anggota..." 
                       class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Cari
                </button>
            </div>
        </form>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-sm sm:text-base">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                        <th class="py-2 px-4 border-b">Alamat</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotas as $anggota)
                        <tr class="text-center">
                            <td class="py-2 px-4 border-b">{{ $anggota->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $anggota->jenis_kelamin }}</td>
                            <td class="py-2 px-4 border-b">{{ $anggota->alamat }}</td>
                            <td class="py-2 px-4 border-b">{{ $anggota->status }}</td>
                            <td class="py-2 px-4 border-b">
                                <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0 items-center justify-center">
                                    <a href="{{ route('edit.anggota', $anggota->id) }}"
                                       class="inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-2 rounded transition transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m-3 6h.01M4 13v7h7l9-9-7-7-9 9z" />
                                        </svg>
                                        <span class="hidden sm:inline ml-1">Edit</span>
                                    </a>

                                    <form action="{{ route('delete.anggota', $anggota->id) }}" method="POST" class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center justify-center bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded transition transform hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            <span class="hidden sm:inline ml-1">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">Data anggota tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
