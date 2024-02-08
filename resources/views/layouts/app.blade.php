<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Sweet Alert -->

        <link type="text/css" href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

        <!-- Notyf -->
        <link type="text/css" href="./vendor/notyf/notyf.min.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
            integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.css"
            integrity="sha512-oW+fEHZatXKwZQ5Lx5td2J93WJnSFLbnALFOFqy/pTuQyffi9gsUylGGZkD3DTSv8zkoOdU7MT7I6LTDcV8GBQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- Volt CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
        <link type="text/css" href="{{ asset('./css/volt.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('./css/style.css') }}">

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('./assets/img/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32"
            href="{{ asset('./assets/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16"
            href="{{ asset('./assets/img/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('./assets/img/favicon/site.webmanifest') }}">


        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}">
        <script src="{{ asset('vendor/fullcalendar/index.global.js') }}"></script>
        <script src='{{ asset('vendor/fullcalendar/index1.global.min.js') }}'></script>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

        <style>
            .table .thead-light th:first-child {
                border-bottom-left-radius: .5rem;
                border-top-left-radius: .5rem;
            }

            .table .thead-light th:last-child {
                border-bottom-right-radius: .5rem;
                border-top-right-radius: .5rem;
            }

            .table>thead {
                vertical-align: middle;
            }

            .table-hover tbody tr:hover td:first-child {

                border-bottom-left-radius: .5rem;
                border-top-left-radius: .5rem;
                /* Change this to your desired hover color */
            }

            .table-hover tbody tr:hover td:last-child {

                border-bottom-right-radius: .5rem;
                border-top-right-radius: .5rem;
                /* Change this to your desired hover color */
            }

            .bs5-rotate-90 {
                transform: rotate(90deg);
                transition: transform 0.2s ease-in-out;
            }

            .bs5-rotate-0 {
                transform: rotate(0deg);
                transition: transform 0.2s ease-in-out;
            }
        </style>



        @vite(['resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">

        <nav class="px-4 navbar navbar-dark navbar-theme-primary col-12 d-lg-none">
            <a class="navbar-brand me-lg-5" href="/">
                <x-application-logo />
            </a>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <nav id="sidebarMenu" class="text-white bg-gray-800 sidebar d-lg-block collapse" data-simplebar>
            <div class="px-4 pt-3 sidebar-inner">
                <div
                    class="pb-4 user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg me-4">
                            <img src="../../assets/img/team/profile-picture-3.jpg"
                                class="border-white card-img-top rounded-circle" alt="Bonnie Green">
                        </div>
                        <div class="d-block">
                            <h2 class="mb-3 h5">Hi, {{ Auth::user()->name }}</h2>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf



                                <a class="btn btn-secondary btn-sm d-inline-flex align-items-center"
                                    href="route('logout')"
                                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                                    <i class="text-dark bx bx-log-out me-2 fs-5"></i>
                                    {{ __('Log Out') }}
                                </a>
                            </form>

                        </div>
                    </div>
                    <div class="collapse-close d-md-none">
                        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                            aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <ul class="pt-3 nav flex-column pt-md-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link d-flex align-items-center">
                            <span class="sidebar-icon">
                                <img src="./assets/img/brand/TODODAILY.png" height="20" width="20"
                                    alt="Volt Logo">
                            </span>
                            <span class="mt-1 ms-1 sidebar-text text-secondary">ToDo-Daily</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('dashboard') }}" class="nav-link" wire:navigate>
                            <i class="bx bxs-tv me-3"></i>
                            <span class="sidebar-text">Dashboard</span>
                        </a>
                    </li>

                    <li
                        class="nav-item {{ request()->is('tasks') || request()->is('add-task') || request()->is('edit-task') ? 'active' : '' }} ">
                        <a href="{{ route('tasks') }}" class="nav-link" wire:navigate>
                            <i class='bx bx-check-shield me-3'></i>
                            <span class="sidebar-text">Tasks</span>
                        </a>
                    </li>


                    <li class="nav-item {{ request()->is('categories') ? 'active' : '' }}">
                        <a href="{{ route('categories') }}" class="nav-link" wire:navigate>
                            <i class='bx bx-list-ul me-3'></i>
                            <span class="sidebar-text">Categories</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->is('settings') ? 'active' : '' }}">
                        <a href="{{ route('settings') }}" class="nav-link" wire:navigate>
                            <i class='bx bxs-cog me-3'></i>
                            <span class="sidebar-text">Settings</span>
                        </a>
                    </li>





                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="#" href="route('logout')"
                                onclick="event.preventDefault();
                        this.closest('form').submit();"
                                class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
                                <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">

                                </span>
                                <span>Log Out</span>
                            </a>

                        </form>
                    </li>
                </ul>
            </div>

           
        </nav>


        <!-- Page Content -->
        <main class="content">
            @include('layouts.navigation')
            {{ $slot }}
            @include('layouts.footer')


        </main>



        <!-- Jquery -->

        <script data-navigate-once src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" data-navigate-once
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <!-- Vendor JS -->
        <script data-navigate-once src="{{ asset('./vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

        <!-- Slider -->
        <script data-navigate-once src="{{ asset('./vendor/nouislider/distribute/nouislider.min.js') }}"></script>

        <!-- Smooth scroll -->
        <script data-navigate-once src="{{ asset('./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

        <!-- Charts -->
        <script data-navigate-once src="{{ asset('./vendor/chartist/dist/chartist.min.js') }}"></script>
        <script data-navigate-once src="{{ asset('./vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
        </script>

        <!-- Datepicker -->
        <script data-navigate-once src="{{ asset('./vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

        <!-- Sweet Alerts 2 -->
        <script data-navigate-once src="{{ asset('./vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

        <!-- Moment JS -->
        <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

        <!-- Vanilla JS Datepicker -->
        <script data-navigate-once src="{{ asset('./vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

        <!-- Notyf -->
        <script data-navigate-once src="{{ asset('./vendor/notyf/notyf.min.js') }}"></script>

        <!-- Simplebar -->
        <script data-navigate-once src="{{ asset('./vendor/simplebar/dist/simplebar.min.js') }}"></script>

        <!-- Github buttons -->
        <script data-navigate-once async defer src="https://buttons.github.io/buttons.js"></script>


        <!-- Select2 -->
        <script data-navigate-once src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script data-navigate-once type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script data-navigate-once nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script data-navigate-once src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js"
            integrity="sha512-OrRY3yVhfDckdPBIjU2/VXGGDjq3GPcnILWTT39iYiuV6O3cEcAxkgCBVR49viQ99vBFeu+a6/AoFAkNHgFteg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link data-navigate-oncerel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">

        <script data-navigate-once src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />
        @stack('scripts')

        <script data-navigate-once src="{{ asset('assets/js/volt.js') }}"></script>


        <!-- Volt JS -->

    </body>

</html>
