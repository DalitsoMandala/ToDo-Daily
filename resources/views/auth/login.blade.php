<x-guest-layout>
    <!-- Session Status -->


    <section class="mt-5 vh-lg-100 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">

            <div class="row justify-content-center form-bg-image"
                data-background-lg="{{ asset('./assets/img/illustrations/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="p-4 bg-white border-0 rounded shadow border-light p-lg-5 w-100 fmxw-500">
                        <div class="mb-4 text-center text-md-center mt-md-0">
                            <div>
                                <x-application-logo width="80" />
                            </div>
                            <h1 class="mb-0 h4">Sign in </h1>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="mt-4">
                            <!-- Form -->

                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            @csrf
                            <div class="mb-4 form-group">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <label for="email">Your Email or Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class='bx bx-envelope mx-2'></i>
                                    </span>
                                    <input type="email"
                                        class="form-control @error('email')
                                    is-invalid
                        @enderror"
                                        placeholder="example@company.com" id="email" autofocus name="email"
                                        value="{{ old('email') }}" required>


                                </div>
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="mb-4 form-group">
                                    <label for="password">Your Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="bx bx-key mx-2"></i>
                                        </span>
                                        <input type="password" placeholder="Password"
                                            class="form-control @error('email')
                                                    is-invalid
                                        @enderror"
                                            name="password" id="password" required value="{{ old('password') }}">


                                    </div>

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <!-- End of Form -->
                                <div class="mb-4 d-flex justify-content-between align-items-top">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="mb-0 form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-right small">Lost
                                                password?</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-gray-800">Sign in</button>
                            </div>
                        </form>
                        <div class="mt-3 mb-4 text-center d-none">
                            <span class="fw-normal">or login with</span>
                        </div>
                        <div class="my-4 d-flex justify-content-center d-none">
                            <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                aria-label="facebook button" title="facebook button">
                                <ion-icon name="logo-google"></ion-icon>
                            </a>


                        </div>
                        <div class="mt-4 d-flex justify-content-center align-items-center">
                            <span class="fw-normal">
                                Not registered?
                                <a href="{{ route('register') }}" class="fw-bold">Create account</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
