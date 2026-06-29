<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - SKPI Informatika</title>
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
    
    <div class="fixed top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-100/50 to-transparent z-0 pointer-events-none"></div>

    <nav class="sticky top-6 z-50 mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 transition-all">
        <div class="academic-glass rounded-2xl px-8 py-4 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex items-center gap-3 mb-4 sm:mb-0">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
                    <span class="text-white font-bold text-sm">UM</span>
                </div>
                <div>
                    <div class="font-extrabold text-lg tracking-tight text-slate-900 leading-tight">SKPI Informatika</div>
                    <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Form Master Kategori</div>
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

    <main class="relative z-10 max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8 pb-24">
        
        <div class="mb-8 text-center sm:text-left">
            <a href="{{ route('data-kategori') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Master Kategori
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Tambah Kategori Baru</h1>
            <p class="text-slate-500 text-base font-medium">Buat acuan tingkat kompetisi dan poin SKPI yang berlaku di program studi.</p>
        </div>

        <div class="bento-card overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
                <h2 class="text-lg font-bold text-slate-800">Detail Kategori Prestasi</h2>
            </div>
            
            <div class="p-6 sm:p-8">
                <form action="{{ route('store-kategori') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="md:col-span-2">
                            <label for="nama_kategori" class="form-label">Nama Kategori Kegiatan</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-input border border-slate-200" placeholder="Contoh: Lomba Web Design, Seminar Akademik, dll" required value="{{ old('nama_kategori') }}">
                            @error('nama_kategori')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="tingkat" class="form-label">Tingkat Prestasi</label>
                            <select name="tingkat" id="tingkat" class="form-input border border-slate-200" required>
                                <option value="" disabled selected>-- Pilih Tingkat --</option>
                                <option value="Fakultas">Tingkat Fakultas</option>
                                <option value="Universitas">Tingkat Universitas</option>
                                <option value="Provinsi">Tingkat Provinsi</option>
                                <option value="Nasional">Tingkat Nasional</option>
                                <option value="Internasional">Tingkat Internasional</option>
                            </select>
                            @error('tingkat')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                        <div>
                            <label for="poin_skpi" class="form-label">Bobot Poin SKPI</label>
                            <input type="number" name="poin_skpi" id="poin_skpi" class="form-input border border-slate-200" placeholder="Contoh: 30" required min="1" value="{{ old('poin_skpi') }}">
                            @error('poin_skpi')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="{{ route('data-kategori') }}" class="px-6 py-3 rounded-xl font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-colors text-center">Batal</a>
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40 transition-all text-center">Simpan Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>