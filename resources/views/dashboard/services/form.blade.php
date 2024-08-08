<!-- begin :: Row -->
<!-- begin :: Column -->

<div class="row mb-8">

    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_en_inp" name="name[en]"
                value="{{ old('name.en', isset($service) ? $service->translate('en')->name : '') }}" autocomplete="off" />
            <label for="name_en_inp">{{ __('admin.Name') }} (EN)</label>
            <p class="invalid-feedback" id="name_en"></p>
        </div>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Name') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_ar_inp" name="name[ar]"
                value="{{ old('name.ar', isset($service) ? $service->translate('ar')->name : '') }}"
                autocomplete="off" />
            <label for="name_ar_inp">{{ __('admin.Name') }} (AR)</label>
            <p class="invalid-feedback" id="name_ar"></p>
        </div>
    </div><!-- end   :: Column -->


    <!-- begin :: Row -->
    <div class="row mb-8">

        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2 required">{{ __('Service.price') }}</label>
            <div class="form-floating">
                <input type="numric" class="form-control" id="price_inp" name="price"
                    value="{{ old('price', isset($service) ? $service->price : '') }}" autocomplete="off" />
                <label for="price_inp">{{ __('admin.Enter-the') . ' ' . __('admin.price') }}</label>
                <p class="invalid-feedback" id="price"></p>
            </div>
        </div><!- <!-- begin :: Column -->
            <div class="col-md-6 fv-row">
                <label class="fs-5 fw-bold mb-2 required">{{ __('Service.Availability') }}</label>
                <div class="form-floating">
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
                    <label for="availability_inp">{{ __('admin.please-choose') }}</label>
                    <p class="invalid-feedback" id="availability"></p>
                </div>
            </div><!-- end   :: Column -->

    </div><!-- end   :: Row -->

    <!-- begin :: Form Actions -->
    <div class="row">
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
            <button type="reset" class="btn btn-secondary">{{ __('admin.cancel') }}</button>
        </div>
    </div><!-- end :: Form Actions -->
</div>
