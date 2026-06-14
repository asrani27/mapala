<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Admin — MAPALA')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=JetBrains+Mono:wght@100..900&family=Montserrat:wght@100..900&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
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
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .shadow-none-tactile { box-shadow: 3px 3px 0 0 theme('colors.primary'); }
    </style>
    @stack('styles')
</head>
<body class="bg-surface-container-low text-on-surface font-body-md antialiased">
    <div class="flex h-screen overflow-hidden">
        @include('layouts.sidebar')
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-surface border-b-2 border-outline px-6 py-4 flex items-center justify-between sticky top-0 z-40">
                <div class="flex items-center gap-3">
                    <span class="font-label-caps text-label-caps text-primary">Admin Panel</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="font-body-sm text-on-surface-variant">{{ auth()->user()->name ?? '' }}</span>
                    <span class="bg-primary-container text-on-primary-container font-label-caps text-label-caps px-3 py-1 rounded-full">{{ auth()->user()->role ?? '' }}</span>
                </div>
            </header>
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
