<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - SKPI Informatika</title>
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
            <a href="{{ route('data-kategori') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Master Kategori
            </a>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Edit Kategori</h1>
        </div>

        <div class="bento-card overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('update-kategori', $data->id) }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="nama_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-input" required value="{{ $data->nama_kategori }}">
                        </div>

                        <div>
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <select name="tingkat" id="tingkat" class="form-input" required>
                                <option value="Fakultas" {{ $data->tingkat == 'Fakultas' ? 'selected' : '' }}>Fakultas</option>
                                <option value="Universitas" {{ $data->tingkat == 'Universitas' ? 'selected' : '' }}>Universitas</option>
                                <option value="Provinsi" {{ $data->tingkat == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                <option value="Nasional" {{ $data->tingkat == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                <option value="Internasional" {{ $data->tingkat == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                            </select>
                        </div>

                        <div>
                            <label for="poin_skpi" class="form-label">Poin SKPI</label>
                            <input type="number" name="poin_skpi" id="poin_skpi" class="form-input" required min="1" value="{{ $data->poin_skpi }}">
                        </div>
                    </div>

                    <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end gap-3">
                        <button type="submit" class="px-8 py-3 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 transition-all">Update Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>