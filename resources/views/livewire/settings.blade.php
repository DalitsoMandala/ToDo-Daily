<div>

    <style>
        .card-header-tabs .nav-link.active {
            border-bottom: 2px solid #1F2937;
        }
    </style>
    <div class="container my-5">

        <div class="row">
            {{-- Status --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error-message'))
                <div class="alert alert-danger">
                    {{ session('error-message') }}
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" wire:ignore
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                    aria-selected="true">
                                    <i class="fas fa-home"></i>
                                    Personal Details
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <i class="far fa-user"></i>
                                    Change Password
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="personalDetails" role="tabpanel" wire:ignore.self>
                                <form wire:submit='personalDetails'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="firstnameInput" class="form-label">First
                                                    Name</label>
                                                <input type="text" class="form-control" id="firstnameInput"
                                                    placeholder="Enter your firstname" wire:model='first_name'>

                                                @error('first_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="lastnameInput" class="form-label">Last
                                                    Name</label>
                                                <input type="text" class="form-control" id="lastnameInput"
                                                    placeholder="Enter your lastname" wire:model='last_name'>
                                                @error('last_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="phonenumberInput" class="form-label">Phone
                                                    Number</label>
                                                <input type="text" class="form-control" id="phonenumberInput"
                                                    placeholder="Enter your phone number" wire:model='phone_number'>
                                                @error('phone_number')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Email
                                                    Address</label>
                                                <input type="email" class="form-control" id="emailInput"
                                                    placeholder="Enter your email" wire:model='email'>
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->


                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                                <button type="button" class="btn btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <!--end tab-pane-->
                            <div class="tab-pane" id="changePassword" role="tabpanel" wire:ignore.self>
                                <form wire:submit='credentials'>
                                    <div class="row g-2">
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="oldpasswordInput" class="form-label">Old
                                                    Password*</label>
                                                <input type="password" class="form-control" id="oldpasswordInput"
                                                    placeholder="Enter current password" wire:model='oldPassword'>
                                                @error('oldPassword')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="newpasswordInput" class="form-label">New
                                                    Password*</label>
                                                <input type="password" class="form-control" id="newpasswordInput"
                                                    placeholder="Enter new password" wire:model='newPassword'>
                                                @error('newPassword')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-4">
                                            <div>
                                                <label for="confirmpasswordInput" class="form-label">Confirm
                                                    Password*</label>
                                                <input type="password" class="form-control" id="confirmpasswordInput"
                                                    placeholder="Confirm password"
                                                    wire:model='newPassword_confirmation'>
                                                @error('newPassword_confirmation')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <a href="#" wire:click='logout'
                                                    class="link-primary text-decoration-underline">Forgot
                                                    Password ?</a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Change
                                                    Password</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>

                            </div>
                            <!--end tab-pane-->


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
