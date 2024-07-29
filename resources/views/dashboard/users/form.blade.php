<!-- begin :: Row -->
<div class="row mb-8">

    <div class="fv-row mb-7">
        <!--begin::Label-->
        <!--end::Label-->

    </div>
    <!--end::Input group-->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name"
                value="{{ old('first_name', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="first_name_inp">{{ __('admin.Enter-the') . __('admin.first_name') }}</label>
            <p class="invalid-feedback" id="name"></p>
        </div>

    </div><!-- end   :: Column -->


</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Email') }}</label>
        <div class="form-floating">
            <input type="email" class="form-control" id="email_inp" name="email"
                value="{{ old('email', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="email_inp">{{ __('admin.Enter-the') . __('admin.Email') }}</label>
            <p class="invalid-feedback" id="email"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    {{-- <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __("admin.categories") }}</label>
        <div class="form-floating">
            <select class="form-select" id="categories_inp" name="categories[]"  aria-label="{{__('admin.please-choose')}}" multiple>
                <option disabled>{{__('admin.please-choose')}}</option>
                @foreach ($categories as $category)
                @if (isset($user))
                <option value="{{ $category->id }}"  {{ old('categories') ? ((1==1) ? 'selected' : '') : (in_array($category->id, $user->categories->pluck('id')->toArray()) ? 'selected' : '') }} > {{ $category->name  }}</option>
                @else
                <option value="{{ $category->id }}" {{ old('categories') && old('categories') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endif
                @endforeach
            </select>
            <label for="category">{{__('admin.please-choose')}} {{__('admin.category')}}</label>
            <p class="invalid-feedback" id="categories" ></p>
        </div>

    </div><!-- end   :: Column --> --}}
</div><!-- end   :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Phone') }}</label>
        <div class="form-floating">
            <input type="tel" class="form-control" id="phone" name="phone"
                value="{{ old('phone', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="phone">{{ __('admin.Enter-the') . __('admin.Phone') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.password') }}</label>
        <div class="form-floating">
            <input type="password" class="form-control" id="password_inp" name="password" required autocomplete="off" />
            <label for="password_inp">{{ __('admin.Enter-the') . __('admin.password') }}</label>
            <a id="togglePasswordVisibility" class="position-absolute top-50 translate-middle-y end-0 "
                style="margin-right: 10px">
                <i class="fas fa-eye"></i>
            </a>
        </div>
        <p class="invalid-feedback" id="password"></p>
    </div><!-- end   :: Column -->
</div>
@push('scripts')
    {{-- <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest') !!} --}}
@endpush
