@extends('layouts.frontend')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-purple-50 py-12 px-4">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Lupa Password?</h2>
            <p class="mt-2 text-sm text-gray-600">
                Masukkan email Anda dan kami akan mengirimkan link reset password ke email Anda.
            </p>
        </div>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg text-xs font-bold text-center">
                Link reset password sudah dikirim ke email Anda!
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="mt-6 space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat Email</label>
                <input name="email" type="email" required class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-[#8B5CF6] text-sm" placeholder="email@anda.com">
                @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>
            
            <button type="submit" class="w-full py-3 bg-[#8B5CF6] text-white rounded-xl font-bold hover:bg-[#6D28D9] transition">
                KIRIM LINK RESET
            </button>
        </form>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:underline">&larr; Kembali ke Login</a>
        </div>
    </div>
</div>
@endsection