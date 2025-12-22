<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Sekolah
            </h2>
            <button onclick="openCreateModal()"
                    class="inline-flex items-center gap-2 bg-[#E31E24] hover:bg-red-700 text-white font-medium py-2.5 px-5 rounded-lg transition duration-200 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Sekolah
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-lg flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <div class="p-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Sekolah</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Dibuat</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($sekolahs as $index => $sekolah)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-1 text-sm text-gray-700">
                                            {{ $sekolahs->firstItem() + $index }}
                                        </td>
                                        <td class="px-6 py-1 text-sm font-medium text-gray-900">
                                            {{ $sekolah->name }}
                                        </td>
                                        <td class="px-6 py-1 text-sm text-gray-600">
                                            {{ $sekolah->email }}
                                        </td>
                                        <td class="px-6 py-1 text-sm text-gray-600">
                                            {{ $sekolah->created_at->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-1 text-center">
                                            <div class="flex items-center justify-center gap-3">
                                                <button onclick="showDetail({{ $sekolah->id }})"
                                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200"
                                                        title="Detail">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </button>

                                                <button onclick="openEditModal({{ $sekolah->id }})"
                                                        class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg transition duration-200"
                                                        title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>

                                                <form action="{{ route('sekolah.destroy', $sekolah) }}"
                                                      method="POST"
                                                      class="inline"
                                                      onsubmit="return confirm('Yakin ingin menghapus data sekolah ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition duration-200"
                                                            title="Hapus">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                            <svg class="mx-auto w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2m-8 8h.01"></path>
                                            </svg>
                                            Belum ada data sekolah
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- --- CUSTOM PAGINATION --- --}}
                    @if ($sekolahs->hasPages())
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-gray-100 pt-6">
                        {{-- Info Data --}}
                        <p class="text-sm text-gray-600">
                            Menampilkan <span class="font-bold">{{ $sekolahs->firstItem() }}</span>
                            sampai <span class="font-bold">{{ $sekolahs->lastItem() }}</span>
                            dari <span class="font-bold">{{ $sekolahs->total() }}</span> data
                        </p>

                        {{-- Tombol Navigasi --}}
                        <nav class="flex items-center gap-1">
                            {{-- Previous --}}
                            @if ($sekolahs->onFirstPage())
                                <span class="px-3 py-2 bg-gray-50 text-gray-300 rounded-lg cursor-not-allowed border border-gray-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                </span>
                            @else
                                <a href="{{ $sekolahs->previousPageUrl() }}" class="px-3 py-2 bg-white text-gray-600 hover:bg-red-50 hover:text-[#E31E24] border border-gray-200 rounded-lg transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                </a>
                            @endif

                            {{-- Page Numbers (Range limited to 2 pages around current) --}}
                            @foreach ($sekolahs->getUrlRange(max(1, $sekolahs->currentPage() - 2), min($sekolahs->lastPage(), $sekolahs->currentPage() + 2)) as $page => $url)
                                @if ($page == $sekolahs->currentPage())
                                    <span class="px-4 py-2 bg-[#E31E24] text-white font-bold rounded-lg border border-[#E31E24]">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="px-4 py-2 bg-white text-gray-600 hover:border-[#E31E24] hover:text-[#E31E24] border border-gray-200 rounded-lg transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Next --}}
                            @if ($sekolahs->hasMorePages())
                                <a href="{{ $sekolahs->nextPageUrl() }}" class="px-3 py-2 bg-white text-gray-600 hover:bg-red-50 hover:text-[#E31E24] border border-gray-200 rounded-lg transition">
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
            </div>
        </div>
    </div>

    {{-- Modal Create --}}
    <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Tambah Sekolah Baru</h3>
                <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('sekolah.store') }}" class="p-6">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="create_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
                        <input type="text" name="name" id="create_name" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="create_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="create_email" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="create_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" id="create_password" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="create_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="create_password_confirmation" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="closeCreateModal()"
                            class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2.5 bg-[#E31E24] text-white rounded-lg hover:bg-red-700 transition shadow-md">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Edit Data Sekolah</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="editForm" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="space-y-5">
                    <div>
                        <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Sekolah</label>
                        <input type="text" name="name" id="edit_name" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                    </div>

                    <div>
                        <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="edit_email" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                    </div>

                    <div>
                        <label for="edit_password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-gray-500">(kosongkan jika tidak ingin ubah)</span></label>
                        <input type="password" name="password" id="edit_password"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                    </div>

                    <div>
                        <label for="edit_password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="edit_password_confirmation"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#E31E24] focus:border-transparent">
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="closeEditModal()"
                            class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        Batal
                    </button>
                    <button type="submit"
                            class="px-5 py-2.5 bg-[#E31E24] text-white rounded-lg hover:bg-red-700 transition shadow-md">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div id="showModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Detail Sekolah</h3>
                <button onclick="closeShowModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 space-y-5">
                <div>
                    <p class="text-sm font-medium text-gray-600">Nama Sekolah</p>
                    <p id="show_name" class="text-lg font-semibold text-gray-900 mt-1"></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Email</p>
                    <p id="show_email" class="text-gray-900 mt-1"></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Tanggal Dibuat</p>
                    <p id="show_created" class="text-gray-900 mt-1"></p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Terakhir Diupdate</p>
                    <p id="show_updated" class="text-gray-900 mt-1"></p>
                </div>
            </div>

            <div class="p-6 border-t">
                <div class="flex justify-end">
                    <button onclick="closeShowModal()"
                            class="px-5 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openEditModal(id) {
            fetch(`/sekolah/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('editForm').action = `/sekolah/${id}`;
                    document.getElementById('editModal').classList.remove('hidden');
                });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('edit_password').value = '';
            document.getElementById('edit_password_confirmation').value = '';
        }

        function showDetail(id) {
            fetch(`/sekolah/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('show_name').textContent = data.name;
                    document.getElementById('show_email').textContent = data.email;
                    document.getElementById('show_created').textContent = new Date(data.created_at).toLocaleDateString('id-ID', {
                        day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'
                    });
                    document.getElementById('show_updated').textContent = new Date(data.updated_at).toLocaleDateString('id-ID', {
                        day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'
                    });
                    document.getElementById('showModal').classList.remove('hidden');
                });
        }

        function closeShowModal() {
            document.getElementById('showModal').classList.add('hidden');
        }

        @if($errors->any() && request()->isMethod('post'))
            openCreateModal();
        @endif
    </script>
</x-app-layout>