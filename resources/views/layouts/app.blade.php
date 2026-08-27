<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} — Admin CMS</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_dondong_official_asli.jpg') }}">

    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        tropical: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052310',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Outfit', sans-serif; }

        /* Global Form Input Styles with Flexible Padding */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        input[type="url"],
        input[type="search"],
        input[type="tel"],
        select,
        textarea {
            display: block;
            width: 100%;
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            padding-left: 1rem;
            padding-right: 1rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.75rem;
            border: 1.5px solid #cbd5e1;
            background-color: #ffffff;
            color: #0f172a;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.15s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="number"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
            background-color: #ffffff;
        }

        input[type="checkbox"] {
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 0.375rem;
            border: 1.5px solid #94a3b8;
            color: #059669;
            cursor: pointer;
        }

        label {
            margin-bottom: 0.4rem;
            display: inline-block;
        }
    </style>
</head>
<body class="h-full antialiased text-slate-900 bg-slate-50 selection:bg-emerald-500 selection:text-white">
    <div class="min-h-screen flex flex-col justify-between">
        <div>
            @include('layouts.navigation')

            <!-- Page Heading Header -->
            @if (isset($header))
                <header class="bg-white border-b border-slate-200/80 shadow-xs">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content Slot -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Admin Global Footer -->
        <footer class="py-5 px-4 sm:px-8 border-t border-slate-200 text-center text-xs text-slate-500 bg-white">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/logo_dondong_official_asli.jpg') }}" alt="Logo" class="h-4 w-4 rounded object-cover">
                    <span class="font-extrabold text-slate-800">NutriSari DonDong CMS Portal</span>
                </div>
                <span>&copy; {{ date('Y') }} PT Nutrifood Indonesia. All rights reserved.</span>
            </div>
        </footer>
    </div>
</body>
</html>
