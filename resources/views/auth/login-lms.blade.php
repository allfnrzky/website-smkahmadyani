<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | LMS SMK Ahmad Yani Jabung</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/logo-smk.jpg') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-hero {
            background: linear-gradient(rgba(46, 16, 101, 0.88), rgba(46, 16, 101, 0.75)), 
                        url('{{ asset('images/gedung-smk.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .motto-highlight { color: #c084fc; font-weight: 800; text-transform: uppercase; }
        .logo-container {
            width: 100px; height: 100px;
            display: flex; align-items: center; justify-content: center;
            background: white; border-radius: 1.5rem;
            padding: 12px; margin: 0 auto;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }
        @media (min-width: 768px) {
            .logo-container { width: 120px; height: 120px; }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(20px);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen bg-hero flex flex-col">
        
        <div class="flex-grow flex items-center justify-center p-4 sm:p-6 md:p-8">
            <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
                
                <!-- Kiri: Branding -->
                <div class="text-white space-y-5 md:space-y-8 text-center md:text-left">
                    <div class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mx-auto md:mx-0">
                        <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse mr-3"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-center">LMS SMK AHMAD YANI</span>
                    </div>
                    
                    <div class="md:hidden">
                        <h1 class="text-3xl font-extrabold tracking-tighter">
                            Pusat <span class="text-purple-300">Belajar</span> Modern.
                        </h1>
                    </div>

                    <div class="hidden md:block">
                        <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight tracking-tighter">
                            Pusat <br> <span class="text-purple-300">Belajar</span> Modern.
                        </h1>
                        <p class="text-purple-100/90 text-base lg:text-lg leading-relaxed max-w-md font-medium mt-5">
                            Akses ruang kelas virtual SMK Ahmad Yani Jabung untuk pengalaman belajar yang lebih interaktif.
                        </p>
                    </div>
                </div>

                <!-- Kanan: Form Login -->
                <div class="flex justify-center md:justify-end w-full">
                    <div class="glass-card p-8 sm:p-10 md:p-12 rounded-[2.5rem] md:rounded-[3rem] shadow-2xl w-full max-w-md border border-white/80">
                        
                        <div class="text-center mb-8 md:mb-10">
                            <div class="logo-container mb-5 md:mb-7">
                                <img src="{{ asset('images/logo-smk.jpg') }}" alt="Logo SMK" class="max-h-full max-w-full object-contain">
                            </div>
                            <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">Selamat Datang</h3>
                            <p class="text-gray-500 text-[11px] font-bold uppercase tracking-[0.15em] mt-2">Masuk ke Akun Anda</p>
                        </div>

                        @if($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl text-xs font-bold">
                                <ul class="list-disc ml-4">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.lms') }}" class="space-y-5">
                            @csrf

                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 ml-1 italic">Alamat Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required autofocus 
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition text-sm">
                            </div>

                            <div>
                                <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 ml-1 italic">Kata Sandi</label>
                                <input type="password" name="password" required 
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:bg-white transition text-sm">
                            </div>

                            <div class="pt-3">
                                <button type="submit" class="w-full py-4 bg-[#8B5CF6] text-white rounded-2xl font-bold text-xs uppercase tracking-[0.2em] hover:bg-[#7C3AED] active:scale-[0.98] transition-all shadow-xl shadow-purple-200 flex items-center justify-center group gap-3">
                                    <span>Masuk Sekarang</span>
                                    <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                                </button>
                            </div>

                            <div class="text-center pt-2">
                                <p class="text-xs text-gray-400">
                                    <a href="{{ route('login') }}" class="text-purple-600 font-semibold hover:underline">Login untuk Calon Siswa (PPDB)</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-purple-900/90 backdrop-blur-md text-white border-t border-white/10 py-6 md:py-8 px-6">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 md:gap-6">
                <div class="text-center md:text-left">
                    <h4 class="text-sm md:text-base font-extrabold tracking-tight uppercase">SMK Ahmad Yani Jabung</h4>
                    <p class="text-[9px] md:text-[10px] text-purple-200 italic font-medium tracking-wide mt-1">
                        prod<span class="motto-highlight">U</span>ktif sa<span class="motto-highlight">N</span>tun a<span class="motto-highlight">G</span>amis berb<span class="motto-highlight">U</span>daya
                    </p>
                </div>
                <div class="flex gap-3 md:gap-4">
                    <a href="https://www.facebook.com/profile.php?id=100027839653609" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-purple-600 transition border border-white/10"><i class="fab fa-facebook-f text-sm"></i></a>
                    <a href="https://www.instagram.com/smkunguofficial?igsh=MTFhNWVqbGsxcmFmaw==" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-purple-600 transition border border-white/10"><i class="fab fa-instagram text-sm"></i></a>
                    <a href="https://youtube.com/@smkunguofficial3958?si=iWnfCr2won2TyLth" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-purple-600 transition border border-white/10"><i class="fab fa-youtube text-sm"></i></a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
