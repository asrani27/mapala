        <a href="{{ route('anggota.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('anggota.dashboard') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            Dashboard
        </a>
        <a href="{{ route('anggota.profil') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('anggota.profil') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">person</span>
            Profil
        </a>
        <a href="{{ route('anggota.informasi-kegiatan') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-title-sm text-title-sm {{ request()->routeIs('anggota.informasi-kegiatan') ? 'bg-primary-container text-white font-bold' : 'text-on-surface-variant hover:bg-surface-container-higher hover:text-primary' }} transition-all">
            <span class="material-symbols-outlined text-xl">event</span>
            Informasi Kegiatan
        </a>
