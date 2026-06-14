@extends('layouts.master')

@section('title', 'Detail Keuangan — MAPALA Admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.keuangan.index') }}"
        class="inline-flex items-center gap-2 text-on-surface-variant hover:text-primary transition-all mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali ke Daftar
    </a>
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Detail Transaksi Keuangan</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Lihat detail transaksi keuangan.</p>
</div>

<div class="bg-surface rounded-lg border-2 border-outline overflow-hidden">
    <div class="bg-surface-container-highest px-6 py-4 border-b-2 border-outline">
        <h2 class="font-title-sm text-title-sm text-on-surface">Informasi Transaksi</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Tanggal</p>
                <p class="font-body-lg text-on-surface">{{ \Carbon\Carbon::parse($keuangan->tanggal)->format('d F Y') }}</p>
            </div>

            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Keterangan</p>
                <p class="font-body-lg text-on-surface">{{ $keuangan->keterangan }}</p>
            </div>

            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Debit (Pemasukan)</p>
                <p class="font-body-lg text-success font-medium">
                    @if($keuangan->debit > 0)
                    Rp {{ number_format($keuangan->debit, 0, ',', '.') }}
                    @else
                    <span class="text-outline">-</span>
                    @endif
                </p>
            </div>

            <div>
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Kredit (Pengeluaran)</p>
                <p class="font-body-lg text-error font-medium">
                    @if($keuangan->kredit > 0)
                    Rp {{ number_format($keuangan->kredit, 0, ',', '.') }}
                    @else
                    <span class="text-outline">-</span>
                    @endif
                </p>
            </div>

            <div class="md:col-span-2">
                <p class="font-label-caps text-label-caps text-on-surface-variant mb-1">Saldo Setelah Transaksi</p>
                <p class="font-display-lg text-title-sm text-primary font-bold">
                    Rp {{ number_format($keuangan->saldo, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t-2 border-outline flex justify-between">
            <a href="{{ route('admin.keuangan.edit', $keuangan) }}"
                class="inline-flex items-center gap-2 px-6 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                <span class="material-symbols-outlined">edit</span>
                Edit
            </a>
            <button type="button" onclick="confirmDelete({{ $keuangan->id }}, '{{ addslashes($keuangan->keterangan) }}')"
                class="inline-flex items-center gap-2 px-6 py-3 bg-error text-on-error rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                <span class="material-symbols-outlined">delete</span>
                Hapus
            </button>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-surface rounded-lg border-2 border-outline shadow-none-tactile max-w-sm w-full mx-4 p-6">
        <div class="text-center mb-6">
            <span class="material-symbols-outlined text-5xl text-error mb-4">warning</span>
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Hapus Transaksi</h3>
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
        document.getElementById('deleteForm').action = '{{ url('admin/keuangan') }}/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush