<div class="signature-page" wire:ignore>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

        .signature-page {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            font-family: 'Tajawal', sans-serif;
        }

        .sig-wrapper {
            width: 100%;
            max-width: 640px;
        }

        /* Back */
        .sig-back {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: #94a3b8;
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 1.25rem;
            transition: color 0.2s;
        }

        .sig-back:hover {
            color: #005fa1;
        }

        /* Header */
        .sig-header {
            background: linear-gradient(135deg, #004e8a 0%, #005fa1 45%, rgb(1, 145, 115) 80%, rgb(1, 161, 127) 100%);
            border-radius: 1.25rem 1.25rem 0 0;
            padding: 2rem 2rem 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .sig-header::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
            pointer-events: none;
        }

        .sig-header::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            pointer-events: none;
        }

        .sig-header-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.18);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .sig-header h2 {
            font-size: 1.45rem;
            font-weight: 800;
            margin: 0 0 0.3rem;
            position: relative;
            z-index: 1;
        }

        .sig-header p {
            font-size: 0.9rem;
            opacity: 0.82;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        /* Body */
        .sig-body {
            background: #fff;
            border-radius: 0 0 1.25rem 1.25rem;
            padding: 2rem;
            box-shadow: 0 20px 60px rgba(0, 95, 161, 0.15);
        }

        /* Current Signature Preview */
        .current-sig-box {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.85rem 1.1rem;
            margin-bottom: 1.25rem;
        }

        .current-sig-box img {
            max-height: 52px;
            max-width: 160px;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            background: #fff;
            padding: 3px 8px;
            object-fit: contain;
        }

        .current-sig-label {
            font-size: 0.82rem;
            color: #64748b;
            font-weight: 600;
            flex: 1;
        }

        .current-sig-label strong {
            display: block;
            color: #1e293b;
            font-size: 0.9rem;
            margin-bottom: 0.15rem;
        }

        /* Canvas Label */
        .sig-canvas-label {
            font-size: 0.88rem;
            font-weight: 700;
            color: #475569;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .sig-canvas-label i {
            color: #005fa1;
        }

        /* Canvas Wrapper */
        .sig-canvas-wrapper {
            border: 2px dashed #cbd5e1;
            border-radius: 1rem;
            background: #f8fafc;
            overflow: hidden;
            transition: border-color 0.2s, box-shadow 0.2s;
            position: relative;
            cursor: crosshair;
        }

        .sig-canvas-wrapper.active {
            border-color: rgb(1, 161, 127);
            border-style: solid;
            box-shadow: 0 0 0 4px rgba(1, 161, 127, 0.1);
        }

        .sig-canvas-wrapper.error {
            border-color: #dc2626;
            border-style: solid;
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.12);
        }

        .sig-canvas-wrapper .kbw-signature {
            width: 100% !important;
            height: 220px !important;
            border: none !important;
            background: transparent !important;
            display: block;
        }

        .sig-canvas-hint {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            pointer-events: none;
            transition: opacity 0.25s;
            color: #cbd5e1;
            user-select: none;
        }

        .sig-canvas-hint i {
            font-size: 2rem;
        }

        .sig-canvas-hint p {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        /* Actions */
        .sig-actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.25rem;
            flex-wrap: wrap;
        }

        .btn-sig-clear {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 0.65rem;
            padding: 0.65rem 1.25rem;
            font-size: 0.9rem;
            font-weight: 700;
            color: #64748b;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Tajawal', sans-serif;
        }

        .btn-sig-clear:hover {
            background: #fee2e2;
            border-color: #fca5a5;
            color: #dc2626;
        }

        .btn-sig-save {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
            color: #fff;
            border: none;
            border-radius: 0.65rem;
            padding: 0.7rem 2rem;
            font-size: 0.95rem;
            font-weight: 800;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Tajawal', sans-serif;
            box-shadow: 0 4px 16px rgba(0, 95, 161, 0.3);
        }

        .btn-sig-save:hover {
            opacity: 0.9;
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(0, 95, 161, 0.35);
        }

        .btn-sig-save:active {
            transform: translateY(0);
        }

        /* Error msg */
        .sig-error-msg {
            display: none;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.75rem;
            background: #fff1f2;
            border: 1px solid #fecdd3;
            border-radius: 0.6rem;
            padding: 0.6rem 1rem;
            font-size: 0.87rem;
            color: #be123c;
            font-weight: 600;
        }

        .sig-error-msg.show {
            display: flex;
        }

        /* Tip */
        .sig-tip {
            margin-top: 1.5rem;
            background: rgba(0, 95, 161, 0.05);
            border: 1px solid rgba(0, 95, 161, 0.1);
            border-radius: 0.75rem;
            padding: 0.9rem 1.1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .sig-tip-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: rgba(0, 95, 161, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #005fa1;
            font-size: 0.85rem;
            flex-shrink: 0;
        }

        .sig-tip p {
            font-size: 0.85rem;
            color: #64748b;
            margin: 0;
            line-height: 1.6;
        }

        .sig-tip strong {
            color: #1e293b;
            font-weight: 700;
        }
    </style>

    <div class="sig-wrapper">

        <a href="{{ route('web.home') }}" class="sig-back">
            <i class="fas fa-arrow-right"></i>
            العودة إلى الرئيسية
        </a>

        {{-- Header --}}
        <div class="sig-header">
            <div class="sig-header-icon"><i class="fas fa-pen-fancy"></i></div>
            <h2>{{ auth()->user()->signature ? 'تغيير التوقيع' : 'إضافة توقيع' }}</h2>
            <p>ارسم توقيعك في المساحة أدناه ثم احفظه ليُستخدم في تقاريرك</p>
        </div>

        {{-- Body --}}
        <div class="sig-body">

            {{-- Current signature preview (if exists) --}}
            @if (auth()->user()->signature)
                <div class="current-sig-box">
                    <img src="{{ asset('upload/' . auth()->user()->signature) }}" alt="التوقيع الحالي">
                    <div class="current-sig-label">
                        <strong>توقيعك الحالي</strong>
                        ارسم توقيعاً جديداً أدناه لاستبداله
                    </div>
                </div>
            @endif

            <div class="sig-canvas-label">
                <i class="fas fa-signature"></i>
                {{ auth()->user()->signature ? 'التوقيع الجديد' : 'منطقة التوقيع' }}
            </div>

            <div class="sig-canvas-wrapper" id="sigWrapper">
                <div class="sig-canvas-hint" id="sigHint">
                    <i class="fas fa-pen-nib"></i>
                    <p>ابدأ بالرسم هنا...</p>
                </div>
                <div id="sig"></div>
            </div>

            <textarea id="signature64" name="signed" class="signed" rows="1" style="display:none;"></textarea>

            <div class="sig-error-msg" id="sigError">
                <i class="fas fa-circle-exclamation"></i>
                يرجى رسم توقيعك أولاً قبل الحفظ
            </div>

            <div class="sig-actions">
                <button class="btn-sig-clear" id="clear" type="button">
                    <i class="fas fa-eraser"></i>
                    مسح التوقيع
                </button>
                <button class="btn-sig-save submit" type="button">
                    <i class="fas fa-floppy-disk"></i>
                    {{ auth()->user()->signature ? 'حفظ التوقيع الجديد' : 'حفظ التوقيع' }}
                </button>
            </div>

            <div class="sig-tip">
                <div class="sig-tip-icon"><i class="fas fa-lightbulb"></i></div>
                <p>
                    <strong>نصيحة:</strong>
                    استخدم إصبعك على الشاشات اللمسية أو الماوس على أجهزة الكمبيوتر للرسم بدقة أكبر.
                    يُستخدم هذا التوقيع في ملفات PDF الخاصة بفروم السلامة.
                </p>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            var $signed = $(".signed");
            var $hint = $("#sigHint");
            var $wrapper = $("#sigWrapper");
            var $error = $("#sigError");
            var hasDrawn = false;

            var sig = $('#sig').signature({
                syncField: '#signature64',
                syncFormat: 'PNG',
                lineWidth: 2,
                penColour: '#1e293b',
            });

            // Hide hint & activate border once user starts drawing
            $('#sig canvas').on('mousedown touchstart', function() {
                if (!hasDrawn) {
                    hasDrawn = true;
                    $hint.css('opacity', '0');
                    $wrapper.addClass('active').removeClass('error');
                    $error.removeClass('show');
                }
            });

            // Clear — allow full redraw at any time
            $('#clear').on('click', function(e) {
                e.preventDefault();
                sig.signature('clear');
                $('#signature64').val('');
                hasDrawn = false;
                $hint.css('opacity', '1');
                $wrapper.removeClass('active error');
                $error.removeClass('show');
            });

            // Save
            $('.submit').on('click', function() {
                if (!hasDrawn || !$signed.val() || $signed.val().length < 50) {
                    $wrapper.addClass('error').removeClass('active');
                    $error.addClass('show');
                    // Auto-remove error styling after 2s
                    setTimeout(function() {
                        $wrapper.removeClass('error');
                        $error.removeClass('show');
                    }, 2000);
                    return;
                }
                @this.set('signed', $signed.val());
                Livewire.dispatch('submitting-signed');
            });
        });
    </script>
@endpush
