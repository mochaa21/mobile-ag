<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - SKPI Informatika</title>
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
                    <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Form Master Data</div>
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
            <a href="{{ route('data-mahasiswa') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Master Mahasiswa
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Tambah Mahasiswa Baru</h1>
            <p class="text-slate-500 text-base font-medium">Masukkan biodata mahasiswa untuk memberikan akses ke sistem SKPI.</p>
        </div>

        <div class="bento-card overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <h2 class="text-lg font-bold text-slate-800">Biodata Mahasiswa</h2>
            </div>
            
            <div class="p-6 sm:p-8">
                <form action="{{ route('store-mahasiswa') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Nama Lengkap -->
                        <div class="md:col-span-2">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap Sesuai KTP/KTM</label>
                            <!-- Note: Sesuaikan 'nama_lengkap' dengan nama kolom di database lu (misal: 'nama') jika berbeda -->
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-input border border-slate-200" placeholder="Contoh: Budi Santoso" required value="{{ old('nama_lengkap') }}">
                            @error('nama_lengkap')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                        <!-- NIM -->
                        <div>
                            <label for="nim" class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                            <input type="text" name="nim" id="nim" class="form-input border border-slate-200" placeholder="Contoh: 2455201110009" required value="{{ old('nim') }}">
                            @error('nim')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                        <!-- Program Studi -->
                        <div>
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select name="program_studi" id="program_studi" class="form-input border border-slate-200" required>
                                <option value="" disabled selected>-- Pilih Program Studi --</option>
                                <option value="Informatika">S1 Informatika</option>
                                <option value="Sistem Informasi">S1 Sistem Informasi</option>
                                <option value="Teknik Sipil">S1 Teknik Sipil</option>
                            </select>
                            @error('program_studi')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                        <!-- Semester -->
                        <div>
                            <label for="semester_aktif" class="form-label">Semester Aktif</label>
                            <select name="semester_aktif" id="semester_aktif" class="form-input border border-slate-200" required>
                                <option value="" disabled selected>-- Pilih Semester --</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8+</option>
                            </select>
                            @error('semester_aktif')<span class="text-xs text-rose-500 font-semibold mt-1">{{ $message }}</span>@enderror
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col-reverse sm:flex-row justify-end gap-3">
                        <a href="{{ route('data-mahasiswa') }}" class="px-6 py-3 rounded-xl font-bold text-slate-500 bg-slate-100 hover:bg-slate-200 transition-colors text-center">Batal</a>
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40 transition-all text-center">Simpan Biodata</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>