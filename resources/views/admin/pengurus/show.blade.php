@extends('layouts.master')

@section('title', 'Detail Pengurus — MAPALA Admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail Pengurus</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Informasi lengkap pengurus MAPALA.</p>
    </div>
    <a href="{{ route('admin.pengurus.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden max-w-2xl">
    <div class="bg-surface-container-highest px-6 py-4 border-b-2 border-outline">
        <h2 class="font-title-sm text-title-sm text-primary uppercase">Data Pengurus</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-2 gap-6">
            @if($pengurus->foto)
            <div class="col-span-2 flex justify-center mb-4">
                <img src="{{ Storage::url($pengurus->foto) }}" alt="Foto {{ $pengurus->anggota->nama }}"
                    class="w-32 h-32 object-cover rounded-full border-4 border-outline" />
            </div>
            @endif
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Nama Lengkap</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->anggota->nama }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">NIM</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->anggota->nim }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Jurusan</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->anggota->jurusan }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Jabatan</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->jabatan }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Periode</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->periode }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Status</p>
                <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full
                    {{ $pengurus->status === 'aktif' ? 'bg-primary-container text-on-primary-container' : 'bg-error-container text-on-error-container' }}">
                    {{ ucfirst($pengurus->status) }}
                </span>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Dibuat</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Terakhir Diperbarui</p>
                <p class="font-body-md text-on-surface">{{ $pengurus->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-8 flex gap-3">
            <a href="{{ route('admin.pengurus.edit', $pengurus) }}"
                class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all text-center">
                <span class="flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">edit</span>
                    Edit
                </span>
            </a>
            <button type="button" onclick="confirmDelete({{ $pengurus->id }}, '{{ $pengurus->anggota->nama }} - {{ $pengurus->jabatan }}')"
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
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Hapus Pengurus</h3>
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
        document.getElementById('deleteForm').action = '{{ url('admin/pengurus') }}/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush