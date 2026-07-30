@extends('layouts.frontend')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-purple-100">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Login <span class="text-[#8B5CF6]">PPDB</span>
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Masuk untuk cek status pendaftaran Anda
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg text-xs">
                <p class="font-bold">Gagal Masuk:</p>
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                        class="appearance-none rounded-lg relative block w-full px-3 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#8B5CF6] focus:border-[#8B5CF6] sm:text-sm" 
                        placeholder="Masukkan email anda">
                    @error('email')
                        <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required 
                            class="appearance-none rounded-lg relative block w-full px-3 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#8B5CF6] focus:border-[#8B5CF6] sm:text-sm" 
                            placeholder="********">
                        <button type="button" onclick="togglePass()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i id="eye" class="fa-solid fa-eye text-xs"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-[#8B5CF6] focus:ring-[#8B5CF6] border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900 font-medium">Ingat saya</label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-semibold text-[#8B5CF6] hover:text-[#6D28D9]">
                        Lupa Password?
                    </a>
                </div>
            </div>
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-black rounded-xl text-white bg-[#8B5CF6] hover:bg-[#6D28D9] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8B5CF6] transition shadow-lg active:scale-95">
                MASUK SEKARANG
            </button>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-[#8B5CF6] hover:text-[#6D28D9] hover:underline transition">
                        Daftar Akun Di Sini
                    </a>
                </p>
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
</script>
@endsection
