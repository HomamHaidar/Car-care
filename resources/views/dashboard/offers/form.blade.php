


<!-- begin :: Row -->


    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('offer.code') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="phone_inp" name="code" value="{{ old('code', $offer) }}"
                   autocomplete="off"/>
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('offer.code') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div><!-- end   :: Column -->

    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('offer.discount') }}</label>
        <div class="form-floating">
            <input type="number" class="form-control" id="phone_inp" name="discount"
                   value="{{ old('discount', $offer) }}"
                   autocomplete="off"/>
            <label for="phone_inp">{{ __('admin.Enter-the') }} {{ __('offer.discount') }}</label>
            <p class="invalid-feedback" id="phone"></p>
        </div>

    </div>
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('offer.type') }}</label>
        <div class="form-floating">
            <select class="form-select form-control" id="roles_inp" name="type"
                    aria-label="{{ __('admin.please-choose') }}"
            >
                <option disabled>{{ __('admin.please-choose') }} {{ __('offer.type') }}</option>

                <option value="0">
                    {{ __('offer.percentage') }}
                </option>
                <option value="1">
                    {{ __('offer.Digital') }}
                </option>

            </select>
            <label for="roles_inp">{{ __('admin.please-choose') }} {{ __('offer.type') }}</label>
        </div>
        <p class="invalid-feedback" id="roles"></p>

    </div>
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('offer.expire_date') }}</label>
        <div class="form-floating">
            <input type="date" class="form-control" id="expire_date_inp" name="expire_date"
                   value="{{ old('expire_date', $offer->expire_date) }}"
                   autocomplete="off"/>
            <label for="expire_date_inp">{{ __('admin.Enter-the') }} {{ __('offer.expire_date') }}</label>
        </div>
        <p class="invalid-feedback" id="roles"></p>
    </div>
            <div class="col-md-6 fv-row">
                <label class="fs-5 fw-bold mb-2 required">{{ __('admin.services') }}</label>
                <div class="form-floating">
                    <select class="form-select form-control" id="roles_inp" name="service_id" aria-label="{{ __('admin.please-choose') }}"
                            >
                        <option disabled>{{ __('admin.please-choose') }} {{ __('admin.services') }}</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}"
                            >
                                {{ $service->name }}</option>
                        @endforeach
                    </select>
                    <label for="roles_inp">{{ __('admin.please-choose') }} {{ __('offer.Discounted service') }}</label>
                </div>
                <p class="invalid-feedback" id="roles"></p>

            </div><!-- end   :: Column -->


</div><!-- end   :: Row -->

{{-- @push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\AdminRequest') !!}
@endpush --}}
