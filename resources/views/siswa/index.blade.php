<x-app-layout>
    {{-- Inisialisasi Alpine.js State --}}
    <div x-data="{
            isModalOpen: false,
            isDeleteModalOpen: false,
            selectedSiswa: {},
            deleteRoute: ''
        }"
        class="py-12 bg-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-gray-900 mb-6">Data Siswa</h1>

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-gray-700 border-b border-gray-100 uppercase text-xs tracking-wider">
                                <th class="px-6 py-4 font-semibold">NO</th>
                                <th class="px-6 py-4 font-semibold">NIS</th>
                                <th class="px-6 py-4 font-semibold">Nama</th>
                                <th class="px-6 py-4 font-semibold">Sekolah</th>
                                <th class="px-6 py-4 font-semibold">Kelas/Jurusan</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($siswas as $siswa)
                            <tr class="{{ $loop->even ? 'bg-red-50' : 'bg-white' }} border-b border-gray-50 transition duration-150">
                                {{-- Logika Nomor agar berlanjut di tiap halaman pagination --}}
                                <td class="px-6 py-4 text-sm text-blue-400">
                                    {{ ($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration }}.
                                </td>
                                <td class="px-6 py-4 text-sm font-bold text-red-600">{{ $siswa->nis }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-500">{{ $siswa->nama }}</td>
                                <td class="px-6 py-4 text-sm text-gray-400">{{ $siswa->nama_sekolah }}</td>
                                <td class="px-6 py-4 text-sm text-gray-400">{{ $siswa->kelas }} - {{ $siswa->jurusan }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $siswa->status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                        {{ $siswa->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-2">
                                        {{-- Icon Detail (Eye) --}}
                                        <button @click="isModalOpen = true; selectedSiswa = {{ $siswa }}"
                                                class="p-1.5 text-blue-600 hover:bg-blue-100 rounded-md transition"
                                                title="Lihat Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </button>

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="p-1.5 text-amber-600 hover:bg-amber-100 rounded-md transition" title="Edit Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>

                                        {{-- Tombol Hapus (Trigger Modal) --}}
                                        <button @click="isDeleteModalOpen = true; selectedSiswa = {{ $siswa }}; deleteRoute = '{{ route('siswa.destroy', $siswa->id) }}'"
                                                class="p-1.5 text-red-600 hover:bg-red-100 rounded-md transition"
                                                title="Hapus Data">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- --- CUSTOM PAGINATION (WARNA PUTIH/NETRAL) --- --}}
@if ($siswas->hasPages())
<div class="px-6 py-4 bg-white border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
    {{-- Info Data --}}
    <p class="text-sm text-gray-500">
        Menampilkan <span class="font-semibold text-gray-800">{{ $siswas->firstItem() }}</span>
        sampai <span class="font-semibold text-gray-800">{{ $siswas->lastItem() }}</span>
        dari <span class="font-semibold text-gray-800">{{ $siswas->total() }}</span> data
    </p>

    {{-- Tombol Navigasi --}}
    <nav class="flex items-center gap-1">
        {{-- Previous --}}
        @if ($siswas->onFirstPage())
            <span class="px-3 py-2 bg-gray-50 text-gray-300 rounded-lg cursor-not-allowed border border-gray-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </span>
        @else
            <a href="{{ $siswas->previousPageUrl() }}" class="px-3 py-2 bg-white text-gray-600 hover:bg-gray-50 hover:text-gray-900 border border-gray-200 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($siswas->getUrlRange(max(1, $siswas->currentPage() - 2), min($siswas->lastPage(), $siswas->currentPage() + 2)) as $page => $url)
            @if ($page == $siswas->currentPage())
                {{-- Tombol Aktif (Putih dengan Border Gelap/Tegas) --}}
                <span class="px-4 py-2 bg-white text-red-700 font-bold rounded-lg border-2 border-red-600 shadow-sm">
                    {{ $page }}
                </span>
            @else
                {{-- Tombol Tidak Aktif --}}
                <a href="{{ $url }}" class="px-4 py-2 bg-white text-gray-600 hover:bg-gray-50 hover:border-gray-400 hover:text-red-900 border border-gray-200 rounded-lg transition">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        {{-- Next --}}
        @if ($siswas->hasMorePages())
            <a href="{{ $siswas->nextPageUrl() }}" class="px-3 py-2 bg-white text-red-600 hover:bg-gray-50 hover:text-red-600 border border-red-200 rounded-lg transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        @else
            <span class="px-3 py-2 bg-gray-50 text-gray-300 rounded-lg cursor-not-allowed border border-gray-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </span>
        @endif
    </nav>
</div>
@endif
            </div>

            <div class="mt-8 flex gap-4">
                <a href="{{ route('siswa.create') }}" class="bg-[#C52222] hover:bg-red-800 text-white font-semibold py-3 px-8 rounded-xl transition shadow-md">
                    Tambah Siswa
                </a>
                <button class="bg-white border-2 border-[#C52222] text-[#C52222] font-semibold py-3 px-8 rounded-xl hover:bg-red-50 transition shadow-sm">
                    Ajukan Siswa
                </button>
            </div>
        </div>

        {{-- --- MODAL POPUP DETAIL --- --}}
        <div x-show="isModalOpen"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 overflow-y-auto"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-cloak>

            <div @click.away="isModalOpen = false" class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden border border-gray-100">
                <div class="bg-[#C52222] p-6 text-white flex justify-between items-center">
                    <h3 class="text-xl font-bold">Detail Data Siswa</h3>
                    <button @click="isModalOpen = false" class="text-white hover:text-gray-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="p-8 space-y-4 text-gray-700">
                    <div class="grid grid-cols-3 border-b border-gray-100 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">NIS</span>
                        <span class="col-span-2 font-bold text-red-600" x-text="selectedSiswa.nis"></span>
                    </div>
                    <div class="grid grid-cols-3 border-b border-gray-100 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">Nama Lengkap</span>
                        <span class="col-span-2 font-medium" x-text="selectedSiswa.nama"></span>
                    </div>
                    <div class="grid grid-cols-3 border-b border-gray-100 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">Sekolah</span>
                        <span class="col-span-2" x-text="selectedSiswa.nama_sekolah"></span>
                    </div>
                    <div class="grid grid-cols-3 border-b border-gray-100 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">Jenis Kelamin</span>
                        <span class="col-span-2" x-text="selectedSiswa.jenis_kelamin"></span>
                    </div>
                    <div class="grid grid-cols-3 border-b border-gray-100 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">Kelas / Jurusan</span>
                        <span class="col-span-2" x-text="selectedSiswa.kelas + ' - ' + selectedSiswa.jurusan"></span>
                    </div>
                    <div class="grid grid-cols-3 pb-2">
                        <span class="font-semibold text-gray-400 uppercase text-xs">Status</span>
                        <span class="col-span-2">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700" x-text="selectedSiswa.status"></span>
                        </span>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 px-8 flex justify-end">
                    <button @click="isModalOpen = false" class="bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-300 transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

        {{-- --- MODAL KONFIRMASI HAPUS --- --}}
        <div x-show="isDeleteModalOpen"
             class="fixed inset-0 z-[60] flex items-center justify-center p-4 bg-black bg-opacity-50"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-cloak>

            <div @click.away="isDeleteModalOpen = false" class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden">
                <div class="p-6 text-center">
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 mb-4">
                        <svg class="h-10 w-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Hapus</h3>
                    <p class="text-gray-500 mb-6">
                        Yakin mau hapus data <span class="font-bold text-gray-800" x-text="selectedSiswa.nama"></span>?
                        Data yang dihapus nggak bisa balik lagi lho!
                    </p>

                    <div class="flex justify-center gap-3">
                        <button @click="isDeleteModalOpen = false"
                                class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition">
                            Batal
                        </button>

                        {{-- Form Hapus Sesungguhnya dengan Binding URL dinamis --}}
                        <form :action="deleteRoute" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-6 py-2.5 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-200">
                                Ya, Hapus Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</x-app-layout>