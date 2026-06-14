@extends('layouts.master')

@section('title', 'Laporan — MAPALA Admin')

@section('content')
<div class="mb-8">
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Laporan</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Ekspor laporan dalam format PDF.</p>
</div>

@if(session('success'))
<div class="mb-6 bg-primary-container border-2 border-primary rounded-lg p-4 flex items-center gap-3">
    <span class="material-symbols-outlined text-primary">check_circle</span>
    <p class="font-body-sm text-on-primary-container">{{ session('success') }}</p>
</div>
@endif

<!-- Laporan Kegiatan -->
<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden mb-6">
    <div class="px-6 py-5 bg-surface-container-highest border-b-2 border-outline">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-2xl text-primary">event</span>
            <h2 class="font-title-sm text-title-sm text-on-surface">Laporan Kegiatan</h2>
        </div>
    </div>
    <div class="p-6">
        <form id="form-kegiatan" method="GET" target="_blank" action="{{ route('admin.laporan.export.kegiatan') }}">
            <div class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Mulai</label>
                    <input type="date" name="mulai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Sampai</label>
                    <input type="date" name="sampai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <button type="submit" form="form-kegiatan"
                    class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all flex items-center gap-2 whitespace-nowrap">
                    <span class="material-symbols-outlined">picture_as_pdf</span>
                    Export PDF
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Laporan Administrasi -->
<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden mb-6">
    <div class="px-6 py-5 bg-surface-container-highest border-b-2 border-outline">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-2xl text-primary">description</span>
            <h2 class="font-title-sm text-title-sm text-on-surface">Laporan Administrasi</h2>
        </div>
    </div>
    <div class="p-6">
        <form id="form-administrasi" method="GET" target="_blank" action="{{ route('admin.laporan.export.administrasi') }}">
            <div class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Mulai</label>
                    <input type="date" name="mulai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Sampai</label>
                    <input type="date" name="sampai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <button type="submit" form="form-administrasi"
                    class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all flex items-center gap-2 whitespace-nowrap">
                    <span class="material-symbols-outlined">picture_as_pdf</span>
                    Export PDF
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Laporan Keuangan -->
<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden mb-6">
    <div class="px-6 py-5 bg-surface-container-highest border-b-2 border-outline">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-2xl text-primary">account_balance</span>
            <h2 class="font-title-sm text-title-sm text-on-surface">Laporan Keuangan</h2>
        </div>
    </div>
    <div class="p-6">
        <form id="form-keuangan" method="GET" target="_blank" action="{{ route('admin.laporan.export.keuangan') }}">
            <div class="flex flex-col md:flex-row gap-4 items-end">
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Mulai</label>
                    <input type="date" name="mulai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <div class="flex-1">
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2">Tanggal Sampai</label>
                    <input type="date" name="sampai" 
                        class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
                </div>
                <button type="submit" form="form-keuangan"
                    class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all flex items-center gap-2 whitespace-nowrap">
                    <span class="material-symbols-outlined">picture_as_pdf</span>
                    Export PDF
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Laporan Anggota -->
<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden mb-6">
    <div class="px-6 py-5 bg-surface-container-highest border-b-2 border-outline">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-2xl text-primary">group</span>
            <h2 class="font-title-sm text-title-sm text-on-surface">Laporan Anggota</h2>
        </div>
    </div>
    <div class="p-6">
        <a href="{{ route('admin.laporan.export.anggota') }}" target="_blank"
            class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
            <span class="material-symbols-outlined">picture_as_pdf</span>
            Export PDF
        </a>
    </div>
</div>

<!-- Laporan Pengurus -->
<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden">
    <div class="px-6 py-5 bg-surface-container-highest border-b-2 border-outline">
        <div class="flex items-center gap-3">
            <span class="material-symbols-outlined text-2xl text-primary">supervisor_account</span>
            <h2 class="font-title-sm text-title-sm text-on-surface">Laporan Pengurus</h2>
        </div>
    </div>
    <div class="p-6">
        <a href="{{ route('admin.laporan.export.pengurus') }}" target="_blank"
            class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
            <span class="material-symbols-outlined">picture_as_pdf</span>
            Export PDF
        </a>
    </div>
</div>
@endsection
