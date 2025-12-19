<nav class="w-64 bg-[#E31E24] min-h-screen flex flex-col justify-between sticky top-0 text-white h-screen">
    <div>
        <div class="p-6">
            <h2 class="text-2xl font-bold tracking-wider">Dashboard</h2>
        </div>

        <div class="mt-4 flex flex-col gap-2">
            @if(auth()->user()->role === 'admin')
                <!-- Data Sekolah (Admin Only) -->
                <a href="{{ route('sekolah.index') }}"
                   class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('sekolah.*') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="{{ request()->routeIs('sekolah.*') ? 'font-bold' : '' }}">Data Sekolah</span>
                </a>

                <!-- Data Siswa (Admin) -->
                <a href=""
                   class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('admin.siswa.*') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"></path>
                    </svg>
                    <span class="{{ request()->routeIs('admin.siswa.*') ? 'font-bold' : '' }}">Data Siswa</span>
                </a>

                <!-- Pengumuman (Admin) -->
                <a href=""
                   class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('admin.pengumuman.*') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="{{ request()->routeIs('admin.pengumuman.*') ? 'font-bold' : '' }}">Pengumuman</span>
                </a>

            @else
                <!-- Data Siswa (User) -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('dashboard') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4m0 5c0 2.21-3.58 4-8 4s-8-1.79-8-4"></path>
                    </svg>
                    <span class="{{ request()->routeIs('dashboard') ? 'font-bold' : '' }}">Data Siswa</span>
                </a>

                <!-- Pengumuman (User) -->
                <a href=""
                   class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('pengumuman.*') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <span class="{{ request()->routeIs('pengumuman.*') ? 'font-bold' : '' }}">Pengumuman</span>
                </a>
            @endif

            <!-- Profile (All Users) -->
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-4 py-3 px-6 transition-all {{ request()->routeIs('profile.*') ? 'bg-white text-[#E31E24] rounded-r-full mr-4 shadow-md font-bold' : 'hover:bg-red-700 text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="{{ request()->routeIs('profile.*') ? 'font-bold' : '' }}">Profile</span>
            </a>
        </div>
    </div>

    <div class="p-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full bg-white text-[#E31E24] font-bold py-2 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                Logout
            </button>
        </form>
    </div>
</nav>
