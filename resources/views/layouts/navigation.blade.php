<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') ===
            'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' &&
            window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>
    <!-- Apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
    <style type="text/css">
        .apexcharts-tooltip.apexcharts-theme-light {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

@php
    function isActive($page)
    {
        if ($page) {
            return 'bg-slate-600 text-white hover:sg-slate-500';
        } else {
            return 'text-gray-800 hover:bg-gray-200';
        }
    }
@endphp

<body class="bg-gray-50 dark:bg-neutral-900">
    <!-- ========== HEADER ========== -->
    <header
        class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-48 w-full bg-white border-b border-gray-200 text-sm py-2.5 lg:ps-65 dark:bg-neutral-800 dark:border-neutral-700">
        <nav class="flex items-center w-full px-4 mx-auto sm:px-6 basis-full">
            <div class="flex items-center justify-end w-full ms-auto md:justify-between gap-x-1 md:gap-x-3">
                <div class="hidden md:block">
                    <!-- Search Input -->
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                            <svg class="text-gray-400 shrink-0 size-4 dark:text-white/60"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <input type="text"
                            class="block w-full py-2 text-sm bg-white border-gray-200 rounded-lg ps-10 pe-16 focus:outline-hidden focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Cari Data KIB">
                        <div class="absolute inset-y-0 z-20 flex items-center pointer-events-none end-0 pe-1">
                            <button type="button"
                                class="inline-flex items-center justify-center text-gray-500 rounded-full shrink-0 size-6 hover:text-blue-600 focus:outline-hidden focus:text-blue-600"
                                aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="m15 9-6 6" />
                                    <path d="m9 9 6 6" />
                                </svg>
                            </button>
                        </div>
                        <div
                            class="absolute inset-y-0 z-20 flex items-center text-gray-400 pointer-events-none end-0 pe-3">
                            <svg class="text-gray-400 shrink-0 size-3 dark:text-white/60"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
                            </svg>
                            <span class="mx-1">
                                <svg class="text-gray-400 shrink-0 size-3 dark:text-white/60"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                            </span>
                            <span class="text-xs">/</span>
                        </div>
                    </div>
                    <!-- End Search Input -->
                </div>

                <div class="flex flex-row items-center justify-end gap-1">
                    <button type="button"
                        class="md:hidden size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-slate-900 focus:outline-hidden focus:bg-slate-900 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>

                    <button type="button"
                        class="size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                        <span class="sr-only">Notifications</span>
                    </button>

                    <button type="button"
                        class="size-9.5 relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                        </svg>
                        <span class="sr-only">Activity</span>
                    </button>

                    <!-- Dropdown -->
                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-dropdown-account" type="button"
                            class="size-9.5 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <img class="shrink-0 size-9.5 rounded-full"
                                src="{{ asset('assets/images/icons/pj.png') }}" alt="Avatar">
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                            <div class="px-5 py-3 bg-gray-100 rounded-t-lg">
                                <p class="text-sm text-gray-500">Signed in as</p>
                                <p class="text-sm font-medium text-gray-800">james@site.com</p>
                            </div>
                            <div class="p-1.5 space-y-0.5">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                    href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                                    </svg>
                                    Newsletter
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                    href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                                        <path d="M3 6h18" />
                                        <path d="M16 10a4 4 0 0 1-8 0" />
                                    </svg>
                                    Purchases
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                    href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                        <path d="M12 12v9" />
                                        <path d="m8 17 4 4 4-4" />
                                    </svg>
                                    Downloads
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                    href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    Team Account
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Dropdown -->
                </div>
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Breadcrumb -->
    <div
        class="sticky inset-x-0 top-0 z-20 px-4 bg-white border-gray-200 border-y sm:px-6 lg:px-8 lg:hidden dark:bg-neutral-800 dark:border-neutral-700">
        <div class="flex items-center py-2">
            <!-- Navigation Toggle -->
            <button type="button"
                class="flex items-center justify-center text-gray-800 border border-gray-200 rounded-lg size-8 gap-x-2 hover:text-gray-500 focus:outline-hidden focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
                aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m8 9 3 3-3 3" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->

            <!-- Breadcrumb -->
            <ol class="flex items-center ms-3 whitespace-nowrap">
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    Application Layout
                    <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500"
                        width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    Dashboard
                </li>
            </ol>
            <!-- End Breadcrumb -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Sidebar -->
    <div id="hs-application-sidebar"
        class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-65 h-full
    hidden
    fixed inset-y-0 start-0 z-60
    bg-sky-600 border-e text-white border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0"
        role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="relative flex flex-col h-full max-h-full">
            <div class="flex items-center px-6 py-4">
                <!-- Logo -->
                <a class="flex-none inline-block text-xl font-semibold rounded-xl focus:outline-hidden focus:opacity-80"
                    href="#" aria-label="Preline">
                    <h2 class="">Klinik Puniyati App</h2>
                </a>
                <!-- End Logo -->
            </div>

            <!-- Content -->
            <div
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-100 bg-slate-800 text-white">
                <nav class="flex flex-col flex-wrap w-full p-3 hs-accordion-group" data-hs-accordion-always-open>
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <a class="flex items-center flex-row gap-x-3.5 py-1 px-2.5 {{ isActive(request()->routeIs('dashboard')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                href="{{ route('dashboard') }}">
                                <i class="text-xl ri-home-3-line"></i>
                                Dashboard
                            </a>
                        </li>

                        <li class="hs-accordion" id="users-accordion">
                            <button type="button"
                                class="hs-accordion-toggle w-full text-start flex flex-row justify-between items-center gap-3 py-1 px-2.5 rounded-lg {{ isActive(request()->is('dashboard/masterdata/*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                aria-expanded="true" aria-controls="users-accordion-child">
                                <span class="flex flex-row items-center gap-3">
                                    <i class="text-xl ri-pie-chart-line"></i>
                                    Master Data
                                </span>

                                <i class="text-xl ri-arrow-down-s-line"></i>
                            </button>

                            <div id="users-accordion-child"
                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                role="region" aria-labelledby="users-accordion">
                                <ul class="pt-1 space-y-1 hs-accordion-group ps-8" data-hs-accordion-always-open>
                                    <ul class="pt-1 space-y-1">
                                        <li>
                                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg {{ isActive(request()->routeIs('bidan.*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                                href="{{ route('bidan.index') }}">
                                                Data Bidan
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg {{ isActive(request()->routeIs('pasien.*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                                href="#">
                                                Data Pasien
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg {{ isActive(request()->routeIs('pelayanan.*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                                href="#">
                                                Data Pelayanan
                                            </a>
                                        </li>
                                        <li>
                                            <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg {{ isActive(request()->routeIs('obat.*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                                href="#">
                                                Data Obat
                                            </a>
                                        </li>

                                        {{-- <li class="hs-accordion" id="users-accordion-sub-1">
                                            <button type="button"
                                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200"
                                                aria-expanded="true" aria-controls="users-accordion-sub-1-child">
                                                Sub Menu 1

                                                <svg class="hidden hs-accordion-active:block ms-auto size-4"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m18 15-6-6-6 6" />
                                                </svg>

                                                <svg class="block hs-accordion-active:hidden ms-auto size-4"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </button>

                                            <div id="users-accordion-sub-1-child"
                                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                                                role="region" aria-labelledby="users-accordion-sub-1">
                                                <ul class="pt-1 space-y-1">
                                                    <li>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-slate-900 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200"
                                                            href="#">
                                                            Link 1
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-slate-900 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200"
                                                            href="#">
                                                            Link 2
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-slate-900 focus:outline-hidden focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 dark:text-neutral-200"
                                                            href="#">
                                                            Link 3
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> --}}
                                    </ul>
                            </div>
                        </li>

                        <li>
                            <a class="flex items-center flex-row gap-x-3.5 py-1 px-2.5 {{ isActive(request()->routeIs('pendaftaran.*')) }} text-sm rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                href="{{ route('pendaftaran.index') }}">
                                <i class="text-xl ri-user-line"></i>
                                Pendaftaran Pasien
                            </a>
                        </li>

                        <li>
                            <a class="flex items-center flex-row gap-x-3.5 py-1 px-2.5 text-sm  {{ isActive(request()->routeIs('pemeriksaan.*')) }} rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                href="{{ route('pemeriksaan.index') }}">
                                <i class="text-xl ri-survey-line"></i>
                                Pemeriksaan
                            </a>
                        </li>

                        <li>
                            <a class="flex items-center flex-row gap-x-3.5 py-1 px-2.5 text-sm  {{ isActive(request()->routeIs('pembayaran.*')) }} rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                href="{{ route('pembayaran.index') }}">
                                <i class="text-xl ri-coins-line"></i>
                                Pembayaran
                            </a>
                        </li>

                        <li>
                            <a class="flex items-center flex-row gap-x-3.5 py-1 px-2.5 text-sm  {{ isActive(request()->routeIs('laporan.*')) }} rounded-lg focus:outline-hidden hover:bg-slate-700 focus:outline-hidden focus:bg-slate-900 text-white"
                                href="{{ route('laporan.index') }}">
                                <i class="text-xl ri-database-line"></i>
                                Laporan
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Content -->
        </div>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    {{-- <div class="w-full lg:ps-64">
        <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
            <!-- Grid -->
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                <!-- Card -->
                <div
                    class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">
                                Total users
                            </p>
                            <div class="hs-tooltip">
                                <div class="hs-tooltip-toggle">
                                    <svg class="text-gray-500 shrink-0 size-4 dark:text-neutral-500"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                        <path d="M12 17h.01" />
                                    </svg>
                                    <span
                                        class="absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white transition-opacity bg-gray-900 rounded-md opacity-0 hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible shadow-2xs dark:bg-neutral-700"
                                        role="tooltip">
                                        The number of daily users
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                72,540
                            </h3>
                            <span class="flex items-center text-green-600 gap-x-1">
                                <svg class="self-center inline-block size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                                    <polyline points="16 7 22 7 22 13" />
                                </svg>
                                <span class="inline-block text-sm">
                                    1.7%
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">
                                Sessions
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                29.4%
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">
                                Avg. Click Rate
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                56.8%
                            </h3>
                            <span class="flex items-center text-red-600 gap-x-1">
                                <svg class="self-center inline-block size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />
                                    <polyline points="16 17 22 17 22 11" />
                                </svg>
                                <span class="inline-block text-sm">
                                    1.7%
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs text-gray-500 uppercase dark:text-neutral-500">
                                Pageviews
                            </p>
                        </div>

                        <div class="flex items-center mt-1 gap-x-2">
                            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                92,913
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->

            <div class="grid gap-4 lg:grid-cols-2 sm:gap-6">
                <!-- Card -->
                <div
                    class="p-4 md:p-5 min-h-102.5 flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div>
                            <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                                Income
                            </h2>
                            <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                $126,238.49
                            </p>
                        </div>

                        <div>
                            <span
                                class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 5v14" />
                                    <path d="m19 12-7 7-7-7" />
                                </svg>
                                25%
                            </span>
                        </div>
                    </div>
                    <!-- End Header -->

                    <div id="hs-multiple-bar-charts"></div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="p-4 md:p-5 min-h-102.5 flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <div>
                            <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                                Visitors
                            </h2>
                            <p class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                                80.3k
                            </p>
                        </div>

                        <div>
                            <span
                                class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500">
                                <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 5v14" />
                                    <path d="m19 12-7 7-7-7" />
                                </svg>
                                2%
                            </span>
                        </div>
                    </div>
                    <!-- End Header -->

                    <div id="hs-single-area-chart"></div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div> --}}
    <!-- End Content -->

    <div class="w-full lg:ps-64">
        <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
            {{ $slot }}
        </div>
    </div>

    <!-- JS Implementing Plugins -->

    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/index.js"></script>
    <!-- Apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/lodash/lodash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/helper-apexcharts.js"></script>

    <script>
        window.addEventListener("load", () => {
            (function() {
                buildChart(
                    "#hs-multiple-bar-charts",
                    (mode) => ({
                        chart: {
                            type: "bar",
                            height: 300,
                            toolbar: {
                                show: false,
                            },
                            zoom: {
                                enabled: false,
                            },
                        },
                        series: [{
                                name: "Chosen Period",
                                data: [
                                    23000, 44000, 55000, 57000, 56000, 61000, 58000, 63000,
                                    60000,
                                    66000, 34000, 78000,
                                ],
                            },
                            {
                                name: "Last Period",
                                data: [
                                    17000, 76000, 85000, 101000, 98000, 87000, 105000, 91000,
                                    114000,
                                    94000, 67000, 66000,
                                ],
                            },
                        ],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "16px",
                                borderRadius: 0,
                            },
                        },
                        legend: {
                            show: false,
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            show: true,
                            width: 8,
                            colors: ["transparent"],
                        },
                        xaxis: {
                            categories: [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December",
                            ],
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                            crosshairs: {
                                show: false,
                            },
                            labels: {
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                offsetX: -2,
                                formatter: (title) => title.slice(0, 3),
                            },
                        },
                        yaxis: {
                            labels: {
                                align: "left",
                                minWidth: 0,
                                maxWidth: 140,
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                formatter: (value) => (value >= 1000 ? `${value / 1000}k` : value),
                            },
                        },
                        states: {
                            hover: {
                                filter: {
                                    type: "darken",
                                    value: 0.9,
                                },
                            },
                        },
                        tooltip: {
                            y: {
                                formatter: (value) =>
                                    `$${value >= 1000 ? `${value / 1000}k` : value}`,
                            },
                            custom: function(props) {
                                const {
                                    categories
                                } = props.ctx.opts.xaxis;
                                const {
                                    dataPointIndex
                                } = props;
                                const title = categories[dataPointIndex];
                                const newTitle = `${title}`;

                                return buildTooltip(props, {
                                    title: newTitle,
                                    mode,
                                    hasTextLabel: true,
                                    wrapperExtClasses: "min-w-28",
                                    labelDivider: ":",
                                    labelExtClasses: "ms-2",
                                });
                            },
                        },
                        responsive: [{
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                plotOptions: {
                                    bar: {
                                        columnWidth: "14px",
                                    },
                                },
                                stroke: {
                                    width: 8,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                    formatter: (title) => title.slice(0, 3),
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) =>
                                            value >= 1000 ? `${value / 1000}k` : value,
                                    },
                                },
                            },
                        }, ],
                    }), {
                        colors: ["#2563eb", "#d1d5db"],
                        grid: {
                            borderColor: "#e5e7eb",
                        },
                    }, {
                        colors: ["#6b7280", "#2563eb"],
                        grid: {
                            borderColor: "#404040",
                        },
                    }
                );
            })();
        });
    </script>
    <script>
        window.addEventListener("load", () => {
            (function() {
                buildChart(
                    "#hs-single-area-chart",
                    (mode) => ({
                        chart: {
                            height: 300,
                            type: "area",
                            toolbar: {
                                show: false,
                            },
                            zoom: {
                                enabled: false,
                            },
                        },
                        series: [{
                            name: "Visitors",
                            data: [180, 51, 60, 38, 88, 50, 40, 52, 88, 80, 60, 70],
                        }, ],
                        legend: {
                            show: false,
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            curve: "straight",
                            width: 2,
                        },
                        grid: {
                            strokeDashArray: 2,
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                opacityFrom: 0.1,
                                opacityTo: 0.8,
                            },
                        },
                        xaxis: {
                            type: "category",
                            tickPlacement: "on",
                            categories: [
                                "25 January 2023",
                                "26 January 2023",
                                "27 January 2023",
                                "28 January 2023",
                                "29 January 2023",
                                "30 January 2023",
                                "31 January 2023",
                                "1 February 2023",
                                "2 February 2023",
                                "3 February 2023",
                                "4 February 2023",
                                "5 February 2023",
                            ],
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                            crosshairs: {
                                stroke: {
                                    dashArray: 0,
                                },
                                dropShadow: {
                                    show: false,
                                },
                            },
                            tooltip: {
                                enabled: false,
                            },
                            labels: {
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                formatter: (title) => {
                                    let t = title;

                                    if (t) {
                                        const newT = t.split(" ");
                                        t = `${newT[0]} ${newT[1].slice(0, 3)}`;
                                    }

                                    return t;
                                },
                            },
                        },
                        yaxis: {
                            labels: {
                                align: "left",
                                minWidth: 0,
                                maxWidth: 140,
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                formatter: (value) => (value >= 1000 ? `${value / 1000}k` : value),
                            },
                        },
                        tooltip: {
                            x: {
                                format: "MMMM yyyy",
                            },
                            y: {
                                formatter: (value) =>
                                    `${value >= 1000 ? `${value / 1000}k` : value}`,
                            },
                            custom: function(props) {
                                const {
                                    categories
                                } = props.ctx.opts.xaxis;
                                const {
                                    dataPointIndex
                                } = props;
                                const title = categories[dataPointIndex].split(" ");
                                const newTitle = `${title[0]} ${title[1]}`;

                                return buildTooltip(props, {
                                    title: newTitle,
                                    mode,
                                    valuePrefix: "",
                                    hasTextLabel: true,
                                    markerExtClasses: "rounded-sm!",
                                    wrapperExtClasses: "min-w-28",
                                });
                            },
                        },
                        responsive: [{
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                    formatter: (title) => title.slice(0, 3),
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) =>
                                            value >= 1000 ? `${value / 1000}k` : value,
                                    },
                                },
                            },
                        }, ],
                    }), {
                        colors: ["#2563eb", "#9333ea"],
                        fill: {
                            gradient: {
                                stops: [0, 90, 100],
                            },
                        },
                        grid: {
                            borderColor: "#e5e7eb",
                        },
                    }, {
                        colors: ["#3b82f6", "#a855f7"],
                        fill: {
                            gradient: {
                                stops: [100, 90, 0],
                            },
                        },
                        grid: {
                            borderColor: "#404040",
                        },
                    }
                );
            })();
        });
    </script>

</body>

</html>
