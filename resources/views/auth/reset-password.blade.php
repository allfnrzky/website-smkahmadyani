@extends('layouts.frontend')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-purple-100">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Reset <span class="text-[#8B5CF6]">Password</span>
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Buat password baru untuk akun Anda
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg text-xs">
                <p class="font-bold">Terjadi kesalahan:</p>
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-6">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required readonly
                    class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] focus:border-[#8B5CF6] transition-all py-3 px-5 text-sm cursor-not-allowed">
                @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                <div class="relative">
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] focus:border-[#8B5CF6] transition-all py-3 px-5 pr-12"
                        placeholder="Min. 8 Karakter">
                    <button type="button" onclick="togglePass()"
                        class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#8B5CF6] transition-colors">
                        <i id="eye" class="fa-solid fa-eye text-sm"></i>
                    </button>
                </div>
                @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <div class="relative">
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full rounded-xl border-gray-200 bg-gray-50 focus:bg-white focus:ring-[#8B5CF6] focus:border-[#8B5CF6] transition-all py-3 px-5 pr-12"
                        placeholder="Ulangi password">
                    <button type="button" onclick="togglePass2()"
                        class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#8B5CF6] transition-colors">
                        <i id="eye2" class="fa-solid fa-eye text-sm"></i>
                    </button>
                </div>
                @error('password_confirmation') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full py-4 bg-[#8B5CF6] text-white rounded-2xl font-black shadow-lg shadow-purple-200 hover:bg-[#7C3AED] transition-all transform active:scale-95 uppercase tracking-widest text-sm">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePass() {
        const p = document.getElementById('password');
        const e = document.getElementById('eye');
        if(p.type === "password") {
            p.type = "text";
            e.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            p.type = "password";
            e.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
    function togglePass2() {
        const p = document.getElementById('password_confirmation');
        const e = document.getElementById('eye2');
        if(p.type === "password") {
            p.type = "text";
            e.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            p.type = "password";
            e.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection
