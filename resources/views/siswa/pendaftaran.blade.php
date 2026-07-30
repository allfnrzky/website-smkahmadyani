<x-app-layout title="Pendaftaran PPDB">
    <x-slot name="header">
        <h2 class="text-lg font-black text-gray-800 tracking-tighter uppercase">Pendaftaran PPDB</h2>
    </x-slot>

    <div class="py-6 md:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                <div class="bg-[#8B5CF6] p-8 text-white">
                    <h1 class="text-2xl font-bold uppercase tracking-tighter">
                        {{ $pendaftaran ? 'Data Pendaftaran Anda' : 'Formulir Pendaftaran PPDB' }}
                    </h1>
                    <p class="text-purple-100 text-sm mt-1">
                        {{ $pendaftaran ? 'Berikut adalah rincian data lengkap yang telah Anda kirimkan.' : 'Lengkapi data sesuai dokumen resmi Anda.' }}
                    </p>
                </div>

                <div class="p-8">
                    @if($pendaftaran && $pendaftaran->status == 'lulus')
                        <!-- TAMPILAN DITERIMA (READ-ONLY) -->
                        <div class="space-y-10">
                            <div class="bg-green-50 border-2 border-green-200 rounded-3xl p-8 text-center">
                                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-4xl">
                                    <i class="fa-solid fa-check-circle"></i>
                                </div>
                                <h3 class="text-2xl font-black text-green-700 uppercase tracking-tighter mb-2">Selamat! Kamu Diterima</h3>
                                <p class="text-green-600 font-bold text-lg">
                                    Di Jurusan <span class="underline">{{ $pendaftaran->jurusanDiterima->nama ?? 'N/A' }}</span>
                                </p>
                                <p class="text-green-500 text-sm mt-2">Nomor Pendaftaran: {{ $pendaftaran->no_pendaftaran }}</p>
                            </div>

                            <!-- 1. Data Akademik -->
                            <section>
                                <h2 class="text-lg font-black text-gray-800 mb-4 flex items-center gap-2 border-b-2 border-purple-100 pb-2 uppercase tracking-tight">
                                    <i class="fa-solid fa-graduation-cap text-[#8B5CF6]"></i> Data Akademik
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-3">
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">Jenis Pendaftaran</span>
                                        <span class="font-bold uppercase">{{ $pendaftaran->jenis_pendaftaran }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">NISN</span>
                                        <span class="font-bold">{{ $pendaftaran->nisn }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">Asal Sekolah</span>
                                        <span class="font-bold uppercase">{{ $pendaftaran->asal_sekolah }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">Tahun Lulus</span>
                                        <span class="font-bold">{{ $pendaftaran->tahun_lulus }}</span>
                                    </div>
                                </div>
                            </section>

                            <!-- 2. Identitas Siswa -->
                            <section>
                                <h2 class="text-lg font-black text-gray-800 mb-4 flex items-center gap-2 border-b-2 border-purple-100 pb-2 uppercase tracking-tight">
                                    <i class="fa-solid fa-user text-[#8B5CF6]"></i> Identitas Pribadi
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-3">
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50 md:col-span-2">
                                        <span class="text-gray-500">Nama Lengkap</span>
                                        <span class="font-bold uppercase">{{ $pendaftaran->nama_lengkap }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">NIK</span>
                                        <span class="font-bold">{{ $pendaftaran->nik }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">Jenis Kelamin</span>
                                        <span class="font-bold">{{ $pendaftaran->jk == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50 md:col-span-2">
                                        <span class="text-gray-500">Tempat, Tanggal Lahir</span>
                                        <span class="font-bold uppercase">{{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y') }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50 md:col-span-2">
                                        <span class="text-gray-500">Alamat Lengkap</span>
                                        <span class="font-bold uppercase text-right">{{ $pendaftaran->alamat }}, RT {{ $pendaftaran->rtrw }}, DESA {{ $pendaftaran->desa }}, KEC. {{ $pendaftaran->kecamatan }}, {{ $pendaftaran->kabupaten }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">No. WhatsApp</span>
                                        <span class="font-bold">{{ $pendaftaran->no_hp }}</span>
                                    </div>
                                    <div class="flex justify-between text-sm py-1 border-b border-gray-50">
                                        <span class="text-gray-500">Email</span>
                                        <span class="font-bold">{{ $pendaftaran->email_siswa }}</span>
                                    </div>
                                </div>
                            </section>

                            <!-- Download Bukti -->
                            <div class="mb-8">
                                <a href="{{ route('siswa.cetak-bukti') }}" class="bg-[#8B5CF6] text-white px-8 py-4 rounded-2xl font-black hover:bg-[#7C3AED] transition shadow-lg inline-flex items-center gap-2">
                                    <i class="fa-solid fa-file-pdf"></i>
                                    Download Formulir Daftar Ulang (PDF)
                                </a>
                                <p class="text-xs text-gray-400 mt-4 italic">* Silakan download, cetak, dan bawa bukti ini saat daftar ulang di sekolah.</p>
                            </div>
                        </div>

                    @elseif($pendaftaran && $pendaftaran->status == 'proses')
                        @php $formMode = 'edit'; @endphp
                        <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 mb-8 flex items-center gap-3 text-sm">
                            <i class="fa-solid fa-clock text-yellow-600"></i>
                            <span class="text-yellow-700 font-bold">Status pendaftaran masih diproses. Kamu bisa mengubah data di bawah ini.</span>
                        </div>

                    @else
                        @php $formMode = 'create'; @endphp
                    @endif

                    @if(!$pendaftaran || $pendaftaran->status == 'proses')
                        <form action="{{ $formMode == 'edit' ? route('ppdb.update', $pendaftaran->id) : route('ppdb.daftar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($formMode == 'edit') @method('PUT') @endif

                            <!-- 1. DATA AKADEMIK -->
                            <div class="mb-12">
                                <h2 class="text-lg font-black text-gray-800 mb-6 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-purple-100 text-[#8B5CF6] rounded-full flex items-center justify-center text-sm">1</span>
                                    Data Akademik & Sekolah Asal
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Jenis Pendaftaran</label>
                                        <select name="jenis_pendaftaran" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                            <option value="baru" @selected(old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran ?? '') == 'baru')>Siswa Baru</option>
                                            <option value="pindahan" @selected(old('jenis_pendaftaran', $pendaftaran->jenis_pendaftaran ?? '') == 'pindahan')>Pindahan</option>
                                        </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">NISN (10 Digit)</label>
                                        <input type="text" name="nisn" value="{{ old('nisn', $pendaftaran->nisn ?? '') }}" required maxlength="10" class="w-full rounded-xl border-gray-300 px-4 py-3" placeholder="0012345678">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Tahun Lulus</label>
                                        <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus', $pendaftaran->tahun_lulus ?? '') }}" required maxlength="4" class="w-full rounded-xl border-gray-300 px-4 py-3" placeholder="2024">
                                    </div>
                                </div>
                            </div>

                            <!-- 2. IDENTITAS SISWA -->
                            <div class="mb-12">
                                <h2 class="text-lg font-black text-gray-800 mb-6 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-purple-100 text-[#8B5CF6] rounded-full flex items-center justify-center text-sm">2</span>
                                    Identitas Lengkap Siswa
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="md:col-span-2 space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                     </div>
                                     <div class="space-y-2">
                                         <label class="text-sm font-bold text-gray-700">NIK (16 Digit)</label>
                                         <input type="text" name="nik" value="{{ old('nik', $pendaftaran->nik ?? '') }}" required maxlength="16" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Jenis Kelamin</label>
                                        <select name="jk" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="L" @selected(old('jk', $pendaftaran->jk ?? '') == 'L')>Laki-laki</option>
                                             <option value="P" @selected(old('jk', $pendaftaran->jk ?? '') == 'P')>Perempuan</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                    <div class="md:col-span-2 space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Alamat Rumah (Jalan/Dusun)</label>
                                        <input type="text" name="alamat" value="{{ old('alamat', $pendaftaran->alamat ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="text-sm font-bold text-gray-700">RT/RW</label>
                                            <input type="text" name="rtrw" value="{{ old('rtrw', $pendaftaran->rtrw ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3" placeholder="001/002">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="text-sm font-bold text-gray-700">Desa/Kelurahan</label>
                                            <input type="text" name="desa" value="{{ old('desa', $pendaftaran->desa ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Kecamatan</label>
                                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $pendaftaran->kecamatan ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Kabupaten/Kota</label>
                                        <input type="text" name="kabupaten" value="{{ old('kabupaten', $pendaftaran->kabupaten ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">No. HP Aktif</label>
                                        <input type="number" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Email Siswa</label>
                                        <input type="email" name="email_siswa" value="{{ old('email_siswa', $pendaftaran->email_siswa ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                </div>
                            </div>

                            <!-- 3. DATA ORANG TUA (IBU) -->
                            <div class="mb-12 p-6 bg-purple-50 rounded-3xl border border-purple-100">
                                <h2 class="text-lg font-black text-[#8B5CF6] mb-6 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-white text-[#8B5CF6] rounded-full flex items-center justify-center text-sm">3</span>
                                    Data Ibu Kandung
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Nama Lengkap Ibu</label>
                                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $pendaftaran->nama_ibu ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Status Ibu</label>
                                        <select name="status_ibu" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="hidup" @selected(old('status_ibu', $pendaftaran->status_ibu ?? '') == 'hidup')>Masih Hidup</option>
                                             <option value="meninggal" @selected(old('status_ibu', $pendaftaran->status_ibu ?? '') == 'meninggal')>Sudah Meninggal</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">No. HP Ibu</label>
                                        <input type="number" name="hp_ibu" value="{{ old('hp_ibu', $pendaftaran->hp_ibu ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Pekerjaan Ibu</label>
                                        <input type="text" name="kerja_ibu" value="{{ old('kerja_ibu', $pendaftaran->kerja_ibu ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Gaji Ibu</label>
                                        <select name="gaji_ibu" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="< 1jt" @selected(old('gaji_ibu', $pendaftaran->gaji_ibu ?? '') == '< 1jt')>< Rp 1.000.000</option>
                                             <option value="1jt - 3jt" @selected(old('gaji_ibu', $pendaftaran->gaji_ibu ?? '') == '1jt - 3jt')>Rp 1.000.000 - Rp 3.000.000</option>
                                             <option value="> 3jt" @selected(old('gaji_ibu', $pendaftaran->gaji_ibu ?? '') == '> 3jt')>> Rp 3.000.000</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Alamat Ibu</label>
                                        <input type="text" name="alamat_ibu" value="{{ old('alamat_ibu', $pendaftaran->alamat_ibu ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="md:col-span-2 space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Scan KTP Ibu (JPG/PNG)</label>
                                        <input type="file" name="ktp_ibu" accept=".jpg,.jpeg,.png" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-purple-100 file:text-purple-700">
                                    </div>
                                </div>
                            </div>

                            <!-- 4. DATA ORANG TUA (AYAH) -->
                            <div class="mb-12 p-6 bg-blue-50 rounded-3xl border border-blue-100">
                                <h2 class="text-lg font-black text-blue-600 mb-6 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-white text-blue-600 rounded-full flex items-center justify-center text-sm">4</span>
                                    Data Ayah Kandung
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Nama Lengkap Ayah</label>
                                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $pendaftaran->nama_ayah ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Status Ayah</label>
                                        <select name="status_ayah" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="hidup" @selected(old('status_ayah', $pendaftaran->status_ayah ?? '') == 'hidup')>Masih Hidup</option>
                                             <option value="meninggal" @selected(old('status_ayah', $pendaftaran->status_ayah ?? '') == 'meninggal')>Sudah Meninggal</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">No. HP Ayah</label>
                                        <input type="number" name="hp_ayah" value="{{ old('hp_ayah', $pendaftaran->hp_ayah ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Pekerjaan Ayah</label>
                                        <input type="text" name="kerja_ayah" value="{{ old('kerja_ayah', $pendaftaran->kerja_ayah ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Gaji Ayah</label>
                                        <select name="gaji_ayah" class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="< 1jt" @selected(old('gaji_ayah', $pendaftaran->gaji_ayah ?? '') == '< 1jt')>< Rp 1.000.000</option>
                                             <option value="1jt - 3jt" @selected(old('gaji_ayah', $pendaftaran->gaji_ayah ?? '') == '1jt - 3jt')>Rp 1.000.000 - Rp 3.000.000</option>
                                             <option value="> 3jt" @selected(old('gaji_ayah', $pendaftaran->gaji_ayah ?? '') == '> 3jt')>> Rp 3.000.000</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Alamat Ayah</label>
                                        <input type="text" name="alamat_ayah" value="{{ old('alamat_ayah', $pendaftaran->alamat_ayah ?? '') }}" required class="w-full rounded-xl border-gray-300 px-4 py-3 uppercase-input">
                                    </div>
                                    <div class="md:col-span-2 space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Scan KTP Ayah (JPG/PNG)</label>
                                        <input type="file" name="ktp_ayah" accept=".jpg,.jpeg,.png" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-100 file:text-blue-700">
                                    </div>
                                </div>
                            </div>

                            <!-- 5. JURUSAN & BERKAS -->
                            <div class="mb-12">
                                <h2 class="text-lg font-black text-gray-800 mb-6 flex items-center gap-2">
                                    <span class="w-8 h-8 bg-purple-100 text-[#8B5CF6] rounded-full flex items-center justify-center text-sm">5</span>
                                    Jurusan, Seragam & Berkas
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Pilihan Jurusan 1</label>
                                        <select name="jurusan_1" id="jurusan_1" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="">-- Pilih Jurusan --</option>
                                             @foreach($jurusan as $j)
                                                 <option value="{{ $j->id }}" @selected(old('jurusan_1', $pendaftaran->jurusan_1 ?? '') == $j->id)>{{ $j->nama }}</option>
                                             @endforeach
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Pilihan Jurusan 2</label>
                                        <select name="jurusan_2" id="jurusan_2" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="">-- Pilih Jurusan --</option>
                                             @foreach($jurusan as $j)
                                                 <option value="{{ $j->id }}" @selected(old('jurusan_2', $pendaftaran->jurusan_2 ?? '') == $j->id)>{{ $j->nama }}</option>
                                             @endforeach
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Alasan Pilihan 1</label>
                                         <textarea name="alasan_jurusan_1" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm" placeholder="Mengapa memilih jurusan ini?">{{ old('alasan_jurusan_1', $pendaftaran->alasan_jurusan_1 ?? '') }}</textarea>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Alasan Pilihan 2</label>
                                         <textarea name="alasan_jurusan_2" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm" placeholder="Mengapa memilih jurusan ini?">{{ old('alasan_jurusan_2', $pendaftaran->alasan_jurusan_2 ?? '') }}</textarea>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Ukuran Seragam</label>
                                        <select name="ukuran_seragam" required class="w-full rounded-xl border-gray-300 px-4 py-3">
                                             <option value="S" @selected(old('ukuran_seragam', $pendaftaran->ukuran_seragam ?? '') == 'S')>S</option>
                                             <option value="M" @selected(old('ukuran_seragam', $pendaftaran->ukuran_seragam ?? '') == 'M')>M</option>
                                             <option value="L" @selected(old('ukuran_seragam', $pendaftaran->ukuran_seragam ?? '') == 'L')>L</option>
                                             <option value="XL" @selected(old('ukuran_seragam', $pendaftaran->ukuran_seragam ?? '') == 'XL')>XL</option>
                                             <option value="XXL" @selected(old('ukuran_seragam', $pendaftaran->ukuran_seragam ?? '') == 'XXL')>XXL</option>
                                         </select>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Scan Kartu Keluarga (KK)</label>
                                        <input type="file" name="file_kk" required accept=".jpg,.jpeg,.png,.pdf" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-bold text-gray-700">Scan Ijazah / SKL</label>
                                        <input type="file" name="file_ijazah" required accept=".jpg,.jpeg,.png,.pdf" class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6 flex justify-end">
                                <button type="submit" class="w-full md:w-auto bg-[#8B5CF6] text-white px-12 py-4 rounded-2xl font-black hover:bg-[#7C3AED] transition shadow-lg uppercase">
                                    {{ $formMode == 'edit' ? 'Simpan Perubahan' : 'Kirim Data Pendaftaran' }}
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.uppercase-input').forEach(input => {
                input.addEventListener('input', function() {
                    this.value = this.value.toUpperCase();
                });
            });


        });
    </script>
</x-app-layout>
