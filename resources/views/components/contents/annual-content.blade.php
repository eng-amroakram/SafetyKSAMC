<div class="tab-content" id="annualToursTabContent">
    <div class="tab-pane fade show active" id="glass_breaker_fire_detectors_tab_id" role="tabpanel"
        aria-labelledby="glass_breaker_fire_detectors_tab">

        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                فورم الكاسر الزجاجي وكواشف الحريق
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="location" id="location"
                        class="form-control form-control-lg location_input textfield" />
                    <label class="form-label" for="location">الموقع</label>
                    <div class="form-helper text-danger location_validation">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-outline mb-4">
                    <input type="text" name="building" id="building"
                        class="form-control form-control-lg building_input textfield" />
                    <label class="form-label" for="building">المبنى</label>
                    <div class="form-helper text-danger building_validation">
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive-md text-center mb-4">

            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
            </div>

            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                <thead class="background-green text-white">
                    <tr>
                        @foreach (config('data.forms.table-header.annual.glass_breaker_fire_detectors') as $element)
                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    @php
                        $x = 1;
                    @endphp

                    @forelse (config('data.forms.table-body.annual.glass_breaker_fire_detectors') as $key => $value)
                        <tr>
                            <td>{{ $x }}</td>
                            <td>{{ $value }}</td>
                            <td>
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'na_' . $x }}" id="{{ 'na_' . $x }}" />
                            </td>

                            <td>
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'no_' . $x }}" id="{{ 'no_' . $x }}" />

                            </td>

                            <td>
                                <input class="form-check-input checkboxradio" type="radio" name="{{ 'row_' . $x }}"
                                    value="{{ 'yes_' . $x }}" id="{{ 'yes_' . $x }}" />

                            </td>
                            <td>
                                <button type="button" class="btn btn-sm clearbutton"
                                    row="{{ 'row_' . $x }}">Clear</button>
                            </td>

                            <td>{{ $key }}</td>
                            <td>{{ $x }}</td>
                        </tr>
                        @php
                            $x = $x + 1;
                        @endphp
                    @empty
                        <tr>
                            <td colspan="8" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
        </div>

        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                ملاحظات الكاسر الزجاجي وكواشف الحريق
            </a>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label select-label mb-1"><strong>ملاحظات</strong></label>
                <div class="input-group">
                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                </div>
                <div class="form-helper text-danger notes-validation reset-validation">
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" form="glass_breaker_fire_detectors"
                    class="btn btn-lg text-white btn-block submit" style="background-color: #7a9e85; font-weight: 700;">
                    حفظ البيانات
                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"
                        wire:loading></span>
                </button>
            </div>
        </div>
    </div>
</div>