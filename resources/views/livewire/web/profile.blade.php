<div class="profile-page py-5" wire:ignore.self>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

        .profile-page {
            min-height: 100vh;
            font-family: 'Tajawal', sans-serif;
        }

        /* ===== Hero ===== */
        .profile-hero {
            background: linear-gradient(135deg, #004e8a 0%, #005fa1 40%, rgb(1, 145, 115) 80%, rgb(1, 161, 127) 100%);
            border-radius: 1.25rem;
            padding: 2.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 20px 60px rgba(0, 95, 161, 0.3);
        }

        .profile-hero::before {
            content: '';
            position: absolute;
            top: -80px;
            left: -80px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            pointer-events: none;
        }

        .profile-hero::after {
            content: '';
            position: absolute;
            bottom: -60px;
            right: -60px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            pointer-events: none;
        }

        .hero-dots {
            position: absolute;
            top: 20px;
            left: 50%;
            width: 120px;
            height: 120px;
            opacity: 0.08;
            background-image: radial-gradient(circle, #fff 1px, transparent 1px);
            background-size: 12px 12px;
            pointer-events: none;
        }

        .avatar-circle {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.4rem;
            font-weight: 800;
            color: #fff;
            border: 3px solid rgba(255, 255, 255, 0.45);
            flex-shrink: 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1;
        }

        .avatar-circle img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-online {
            width: 16px;
            height: 16px;
            background: #4ade80;
            border-radius: 50%;
            border: 2px solid #fff;
            position: absolute;
            bottom: 4px;
            right: 4px;
        }

        .profile-name {
            font-size: 1.65rem;
            font-weight: 800;
            margin-bottom: 0.2rem;
        }

        .profile-job {
            font-size: 1rem;
            opacity: 0.82;
            margin-bottom: 0.5rem;
        }

        .profile-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.32);
            border-radius: 2rem;
            padding: 0.3rem 1rem;
            font-size: 0.88rem;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        .hero-meta {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
            font-size: 0.85rem;
            opacity: 0.85;
        }

        .hero-meta span {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        /* ============================================================
           STAT CARDS — ألوان واضحة ومميزة لكل بطاقة
           ============================================================ */
        .stat-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.6rem 1rem 1.4rem;
            text-align: center;
            box-shadow: 0 2px 14px rgba(0, 0, 0, 0.08);
            border: 1px solid transparent;
            transition: transform 0.22s ease, box-shadow 0.22s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* شريط علوي عريض */
        .stat-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 1rem 1rem 0 0;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.13);
        }

        /* بطاقة 1 — أزرق (الإجمالي) */
        .sc-blue {
            border-color: #bfdbfe;
        }

        .sc-blue::after {
            background: linear-gradient(90deg, #1d4ed8, #3b82f6);
        }

        .sc-blue .stat-icon {
            background: #eff6ff;
            color: #1d4ed8;
            border: 1.5px solid #bfdbfe;
        }

        .sc-blue .stat-number {
            color: #1d4ed8;
        }

        /* بطاقة 2 — أخضر زمردي (يومية) */
        .sc-emerald {
            border-color: #a7f3d0;
        }

        .sc-emerald::after {
            background: linear-gradient(90deg, #047857, #34d399);
        }

        .sc-emerald .stat-icon {
            background: #ecfdf5;
            color: #047857;
            border: 1.5px solid #a7f3d0;
        }

        .sc-emerald .stat-number {
            color: #047857;
        }

        /* بطاقة 3 — برتقالي عنبر (أسبوعية) */
        .sc-amber {
            border-color: #fde68a;
        }

        .sc-amber::after {
            background: linear-gradient(90deg, #b45309, #f59e0b);
        }

        .sc-amber .stat-icon {
            background: #fffbeb;
            color: #b45309;
            border: 1.5px solid #fde68a;
        }

        .sc-amber .stat-number {
            color: #b45309;
        }

        /* بطاقة 4 — بنفسجي (شهرية) */
        .sc-violet {
            border-color: #ddd6fe;
        }

        .sc-violet::after {
            background: linear-gradient(90deg, #6d28d9, #a78bfa);
        }

        .sc-violet .stat-icon {
            background: #f5f3ff;
            color: #6d28d9;
            border: 1.5px solid #ddd6fe;
        }

        .sc-violet .stat-number {
            color: #6d28d9;
        }

        /* بطاقة 5 — ورد أحمر (سنوية) */
        .sc-rose {
            border-color: #fecdd3;
        }

        .sc-rose::after {
            background: linear-gradient(90deg, #be123c, #f43f5e);
        }

        .sc-rose .stat-icon {
            background: #fff1f2;
            color: #be123c;
            border: 1.5px solid #fecdd3;
        }

        .sc-rose .stat-number {
            color: #be123c;
        }

        /* بطاقة 6 — سماوي فيروزي (هذا الشهر) */
        .sc-teal {
            border-color: #99f6e4;
        }

        .sc-teal::after {
            background: linear-gradient(90deg, #0f766e, #2dd4bf);
        }

        .sc-teal .stat-icon {
            background: #f0fdfa;
            color: #0f766e;
            border: 1.5px solid #99f6e4;
        }

        .sc-teal .stat-number {
            color: #0f766e;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin: 0 auto 0.9rem;
        }

        .stat-number {
            font-size: 2.1rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.3rem;
            letter-spacing: -0.03em;
        }

        .stat-label {
            font-size: 0.83rem;
            color: #64748b;
            font-weight: 600;
        }

        /* ===== Cards ===== */
        .info-card,
        .table-card {
            background: #fff;
            border-radius: 1rem;
            padding: 1.75rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
            border: 1px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: #005fa1;
            margin-bottom: 1.25rem;
            padding-bottom: 0.85rem;
            border-bottom: 2px solid rgba(0, 95, 161, 0.1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-title-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: rgba(0, 95, 161, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #005fa1;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        /* Info Rows */
        .info-row {
            display: flex;
            align-items: flex-start;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f5f9;
            gap: 0.85rem;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-icon {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            background: rgba(0, 95, 161, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #005fa1;
            font-size: 0.85rem;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-key {
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 0.15rem;
        }

        .info-value {
            font-size: 0.95rem;
            color: #1e293b;
            font-weight: 700;
            word-break: break-all;
        }

        /* Signature */
        .signature-preview img {
            max-height: 65px;
            border: 1.5px solid #e2e8f0;
            border-radius: 8px;
            padding: 5px 10px;
            background: #f8fafc;
        }

        .btn-sig-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border-radius: 0.65rem;
            padding: 0.58rem 1.2rem;
            font-size: 0.88rem;
            font-weight: 700;
            text-decoration: none;
            border: none;
            transition: opacity 0.2s, transform 0.15s;
            width: 100%;
            margin-top: 0.6rem;
            cursor: pointer;
            font-family: 'Tajawal', sans-serif;
        }

        .btn-sig-action:hover {
            opacity: 0.88;
            transform: translateY(-1px);
            color: #fff;
        }

        .btn-sig-add {
            background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
            color: #fff;
        }

        .btn-sig-change {
            background: linear-gradient(135deg, #475569, #334155);
            color: #fff;
        }

        /* Filter */
        .filter-bar {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.85rem;
            padding: 1rem 1.25rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-bar label {
            font-size: 0.88rem;
            font-weight: 700;
            color: #475569;
            white-space: nowrap;
            margin-bottom: 0;
        }

        .filter-bar select {
            font-size: 0.9rem;
            border-radius: 0.55rem;
            border: 1.5px solid #e2e8f0;
            padding: 0.45rem 0.9rem;
            color: #334155;
            background: #fff;
            min-width: 200px;
            font-family: 'Tajawal', sans-serif;
            transition: border-color 0.2s;
        }

        .filter-bar select:focus {
            border-color: rgb(1, 161, 127);
            outline: none;
            box-shadow: 0 0 0 3px rgba(1, 161, 127, 0.12);
        }

        /* Table */
        .answers-table th {
            font-weight: 700;
            font-size: 0.88rem;
            text-align: center;
            vertical-align: middle;
            background: #f8fafc;
            color: #475569;
            padding: 0.9rem 0.75rem;
        }

        .answers-table td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.9rem;
            padding: 0.85rem 0.75rem;
            color: #334155;
        }

        .answers-table tbody tr {
            transition: background 0.15s;
        }

        .answers-table tbody tr:hover {
            background: rgba(0, 95, 161, 0.04);
        }

        /* Badges */
        .form-type-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.28rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .type-daily {
            background: #ecfdf5;
            color: #047857;
        }

        .type-weekly {
            background: #fffbeb;
            color: #b45309;
        }

        .type-monthly {
            background: #f5f3ff;
            color: #6d28d9;
        }

        .type-annual {
            background: #fff1f2;
            color: #be123c;
        }

        /* PDF Button */
        .btn-pdf {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 0.35rem 0.8rem;
            font-size: 0.8rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Tajawal', sans-serif;
        }

        .btn-pdf:hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.35);
        }

        .btn-pdf:disabled,
        .btn-pdf.loading {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3.5rem 1rem;
            color: #94a3b8;
        }

        .empty-state .empty-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #cbd5e1;
            margin: 0 auto 1rem;
        }

        .empty-state p {
            font-size: 0.95rem;
            font-weight: 600;
            margin: 0;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-top: 1.25rem;
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .pagination-info {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .pagination-controls {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .page-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            background: #fff;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.88rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.15s;
            font-family: 'Tajawal', sans-serif;
        }

        .page-btn:hover:not(:disabled) {
            background: rgba(0, 95, 161, 0.08);
            border-color: #005fa1;
            color: #005fa1;
        }

        .page-btn.active {
            background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
            border-color: transparent;
            color: #fff;
        }

        .page-btn:disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* PDF Overlay */
        .pdf-loading-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
        }

        .pdf-loading-overlay.show {
            opacity: 1;
            pointer-events: all;
        }

        .pdf-loading-box {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem 3rem;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
        }

        .pdf-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid #f1f5f9;
            border-top-color: #005fa1;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .pdf-loading-box p {
            font-weight: 700;
            color: #1e293b;
            font-size: 0.95rem;
            margin: 0;
        }
    </style>

    <div class="pdf-loading-overlay" id="pdfLoadingOverlay">
        <div class="pdf-loading-box">
            <div class="pdf-spinner"></div>
            <p>جارٍ تجهيز ملف PDF...</p>
        </div>
    </div>

    <div class="container">

        {{-- Hero --}}
        <div class="profile-hero">
            <div class="hero-dots"></div>
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <div class="avatar-circle position-relative">
                    @if ($user->signature)
                        <img src="{{ asset('upload/' . $user->signature) }}" alt="avatar">
                    @else
                        {{ mb_substr($user->name, 0, 1) }}
                    @endif
                    <div class="avatar-online"></div>
                </div>
                <div>
                    <div class="profile-name">{{ $user->name }}</div>
                    <div class="profile-job">{{ $user->job_title ?? 'موظف' }}</div>
                    <div class="profile-badge">
                        <i class="fas fa-hashtag" style="font-size:0.78rem;"></i>
                        {{ $user->job_number }}
                    </div>
                </div>
                <div class="me-auto"></div>
                <div class="hero-meta text-end">
                    <span><i class="far fa-calendar-alt"></i>
                        {{ now()->locale('ar')->isoFormat('dddd، D MMMM YYYY') }}</span>
                    <span><i class="fas fa-layer-group"></i> {{ $stats['total'] }} فورم مُدخل</span>
                    <span><i class="fas fa-calendar-check"></i> {{ $stats['this_month'] }} هذا الشهر</span>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <div class="row g-3 mb-4">
            @php
                $statsConfig = [
                    [
                        'key' => 'total',
                        'label' => 'إجمالي الفروم',
                        'icon' => 'fas fa-layer-group',
                        'color' => 'sc-blue',
                    ],
                    ['key' => 'daily', 'label' => 'يومية', 'icon' => 'fas fa-sun', 'color' => 'sc-emerald'],
                    ['key' => 'weekly', 'label' => 'أسبوعية', 'icon' => 'fas fa-calendar-week', 'color' => 'sc-amber'],
                    ['key' => 'monthly', 'label' => 'شهرية', 'icon' => 'fas fa-calendar-days', 'color' => 'sc-violet'],
                    ['key' => 'annual', 'label' => 'سنوية', 'icon' => 'fas fa-calendar', 'color' => 'sc-rose'],
                    [
                        'key' => 'this_month',
                        'label' => 'هذا الشهر',
                        'icon' => 'fas fa-hourglass-half',
                        'color' => 'sc-teal',
                    ],
                ];
            @endphp

            @foreach ($statsConfig as $s)
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="stat-card {{ $s['color'] }}">
                        <div class="stat-icon">
                            <i class="{{ $s['icon'] }}"></i>
                        </div>
                        <div class="stat-number">{{ $stats[$s['key']] }}</div>
                        <div class="stat-label">{{ $s['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">

            {{-- Info Column --}}
            <div class="col-md-4">
                <div class="info-card">
                    <div class="section-title">
                        <div class="section-title-icon"><i class="fas fa-user-tie"></i></div>
                        البيانات الشخصية
                    </div>

                    @php
                        $infoRows = [
                            ['icon' => 'fas fa-user', 'key' => 'الاسم', 'value' => $user->name],
                            ['icon' => 'fas fa-id-card', 'key' => 'الرقم الوظيفي', 'value' => $user->job_number ?? '—'],
                            ['icon' => 'fas fa-fingerprint', 'key' => 'رقم الهوية', 'value' => $user->id_number ?? '—'],
                            [
                                'icon' => 'fas fa-briefcase',
                                'key' => 'المسمى الوظيفي',
                                'value' => $user->job_title ?? '—',
                            ],
                        ];
                    @endphp

                    @foreach ($infoRows as $row)
                        <div class="info-row">
                            <div class="info-icon"><i class="{{ $row['icon'] }}"></i></div>
                            <div>
                                <div class="info-key">{{ $row['key'] }}</div>
                                <div class="info-value">{{ $row['value'] }}</div>
                            </div>
                        </div>
                    @endforeach

                    @if ($user->phone)
                        <div class="info-row">
                            <div class="info-icon"><i class="fas fa-mobile-screen-button"></i></div>
                            <div>
                                <div class="info-key">الهاتف</div>
                                <div class="info-value">{{ $user->phone }}</div>
                            </div>
                        </div>
                    @endif

                    @if ($user->email)
                        <div class="info-row">
                            <div class="info-icon"><i class="fas fa-at"></i></div>
                            <div>
                                <div class="info-key">البريد الإلكتروني</div>
                                <div class="info-value" style="font-size:0.82rem;">{{ $user->email }}</div>
                            </div>
                        </div>
                    @endif

                    @if ($user->signature)
                        <div class="info-row">
                            <div class="info-icon"><i class="fas fa-pen-fancy"></i></div>
                            <div>
                                <div class="info-key">التوقيع الحالي</div>
                                <div class="signature-preview mt-1">
                                    <img src="{{ asset('upload/' . $user->signature) }}" alt="توقيع">
                                </div>
                            </div>
                        </div>
                        {{-- دائماً اظهر زر تغيير التوقيع --}}
                        <a href="{{ route('web.signature') }}" class="btn-sig-action btn-sig-change">
                            <i class="fas fa-pen-nib"></i>
                            تغيير التوقيع
                        </a>
                    @else
                        <a href="{{ route('web.signature') }}" class="btn-sig-action btn-sig-add">
                            <i class="fas fa-pen-nib"></i>
                            إضافة توقيع الآن
                        </a>
                    @endif
                </div>

                {{-- Activity --}}
                <div class="info-card">
                    <div class="section-title">
                        <div class="section-title-icon"><i class="fas fa-chart-pie"></i></div>
                        ملخص النشاط
                    </div>
                    @php
                        $total = max($stats['total'], 1);
                        $activityRows = [
                            ['label' => 'يومية', 'val' => $stats['daily'], 'color' => '#047857'],
                            ['label' => 'أسبوعية', 'val' => $stats['weekly'], 'color' => '#b45309'],
                            ['label' => 'شهرية', 'val' => $stats['monthly'], 'color' => '#6d28d9'],
                            ['label' => 'سنوية', 'val' => $stats['annual'], 'color' => '#be123c'],
                        ];
                    @endphp
                    @foreach ($activityRows as $act)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span
                                    style="font-size:0.85rem;font-weight:600;color:#475569;">{{ $act['label'] }}</span>
                                <span
                                    style="font-size:0.85rem;font-weight:700;color:#1e293b;">{{ $act['val'] }}</span>
                            </div>
                            <div style="height:7px;background:#f1f5f9;border-radius:999px;overflow:hidden;">
                                <div
                                    style="height:100%;width:{{ round(($act['val'] / $total) * 100) }}%;background:{{ $act['color'] }};border-radius:999px;">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Table Column --}}
            <div class="col-md-8">
                <div class="table-card">
                    <div class="section-title">
                        <div class="section-title-icon"><i class="fas fa-clipboard-list"></i></div>
                        الفروم المُدخلة
                    </div>

                    <div class="filter-bar" wire:ignore>
                        <label><i class="fas fa-sliders" style="color:rgb(1,161,127);"></i> تصفية:</label>
                        <select wire:model.live="selectedForm" class="select profile-form-select">
                            <option value="">جميع الفروم</option>
                            @foreach ($forms as $form)
                                <option value="{{ $form->id }}">{{ __($form->name) }}</option>
                            @endforeach
                        </select>
                        <div class="ms-auto d-flex align-items-center gap-2">
                            <label style="font-size:0.82rem;color:#94a3b8;">عرض:</label>
                            <select wire:model.live="perPage" style="min-width:80px;" class="select">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover answers-table mb-0">
                            <thead>
                                <tr>
                                    <th style="width:45px;">#</th>
                                    <th>اسم الفورم</th>
                                    <th style="width:100px;">النوع</th>
                                    <th style="width:115px;">التاريخ</th>
                                    <th style="width:100px;">الوقت</th>
                                    <th style="width:90px;">PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($answers as $i => $answer)
                                    <tr>
                                        <td style="color:#94a3b8;font-weight:600;font-size:0.82rem;">
                                            {{ ($answers->currentPage() - 1) * $answers->perPage() + $i + 1 }}
                                        </td>
                                        <td>
                                            <span class="fw-bold" style="color:#1e293b;">
                                                {{ __($answer->form->name ?? '—') }}
                                            </span>
                                        </td>
                                        <td>
                                            @php
                                                $typeMap = [
                                                    'daily' => [
                                                        'label' => 'يومية',
                                                        'class' => 'type-daily',
                                                        'icon' => 'fas fa-sun',
                                                    ],
                                                    'weekly' => [
                                                        'label' => 'أسبوعية',
                                                        'class' => 'type-weekly',
                                                        'icon' => 'fas fa-calendar-week',
                                                    ],
                                                    'monthly' => [
                                                        'label' => 'شهرية',
                                                        'class' => 'type-monthly',
                                                        'icon' => 'fas fa-calendar-days',
                                                    ],
                                                    'annual' => [
                                                        'label' => 'سنوية',
                                                        'class' => 'type-annual',
                                                        'icon' => 'fas fa-calendar',
                                                    ],
                                                ];
                                                $t = $typeMap[$answer->form->type ?? ''] ?? [
                                                    'label' => $answer->form->type ?? '',
                                                    'class' => '',
                                                    'icon' => 'fas fa-file',
                                                ];
                                            @endphp
                                            <span class="form-type-badge {{ $t['class'] }}">
                                                <i class="{{ $t['icon'] }}" style="font-size:0.7rem;"></i>
                                                {{ $t['label'] }}
                                            </span>
                                        </td>
                                        <td style="font-size:0.88rem;">
                                            <i class="far fa-calendar-days me-1"
                                                style="color:#94a3b8;font-size:0.75rem;"></i>
                                            {{ $answer->created_at->format('Y/m/d') }}
                                        </td>
                                        <td style="font-size:0.88rem;">
                                            <i class="far fa-clock me-1" style="color:#94a3b8;font-size:0.75rem;"></i>
                                            {{ $answer->created_at->format('h:i A') }}
                                        </td>
                                        <td>
                                            <button class="btn-pdf" wire:click="downloadPdf({{ $answer->id }})"
                                                wire:loading.attr="disabled" wire:loading.class="loading"
                                                wire:target="downloadPdf({{ $answer->id }})" title="تحميل PDF">
                                                <i class="fas fa-file-pdf"></i>
                                                <span wire:loading.remove
                                                    wire:target="downloadPdf({{ $answer->id }})">PDF</span>
                                                <span wire:loading
                                                    wire:target="downloadPdf({{ $answer->id }})">...</span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="empty-state">
                                                <div class="empty-icon"><i class="fas fa-folder-open"></i></div>
                                                <p>لا توجد فروم مُدخلة بعد</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($answers->total() > 0)
                        <div class="pagination-wrapper">
                            <div class="pagination-info">
                                عرض <strong>{{ $answers->firstItem() }}</strong> –
                                <strong>{{ $answers->lastItem() }}</strong>
                                من <strong>{{ $answers->total() }}</strong> نتيجة
                            </div>
                            <div class="pagination-controls">
                                <button class="page-btn" {{ $answers->onFirstPage() ? 'disabled' : '' }}
                                    @if (!$answers->onFirstPage()) wire:click="previousPage" @endif>
                                    <i class="fas fa-chevron-right" style="font-size:0.75rem;"></i>
                                </button>

                                @foreach ($answers->getUrlRange(1, $answers->lastPage()) as $page => $url)
                                    @if ($page == $answers->currentPage())
                                        <button class="page-btn active">{{ $page }}</button>
                                    @elseif ($page == 1 || $page == $answers->lastPage() || abs($page - $answers->currentPage()) <= 1)
                                        <button class="page-btn"
                                            wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                                    @elseif ($page == $answers->currentPage() - 2 || $page == $answers->currentPage() + 2)
                                        <span style="padding:0 4px;color:#94a3b8;font-size:0.85rem;">…</span>
                                    @endif
                                @endforeach

                                <button class="page-btn" {{ !$answers->hasMorePages() ? 'disabled' : '' }}
                                    @if ($answers->hasMorePages()) wire:click="nextPage" @endif>
                                    <i class="fas fa-chevron-left" style="font-size:0.75rem;"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('select.profile-form-select').on('change', function() {
                @this.set('selectedForm', $(this).val());
            });
        });

        document.addEventListener('livewire:loading-start', function() {
            document.getElementById('pdfLoadingOverlay').classList.add('show');
        });
        document.addEventListener('livewire:loading-stop', function() {
            document.getElementById('pdfLoadingOverlay').classList.remove('show');
        });
    </script>
@endpush
