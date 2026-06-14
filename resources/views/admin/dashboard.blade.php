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
        <p class="font-display-lg text-display-lg-mobile text-tertiary font-black">{{ $totalKegiatan ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Kegiatan</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-secondary">folder</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Administrasi</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-secondary font-black">{{ $totalAdministrasi ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Administrasi</p>
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
        <h2 class="font-title-sm text-primary uppercase mb-4">Kegiatan Terbaru</h2>
        <div class="space-y-3">
            @if(isset($recentKegiatan) && $recentKegiatan->count())
                @foreach($recentKegiatan as $kegiatan)
                <div class="flex items-center gap-3 py-2 border-b border-outline-variant last:border-0">
                    <div class="w-10 h-10 rounded-full bg-tertiary-container flex items-center justify-center">
                        <span class="material-symbols-outlined text-lg text-on-tertiary-container">event</span>
                    </div>
                    <div class="flex-1">
                        <p class="font-title-sm text-sm text-on-surface">{{ $kegiatan->judul }}</p>
                        <p class="font-body-sm text-xs text-on-surface-variant">{{ $kegiatan->tanggal->format('d M Y') }} · {{ $kegiatan->lokasi }}</p>
                    </div>
                    <span class="font-label-caps text-label-caps text-on-surface-variant">{{ $kegiatan->created_at->diffForHumans() }}</span>
                </div>
                @endforeach
            @else
                <p class="font-body-sm text-on-surface-variant">Belum ada kegiatan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
