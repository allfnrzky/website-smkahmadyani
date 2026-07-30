@extends('layouts.frontend')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-purple-100">
        <div class="text-center">
            <div class="mx-auto w-20 h-20 flex items-center justify-center mb-4">
                <img src="{{ asset('images/logo-smk.jpg') }}" alt="Logo SMK Ahmad Yani" class="w-full h-full object-contain rounded-2xl">
            </div>
            <h2 class="text-3xl font-extrabold text-gray-900">
                Admin <span class="text-[#8B5CF6]">Panel</span>
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Masuk untuk mengelola PPDB & LMS
            </p>
        </div>

        @if(session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg text-sm font-bold">
                {{ session('status') }}
            </div>
        @endif

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

        <form class="mt-8 space-y-6" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="appearance-none rounded-lg relative block w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#8B5CF6] focus:border-[#8B5CF6] sm:text-sm"
                        placeholder="admin@smk-ahmad-yani.sch.id">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="appearance-none rounded-lg relative block w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-[#8B5CF6] focus:border-[#8B5CF6] sm:text-sm"
                            placeholder="********">
                        <button type="button" onclick="togglePass()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                            <i id="eye" class="fa-solid fa-eye text-xs"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent text-sm font-black rounded-xl text-white bg-[#8B5CF6] hover:bg-[#7C3AED] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8B5CF6] transition shadow-lg active:scale-95">
                <i class="fa-solid fa-lock mr-2"></i> MASUK
            </button>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-[#8B5CF6] transition">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke PPDB
                </a>
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
