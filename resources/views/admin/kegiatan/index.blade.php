@extends('layouts.master')

@section('title', 'Kegiatan — MAPALA Admin')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="font-display-lg text-headline-md text-primary uppercase">Kegiatan</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Kelola data kegiatan MAPALA.</p>
    </div>
    <a href="{{ route('admin.kegiatan.create') }}"
        class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
        <span class="material-symbols-outlined">add</span>
        Tambah Kegiatan
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-primary-container border-2 border-primary rounded-lg p-4 flex items-center gap-3">
    <span class="material-symbols-outlined text-primary">check_circle</span>
    <p class="font-body-sm text-on-primary-container">{{ session('success') }}</p>
</div>
@endif

<!-- Search & Filter -->
<form method="GET" class="mb-6">
    <div class="flex flex-col md:flex-row gap-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul, lokasi, atau penanggung jawab..."
            class="flex-1 px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
        <select name="status"
            class="px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
            <option value="">Semua Status</option>
            <option value="Aktif" {{ $status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="Selesai" {{ $status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="Batal" {{ $status == 'Batal' ? 'selected' : '' }}>Batal</option>
        </select>
        <button type="submit"
            class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined">search</span>
            Cari
        </button>
        @if($search || $status)
        <a href="{{ route('admin.kegiatan.index') }}"
            class="px-4 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all flex items-center">
            Reset
        </a>
        @endif
    </div>
</form>

<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-surface-container-highest border-b-2 border-outline">
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Judul</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Tanggal</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Lokasi</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Penanggung Jawab</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Status</th>
                    <th class="text-center px-6 py-4 font-label-caps text-label-caps text-primary">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kegiatan as $k)
                <tr class="border-b border-outline-variant hover:bg-surface-container-low transition-colors">
                    <td class="px-6 py-4 font-body-md text-on-surface">{{ $k->judul }}</td>
                    <td class="px-6 py-4 font-body-sm text-on-surface-variant">{{ $k->tanggal->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 font-body-sm text-on-surface-variant">{{ $k->lokasi }}</td>
                    <td class="px-6 py-4 font-body-sm text-on-surface-variant">{{ $k->penanggung_jawab }}</td>
                    <td class="px-6 py-4">
                        @if($k->status === 'Aktif')
                        <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-primary-container text-on-primary-container">
                            Aktif
                        </span>
                        @elseif($k->status === 'Selesai')
                        <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container">
                            Selesai
                        </span>
                        @else
                        <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full bg-error-container text-on-error-container">
                            Batal
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.kegiatan.show', $k) }}"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-surface-container-higher hover:text-primary transition-all" title="Detail">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ route('admin.kegiatan.edit', $k) }}"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-surface-container-higher hover:text-primary transition-all" title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button type="button" onclick="confirmDelete({{ $k->id }}, '{{ $k->judul }}')"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-error-container hover:text-error transition-all" title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <span class="material-symbols-outlined text-4xl text-outline mb-3 block">event</span>
                        <p class="font-body-md text-on-surface-variant">Tidak ada kegiatan ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($kegiatan->hasPages())
    <div class="px-6 py-4 border-t-2 border-outline">
        {{ $kegiatan->links() }}
    </div>
    @endif
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
    setTimeout(() => {
        const alert = document.querySelector('.bg-primary-container');
        if (alert) alert.style.display = 'none';
    }, 5000);
</script>
@endpush