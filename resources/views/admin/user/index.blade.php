<x-app-layout title="Kelola User">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Kelola User LMS</h2>
    </x-slot>

    <div class="py-8 md:py-12 px-4" x-data="{ 
        openManual: false,
        openEdit: false,
        openDelete: null,
        openBatchDelete: false,
        editUser: {},
        selected: [],
        checkAll: false,
        formRole: 'siswa',
        editFormRole: 'siswa',
        toggleCheck(id) {
            if (this.selected.includes(id)) {
                this.selected = this.selected.filter(i => i !== id);
            } else {
                this.selected.push(id);
            }
        },
        toggleAll() {
            if (this.checkAll) {
                this.selected = [];
                this.checkAll = false;
            } else {
                this.selected = @json($users->pluck('id')->toArray());
                this.checkAll = true;
            }
        },
        edit(user) {
            this.editUser = user;
            this.editFormRole = user.role;
            this.openEdit = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Dashboard Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 mb-10">
                <button @click="openManual = true" class="flex-1 bg-purple-600 hover:bg-purple-800 text-white p-6 rounded-[2rem] shadow-lg shadow-purple-100 transition-all flex items-center justify-between group">
                    <div class="text-left">
                        <p class="text-[10px] font-black uppercase tracking-widest opacity-60 mb-1">Input Manual</p>
                        <h4 class="text-lg font-black">+ TAMBAH USER BARU</h4>
                    </div>
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-plus"></i>
                    </div>
                </button>

                <div class="flex-[2] bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100 flex flex-col md:flex-row items-center gap-6">
                    <div class="text-center md:text-left">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Batch Upload</p>
                        <h4 class="text-sm font-black text-gray-800 uppercase">IMPORT VIA EXCEL</h4>
                    </div>
                    <form action="{{ route('admin.user.import') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex gap-2">
                        @csrf
                        <input type="file" name="file" class="text-[10px] flex-1 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl p-2" required>
                        <button type="submit" class="bg-gray-900 text-white px-6 py-3 rounded-xl font-black text-[10px] uppercase hover:bg-purple-600 transition-all">UPLOAD</button>
                    </form>
                </div>
            </div>

            <!-- Batch Delete Bar -->
            <div x-show="selected.length > 0" x-transition class="mb-6 flex items-center gap-4 bg-red-50 border border-red-200 rounded-2xl px-6 py-4">
                <span class="text-sm font-bold text-red-700" x-text="selected.length + ' user dipilih'"></span>
                <button @click="openBatchDelete = true" class="ml-auto bg-red-600 text-white px-5 py-2.5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-red-800 transition-all">
                    <i class="fas fa-trash-can mr-2"></i> Hapus Semua
                </button>
                <button @click="selected = []; checkAll = false" class="text-red-400 hover:text-red-600 text-xs font-bold">Batal</button>
            </div>

            <!-- Modal Tambah User -->
            <div x-show="openManual" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-cloak>
                
                <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm" @click="openManual = false"></div>
                
                <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-lg z-[1000] border border-purple-100 relative shadow-purple-900/20 max-h-[90vh] overflow-y-auto">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="p-10">
                            <div class="flex justify-between items-center mb-8">
                                <h3 class="text-2xl font-black text-gray-900 tracking-tighter uppercase">Akun Baru</h3>
                                <button type="button" @click="openManual = false" class="text-gray-300 hover:text-red-500 transition-colors"><i class="fas fa-times-circle text-2xl"></i></button>
                            </div>
                            
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Nama Lengkap</label>
                                    <input type="text" name="name" required class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="Contoh: Alfian Rizky">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Alamat Email Aktif</label>
                                    <input type="email" name="email" required class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="user@smk-ahyan.sch.id">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Password</label>
                                        <input type="password" name="password" required class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="******">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Hak Akses</label>
                                        <select name="role" required x-model="formRole" class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-[10px] font-black uppercase tracking-widest">
                                            <option value="siswa">SISWA</option>
                                            <option value="guru">GURU</option>
                                        </select>
                                    </div>
                                </div>
                                <div x-show="formRole === 'guru'" x-transition>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">NIP</label>
                                    <input type="text" name="nip" class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="Nomor Induk Pegawai">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-10 py-8 flex justify-center">
                            <button type="submit" class="w-full bg-purple-600 text-white py-5 rounded-[1.5rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-purple-800 shadow-xl shadow-purple-100 transition-all">
                                SIMPAN & AKTIFKAN AKUN
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit User -->
            <div x-show="openEdit" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-cloak>
                
                <div class="fixed inset-0 bg-purple-950/60 backdrop-blur-sm" @click="openEdit = false"></div>
                
                <div class="bg-white rounded-[3rem] shadow-2xl w-full max-w-lg z-[1000] border border-purple-100 relative shadow-purple-900/20 max-h-[90vh] overflow-y-auto">
                    <form method="POST" x-bind:action="'{{ url('admin/user') }}/' + editUser.id">
                        @csrf
                        @method('PUT')
                        <div class="p-10">
                            <div class="flex justify-between items-center mb-8">
                                <h3 class="text-2xl font-black text-gray-900 tracking-tighter uppercase">Edit User</h3>
                                <button type="button" @click="openEdit = false" class="text-gray-300 hover:text-red-500 transition-colors"><i class="fas fa-times-circle text-2xl"></i></button>
                            </div>
                            
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Nama Lengkap</label>
                                    <input type="text" name="name" x-model="editUser.name" required class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Alamat Email</label>
                                    <input type="email" name="email" x-model="editUser.email" required class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Password <span class="text-gray-300 normal-case tracking-normal">(opsional)</span></label>
                                        <input type="password" name="password" class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="Kosongkan jika tidak diubah">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">Hak Akses</label>
                                        <select name="role" required x-model="editFormRole" class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-[10px] font-black uppercase tracking-widest">
                                            <option value="siswa" x-bind:selected="editUser.role === 'siswa'">SISWA</option>
                                            <option value="guru" x-bind:selected="editUser.role === 'guru'">GURU</option>
                                        </select>
                                    </div>
                                </div>
                                <div x-show="editFormRole === 'guru'" x-transition>
                                    <label class="block text-[10px] font-black text-purple-600 mb-2 uppercase tracking-widest ml-1">NIP</label>
                                    <input type="text" name="nip" x-model="editUser.nip" class="w-full border-gray-100 bg-gray-50 rounded-2xl focus:ring-4 focus:ring-purple-100 focus:border-purple-600 py-4 px-6 text-sm font-bold" placeholder="Nomor Induk Pegawai">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-10 py-8 flex justify-center">
                            <button type="submit" class="w-full bg-purple-600 text-white py-5 rounded-[1.5rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-purple-800 shadow-xl shadow-purple-100 transition-all">
                                SIMPAN PERUBAHAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Hapus User (Individual) -->
            <div x-show="openDelete !== null" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition
                 x-cloak>
                
                <div class="fixed inset-0 bg-red-950/40 backdrop-blur-sm" @click="openDelete = null"></div>
                
                <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[1000] shadow-2xl border border-red-100 text-center">
                    <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter">Hapus User?</h3>
                    <p class="text-sm text-gray-400 font-medium mb-10 px-4">
                        User <span class="text-red-600 font-bold" x-text="editUser.name"></span> akan dihapus permanen.
                    </p>
                    
                    <form method="POST" x-bind:action="'{{ url('admin/user') }}/' + openDelete" class="flex gap-4 justify-center">
                        @csrf @method('DELETE')
                        <button type="button" @click="openDelete = null" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                        <button type="submit" class="bg-red-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-red-100 hover:bg-red-800 transition-all active:scale-95">Ya, Hapus!</button>
                    </form>
                </div>
            </div>

            <!-- Modal Hapus Batch -->
            <div x-show="openBatchDelete" 
                 class="fixed inset-0 z-[999] flex items-center justify-center px-4" 
                 x-transition
                 x-cloak>
                
                <div class="fixed inset-0 bg-red-950/40 backdrop-blur-sm" @click="openBatchDelete = false"></div>
                
                <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full relative z-[1000] shadow-2xl border border-red-100 text-center">
                    <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-2 uppercase italic tracking-tighter">Hapus User Terpilih?</h3>
                    <p class="text-sm text-gray-400 font-medium mb-10 px-4">
                        <span class="text-red-600 font-bold" x-text="selected.length"></span> user akan dihapus permanen.
                    </p>
                    
                    <form action="{{ route('admin.user.destroy.batch') }}" method="POST" class="flex gap-4 justify-center">
                        @csrf @method('DELETE')
                        <template x-for="id in selected" hidden>
                            <input type="hidden" name="ids[]" x-bind:value="id">
                        </template>
                        <button type="button" @click="openBatchDelete = false" class="px-8 py-4 rounded-2xl text-xs font-black text-gray-400 uppercase tracking-widest hover:bg-gray-50 transition-all italic">Batal</button>
                        <button type="submit" class="bg-red-600 text-white px-8 py-4 rounded-2xl text-xs font-black uppercase tracking-widest shadow-xl shadow-red-100 hover:bg-red-800 transition-all active:scale-95">Ya, Hapus Semua!</button>
                    </form>
                </div>
            </div>

            <!-- Tabel Daftar User -->
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-5 text-left">
                                    <input type="checkbox" x-model="checkAll" @change="toggleAll()" class="w-4 h-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                                </th>
                                <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Nama Pengguna</th>
                                <th class="px-8 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Kontak Email</th>
                                <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Role</th>
                                <th class="px-8 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($users as $user)
                            <tr class="hover:bg-purple-50/30 transition-colors" x-bind:class="selected.includes({{ $user->id }}) ? 'bg-purple-50' : ''">
                                <td class="px-6 py-6">
                                    <input type="checkbox" 
                                           x-bind:checked="selected.includes({{ $user->id }})"
                                           @change="toggleCheck({{ $user->id }})" 
                                           class="w-4 h-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-xs font-black text-purple-600 shadow-inner">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <span class="text-sm font-black text-gray-800 uppercase tracking-tight">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-xs font-bold text-gray-400">{{ $user->email }}</td>
                                <td class="px-8 py-6 text-center">
                                    <span class="px-4 py-1.5 inline-flex text-[9px] font-black rounded-full uppercase tracking-[0.15em]
                                        {{ $user->role == 'admin' ? 'bg-red-100 text-red-600' : ($user->role == 'guru' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600') }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button @click="edit({{ $user->toJson() }})" class="bg-amber-50 text-amber-400 hover:bg-amber-500 hover:text-white w-9 h-9 rounded-xl transition-all">
                                            <i class="fas fa-pen text-xs"></i>
                                        </button>
                                        <button @click="openDelete = {{ $user->id }}; editUser = {{ $user->toJson() }}" class="bg-red-50 text-red-300 hover:bg-red-600 hover:text-white w-9 h-9 rounded-xl transition-all">
                                            <i class="fas fa-trash-can text-xs"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-8 py-6 bg-gray-50 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    [x-cloak] { display: none !important; }
</style>
