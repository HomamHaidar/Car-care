<!--begin::Header main-->
<div class="d-flex flex-stack flex-grow-1">
    <div class="app-header-logo d-flex align-items-center ps-lg-12" id="kt_app_header_logo">
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-sm btn-icon bg-body btn-color-gray-500 btn-active-color-primary w-30px h-30px ms-n2 me-4 d-none d-lg-flex"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-outline ki-abstract-14 fs-3 mt-1"></i>
        </div>
        <!--end::Sidebar toggle-->
        <!--begin::Sidebar mobile toggle-->
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none"
            id="kt_app_sidebar_mobile_toggle">
            <i class="ki-outline ki-abstract-14 fs-2"></i>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Logo-->
        <a href="{{ route('index') }}" class="app-sidebar-logo">
            <img alt="Logo" src="{{ asset('dashboard-assets') }}/media/logos/demo39.svg"
                class="h-25px theme-light-show" />
            <img alt="Logo" src="{{ asset('dashboard-assets') }}/media/logos/demo39-dark.svg"
                class="h-25px theme-dark-show" />
        </a>
        <!--end::Logo-->
    </div>
    <!--begin::Navbar-->
    <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
        <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1">
            <!--begin::Search-->
            <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-350px"
                data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter"
                data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto"
                data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
                <!--begin::Tablet and mobile search toggle-->
                <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                    <div class="d-flex">
                        <i class="ki-outline ki-magnifier fs-1 fs-1"></i>
                    </div>
                </div>
                <!--end::Tablet and mobile search toggle-->
                <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0"
                    autocomplete="off">
                    <!--begin::Hidden input(Added to disable form autocomplete)-->
                    <input type="hidden" />
                    <!--end::Hidden input-->
                    <!--begin::Icon-->
                    {{-- <i
                        class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i> --}}
                    <!--end::Icon-->
                    {{-- <!--begin::Input-->
                    <input type="text" class="search-input form-control form-control border-0 h-lg-45px ps-13"
                        name="search" value="" placeholder="Search..." data-kt-search-element="input" />
                    <!--end::Input--> --}}
                    <!--begin::Spinner-->
                    <span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                        data-kt-search-element="spinner">
                        <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                    </span>
                    <!--end::Spinner-->
                    <!--begin::Reset-->
                    <span
                        class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4"
                        data-kt-search-element="clear">
                        <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
                    </span>
                    <!--end::Reset-->
                </form>
                <!--end::Form-->
                <!--begin::Menu-->
                <div data-kt-search-element="content"
                    class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
                    <!--begin::Wrapper-->
                    <div data-kt-search-element="wrapper">
                        <!--begin::Recently viewed-->
                        <div data-kt-search-element="results" class="d-none">
                            <!--begin::Items-->
                            <div class="scroll-y mh-200px mh-lg-350px">
                                <!--begin::Category title-->
                                <h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">Users</h3>
                                <!--end::Category title-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('dashboard-assets') }}/media/avatars/300-6.jpg"
                                            alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Karina Clark</span>
                                        <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('dashboard-assets') }}/media/avatars/300-2.jpg"
                                            alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Olivia Bold</span>
                                        <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('dashboard-assets') }}/media/avatars/300-9.jpg"
                                            alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Ana Clark</span>
                                        <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('dashboard-assets') }}/media/avatars/300-14.jpg"
                                            alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Nick Pitola</span>
                                        <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <img src="{{ asset('dashboard-assets') }}/media/avatars/300-11.jpg"
                                            alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                        <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Category title-->
                                <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                                    Customers</h3>
                                <!--end::Category title-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <img class="w-20px h-20px"
                                                src="{{ asset('dashboard-assets') }}/media/svg/brand-logos/volicity-9.svg"
                                                alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Company Rbranding</span>
                                        <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <img class="w-20px h-20px"
                                                src="{{ asset('dashboard-assets') }}/media/svg/brand-logos/tvit.svg"
                                                alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Company Re-branding</span>
                                        <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <img class="w-20px h-20px"
                                                src="{{ asset('dashboard-assets') }}/media/svg/misc/infography.svg"
                                                alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Business Analytics App</span>
                                        <span class="fs-7 fw-semibold text-muted">Administration</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <img class="w-20px h-20px"
                                                src="{{ asset('dashboard-assets') }}/media/svg/brand-logos/leaf.svg"
                                                alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                        <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <img class="w-20px h-20px"
                                                src="{{ asset('dashboard-assets') }}/media/svg/brand-logos/tower.svg"
                                                alt="" />
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column justify-content-start fw-semibold">
                                        <span class="fs-6 fw-semibold">Tower Group Website</span>
                                        <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Category title-->
                                <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                                    Projects</h3>
                                <!--end::Category title-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-notepad fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                        <span class="fs-7 fw-semibold text-muted">#45670</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-frame fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                        <span class="fs-7 fw-semibold text-muted">#45690</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-message-text-2 fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
                                        <span class="fs-7 fw-semibold text-muted">#21090</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-profile-circle fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                        <span class="fs-7 fw-semibold text-muted">#34560</span>
                                    </div>
                                    <!--end::Title-->
                                </a>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Recently viewed-->
                        <!--begin::Recently viewed-->
                        <div class="" data-kt-search-element="main">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack fw-semibold mb-4">
                                <!--begin::Label-->
                                <span class="text-muted fs-6 me-2">Recently Searched:</span>
                                <!--end::Label-->
                                <!--begin::Toolbar-->
                                <div class="d-flex" data-kt-search-element="toolbar">
                                    <!--begin::Preferences toggle-->
                                    <div data-kt-search-element="preferences-show"
                                        class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2 data-bs-toggle="
                                        title="Show search preferences">
                                        <i class="ki-outline ki-setting-2 fs-2"></i>
                                    </div>
                                    <!--end::Preferences toggle-->
                                    <!--begin::Advanced search toggle-->
                                    <div data-kt-search-element="advanced-options-form-show"
                                        class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1"
                                        data-bs-toggle="tooltip" title="Show more search options">
                                        <i class="ki-outline ki-down fs-2"></i>
                                    </div>
                                    <!--end::Advanced search toggle-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Items-->
                            <div class="scroll-y mh-200px mh-lg-325px">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-laptop fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp by
                                            Keenthemes</a>
                                        <span class="fs-7 text-muted fw-semibold">#45789</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-chart-simple fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API Project
                                            Meeting</a>
                                        <span class="fs-7 text-muted fw-semibold">#84050</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-chart fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI Monitoring
                                            App Launch</a>
                                        <span class="fs-7 text-muted fw-semibold">#84250</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project Reference
                                            FAQ</a>
                                        <span class="fs-7 text-muted fw-semibold">#67945</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-sms fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro App
                                            Development</a>
                                        <span class="fs-7 text-muted fw-semibold">#84250</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-bank fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix Mobile
                                            App</a>
                                        <span class="fs-7 text-muted fw-semibold">#45690</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-4">
                                        <span class="symbol-label bg-light">
                                            <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="#"
                                            class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing UI
                                            Design" Launch</a>
                                        <span class="fs-7 text-muted fw-semibold">#24005</span>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Recently viewed-->
                        <!--begin::Empty-->
                        <div data-kt-search-element="empty" class="text-center d-none">
                            <!--begin::Icon-->
                            <div class="pt-10 pb-10">
                                <i class="ki-outline ki-search-list fs-4x opacity-50"></i>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Message-->
                            <div class="pb-15 fw-semibold">
                                <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                <div class="text-muted fs-7">Please try again with a different query</div>
                            </div>
                            <!--end::Message-->
                        </div>
                        <!--end::Empty-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Preferences-->
                    <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                        <!--begin::Heading-->
                        <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <input type="text" class="form-control form-control-sm form-control-solid"
                                placeholder="Contains the word" name="query" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="type" value="has"
                                        checked="checked" />
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="type" value="users" />
                                    <span
                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="type" value="orders" />
                                    <span
                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="type" value="projects" />
                                    <span
                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                                </label>
                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <input type="text" name="assignedto"
                                class="form-control form-control-sm form-control-solid" placeholder="Assigned to"
                                value="" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <input type="text" name="collaborators"
                                class="form-control form-control-sm form-control-solid" placeholder="Collaborators"
                                value="" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <!--begin::Radio group-->
                            <div class="nav-group nav-group-fluid">
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="attachment" value="has"
                                        checked="checked" />
                                    <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has
                                        attachment</span>
                                </label>
                                <!--end::Option-->
                                <!--begin::Option-->
                                <label>
                                    <input type="radio" class="btn-check" name="attachment" value="any" />
                                    <span
                                        class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                                </label>
                                <!--end::Option-->
                            </div>
                            <!--end::Radio group-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-5">
                            <select name="timezone" aria-label="Select a Timezone" data-control="select2"
                                data-dropdown-parent="#kt_header_search" data-placeholder="date_period"
                                class="form-select form-select-sm form-select-solid">
                                <option value="next">Within the next</option>
                                <option value="last">Within the last</option>
                                <option value="between">Between</option>
                                <option value="on">On</option>
                            </select>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-6">
                                <input type="number" name="date_number"
                                    class="form-control form-control-sm form-control-solid" placeholder="Lenght"
                                    value="" />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <select name="date_typer" aria-label="Select a Timezone" data-control="select2"
                                    data-dropdown-parent="#kt_header_search" data-placeholder="Period"
                                    class="form-select form-select-sm form-select-solid">
                                    <option value="days">Days</option>
                                    <option value="weeks">Weeks</option>
                                    <option value="months">Months</option>
                                    <option value="years">Years</option>
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                            <a href="../../demo39/dist/pages/search/horizontal.html"
                                class="btn btn-sm fw-bold btn-primary"
                                data-kt-search-element="advanced-options-form-search">Search</a>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Preferences-->
                    <!--begin::Preferences-->
                    <form data-kt-search-element="preferences" class="pt-1 d-none">
                        <!--begin::Heading-->
                        <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="pb-4 border-bottom">
                            <label
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            </label>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="py-4 border-bottom">
                            <label
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            </label>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="py-4 border-bottom">
                            <label
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate
                                    Programs</span>
                                <input class="form-check-input" type="checkbox" value="1" />
                            </label>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="py-4 border-bottom">
                            <label
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span
                                    class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                            </label>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="py-4 border-bottom">
                            <label
                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
                                <input class="form-check-input" type="checkbox" value="1" />
                            </label>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end pt-7">
                            <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2"
                                data-kt-search-element="preferences-dismiss">Cancel</button>
                            <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Preferences-->
                </div>
                <!--end::Menu-->
            </div>
            <!--end::Search-->
        </div>

        <!--begin::User menu-->
        <div class="app-navbar-item ms-2 ms-lg-6" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-lg-45px"
                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end">
                <img src="{{ asset('dashboard-assets') }}/media/avatars/300-2.jpg" alt="user" />
            </div>
            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img alt="Logo" src="{{ asset('dashboard-assets') }}/media/avatars/300-2.jpg" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                {{-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span> --}}
                            </div>
                            <a href="#"
                                class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->




                {{-- <!--begin::Menu item-->
                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                    <a href="#" class="menu-link px-5">
                        <span class="menu-title position-relative">Mode
                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                <i class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                <i class="ki-outline ki-moon theme-dark-show fs-2"></i>
                            </span></span>
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="light">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-outline ki-night-day fs-2"></i>
                                </span>
                                <span class="menu-title">Light</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="dark">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-outline ki-moon fs-2"></i>
                                </span>
                                <span class="menu-title">Dark</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                data-kt-value="system">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-outline ki-screen fs-2"></i>
                                </span>
                                <span class="menu-title">System</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu item--> --}}
                <!--begin::Menu item-->
                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                    <a href="#" class="menu-link px-5">
                        <span class="menu-title position-relative">{{ __('admin.language') }}
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                                    <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset('dashboard-assets') }}/media/flags/{{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'saudi-arabia.svg' : 'united-states.svg' }}" alt="" />
                                    {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'العربية' : 'English' }}
                                </span>
                            @endforeach
                        </span>
                    </a>
                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">

                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="menu-link d-flex px-5 {{ LaravelLocalization::getCurrentLocale() == $localeCode ? 'active' : '' }}">
                                    <span class="symbol symbol-20px me-4">

                                        @if ($localeCode == 'ar')
                                            <img class="rounded-1"
                                                src="{{ asset('dashboard-assets') }}/media/flags/saudi-arabia.svg"
                                                alt="" />
                                        @else
                                            <img class="rounded-1"
                                                src="{{ asset('dashboard-assets') }}/media/flags/united-states.svg"
                                                alt="" />
                                        @endif
                                    </span>{{ $properties['native'] }}</a>
                            </div>
                            <!--end::Menu item-->
                        @endforeach


                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5 my-1">
                    <a href="{{ route('getResetPassword') }}" class="menu-link px-5">
                        {{ __('admin.settings') }}</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    <a href="{{ route('logout') }}" class="menu-link px-5">{{ __('admin.logout') }}</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::User account menu-->
            <!--end::Menu wrapper-->
        </div>
        <!--end::User menu-->
        <!--begin::Action-->
        <div class="app-navbar-item ms-2 ms-lg-6 me-lg-6">
            <!--begin::Link-->
            <a href="{{ route('logout') }}"
                class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                <i class="ki-outline ki-exit-right fs-1"></i>
            </a>
            <!--end::Link-->
        </div>
        <!--end::Action-->
        <!--begin::Header menu toggle-->
        <div class="app-navbar-item ms-2 ms-lg-6 ms-n2 me-3 d-flex d-lg-none">
            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                id="kt_app_aside_mobile_toggle">
                <i class="ki-outline ki-burger-menu-2 fs-2"></i>
            </div>
        </div>
        <!--end::Header menu toggle-->
    </div>
    <!--end::Navbar-->
</div>
<!--end::Header main-->
