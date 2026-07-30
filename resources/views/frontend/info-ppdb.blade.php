@extends('layouts.frontend')

@section('content')
<!-- Hero Section -->
<div class="bg-[#8B5CF6] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-5xl font-black mb-4">Informasi PPDB 2026</h1>
        <p class="text-purple-100 max-w-2xl mx-auto italic">"Bergabunglah bersama SMK Ahmad Yani Jabung dan jadilah bagian dari generasi unggul di era digital."</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-16">
    <div class="flex flex-col gap-16">
        
        <!-- SECTION BROSUR (Dibuat Lebih Besar & Full Width) -->
        <section>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-black text-gray-900 flex items-center gap-3">
                    <i class="fa-solid fa-images text-[#8B5CF6]"></i>
                    Brosur Digital
                </h2>
                <span class="text-sm text-gray-400 font-medium">Klik gambar untuk memperbesar</span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Brosur 1 -->
                <div class="group relative overflow-hidden rounded-[40px] shadow-2xl border-4 border-white bg-white">
                    <img src="{{ asset('images/brosur.png') }}" alt="Brosur PPDB SMK Ahmad Yani 1" class="w-full h-auto transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end justify-center pb-10">
                         <a href="{{ asset('images/brosur.png') }}" target="_blank" class="bg-white text-[#8B5CF6] px-8 py-3 rounded-full font-black text-sm shadow-2xl transform translate-y-4 group-hover:translate-y-0 transition-transform">
                            LIHAT GAMBAR PENUH
                        </a>
                    </div>
                </div>
                <!-- Brosur 2 -->
                <div class="group relative overflow-hidden rounded-[40px] shadow-2xl border-4 border-white bg-white">
                    <img src="{{ asset('images/brosur1.png') }}" alt="Brosur PPDB SMK Ahmad Yani 2" class="w-full h-auto transition duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end justify-center pb-10">
                         <a href="{{ asset('images/brosur1.png') }}" target="_blank" class="bg-white text-[#8B5CF6] px-8 py-3 rounded-full font-black text-sm shadow-2xl transform translate-y-4 group-hover:translate-y-0 transition-transform">
                            LIHAT GAMBAR PENUH
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION ALUR PENDAFTARAN (Struktural sesuai Web kita) -->
        <section class="bg-gray-50 rounded-[50px] p-8 md:p-12 border border-gray-100">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-black text-gray-900 mb-4">Alur Pendaftaran Online</h2>
                <p class="text-gray-500">Ikuti langkah-langkah berikut untuk mendaftar secara mandiri melalui website kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 relative">
                <!-- Step 1 -->
                <div class="relative bg-white p-6 rounded-3xl shadow-sm border border-purple-50 text-center">
                    <div class="w-12 h-12 bg-purple-100 text-[#8B5CF6] rounded-2xl flex items-center justify-center font-black mx-auto mb-4">01</div>
                    <h3 class="font-bold text-gray-800 text-sm mb-2">Registrasi Akun</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Buat akun dengan nama, email, dan password.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative bg-white p-6 rounded-3xl shadow-sm border border-purple-50 text-center">
                    <div class="w-12 h-12 bg-purple-100 text-[#8B5CF6] rounded-2xl flex items-center justify-center font-black mx-auto mb-4">02</div>
                    <h3 class="font-bold text-gray-800 text-sm mb-2">Isi Data & Upload Berkas</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Lengkapi identitas diri, pilih <span class="font-bold">1 jurusan</span>, upload KK, Ijazah, dan KTP Ibu.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative bg-white p-6 rounded-3xl shadow-sm border border-purple-50 text-center">
                    <div class="w-12 h-12 bg-purple-100 text-[#8B5CF6] rounded-2xl flex items-center justify-center font-black mx-auto mb-4">03</div>
                    <h3 class="font-bold text-gray-800 text-sm mb-2">Pantau Status</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Panitia akan memverifikasi berkas Anda. Cek hasilnya di Dashboard secara berkala.</p>
                </div>

                <!-- Step 4 -->
                <div class="relative bg-[#8B5CF6] p-6 rounded-3xl shadow-lg text-center text-white">
                    <div class="w-12 h-12 bg-white text-[#8B5CF6] rounded-2xl flex items-center justify-center font-black mx-auto mb-4">04</div>
                    <h3 class="font-bold text-sm mb-2">Cetak Bukti</h3>
                    <p class="text-[11px] text-purple-100 leading-relaxed">Jika <span class="font-bold text-yellow-300">DITERIMA</span>, unduh & cetak bukti kelulusan untuk daftar ulang.</p>
                </div>
            </div>
        </section>

        <!-- SECTION PERSYARATAN & CTA -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white p-10 rounded-[40px] border border-gray-100 shadow-sm">
                <h3 class="text-2xl font-black text-gray-900 mb-6 flex items-center gap-3">
                    <i class="fa-solid fa-file-signature text-[#8B5CF6]"></i>
                    Syarat Dokumen
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        <span class="text-sm font-bold text-gray-700">Scan Ijazah / SKL</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        <span class="text-sm font-bold text-gray-700">Scan Kartu Keluarga</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        <span class="text-sm font-bold text-gray-700">Pas Foto 3x4</span>
                    </div>
                    <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                        <span class="text-sm font-bold text-gray-700">KTP Ibu Kandung</span>
                    </div>
                </div>
            </div>

            <div class="bg-[#8B5CF6] p-10 rounded-[40px] text-white flex flex-col justify-center items-center text-center">
                <h3 class="text-2xl font-black mb-4 uppercase italic tracking-tighter">Sudah Siap Bergabung?</h3>
                <p class="text-purple-100 mb-8 text-sm">Pendaftaran hanya butuh waktu 5 menit. Segera amankan kuota jurusan pilihanmu!</p>
                <div class="flex flex-col sm:flex-row gap-4 w-full">
                    <a href="/register" class="flex-1 bg-yellow-400 text-purple-900 py-4 rounded-2xl font-black hover:bg-yellow-500 transition shadow-xl">DAFTAR SEKARANG</a>
                    <a href="https://wa.me/6285708337432" class="flex-1 bg-white/20 text-white py-4 rounded-2xl font-black hover:bg-white/30 transition border border-white/30 italic">Tanya Admin WA</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection