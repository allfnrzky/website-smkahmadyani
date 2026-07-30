<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - SMK Ahmad Yani Jabung</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-sekolah.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <style>
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: #a78bfa; border-radius: 10px; }
        .ck-content ul { list-style-type: disc !important; padding-left: 1.625em; }
        .ck-content ol { list-style-type: decimal !important; padding-left: 1.625em; }
        .ck-content li { margin-bottom: 0.25em; }
        .ck-content ul ul, .ck-content ol ul { list-style-type: circle !important; }
        .ck-content ul ul ul, .ck-content ol ul ul { list-style-type: square !important; }
        .ck-content table { width: 100%; border-collapse: collapse; }
        .ck-content table td, .ck-content table th { min-width: 2em; padding: 4px 8px; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 overflow-x-hidden">
    <div class="min-h-screen flex flex-col lg:flex-row">
        @include('layouts.navigation')

        <div class="flex-1 flex flex-col min-w-0 min-h-screen">
            <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 py-4 px-6 sticky top-0 z-30 hidden lg:flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="w-1.5 h-6 bg-purple-600 rounded-full"></div>
                    <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">
                        @yield('title', 'Admin Panel')
                    </h2>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest bg-gray-50 px-3 py-1.5 rounded-full border border-gray-100">
                        <i class="fas fa-calendar-day mr-1"></i> {{ date('d M Y') }}
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-500">{{ auth()->user()->name }}</span>
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold text-xs">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mx-4 md:mx-8 mt-4 flex items-center gap-3 bg-green-100 border border-green-200 text-green-700 px-5 py-3 rounded-xl text-sm font-bold shadow-sm">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                    <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mx-4 md:mx-8 mt-4 flex items-center gap-3 bg-red-100 border border-red-200 text-red-700 px-5 py-3 rounded-xl text-sm font-bold shadow-sm">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                    <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700">&times;</button>
                </div>
            @endif
            @if ($errors->any())
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" class="mx-4 md:mx-8 mt-4 flex items-start gap-3 bg-red-100 border border-red-200 text-red-700 px-5 py-3 rounded-xl text-sm font-bold shadow-sm">
                    <i class="fas fa-exclamation-circle mt-0.5"></i>
                    <ul class="list-disc ml-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button @click="show = false" class="ml-auto text-red-500 hover:text-red-700">&times;</button>
                </div>
            @endif

            <main class="flex-grow p-4 md:p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
