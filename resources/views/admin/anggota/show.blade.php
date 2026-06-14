@extends('layouts.master')

@section('title', 'Detail Anggota — MAPALA Admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.anggota.index') }}" class="inline-flex items-center gap-2 font-body-sm text-on-surface-variant hover:text-primary transition-colors mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail Anggota</h1>
</div>

<div class="max-w-2xl bg-surface rounded-lg border-2 border-outline overflow-hidden">
    <div class="p-8 border-b-2 border-outline-variant flex items-center gap-4">
        @if($anggota->foto)
        <img src="{{ Storage::url($anggota->foto) }}" alt="Foto {{ $anggota->nama }}"
            class="w-16 h-16 rounded-full object-cover border-2 border-outline" />
        @else
        <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl text-on-primary-container">person</span>
        </div>
        @endif
        <div>
            <h2 class="font-title-sm text-title-sm text-primary uppercase">{{ $anggota->nama }}</h2>
            <p class="font-body-sm text-on-surface-variant">{{ $anggota->nim }}</p>
        </div>
        <div class="ml-auto">
            <span class="inline-block font-label-caps text-label-caps px-4 py-2 rounded-full
                {{ $anggota->status === 'Aktif' ? 'bg-primary-container text-on-primary-container' : ($anggota->status === 'Nonaktif' ? 'bg-error-container text-on-error-container' : 'bg-surface-container-highest text-on-surface-variant') }}">
                {{ $anggota->status }}
            </span>
        </div>
    </div>
    <div class="p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">NIM</p>
                <p class="font-body-md text-on-surface">{{ $anggota->nim }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Nama Lengkap</p>
                <p class="font-body-md text-on-surface">{{ $anggota->nama }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Jurusan</p>
                <p class="font-body-md text-on-surface">{{ $anggota->jurusan }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Angkatan</p>
                <p class="font-body-md text-on-surface">{{ $anggota->angkatan }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">No. Telepon</p>
                <p class="font-body-md text-on-surface">{{ $anggota->telp ?? '—' }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Daftar</p>
                <p class="font-body-md text-on-surface">{{ $anggota->tanggal_daftar?->format('d F Y') ?? '—' }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Alamat</p>
                <p class="font-body-md text-on-surface">{{ $anggota->alamat ?? '—' }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Akun User</p>
                @if($anggota->user)
                <p class="font-body-md text-on-surface flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-sm">check_circle</span>
                    {{ $anggota->user->username }}
                </p>
                @else
                <p class="font-body-md text-on-surface-variant">Belum memiliki akun</p>
                @endif
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Dibuat</p>
                <p class="font-body-md text-on-surface">{{ $anggota->created_at?->format('d F Y H:i') ?? '—' }}</p>
            </div>
        </div>
    </div>
    <div class="p-8 bg-surface-container-low border-t-2 border-outline-variant flex items-center gap-3 flex-wrap">
        <a href="{{ route('admin.anggota.edit', $anggota) }}"
            class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
            <span class="material-symbols-outlined">edit</span>
            Edit
        </a>
        @if(!$anggota->user)
        <form method="POST" action="{{ route('admin.anggota.create-user', $anggota) }}">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 bg-secondary text-on-secondary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-secondary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
                <span class="material-symbols-outlined">person_add</span>
                Buat Akun
            </button>
        </form>
        @else
        <form method="POST" action="{{ route('admin.anggota.reset-password', $anggota) }}"
            onsubmit="return confirm('Reset password {{ $anggota->nama }} ke default ({{ $anggota->nim }})?')">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 bg-tertiary-container text-on-tertiary-container px-6 py-3 rounded-lg font-title-sm text-title-sm border-2 border-tertiary-container hover:opacity-90 transition-all">
                <span class="material-symbols-outlined">key</span>
                Reset Password
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
