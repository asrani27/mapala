@extends('layouts.master')

@section('title', 'Dashboard — MAPALA Admin')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md md:text-display-lg text-primary uppercase">Dashboard</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Selamat datang kembali, {{ auth()->user()->name }}.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-primary">group</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Total</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-primary font-black">{{ $totalAnggota ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Anggota Terdaftar</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-secondary">badge</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Admin</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-secondary font-black">{{ $totalAdmin ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Administrator</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-tertiary">event</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Kegiatan</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-tertiary font-black">0</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Kegiatan</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-primary">article</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Berita</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-primary font-black">0</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Berita</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <h2 class="font-title-sm text-primary uppercase mb-4">Anggota Terbaru</h2>
        <div class="space-y-3">
            @if(isset($recentAnggota) && $recentAnggota->count())
                @foreach($recentAnggota as $anggota)
                <div class="flex items-center gap-3 py-2 border-b border-outline-variant last:border-0">
                    <div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg text-on-primary-container">person</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-title-sm text-sm text-on-surface">{{ $anggota->nama }}</p>
                        <p class="font-body-sm text-xs text-on-surface-variant">{{ $anggota->nim }}</p>
                    </div>
                    <span class="font-label-caps text-label-caps text-on-surface-variant">{{ $anggota->created_at->diffForHumans() }}</span>
                </div>
                @endforeach
            @else
                <p class="font-body-sm text-on-surface-variant">Belum ada anggota.</p>
            @endif
        </div>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <h2 class="font-title-sm text-primary uppercase mb-4">Aktivitas Terkini</h2>
        <div class="space-y-3">
            <div class="flex items-center gap-3 py-2 border-b border-outline-variant last:border-0">
                <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-lg text-on-secondary-container">login</span>
                </div>
                <div class="flex-1">
                    <p class="font-title-sm text-sm text-on-surface">Pengguna masuk</p>
                    <p class="font-body-sm text-xs text-on-surface-variant">Belum ada aktivitas.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
