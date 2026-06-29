<!-- Mochammad Syahid Fariz Abqari -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Terpadu SKPI - UMBJM</title>
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
        
        <div class="w-full md:w-5/12 bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-700 p-10 lg:p-12 text-white flex flex-col justify-between relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-black/10 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3"></div>

            <div class="relative z-10">
                <h2 class="text-4xl font-extrabold tracking-tight mb-3">Portal Terpadu SKPI</h2>
                <p class="text-blue-100 font-medium leading-relaxed opacity-90">Satu pintu akses untuk seluruh ekosistem Surat Keterangan Pendamping Ijazah Informatika.</p>
            </div>

            <div class="relative z-10 mt-12 mb-8 md:mb-0 space-y-4">
                <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                    <div class="w-10 h-10 rounded-full bg-blue-400/30 flex items-center justify-center text-xl">🛡️</div>
                    <div>
                        <div class="font-bold text-sm">Akses Administrator</div>
                        <div class="text-xs text-blue-100/70">Manajemen Master Data & Validasi</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/10">
                    <div class="w-10 h-10 rounded-full bg-indigo-400/30 flex items-center justify-center text-xl">🎓</div>
                    <div>
                        <div class="font-bold text-sm">Akses Mahasiswa</div>
                        <div class="text-xs text-blue-100/70">Pengajuan Prestasi & Riwayat</div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 mt-8 md:mt-0 text-xs font-medium text-blue-200/60 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Sistem cerdas akan mendeteksi peran akun otomatis.
            </div>
        </div>

        <div class="w-full md:w-7/12 p-10 lg:p-14 flex flex-col justify-center bg-white">
            <div class="mb-10">
                <h1 class="text-3xl font-black text-slate-900 tracking-tight mb-2">Masuk ke Sistem</h1>
                <p class="text-slate-500 font-medium">Masukkan kredensial akun UMBJM Anda.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3.5 text-slate-900 font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="Masukkan email terdaftar">
                    @error('email')
                        <span class="text-xs text-rose-500 font-bold mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-extrabold text-slate-500 uppercase tracking-widest mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full rounded-xl border-2 border-slate-100 bg-slate-50/50 px-4 py-3.5 text-slate-900 font-medium focus:border-blue-600 focus:bg-white focus:ring-0 transition-all outline-none" placeholder="••••••••">
                    @error('password')
                        <span class="text-xs text-rose-500 font-bold mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between pt-2">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-600 shadow-sm focus:ring-blue-500 cursor-pointer w-4 h-4" name="remember">
                        <span class="ml-2 text-sm text-slate-600 font-semibold group-hover:text-slate-900 transition-colors">Ingat sesi ini</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl font-bold text-white bg-blue-600 hover:bg-blue-700 active:scale-[0.98] shadow-lg shadow-blue-600/30 transition-all text-center tracking-wide mt-2">
                    AUTENTIKASI MASUK
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-100 text-center">
                <p class="text-sm font-semibold text-slate-500">
                    Mahasiswa dan belum memiliki akses? 
                    <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 transition-colors ml-1">Registrasi Akun</a>
                </p>
            </div>
        </div>
    </div>
    
</body>
</html>