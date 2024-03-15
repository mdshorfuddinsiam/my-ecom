<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
  <!--begin::Logo-->
  <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
    <!--begin::Logo image-->
    <a href="{{ url('admin/dashboard') }}">
      <img alt="Logo" src="{{ asset('backend') }}/assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" />
      <img alt="Logo" src="{{ asset('backend') }}/assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" />
    </a>
    <!--end::Logo image-->
    <!--begin::Sidebar toggle-->
    <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
      <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
      <span class="svg-icon svg-icon-2 rotate-180">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor" />
          <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor" />
        </svg>
      </span>
      <!--end::Svg Icon-->
    </div>
    <!--end::Sidebar toggle-->
  </div>
  <!--end::Logo-->
  <!--begin::sidebar menu-->
  <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
      <!--begin::Menu-->
      <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
        
        <!--begin:Menu item-->
        <div class="menu-item">
          <!--begin:Menu link-->
          <a class="menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard') }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                  <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                  <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                  <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
          <!--end:Menu link-->
        </div>
        <!--end:Menu item-->

        <!--begin:Menu item-->
        <div class="menu-item pt-5">
          <!--begin:Menu content-->
          <div class="menu-content">
            <span class="menu-heading fw-bold text-uppercase fs-7">Ecommerce</span>
          </div>
          <!--end:Menu content-->
        </div>
        <!--end:Menu item-->
        
        <!--begin:Menu item-->
        {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
          <!--begin:Menu link-->
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">User Profile</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link" href="../../demo1/dist/pages/user-profile/overview.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Overview</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div> --}}
        <!--end:Menu item-->

        {{-- START BRAND --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.brands.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.brands.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Brand</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.brands.*') ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">brands</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END BRAND --}}

        {{-- START CATEGORY --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.categories.*') || Request::routeIs('admin.subcategories.*') || Request::routeIs('admin.subsubcategories.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.categories.*') || Request::routeIs('admin.subcategories.*') || Request::routeIs('admin.subsubcategories.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Category</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">categories</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.subcategories.*') ? 'active' : '' }}" href="{{ route('admin.subcategories.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">subcategories</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.subsubcategories.*') ? 'active' : '' }}" href="{{ route('admin.subsubcategories.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">subsubcategories</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END CATEGORY --}}

        {{-- START PRODUCT --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.products.*') || Request::routeIs('admin.sizes.*') || Request::routeIs('admin.colors.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.products.*') || Request::routeIs('admin.sizes.*') || Request::routeIs('admin.colors.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Product</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">products</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            {{-- <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.sizes.*') ? 'active' : '' }}" href="{{ route('admin.sizes.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">sizes</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item--> --}}
                        
            {{-- <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.colors.*') ? 'active' : '' }}" href="{{ route('admin.colors.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">colors</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item--> --}}
                        
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END PRODUCT --}}

        {{-- START SLIDER --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.sliders.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.sliders.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Slider</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.sliders.*') ? 'active' : '' }}" href="{{ route('admin.sliders.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">sliders</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END SLIDER --}}

        {{-- START BLOG CATEGORY --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.blogcategories.*') || Request::routeIs('admin.blogposts.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.blogcategories.*') || Request::routeIs('admin.blogposts.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Blog</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.blogcategories.*') ? 'active' : '' }}" href="{{ route('admin.blogcategories.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">blog categories</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.blogposts.*') ? 'active' : '' }}" href="{{ route('admin.blogposts.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">blog posts</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END BLOG CATEGORY --}}

        <!--begin:Menu item-->
        <div class="menu-item pt-5">
          <!--begin:Menu content-->
          <div class="menu-content">
            <span class="menu-heading fw-bold text-uppercase fs-7">Setting & More</span>
          </div>
          <!--end:Menu content-->
        </div>
        <!--end:Menu item-->

        {{-- START FOOTER --}}
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::routeIs('admin.footerinfos.*') || Request::routeIs('admin.footersocials.*') || Request::routeIs('admin.footergridtwos.*') || Request::routeIs('admin.footergridthrees.*') || Request::routeIs('admin.footergridtitle.*') || Request::routeIs('admin.footerpayments.*') ? 'hover show' : '' }}">
          <!--begin:Menu link-->
          <span class="menu-link {{ Request::routeIs('admin.footerinfos.*') || Request::routeIs('admin.footersocials.*') || Request::routeIs('admin.footergridtwos.*') || Request::routeIs('admin.footergridthrees.*') || Request::routeIs('admin.footergridtitle.*') || Request::routeIs('admin.footerpayments.*') ? 'active' : '' }}">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                  <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Footer</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footerinfos.*') ? 'active' : '' }}" href="{{ route('admin.footerinfos.edit') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer info</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footersocials.*') ? 'active' : '' }}" href="{{ route('admin.footersocials.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer socials</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footergridtwos.*') ? 'active' : '' }}" href="{{ route('admin.footergridtwos.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer grid two</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footergridthrees.*') ? 'active' : '' }}" href="{{ route('admin.footergridthrees.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer grid three</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footergridtitle.*') ? 'active' : '' }}" href="{{ route('admin.footergridtitle.edit') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer grid title</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link {{ Request::routeIs('admin.footerpayments.*') ? 'active' : '' }}" href="{{ route('admin.footerpayments.index') }}">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">footer payments</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        {{-- END FOOTER --}}


        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
          <!--begin:Menu link-->
          <span class="menu-link">
            <span class="menu-icon">
              <!--begin::Svg Icon | path: icons/duotune/graphs/gra006.svg-->
              <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z" fill="currentColor" />
                  <path opacity="0.3" d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Support Center</span>
            <span class="menu-arrow"></span>
          </span>
          <!--end:Menu link-->
          <!--begin:Menu sub-->
          <div class="menu-sub menu-sub-accordion">
            <!--begin:Menu item-->
            <div class="menu-item">
              <!--begin:Menu link-->
              <a class="menu-link" href="../../demo1/dist/apps/support-center/overview.html">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Overview</span>
              </a>
              <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
              <!--begin:Menu link-->
              <span class="menu-link">
                <span class="menu-bullet">
                  <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Tickets</span>
                <span class="menu-arrow"></span>
              </span>
              <!--end:Menu link-->
              <!--begin:Menu sub-->
              <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                  <!--begin:Menu link-->
                  <a class="menu-link" href="../../demo1/dist/apps/support-center/tickets/list.html">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Tickets List</span>
                  </a>
                  <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                  <!--begin:Menu link-->
                  <a class="menu-link" href="../../demo1/dist/apps/support-center/tickets/view.html">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">View Ticket</span>
                  </a>
                  <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
              </div>
              <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
          </div>
          <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->

        

      </div>
      <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
  </div>
  <!--end::sidebar menu-->
  <!--begin::Footer-->
  <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
    {{-- <a href="../../demo1/dist/documentation/getting-started.html" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
      <span class="btn-label">Docs &amp; Components</span>
      <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
      <span class="svg-icon btn-icon svg-icon-2 m-0">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="currentColor" />
          <rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor" />
          <rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor" />
          <rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor" />
          <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
        </svg>
      </span>
      <!--end::Svg Icon-->

    </a> --}}
    
    <a href="{{ route('admin.logout') }}" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" >
      <span class="btn-label">Logout</span>
    </a>

    {{-- <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
        Logout
    </a>    
    <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form> --}}

    {{-- <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" >
      <span class="btn-label">Logout</span>
    </a> --}}
    {{-- <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
        @csrf
    </form> --}}
    
  </div>
  <!--end::Footer-->
</div>