@extends('dashboard.layouts.app')
@section('page_title', __('admin.add') . __('admin.Admin'))
@inject('admin', 'App\Models\Admin')
<style>
    #togglePasswordVisibility {
        cursor: pointer;
        color: #6c757d;
        /* Adjust the color as needed */
        text-decoration: none;
    }
</style>
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.Admins') }}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admins.index') }}" class="text-muted text-hover-primary">{{ __('admin.Admins') }}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.add') }} {{ __('admin.Admin') }}</li><!--end::Item-->
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
                <form action="{{ route('admins.store') }}" class="form" method="post" id="submitted-form"
                    data-redirection-url="{{ route('admins.index') }}">
                    @csrf
                    <!-- begin :: Card header -->
                    <span class="fs-4 fw-bold pe-2">
                        <h3 class="text-gray-500">{{ __('admin.add') }} {{ __('admin.Admin') }}</h3>
                    </span><!-- end   :: Card header -->

                    @include(checkView('dashboard.admins.form'))

                    <!-- Add a button or an icon to toggle password visibility -->


                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('admin.password') }}</label>
                            <div class="form-floating position-relative">
                                <input type="password" class="form-control" id="password_inp" name="password" required
                                    autocomplete="off" />
                                <label for="password_inp">{{ __('admin.Enter-the') }} {{ __('admin.password') }}</label>
                                <a id="togglePasswordVisibility" class="position-absolute top-50 translate-middle-y end-0 "
                                    style="margin-right: 10px">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                            <p class="invalid-feedback" id="password"></p>
                        </div><!-- end :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Password-confirmation') }}</label>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password_confirmation_inp"
                                    name="password_confirmation" required autocomplete="off" />
                                <label for="password_confirmation_inp">{{ __('admin.Enter-the') }}
                                    {{ __('admin.Password-confirmation') }}</label>

                            </div>
                            <p class="invalid-feedback" id="password_confirmation"></p>
                        </div><!-- end :: Column -->
                    </div><!-- end :: Row -->


                    <!-- begin :: Form footer -->
                    <div class="form-footer">
                        <!-- begin :: Submit btn -->
                        <button type="submit" class="btn btn-primary" id="submit-btn">
                            <span class="indicator-label">{{ __('admin.create') }}</span>
                            <!-- begin :: Indicator -->
                            <span class="indicator-progress">{{ __('admin.please-wait') }}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span><!-- end   :: Indicator -->
                        </button><!-- end   :: Submit btn -->
                        <a class="btn btn-secondary" href="{{ route('admins.index') }}"> {{ __('admin.cancel') }} </a>
                    </div><!-- end   :: Form footer -->

                </form><!-- end   :: Form -->
            </div><!-- end   :: Card body -->
        </div>
    </div>

@endsection
