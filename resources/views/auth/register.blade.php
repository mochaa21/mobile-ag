<!-- Mochammad Syahid Fariz Abqari -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun - SKPI Informatika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f0f4f8] text-slate-800 min-h-screen flex items-center justify-center p-4 sm:p-8 antialiased selection:bg-blue-200 selection:text-blue-900 relative overflow-hidden">

    <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] bg-blue-400/20 rounded-full mix-blend-multiply filter blur-[80px]"></div>
    <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] bg-indigo-400/20 rounded-full mix-blend-multiply filter blur-[80px]"></div>

    <div class="w-full max-w-5xl bg-white rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] flex flex-col md:flex-row overflow-hidden relative z-10 border border-white">
        
        <div class="w-full md:w-5/12 bg-gradient-to-br from-indigo-700 via-blue-600 to-blue-800 p-10 lg:p-12 text-white flex flex-col justify-between relative overflow-hidden hidden md:flex">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>

            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold tracking-tight mb-3">Aktivasi Akun SKPI</h2>
                <p class="text-blue-100 font-medium leading-relaxed opacity-90">Pembuatan akun akses mandiri untuk mahasiswa Informatika Universitas Muhammadiyah Banjarmasin.</p>
            </div>

            <div class="relative z-10 mt-12 mb-8 md:mb-0 space-y-4">
                <div class="flex items-start gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                    <div class="w-8 h-8 rounded-full bg-emerald-400/30 flex items-center justify-center text-sm shrink-0 mt-0.5">✓</div>
                    <div>
                        <div class="font-bold text-sm">Validasi Data Otomatis</div>
                        <div class="text-xs text-blue-100/70 mt-1">Pastikan Nama Lengkap dan NIM sesuai dengan data Master di sistem.</div>
                    </div>
                </div>
                <div class="flex items-start gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                    <div class="w-8 h-8 rounded-full bg-indigo-400/30 flex items-center justify-center text-sm shrink-0 mt-0.5">🔒</div>
                    <div>
                        <div class="font-bold text-sm">Keamanan Transaksi</div>
                        <div class="text-xs text-blue-100/70 mt-1">Akun ini mengikat riwayat prestasi yang Anda inputkan ke SKPI.</div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-8 md:mt-0 text-xs font-medium text-blue-200/60">
                &copy; {{ date('Y') }} SKPI Informatika UMBJM
            </div>
        </div>

        <div class="w-full md:w-7/12 p-8 sm:p-10 lg:p-12 flex flex-col justify-center bg-white h-full max-h-screen overflow-y-auto">
            <div class="mb-8">
                <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Buat Akun Baru</h1>
                <p class="text-slate-500 font-medium text-sm">Lengkapi data berikut untuk mendaftar ke portal.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Nama Sesuai Data</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3 text-slate-900 text-sm font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="Budi Santoso">
                        @error('name')
                            <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="nim" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">NIM Mahasiswa</label>
                        <input id="nim" type="text" name="nim" value="{{ old('nim') }}" required class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3 text-slate-900 text-sm font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="2455201110...">
                        @error('nim')
                            <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Email Aktif</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3 text-slate-900 text-sm font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="email@contoh.com">
                    @error('email')
                        <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="password" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Password Baru</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3 text-slate-900 text-sm font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="Minimal 8 karakter">
                        @error('password')
                            <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3 text-slate-900 text-sm font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="Ulangi password">
                        @error('password_confirmation')
                            <span class="text-xs text-rose-500 font-bold mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 active:scale-[0.98] shadow-lg shadow-blue-600/30 transition-all text-center tracking-wide mt-4">
                    DAFTARKAN AKUN
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-sm font-semibold text-slate-500">
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 transition-colors ml-1">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
    
</body>
</html>