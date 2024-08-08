@extends('dashboard.layouts.app')
@section('page_title', __('admin.edit') .' '. __('admin.service') )

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{__('admin.services')}}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{route('services.index')}}" class="text-muted text-hover-primary">{{__('admin.services')}}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ $service->name }}</li><!--end::Item-->
            @endcomponent<!--end::Page title-->
        </div><!--end::Container-->
    </div><!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <!-- begin :: Card body -->
            <div class="card-body">
                <!-- begin :: Form -->
                <form action="{{ route('services.update', $service->id)}}" enctype="multipart/form-data" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('services.index') }}" >
                    @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                    <div class="card-header d-flex align-items-center">
                        <h3 class="fw-bolder text-dark p-">{{ __('admin.edit') .' '. __('admin.Service') }}</h3>
                    </div><!-- end   :: Card header -->


                    @include('dashboard.services.form') <!-- تأكد من أن المسار صحيح -->


                </form><!-- end   :: Form -->
            </div><!-- end   :: Card body -->
        </div>
    </div>
@endsection
