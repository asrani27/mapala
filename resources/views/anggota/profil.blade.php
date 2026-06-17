@extends('layouts.master')

@section('title', 'Profil — MAPALA Anggota')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="font-display-lg text-headline-md md:text-display-lg text-primary uppercase">Profil</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Informasi profil Anda.</p>
    </div>
    <a href="{{ route('anggota.profil.edit') }}"
        class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
        <span class="material-symbols-outlined">edit</span>
        Edit Profil
    </a>
</div>

@if(session('success'))
    <div class="mb-6 p-4 bg-tertiary-container text-on-tertiary-container rounded-lg font-body-sm">
        {{ session('success') }}
    </div>
@endif

<div class="bg-surface rounded-lg border-2 border-outline p-6">
    <div class="flex items-center gap-4 mb-6">
        <div class="w-20 h-20 rounded-full bg-primary-container flex items-center justify-center overflow-hidden">
            @if(auth()->user()->anggota && auth()->user()->anggota->foto)
                <img src="{{ Storage::url(auth()->user()->anggota->foto) }}" alt="Foto Profil" class="w-full h-full object-cover">
            @else
                <span class="material-symbols-outlined text-4xl text-on-primary-container">person</span>
            @endif
        </div>
        <div>
            <h2 class="font-title-sm text-title-sm text-on-surface">{{ auth()->user()->name }}</h2>
            <p class="font-body-sm text-on-surface-variant">{{ auth()->user()->username }}</p>
            <span class="inline-block mt-2 px-3 py-1 bg-tertiary-container text-on-tertiary-container rounded-full font-label-caps text-label-caps">
                {{ auth()->user()->role }}
            </span>
        </div>
    </div>
    
    <div class="border-t-2 border-outline pt-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Username</p>
                <p class="font-title-sm text-on-surface">{{ auth()->user()->username }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Role</p>
                <p class="font-title-sm text-on-surface">{{ auth()->user()->role }}</p>
            </div>
            @if(auth()->user()->anggota)
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">NIM</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->nim ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Jurusan</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->jurusan ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Angkatan</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->angkatan ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Daftar</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->tanggal_daftar ? auth()->user()->anggota->tanggal_daftar->format('d/m/Y') : '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Alamat</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->alamat ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">No. Telepon</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->telp ?? '-' }}</p>
                </div>
                <div>
                    <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Status</p>
                    <p class="font-title-sm text-on-surface">{{ auth()->user()->anggota->status ?? '-' }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
