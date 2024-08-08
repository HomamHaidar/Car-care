@extends('dashboard.layouts.app')
@section('page_title', __('admin.add') . ' ' . __('admin.service'))
@inject('Service', 'App\Models\Service\Service')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.service') }}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('services.index') }}" class="text-muted text-hover-primary">{{ __('admin.services') }}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.add') . ' ' . __('admin.service') }}</li><!--end::Item-->
            @endcomponent
            <!--end::Page title-->
        </div><!--end::Container-->
    </div><!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <!-- begin :: Card body -->
            <div class="card-body">
                <!-- begin :: Form -->
                <form action="{{ route('services.store') }}" method="post" id="submitted-form"
                    data-redirection-url="{{ route('services.index') }}">
                    @csrf
                    <!-- begin :: Card header -->
                    <span class="fs-4 fw-bold pe-2">
                        <h3 class="text-gray-500">{{ __('admin.add') }} {{ __('admin.service') }}</h3>
                    </span><!-- end   :: Card header -->

                    @include('dashboard.services.form') <!-- تأكد من أن المسار صحيح -->
                    <!-- end   :: Card body -->
            </div>
        </div><!-- end   :: Container -->
    @endsection
    <!-- Ensure you include jQuery and Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Ensure tabs work correctly
            $('#languageTabs a').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>
