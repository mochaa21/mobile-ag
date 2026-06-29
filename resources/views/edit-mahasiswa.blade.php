<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa - SKPI Informatika</title>
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
<body class="bg-slate-50 text-slate-800 min-h-screen relative font-sans antialiased">
    
    <div class="fixed top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-100/50 to-transparent z-0 pointer-events-none"></div>

    <main class="relative z-10 max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8 pb-24">
        
        <div class="mb-8 text-center sm:text-left">
            <a href="{{ route('data-mahasiswa') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Master Mahasiswa
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Edit Biodata Mahasiswa</h1>
        </div>

        <div class="bento-card overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('update-mahasiswa', $data->id) }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="md:col-span-2">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-input" required value="{{ $data->nama_lengkap ?? $data->nama }}">
                        </div>

                        <div>
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-input" required value="{{ $data->nim }}">
                        </div>

                        <div>
                            <label for="program_studi" class="form-label">Program Studi</label>
                            <select name="program_studi" id="program_studi" class="form-input" required>
                                <option value="Informatika" {{ $data->program_studi == 'Informatika' ? 'selected' : '' }}>S1 Informatika</option>
                                <option value="Sistem Informasi" {{ $data->program_studi == 'Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                                <option value="Teknik Sipil" {{ $data->program_studi == 'Teknik Sipil' ? 'selected' : '' }}>S1 Teknik Sipil</option>
                            </select>
                        </div>

                        <div>
                            <label for="semester_aktif" class="form-label">Semester Aktif</label>
                            <select name="semester_aktif" id="semester_aktif" class="form-input" required>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" {{ $data->semester_aktif == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end gap-3">
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 transition-all">Update Biodata</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>