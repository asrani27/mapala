@extends('layouts.master')

@section('title', 'Tambah Kegiatan — MAPALA Admin')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Tambah Kegiatan</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Tambah data kegiatan baru MAPALA.</p>
</div>

<div class="bg-surface rounded-lg border-2 border-outline p-6 max-w-2xl">
    <form method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <label for="judul" class="block font-label-caps text-label-caps text-on-surface mb-2">Judul <span class="text-error">*</span></label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('judul') border-error @enderror"
                placeholder="Contoh: Pendakian Gunung Rinjani" />
            @error('judul')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tanggal" class="block font-label-caps text-label-caps text-on-surface mb-2">Tanggal <span class="text-error">*</span></label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('tanggal') border-error @enderror" />
            @error('tanggal')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="lokasi" class="block font-label-caps text-label-caps text-on-surface mb-2">Lokasi <span class="text-error">*</span></label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('lokasi') border-error @enderror"
                placeholder="Contoh: Gunung Rinjani, Lombok" />
            @error('lokasi')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="penanggung_jawab" class="block font-label-caps text-label-caps text-on-surface mb-2">Penanggung Jawab <span class="text-error">*</span></label>
            <input type="text" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('penanggung_jawab') border-error @enderror"
                placeholder="Contoh: Aditya Nugraha" />
            @error('penanggung_jawab')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="deskripsi" class="block font-label-caps text-label-caps text-on-surface mb-2">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('deskripsi') border-error @enderror"
                placeholder="Deskripsi kegiatan...">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="status" class="block font-label-caps text-label-caps text-on-surface mb-2">Status <span class="text-error">*</span></label>
            <select id="status" name="status"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('status') border-error @enderror">
                <option value="">— Pilih Status —</option>
                <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Batal" {{ old('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
            </select>
            @error('status')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8">
            <label for="foto" class="block font-label-caps text-label-caps text-on-surface mb-2">Foto</label>
            <input type="file" id="foto" name="foto" accept="image/*"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface file:mr-4 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-primary-container file:text-on-primary-container file:font-title-sm hover:file:opacity-90 cursor-pointer @error('foto') border-error @enderror" />
            @error('foto')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
            <p class="mt-2 font-body-sm text-on-surface-variant">Format: JPG, PNG, GIF (Maks. 2MB)</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.kegiatan.index') }}"
                class="flex-1 px-6 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all text-center">
                Batal
            </a>
            <button type="submit"
                class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection