<aside class="w-72 bg-surface border-r-2 border-outline flex flex-col shrink-0">
    <div class="px-6 py-5 border-b-2 border-outline">
        <a href="/admin/dashboard" class="flex items-center gap-3">
            <img src="{{ asset('logo/mapala.jpeg') }}" alt="MAPALA Logo" class="h-10 w-auto object-contain">
            <span class="font-display-lg text-title-sm font-black text-primary uppercase tracking-wide">MAPALA</span>
        </a>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <a href="/admin/dashboard"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->is('admin/dashboard') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            Dashboard
        </a>
        <a href="{{ route('admin.user.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.user.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">manage_accounts</span>
            Manajemen User
        </a>
        <a href="{{ route('admin.anggota.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.anggota.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">group</span>
            Anggota
        </a>
        <a href="{{ route('admin.pengurus.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.pengurus.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">supervisor_account</span>
            Pengurus
        </a>
        <a href="{{ route('admin.kegiatan.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.kegiatan.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">event</span>
            Kegiatan
        </a>
        <a href="{{ route('admin.administrasi.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.administrasi.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">description</span>
            Administrasi
        </a>
        <a href="{{ route('admin.keuangan.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.keuangan.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">account_balance</span>
            Keuangan
        </a>
        <a href="{{ route('admin.laporan.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.laporan.*') ? 'bg-primary-container text-on-primary-container font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">bar_chart</span>
            Laporan
        </a>
    </nav>
    <div class="px-4 py-4 border-t-2 border-outline">
        <button type="button" onclick="document.getElementById('logoutModal').classList.remove('hidden')"
            class="flex items-center gap-3 w-full px-4 py-3 rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-error-container hover:text-error transition-all">
            <span class="material-symbols-outlined text-xl">logout</span>
            Keluar
        </button>
    </div>
</aside>

<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-surface rounded-lg border-2 border-outline shadow-none-tactile max-w-sm w-full mx-4 p-6">
        <div class="text-center mb-6">
            <span class="material-symbols-outlined text-5xl text-error mb-4">logout</span>
            <h3 class="font-title-sm text-title-sm text-on-surface uppercase mb-2">Konfirmasi Keluar</h3>
            <p class="font-body-md text-on-surface-variant">Apakah Anda yakin ingin keluar?</p>
        </div>
        <div class="flex gap-3">
            <button type="button" onclick="document.getElementById('logoutModal').classList.add('hidden')"
                class="flex-1 px-4 py-3 border-2 border-outline rounded-lg font-title-sm text-title-sm text-on-surface-variant hover:bg-surface-container-higher transition-all">
                Batal
            </button>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-3 bg-error text-on-error rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-all">
                    Ya, Keluar
                </button>
            </form>
        </div>
    </div>
</div>