<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#051108]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Admin — Dong CMS</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo_dondong_official_asli.svg') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo_dondong_official_asli.svg') }}">

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

        .auth-input {
            display: block !important;
            width: 100% !important;
            padding: 0.85rem 1rem 0.85rem 2.75rem !important; /* 14px vertical, 16px horizontal */
            font-size: 0.875rem !important;
            line-height: 1.5 !important;
            border-radius: 0.75rem !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #ffffff !important;
            transition: all 0.15s ease-in-out !important;
        }

        .auth-input:focus {
            outline: none !important;
            border-color: #22c55e !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.25) !important;
        }
    </style>
</head>
<body class="h-full antialiased text-slate-100 bg-[#051108] selection:bg-green-500 selection:text-white">
    {{ $slot }}
</body>
</html>
