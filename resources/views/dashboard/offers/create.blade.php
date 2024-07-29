@extends('dashboard.layouts.app')"
@section('page_title', __('admin.add') ." ". __('admin.offers'))
@inject('offer', 'App\Models\offer\offer')
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
                    {{ __('admin.offers') }}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('offers.index') }}"
                       class="text-muted text-hover-primary">{{ __('admin.offers') }}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.add') }} {{ __('admin.offers') }}</li>
                <!--end::Item-->
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
                <form action="{{ route('offers.store') }}" class="form" method="post" id="submitted-form"
                      data-redirection-url="{{ route('offers.index') }}">
                    @csrf
                    <!-- begin :: Card header -->
                    <span class="fs-4 fw-bold pe-2">
                        <h3 class="text-gray-500">{{ __('admin.add') }} {{ __('admin.offers') }}</h3>
                    </span><!-- end   :: Card header -->

                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="d-block fw-semibold fs-6 mb-5">{{ __('offer.image') }}</label>
                        <!--end::Label-->

                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
                             style="background-image: url('{{ isset($user) && $user->image ? getImage('offers',$offer->image)  : 'assets/media/svg/avatars/blank.svg' }}')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"></div>
                            <!--end::Preview existing avatar-->

                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                   data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                        class="path2"></span></i>

                                <!--begin::Inputs-->
                                <input type="file" id="image_inp" name="image" accept=".png, .jpg, .jpeg"/>
                                <input type="hidden" name="avatar_remove" value()/>
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->

                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="ki-outline ki-cross fs-3"></i>
                     </span>
                            <!--end::Cancel-->

                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="ki-outline ki-cross fs-3"></i>
            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->

                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        {{-- <label for="image_inp">{{ __('Error In Image') }}</label> --}}
                        <p class="invalid-feedback" id="image"></p>

                        <!--end::Hint-->
                    </div>

                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('offer.ar_title') }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name_inp" name="ar_title"
                                       autocomplete="off"/>
                                <label for="name_inp">{{ __('admin.Enter-the') }} {{ __('offer.ar_title') }}</label>
                                <p class="invalid-feedback" id="name"></p>
                            </div>

                        </div><!-- end   :: Column -->
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('offer.en_title') }}</label>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="email_inp" name="en_title"
                                       autocomplete="off"/>
                                <label for="email_inp">{{ __('admin.Enter-the') }} {{ __('offer.en_title') }}</label>
                                <p class="invalid-feedback" id="email"></p>
                            </div>

                        </div><!-- end   :: Column -->
                    </div>

                    <!-- end   :: Row -->

                    <!-- begin :: Row -->

                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('offer.ar_description') }}</label>
                            <div class="form-floating">
                                <textarea type="text" class="form-control" id="phone_inp"
                                          name="ar_description"></textarea>
                                <label
                                    for="phone_inp">{{ __('admin.Enter-the') }} {{ __('offer.ar_description') }}</label>
                                <p class="invalid-feedback" id="phone"></p>
                            </div>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2 required">{{ __('offer.en_description') }}</label>
                            <div class="form-floating">
                                <textarea type="text" class="form-control" id="phone_inp"
                                          name="en_description"></textarea>
                                <label
                                    for="phone_inp">{{ __('admin.Enter-the') }} {{ __('offer.en_description') }}</label>
                                <p class="invalid-feedback" id="phone"></p>
                            </div>
                        </div>


                        @include(checkView('dashboard.offers.form'))

                        <!-- Add a button or an icon to toggle password visibility -->


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
                            <a class="btn btn-secondary"
                               href="{{ route('offers.index') }}"> {{ __('admin.cancel') }} </a>
                        </div><!-- end   :: Form footer -->

                </form><!-- end   :: Form -->
            </div><!-- end   :: Card body -->
        </div>
    </div>

@endsection
