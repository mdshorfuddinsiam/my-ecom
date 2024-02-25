<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>One Shop || admin Reset Password</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    {{-- toaster css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
    <!-- <link rel="stylesheet" href="{{ asset('frontend') }}/css/rtl.css"> -->
</head>

<body>

    <!--============================
        BREADCRUMB START
    ==============================-->
    {{-- <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>admin reset password</h4>
                        <ul>
                            <li><a href="{{ route('admin.login') }}">admin login</a></li>
                            <li><a href="{{ route('admin.password.request') }}">admin reset password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        ADMIN RESET PASSWORD START
    ==============================-->
    <section id="wsus__login_register" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="wsus__change_password">
                            <h4>admin reset password</h4>
                            <div class="wsus__single_pass">
                                <label>email address</label>
                                {{-- <input type="text" placeholder="Current Password"> --}}
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" autocomplete="email" autofocus>
                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="wsus__single_pass">
                                <label>new password</label>
                                {{-- <input type="text" placeholder="New Password"> --}}
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="New Password" autocomplete="new-password">
                                {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="wsus__single_pass">
                                <label>confirm password</label>
                                {{-- <input type="text" placeholder="Confirm Password"> --}}
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password">
                            </div>
                            <button class="common_btn" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        ADMIN RESET PASSWORD END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('frontend') }}/js/jquery-3.6.0.min.js"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend') }}/js/Font-Awesome.js"></script>
    {{-- toaster js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.options.closeButton = true;
                toastr.error('{{ $error }}');
            @endforeach
        @endif
        @if (session('status'))
            toastr.options.closeButton = true;
            toastr.success('{{ session('status') }}');
        @endif
    </script>
</body>

</html>