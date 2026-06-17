@extends('layouts.master')

@section('title', 'Informasi Kegiatan — MAPALA Anggota')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md md:text-display-lg text-primary uppercase">Informasi Kegiatan</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Daftar kegiatan MAPALA.</p>
</div>

<div class="space-y-4">
    @if(isset($kegiatan) && $kegiatan->count())
        @foreach($kegiatan as $item)
        <div class="bg-surface rounded-lg border-2 border-outline p-6">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-lg bg-tertiary-container flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-2xl text-on-tertiary-container">event</span>
                </div>
                <div class="flex-1">
                    <h3 class="font-title-sm text-title-sm text-on-surface mb-2">{{ $item->judul }}</h3>
                    <div class="flex flex-wrap gap-4 text-on-surface-variant">
                        <span class="flex items-center gap-1 font-body-sm">
                            <span class="material-symbols-outlined text-base">calendar_today</span>
                            {{ $item->tanggal->format('d M Y') }}
                        </span>
                        <span class="flex items-center gap-1 font-body-sm">
                            <span class="material-symbols-outlined text-base">location_on</span>
                            {{ $item->lokasi }}
                        </span>
                    </div>
                    <p class="font-body-sm text-on-surface-variant mt-3">{{ $item->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="bg-surface rounded-lg border-2 border-outline p-6 text-center">
            <span class="material-symbols-outlined text-5xl text-on-surface-variant mb-4">event_busy</span>
            <p class="font-body-md text-on-surface-variant">Belum ada kegiatan.</p>
        </div>
    @endif
</div>
@endsection
