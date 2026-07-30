<x-app-layout title="Papan Pengumuman">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Papan Pengumuman</h2>
    </x-slot>

    <div class="py-6 md:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 gap-4">
                @forelse($semua_pengumuman as $p)
                    <div class="group bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-xl hover:border-purple-200 transition-all duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center text-sm
                                    {{ $p->kategori == 'penting' ? 'bg-red-50 text-red-500' : ($p->kategori == 'jadwal' ? 'bg-orange-50 text-orange-500' : 'bg-blue-50 text-blue-500') }}">
                                    <i class="fa-solid {{ $p->kategori == 'penting' ? 'fa-triangle-exclamation' : ($p->kategori == 'jadwal' ? 'fa-calendar-days' : 'fa-circle-info') }}"></i>
                                </div>
                                <div>
                                    <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest
                                        {{ $p->kategori == 'penting' ? 'bg-red-100 text-red-600' : ($p->kategori == 'jadwal' ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600') }}">
                                        {{ $p->kategori }}
                                    </span>
                                    <div class="text-[10px] text-gray-400 font-medium mt-1">
                                        <i class="fa-regular fa-clock mr-1"></i> Diterbitkan {{ $p->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="text-xl font-black text-gray-800 group-hover:text-purple-600 transition-colors mb-3 uppercase tracking-tight">
                            {{ $p->judul }}
                        </h2>
                        
                        <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed italic">
                            {!! nl2br(e($p->isi)) !!}
                        </div>

                        <div class="mt-6 pt-4 border-t border-gray-50 flex justify-end">
                            <span class="text-[10px] font-bold text-gray-300 uppercase tracking-widest">Panitia PPDB SMK Ahmad Yani</span>
                        </div>
                    </div>
                @empty
                    <div class="bg-gray-50 rounded-3xl p-20 text-center border-2 border-dashed border-gray-200">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                            <i class="fa-solid fa-inbox text-gray-300 text-3xl"></i>
                        </div>
                        <h3 class="text-gray-500 font-bold">Belum Ada Pengumuman</h3>
                        <p class="text-gray-400 text-sm mt-1">Silakan periksa kembali halaman ini secara berkala.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
