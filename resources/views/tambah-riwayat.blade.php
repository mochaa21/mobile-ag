<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Prestasi - SKPI Informatika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .academic-glass {
                @apply bg-white/80 backdrop-blur-xl border border-slate-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)];
            }
            .bento-card {
                @apply bg-white rounded-[1.5rem] border border-slate-100 shadow-sm;
            }
            .form-input {
                @apply w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 transition-all outline-none;
            }
            .form-label {
                @apply block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen relative font-sans antialiased selection:bg-blue-200 selection:text-blue-900">
    
    <!-- Subtle Background Accent -->
    <div class="fixed top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-100/50 to-transparent z-0 pointer-events-none"></div>

    <!-- Floating Navbar -->
    <nav class="sticky top-6 z-50 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 transition-all">
        <div class="academic-glass rounded-2xl px-8 py-4 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex items-center gap-3 mb-4 sm:mb-0">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
                    <span class="text-white font-bold text-sm">UM</span>
                </div>
                <div>
                    <div class="font-extrabold text-lg tracking-tight text-slate-900 leading-tight">
                        SKPI Informatika
                    </div>
                    <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Form Input Data</div>
                </div>
            </div>
            
            <div class="flex items-center space-x-4 text-sm font-semibold">
                <div class="text-right">
                    <div class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Logged in as</div>
                    <div class="text-slate-700 font-bold">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8 pb-24">
        
        <!-- Header -->
        <div class="mb-8 text-center sm:text-left">
            <a href="{{ route('data-riwayat') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Data Transaksi
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Input Prestasi Baru</h1>
            <p class="text-slate-500 text-base font-medium">Lengkapi formulir di bawah ini untuk merekam data prestasi akademik atau non-akademik.</p>
        </div>

        <!-- Form Card -->
        <div class="bento-card overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h2 class="text-lg font-bold text-slate-800">Formulir Data SKPI</h2>
            </div>
            
            <div class="p-6 sm:p-8">
                <form action="{{ route('store-riwayat') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6">
                        
                        <!-- Dropdown Mahasiswa -->
                        <div>
                            <label for="mahasiswa_id" class="form-label">Nama Mahasiswa</label>
                            <select name="mahasiswa_id" id="mahasiswa_id" class="form-input border border-slate-200" required>
                                <option value="" disabled selected>-- Pilih Mahasiswa --</option>
                                <!-- Ingat: Controller akan memfilter ini otomatis (Mahasiswa cuma lihat namanya sendiri, Admin lihat semua) -->
                                @foreach($mahasiswas as $mhs)
                                    <option value="{{ $mhs->id }}">{{ $mhs->nama_lengkap }} (NIM: {{ $mhs->nim }})</option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')
                                <span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Dropdown Kategori -->
                        <div>
                            <label for="kategori_id" class="form-label">Kategori Prestasi</label>
                            <select name="kategori_id" id="kategori_id" class="form-input border border-slate-200" required>
                                <option value="" disabled selected>-- Pilih Kategori & Tingkat --</option>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id }}">
                                        {{ $kat->nama_kategori }} - Tingkat {{ $kat->tingkat }} (+{{ $kat->poin_skpi }} Poin)
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nama Kompetisi -->
                        <div>
                            <label for="nama_kompetisi" class="form-label">Nama Kompetisi / Kegiatan</label>
                            <input type="text" name="nama_kompetisi" id="nama_kompetisi" class="form-input border border-slate-200" placeholder="Contoh: Lomba Web Design Nasional 2026" required value="{{ old('nama_kompetisi') }}">
                            @error('nama_kompetisi')
                                <span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Penyelenggara -->
                        <div>
                            <label for="penyelenggara" class="form-label">Instansi Penyelenggara</label>
                            <input type="text" name="penyelenggara" id="penyelenggara" class="form-input border border-slate-200" placeholder="Contoh: Universitas Gadjah Mada" required value="{{ old('penyelenggara') }}">
                            @error('penyelenggara')
                                <span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" id="tanggal_kegiatan" class="form-input border border-slate-200" required value="{{ old('tanggal_kegiatan') }}">
                            @error('tanggal_kegiatan')
                                <span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>

                    <!-- Footer / Buttons -->
                    <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="{{ route('data-riwayat') }}" class="px-6 py-3 rounded-xl font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-colors text-center">
                            Batal
                        </a>
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40 transition-all text-center">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>