@extends('layouts.master')

@section('title', 'Edit Pengurus — MAPALA Admin')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Edit Pengurus</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Perbarui data pengurus MAPALA.</p>
</div>

<div class="bg-surface rounded-lg border-2 border-outline p-6 max-w-2xl">
    <form method="POST" action="{{ route('admin.pengurus.update', $pengurus) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="anggota_id" class="block font-label-caps text-label-caps text-on-surface mb-2">Anggota <span class="text-error">*</span></label>
            <select id="anggota_id" name="anggota_id"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('anggota_id') border-error @enderror">
                <option value="">— Pilih Anggota —</option>
                @foreach($anggota as $a)
                <option value="{{ $a->id }}" {{ old('anggota_id', $pengurus->anggota_id) == $a->id ? 'selected' : '' }}>
                    {{ $a->nama }} ({{ $a->nim }})
                </option>
                @endforeach
            </select>
            @error('anggota_id')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="jabatan" class="block font-label-caps text-label-caps text-on-surface mb-2">Jabatan <span class="text-error">*</span></label>
            <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $pengurus->jabatan) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('jabatan') border-error @enderror"
                placeholder="Contoh: Ketua Umum" />
            @error('jabatan')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="periode" class="block font-label-caps text-label-caps text-on-surface mb-2">Periode <span class="text-error">*</span></label>
            <input type="text" id="periode" name="periode" value="{{ old('periode', $pengurus->periode) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('periode') border-error @enderror"
                placeholder="Contoh: 2024-2026" />
            @error('periode')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="status" class="block font-label-caps text-label-caps text-on-surface mb-2">Status <span class="text-error">*</span></label>
            <select id="status" name="status"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('status') border-error @enderror">
                <option value="aktif" {{ old('status', $pengurus->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $pengurus->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            @error('status')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8">
            <label for="foto" class="block font-label-caps text-label-caps text-on-surface mb-2">Foto</label>
            @if($pengurus->foto)
            <div class="mb-2">
                <img src="{{ Storage::url($pengurus->foto) }}" alt="Foto {{ $pengurus->anggota->nama }}"
                    class="w-24 h-24 object-cover rounded-lg border-2 border-outline" />
            </div>
            @endif
            <input type="file" id="foto" name="foto" accept="image/*"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface file:mr-4 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-primary-container file:text-on-primary-container file:font-title-sm hover:file:opacity-90 cursor-pointer @error('foto') border-error @enderror" />
            @error('foto')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
            <p class="mt-2 font-body-sm text-on-surface-variant">Format: JPG, PNG, GIF (Maks. 2MB). Kosongkan jika tidak ingin更换 foto.</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.pengurus.index') }}"
                class="flex-1 px-6 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all text-center">
                Batal
            </a>
            <button type="submit"
                class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                Update
            </button>
        </div>
    </form>
</div>
@endsection