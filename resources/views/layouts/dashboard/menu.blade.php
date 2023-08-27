<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="/"><span class="brand-logo">
                        <img src="https://order-bay.com/asset/images/logos/{{ $setting->logo_shop }}" width="50" />
                    </span>
                    <h2 class="brand-text" style="color: {{ $setting->site_color_primary }}">{{ $setting->name_shop }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.dashboard') }}</span></a>
            </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('products') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.products') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('categorys') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.categorys') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('units') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate">{{ __('tran.unit') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('sliders') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.slider') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('notifiction') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.notifiction') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('gallerydashboard') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.gallery') }}</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('chat') }}"><i
                        data-feather="home"></i><span class="menu-title text-truncate">المحادثة</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span
                        class="menu-title text-truncate">{{ __('tran.customers') }}</span>
                    {{-- <span class="badge badge-light-danger rounded-pill ms-auto me-1">2</span> --}}
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('viewusers') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate">Manger User</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span
                                class="menu-item text-truncate">Role & Permion User</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span
                        class="menu-title text-truncate">{{ __('tran.invoice') }}</span>
                    {{-- <span class="badge badge-light-danger rounded-pill ms-auto me-1">2</span> --}}
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('invoices_open') }}"><i
                                data-feather="circle"></i><span
                                class="menu-item text-truncate">{{ __('tran.invoiceopen') }}</span>
                            <div class="badge bg-danger rounded-pill ms-auto">0</div>
                        </a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('invoices_close') }}"><i
                                data-feather="circle"></i><span
                                class="menu-item text-truncate">{{ __('tran.invoiceclose') }}</span>
                            <div class="badge bg-success rounded-pill ms-auto">0</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span
                        class="menu-title text-truncate">{{ __('tran.report') }}</span>
                    {{-- <span class="badge badge-light-danger rounded-pill ms-auto me-1">2</span> --}}
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('invoices_open') }}"><i
                                data-feather="circle"></i><span
                                class="menu-item text-truncate">{{ __('tran.invoiceopen') }}</span>
                            <div class="badge bg-danger rounded-pill ms-auto">0</div>
                        </a>
                    </li>
                    <li><a class="d-flex align-items-center" href="{{ route('invoices_close') }}"><i
                                data-feather="circle"></i><span
                                class="menu-item text-truncate">{{ __('tran.invoiceclose') }}</span>
                            <div class="badge bg-success rounded-pill ms-auto">0</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('settings') }}"><i
                        data-feather="home"></i><span
                        class="menu-title text-truncate">{{ __('tran.setting') }}</span></a>
            </li>
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span
                        class="menu-title text-truncate">{{__('tran.products')}}</span>
                        <span class="badge badge-light-danger rounded-pill ms-auto me-1">2</span>
                    </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{route('viewusers')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate">Manger Product</span></a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
