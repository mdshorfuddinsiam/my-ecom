<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>One Shop || Forget Password</title>
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
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>forget password</h4>
                        <ul>
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="{{ route('password.request') }}">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        FORGET PASSWORD START
    ==============================-->
    <section id="wsus__login_register" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__forget_area">
                        <span class="qiestion_icon"><i class="fal fa-question-circle"></i></span>
                        <h4>forget password ?</h4>
                        <p>enter the email address to register with <span>e-shop</span></p>
                        <div class="wsus__login">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="wsus__login_input">
                                    <i class="fal fa-envelope"></i>
                                    {{-- <input type="password" placeholder="Your Email"> --}}
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Your Email" autocomplete="email" autofocus>
                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                </div>
                                <button class="common_btn" type="submit">send</button>
                            </form>
                        </div>
                        <a class="see_btn mt-4" href="{{ route('login') }}">go to login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        FORGET PASSWORD END
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