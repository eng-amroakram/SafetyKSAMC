<div class="container my-5 text-white" wire:ignore.self>
    <!-- Tabs navs -->
    <ul class="nav nav-pills mb-3" id="ex-with-icons" role="tablist" wire:ignore>

        <li class="nav-item" role="presentation">
            <a data-mdb-toggle="pill" class="nav-link active" id="daily_tours_pill" href="#daily_tours_pill_id"
                role="tab" aria-controls="daily_tours_pill_id" aria-selected="false">
                <i class="fas fa-calendar-days fa-fw me-2"></i>الجولات اليومية</a>
        </li>

        <li class="nav-item" role="presentation">
            <a data-mdb-toggle="pill" class="nav-link" id="monthly_tours_pill" href="#monthly_tours_pill_id"
                role="tab" aria-controls="monthly_tours_pill_id" aria-selected="true"><i
                    class="fas fa-calendar-day fa-fw me-2"></i>الجولات الشهرية</a>
        </li>

        <li class="nav-item" role="presentation">
            <a data-mdb-toggle="pill" class="nav-link" id="annual_tours_pill" href="#annual_tours_pill_id"
                role="tab" aria-controls="annual_tours_pill_id" aria-selected="false"><i
                    class="far fa-calendar fa-fw me-2"></i>الجولات السنوية</a>
        </li>


        @if (!$user->signature && !in_array($user->type, ['superadmin', 'admin']))
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link-custom" id="" href="{{ route('web.signature') }}" role="tab"
                    aria-selected="false"><i class="fas fa-signature fa-fw me-2"></i>قم بالتوقيع هنا</a>
            </li>
        @endif

    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex-with-icons-content" wire:ignore.self>

        <div class="tab-pane fade show active" id="daily_tours_pill_id" role="tabpanel"
            aria-labelledby="daily_tours_pill" wire:ignore.self>

            <div>

                <ul class="nav nav-tabs mb-3" id="dailyToursTab" role="tablist" wire:ignore>
                    <li class="nav-item" role="presentation">
                        <button data-mdb-toggle="tab" class="nav-link active" id="night_inspection_tour_tab"
                            data-mdb-target="#night_inspection_tour_tab_id" type="button" role="tab"
                            aria-controls="home" aria-selected="true">
                            الجولة التفتيشية المسائية والليلية
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button data-mdb-toggle="tab" class="nav-link" id="direct_status_report_tab"
                            data-mdb-target="#direct_status_report_tab_id" type="button" role="tab"
                            aria-controls="profile" aria-selected="false">
                            تقرير مباشرة حالة
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button data-mdb-toggle="tab" class="nav-link" id="daily_notes_tab"
                            data-mdb-target="#daily_notes_tab_id" type="button" role="tab" aria-controls="contact"
                            aria-selected="false">
                            الجولة اليومية
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="dailyToursTabContent" wire:ignore.self>

                    <div class="tab-pane fade show active" id="night_inspection_tour_tab_id" role="tabpanel"
                        aria-labelledby="night_inspection_tour_tab" wire:ignore>

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم الجولة التفتيشية
                                المسائية والليلية
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.daily.night_inspection_tour') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.daily.night_inspection_tour') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <select class="select selectfield" id="{{ 'status_' . $x }}"
                                                    name="{{ 'status_' . $x }}">
                                                    <option value=""></option>
                                                    <option value="يوجد">يوجد</option>
                                                    <option value="لا يوجد">لا يوجد</option>
                                                    <option value="لا شيء">لا شيء</option>
                                                </select>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'work_number_' . $x }}" />
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name={{ 'comment_' . $x }} />
                                            </td>
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
                                ملاحظات التفتيش
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
                                <button type="submit" form="night_inspection_tour"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="direct_status_report_tab_id" role="tabpanel"
                        aria-labelledby="direct_status_report_tab" wire:ignore.self>

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم مباشرة الحالة
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label select-label mb-1"><strong>الحالة</strong></label>
                                <div class="input-group">
                                    <textarea name="status" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                                </div>
                                <div class="form-helper text-danger status-validation reset-validation"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label select-label mb-1"><strong>السبب</strong></label>
                                <div class="input-group">
                                    <textarea name="reason" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                                </div>
                                <div class="form-helper text-danger reason-validation reset-validation"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label select-label mb-1"><strong>القسم</strong></label>
                                <div class="input-group">
                                    <textarea name="section" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                                </div>
                                <div class="form-helper text-danger section-validation reset-validation"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label select-label mb-1"><strong>الملاحظات</strong></label>
                                <div class="input-group">
                                    <textarea name="notes" maxlength="500" class="form-control textfield" style="height: 100px;"></textarea>
                                </div>
                                <div class="form-helper text-danger notes-validation reset-validation"></div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <x-file-input name="image" model="form"
                                label="صورة الحالة"></x-file-input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" form="direct_status_report"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="daily_notes_tab_id" role="tabpanel"
                        aria-labelledby="daily_notes_tab" wire:ignore.self>

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم الجولة اليومية
                            </a>
                        </div>

                        <div class="table-responsive-md text-center mb-4">

                            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.daily.daily_tour') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.daily.daily_tour') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $x }}" />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'procedure_' . $x }}" />
                                            </td>

                                            <td>
                                                <x-file-input name="{{'location_image_' . $x}}" model="form"
                                                label=""></x-file-input>
                                            </td>


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




                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" form="daily_tour"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>


                    </div>


                </div>
            </div>


        </div>

        <div class="tab-pane fade" id="monthly_tours_pill_id" role="tabpanel" aria-labelledby="monthly_tours_pill" wire:ignore>
            <div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <!-- Dropdown Select to replace Tab Navigation -->
                        <select class="select inspection_section_select" data-mdb-filter="true"
                            name="inspection_section" id="inspection_section_select">
                            <option value="refrigerants_tab_id">المبردات</option>
                            <option value="warehouse_tab_id">المستودع</option>
                            <option value="generators_tab_id">المولدات</option>
                            <option value="boilers_tab_id">الغلايات</option>
                            <option value="fire_sprinklers_tab_id">رشاشات الحريق</option>
                            <option value="fm200_tab_id">FM200</option>
                            <option value="co2_system_tab_id">CO2 System</option>
                            <option value="external_warehouses_tab_id">المستودعات الخارجية</option>
                            <option value="staircase_tab_id">بيت الدرج</option>
                            <option value="surface_inspection_tab_id">تفتيش السطح</option>
                            <option value="kitchen_inspection_tab_id">تفتيش المطبخ</option>
                            <option value="fire_extinguishers_tab_id">طفايات الحريق</option>
                            <option value="fire_hoses_tab_id">خراطيم الحريق</option>
                            <option value="fire_blankets_tab_id">بطانيات الحريق</option>
                            <option value="emergency_shower_eye_wash_tab_id">غسيل العيون ودش الطوارىء</option>
                            <option value="emergency_exits_tab_id">مخارج الطوارىء</option>
                            <option value="elevator_inspection_tab_id">تفتيش المصاعد</option>
                            <option value="emergency_headlamps_tab_id">كشافات الطوارىء</option>
                            <option value="breakersfm_tab_id">قواطع FM200</option>
                        </select>
                    </div>
                </div>

                <!-- Tab Content for Each Section -->
                <div class="tab-content" id="dailyToursTabContent">

                    <div class="tab-pane fade tab-pane-selector active show" id="refrigerants_tab_id"
                        role="tabpanel">

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم المبردات
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.refrigerants') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.refrigerants') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <!-- First Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <!-- Second Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <!-- Third Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>
                                            <td dir="ltr">{{ $key }}</td>
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
                                ملاحظات التفتيش
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
                                <button type="submit" form="refrigerants"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="warehouse_tab_id" role="tabpanel">

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم المستودع
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.warehouse') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.warehouse') as $key => $value)
                                        <tr class="text-center">
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <!-- First Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />
                                            </td>

                                            <td>
                                                <!-- Second Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

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
                                ملاحظات المستودع
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
                                <button type="submit" form="warehouse"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="generators_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم المولدات
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.generators') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.generators') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <!-- First Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <!-- Second Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <!-- Third Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>
                                            <td dir="ltr">{{ $key }}</td>
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
                                ملاحظات المولدات
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
                                <button type="submit" form="generators"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="boilers_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم الغلايات
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.boilers') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.boilers') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <!-- First Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <!-- Second Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <!-- Third Radio Button -->
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>
                                            <td dir="ltr">{{ $key }}</td>
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
                                ملاحظات الغلايات
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
                                <button type="submit" form="boilers" class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="fire_sprinklers_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم رشاشات الحريق
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.fire_sprinklers') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.fire_sprinklers') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <select class="select selectfield" id="{{ 'status_' . $x }}"
                                                    name="{{ 'status_' . $x }}">
                                                    <option value=""></option>
                                                    <option value="غير مطلوب">غير مطلوب</option>
                                                    <option value="سليم">سليم</option>
                                                    <option value="غير سليم">غير سليم</option>
                                                </select>
                                            </td>
                                            <td dir="ltr">{{ $key }}</td>
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
                                ملاحظات رشاشات الحريق
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
                                <button type="submit" form="fire_sprinklers"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="fm200_tab_id" role="tabpanel">

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700;">
                                فورم FM200
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.FM200') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.FM200') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات FM200
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
                                <button type="submit" form="FM200" class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="co2_system_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم نظام CO2
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.CO2') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.CO2') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات CO2
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
                                <button type="submit" form="CO2" class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="external_warehouses_tab_id" role="tabpanel">


                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم المستودعات الخارجية
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.external_warehouses') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.external_warehouses') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات المستودعات الخارجية
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
                                <button type="submit" form="external_warehouses"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>



                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="staircase_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم بيت الدرج
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.staircase') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.staircase') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات بيت الدرج
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
                                <button type="submit" form="staircase"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="surface_inspection_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم تفتيش السطح
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.surface_inspection') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.surface_inspection') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات تفتيش السطح
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
                                <button type="submit" form="surface_inspection"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="kitchen_inspection_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم تفتيش المطبخ
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.kitchen_inspection') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.kitchen_inspection') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value }}</td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
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
                                ملاحظات تفتيش المطبخ
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
                                <button type="submit" form="kitchen_inspection"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="fire_extinguishers_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم طفايات الحريق
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
                                <span class="datatable-loader-inner"> <span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center fire-extinguishers"
                                style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.fire_extinguishers') as $element)
                                            <th class="th-sm p-2"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.fire_extinguishers') as $key => $value)
                                        <tr>
                                            <td class="p-2">{{ $x }}</td>
                                            <td class="p-2">
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'extinguisher_' . $x }}" />
                                            </td>
                                            <td class="p-2">
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $x }}" />
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'type_' . $x }}"
                                                    name="{{ 'type_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="co2">co2</option>
                                                    <option value="زيتية">زيتية</option>
                                                    <option value="بودره">بودره</option>
                                                </select>
                                            </td>


                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'capacity_' . $x }}"
                                                    name="{{ 'capacity_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="2 kg">2 kg</option>
                                                    <option value="4 kg">4 kg</option>
                                                    <option value="6 kg">6 kg</option>
                                                    <option value="10 kg">10 kg</option>
                                                    <option value="15 kg">15 kg</option>
                                                    <option value="25 kg">25 kg</option>
                                                    <option value="50 kg">50 kg</option>
                                                </select>
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'bracket_' . $x }}"
                                                    name="{{ 'bracket_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'fundation_' . $x }}"
                                                    name="{{ 'fundation_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'cyliner_' . $x }}"
                                                    name="{{ 'cyliner_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>


                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'pin_seal_' . $x }}"
                                                    name="{{ 'pin_seal_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'hose_' . $x }}"
                                                    name="{{ 'hose_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>

                                            <td class="p-2">
                                                <select class="select selectfield" id="{{ 'pressure_' . $x }}"
                                                    name="{{ 'pressure_' . $x }}">
                                                    <option value="">لا شيء</option>
                                                    <option value="✔️">✔️</option>
                                                    <option value="❌">❌</option>
                                                </select>
                                            </td>
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
                                ملاحظات طفايات الحريق
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
                                <button type="submit" form="fire_extinguishers"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="fire_hoses_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم خراطيم الحريق
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.fire_hoses') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.fire_hoses') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $x }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
                                            </td>
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
                                ملاحظات خراطيم الحريق
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
                                <button type="submit" form="fire_hoses"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="fire_blankets_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم بطانيات الحريق
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.fire_blankets') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.fire_blankets') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $x }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'sat_' . $x }}"
                                                    id="{{ 'sat_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'un_' . $x }}"
                                                    id="{{ 'un_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
                                            </td>
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
                                ملاحظات بطانيات الحريق
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
                                <button type="submit" form="fire_blankets"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="emergency_shower_eye_wash_tab_id"
                        role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم غسيل العيون ودش الطوارىء
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

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم دش الطوارىء
                            </a>
                        </div>

                        <div class="table-responsive-md text-center mb-4">
                            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.emergency_shower_eye_wash') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.emergency_shower_eye_wash_1') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $x }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'un_' . $x }}"
                                                    id="{{ 'un_' . $x }}" />

                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'sat_' . $x }}"
                                                    id="{{ 'sat_' . $x }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'notreq_' . $x }}"
                                                    id="{{ 'notreq_' . $x }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $x }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $x }}" />
                                            </td>
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
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم غسيل العيون
                            </a>
                        </div>

                        <div class="table-responsive-md text-center mb-4">
                            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.emergency_shower_eye_wash') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.emergency_shower_eye_wash_2') as $key => $value)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                                    id="{{ 'un_' . $key }}" />

                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                                    id="{{ 'sat_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'notreq_' . $key }}"
                                                    id="{{ 'notreq_' . $key }}" />
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $key }}">Clear</button>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $key }}" />
                                            </td>
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
                                ملاحظات دش الطوارىء وغسيل العيون
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
                                <button type="submit" form="emergency_shower_eye_wash"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="emergency_exits_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم مخارج الطوارىء
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

                        <div class="table-responsive-md text-center mb-4" style="overflow-x: auto;">
                            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.emergency_exits') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.emergency_exits') as $key => $value)
                                        <tr>
                                            <td class="px-2">{{ $key }}</td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'location_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'clear_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'knob_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'box_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'door_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'flush_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'resistance_' . $key }}" style="min-width: 200px;" />
                                            </td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'obstructed_' . $key }}" style="min-width: 200px;" />
                                            </td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'notes_' . $key }}"
                                                    style="min-width: 200px;" /></td>
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
                                ملاحظات مخارج الطوارىء
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
                                <button type="submit" form="emergency_exits"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="elevator_inspection_tab_id" role="tabpanel">

                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم تفتيش المصاعد
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

                        <div class="table-responsive-md text-center mb-4" style="overflow-x: auto;">
                            <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.elevator_inspection') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.elevator_inspection') as $key => $value)
                                        <tr>
                                            <td class="px-2">{{ $key }}</td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'location_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'alarm_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'open_floor_level_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'door_condition_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'lift_room_' . $key }}" style="min-width: 200px;" />
                                            </td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'internal_light_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'ventilation_system_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield" name="{{ 'tel_' . $key }}"
                                                    style="min-width: 200px;" /></td>
                                            <td class="px-2"><input type="text"
                                                    class="form-control textfield"
                                                    name="{{ 'lift_operation_condition_' . $key }}"
                                                    style="min-width: 200px;" /></td>
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
                                ملاحظات تفتيش المصاعد
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
                                <button type="submit" form="elevator_inspection"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="emergency_headlamps_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم كاشفات الطوارىء
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.emergency_headlamps') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.emergency_headlamps') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                                    id="{{ 'sat_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                                    id="{{ 'un_' . $key }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $key }}">Clear</button>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $key }}" />
                                            </td>
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
                                ملاحظات كاشفات الطوارىء
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
                                <button type="submit" form="emergency_headlamps"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade tab-pane-selector" id="breakersfm_tab_id" role="tabpanel">
                        <div class="row mb-3">
                            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                                فورم قواطع FM200
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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
                            </div>

                            <table class="table table-bordered text-center" style="margin-bottom: 0rem;">
                                <thead class="background-green text-white">
                                    <tr>
                                        @foreach (config('data.forms.table-header.monthly.breakersfm') as $element)
                                            <th class="th-sm"><strong>{{ $element }}</strong></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $x = 1;
                                    @endphp

                                    @forelse (config('data.forms.table-body.monthly.breakersfm') as $key => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'location_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'sat_' . $key }}"
                                                    id="{{ 'sat_' . $key }}" />
                                            </td>
                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $key }}" value="{{ 'un_' . $key }}"
                                                    id="{{ 'un_' . $key }}" />

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm clearbutton"
                                                    row="{{ 'row_' . $key }}">Clear</button>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control textfield"
                                                    name="{{ 'comment_' . $key }}" />
                                            </td>
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
                                ملاحظات قواطع FM200
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
                                <button type="submit" form="breakersfm"
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="annual_tours_pill_id" role="tabpanel" aria-labelledby="annual_tours_pill" wire:ignore>
            <div>
                <ul class="nav nav-tabs mb-3" id="dailyToursTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button data-mdb-toggle="tab" class="nav-link active"
                            id="glass_breaker_fire_detectors_tab"
                            data-mdb-target="#glass_breaker_fire_detectors_tab_id" type="button" role="tab"
                            aria-controls="home" aria-selected="true">
                            الجولة التفتيشية المسائية والليلية
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="annualToursTabContent">

                    <div class="tab-pane fade show active" id="glass_breaker_fire_detectors_tab_id"
                        role="tabpanel" aria-labelledby="glass_breaker_fire_detectors_tab">

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
                                <span class="datatable-loader-inner"><span
                                        class="datatable-progress bg-primary"></span></span>
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
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'na_' . $x }}"
                                                    id="{{ 'na_' . $x }}" />
                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'no_' . $x }}"
                                                    id="{{ 'no_' . $x }}" />

                                            </td>

                                            <td>
                                                <input class="form-check-input checkboxradio" type="radio"
                                                    name="{{ 'row_' . $x }}" value="{{ 'yes_' . $x }}"
                                                    id="{{ 'yes_' . $x }}" />

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
                                    class="btn btn-lg text-white btn-block submit"
                                    style="background-color: #7a9e85; font-weight: 700;">
                                    حفظ البيانات
                                    <span class="spinner-border spinner-border-sm me-2" role="status"
                                        aria-hidden="true" wire:loading></span>
                                </button>
                            </div>
                        </div>



                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- Tabs content -->
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            var $data = [];
            var $textfield = $(".textfield");
            var $imagefield = $(".imagefield");
            var $selectfield = $(".selectfield");
            var $checkboxradio = $(".checkboxradio");
            var $clearbutton = $(".clearbutton");
            var $submit = $(".submit");

            var $inspection_section_select = $(".inspection_section_select");

            function getContent() {
                let $object = Object.assign({}, $data);
                return JSON.stringify($object);
            }

            $textfield.on('input', function() {
                let $user_action = $(this);
                let $index = $data.indexOf($user_action.attr('name'));

                if ($user_action.val()) {
                    $data[$user_action.attr('name')] = $user_action.val();
                } else {
                    delete $data[$user_action.attr('name')];
                }
            });

            $clearbutton.on('click', function() {
                let $user_action = $(this);
                let $row = $user_action.attr('row');
                $(`input[name="${$row}"]`).prop('checked', false);
                delete $data[$row];
            });

            $submit.on('click', function() {
                let $user_action = $(this);
                let $form_name = $user_action.attr('form');
                @this.set('form_name', $form_name);

                for (const key in $data) {
                    if (key.startsWith("row_")) {
                        $data[$data[key]] = "✓";
                        delete $data[key];
                    }
                }

                @this.set('data', getContent());
                Livewire.dispatch('submitting-data');

                for (const selectId in $data) {
                    console.log(selectId);
                    if ($data.hasOwnProperty(selectId)) {
                        // Get the select element instance
                        let $querySelectorSelect = mdb.Select.getInstance(document.querySelector(
                            `#${selectId}`));

                        // Set the select value
                        if ($querySelectorSelect) {
                            $querySelectorSelect.setValue("");
                        }
                    }
                }

                $data = [];
                $textfield.val("");
                $(`input[type="radio"]`).prop('checked', false);
            });

            // JavaScript function to show the relevant tab content based on dropdown selection
            function showTabContent() {
                // Hide all tab content divs
                document.querySelectorAll('.tab-pane').forEach(tab => {
                    tab.classList.remove('show', 'active');
                });

                // Get the selected option's value and show corresponding tab content
                const selectedTabId = document.getElementById('inspection_section_select').value;
                console.log(selectedTabId);

                // document.getElementById(selectedTabId).classList.add('show', 'active');
            }

            $inspection_section_select.on('change', function() {
                var $user_action = $(this);
                document.querySelectorAll('.tab-pane-selector').forEach(tab => {
                    tab.classList.remove('show', 'active');
                });
                document.getElementById($user_action.val()).classList.add('show', 'active');
            });

            $checkboxradio.on("click", function() {
                let $user_action = $(this);
                let $name = $user_action.attr('name');
                let $value = $user_action.attr('value');
                $data[$name] = $value;
            });

            $selectfield.on('change', function() {
                let $user_action = $(this);

                if ($user_action.val()) {
                    $data[$user_action.attr('name')] = $user_action.val();
                } else {
                    delete $data[$user_action.attr('name')];
                }

            });

            $imagefield.on('change',function(e){
                let $user_action = $(this);
                const $file = e.target.files[0];
                if($file){
                    $data[$user_action.attr('name')] = $file;
                }
            });

        });
    </script>
@endpush
