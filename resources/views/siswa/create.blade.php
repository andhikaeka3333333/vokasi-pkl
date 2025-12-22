<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($siswa) ? 'Edit Siswa' : 'Tambah Siswa' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ isset($siswa) ? route('siswa.update', $siswa->id) : route('siswa.store') }}" method="POST">
                    @csrf
                    @if(isset($siswa)) @method('PUT') @endif

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">NIS</label>
                        <input type="number" name="nis" value="{{ $siswa->nis ?? old('nis') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $siswa->nama ?? old('nama') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" value="{{ $siswa->nama_sekolah ?? old('nama_sekolah') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border-gray-300 rounded-lg shadow-sm">
                                <option value="Laki-Laki" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ (isset($siswa) && $siswa->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kelas</label>
                            <input type="text" name="kelas" value="{{ $siswa->kelas ?? old('kelas') }}" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Contoh: XII" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Jurusan</label>
                        <input type="text" name="jurusan" value="{{ $siswa->jurusan ?? old('jurusan') }}" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Contoh: RPL" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('siswa.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Batal</a>
                        <button type="submit" class="bg-[#C52222] text-white px-4 py-2 rounded-lg transition">
                            {{ isset($siswa) ? 'Simpan Perubahan' : 'Simpan Data' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>