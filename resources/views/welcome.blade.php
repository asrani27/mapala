<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>IWAPALAMIKA Portal - Jelajahi Alam, Lindungi Masa Depan</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=JetBrains+Mono:wght@100..900&family=Montserrat:wght@100..900&display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              "colors": {
                      "inverse-primary": "#b0cdbb",
                      "tertiary-fixed": "#cfe6f2",
                      "secondary-fixed": "#ffdbcf",
                      "tertiary-fixed-dim": "#b4cad6",
                      "on-tertiary-fixed": "#071e27",
                      "on-error-container": "#93000a",
                      "surface-container-highest": "#e3e2e0",
                      "outline": "#727973",
                      "on-surface-variant": "#424844",
                      "on-tertiary": "#ffffff",
                      "on-primary-container": "#98b5a3",
                      "inverse-surface": "#2f312f",
                      "on-surface": "#1a1c1b",
                      "tertiary": "#192e37",
                      "on-tertiary-fixed-variant": "#354a53",
                      "error": "#ba1a1a",
                      "on-background": "#1a1c1b",
                      "surface-container-low": "#f4f3f1",
                      "background": "#faf9f6",
                      "primary-fixed-dim": "#b0cdbb",
                      "on-primary": "#ffffff",
                      "surface": "#faf9f6",
                      "primary-container": "#2d4739",
                      "on-tertiary-container": "#9bb1bc",
                      "on-primary-fixed": "#062014",
                      "surface-container-lowest": "#ffffff",
                      "on-secondary-container": "#795548",
                      "on-secondary": "#ffffff",
                      "tertiary-container": "#2f444e",
                      "on-error": "#ffffff",
                      "primary-fixed": "#ccead6",
                      "outline-variant": "#c2c8c2",
                      "surface-container": "#efeeeb",
                      "on-primary-fixed-variant": "#324c3e",
                      "on-secondary-fixed": "#2e150b",
                      "surface-variant": "#e3e2e0",
                      "surface-bright": "#faf9f6",
                      "secondary-container": "#fdcdbc",
                      "surface-dim": "#dadad7",
                      "inverse-on-surface": "#f1f1ee",
                      "primary": "#173124",
                      "error-container": "#ffdad6",
                      "secondary-fixed-dim": "#ebbcac",
                      "surface-tint": "#496455",
                      "surface-container-high": "#e9e8e5",
                      "secondary": "#7a5649",
                      "on-secondary-fixed-variant": "#603f33"
              },
              "borderRadius": {
                      "DEFAULT": "0.125rem",
                      "lg": "0.25rem",
                      "xl": "0.5rem",
                      "full": "0.75rem"
              },
              "spacing": {
                      "margin-mobile": "16px",
                      "gutter": "24px",
                      "base": "8px",
                      "container-max": "1280px",
                      "margin-desktop": "40px"
              },
              "fontFamily": {
                      "title-sm": ["Montserrat"],
                      "label-caps": ["JetBrains Mono"],
                      "body-sm": ["Inter"],
                      "body-md": ["Inter"],
                      "display-lg": ["Montserrat"],
                      "headline-md": ["Montserrat"],
                      "display-lg-mobile": ["Montserrat"]
              },
              "fontSize": {
                      "title-sm": ["18px", {"lineHeight": "24px", "fontWeight": "600"}],
                      "label-caps": ["12px", {"lineHeight": "16px", "letterSpacing": "0.1em", "fontWeight": "700"}],
                      "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                      "body-md": ["16px", {"lineHeight": "26px", "fontWeight": "400"}],
                      "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "800"}],
                      "headline-md": ["24px", {"lineHeight": "32px", "fontWeight": "700"}],
                      "display-lg-mobile": ["32px", {"lineHeight": "40px", "letterSpacing": "-0.01em", "fontWeight": "800"}]
              }
            },
          },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .grain-texture {
            background-image: url("https://www.transparenttextures.com/patterns/cardboard-flat.png");
            opacity: 0.05;
        }

        .border-rugged {
            border: 1px solid theme('colors.outline');
        }

        .shadow-none-tactile {
            box-shadow: 4px 4px 0px 0px theme('colors.primary');
        }
    </style>
</head>

<body
    class="bg-surface text-on-surface font-body-md selection:bg-secondary-container selection:text-on-secondary-container">
    <!-- Top Navigation -->
    <nav
        class="bg-surface border-b-2 border-outline flex justify-between items-center px-margin-desktop py-base w-full max-w-container-max mx-auto sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <img alt="MAPALA Logo" class="h-12 w-auto" src="/logo/mapala.jpeg"> <span
                class="font-display-lg text-title-sm font-black text-primary">IWAPALAMIKA</span>
        </div>
        <!-- Desktop Nav -->
        <div class="hidden md:flex gap-gutter items-center">
            <a class="text-primary border-b-4 border-secondary font-bold pb-1 font-title-sm text-title-sm"
                href="#home">Home</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-title-sm text-title-sm"
                href="#kegiatan">Kegiatan</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors font-title-sm text-title-sm"
                href="#anggota">Anggota</a>
        </div>
        <div class="flex items-center gap-4">
            <button
                class="material-symbols-outlined text-primary p-2 hover:bg-surface-container-low transition-colors">search</button>
            <a href="/login"
                class="bg-primary text-on-primary px-gutter py-2 rounded-lg font-title-sm text-title-sm hover:opacity-90 transition-opacity">Login</a>
        </div>
    </nav>
    <main>
        <!-- Hero Section -->
        <section id="home" class="relative h-[85vh] flex items-center justify-center overflow-hidden bg-primary">
            <div class="absolute inset-0 z-0">
                <img alt="Rugged Mountain Landscape at Sunset" class="w-full h-full object-cover opacity-80"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDACZkM7XQdIzzS9hug7U4uh7HNEdlvCkZpeH-re4k50BHZGaQXi0HFZcAvgIdS6jAIzOZeYXXd9mxMvMCamsrzaowF9PcR1aOPjsdceiYuSDCoWPpqc4uxZRs66jQHlr7Un6zm7BRGLARnf7xwAcb8YvekzlTC29PdZFdyuZ9ICxMabhKklggVs9l6kOa9aJBI1H7k4zctjuJbBfyBfGoc9HeffpgIsl6hJPDlHyF7lXGrCPCuW0j5a5eO662sBRErVfAI-XQpJ6U" />
                <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent"></div>
            </div>
            <div class="relative z-10 text-center px-margin-mobile max-w-4xl mx-auto">
                <span class="font-label-caps text-label-caps text-secondary-container mb-4 block tracking-[0.3em]">EST.
                    1964</span>
                <h1
                    class="font-display-lg text-display-lg-mobile md:text-display-lg text-white mb-6 uppercase leading-tight drop-shadow-lg">
                    Jelajahi Alam, Lindungi Masa Depan</h1>
                <p class="font-body-md text-body-md text-surface-variant mb-10 max-w-2xl mx-auto">Portal informasi dan
                    komunitas Mahasiswa Pencinta Alam Indonesia. Tempat di mana petualangan bertemu dengan tanggung
                    jawab lingkungan.</p>
            </div>
        </section>

        <!-- Activities Mapala Grid -->
        <section id="kegiatan" class="py-24 px-margin-desktop bg-surface-container-low">
            <div class="max-w-container-max mx-auto">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <span class="font-label-caps text-label-caps text-secondary mb-2 block">DIVISI
                            OPERASIONAL</span>
                        <h2 class="font-display-lg text-headline-md text-primary uppercase">Aktivitas Utama</h2>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse ($kegiatan as $item)
                    <div class="group relative overflow-hidden h-96 bg-primary border-rugged">
                        <img class="absolute inset-0 w-full h-full object-cover opacity-70 transition-transform duration-500 group-hover:scale-105"
                            src="{{ $item->foto ? \Illuminate\Support\Facades\Storage::url($item->foto) : 'https://placehold.co/800x600/1a1a2e/e0e0e0?text=MAPALA' }}"
                            alt="{{ $item->judul }}" />
                        <div class="absolute inset-0 bg-gradient-to-t from-primary via-transparent to-transparent">
                        </div>
                        <div class="absolute bottom-0 left-0 p-8">
                            <span
                                class="material-symbols-outlined text-4xl text-secondary-container mb-4 block">explore</span>
                            <h3 class="font-display-lg text-title-sm text-white uppercase mb-2">{{ $item->judul }}</h3>
                            <p class="font-body-sm text-surface-variant line-clamp-2">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-16">
                        <span
                            class="material-symbols-outlined text-6xl text-surface-variant mb-4 block">event_busy</span>
                        <p class="font-body-lg text-surface-variant">Belum ada kegiatan aktif saat ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Anggota Section -->
        <section id="anggota" class="py-24 px-margin-desktop bg-surface">
            <div class="max-w-container-max mx-auto">
                <div class="text-center mb-16">
                    <span class="font-label-caps text-label-caps text-secondary mb-2 block">KOMUNITAS</span>
                    <h2 class="font-display-lg text-headline-md text-primary uppercase">Anggota MAPALA</h2>
                    <p class="font-body-md text-on-surface-variant max-w-2xl mx-auto mt-4">Bergabung dengan petualang,
                        konservasionis, dan pecinta alam dari seluruh Indonesia.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse ($pengurus as $item)
                    <div
                        class="bg-surface-container-lowest border-rugged p-6 text-center group hover:shadow-none-tactile transition-all">
                        @if ($item->anggota && $item->foto)
                        <img class="w-24 h-24 mx-auto mb-4 rounded-full object-cover"
                            src="{{ \Illuminate\Support\Facades\Storage::url($item->foto) }}"
                            alt="{{ $item->anggota->nama }}">
                        @else
                        <div
                            class="w-24 h-24 mx-auto mb-4 rounded-full bg-primary-container flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-on-primary-container">person</span>
                        </div>
                        @endif
                        <h3 class="font-title-sm text-primary uppercase mb-1">{{ $item->anggota->nama ?? 'N/A' }}</h3>
                        <p class="font-label-caps text-label-caps text-secondary mb-3">{{ $item->jabatan }}</p>
                        <p class="font-body-sm text-on-surface-variant">Periode {{ $item->periode }}</p>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-16">
                        <span
                            class="material-symbols-outlined text-6xl text-surface-variant mb-4 block">group_off</span>
                        <p class="font-body-lg text-surface-variant">Belum ada pengurus aktif saat ini.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

    </main>
    <!-- Footer -->
    <footer class="bg-surface-container-highest border-t-2 border-outline mt-auto">
        <div class="max-w-container-max mx-auto px-margin-desktop py-gutter">
            <div class="flex flex-col md:flex-row justify-between gap-12 mb-16">
                <div class="max-w-sm">
                    <div class="flex items-center gap-4 mb-6">

                        <span class="font-title-sm text-title-sm font-bold text-primary">IWAPALAMIKA Portal</span>
                    </div>
                    <p class="font-body-sm text-on-surface-variant">
                        Membangun generasi pemimpin masa depan yang berwawasan lingkungan dan memiliki ketangguhan fisik
                        serta mental melalui kegiatan alam bebas.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-12">
                    <div>
                        <h4 class="font-label-caps text-label-caps text-primary mb-6">EXPLORE</h4>
                        <ul class="space-y-4 font-body-sm">
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline"
                                    href="#">Expeditions</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Trail
                                    Status</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Equipment
                                    Care</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline"
                                    href="#">Training</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-label-caps text-label-caps text-primary mb-6">RESOURCES</h4>
                        <ul class="space-y-4 font-body-sm">
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Safety
                                    Protocols</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">First Aid
                                    Guide</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Policy
                                    Paper</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline"
                                    href="#">Archieve</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-label-caps text-label-caps text-primary mb-6">LEGAL</h4>
                        <ul class="space-y-4 font-body-sm">
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Privacy
                                    Policy</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Terms of
                                    Use</a></li>
                            <li><a class="text-on-surface-variant hover:text-primary hover:underline" href="#">Code of
                                    Ethics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div
                class="flex flex-col md:flex-row justify-between items-center pt-gutter border-t border-outline-variant gap-4">
                <p class="font-body-sm text-on-surface-variant text-center md:text-left">© 2026 MAPALA Community..</p>
                <div class="flex gap-6">
                    <a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span
                            class="material-symbols-outlined">public</span></a>
                    <a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span
                            class="material-symbols-outlined">mail</span></a>
                    <a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span
                            class="material-symbols-outlined">share</span></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Mobile Nav Anchor -->
    <div
        class="md:hidden fixed bottom-0 left-0 right-0 bg-surface border-t-2 border-outline z-[100] flex justify-around items-center py-4 px-4">


    </div>
</body>

</html>>