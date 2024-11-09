<div class="container my-5" wire:ignore>
    <div class="row">
        <div class="row mb-3">
            <a style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">
                لوحة توقيع الموظف
            </a>
        </div>

        <div class="col-md-6">
            <div class="card-body">
                <div class="col-md-12">
                    <label class="form-label" for=""
                        style="color: rgba(0, 0, 0, 0.6); font-size: 18px; font-weight: 700; ">التوقيع:</label>
                    <br />
                    <div id="sig"></div>
                    <br />
                    <button id="clear" class="btn btn-danger btn-sm">مسح التوقيع</button>

                    <textarea id="signature64" rows="1" class="signed" name="signed" style="display: none"></textarea>
                </div>
                <br />
                <button class="btn btn-success submit">حفظ</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var $submit = $(".submit");
            var $signed = $(".signed");

            var sig = $('#sig').signature({
                syncField: '#signature64',
                syncFormat: 'PNG'
            });

            $('#clear').click(function(e) {
                e.preventDefault();
                sig.signature('clear');
                $("#signature64").val('');
            });

            $submit.on('click', function() {
                $user_action = $(this);
                @this.set('signed', $signed.val());
                Livewire.dispatch('submitting-signed');
            });

        });
    </script>
@endpush
