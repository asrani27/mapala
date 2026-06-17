<a href="/admin/dashboard"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->is('admin/dashboard') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">dashboard</span>
    Dashboard
</a>
<a href="{{ route('admin.user.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.user.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">manage_accounts</span>
    Manajemen User
</a>
<a href="{{ route('admin.anggota.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.anggota.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">group</span>
    Anggota
</a>
<a href="{{ route('admin.pengurus.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.pengurus.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">supervisor_account</span>
    Pengurus
</a>
<a href="{{ route('admin.kegiatan.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.kegiatan.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">event</span>
    Kegiatan
</a>
<a href="{{ route('admin.administrasi.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.administrasi.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">description</span>
    Administrasi
</a>
<a href="{{ route('admin.keuangan.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.keuangan.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">account_balance</span>
    Keuangan
</a>
<a href="{{ route('admin.laporan.index') }}"
    class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('admin.laporan.*') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
    <span class="material-symbols-outlined text-xl">bar_chart</span>
    Laporan
</a>
