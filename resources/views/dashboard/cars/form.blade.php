
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.car_brand') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="brand" value="{{ old('brand', $car) }}"
                   autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.car_brand') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('order.car_category') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="category" value="{{ old('category', $car) }}"
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
            <input type="text" class="form-control" id="phone_inp" name="oil" value="{{ old('oil', $car) }}"
                   autocomplete="off" />
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('order.car_oil') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <!-- begin :: Column -->

</div>

<!-- end   :: Row -->
{{-- @push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\AdminRequest') !!}
@endpush --}}
