{{-- main taps - redesigned --}}

<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

    /* ===== HOME PAGE WRAPPER ===== */
    .home-page-wrap {
        font-family: 'Tajawal', sans-serif;
    }

    /* ===== MAIN PILLS NAV ===== */
    .main-nav-wrapper {
        background: linear-gradient(135deg, #003d6b 0%, #004e8a 35%, #005fa1 60%, rgb(0, 115, 92) 85%, rgb(1, 145, 115) 100%);
        border-radius: 1.25rem;
        padding: 1.5rem 1.75rem;
        margin-bottom: 1.75rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(0, 78, 138, 0.3);
    }

    .main-nav-wrapper::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 20px 20px;
        pointer-events: none;
    }

    .main-nav-wrapper::after {
        content: '';
        position: absolute;
        top: -60px;
        left: -60px;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .main-nav-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .main-nav-title {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        color: #fff;
    }

    .main-nav-title-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.15);
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        backdrop-filter: blur(4px);
    }

    .main-nav-title span {
        font-size: 1.1rem;
        font-weight: 800;
        letter-spacing: -0.01em;
    }

    /* Pills */
    .main-pills-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        list-style: none;
        margin: 1rem 0 0;
        padding: 0;
        position: relative;
        z-index: 1;
    }

    .main-pills-list .nav-item {
        margin: 0;
    }

    .main-pills-list .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1.5px solid rgba(255, 255, 255, 0.22);
        border-radius: 0.75rem;
        padding: 0.6rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.85);
        font-family: 'Tajawal', sans-serif;
        transition: all 0.22s;
        backdrop-filter: blur(4px);
        text-transform: none;
        line-height: 1.3;
        text-decoration: none;
    }

    .main-pills-list .nav-link i {
        font-size: 0.85rem;
        opacity: 0.85;
    }

    .main-pills-list .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .main-pills-list .nav-link.active {
        background: #fff !important;
        border-color: transparent !important;
        color: #005fa1 !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.18);
        transform: translateY(-2px);
    }

    .main-pills-list .nav-link.active i {
        opacity: 1;
        color: #005fa1;
    }

    /* Signature warning pill */
    .nav-link-signature {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #f59e0b, #ef4444) !important;
        border: none !important;
        border-radius: 0.75rem;
        padding: 0.6rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 800;
        color: #fff !important;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.22s;
        text-decoration: none;
        animation: pulse-sig 2s infinite;
    }

    .nav-link-signature:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(239, 68, 68, 0.4);
        color: #fff !important;
    }

    @keyframes pulse-sig {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
        }

        50% {
            box-shadow: 0 0 0 6px rgba(239, 68, 68, 0);
        }
    }

    /* ===== TABS NAV (daily/weekly/annual) ===== */
    .inner-tabs-wrap {
        background: #fff;
        border-radius: 1rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    }

    .inner-tabs-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .inner-tabs-list .nav-item {
        margin: 0;
    }

    .inner-tabs-list .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-bottom: none;
        border-radius: 0.65rem 0.65rem 0 0;
        padding: 0.55rem 1.1rem;
        font-size: 0.88rem;
        font-weight: 700;
        color: #64748b;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.18s;
        text-transform: none;
        line-height: 1.3;
        cursor: pointer;
        text-decoration: none;
    }

    .inner-tabs-list .nav-link:hover {
        background: rgba(0, 95, 161, 0.06);
        border-color: rgba(0, 95, 161, 0.2);
        color: #005fa1;
    }

    .inner-tabs-list .nav-link.active {
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127)) !important;
        border-color: transparent !important;
        color: #fff !important;
        box-shadow: 0 4px 14px rgba(0, 95, 161, 0.25);
    }

    /* ===== MONTHLY SELECT ===== */
    .monthly-select-wrap {
        background: #fff;
        border-radius: 1rem;
        padding: 1.25rem 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .monthly-select-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        font-weight: 800;
        color: #005fa1;
        white-space: nowrap;
    }

    .monthly-select-label-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: rgba(0, 95, 161, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #005fa1;
        font-size: 0.85rem;
    }

    .monthly-select-wrap .select,
    .monthly-select-wrap select {
        font-family: 'Tajawal', sans-serif;
        font-size: 0.92rem;
        font-weight: 600;
        color: #1e293b;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.65rem;
        padding: 0.55rem 1rem;
        background: #f8fafc;
        min-width: 240px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .monthly-select-wrap .select:focus,
    .monthly-select-wrap select:focus {
        border-color: rgb(1, 161, 127);
        box-shadow: 0 0 0 3px rgba(1, 161, 127, 0.12);
        outline: none;
        background: #fff;
    }

    /* ===== CONTENT CARD ===== */
    .home-content-card {
        background: #fff;
        border-radius: 1.25rem;
        padding: 2rem;
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
    }

    .home-form-title {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 1.05rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 1.5rem;
        padding-bottom: 0.9rem;
        border-bottom: 2px solid rgba(0, 95, 161, 0.08);
    }

    .home-form-title-bar {
        width: 4px;
        height: 22px;
        background: linear-gradient(180deg, #005fa1, rgb(1, 161, 127));
        border-radius: 2px;
        flex-shrink: 0;
    }

    /* Save button */
    .btn-save-form {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
        color: #fff !important;
        font-size: 0.95rem;
        font-weight: 800;
        padding: 0.75rem 2rem;
        border-radius: 0.75rem;
        border: none;
        cursor: pointer;
        transition: all 0.22s;
        box-shadow: 0 4px 16px rgba(0, 95, 161, 0.28);
        font-family: 'Tajawal', sans-serif;
    }

    .btn-save-form:hover {
        opacity: 0.88;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 95, 161, 0.35);
    }

    /* Table */
    .home-table thead th {
        background: linear-gradient(135deg, #005fa1, rgb(1, 145, 115));
        color: #fff;
        font-weight: 700;
        font-size: 0.88rem;
        text-align: center;
        vertical-align: middle;
        padding: 0.85rem 0.75rem;
        border: none;
    }

    .home-table tbody td {
        text-align: center;
        vertical-align: middle;
        font-size: 0.9rem;
        padding: 0.75rem;
        color: #334155;
        border-color: #f1f5f9;
    }

    .home-table tbody tr:hover {
        background: rgba(0, 95, 161, 0.03);
    }

    .home-table {
        border-radius: 0.75rem;
        overflow: hidden;
        border: 1px solid #e2e8f0;
    }

    /* Notes section label */
    .notes-section-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
        font-weight: 800;
        color: #005fa1;
        margin-bottom: 0.75rem;
        margin-top: 1.5rem;
    }

    .notes-section-label::before {
        content: '';
        display: inline-block;
        width: 3px;
        height: 18px;
        background: linear-gradient(180deg, #005fa1, rgb(1, 161, 127));
        border-radius: 2px;
    }

    @media (max-width: 768px) {
        .main-nav-wrapper {
            padding: 1.25rem 1rem;
        }

        .main-pills-list .nav-link {
            font-size: 0.82rem;
            padding: 0.5rem 0.9rem;
        }

        .home-content-card {
            padding: 1.25rem;
        }
    }
</style>

<div class="home-page-wrap">

    {{-- ===== MAIN PILLS NAV ===== --}}
    <div class="main-nav-wrapper">
        <div class="main-nav-header">
            <div class="main-nav-title">
                <div class="main-nav-title-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <span>إدخال الفروم</span>
            </div>
        </div>

        <ul class="main-pills-list nav nav-pills" id="ex-with-icons" role="tablist" wire:ignore>

            <li class="nav-item" role="presentation">
                <a data-mdb-toggle="pill" class="nav-link active" id="daily_tours_pill" href="#daily_tours_pill_id"
                    role="tab" aria-controls="daily_tours_pill_id" aria-selected="true">
                    <i class="fas fa-sun fa-fw"></i>الجولات اليومية
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a data-mdb-toggle="pill" class="nav-link" id="weekly_tours_pill" href="#weekly_tours_pill_id"
                    role="tab" aria-controls="weekly_tours_pill_id" aria-selected="false">
                    <i class="fas fa-calendar-week fa-fw"></i>الجولات الأسبوعية
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a data-mdb-toggle="pill" class="nav-link" id="monthly_tours_pill" href="#monthly_tours_pill_id"
                    role="tab" aria-controls="monthly_tours_pill_id" aria-selected="false">
                    <i class="fas fa-calendar-days fa-fw"></i>الجولات الشهرية
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a data-mdb-toggle="pill" class="nav-link" id="annual_tours_pill" href="#annual_tours_pill_id"
                    role="tab" aria-controls="annual_tours_pill_id" aria-selected="false">
                    <i class="far fa-calendar fa-fw"></i>الجولات السنوية
                </a>
            </li>

            @if (!$user->signature && !in_array($user->type, ['superadmin', 'admin']))
                <li class="nav-item" role="presentation">
                    <a class="nav-link-signature" href="{{ route('web.signature') }}" role="tab"
                        aria-selected="false">
                        <i class="fas fa-signature fa-fw"></i>قم بالتوقيع هنا
                    </a>
                </li>
            @endif

        </ul>
    </div>

</div>
