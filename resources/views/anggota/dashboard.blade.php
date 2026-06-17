@extends('layouts.master')

@section('title', 'Dashboard — MAPALA Anggota')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md md:text-display-lg text-primary uppercase">Dashboard</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Selamat datang, {{ auth()->user()->name }}.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-primary">event</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Kegiatan</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-primary font-black">{{ $totalKegiatan ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Kegiatan</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-secondary">group</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Anggota</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-secondary font-black">{{ $totalAnggota ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Anggota</p>
    </div>
    <div class="bg-surface rounded-lg border-2 border-outline p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="material-symbols-outlined text-3xl text-tertiary">supervisor_account</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant">Pengurus</span>
        </div>
        <p class="font-display-lg text-display-lg-mobile text-tertiary font-black">{{ $totalPengurus ?? 0 }}</p>
        <p class="font-body-sm text-on-surface-variant mt-1">Total Pengurus</p>
    </div>
</div>

<div class="bg-surface rounded-lg border-2 border-outline p-6">
    <h2 class="font-title-sm text-primary uppercase mb-4">Kegiatan Terbaru</h2>
    <div class="space-y-3">
        @if(isset($kegiatan) && $kegiatan->count())
            @foreach($kegiatan as $item)
            <div class="flex items-center gap-3 py-3 border-b border-outline-variant last:border-0">
                <div class="w-12 h-12 rounded-lg bg-tertiary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-xl text-on-tertiary-container">event</span>
                </div>
                <div class="flex-1">
                    <p class="font-title-sm text-on-surface">{{ $item->judul }}</p>
                    <p class="font-body-sm text-on-surface-variant">{{ $item->tanggal->format('d M Y') }} · {{ $item->lokasi }}</p>
                </div>
            </div>
            @endforeach
        @else
            <p class="font-body-sm text-on-surface-variant text-center py-4">Belum ada kegiatan.</p>
        @endif
    </div>
</div>
@endsection
