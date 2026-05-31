<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Sistem Informasi Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased relative min-h-screen overflow-hidden">

<div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob -z-10"></div>
<div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000 -z-10"></div>
<div class="absolute -bottom-32 left-1/2 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000 -z-10"></div>

<nav class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-white/20 backdrop-blur-xl border border-white/40 shadow-[0_8px_32px_rgba(0,0,0,0.1)] ring-1 ring-white/30 px-8 py-4 rounded-3xl flex flex-col items-center justify-center gap-2 transition-all duration-500 hover:bg-white/30 hover:backdrop-blur-2xl hover:shadow-[0_8px_32px_rgba(0,0,0,0.15)] hover:-translate-y-1 hover:scale-105 w-max">
    <div class="font-extrabold text-lg tracking-tight bg-clip-text text-transparent bg-linear-to-r from-blue-600 to-indigo-600 uppercase">
        Praktikum Web II Modul 6
    </div>

    <div class="flex space-x-6 mt-1">
        <a href="/" class="relative font-semibold text-blue-600 group">
            Beranda
            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-blue-600 rounded-full"></span>
        </a>
        <a href="/profile" class="font-medium text-slate-500 hover:text-slate-900 transition-colors">
            Profil
        </a>
    </div>
</nav>

<main class="relative z-10 max-w-3xl mx-auto pt-40 px-6 pb-20 flex flex-col items-center text-center">
    <div class="mb-12">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 mb-4">
            Catatan Perjalanan <br/>
            <span class="bg-clip-text text-transparent bg-linear-to-r from-blue-600 to-indigo-600">
            Sang Developer
        </span>
        </h1>
        <p class="text-lg text-slate-500 max-w-xl mx-auto">
            Lebih dari sekadar tugas praktikum. Ini adalah ruang untuk menyimpan rekam jejak, merayakan setiap progres <i>level-up</i>, dan merangkai cerita di balik karya.
        </p>
    </div>

    <div class="w-full max-w-md bg-white p-8 rounded-4xl shadow-xl shadow-slate-200/50 border border-slate-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-blue-200/50 group cursor-default">
        <a href="/profile">
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-linear-to-br from-blue-50 to-indigo-50 rounded-full flex items-center justify-center mb-5 border border-blue-100 shadow-inner group-hover:scale-110 transition-transform duration-300 overflow-hidden">
                    <img src="{{ asset('storage/avatars/' . $practician->avatar) }}" class="w-full h-full object-cover" alt="">
                </div>

                <p class="text-sm font-semibold tracking-widest text-indigo-500 uppercase mb-1">
                    Praktikan Aktif
                </p>
                <h2 class="text-2xl font-bold text-slate-900 mb-2">
                    {{ $practician->name }}
                </h2>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-slate-50 rounded-xl border border-slate-100">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                    </svg>
                    <span class="text-slate-600 font-mono font-medium tracking-tight">
                            {{ $practician->nim }}
                        </span>
                </div>
            </div>
        </a>
    </div>
</main>
</body>
</html>
