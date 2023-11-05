<div>
    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Choose Signup -->
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-back">
                            <a href="/" class="flex"><img src="{{ asset('assets/imgs/undo-icon.svg') }}" class="me-2" alt="icon">Back
                                To Home</a>
                        </div>
                        <div class="login-header">
                            <h3>Sign Up</h3>
                        </div>


                        <div class="row">

                            <!-- Provider Signup -->
                            <div class="col-md-6 d-flex">
                                <div class="choose-signup flex-fill">
                                    <h6>Providers</h6>
                                    <div class="choose-img">
                                        <img src="{{ asset('assets/imgs/provider.png') }}" alt="">
                                    </div>
                                    <a href="/provider-register" class="btn btn-secondary w-100">Sign Up<i
                                            class="feather-arrow-right-circle ms-1"></i></a>
                                </div>
                            </div>
                            <!-- /Provider Signup -->

                            <!-- User Signup -->
                            <div class="col-md-6 d-flex">
                                <div class="choose-signup flex-fill mb-0">
                                    <h6>Users</h6>
                                    <div class="choose-img">
                                        <img src="{{ asset('assets/imgs/user.png') }}" alt="">
                                    </div>
                                    <a href="{{ route('register') }}" class="btn btn-secondary w-100">Sign Up<i
                                            class="feather-arrow-right-circle ms-1"></i></a>
                                </div>
                            </div>
                            <!-- /User Signup -->

                        </div>

                    </div>
                </div>
                <!-- /Choose Signup -->

            </div>

        </div>
    </div>
</div>