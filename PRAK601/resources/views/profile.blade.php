<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktikan - Sistem Informasi Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased relative min-h-screen overflow-x-hidden">
<!-- Background -->
<div class="fixed top-0 left-1/4 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob -z-10"></div>
<div class="fixed top-0 right-1/4 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000 -z-10"></div>
<div class="fixed -bottom-32 left-1/2 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000 -z-10"></div>

<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white/20 backdrop-blur-xl border border-white/40 shadow-[0_8px_32px_rgba(0,0,0,0.1)] ring-1 ring-white/30 px-8 py-4 rounded-3xl flex flex-col items-center justify-center gap-2 transition-all duration-500 hover:bg-white/30 hover:backdrop-blur-2xl hover:shadow-[0_8px_32px_rgba(0,0,0,0.15)] hover:-translate-y-1 hover:scale-105 w-max">
    <div class="font-extrabold text-lg tracking-tight bg-clip-text text-transparent bg-linear-to-r from-blue-600 to-indigo-600 uppercase">
        Praktikum Web II Modul 6
    </div>

    <div class="flex space-x-6 mt-1">
        <a href="/" class="font-medium text-slate-500 hover:text-slate-900 transition-colors">
            Beranda
        </a>
        <a href="/profile" class="relative font-semibold text-blue-600 group">
            Profil
            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-blue-600 rounded-full"></span>
        </a>
    </div>
</nav>

<main class="relative z-10 max-w-5xl mx-auto pt-40 px-6 pb-20">
    <div class="bg-white p-8 md:p-12 rounded-4xl shadow-xl shadow-slate-200/50 border border-slate-100 mb-12 flex flex-col md:flex-row gap-8 items-center md:items-start">
        <!-- Avatar -->
        <div class="w-32 h-32 shrink-0 bg-linear-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center border-4 border-white shadow-lg text-white text-5xl font-bold overflow-hidden">
            <img src="{{ asset('storage/avatars/' . $practician->avatar) }}" class="w-full h-full object-cover">
        </div>

        <!-- Identitas & Bio -->
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-2">{{ $practician->name }}</h1>
            <div class="inline-flex items-center gap-2 px-3 py-1 bg-blue-50 text-blue-600 rounded-lg font-mono font-medium text-sm mb-4 border border-blue-100">
                NIM: {{ $practician->nim }}
            </div>
            <p class="text-slate-600 text-lg leading-relaxed mb-6 max-w-2xl">
                {{ $practician->bio }}
            </p>

            <!-- Info Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-slate-600">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span class="font-medium text-slate-700">Prodi:</span> {{ $practician->study_program }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-slate-700">Hobi:</span> {{ $practician->hobby }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span class="font-medium text-slate-700">Email:</span> {{ $practician->email }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    <span class="font-medium text-slate-700">Github:</span> <a href="{{ $practician->github_url }}" target="_blank" class="text-blue-600 hover:underline">Portofolio Web</a>
                </div>
            </div>

            <!-- Skills Tags -->
            <div class="mt-8 pt-6 border-t border-slate-100">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-3">Tech Stack & Skills</h3>
                <div class="flex flex-wrap gap-2 justify-center md:justify-start">
                    @foreach($practician->skills as $skill)
                        <span class="px-4 py-1.5 bg-slate-100 text-slate-700 rounded-full text-sm font-semibold border border-slate-200 hover:bg-blue-50 hover:text-blue-600 transition-colors cursor-default">
                                {{ $skill }}
                            </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Section Pengalaman -->
    <div class="mb-8 px-6 text-center md:text-left">
        <h2 class="text-2xl font-extrabold text-slate-900">Side Quests & Momen Seru</h2>
        <p class="text-slate-500 mt-1">Karena perjalanan sebagai mahasiswa tidak hanya diselesaikan di dalam kelas.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($practician->experiences as $experience)
            <div class="bg-white rounded-3xl p-6 shadow-lg shadow-slate-200/40 border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">

                <div class="flex-1">
                    <div class="flex justify-between items-start mb-4">
                            <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold tracking-wide uppercase">
                                {{ $experience->role }}
                            </span>
                        <span class="text-xs font-medium text-slate-400 font-mono">
                                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                            </span>
                    </div>

                    <h3 class="text-xl font-bold text-slate-800 mb-2 leading-tight">
                        {{ $experience->title }}
                    </h3>

                    <p class="text-sm text-slate-500 line-clamp-3 mb-6">
                        {{ $experience->description }}
                    </p>
                </div>

                <!-- Button -->
                <div class="mt-auto pt-4 border-t border-slate-50">
                    <a href="{{ route('experience.show', $experience->id) }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-slate-50 hover:bg-blue-600 text-slate-700 hover:text-white rounded-xl font-semibold text-sm transition-colors group">
                        Lihat Detail
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-slate-500 bg-white rounded-3xl border border-dashed border-slate-300">
                Belum ada data pengalaman.
            </div>
        @endforelse
    </div>
</main>
</body>
</html>
