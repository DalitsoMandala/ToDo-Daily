<x-guest-layout>

    <style>
        .iti {
            width: 100%;
            display: block;
        }
    </style>
    <section class="mt-5 mb-6 bg-soft d-flex align-items-center">
        <div class="container">

            <div class="row justify-content-center form-bg-image "
            data-background-lg="{{ asset('./assets/img/illustrations/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="p-4 bg-white border-0 rounded shadow border-light p-lg-5 w-100 fmxw-500">
                        <div class="mb-4 text-center text-md-center mt-md-0">
                            <div>
                                <x-application-logo width="80" />
                            </div>
                            <h1 class="mb-0 h4">Sign Up </h1>
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="mt-4">
                            @csrf


                            <!-- Form -->
                            <div class="mb-2 form-group">
                                <label for="email">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <ion-icon name="person"></ion-icon>
                                    </span>
                                    <input type="name" class="form-control" placeholder="Username" id="name"
                                        autofocus name="name" required>


                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="mb-2 form-group">
                                <label for="email">Your Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <ion-icon name="mail"></ion-icon>
                                    </span>
                                    <input type="email" class="form-control" placeholder="example@company.com"
                                        id="email" autofocus name="email" required>


                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mb-2 form-group">
                                <label for="email">Your Phone number</label>
                                <div class="input-group">

                                    <input type="text" class="form-control flex-grow-1" placeholder="+2658889199"
                                        id="phone" autofocus name="phone" required>


                                </div>

                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <!-- Form -->
                                <div class="mb-2 form-group">
                                    <label for="password">Your Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <ion-icon name="lock-closed"></ion-icon>
                                        </span>
                                        <input type="password" placeholder="Password" class="form-control"
                                            id="password" required name="password">


                                    </div>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="mb-2 form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <ion-icon name="lock-closed"></ion-icon>
                                        </span>
                                        <input type="password" placeholder="Confirm Password" class="form-control"
                                            name="password_confirmation" id="confirm_password" required>


                                    </div>

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <!-- End of Form -->

                            </div>
                            <div class="mt-3 mb-4 d-grid">
                                <button type="submit" class="btn btn-gray-800">Sign up</button>
                            </div>
                        </form>
                        <div class="mt-3 mb-4 text-center">
                            <span class="fw-normal">or login with</span>
                        </div>

                        <div class="mt-4 d-flex justify-content-center align-items-center">
                            <span class="fw-normal">
                                Already have an account?
                                <a href="{{ route('login') }}" class="fw-bold">Login here</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
        <script>
            const input = document.querySelector("#phone");
            window.intlTelInput(input, {
                initialCountry: 'auto',
                nationalMode: false,
                autoHideDialCode: false,
                geoIpLookup: function(callback) {
                    $.get('http://ip-api.com/json',
                        function() {}, 'jsonp').always(function(resp) {

                        var countryCode = (resp && resp.country) ? resp.countryCode : 'MW';
                        callback(countryCode);
                    });


                },
                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            });
        </script>
    @endpush
</x-guest-layout>
