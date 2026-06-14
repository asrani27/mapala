@extends('layouts.master')

@section('title', 'Manajemen User — MAPALA Admin')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="font-display-lg text-headline-md text-primary uppercase">Manajemen User</h1>
        <p class="font-body-md text-on-surface-variant mt-1">Kelola seluruh pengguna sistem.</p>
    </div>
    <a href="{{ route('admin.user.create') }}"
        class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
        <span class="material-symbols-outlined">add</span>
        Tambah User
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-primary-container border-2 border-primary rounded-lg p-4 flex items-center gap-3">
    <span class="material-symbols-outlined text-primary">check_circle</span>
    <p class="font-body-sm text-on-primary-container">{{ session('success') }}</p>
</div>
@endif

<!-- Search -->
<form method="GET" class="mb-6">
    <div class="flex gap-3">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama, username, atau email..."
            class="flex-1 px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
        <button type="submit"
            class="px-6 py-3 bg-primary text-on-primary rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined">search</span>
            Cari
        </button>
        @if($search)
        <a href="{{ route('admin.user.index') }}"
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
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Nama</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Username</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Email</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Role</th>
                    <th class="text-left px-6 py-4 font-label-caps text-label-caps text-primary">Dibuat</th>
                    <th class="text-center px-6 py-4 font-label-caps text-label-caps text-primary">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b border-outline-variant hover:bg-surface-container-low transition-colors">
                    <td class="px-6 py-4 font-body-md text-on-surface">{{ $user->name }}</td>
                    <td class="px-6 py-4 font-body-md text-on-surface">{{ $user->username }}</td>
                    <td class="px-6 py-4 font-body-sm text-on-surface-variant">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block font-label-caps text-label-caps px-3 py-1 rounded-full {{ $user->role === 'Admin' ? 'bg-primary-container text-on-primary-container' : 'bg-secondary-container text-on-secondary-container' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-body-sm text-on-surface-variant">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.user.show', $user) }}"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-surface-container-higher hover:text-primary transition-all"
                                title="Detail">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ route('admin.user.edit', $user) }}"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-surface-container-higher hover:text-primary transition-all"
                                title="Edit">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <button type="button" onclick="confirmDelete({{ $user->id }}, '{{ $user->name }}')"
                                class="p-2 rounded-lg text-on-surface-variant hover:bg-error-container hover:text-error transition-all"
                                title="Hapus">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <span class="material-symbols-outlined text-4xl text-outline mb-3 block">people_outline</span>
                        <p class="font-body-md text-on-surface-variant">Tidak ada user ditemukan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="px-6 py-4 border-t-2 border-outline">
        {{ $users->links() }}
    </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-surface rounded-lg border-2 border-outline shadow-none-tactile max-w-sm w-full mx-4 p-6">
        <div class="text-center mb-6">
            <span class="material-symbols-outlined text-5xl text-error mb-4">warning</span>
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Hapus User</h3>
            <p class="font-body-md text-on-surface-variant">Yakin ingin menghapus <strong id="deleteUserName"></strong>?</p>
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
        document.getElementById('deleteUserName').textContent = name;
        document.getElementById('deleteForm').action = '{{ url('admin/user') }}/' + id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endpush
