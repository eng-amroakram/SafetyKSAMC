<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

    .landing-page {
        font-family: 'Tajawal', sans-serif;
    }

    /* ===== HERO ===== */
    .hero-section {
        background: linear-gradient(135deg, #003d6b 0%, #004e8a 30%, #005fa1 55%, rgb(0, 115, 92) 80%, rgb(1, 145, 115) 100%);
        border-radius: 1.5rem;
        overflow: hidden;
        position: relative;
        padding: 0;
        margin-bottom: 2.5rem;
        box-shadow: 0 24px 64px rgba(0, 78, 138, 0.28);
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -120px;
        right: -100px;
        width: 400px;
        height: 400px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        pointer-events: none;
    }

    .hero-dots-bg {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
    }

    .hero-inner {
        position: relative;
        z-index: 1;
        padding: 3.5rem 2.5rem;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.28);
        border-radius: 2rem;
        padding: 0.38rem 1.1rem;
        font-size: 0.83rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 1.25rem;
        backdrop-filter: blur(4px);
    }

    .hero-title {
        font-size: 2.6rem;
        font-weight: 900;
        color: #fff;
        line-height: 1.2;
        margin-bottom: 0.75rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.82);
        font-weight: 500;
        margin-bottom: 2rem;
        max-width: 420px;
        line-height: 1.7;
    }

    .hero-cta-group {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #fff;
        color: #005fa1;
        font-size: 0.95rem;
        font-weight: 800;
        padding: 0.75rem 1.75rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: all 0.22s;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.18);
        font-family: 'Tajawal', sans-serif;
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.22);
        color: #004e8a;
    }

    .btn-hero-ghost {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.12);
        border: 1.5px solid rgba(255, 255, 255, 0.35);
        color: #fff;
        font-size: 0.92rem;
        font-weight: 700;
        padding: 0.73rem 1.5rem;
        border-radius: 0.75rem;
        text-decoration: none;
        transition: all 0.2s;
        backdrop-filter: blur(4px);
        font-family: 'Tajawal', sans-serif;
    }

    .btn-hero-ghost:hover {
        background: rgba(255, 255, 255, 0.22);
        color: #fff;
    }

    .hero-image-col {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .hero-image-wrap {
        position: relative;
        display: inline-block;
    }

    .hero-image-wrap img {
        max-width: 280px;
        width: 100%;
        border-radius: 1.5rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 3px solid rgba(255, 255, 255, 0.2);
        filter: brightness(1.05);
    }

    .hero-stat-chip {
        position: absolute;
        background: #fff;
        border-radius: 0.75rem;
        padding: 0.55rem 1rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-family: 'Tajawal', sans-serif;
    }

    .hero-stat-chip.chip-1 {
        top: -10px;
        right: -20px;
    }

    .hero-stat-chip.chip-2 {
        bottom: 20px;
        left: -30px;
    }

    .hero-stat-chip .chip-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    .hero-stat-chip.chip-1 .chip-icon {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .hero-stat-chip.chip-2 .chip-icon {
        background: #ecfdf5;
        color: #047857;
    }

    .chip-label {
        font-size: 0.72rem;
        color: #64748b;
        font-weight: 500;
    }

    .chip-value {
        font-size: 1rem;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }

    /* ===== SECTION TITLES ===== */
    .section-heading {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .section-heading .sh-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(0, 95, 161, 0.07);
        border: 1px solid rgba(0, 95, 161, 0.15);
        border-radius: 2rem;
        padding: 0.3rem 1rem;
        font-size: 0.8rem;
        font-weight: 700;
        color: #005fa1;
        margin-bottom: 0.85rem;
    }

    .section-heading h2 {
        font-size: 1.85rem;
        font-weight: 900;
        color: #1e293b;
        margin-bottom: 0.6rem;
    }

    .section-heading p {
        font-size: 1rem;
        color: #64748b;
        font-weight: 500;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* ===== ABOUT SECTION ===== */
    .about-section {
        background: #fff;
        border-radius: 1.5rem;
        padding: 3.5rem 2.5rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .about-feature-card {
        text-align: center;
        padding: 2rem 1.5rem;
        border-radius: 1rem;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        transition: all 0.25s;
        height: 100%;
    }

    .about-feature-card:hover {
        background: #fff;
        border-color: rgba(0, 95, 161, 0.2);
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0, 95, 161, 0.1);
    }

    .about-feature-icon {
        width: 68px;
        height: 68px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1.25rem;
    }

    .afi-blue {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .afi-green {
        background: #ecfdf5;
        color: #047857;
    }

    .afi-amber {
        background: #fffbeb;
        color: #b45309;
    }

    .about-feature-card h5 {
        font-size: 1.05rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.6rem;
    }

    .about-feature-card p {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.7;
        margin: 0;
    }

    .about-bottom-note {
        text-align: center;
        margin-top: 2.5rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, rgba(0, 95, 161, 0.05), rgba(1, 161, 127, 0.05));
        border-radius: 1rem;
        border: 1px solid rgba(0, 95, 161, 0.1);
    }

    .about-bottom-note p {
        font-size: 1.05rem;
        font-weight: 600;
        color: #334155;
        margin: 0;
    }

    /* ===== SERVICES SECTION ===== */
    .services-section {
        background: linear-gradient(135deg, #003d6b 0%, #005fa1 50%, rgb(1, 145, 115) 100%);
        border-radius: 1.5rem;
        padding: 3.5rem 2.5rem;
        margin-bottom: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .services-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.04) 1px, transparent 1px);
        background-size: 20px 20px;
        pointer-events: none;
    }

    .services-section .section-heading h2 {
        color: #fff;
    }

    .services-section .section-heading p {
        color: rgba(255, 255, 255, 0.75);
    }

    .services-section .section-heading .sh-eyebrow {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.28);
        color: #fff;
    }

    .service-card {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 1.1rem;
        padding: 1.75rem 1.5rem;
        text-align: center;
        backdrop-filter: blur(6px);
        transition: all 0.25s;
        height: 100%;
    }

    .service-card:hover {
        background: rgba(255, 255, 255, 0.18);
        border-color: rgba(255, 255, 255, 0.36);
        transform: translateY(-4px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.2);
    }

    .service-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.18);
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        color: #fff;
        margin: 0 auto 1rem;
    }

    .service-card h5 {
        font-size: 1rem;
        font-weight: 800;
        color: #fff;
        margin-bottom: 0.5rem;
    }

    .service-card p {
        font-size: 0.87rem;
        color: rgba(255, 255, 255, 0.75);
        line-height: 1.65;
        margin: 0;
    }

    /* ===== CONTACT SECTION ===== */
    .contact-section {
        background: #fff;
        border-radius: 1.5rem;
        padding: 3.5rem 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .contact-form-field {
        margin-bottom: 1.25rem;
    }

    .contact-form-field label {
        font-size: 0.88rem;
        font-weight: 700;
        color: #475569;
        margin-bottom: 0.4rem;
        display: block;
    }

    .contact-form-field input,
    .contact-form-field textarea {
        width: 100%;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.7rem;
        padding: 0.7rem 1rem;
        font-size: 0.95rem;
        color: #1e293b;
        background: #f8fafc;
        font-family: 'Tajawal', sans-serif;
        transition: all 0.2s;
        outline: none;
    }

    .contact-form-field input:focus,
    .contact-form-field textarea:focus {
        border-color: rgb(1, 161, 127);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(1, 161, 127, 0.1);
    }

    .contact-form-field textarea {
        resize: vertical;
        min-height: 120px;
    }

    .btn-contact-submit {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
        color: #fff;
        font-size: 0.95rem;
        font-weight: 800;
        padding: 0.78rem 2rem;
        border-radius: 0.75rem;
        border: none;
        cursor: pointer;
        transition: all 0.22s;
        box-shadow: 0 4px 16px rgba(0, 95, 161, 0.3);
        font-family: 'Tajawal', sans-serif;
    }

    .btn-contact-submit:hover {
        opacity: 0.88;
        transform: translateY(-1px);
        box-shadow: 0 8px 24px rgba(0, 95, 161, 0.35);
    }

    .contact-image-wrap {
        border-radius: 1.25rem;
        overflow: hidden;
        height: 100%;
        min-height: 300px;
        position: relative;
    }

    .contact-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .contact-info-overlay {
        position: absolute;
        bottom: 1.25rem;
        right: 1.25rem;
        left: 1.25rem;
        background: rgba(0, 78, 138, 0.88);
        backdrop-filter: blur(8px);
        border-radius: 0.9rem;
        padding: 1rem 1.25rem;
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .contact-info-overlay .cio-title {
        font-size: 0.85rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        opacity: 0.9;
    }

    .contact-info-row {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.83rem;
        opacity: 0.82;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 1.9rem;
        }

        .hero-inner {
            padding: 2.5rem 1.5rem;
        }

        .about-section,
        .services-section,
        .contact-section {
            padding: 2.5rem 1.5rem;
        }

        .hero-stat-chip {
            display: none;
        }
    }
</style>

<div class="landing-page py-4">

    {{-- ===== HERO ===== --}}
    <div class="hero-section">
        <div class="hero-dots-bg"></div>
        <div class="row g-0 align-items-center">
            <div class="col-md-6">
                <div class="hero-inner">
                    <div class="hero-badge">
                        <i class="fas fa-shield-halved" style="font-size:0.75rem;"></i>
                        مدينة الملك سلمان الطبية
                    </div>
                    <h1 class="hero-title">قسم السلامة<br>والصحة المهنية</h1>
                    <p class="hero-subtitle">
                        نضمن بيئة عمل آمنة وصحية لجميع الموظفين والمرضى من خلال برامج رقابة وتدريب متواصلة.
                    </p>
                    <div class="hero-cta-group">
                        @guest
                            <a href="{{ route('web.login') }}" class="btn-hero-primary">
                                <i class="fas fa-right-to-bracket"></i>
                                تسجيل الدخول
                            </a>
                        @endguest
                        @auth
                            <a href="{{ route('web.home') }}" class="btn-hero-primary">
                                <i class="fas fa-clipboard-list"></i>
                                إدخال الفروم
                            </a>
                        @endauth
                        <a href="#our-services" class="btn-hero-ghost">
                            خدماتنا
                            <i class="fas fa-arrow-left" style="font-size:0.8rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hero-image-col d-none d-md-flex">
                <div class="hero-image-wrap">
                    <img src="{{ asset('assets/admin/images/login.webp') }}" alt="قسم السلامة">
                    <div class="hero-stat-chip chip-1">
                        <div class="chip-icon"><i class="fas fa-calendar-check"></i></div>
                        <div>
                            <div class="chip-label">جولات يومية</div>
                            <div class="chip-value">متواصلة</div>
                        </div>
                    </div>
                    <div class="hero-stat-chip chip-2">
                        <div class="chip-icon"><i class="fas fa-shield-halved"></i></div>
                        <div>
                            <div class="chip-label">معايير السلامة</div>
                            <div class="chip-value">مُطبَّقة</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== ABOUT ===== --}}
    <div id="about-us" class="about-section">
        <div class="section-heading">
            <div class="sh-eyebrow"><i class="fas fa-users"></i> الفريق</div>
            <h2>من نحن؟</h2>
            <p>
                نحن فريق قسم السلامة في مدينة الملك سلمان الطبية، نكرّس جهودنا لضمان بيئة عمل آمنة وصحية لجميع الموظفين
                والمرضى.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="about-feature-card">
                    <div class="about-feature-icon afi-blue">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h5>تعزيز السلامة</h5>
                    <p>نعزز ثقافة السلامة من خلال التدريب المستمر وتطبيق أفضل الممارسات الدولية.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-feature-card">
                    <div class="about-feature-icon afi-green">
                        <i class="fas fa-users"></i>
                    </div>
                    <h5>التعاون الجماعي</h5>
                    <p>نؤمن بأن كل فرد له دور محوري في تعزيز السلامة ونسعى لبناء وعي شامل بين جميع أفراد المؤسسة.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-feature-card">
                    <div class="about-feature-icon afi-amber">
                        <i class="fas fa-screwdriver-wrench"></i>
                    </div>
                    <h5>الدعم والإرشاد</h5>
                    <p>نقدم الدعم الفني والإرشاد المتخصص لضمان التزام الجميع بمعايير السلامة المعتمدة.</p>
                </div>
            </div>
        </div>

        <div class="about-bottom-note">
            <p>
                <i class="fas fa-circle-check" style="color:rgb(1,161,127);margin-left:0.5rem;"></i>
                نحن هنا لدعم الجميع في رحلتهم نحو بيئة عمل أكثر أماناً وصحةً.
            </p>
        </div>
    </div>

    {{-- ===== SERVICES ===== --}}
    <div id="our-services" class="services-section">
        <div class="section-heading" style="position:relative;z-index:1;">
            <div class="sh-eyebrow"><i class="fas fa-layer-group"></i> ما نقدمه</div>
            <h2>خدماتنا</h2>
            <p>مجموعة شاملة من برامج الرقابة والتدريب لضمان بيئة عمل آمنة ومستدامة.</p>
        </div>

        <div class="row g-3" style="position:relative;z-index:1;">
            @php
                $services = [
                    [
                        'icon' => 'fas fa-camera-retro',
                        'title' => 'جولات سنوية',
                        'desc' => 'مراجعة وتقييم شامل لإجراءات السلامة على مدار العام.',
                    ],
                    [
                        'icon' => 'fas fa-sun',
                        'title' => 'جولات يومية',
                        'desc' => 'مراقبة يومية للتأكد من الامتثال المستمر لمعايير السلامة.',
                    ],
                    [
                        'icon' => 'fas fa-calendar-check',
                        'title' => 'تشيكات شهرية',
                        'desc' => 'تدقيق دوري لتعزيز بيئة عمل آمنة ومستدامة.',
                    ],
                    [
                        'icon' => 'fas fa-fire-extinguisher',
                        'title' => 'الفرضيات',
                        'desc' => 'تطبيق سيناريوهات الطوارئ لتحسين الاستعداد للتصدي للحوادث.',
                    ],
                    [
                        'icon' => 'fas fa-chalkboard-user',
                        'title' => 'التدريب',
                        'desc' => 'برامج تدريبية متخصصة لتعزيز الوعي بالسلامة بين الموظفين.',
                    ],
                    [
                        'icon' => 'fas fa-leaf',
                        'title' => 'جولات بيئية',
                        'desc' => 'تقييم التأثير البيئي للنشاطات الطبية وضمان الامتثال.',
                    ],
                ];
            @endphp

            @foreach ($services as $s)
                <div class="col-6 col-md-4">
                    <div class="service-card">
                        <div class="service-icon"><i class="{{ $s['icon'] }}"></i></div>
                        <h5>{{ $s['title'] }}</h5>
                        <p>{{ $s['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== CONTACT ===== --}}
    <div id="contact-us" class="contact-section">
        <div class="section-heading">
            <div class="sh-eyebrow"><i class="fas fa-envelope"></i> تواصل</div>
            <h2>تواصل معنا</h2>
            <p>نحن هنا للمساعدة. أرسل لنا رسالتك وسنردّ عليك في أقرب وقت.</p>
        </div>

        <div class="row g-4 align-items-stretch">
            <div class="col-md-6">
                <form>
                    <div class="contact-form-field">
                        <label for="cName">الاسم الكامل</label>
                        <input type="text" id="cName" placeholder="أدخل اسمك هنا">
                    </div>
                    <div class="contact-form-field">
                        <label for="cEmail">البريد الإلكتروني</label>
                        <input type="email" id="cEmail" placeholder="example@domain.com">
                    </div>
                    <div class="contact-form-field">
                        <label for="cMsg">الرسالة</label>
                        <textarea id="cMsg" placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>
                    <button type="submit" class="btn-contact-submit">
                        <i class="fas fa-paper-plane"></i>
                        إرسال الرسالة
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="contact-image-wrap">
                    <img src="{{ asset('assets/web/images/contactus.jpg') }}" alt="تواصل معنا">
                    <div class="contact-info-overlay">
                        <div class="cio-title"><i class="fas fa-location-dot me-1"></i> موقعنا</div>
                        <div class="contact-info-row">
                            <i class="fas fa-hospital"></i>
                            مدينة الملك سلمان الطبية — المدينة المنورة
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
