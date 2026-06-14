@extends('layouts.master')

@section('title', 'Detail Kegiatan — MAPALA Admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail Kegiatan</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Informasi lengkap kegiatan MAPALA.</p>
    </div>
    <a href="{{ route('admin.kegiatan.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
</div>

<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden max-w-3xl">
    <div class="bg-surface-container-highest px-6 py-4 border-b-2 border-outline">
        <h2 class="font-title-sm text-title-sm text-primary uppercase">Data Kegiatan</h2>
    </div>
    <div class="p-6">
        @if($kegiatan->foto)
        <div class="mb-6 flex justify-center">
            <img src="{{ Storage::url($kegiatan->foto) }}" alt="Foto {{ $kegiatan->judul }}"
                class="w-full max-w-md h-64 object-cover rounded-lg border-2 border-outline" />
        </div>
        @endif
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Judul</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->judul }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->tanggal->format('d/m/Y') }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Status</p>
                @if($kegiatan->status === 'Aktif')
                <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-primary-container text-on-primary-container">
                    Aktif
                </span>
                @elseif($kegiatan->status === 'Selesai')
                <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container">
                    Selesai
                </span>
                @else
                <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-error-container text-on-error-container">
                    Batal
                </span>
                @endif
            </div>
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Lokasi</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->lokasi }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Penanggung Jawab</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->penanggung_jawab }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Dibuat Oleh</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->user->name }}</p>
            </div>
            <div class="col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Deskripsi</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->deskripsi ?: '—' }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal Dibuat</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->created_at->format('d/m/Y H:i') }}</p>
            </div>
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Terakhir Diperbarui</p>
                <p class="font-body-md text-on-surface">{{ $kegiatan->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-8 flex gap-3">
            <a href="{{ route('admin.kegiatan.edit', $kegiatan) }}"
                class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all text-center">
                <span class="flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">edit</span>
                    Edit
                </span>
            </a>
            <button type="button" onclick="confirmDelete({{ $kegiatan->id }}, '{{ $kegiatan->judul }}')"
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
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Hapus Kegiatan</h3>
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
        document.getElementById('deleteForm').action = '{{ url('admin/kegiatan') }}/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush