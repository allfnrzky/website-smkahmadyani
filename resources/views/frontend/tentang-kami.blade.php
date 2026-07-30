@extends('layouts.frontend')

@section('content')
<!-- Header Section -->
<div class="bg-[#8B5CF6] py-16">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h1 class="text-4xl font-bold italic">Tentang Kami</h1>
        <p class="mt-2 text-purple-100">Kenali lebih dekat SMK Ahmad Yani Jabung</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-12">
    <!-- Deskripsi Singkat -->
    <div class="mb-20 text-center max-w-4xl mx-auto">
        <p class="text-gray-600 leading-relaxed text-lg">
            SMK Ahmad Yani Jabung adalah lembaga pendidikan kejuruan yang berkomitmen untuk mencetak lulusan kompeten di bidangnya, siap bersaing di dunia industri maupun berwirausaha dengan landasan karakter yang kuat.
        </p>
    </div>

    <!-- VISI & MISI (Sekarang Rata Tengah) -->
    <div class="flex flex-col gap-12 mb-20 max-w-5xl mx-auto text-center">
        <!-- Visi -->
        <div class="bg-white p-10 rounded-[40px] shadow-sm border-t-8 border-[#8B5CF6]">
            <h2 class="text-3xl font-black text-gray-800 mb-6 uppercase tracking-widest">Visi</h2>
                <p class="mb-2">1. Tercapainya <span class="text-[#8B5CF6] font-black text-3xl uppercase">UNGU</span></p>
                <p>2. Menuju manusia prod<span class="text-[#8B5CF6] font-black text-2xl uppercase">U</span>ktif, sa<span class="text-[#8B5CF6] font-black text-2xl uppercase">N</span>tun, a<span class="text-[#8B5CF6] font-black text-2xl uppercase">G</span>amis, berb<span class="text-[#8B5CF6] font-black text-2xl uppercase">U</span>daya</p>
        </div>

        <!-- Misi -->
        <div class="bg-white p-10 rounded-[40px] shadow-sm border-t-8 border-yellow-500">
            <h2 class="text-3xl font-black text-gray-800 mb-8 uppercase tracking-widest">Misi (<span class="text-[#8B5CF6]">U-N-G-U</span>)</h2>
            <div class="space-y-8 text-left">
                <!-- Misi 1 -->
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-xl tracking-tight">
                        1. Prod<span class="text-[#8B5CF6] font-black text-3xl uppercase">U</span>ktif
                    </h3>
                    <p class="text-gray-600 text-sm">Dimaknai sebuah upaya mewujudkan sumber daya manusia mandiri yang berdampak pada proses “berkarya” dengan mendorong peran guru harus mampu manjadi teladan dan penyemangat.</p>
                    <div class="bg-purple-50 p-3 rounded-xl border-l-4 border-purple-200">
                        <p class="text-[11px] font-bold text-purple-700 uppercase tracking-widest">Indikator Ketercapaian:</p>
                        <p class="text-xs text-gray-500 italic">Terwujudnya warga sekolah yang mandiri dengan munculnya jiwa wirausaha</p>
                    </div>
                </div>

                <!-- Misi 2 -->
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-xl tracking-tight">
                        2. Sa<span class="text-[#8B5CF6] font-black text-3xl uppercase">N</span>tun
                    </h3>
                    <p class="text-gray-600 text-sm">Diartikan sebuah pesan karakter budi pekerti seperti dan disiplin yang harus dimiliki oleh seluruh komunitas baik pendidik, tenaga pendidik dan peserta didik dengan selalu mendorong untuk behabituasi dan berinteraksi yang mengedepankan budi pekerti luhur yang berdampak pada perilaku santun dan taat azaz.</p>
                    <div class="bg-purple-50 p-3 rounded-xl border-l-4 border-purple-200">
                        <p class="text-[11px] font-bold text-purple-700 uppercase tracking-widest">Indikator Ketercapaian:</p>
                        <p class="text-xs text-gray-500 italic">Terwujudnya sikap disiplin, mulia dan taat azaz.</p>
                    </div>
                </div>

                <!-- Misi 3 -->
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-xl tracking-tight">
                        3. A<span class="text-[#8B5CF6] font-black text-3xl uppercase">G</span>amis
                    </h3>
                    <p class="text-gray-600 text-sm">Bermakna pada peningkatan kualitas keimanan dan ketaqwaan kepada Allah SWT dengan melakukan pendalaman keagamaan dan melatih ketajaman hati dan menuju pada perilaku amal ibadah sholih dan sholihah.</p>
                    <div class="bg-purple-50 p-3 rounded-xl border-l-4 border-purple-200">
                        <p class="text-[11px] font-bold text-purple-700 uppercase tracking-widest">Indikator Ketercapaian:</p>
                        <p class="text-xs text-gray-500 italic">Mampu melaksanakan ajaran syariat Islam dalam furudul ainiyah (ibadah wajib)</p>
                    </div>
                </div>

                <!-- Misi 4 -->
                <div class="flex flex-col gap-2">
                    <h3 class="font-bold text-gray-800 text-xl tracking-tight">
                        4. Berb<span class="text-[#8B5CF6] font-black text-3xl uppercase">U</span>daya
                    </h3>
                    <p class="text-gray-600 text-sm">Diartikan sebagai upaya menggali, memaknai, menghargai dan melestarikan budaya luhur bangsa.</p>
                    <div class="bg-purple-50 p-3 rounded-xl border-l-4 border-purple-200">
                        <p class="text-[11px] font-bold text-purple-700 uppercase tracking-widest">Indikator Ketercapaian:</p>
                        <p class="text-xs text-gray-500 italic">Terwujudnya budaya disekolah dengan menjaga melestarikan nilai luhur budaya local</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="mb-20">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black text-gray-800">Struktur <span class="text-[#8B5CF6]">Organisasi</span></h2>
            <div class="h-1 w-20 bg-yellow-500 mx-auto mt-2"></div>
        </div>
        <div class="bg-white p-6 rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <img src="{{ asset('images/struktur.png') }}" class="w-full h-auto rounded-xl" alt="Struktur Organisasi SMK Ahmad Yani">
        </div>
    </div>

    <!-- KEBIJAKAN MUTU ORGANISASI (Baru) -->
    <div class="mb-20 bg-[#8B5CF6] p-8 md:p-12 rounded-[50px] text-white">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-black uppercase tracking-tighter italic">Kebijakan Mutu Organisasi</h2>
            <div class="h-1 w-20 bg-yellow-400 mx-auto mt-2"></div>
        </div>
        
        <div class="max-w-4xl mx-auto space-y-6">
            <p class="text-purple-100 text-center leading-relaxed italic">
                "Untuk mewujudkan harapan tersebut sekolah bertekad menjadi lembaga pendidikan dan pelatihan yang berorientasi pada mutu dalam semua kegiatan. Dan layanan pendidikan dan pelatihan, juga selalu mengadakan peninjauan dan pelaksanaan penyempurnaan mutu secara terus menerus serta dikomunikasikan agar dapat memenuhi kepuasan pelanggan atau stakeholders."
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Meningkatkan SDM yang produktif serta memiliki kompetensi nasional dan profesional.</p>
                </div>
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Meningkatkan sumber daya manusia yang santun dan agamis.</p>
                </div>
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Meningkatkan SDM yang berbudaya, dengan menjaga dan melestarikan budaya daerah.</p>
                </div>
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Meningkatkan profesionalisme Tenaga Pendidik dan Kependidikan.</p>
                </div>
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Meningkatkan Kualitas SDM dengan etos kerja berlandaskan Iman dan Taqwa.</p>
                </div>
                <div class="bg-white/10 p-4 rounded-2xl border border-white/20 flex gap-3">
                    <i class="fa-solid fa-check-double text-yellow-300"></i>
                    <p class="text-xs">Menumbuhkembangkan kesadaran belajar mandiri sesuai bidang keahlian masing-masing.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Fasilitas Sekolah -->
        <div class="mb-10">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-800">Fasilitas <span class="text-[#8B5CF6]">Sekolah</span></h2>
                <div class="h-1 w-20 bg-yellow-500 mx-auto mt-2"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Lab Komputer -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/lab-komputer.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Lab Komputer">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Laboratorium Komputer</span>
                    </div>
                </div>

                <!-- Praktik Farmasi -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/praktik-farmasi.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Praktik Farmasi">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Ruang Praktik Farmasi</span>
                    </div>
                </div>

                <!-- Lapangan -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/lapangan.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Lapangan">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Sarana Olahraga</span>
                    </div>
                </div>

                <!-- Ruang Kelas -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/ruang-kelas.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Ruang Kelas">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Ruang Kelas Nyaman</span>
                    </div>
                </div>

                <!-- Ruang BAA -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/ruang-baa.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Ruang BAA">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Ruang BAA</span>
                    </div>
                </div>

                <!-- Area Parkir -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/pintu-masuk-parkir.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Area Parkir">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Akses Masuk & Parkir</span>
                    </div>
                </div>

                <!-- Ruang Tamu -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/ruang-tamu.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Ruang Tamu">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Lobi & Ruang Tamu</span>
                    </div>
                </div>

                <!-- Ruang Rapat -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/ruang-rapat.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Ruang Rapat">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Ruang Rapat</span>
                    </div>
                </div>

                <!-- Ruang Kepala Sekolah -->
                <div class="group relative overflow-hidden rounded-[30px] shadow-lg h-72">
                    <img src="{{ asset('images/fasilitas/ruang-kepsek.jpeg') }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110" alt="Ruang Kepsek">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex items-end justify-center p-8">
                        <span class="text-white font-black text-lg uppercase tracking-tight">Ruang Kepala Sekolah</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection