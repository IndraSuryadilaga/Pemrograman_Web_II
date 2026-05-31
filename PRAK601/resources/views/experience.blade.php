<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengalaman: {{ $experience->title }}</title>
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
        <a href="/profile" class="font-medium text-slate-500 hover:text-slate-900 transition-colors">
            Profil
        </a>
    </div>
</nav>

<main class="relative z-10 max-w-4xl mx-auto pt-40 px-6 pb-20">
    <div class="bg-white p-8 md:p-12 rounded-4xl shadow-xl shadow-slate-200/50 border border-slate-100">
        <!-- Button -->
        <div class="mb-8">
            <a href="{{ route('profile') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Profil
            </a>
        </div>

        <!-- Experience Image -->
        <div class="aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden mb-8">
            <img src="{{ asset('storage/experiences/' . $experience->image) }}" alt="{{ $experience->title }}" class="w-full h-full object-cover">
        </div>

        <!-- Experience Details -->
        <div class="flex flex-col md:flex-row justify-between items-start gap-4 mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 flex-1">{{ $experience->title }}</h1>
            <div class="shrink-0 text-right">
                <div class="px-4 py-1.5 bg-indigo-50 text-indigo-600 rounded-lg text-sm text-center font-bold tracking-wide uppercase border border-indigo-100">
                    {{ $experience->role }}
                </div>
                <div class="mt-2 text-sm font-mono text-slate-500">
                    {{ $experience->start_date->isoFormat('D MMM YYYY') }} -
                    {{ $experience->end_date ? $experience->end_date->isoFormat('D MMM YYYY') : 'Sekarang' }}
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="prose prose-lg max-w-none text-slate-600 leading-relaxed">
            <p>{{ $experience->description }}</p>
        </div>

        <!-- Practician -->
        <div class="mt-10 pt-8 border-t border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 shrink-0 bg-linear-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center border-2 border-white shadow-md text-white text-xl font-bold overflow-hidden">
                <img src="{{ asset('storage/avatars/' . $experience->practician->avatar) }}" class="w-full h-full object-cover">
            </div>
            <div>
                <p class="text-sm text-slate-500">Pengalaman oleh:</p>
                <p class="font-bold text-slate-800">{{ $experience->practician->name }}</p>
            </div>
        </div>
    </div>
</main>
</body>
</html>
