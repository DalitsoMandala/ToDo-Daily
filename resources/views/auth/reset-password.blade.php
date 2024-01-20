<x-guest-layout>

    <section class="mt-5 vh-lg-100 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">

            <div class="row justify-content-center form-bg-image"
                data-background-lg="{{ asset('./assets/img/illustrations/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="p-4 bg-white border-0 rounded shadow border-light p-lg-5 w-100 fmxw-500">
                        <div class="mb-4 text-center text-md-center mt-md-0">
                            <h1 class="text-secondary">ToDo-Daily</h1>
                            <p class="text-center"><a href="./sign-in.html"
                                    class="d-flex align-items-center justify-content-center"><- Back to log in</a>
                            </p>
                        </div>
                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf



                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <h1 class="h3">Reset Password</h1>

                            <div class="mb-4 form-group">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <label for="email">Your Email </label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <ion-icon name="mail"></ion-icon>
                                    </span>
                                    <input type="email"
                                        class="form-control @error('email')
                                        is-invalid
                                            @enderror"
                                        readonly placeholder="example@company.com/+26599999999" id="email" autofocus
                                        value="{{ $request->get('email') }}" name="email" required>


                                </div>
                            </div>
                            <div class="mb-4 form-group"><label for="password">New
                                    Password</label>
                                <div class="input-group"><span class="input-group-text" id="basic-addon2"> <ion-icon
                                            name="lock-closed"></ion-icon> </span><input type="password"
                                        placeholder="Password" class="form-control" id="password" required=""
                                        name="password"></div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="mb-4 form-group"><label for="confirm_password">Confirm
                                    Password</label>
                                <div class="input-group"><span class="input-group-text" id="basic-addon2"> <ion-icon
                                            name="lock-closed"></ion-icon> </span><input type="password"
                                        placeholder="Confirm Password" class="form-control" id="confirm_password"
                                        required="" name="password_confirmation"></div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="d-grid"><button type="submit" class="btn btn-gray-800">Reset
                                    password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
