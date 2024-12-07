<div class="container my-5 text-white" wire:ignore.self>

    <x-taps.main-taps :user="$user"></x-taps.main-taps>

    <!-- Tabs content -->
    <div class="tab-content" id="ex-with-icons-content" wire:ignore.self>

        <div class="tab-pane fade show active" id="daily_tours_pill_id" role="tabpanel" aria-labelledby="daily_tours_pill"
            wire:ignore.self>
            <x-taps.daily-taps></x-taps.daily-taps>
            <x-contents.daily-content></x-contents.daily-content>
        </div>

        <div class="tab-pane fade" id="weekly_tours_pill_id" role="tabpanel" aria-labelledby="weekly_tours_pill"
            wire:ignore.self>
            <x-taps.weekly-taps></x-taps.weekly-taps>
            <x-contents.weekly-content></x-contents.weekly-content>
        </div>

        <div class="tab-pane fade" id="monthly_tours_pill_id" role="tabpanel" aria-labelledby="monthly_tours_pill"
            wire:ignore>
            <x-taps.monthly-taps></x-taps.monthly-taps>
            <x-contents.monthly-content></x-contents.monthly-content>
        </div>

        <div class="tab-pane fade" id="annual_tours_pill_id" role="tabpanel" aria-labelledby="annual_tours_pill"
            wire:ignore>
            <x-taps.annual-taps></x-taps.annual-taps>
            <x-contents.annual-content></x-contents.annual-content>
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

                // $imagesDownload
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

            $imagefield.on('change', function(e) {
                let $user_action = $(this);
                const $file = e.target.files[0];
                if ($file) {
                    $data[$user_action.attr('name')] = $file;
                }
            });

        });
    </script>
@endpush
