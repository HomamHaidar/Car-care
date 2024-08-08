<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_inp" name="name" value="{{ old('name', $order) }}"
                autocomplete="off" />
            <label for="name_inp">{{ __('admin.Enter-the') }} {{ __('admin.Name') }}</label>
            <p class="invalid-feedback" id="name"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Email') }}</label>
        <div class="form-floating">
            <input type="email" class="form-control" id="email_inp" name="email" value="{{ old('email', $order) }}"
                autocomplete="off" />
            <label for="email_inp">{{ __('admin.Enter-the') }} {{ __('admin.Email') }}</label>
            <p class="invalid-feedback" id="email"></p>
        </div>

    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Phone') }}</label>
        <div class="form-floating">
            <input type="tel" class="form-control" id="phone_inp" name="phone" value="{{ old('phone', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('admin.Phone') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.user') }}</label>
        <div class="form-floating">
            <select class="form-select form-control" id="roles_inp" name="user_id" aria-label="{{ __('admin.please-choose') }}"
                >
                <option disabled>{{ __('admin.please-choose') }} {{ __('order.user') }}</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>

                @endforeach


            </select>
            <label for="roles_inp">{{ __('admin.please-choose') }} {{ __('order.user') }}</label>
        </div>
        <p class="invalid-feedback" id="roles"></p>

    </div><!-- end   :: Column -->

</div>

<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.location') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="location" value="{{ old('location', $order) }}"
                   autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.location') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.services') }}</label>
        <div class="form-floating">
            <select class="form-select form-control" id="roles_inp" name="service_id[]" aria-label="{{ __('admin.please-choose') }}"
                multiple>
                <option disabled>{{ __('admin.please-choose') }} {{ __('admin.services') }}</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ old('services') ? (1 == 1 ? 'selected' : '') : (in_array($service->id, $order->services->pluck('id')->toArray()) ? 'selected' : '') }}>
                        {{ $service->name }}</option>
                @endforeach


            </select>
            <label for="roles_inp">{{ __('admin.please-choose') }} {{ __('admin.services') }}</label>
        </div>
        <p class="invalid-feedback" id="roles"></p>

    </div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.latitude') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="latitude" value="{{ old('latitude', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.latitude') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.longitude') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="longitude" value="{{ old('longitude', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.longitude') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.car_brand') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="car_brand" value="{{ old('car_brand', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.car_brand') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.car_category') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="car_category" value="{{ old('car_category', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.car_category') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.car_oil') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="car_oil" value="{{ old('car_oil', $order) }}"
                   autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.car_oil') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.coupon_code') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="coupon_code" value="{{ old('coupon_code', $order) }}"
                autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.coupon_code') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.services_time') }}</label>
        <div class="form-floating">
            <input type="date" class="form-control" id="expire_date_inp" name="services_time"
                   value="{{ old('services_time', $order->services_time) }}"
                   autocomplete="off"/>
            <label for="expire_date_inp">{{ __('admin.Enter-the') }} {{ __('order.services_time') }}</label>
        </div>
        <p class="invalid-feedback" id="roles"></p>
    </div>    <!-- begin :: Column -->

</div>

<!-- end   :: Row -->
{{-- @push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\AdminRequest') !!}
@endpush --}}
