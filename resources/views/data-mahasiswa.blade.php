<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Mahasiswa - SKPI Informatika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .academic-glass {
                @apply bg-white/80 backdrop-blur-xl border border-slate-200/60 shadow-[0_8px_30px_rgb(0,0,0,0.04)];
            }
            .bento-card {
                @apply bg-white rounded-[1.5rem] border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen relative overflow-x-hidden font-sans antialiased selection:bg-blue-200 selection:text-blue-900">
    
    <!-- Subtle Background Accent -->
    <div class="fixed top-0 left-0 w-full h-96 bg-gradient-to-b from-blue-100/50 to-transparent z-0 pointer-events-none"></div>

    <!-- Floating Navbar -->
    <nav class="sticky top-6 z-50 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 transition-all">
        <div class="academic-glass rounded-2xl px-8 py-4 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex items-center gap-3 mb-4 sm:mb-0">
                <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-lg shadow-blue-600/20">
                    <span class="text-white font-bold text-sm">UM</span>
                </div>
                <div>
                    <div class="font-extrabold text-lg tracking-tight text-slate-900 leading-tight">
                        SKPI Informatika
                    </div>
                    <div class="text-xs font-medium text-slate-500 uppercase tracking-wider">Universitas Muhammadiyah Banjarmasin</div>
                </div>
            </div>
            
            <div class="flex items-center space-x-2 sm:space-x-6 text-sm font-semibold">
                <!-- Menu Admin -->
                <a href="{{ route('data-mahasiswa') }}" class="px-4 py-2 rounded-xl bg-blue-600 text-white shadow-md shadow-blue-600/20">Master Mahasiswa</a>
                <a href="{{ route('data-kategori') }}" class="px-3 py-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition-all">Master Kategori</a>
                <a href="{{ route('data-riwayat') }}" class="px-3 py-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition-all">Data Transaksi</a>
                
                <div class="h-6 w-px bg-slate-200 mx-2 hidden sm:block"></div>

                <div class="flex items-center gap-4 pl-2">
                    <div class="hidden sm:block text-right">
                        <div class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">Logged in as</div>
                        <div class="text-slate-700 font-bold truncate max-w-[150px]">{{ Auth::user()->name }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="p-2 rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100 border border-rose-100 transition-all group flex items-center gap-2" title="Logout">
                            <span class="text-xs font-bold hidden md:block">LOGOUT</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8 pb-24">
        
        <!-- Header & CTA -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-6">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 mb-2">Master Mahasiswa</h1>
                <p class="text-slate-500 text-base font-medium">Kelola biodata mahasiswa yang berhak mengakses sistem SKPI.</p>
            </div>
            <a href="{{ route('tambah-mahasiswa') }}" class="group flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/30 hover:shadow-blue-600/40">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                Tambah Mahasiswa
            </a>
        </div>
        
        <!-- Bento Grid: Main Table -->
        <div class="bento-card overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-800">Daftar Mahasiswa Terdaftar</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead>
                        <tr class="bg-white text-slate-500 text-xs uppercase tracking-wider border-b border-slate-100">
                            <th class="py-4 px-6 font-bold">No</th>
                            <th class="py-4 px-6 font-bold">Nama Lengkap</th>
                            <th class="py-4 px-6 font-bold">NIM</th>
                            <th class="py-4 px-6 font-bold text-center">Prodi</th>
                            <th class="py-4 px-6 font-bold text-center">Semester</th>
                            <th class="py-4 px-6 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <!-- Asumsi variabel yang dikirim dari controller adalah $data atau $mahasiswas -->
                        @forelse($data as $key => $item)
                        <tr class="border-b border-slate-50 hover:bg-slate-50/80 transition-colors group">
                            <td class="py-4 px-6 text-slate-400 font-semibold">{{ sprintf('%02d', $key + 1) }}</td>
                            <td class="py-4 px-6 font-bold text-slate-800">{{ $item->nama_lengkap ?? $item->nama }}</td>
                            <td class="py-4 px-6 font-mono text-blue-600 font-semibold">{{ $item->nim }}</td>
                            <td class="py-4 px-6 text-center text-slate-600 font-medium">{{ $item->program_studi }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="inline-flex items-center justify-center px-3 py-1 rounded-lg bg-slate-100 text-slate-700 font-bold border border-slate-200">
                                    {{ $item->semester_aktif }} </span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('edit-mahasiswa', $item->id) }}" class="flex items-center justify-center px-3 py-1.5 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-500 hover:text-white border border-amber-200 transition-all text-xs font-bold">
                                        EDIT
                                    </a>
                                    <form action="{{ route('hapus-mahasiswa', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-center px-3 py-1.5 rounded-lg bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white border border-rose-200 transition-all text-xs font-bold">
                                            HAPUS
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-16 text-center">
                                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-50 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                                <div class="text-slate-700 text-base font-bold mb-1">Data Mahasiswa Kosong</div>
                                <div class="text-sm text-slate-500">Klik tombol "Tambah Mahasiswa" untuk memasukkan data baru.</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>