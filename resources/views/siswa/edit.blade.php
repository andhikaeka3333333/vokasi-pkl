<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                <div class="p-8 bg-white border-b border-gray-200">

                    <div class="mb-8 pb-4 border-b border-gray-100 flex justify-between items-center">
                        <h1 class="text-2xl font-bold text-gray-900">
                            Edit Data Siswa: <span class="text-[#C52222]">{{ $siswa->nama }}</span>
                        </h1>
                        <span class="text-sm text-gray-500">ID: {{ $siswa->id }}</span>
                    </div>

                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT') {{-- Penting untuk update data --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="nis" class="block text-sm font-bold text-gray-700 mb-2">
                                    NIS (Nomor Induk Siswa) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="nis" id="nis"
                                       value="{{ old('nis', $siswa->nis) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition placeholder-gray-400"
                                       placeholder="Contoh: 2025001" required>
                                @error('nis') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="nama" class="block text-sm font-bold text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama" id="nama"
                                       value="{{ old('nama', $siswa->nama) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition placeholder-gray-400"
                                       placeholder="Masukkan nama lengkap siswa" required>
                                @error('nama') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                             <div>
                                <label for="nama_sekolah" class="block text-sm font-bold text-gray-700 mb-2">
                                    Asal Sekolah <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama_sekolah" id="nama_sekolah"
                                       value="{{ old('nama_sekolah', $siswa->nama_sekolah) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition placeholder-gray-400"
                                       required>
                                @error('nama_sekolah') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-bold text-gray-700 mb-2">
                                    Jenis Kelamin <span class="text-red-500">*</span>
                                </label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    {{-- Logika untuk memilih opsi yang tersimpan di database --}}
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div>
                                <label for="kelas" class="block text-sm font-bold text-gray-700 mb-2">
                                    Kelas <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="kelas" id="kelas"
                                       value="{{ old('kelas', $siswa->kelas) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition placeholder-gray-400"
                                       placeholder="Contoh: XII" required>
                                @error('kelas') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="jurusan" class="block text-sm font-bold text-gray-700 mb-2">
                                    Jurusan <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="jurusan" id="jurusan"
                                       value="{{ old('jurusan', $siswa->jurusan) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-[#C52222] focus:ring-[#C52222] transition placeholder-gray-400"
                                       placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                                @error('jurusan') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-4 mt-8 border-t border-gray-100 pt-6">
                            <a href="{{ route('siswa.index') }}"
                               class="bg-white border-2 border-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-xl hover:bg-gray-50 transition shadow-sm">
                                Batal
                            </a>
                            <button type="submit"
                                    class="bg-[#C52222] hover:bg-red-800 text-white font-semibold py-3 px-8 rounded-xl transition shadow-md flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>