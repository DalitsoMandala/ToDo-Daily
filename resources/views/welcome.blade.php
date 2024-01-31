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
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="antialiased">
        <main>

            <!-- Hero -->
            <section class="overflow-hidden text-white section-header pt-7 pt-lg-8 pb-9 pb-lg-12 bg-primary vh-100"
                style="background-image:url('./assets/img/homepage.jpg'); background-repeat:no-repeat; object-fit:cover; background-size:cover">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="text-center col-8">

                            <div>
                                <img src="./assets/img/brand/TODODAILY.png" width="60" alt="">
                            </div>

                            <h1 class="fw-bolder">Welcome to <span class="d-block text-secondary">ToDo-Daily</span></h1>
                            <h2 class="mb-5 lead fw-normal text-muted">Stay organized, prioritize your work, and achieve
                                your goals with our intuitive and easy-to-use To-Do List application. Never miss a
                                deadline
                                and boost your productivity. Get started now!</h2>
                            <!-- Button Modal -->
                            <div class="mb-5 d-flex align-items-center justify-content-center">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ route('dashboard') }}"
                                            class="btn btn-secondary align-items-center me-4">
                                            <ion-icon name="apps" class="mx-2"></ion-icon>



                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-secondary align-items-center me-4">
                                            <ion-icon name="key" class="mx-2"></ion-icon>
                                            Login
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="btn btn-white d-inline-flex align-items-center me-4">
                                                <ion-icon name="person-add" class="mx-2"></ion-icon>

                                                Register
                                            </a>
                                        @endif


                                    @endauth

                                @endif
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </main>


        <!-- Core -->
        <script src="{{ asset('./vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('./vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- Vendor JS -->
        <script src="{{ asset('./vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

        <!-- Slider -->
        <script src="{{ asset('./vendor/nouislider/distribute/nouislider.min.js') }}"></script>

        <!-- Smooth scroll -->
        <script src="{{ asset('./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

        <!-- Charts -->
        <script src="{{ asset('./vendor/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('./vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

        <!-- Datepicker -->
        <script src="{{ asset('./vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

        <!-- Sweet Alerts 2 -->
        <script src="{{ asset('./vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

        <!-- Moment JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

        <!-- Vanilla JS Datepicker -->
        <script src="{{ asset('./vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

        <!-- Notyf -->
        <script src="{{ asset('./vendor/notyf/notyf.min.js') }}"></script>

        <!-- Simplebar -->
        <script src="{{ asset('./vendor/simplebar/dist/simplebar.min.js') }}"></script>

        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>



        <!-- Jquery -->

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
            integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js"
            integrity="sha512-OrRY3yVhfDckdPBIjU2/VXGGDjq3GPcnILWTT39iYiuV6O3cEcAxkgCBVR49viQ99vBFeu+a6/AoFAkNHgFteg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
        @stack('scripts')
        <!-- Volt JS -->
        <script src="{{ asset('./assets/js/volt.js') }}"></script>
    </body>

</html>
