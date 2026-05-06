<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

    /* ===== SITE FOOTER ===== */
    .site-footer {
        margin-top: 4rem;
        font-family: 'Tajawal', sans-serif;
        background: linear-gradient(160deg, #003d6b 0%, #004e8a 35%, #005fa1 60%, rgb(0, 115, 92) 85%, rgb(1, 145, 115) 100%);
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    /* Decorative circles */
    .site-footer::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -80px;
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        pointer-events: none;
    }

    .site-footer::after {
        content: '';
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.03);
        pointer-events: none;
    }

    .footer-dots {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: radial-gradient(circle, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 22px 22px;
        pointer-events: none;
        z-index: 0;
    }

    .footer-inner {
        position: relative;
        z-index: 1;
    }

    /* ===== TOP STRIP — social + tagline ===== */
    .footer-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1.6rem 0 1.4rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }

    .footer-social-label {
        font-size: 0.87rem;
        opacity: 0.75;
        font-weight: 500;
    }

    .footer-social-links {
        display: flex;
        align-items: center;
        gap: 0.55rem;
    }

    .footer-social-btn {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 0.9rem;
        text-decoration: none;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .footer-social-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(255, 255, 255, 0.45);
        color: #fff;
        transform: translateY(-2px);
    }

    .footer-tagline-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 2rem;
        padding: 0.35rem 1rem;
        font-size: 0.82rem;
        font-weight: 600;
        backdrop-filter: blur(4px);
    }

    /* ===== MAIN GRID ===== */
    .footer-main {
        padding: 2.5rem 0 2rem;
        display: grid;
        grid-template-columns: 1.6fr 1fr 1fr 1.2fr;
        gap: 2.5rem;
    }

    @media (max-width: 960px) {
        .footer-main {
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
    }

    @media (max-width: 560px) {
        .footer-main {
            grid-template-columns: 1fr;
            gap: 1.75rem;
        }
    }

    /* Brand column */
    .footer-brand-logo {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        margin-bottom: 1rem;
    }

    .footer-brand-name {
        font-size: 1.05rem;
        font-weight: 800;
        margin-bottom: 0.2rem;
    }

    .footer-brand-hospital {
        font-size: 0.82rem;
        opacity: 0.7;
        margin-bottom: 0.9rem;
    }

    .footer-brand-desc {
        font-size: 0.88rem;
        line-height: 1.75;
        opacity: 0.78;
        margin: 0;
    }

    /* Column headings */
    .footer-col-title {
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        opacity: 0.55;
        margin-bottom: 1.1rem;
        padding-bottom: 0.6rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.55rem;
    }

    .footer-links a {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.78);
        text-decoration: none;
        transition: all 0.18s;
        font-weight: 500;
    }

    .footer-links a i {
        font-size: 0.7rem;
        opacity: 0.6;
    }

    .footer-links a:hover {
        color: #fff;
        gap: 0.65rem;
        opacity: 1;
    }

    /* Contact items */
    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 0.7rem;
        font-size: 0.88rem;
        color: rgba(255, 255, 255, 0.78);
        margin-bottom: 0.75rem;
    }

    .footer-contact-icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .footer-contact-text {
        line-height: 1.5;
    }

    /* ===== BOTTOM BAR ===== */
    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.12);
        padding: 1.1rem 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.75rem;
        font-size: 0.84rem;
    }

    .footer-bottom-copy {
        opacity: 0.65;
        font-weight: 500;
    }

    .footer-bottom-copy a {
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        opacity: 1;
    }

    .footer-bottom-copy a:hover {
        text-decoration: underline;
    }

    .footer-bottom-links {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-bottom-links a {
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        font-size: 0.82rem;
        font-weight: 500;
        transition: color 0.18s;
    }

    .footer-bottom-links a:hover {
        color: #fff;
    }
</style>

<footer class="site-footer">
    <div class="footer-dots"></div>

    <div class="container footer-inner">

        {{-- Top Strip --}}
        <div class="footer-top">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <span class="footer-social-label">تابعنا على:</span>
                <div class="footer-social-links">
                    <a href="#" class="footer-social-btn" aria-label="فيسبوك">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-social-btn" aria-label="تويتر">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                    <a href="#" class="footer-social-btn" aria-label="إنستغرام">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social-btn" aria-label="لينكد إن">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <div class="footer-tagline-badge">
                <i class="fas fa-shield-halved" style="font-size:0.78rem;"></i>
                بيئة آمنة لكل موظف ومريض
            </div>
        </div>

        {{-- Main Grid --}}
        <div class="footer-main">

            {{-- Brand Column --}}
            <div>
                <img src="{{ asset('assets/web/images/logo.jpeg') }}" alt="شعار القسم" class="footer-brand-logo">
                <div class="footer-brand-name">قسم السلامة</div>
                <div class="footer-brand-hospital">مدينة الملك سلمان الطبية</div>
                <p class="footer-brand-desc">
                    نكرّس جهودنا لضمان بيئة عمل آمنة وصحية لجميع الموظفين والمرضى، من خلال برامج وقائية شاملة وتدريب
                    مستمر.
                </p>
            </div>

            {{-- Services --}}
            <div>
                <div class="footer-col-title">خدماتنا</div>
                <ul class="footer-links">
                    <li><a href="#our-services"><i class="fas fa-chevron-left"></i> الجولات السنوية والشهرية</a></li>
                    <li><a href="#our-services"><i class="fas fa-chevron-left"></i> الجولات البيئية</a></li>
                    <li><a href="#our-services"><i class="fas fa-chevron-left"></i> التشيكات الشهرية</a></li>
                    <li><a href="#our-services"><i class="fas fa-chevron-left"></i> التدريب والفرضيات</a></li>
                    <li><a href="#our-services"><i class="fas fa-chevron-left"></i> تقارير السلامة</a></li>
                </ul>
            </div>

            {{-- Quick Links --}}
            <div>
                <div class="footer-col-title">روابط سريعة</div>
                <ul class="footer-links">
                    <li><a href="{{ route('web.home') }}"><i class="fas fa-chevron-left"></i> الرئيسية</a></li>
                    <li><a href="#about-us"><i class="fas fa-chevron-left"></i> من نحن</a></li>
                    @auth
                        <li><a href="{{ route('web.profile') }}"><i class="fas fa-chevron-left"></i> ملفي الشخصي</a></li>
                        <li><a href="{{ route('web.signature') }}"><i class="fas fa-chevron-left"></i> إدارة التوقيع</a>
                        </li>
                        <li><a href="{{ route('web.logout') }}"><i class="fas fa-chevron-left"></i> تسجيل الخروج</a></li>
                    @endauth
                    @guest
                        <li><a href="{{ route('web.login') }}"><i class="fas fa-chevron-left"></i> تسجيل الدخول</a></li>
                    @endguest
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <div class="footer-col-title">تواصل معنا</div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <div class="footer-contact-text">
                        المدينة المنورة،<br>المملكة العربية السعودية
                    </div>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="footer-contact-text">
                        مدينة الملك سلمان الطبية<br>
                        <span style="opacity:0.65;font-size:0.82rem;">قسم السلامة والصحة المهنية</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Bottom Bar --}}
        <div class="footer-bottom">
            <span class="footer-bottom-copy">
                &copy; {{ date('Y') }} حقوق النشر محفوظة —
                <a href="#">شروق السحيمي</a>
            </span>
            <ul class="footer-bottom-links">
                <li><a href="#">سياسة الخصوصية</a></li>
                <li><a href="#">شروط الاستخدام</a></li>
                <li><a href="#contact-us">الدعم الفني</a></li>
            </ul>
        </div>

    </div>
</footer>
