@extends('layouts.master')

@section('title', 'Edit User — MAPALA Admin')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.user.index') }}"
        class="inline-flex items-center gap-2 font-body-sm text-on-surface-variant hover:text-primary transition-colors mb-4">
        <span class="material-symbols-outlined">arrow_back</span>
        Kembali
    </a>
    <h1 class="font-display-lg text-headline-md text-primary uppercase">Edit User</h1>
    <p class="font-body-md text-on-surface-variant mt-1">Perbarui data pengguna.</p>
</div>

<div class="max-w-2xl bg-surface rounded-lg border-2 border-outline p-8">
    <form method="POST" action="{{ route('admin.user.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <div>
                <label for="name" class="font-label-caps text-label-caps text-primary mb-2 block">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('name') border-error @enderror" />
                @error('name') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="username" class="font-label-caps text-label-caps text-primary mb-2 block">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('username') border-error @enderror" />
                @error('username') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="font-label-caps text-label-caps text-primary mb-2 block">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('email') border-error @enderror" />
                @error('email') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="font-label-caps text-label-caps text-primary mb-2 block">Password <span
                        class="text-on-surface-variant">(kosongkan jika tidak diubah)</span></label>
                <input type="password" id="password" name="password" autocomplete="new-password"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all @error('password') border-error @enderror" />
                @error('password') <p class="font-body-sm text-error mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation"
                    class="font-label-caps text-label-caps text-primary mb-2 block">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    autocomplete="new-password"
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all" />
            </div>

            <div>
                <label for="role" class="font-label-caps text-label-caps text-primary mb-2 block">Role</label>
                <select id="role" name="role" required
                    class="w-full px-4 py-3 bg-surface-container-lowest border-2 border-outline rounded-lg font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                    <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>

        <div class="flex items-center gap-3 mt-8">
            <button type="submit"
                class="bg-primary text-on-primary px-8 py-3 rounded-lg font-title-sm text-title-sm shadow-none-tactile border-2 border-primary hover:translate-x-[-2px] hover:translate-y-[-2px] transition-all">
                Perbarui
            </button>
            <a href="{{ route('admin.user.index') }}"
                class="px-8 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    function togglePassword(id, btn) {
        const input = document.getElementById(id);
        const icon = btn.querySelector('.material-symbols-outlined');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    }
</script>
@endpush