<x-guest-layout>

    <section class="mt-5 vh-lg-100 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">

            <div class="row justify-content-center form-bg-image"
                data-background-lg="{{ asset('./assets/img/illustrations/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="p-4 bg-white border-0 rounded shadow border-light p-lg-5 w-100 fmxw-500">
                        <div class="mb-4 text-center text-md-center mt-md-0">
                            <h1 class="text-secondary">ToDo-Daily</h1>
                            <p class="text-center"><a href="{{ route('login') }}"
                                    class="d-flex align-items-center justify-content-center"><- Back to log in</a></p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <h1 class="h3">Forgot your password?</h1>
                            <p class="mb-4">No problem. Just let us know your email address and we will email you a
                                password reset link that will allow you to choose a new one.</p>

                            <div class="mb-4"><label for="email">Your Email</label>
                                <div class="input-group"><input type="email" class="form-control" id="email"
                                        placeholder="john@company.com" required="" :value="old('email')"
                                        name="email" autofocus=""></div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="d-grid"><button type="submit" class="btn btn-gray-800">Recover
                                    password</button></div>



                            <div class="mt-3 mb-4 text-center d-none">
                                <span class="fw-normal">or login with</span>
                            </div>
                            <div class="my-4 d-flex justify-content-center d-none">
                                <a href="#" class="btn btn-icon-only btn-pill btn-outline-gray-500 me-2"
                                    aria-label="facebook button" title="facebook button">
                                    <ion-icon name="logo-google"></ion-icon>
                                </a>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
