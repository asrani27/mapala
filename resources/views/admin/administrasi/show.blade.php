@extends('layouts.master')

@section('title', 'Detail Administrasi — MAPALA Admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail Surat</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Informasi lengkap administrasi.</p>
    </div>
    <a href="{{ route('admin.administrasi.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden max-w-3xl">
    <div class="bg-surface-container-highest px-6 py-4 border-b-2 border-outline">
        <h2 class="font-title-sm text-title-sm text-primary uppercase">Data Administrasi</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Nomor Surat</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->nomor_surat }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Jenis Surat</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->jenis_surat }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Surat</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->tanggal_surat->format('d/m/Y') }}</p>
            </div>
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Perihal</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->perihal }}</p>
            </div>
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Keterangan</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->keterangan ?: '—' }}</p>
            </div>
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">File</p>
                @if($administrasi->file)
                <a href="{{ Storage::url($administrasi->file) }}" target="_blank"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-sm text-on-surface hover:bg-surface-container-higher transition-all">
                    <span class="material-symbols-outlined">attach_file</span>
                    Download / Lihat File
                </a>
                @else
                <p class="font-body-md text-on-surface-variant">Tidak ada file</p>
                @endif
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Dibuat Oleh</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->user->name }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Dibuat</p>
                <p class="font-body-md text-on-surface">{{ $administrasi->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-8 flex gap-3">
            <a href="{{ route('admin.administrasi.edit', $administrasi) }}"
                class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all text-center">
                <span class="flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">edit</span>
                    Edit
                </span>
            </a>
            <button type="button" onclick="confirmDelete({{ $administrasi->id }}, '{{ $administrasi->nomor_surat }}')"
                class="px-6 py-3 bg-error text-on-error rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                <span class="material-symbols-outlined">delete</span>
            </button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-surface rounded-lg border-2 border-outline shadow-none-tactile max-w-sm w-full mx-4 p-6">
        <div class="text-center mb-6">
            <span class="material-symbols-outlined text-5xl text-error mb-4">warning</span>
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Hapus Administrasi</h3>
            <p class="font-body-md text-on-surface-variant">Yakin ingin menghapus <strong id="deleteName"></strong>?</p>
        </div>
        <div class="flex gap-3">
            <button type="button" onclick="closeDeleteModal()"
                class="flex-1 px-4 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                Batal
            </button>
            <form id="deleteForm" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full px-4 py-3 bg-error text-on-error rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(id, name) {
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteForm').action = '{{ url('admin/administrasi') }}/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush