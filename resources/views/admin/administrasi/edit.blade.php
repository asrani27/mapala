@extends('layouts.master')

@section('title', 'Edit Administrasi — MAPALA Admin')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Edit Surat</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Perbarui data administrasi.</p>
</div>

<div class="bg-surface rounded-lg border-2 border-outline p-6 max-w-2xl">
    <form method="POST" action="{{ route('admin.administrasi.update', $administrasi) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="nomor_surat" class="block font-label-caps text-label-caps text-on-surface mb-2">Nomor Surat <span class="text-error">*</span></label>
            <input type="text" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $administrasi->nomor_surat) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('nomor_surat') border-error @enderror"
                placeholder="Contoh: 001/MAPALA/VI/2026" />
            @error('nomor_surat')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="jenis_surat" class="block font-label-caps text-label-caps text-on-surface mb-2">Jenis Surat <span class="text-error">*</span></label>
            <input type="text" id="jenis_surat" name="jenis_surat" value="{{ old('jenis_surat', $administrasi->jenis_surat) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('jenis_surat') border-error @enderror"
                placeholder="Contoh: Surat Undangan" />
            @error('jenis_surat')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tanggal_surat" class="block font-label-caps text-label-caps text-on-surface mb-2">Tanggal Surat <span class="text-error">*</span></label>
            <input type="date" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', $administrasi->tanggal_surat->format('Y-m-d')) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('tanggal_surat') border-error @enderror" />
            @error('tanggal_surat')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="perihal" class="block font-label-caps text-label-caps text-on-surface mb-2">Perihal <span class="text-error">*</span></label>
            <input type="text" id="perihal" name="perihal" value="{{ old('perihal', $administrasi->perihal) }}"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('perihal') border-error @enderror"
                placeholder="Contoh: Undangan Rapat Bulanan" />
            @error('perihal')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block font-label-caps text-label-caps text-on-surface mb-2">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('keterangan') border-error @enderror"
                placeholder="Keterangan tambahan...">{{ old('keterangan', $administrasi->keterangan) }}</textarea>
            @error('keterangan')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-8">
            <label for="file" class="block font-label-caps text-label-caps text-on-surface mb-2">File</label>
            @if($administrasi->file)
            <div class="mb-2">
                <a href="{{ Storage::url($administrasi->file) }}" target="_blank"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-sm text-on-surface hover:bg-surface-container-higher transition-all">
                    <span class="material-symbols-outlined">attach_file</span>
                    Lihat File Saat Ini
                </a>
            </div>
            @endif
            <input type="file" id="file" name="file"
                class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface file:mr-4 file:px-4 file:py-2 file:rounded-lg file:border-0 file:bg-primary-container file:text-on-primary-container file:font-title-sm hover:file:opacity-90 cursor-pointer @error('file') border-error @enderror" />
            @error('file')
            <p class="mt-2 font-body-sm text-error">{{ $message }}</p>
            @enderror
            <p class="mt-2 font-body-sm text-on-surface-variant">Format: PDF, DOC, DOCX, JPG, PNG (Maks. 10MB). Kosongkan jika tidak ingin更换 file.</p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.administrasi.index') }}"
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
