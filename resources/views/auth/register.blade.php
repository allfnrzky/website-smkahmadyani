@extends('layouts.frontend')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-purple-50 py-8 px-4 sm:px-6">
    <div class="max-w-md w-full bg-white p-6 sm:p-10 rounded-3xl shadow-xl border border-purple-100">
        <div class="text-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 uppercase leading-tight">
                Daftar Akun <span class="text-[#8B5CF6]">PPDB</span>
            </h2>
            <p class="text-gray-400 text-xs sm:text-sm mt-2 font-medium">Lengkapi data untuk memulai pendaftaran</p>
        </div>

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Nama Lengkap</label>
                    <input name="name" type="text" value="{{ old('name') }}" required 
                        class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] focus:border-[#8B5CF6] transition-all py-3 px-5"
                        placeholder="Nama sesuai ijazah">
                    @error('name') <p class="text-red-600 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Alamat Email</label>
                    <input name="email" type="email" value="{{ old('email') }}" required 
                        class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] py-3 px-5"
                        placeholder="email@sekolah.com">
                    @error('email') <p class="text-red-600 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required 
                                class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] pr-12 py-3 px-5"
                                placeholder="Min. 8 Karakter">
                            <button type="button" onclick="togglePassword()" 
                                class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#8B5CF6] transition-colors">
                                <i id="eyeIcon" class="fa-solid fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password') <p class="text-red-600 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1 ml-1">Konfirmasi Password</label>
                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" required 
                                class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] pr-12 py-3 px-5"
                                placeholder="Ulangi password">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-[#8B5CF6] text-white rounded-2xl font-black shadow-lg shadow-purple-200 hover:bg-[#7C3AED] transition-all transform active:scale-95 uppercase tracking-widest text-sm">
                    Daftar Sekarang
                </button>
                <p class="text-center text-xs text-gray-400 mt-6">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-[#8B5CF6] font-bold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword() {
        const pw = document.getElementById('password');
        const pw2 = document.getElementById('password_confirmation');
        const icon = document.getElementById('eyeIcon');
        const type = pw.type === 'password' ? 'text' : 'password';
        pw.type = type;
        pw2.type = type;
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }
</script>
@endsection
