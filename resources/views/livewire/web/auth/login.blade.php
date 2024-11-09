<!-- "تسجيل الدخول" Section -->
<div class="container my-4 py-5 d-flex flex-column align-items-center">

    <style>
        .form-control:focus {
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: rgb(1, 161, 127);
            -webkit-box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
            box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-label {
            color: rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-middle {
            border-bottom: 0.125rem solid;
            border-color: rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-leading {
            border-top: 0.125rem solid rgb(1, 161, 127);
            border-bottom: 0.125rem solid rgb(1, 161, 127);
            border-right: 0.125rem solid rgb(1, 161, 127);
        }

        .form-outline .form-control:focus~.form-notch .form-notch-trailing {
            border-top: 0.125rem solid rgb(1, 161, 127);
            border-bottom: 0.125rem solid rgb(1, 161, 127);
            border-left: 0.125rem solid rgb(1, 161, 127);
        }

        .input-group>.form-control:focus {
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
            border-color: rgb(1, 161, 127);
            outline: 0;
            -webkit-box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
            box-shadow: inset 0 0 0 1px rgb(1, 161, 127);
        }
    </style>
    </style>
    <h2 class="mb-4">تسجيل الدخول</h2>
    <p class="lead" style="font-size: 1.2rem;">
        يرجى إدخال بيانات الاعتماد الخاصة بك لتسجيل الدخول.
    </p>

    <div style="width: 30rem;" class="d-flex flex-column align-items-center">
        <!-- Email Input -->
        <div class="form-outline mb-4 w-100">
            <input type="text" id="JobNumber" maxlength="10" class="form-control form-control-lg job-number-input"
                required />
            <label class="form-label " for="JobNumber">الرقم الوظيفي</label>
            <div class="form-helper text-danger job_number-validation"></div>
        </div>

        <!-- Password Input -->
        <div class="form-outline mb-4 w-100">
            <input type="password" maxlength="30" id="loginPassword" class="form-control form-control-lg password-input"
                required />
            <label class="form-label " for="loginPassword">كلمة المرور</label>
            <div class="form-helper text-danger password-validation"></div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="form-check mb-4 text-center">
            <input type="checkbox" class="form-check-input" id="rememberMe" />
            <label class="form-check-label " for="rememberMe">تذكرني</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn text-white btn-lg w-100 submitting-login-button background-blue">تسجيل
            الدخول</button>
    </div>

    <p class="mt-4" style="font-size: 1rem;">
        <a href="#" class="">نسيت كلمة المرور؟</a>
    </p>
</div>

@push('admin-login-script')
    <script>
        $(document).ready(function() {

            // Values
            let $job_number_value = "";
            let $password_value = "";

            // Validations
            const $job_number_validation = $(".job_number-validation");
            const $password_validation = $(".password-validation");

            // Inputs
            const $phone_email_input = $(".job-number-input");
            const $password_input = $(".password-input");

            // Buttons
            const $submitting_login_button = $(".submitting-login-button");

            // Clear validation messages on input
            $phone_email_input.on('input', function() {
                $job_number_validation.text(""); // Clear validation message
                $job_number_value = $(this).val(); // Update the email/phone value
            });

            $password_input.on('input', function() {
                $password_validation.text(""); // Clear validation message
                $password_value = $(this).val(); // Update the password value
            });


            // Login button click event
            $submitting_login_button.on('click', function() {
                const isValid = admin_login_validation(); // Validate input fields

                if (isValid) {
                    @this.set('job_number', $job_number_value); // Set email/phone value in Livewire
                    @this.set('password', $password_value); // Set password value in Livewire
                    Livewire.dispatch('submitting-login-data'); // Dispatch the event
                }
            });

            // Admin login validation function
            function admin_login_validation() {
                $job_number_validation.text(""); // Clear validation message
                $password_validation.text(""); // Clear validation message

                // Check if both email/phone and password are provided
                if (!$job_number_value && !$password_value) {
                    $job_number_validation.text("تأكد من إدخال الرقم الوظيفي");
                    $password_validation.text("تأكد من كلمة المرور");
                    return false;
                }

                if (!$job_number_value) {
                    $job_number_validation.text("تأكد من إدخال الرقم الوظيفي");
                    return false;
                }
                if (!$password_value) {
                    $password_validation.text("تأكد من كلمة المرور");
                    return false;
                }

                return true; // Return true if all validations pass
            }

            // Validation response from the server
            Livewire.on('admin-db-login-validation', function(value) {
                const message = value[0];

                if (message.password) {
                    $password_validation.text(message.password); // Show password error message
                }

                if (message.email) {
                    $job_number_validation.text(message.email); // Show email error message
                }
            });

        });
    </script>
@endpush
