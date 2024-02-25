
<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->
  <head><base href="../../../">
    <title>Metronic - Sign Up</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, Bootstrap, Bootstrap 5, Angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask &amp; Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('backend') }}/assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body data-kt-name="metronic" id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
      <!--begin::Page bg image-->
      <style>body { background-image: url('{{ asset('backend') }}/assets/media/auth/bg4.jpg'); } [data-theme="dark"] body { background-image: url('{{ asset('backend') }}/assets/media/auth/bg4-dark.jpg'); }</style>
      <!--end::Page bg image-->
      <!--begin::Authentication - Sign-up -->
      <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!--begin::Aside-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
          <!--begin::Aside-->
          <div class="d-flex flex-column">
            <!--begin::Logo-->
            <a href="../../demo1/dist/index.html" class="mb-7">
              <img alt="Logo" src="{{ asset('backend') }}/assets/media/logos/custom-3.svg" />
            </a>
            <!--end::Logo-->
            <!--begin::Title-->
            <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
            <!--end::Title-->
          </div>
          <!--begin::Aside-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-center w-lg-50 p-10">
          <!--begin::Card-->
          <div class="card rounded-3 w-md-550px">
            <!--begin::Card body-->
            <div class="card-body p-10 p-lg-20">
              <!--begin::Form-->
              <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('admin.login') }}" action="{{ route('admin.register') }}" method="POST">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                  <!--begin::Title-->
                  <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>
                  <!--end::Title-->
                  <!--begin::Subtitle-->
                  <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                  <!--end::Subtitle=-->
                </div>
                <!--begin::Heading-->
                <!--begin::Login options-->
                <div class="row g-3 mb-9">
                  <!--begin::Col-->
                  <div class="col-md-6">
                    <!--begin::Google link=-->
                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ asset('backend') }}/assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
                    <!--end::Google link=-->
                  </div>
                  <!--end::Col-->
                  <!--begin::Col-->
                  <div class="col-md-6">
                    <!--begin::Google link=-->
                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ asset('backend') }}/assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
                    <img alt="Logo" src="{{ asset('backend') }}/assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                    <!--end::Google link=-->
                  </div>
                  <!--end::Col-->
                </div>
                <!--end::Login options-->
                <!--begin::Separator-->
                <div class="separator separator-content my-14">
                  <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                </div>
                <!--end::Separator-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                  <!--begin::Name-->
                  <input type="text"  id="name" name="name" class="form-control bg-transparent @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Name" autocomplete="name"   />
                  <!--end::Name-->
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <!--begin::Input group-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                  <!--begin::Email-->
                  <input type="email"  id="email" name="email" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" autocomplete="email" />
                  <!--end::Email-->
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <!--begin::Input group-->
                <div class="fv-row mb-8" data-kt-password-meter="true">
                  <!--begin::Wrapper-->
                  <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                      <input id="password" type="password" class="form-control bg-transparent @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password" >
                      <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                      </span>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                      <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                      <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                      <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                      <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                  </div>
                  <!--end::Wrapper-->
                  <!--begin::Hint-->

                  {{-- <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div> --}}

                  <!--end::Hint-->
                </div>
                <!--end::Input group=-->
                <!--end::Input group=-->
                <div class="fv-row mb-8">
                  <!--begin::Repeat Password-->
                  <input id="confirmed" type="password" class="form-control bg-transparent" name="confirmed" placeholder="Repeat Password" autocomplete="off" >
                  {{-- <input id="password-confirm" type="password" class="form-control bg-transparent" name="password_confirmation" placeholder="Repeat Password" autocomplete="new-password" > --}}
                  <!--end::Repeat Password-->
                </div>
                <!--end::Input group=-->
                <!--begin::Accept-->
                <div class="fv-row mb-8">
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                    <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
                    <a href="#" class="ms-1 link-primary">Terms</a></span>
                  </label>
                </div>
                <!--end::Accept-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                  <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Sign up</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                  </button>
                </div>
                <!--end::Submit button-->
                <!--begin::Sign up-->
                <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                <a href="{{ route('admin.login') }}" class="link-primary fw-semibold">Sign in</a></div>
                <!--end::Sign up-->
              </form>
              <!--end::Form-->
            </div>
            <!--end::Card body-->
          </div>
          <!--end::Card-->
        </div>
        <!--end::Body-->
      </div>
      <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>var hostUrl = "assets/";</script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('backend') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Custom Javascript(used by this page)-->
    <!-- <script src="{{ asset('backend') }}/assets/js/custom/authentication/sign-up/general.js"></script> -->
    <!--end::Custom Javascript-->
    
    <!--end::Javascript-->
  </body>
  <!--end::Body-->
</html>