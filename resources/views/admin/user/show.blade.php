@extends('layouts.master')

@section('title', 'Detail User — MAPALA Admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.user.index') }}" class="inline-flex items-center gap-2 font-body-sm text-on-surface-variant hover:text-primary transition-colors mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail User</h1>
</div>

<div class="max-w-2xl bg-surface rounded-lg border-2 border-outline overflow-hidden">
    <div class="p-8 border-b-2 border-outline-variant flex items-center gap-4">
        <div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center">
            <span class="material-symbols-outlined text-3xl text-on-primary-container">person</span>
        </div>
        <div>
            <h2 class="font-title-sm text-title-sm text-primary uppercase">{{ $user->name }}</h2>
            <p class="font-body-sm text-on-surface-variant">{{ $user->username }}</p>
        </div>
        <div class="ml-auto">
            <span class="inline-block font-label-caps text-label-caps px-4 py-2 rounded-full {{ $user->role === 'Admin' ? 'bg-primary-container text-on-primary-container' : 'bg-secondary-container text-on-secondary-container' }}">
                {{ $user->role }}
            </span>
        </div>
    </div>
    <div class="p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Nama Lengkap</p>
                <p class="font-body-md text-on-surface">{{ $user->name }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Username</p>
                <p class="font-body-md text-on-surface">{{ $user->username }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Email</p>
                <p class="font-body-md text-on-surface">{{ $user->email }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Role</p>
                <p class="font-body-md text-on-surface">{{ $user->role }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Dibuat</p>
                <p class="font-body-md text-on-surface">{{ $user->created_at->format('d F Y H:i') }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Terakhir Diperbarui</p>
                <p class="font-body-md text-on-surface">{{ $user->updated_at->format('d F Y H:i') }}</p>
            </div>
        </div>
    </div>
    <div class="p-8 bg-surface-container-low border-t-2 border-outline-variant flex items-center gap-3">
        <a href="{{ route('admin.user.edit', $user) }}"
            class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
            <span class="material-symbols-outlined">edit</span>
            Edit User
        </a>
    </div>
</div>
@endsection
