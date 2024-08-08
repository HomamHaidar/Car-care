@extends('dashboard.layouts.app')
@section('page_title', __('admin.services'))
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.services') }}
                @endslot
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.services') }}</li><!--end::Item-->
            @endcomponent
            <!--end::Page title-->
        </div><!--end::Container-->
    </div><!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::services-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <input type="text" data-kt-docs-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14"
                        placeholder="{{ __('admin.search') . ' ' . __('admin.service') }}" />
                </div><!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        {{ __('admin.search') }}
                    </button>

                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">{{ __('admin.please-choose') }} {{ __('admin.status') }}
                                {{ __('admin.services') }}</div>
                        </div>
                        <div class="separator border-gray-200"></div>
                        <div class="px-7 py-5" data-kt-docs-table-filter="form">
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">{{ __('admin.status') }}
                                    {{ __('admin.service') }}:</label>
                                <select class="form-select" id="availability_inp" name="availability"
                                    aria-label="{{ __('admin.please-choose') }}">
                                    <option value="1"
                                        {{ old('availability', isset($service) ? $service->availability : 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Service.Available') }}
                                    </option>
                                    <option value="0"
                                        {{ old('availability', isset($service) ? $service->availability : 0) == 0 ? 'selected' : '' }}>
                                        {{ __('Service.NotAvailable') }}
                                    </option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                    data-kt-menu-dismiss="true"
                                    data-kt-docs-table-filter="reset">{{ __('admin.cancel') }}</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true"
                                    data-kt-docs-table-filter="filter">{{ __('admin.search') }}</button>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('services.create') }}" type="button" class="btn btn-primary"
                        data-bs-toggle="tooltip">
                        {{ __('admin.add') }} {{ __('admin.service') }}
                    </a>
                </div>

                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-docs-table-select="delete_selected">Delete
                        Selected</button>
                </div>
            </div>

            <!--begin::Datatable-->
            <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>{{ __('id') }}</th>
                        <th>{{ __('admin.Name') }}</th>
                        <th>{{ __('Service.Price') }}</th>
                        <th>{{ __('Service.Availability') }}</th>
                        <th class="text-end min-w-100px">{{ __('admin.Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
            <!--end::Datatable-->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var route = "{{ route('services.index', Request()->all()) }}";
        var csrfToken = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('dashboard-assets/datatables/services.js') }}"></script>
@endpush
