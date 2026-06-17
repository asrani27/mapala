@extends('layouts.master')

@section('title', 'Edit Profil — MAPALA Anggota')

@section('content')
<div class="mb-8">
    <a href="{{ route('anggota.profil') }}" class="inline-flex items-center gap-2 font-body-sm text-on-surface-variant hover:text-primary transition-colors mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
    <h1 class="font-display-lg text-headline-md md:text-display-lg text-primary uppercase">Edit Profil</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Perbarui informasi profil Anda.</p>
</div>

<div class="max-w-2xl bg-surface rounded-lg border-2 border-outline p-8">
    @if(session('success'))
        <div class="mb-6 p-4 bg-tertiary-container text-on-tertiary-container rounded-lg font-body-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('anggota.profil.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label for="nama" class="font-label-caps text-label-caps text-primary mb-2 block">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama', $anggota->nama ?? auth()->user()->name) }}" required
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('nama') border-error @enderror" />
                @error('nama') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="alamat" class="font-label-caps text-label-caps text-primary mb-2 block">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('alamat') border-error @enderror">{{ old('alamat', $anggota->alamat ?? '') }}</textarea>
                @error('alamat') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="telp" class="font-label-caps text-label-caps text-primary mb-2 block">No. Telepon</label>
                <input type="text" id="telp" name="telp" value="{{ old('telp', $anggota->telp ?? '') }}"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('telp') border-error @enderror" />
                @error('telp') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="foto" class="font-label-caps text-label-caps text-primary mb-2 block">Foto</label>
                @if($anggota && $anggota->foto)
                <div class="mb-2">
                    <img src="{{ Storage::url($anggota->foto) }}" alt="Foto Profil"
                        class="w-24 h-24 object-cover rounded-lg border-2 border-outline" />
                </div>
                @endif
                <input type="file" id="foto" name="foto" accept="image/*"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface file:mr-4 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-primary-container file:text-on-primary-container file:font-title-sm hover:file:opacity-90 cursor-pointer @error('foto') border-error @enderror" />
                @error('foto') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
                <p class="font-body-sm text-on-surface-variant mt-1">Format: JPG, PNG, GIF (Maks. 2MB). Kosongkan jika tidak ingin mengganti foto.</p>
            </div>
        </div>

        <div class="flex items-center gap-3 mt-8">
            <button type="submit"
                class="bg-primary text-on-primary px-8 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
                Simpan Perubahan
            </button>
            <a href="{{ route('anggota.profil') }}"
                class="px-8 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
