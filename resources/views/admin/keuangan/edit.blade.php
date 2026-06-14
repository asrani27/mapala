@extends('layouts.master')

@section('title', 'Edit Keuangan — MAPALA Admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.keuangan.index') }}"
        class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali ke Daftar
    </a>
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Edit Transaksi Keuangan</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Edit data transaksi keuangan.</p>
</div>

<div class="bg-surface rounded-lg border-2 border-outline p-6">
    <form method="POST" action="{{ route('admin.keuangan.update', $keuangan) }}">
        @csrf
        @method('PUT')

        @if($errors->any())
        <div class="mb-6 bg-error-container border-2 border-error rounded-lg p-4">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-error">error</span>
                <p class="font-body-sm text-on-error-container">Mohon perbaiki kesalahan di bawah ini.</p>
            </div>
            <ul class="mt-2 list-disc list-inside text-on-error-container font-body-sm">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal" class="block font-label-caps text-label-caps text-on-surface mb-2">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $keuangan->tanggal->format('Y-m-d')) }}"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('tanggal') border-error @enderror" />
            </div>

            <div>
                <label for="keterangan" class="block font-label-caps text-label-caps text-on-surface mb-2">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ old('keterangan', $keuangan->keterangan) }}" placeholder="Contoh: Pembayaran Iuran"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('keterangan') border-error @enderror" />
            </div>

            <div>
                <label for="debit" class="block font-label-caps text-label-caps text-on-surface mb-2">Debit (Rp)</label>
                <input type="number" id="debit" name="debit" value="{{ old('debit', $keuangan->debit) }}" min="0" step="1000"
                    placeholder="0"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('debit') border-error @enderror" />
                <p class="font-body-xs text-on-surface-variant mt-1">Uang masuk / pemasukan</p>
            </div>

            <div>
                <label for="kredit" class="block font-label-caps text-label-caps text-on-surface mb-2">Kredit (Rp)</label>
                <input type="number" id="kredit" name="kredit" value="{{ old('kredit', $keuangan->kredit) }}" min="0" step="1000"
                    placeholder="0"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('kredit') border-error @enderror" />
                <p class="font-body-xs text-on-surface-variant mt-1">Uang keluar / pengeluaran</p>
            </div>
        </div>

        <div class="mt-6 pt-6 border-t-2 border-outline flex justify-end gap-3">
            <a href="{{ route('admin.keuangan.index') }}"
                class="px-6 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                Batal
            </a>
            <button type="submit"
                class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection