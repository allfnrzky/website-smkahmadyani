<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Ahmad Yani Jabung')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{ asset('images/logo-sekolah.png') }}" type="image/x-icon">

    <style>
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }
        .prose ul { list-style-type: disc; padding-left: 1.625em; margin-bottom: 1.25em; }
        .prose ol { list-style-type: decimal; padding-left: 1.625em; margin-bottom: 1.25em; }
        .prose li { margin-bottom: 0.5em; }
        .prose li > ul,
        .prose li > ol { margin-bottom: 0; }
        .prose ul ul,
        .prose ol ul { list-style-type: circle; }
        .prose ul ul ul,
        .prose ol ul ul { list-style-type: square; }
        .prose table { width: 100%; border-collapse: collapse; margin-bottom: 1.25em; }
        .prose table th,
        .prose table td { border: 1px solid #d1d5db; padding: 8px 12px; text-align: left; }
        .prose table th { background-color: #f3f4f6; font-weight: 700; }
        .prose table tr:nth-child(even) { background-color: #f9fafb; }
        .prose blockquote { border-left: 4px solid #8B5CF6; padding: 12px 20px; margin: 1.25em 0; background: #f5f3ff; font-style: italic; color: #4b5563; border-radius: 0 8px 8px 0; }
        .prose blockquote p { margin: 0; }
        .prose h1, .prose h2, .prose h3, .prose h4 { font-weight: 700; margin-top: 1.5em; margin-bottom: 0.75em; line-height: 1.25; }
        .prose h1 { font-size: 1.75em; }
        .prose h2 { font-size: 1.5em; }
        .prose h3 { font-size: 1.25em; }
        .prose p { margin-bottom: 1em; line-height: 1.75; }
        .prose a { color: #8B5CF6; text-decoration: underline; }
        .prose a:hover { color: #7C3AED; }
        .prose code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-size: 0.875em; }
        .prose pre { background: #1f2937; color: #f3f4f6; padding: 1em; border-radius: 8px; overflow-x: auto; margin-bottom: 1.25em; }
        .prose pre code { background: none; padding: 0; color: inherit; }
        .prose img { max-width: 100%; height: auto; border-radius: 8px; margin: 1.25em 0; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-[#8B5CF6] text-white shadow-lg fixed top-0 left-0 right-0 z-[100]">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-4 shrink-0">
                    <!-- Wadah Logo -->
                    <div class="flex items-center gap-3">
                        <!-- Logo 1 (Misal: Logo Tut Wuri / Yayasan) -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo 1" class="h-10 w-auto">
                        
                        <!-- Garis Pembatas Vertikal -->
                        <div class="w-[1.5px] h-8 bg-white/30"></div>
                        
                        <!-- Logo 2 (Logo SMK Ahmad Yani) -->
                        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMK" class="h-10 w-auto">
                    </div>

                    <!-- Teks Nama Sekolah -->
                    <div class="font-black text-xl tracking-tighter leading-tight">
                        SMK <span class="text-yellow-400">AHMAD YANI</span>
                        <div class="text-[10px] text-white/80 font-medium tracking-widest uppercase -mt-1">Jabung - Malang</div>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8 font-semibold">
                    <a href="/" class="{{ request()->is('/') ? 'text-yellow-400' : 'text-white' }} hover:text-yellow-400 transition">Beranda</a>
                    <a href="/tentang-kami" class="{{ request()->is('tentang-kami') ? 'text-yellow-400' : 'text-white' }} hover:text-yellow-400 transition">Tentang Kami</a>
                    <a href="/program-keahlian" class="{{ request()->is('program-keahlian') ? 'text-yellow-400' : 'text-white' }} hover:text-yellow-400 transition">Program Keahlian</a>
                    <a href="/info-ppdb" class="{{ request()->is('info-ppdb') ? 'text-yellow-400' : 'text-white' }} hover:text-yellow-400 transition">Info PPDB</a> 
                    <a href="/berita" class="{{ request()->is('berita*') ? 'text-yellow-400' : 'text-white' }} hover:text-yellow-400 transition">Berita</a>
                    <a href="{{ route('login') }}" class="bg-white text-[#8B5CF6] px-5 py-2 rounded-full text-sm font-bold shadow-md hover:bg-yellow-400 hover:text-purple-900 transition uppercase">Login PPDB</a>
                    <a href="{{ route('login.lms') }}" class="px-4 py-2 border border-white/50 rounded-lg text-white hover:bg-white/10 transition">LMS</a> 
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="outline-none p-2 text-2xl">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden bg-[#8B5CF6] border-t border-purple-400 transition-all duration-300">
            <div class="px-4 pt-2 pb-6 space-y-1 text-white">
                <a href="/" class="block px-3 py-3 rounded-lg hover:bg-purple-700 font-medium border-b border-purple-500/50">Beranda</a>
                <a href="/tentang-kami" class="block px-3 py-3 rounded-lg hover:bg-purple-700 font-medium border-b border-purple-500/50">Tentang Kami</a>
                <a href="/info-ppdb" class="block px-3 py-3 rounded-lg hover:bg-purple-700 font-medium border-b border-purple-500/50">Info PPDB</a>
                <a href="/berita" class="block px-3 py-3 rounded-lg hover:bg-purple-700 font-medium border-b border-purple-500/50">Berita</a>
                
                <div class="pt-4 space-y-3">
                    <a href="{{ route('login') }}" class="block text-center bg-yellow-400 text-purple-900 py-3 rounded-xl font-bold uppercase shadow-lg">
                        Login PPDB
                    </a>
                    <a href="{{ route('login.lms') }}" class="block text-center bg-white/10 border-2 border-white/50 text-white py-3 rounded-xl font-bold uppercase hover:bg-white/20 transition-colors">
                        LMS
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow w-full overflow-hidden pt-16">
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 mt-4 flex items-center gap-3 bg-green-100 border border-green-200 text-green-700 px-5 py-3 rounded-xl text-sm font-bold shadow-sm">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-green-500 hover:text-green-700">&times;</button>
            </div>
        @endif
        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 mt-4 flex items-center gap-3 bg-red-100 border border-red-200 text-red-700 px-5 py-3 rounded-xl text-sm font-bold shadow-sm">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-red-500 hover:text-red-700">&times;</button>
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="bg-[#8B5CF6] text-white py-12 border-t border-white/10 w-full overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div class="w-full">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white/10 h-64 md:h-80">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4893864901965!2d112.7406896748331!3d-7.948272192076039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62ed9125eaa83%3A0x7d926bdbf061eea2!2sSMK%20Ahmad%20Yani%20Jabung!5e0!3m2!1sid!2sid!4v1777082118260!5m2!1sid!2sid""
                            class="w-full h-full border-0" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="flex flex-col justify-center text-center lg:text-left">
                    <div class="mb-6 font-black text-3xl uppercase tracking-widest leading-tight">
                        SMK <span class="text-yellow-400">Ahmad Yani</span> <br class="hidden lg:block"> Jabung
                    </div>
                    
                    <p class="text-purple-200 text-sm mb-8 leading-relaxed max-w-md mx-auto lg:mx-0">
                        Mencetak lulusan yang prodUktif, saNtun, aGamis, berbUdaya
                    </p>

                    <div class="space-y-4 mb-8 text-sm md:text-base">
                        <div class="flex items-start justify-center lg:justify-start gap-4">
                            <i class="fa-solid fa-location-dot text-yellow-400 mt-1"></i>
                            <span class="text-purple-50 text-xs md:text-sm">Jl. Raya Sukolilo No.02, Kec. Jabung, Kab. Malang.</span>
                        </div>
                        <div class="flex items-center justify-center lg:justify-start gap-4">
                            <i class="fa-solid fa-phone text-yellow-400"></i>
                            <span class="text-purple-50 text-xs md:text-sm">085708337432</span>
                        </div>
                    </div>

                    <div class="flex justify-center lg:justify-start space-x-6 text-2xl">
                        <a href="https://www.facebook.com/profile.php?id=100027839653609" class="hover:text-yellow-400 transition"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/smkunguofficial?igsh=MTFhNWVqbGsxcmFmaw==" class="hover:text-yellow-400 transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://youtube.com/@smkunguofficial3958?si=iWnfCr2won2TyLth" class="hover:text-yellow-400 transition"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-white/10 text-center text-xs text-purple-300">
                © 2026 SMK Ahmad Yani Jabung
            </div>
        </div>
    </footer>

    <!-- Tombol Scroll to Top -->
    <button id="scroll-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 rounded-full bg-[#8B5CF6] text-white shadow-lg hover:bg-[#7C3AED] transition-all duration-300 flex items-center justify-center opacity-0 invisible translate-y-4">
        <i class="fas fa-arrow-up"></i>
    </button>

    <style>
        #scroll-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>

    <script>
        // Tombol scroll to top
        const scrollBtn = document.getElementById('scroll-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });

        // Tombol menu di HP
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>