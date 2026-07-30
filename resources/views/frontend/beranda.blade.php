@extends('layouts.frontend')

@section('content')
<div class="relative bg-[#8B5CF6] min-h-[500px] md:h-[600px] flex items-center overflow-hidden">
    <!-- <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/gedung-smk.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Gedung SMK">
        <div class="absolute inset-0 bg-gradient-to-t from-[#8B5CF6] via-transparent to-transparent md:hidden"></div>
    </div> -->
    <div class="absolute inset-0 z-0">
        <div class="swiper heroSwiper w-full h-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/gedung-smk.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Gedung SMK 1">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/3.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/2.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/1.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/4.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/5.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/6.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/7.jpg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/8.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/9.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/dashboard/10.jpeg') }}" class="w-full h-full object-cover opacity-30 md:opacity-40" alt="Guru">
                </div>
            </div>
        </div>

        <div class="absolute inset-0 bg-gradient-to-t from-[#8B5CF6] via-transparent to-transparent md:hidden z-10"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 md:py-0 text-white">
        <h1 class="text-3xl md:text-6xl font-black leading-tight text-center md:text-left">
            Selamat Datang di <br class="hidden md:block"> 
            <span class="text-yellow-400">SMK Ahmad Yani Jabung</span>
        </h1>
        
        <p class="mt-6 text-sm md:text-lg max-w-2xl text-purple-100 text-center md:text-left leading-relaxed">
            Mencetak lulusan yang Unggul, Nyaman, Giat, dan Usaha (UNGU). 
            Bergabunglah bersama kami untuk masa depan yang lebih gemilang.
        </p>
        
        <!-- <div class="mt-10 flex flex-col md:flex-row gap-4 items-center md:items-start">
            <a href="/login" class="w-full md:w-auto bg-yellow-500 hover:bg-yellow-600 text-purple-900 px-8 py-4 rounded-full font-bold text-center transition shadow-lg">
                Daftar PMB Sekarang
            </a>
            <a href="/tentang-kami" class="w-full md:w-auto border-2 border-white hover:bg-white hover:text-purple-600 px-8 py-4 rounded-full font-bold text-center transition">
                Pelajari Lebih Lanjut
            </a>
        </div> -->
    </div>
</div>

<!-- <div class="bg-white py-10 shadow-sm border-b">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
        <div class="border-r border-gray-100 md:border-r-0">
            <span class="text-3xl md:text-4xl font-black text-[#6D28D9]">1500+</span>
            <p class="text-gray-400 uppercase text-[10px] md:text-xs tracking-widest mt-1 font-bold">Siswa Aktif</p>
        </div>
        <div class="md:border-x-0">
            <span class="text-3xl md:text-4xl font-black text-[#6D28D9]">4</span>
            <p class="text-gray-400 uppercase text-[10px] md:text-xs tracking-widest mt-1 font-bold">Jurusan</p>
        </div>
        <div class="border-r border-gray-100 md:border-r-0">
            <span class="text-3xl md:text-4xl font-black text-[#6D28D9]">80+</span>
            <p class="text-gray-400 uppercase text-[10px] md:text-xs tracking-widest mt-1 font-bold">Pengajar</p>
        </div>
        <div>
            <span class="text-3xl md:text-4xl font-black text-[#6D28D9]">50+</span>
            <p class="text-gray-400 uppercase text-[10px] md:text-xs tracking-widest mt-1 font-bold">Mitra DUDI</p>
        </div>
    </div>
</div> -->

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-4xl font-black text-gray-900 mb-4">Kenapa Harus <span class="text-[#8B5CF6]">SMK Ahmad Yani</span> Jabung?</h2>
        <p class="text-gray-500 mb-16 max-w-2xl mx-auto font-medium">Alasan kenapa harus memilih untuk bergabung dengan SMK Ahmad Yani Jabung.</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @php 
                $promos = [
                    ['fa-desktop', 'Fasilitas Lengkap', 'Penunjang belajar dengan kualitas terbaik.'],
                    ['fa-building', 'Lingkungan Nyaman', 'Berada di lingkungan yang nyaman dan asri.'],
                    ['fa-users', 'Pengajar Kompeten', 'Guru terbaik dengan pengalaman luas.'],
                    ['fa-handshake', 'Kerja Sama Luas', 'Kesempatan kerja yang lebih terjamin.']
                ]
            @endphp
            @foreach($promos as $promo)
            <div class="p-10 rounded-3xl bg-white shadow-xl shadow-purple-100/50 border border-purple-50 group hover:bg-[#8B5CF6] transition duration-500">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-white/20 transition">
                    <i class="fa-solid {{ $promo[0] }} text-2xl text-[#8B5CF6] group-hover:text-white"></i>
                </div>
                <h3 class="font-black text-gray-800 mb-3 group-hover:text-white">{{ $promo[1] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed group-hover:text-purple-100">{{ $promo[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            
            <!-- Bagian Foto Kepala Sekolah -->
            <div class="w-full lg:w-5/12">
                <div class="relative">
                    <!-- Elemen Dekoratif Lingkaran -->
                    <div class="absolute -top-10 -right-10 w-64 h-64 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
                    
                    <!-- Bingkai Foto Melengkung -->
                    <div class="relative z-10 bg-orange-500 rounded-t-[200px] rounded-b-[50px] overflow-hidden shadow-2xl border-8 border-white">
                        <img src="{{ asset('images/kepsek.jpeg') }}" 
                            alt="Imron Hamzah SE MSi" 
                            class="w-full h-[650px] object-cover object-top">
                    </div>

                    <!-- Nama Kepala Sekolah di Bawah Foto -->
                    <div class="mt-8 text-center">
                        <h4 class="text-2xl font-black text-gray-900 uppercase tracking-tight">IMRON HAMZAH SE MSi</h4>
                        <p class="text-[#8B5CF6] font-bold italic">Kepala SMK Ahmad Yani Jabung</p>
                    </div>
                </div>
            </div>

            <!-- Bagian Teks Sambutan -->
            <div class="w-full lg:w-7/12">
                <h4 class="text-[#8B5CF6] font-black tracking-widest uppercase mb-4 flex items-center gap-3">
                    <span class="w-10 h-1 bg-[#8B5CF6]"></span> Profil SMK Ahmad Yani
                </h4>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-8 leading-tight">
                    Sambutan Kepala Sekolah <br> 
                    <span class="text-[#8B5CF6]">SMK Ahmad Yani Jabung</span>
                </h2>
                
                <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
                    <p class="italic font-bold">Assalamu’alaikum Warahmatullahi Wabarakatuh</p>
                    
                    <p>Bapak/Ibu wali murid yang saya hormati, anak-anakku yang saya banggakan. Memilih SMK itu memilih masa depan. Izinkan saya sampaikan alasan kenapa SMK Ahmad Yani Jabung layak jadi tempat anak Bapak/Ibu bertumbuh:</p>
                    
                    <ul class="space-y-4">
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">Visi-misi UNGU:</strong> Produktif, Santun, Agamis, Berbudaya. Arah kami jelas, membentuk generasi terampil dan berakhlak.</span>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">Memahami Karakter:</strong> Kami menggali potensi tiap anak agar belajar di jurusan yang pas tanpa paksaan.</span>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">Budaya Disiplin:</strong> Membiasakan kerapian dan lingkungan yang bersih demi melahirkan karakter yang baik.</span>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">SMK Rasa Pesantren:</strong> Kurikulum diniyah, Dhuha rutin, dan Dzuhur berjamaah. Akhlak dulu baru terampil.</span>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">Mutu Berbasis Murid:</strong> Keberhasilan kami adalah saat anak yang semula pemalu menjadi pemberani dan terampil.</span>
                        </li>
                        <li class="flex gap-3">
                            <i class="fa-solid fa-circle-check text-[#8B5CF6] mt-1"></i>
                            <span><strong class="text-gray-800">Fasilitas Modern:</strong> Bengkel standar industri dan lingkungan asri demi kenyamanan belajar.</span>
                        </li>
                    </ul>

                    <p>Lulus dari SMK Ahmad Yani Jabung, anak siap kerja, siap kuliah, dan siap jadi kebanggaan keluarga. Kami siap menjaga amanah Bapak/Ibu sekalian.</p>

                    <p class="italic font-bold">Wassalamu’alaikum Warahmatullahi Wabarakatuh</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- <div class="max-w-7xl mx-auto px-4 py-16 sm:py-20">
    <div class="flex flex-col justify-center items-center mb-12 text-center">
        <div class="mb-4">
            <h2 class="text-3xl font-bold text-gray-800">Program Keahlian</h2>
            <div class="h-1 w-20 bg-yellow-500 mt-2 mx-auto"></div>
        </div>
        <a href="/program-keahlian" class="text-[#8B5CF6] font-semibold hover:underline">
            Lihat Selengkapnya &rarr;
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($jurusan as $j)
        <div class="group bg-white rounded-2xl p-8 shadow-md hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border-b-4 border-transparent hover:border-[#8B5CF6] text-center">
            
            <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 text-[#8B5CF6] group-hover:bg-[#8B5CF6] group-hover:text-white transition mx-auto shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <h3 class="font-bold text-xl text-gray-800 leading-tight">{{ $j->nama }}</h3>
            <p class="text-gray-500 mt-4 text-sm leading-relaxed">
                Pelajari keahlian profesional di bidang {{ $j->nama }} dengan kurikulum industri terbaru.
            </p>
        </div>
        @endforeach
    </div>
</div> -->

<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">
                Profil <span class="text-[#8B5CF6]">Lulusan SMK</span>
            </h2>
            <div class="h-1 w-20 bg-yellow-500 mx-auto mt-2"></div>
            <p class="text-gray-500 mt-4 font-medium">Kompetensi standar industri yang dimiliki setiap lulusan kami.</p>
        </div>
        
        <!-- Swiper Container -->
        <div class="swiper alumniSwiper h-auto pb-16">
            <div class="swiper-wrapper">
                @php 
                    $profilLulusan = [
                        [
                            'prodi' => 'Layanan Penunjang Kefarmasian Klinis dan Komunitas',
                            'deskripsi' => 'Lulusan Kompetensi Keahlian Farmasi SMK AHMAD YANI JABUNG siap menjadi asisten tenaga kefarmasian yang handal.',
                            'points' => [
                                'Asisten Tenaga Kefarmasian Bersertifikat: Kompeten membantu Apoteker di RS/Apotek sesuai UU No. 17 Th 2023 & bersertifikat BNSP.',
                                'Terampil Meracik & Melayani: Mampu meracik puyer, kapsul, salep, serta mengelola stok dengan SIM Apotek.',
                                'Berakhlak Mulia & Religius: Bekerja jujur & bertanggung jawab, paham fiqih obat serta produk halal.',
                                'Siap Kerja, Kuliah, Wirausaha: Terserap di Kimia Farma/RSUD, Kuliah S1 Farmasi, atau Wirausaha herbal.'
                            ],
                            'icon' => 'farmasi.png'
                        ],
                        [
                            'prodi' => 'Bisnis Digital',
                            'deskripsi' => 'Lulusan Prodi Bisnis Digital SMK AHMAD YANI JABUNG menguasai ekosistem perdagangan elektronik modern.',
                            'points' => [
                                'Digital Marketer Muda Bersertifikat: Menguasai FB/Tiktok Ads, SEO, & Copywriting dengan sertifikat BNSP.',
                                'Content Creator & Desainer: Ahli membuat konten visual promosi menggunakan Canva, Capcut, & Storytelling.',
                                'Admin Marketplace: Terampil mengelola toko di Shopee, Tokopedia, Tiktok Shop & analisa data penjualan.',
                                'Siap Kerja, Kuliah, Wirausaha: Admin online, Kuliah D4 Bisnis Digital, atau membangun brand sendiri.'
                            ],
                            'icon' => 'pemasaran.png'
                        ],
                        [
                            'prodi' => 'Teknik Komputer & Jaringan',
                            'deskripsi' => 'Lulusan TKJ SMK AHMAD YANI JABUNG ahli dalam infrastruktur IT dan keamanan jaringan.',
                            'points' => [
                                'Teknisi Jaringan Bersertifikat: Menguasai Mikrotik (MTCNA), Server, & troubleshooting komputer bersertifikat BNSP.',
                                'Ahli Fiber Optic & CCTV: Terampil instalasi maintenance jaringan FO, WiFi, & sistem keamanan CCTV.',
                                'Admin Server & Cloud: Mampu mengelola Windows/Linux Server, cPanel, & membangun layanan cloud.',
                                'Siap Kerja, Kuliah, Wirausaha: IT Support, Kuliah Informatika, atau Jasa instalasi RT/RW Net.'
                            ],
                            'icon' => 'tkj.png'
                        ],
                        [
                            'prodi' => 'Perbankan Syariah',
                            'deskripsi' => 'Lulusan Perbankan Syariah SMK AHMAD YANI JABUNG profesional dalam layanan keuangan islami.',
                            'points' => [
                                'Teller & CS Bersertifikat: Menguasai operasional bank syariah (Mudharabah/Murabahah) bersertifikat BNSP.',
                                'Ahli Administrasi Keuangan: Mampu mengelola laporan keuangan sesuai PSAK 101-112 & fatwa DSN-MUI.',
                                'Terampil Digital Banking: Ahli operasikan mobile banking, QRIS, & melayani nasabah dengan akhlak islami.',
                                'Siap Kerja, Kuliah, Wirausaha: Karir di Bank Syariah/BMT, Kuliah Ekonomi Syariah, atau Agen Laku Pandai.'
                            ],
                            'icon' => 'perbankan.png'
                        ]
                    ];
                @endphp
                
                @foreach($profilLulusan as $item)
                <div class="swiper-slide h-full">
                    <div class="bg-white p-8 md:p-10 rounded-[40px] border border-gray-100 shadow-xl shadow-purple-100/50 h-full flex flex-col hover:border-[#8B5CF6] transition-all duration-300">
                        
                        <!-- Header Card -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center p-2 shadow-sm border border-gray-100">
                                <img src="{{ asset('images/jurusan/' . $item['icon']) }}" 
                                     alt="Logo {{ $item['prodi'] }}" 
                                     class="w-full h-full object-contain">
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-[#8B5CF6] uppercase tracking-[0.2em]">PRODI</p>
                                <h3 class="text-xl font-black text-gray-900 uppercase italic">{{ $item['prodi'] }}</h3>
                            </div>
                        </div>

                        <p class="text-gray-500 text-sm mb-6 font-medium italic border-l-4 border-yellow-400 pl-4">
                            "{{ $item['deskripsi'] }}"
                        </p>

                        <!-- Kompetensi Points -->
                        <div class="flex-grow">
                            <ul class="space-y-4">
                                @foreach($item['points'] as $point)
                                <li class="flex gap-3 items-start">
                                    <div class="mt-1">
                                        <i class="fa-solid fa-circle-check text-[#8B5CF6] text-xs"></i>
                                    </div>
                                    <p class="text-xs text-gray-600 leading-relaxed">
                                        {{ $point }}
                                    </p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Swiper Pagination -->
            <div class="swiper-pagination !bottom-0"></div>
        </div>
    </div>
</section>

<style>
    .alumniSwiper .swiper-slide {
        height: auto; /* Memungkinkan slide menyesuaikan tinggi konten */
        display: flex;
    }
    .alumniSwiper .swiper-pagination-bullet-active {
        background: #8B5CF6; /* Warna dot aktif ungu */
    }
</style>

<div class="bg-gray-100 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Berita & Artikel Terbaru</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($berita as $item)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition">
                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : 'https://via.placeholder.com/400x250' }}" class="w-full h-48 object-cover" alt="{{ $item->judul }}">
                <div class="p-6">
                    <span class="text-xs font-bold text-purple-600 uppercase tracking-widest">Informasi</span>
                    <h3 class="font-bold text-lg mt-2 mb-4 leading-snug">{{ $item->judul }}</h3>
                    <div class="flex justify-between items-center mt-6">
                        <span class="text-sm text-gray-400">{{ $item->created_at->format('d M Y') }}</span>
                        <a href="/berita/{{ $item->slug }}" class="text-[#8B5CF6] font-bold text-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-10 text-gray-400 italic">
                Belum ada berita yang diterbitkan.
            </div>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    // Inisialisasi untuk Hero Section (Gambar Gedung)
    const heroSwiper = new Swiper('.heroSwiper', {
        loop: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
    });

    // Inisialisasi untuk Alumni Section (Testimoni)
    const alumniSwiper = new Swiper(".alumniSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>

<!-- Modal Iklan Responsif -->
<div id="modal-ads" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/80 backdrop-blur-md transition-opacity duration-500 opacity-0 pointer-events-none p-4">
    <div class="relative w-full max-w-[90vw] md:max-w-[70vw] lg:max-w-[50vw] xl:max-w-[40vw] transform transition-all scale-95 duration-500 shadow-[0_0_50px_rgba(139,92,246,0.3)]">
        
        <!-- Tombol Close -->
        <button onclick="closeAds()" class="absolute -top-5 -right-5 bg-white text-[#8B5CF6] w-12 h-12 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 active:scale-90 transition-all z-20 border-2 border-[#8B5CF6]">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <!-- Kontainer Gambar -->
        <div class="bg-white rounded-[2rem] overflow-hidden border-4 border-[#8B5CF6] relative">
            <!-- Aspek Rasio Otomatis agar tidak gepeng -->
            <img src="{{ asset('images/iklan.jpg') }}" alt="Iklan PPDB" class="w-full h-auto max-h-[70vh] object-contain block mx-auto bg-gray-100">
            
            <!-- Overlay Info bawah yang lebih premium -->
            <div class="p-6 text-center bg-gradient-to-t from-white via-white/100 to-white/90">
                <h3 class="text-xl md:text-2xl font-black text-gray-900 leading-none">INFORMASI PPDB 2026</h3>
                <p class="text-sm md:text-base text-gray-600 mt-2 font-medium">Daftar sekarang sebelum kuota terpenuhi!</p>
                
                <!-- Tombol Action Tambahan -->
                <a href="{{ route('register') }}" class="mt-4 inline-block bg-[#8B5CF6] text-white px-8 py-3 rounded-full font-bold hover:bg-[#7C3AED] transition-all transform hover:-translate-y-1 shadow-lg text-sm md:text-base">
                    DAFTAR SEKARANG <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('modal-ads');
        const content = modal.querySelector('div');

        // 1. Munculkan iklan setelah 1.5 detik halaman dimuat
        setTimeout(() => {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
            content.classList.remove('scale-90');
            content.classList.add('scale-100');
        }, 1500);

        // 2. Hilang otomatis setelah 8 detik (8000ms + delay muncul 1500ms)
        setTimeout(() => {
            closeAds();
        }, 10000);
    });

    function closeAds() {
        const modal = document.getElementById('modal-ads');
        modal.classList.add('opacity-0', 'pointer-events-none');
        modal.classList.remove('opacity-100');
    }
</script>

@endsection