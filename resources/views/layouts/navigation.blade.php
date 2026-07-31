<style>
    .sidebar-nav { position: fixed; top: 0; left: 0; }
    @media (min-width: 1024px) {
        .sidebar-nav { position: sticky; top: 0; left: 0; }
    }
</style>
<div x-data="{ sidebarOpen: false }" class="lg:w-72 lg:flex-shrink-0">
    <!-- Mobile Top Bar -->
    <div class="lg:hidden flex items-center justify-between bg-[#8B5CF6] p-4 shadow-md sticky top-0 z-40">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo-smk.jpg') }}" class="w-8 h-8 rounded-lg bg-white p-1">
            <span class="text-white font-black text-sm tracking-tighter">SMK AHMAD YANI</span>
        </div>
        <button @click="sidebarOpen = true" class="text-white text-xl p-2">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Overlay -->
    <div x-show="sidebarOpen" x-cloak class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
         class="sidebar-nav w-72 min-h-screen bg-[#8B5CF6] shadow-2xl flex flex-col z-50 transition-transform duration-300 ease-in-out border-r border-white/10 overflow-y-auto sidebar-scroll">
        
        <!-- Header Sidebar -->
        <div class="p-6 flex items-center justify-between border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg">
                    <img src="{{ asset('images/logo-smk.jpg') }}" class="w-7 h-7 object-contain">
                </div>
                <div class="overflow-hidden">
                    <h1 class="text-white font-black text-sm leading-tight uppercase tracking-tighter">SMK AHYAN</h1>
                    <p class="text-[9px] text-purple-200 font-bold uppercase tracking-widest">Jabung - Malang</p>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="lg:hidden text-purple-200">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        @auth
        <!-- Links Area -->
        <div class="flex-grow px-4 py-6 space-y-2">
            @php
                $pendingCount = 0;
                if(auth()->user()->role == 'siswa') {
                    $kelasIds = \DB::table('siswa_kelas')->where('siswa_id', auth()->id())->pluck('kelas_id');
                    $pendingCount = \App\Models\Tugas::whereIn('pertemuan_id', function($query) use ($kelasIds) {
                        $query->select('id')->from('pertemuans')->whereIn('mata_pelajaran_id', function($q) use ($kelasIds) {
                            $q->select('id')->from('mata_pelajaran')->whereIn('kelas_id', $kelasIds);
                        });
                    })
                    ->whereDoesntHave('pengumpulans', function($query) {
                        $query->where('siswa_id', auth()->id());
                    })->count();
                }
            @endphp

            <p class="text-[10px] font-black text-purple-300 uppercase tracking-[0.2em] mb-4 ml-2 italic">Menu Utama</p>

            @if(auth()->user()->role != 'calon_siswa')
            <x-sidebar-link 
                :href="route('dashboard')" 
                :active="request()->routeIs('dashboard*') || request()->routeIs('admin.dashboard*') || request()->is('siswa/dashboard*')" 
                icon="fas fa-th-large">
                Dashboard 
            </x-sidebar-link>
            @endif

            @if(auth()->user()->role == 'calon_siswa')
                <x-sidebar-link 
                    :href="route('calon-siswa.dashboard')" 
                    :active="request()->routeIs('calon-siswa.dashboard*')" 
                    icon="fas fa-th-large">
                    Dashboard
                </x-sidebar-link>

                <x-sidebar-link 
                    :href="route('siswa.pendaftaran')" 
                    :active="request()->routeIs('siswa.pendaftaran*')" 
                    icon="fas fa-file-signature">
                    Pendaftaran
                </x-sidebar-link>

                <x-sidebar-link 
                    :href="route('siswa.pengumuman')" 
                    :active="request()->routeIs('siswa.pengumuman*')" 
                    icon="fas fa-bullhorn">
                    Pengumuman
                </x-sidebar-link>
            @endif

            @if(auth()->user()->role == 'siswa')
                <x-sidebar-link 
                    :href="route('siswa.tugas.index')" 
                    :active="request()->routeIs('siswa.tugas.index*') || request()->is('siswa/daftar-tugas*')" 
                    icon="fas fa-clipboard-list">
                    Daftar Tugas
                    @if($pendingCount > 0)
                        <span class="bg-red-500 text-white text-[9px] font-black px-2 py-0.5 rounded-full shadow-sm ml-auto">
                            {{ $pendingCount }}
                        </span>
                    @endif
                </x-sidebar-link>
            @endif

            @if(auth()->user()->role == 'admin')
                <p class="text-[10px] font-black text-purple-300 uppercase tracking-[0.2em] mb-2 mt-6 ml-1 italic">PPDB</p>
                <x-sidebar-link 
                    :href="route('admin.ppdb')" 
                    :active="request()->is('admin/ppdb*')" 
                    icon="fas fa-users">
                    Kelola Pendaftaran
                </x-sidebar-link>
                <x-sidebar-link 
                    :href="route('admin.pengumuman.index')" 
                    :active="request()->is('admin/pengumuman*')" 
                    icon="fas fa-bullhorn">
                    Kelola Pengumuman
                </x-sidebar-link>
                <x-sidebar-link 
                    :href="route('admin.berita.index')" 
                    :active="request()->is('admin/berita*')" 
                    icon="fas fa-newspaper">
                    Kelola Berita
                </x-sidebar-link>

                <p class="text-[10px] font-black text-purple-300 uppercase tracking-[0.2em] mb-2 mt-6 ml-2 italic">LMS</p>
                <x-sidebar-link 
                    :href="route('admin.user')" 
                    :active="request()->is('admin/user*')" 
                    icon="fas fa-users-cog">
                    Kelola User LMS
                </x-sidebar-link>
                <x-sidebar-link 
                    :href="route('admin.kelas.index')" 
                    :active="request()->is('admin/kelas*')" 
                    icon="fas fa-school">
                    Kelola Kelas
                </x-sidebar-link>
            @endif

            <x-sidebar-link 
                :href="route('profile.edit')" 
                :active="request()->routeIs('profile.edit*')" 
                icon="fas fa-user-cog">
                Profile
            </x-sidebar-link>
        </div>

        <!-- Logout & User Profile Bottom -->
        <div class="p-4 space-y-3 bg-black/20 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500 hover:text-white transition-all duration-300 group">
                    <i class="fas fa-power-off text-sm"></i>
                    <span class="text-xs font-black uppercase tracking-[0.1em]">Logout</span>
                </button>
            </form>

            <div class="flex items-center gap-3 px-2 py-3 rounded-xl bg-white/5 border border-white/10">
                <div class="w-8 h-8 rounded-lg bg-[#7C3AED] flex items-center justify-center text-xs font-bold text-white uppercase flex-shrink-0 shadow-lg">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-[11px] font-bold text-white truncate">{{ auth()->user()->name }}</p>
                    @if(auth()->user()->role == 'guru' && auth()->user()->nip)
                        <p class="text-[9px] text-purple-200 font-bold tracking-tighter truncate">NIP: {{ auth()->user()->nip }}</p>
                    @endif
                    <p class="text-[9px] text-purple-300 uppercase font-black tracking-tighter italic">Mode {{ auth()->user()->role }}</p>
                </div>
            </div>
        </div>
        @endauth
    </nav>
</div>
