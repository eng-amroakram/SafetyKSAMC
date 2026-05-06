<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap');

    /* ===== NAV HEADER ===== */
    .site-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 0.6rem 0;
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border-bottom: 1px solid rgba(0, 95, 161, 0.12);
        box-shadow: 0 2px 20px rgba(0, 78, 138, 0.08);
        transition: background 0.3s, box-shadow 0.3s;
        font-family: 'Tajawal', sans-serif;
    }

    .site-header.scrolled {
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 4px 28px rgba(0, 78, 138, 0.14);
    }

    /* Inner bar */
    .nav-inner {
        display: flex;
        align-items: center;
        gap: 0;
    }

    /* Brand */
    .nav-brand {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        text-decoration: none;
        flex-shrink: 0;
    }

    .nav-brand-logo {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        object-fit: cover;
        box-shadow: 0 2px 10px rgba(0, 95, 161, 0.2);
    }

    .nav-brand-text {
        display: flex;
        flex-direction: column;
        line-height: 1.15;
    }

    .nav-brand-title {
        font-size: 0.95rem;
        font-weight: 800;
        color: #005fa1;
        white-space: nowrap;
    }

    .nav-brand-sub {
        font-size: 0.72rem;
        color: #64748b;
        font-weight: 500;
        white-space: nowrap;
    }

    /* Divider */
    .nav-divider {
        width: 1px;
        height: 28px;
        background: rgba(0, 95, 161, 0.15);
        margin: 0 1.25rem;
        flex-shrink: 0;
    }

    /* Nav Links */
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.15rem;
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 1;
    }

    .nav-links .nav-item {
        position: relative;
    }

    .nav-links .nav-link {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.5rem 0.85rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #475569;
        text-decoration: none;
        border-radius: 0.6rem;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .nav-links .nav-link i {
        font-size: 0.85rem;
        opacity: 0.7;
    }

    .nav-links .nav-link:hover {
        color: #005fa1;
        background: rgba(0, 95, 161, 0.07);
    }

    .nav-links .nav-link.active {
        color: #005fa1;
        background: rgba(0, 95, 161, 0.1);
        font-weight: 700;
    }

    .nav-links .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
    }

    /* Profile nav link — special pill */
    .nav-link-profile {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.42rem 0.85rem 0.42rem 0.55rem;
        font-size: 0.88rem;
        font-weight: 700;
        color: #005fa1;
        text-decoration: none;
        border-radius: 2rem;
        background: rgba(0, 95, 161, 0.08);
        border: 1.5px solid rgba(0, 95, 161, 0.18);
        transition: all 0.2s;
        white-space: nowrap;
    }

    .nav-link-profile:hover {
        background: rgba(0, 95, 161, 0.14);
        border-color: rgba(0, 95, 161, 0.32);
        color: #004e8a;
    }

    .nav-profile-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.72rem;
        font-weight: 800;
        flex-shrink: 0;
        overflow: hidden;
    }

    .nav-profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    /* CTA Buttons */
    .nav-cta-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-shrink: 0;
    }

    .btn-nav-login {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.5rem 1.25rem;
        font-size: 0.9rem;
        font-weight: 700;
        background: linear-gradient(135deg, #005fa1, rgb(1, 161, 127));
        color: #fff;
        border: none;
        border-radius: 0.65rem;
        text-decoration: none;
        transition: all 0.22s;
        box-shadow: 0 3px 12px rgba(0, 95, 161, 0.28);
        font-family: 'Tajawal', sans-serif;
        cursor: pointer;
    }

    .btn-nav-login:hover {
        opacity: 0.88;
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(0, 95, 161, 0.35);
        color: #fff;
    }

    .btn-nav-logout {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.48rem 1.1rem;
        font-size: 0.88rem;
        font-weight: 700;
        background: #fff;
        color: #64748b;
        border: 1.5px solid #e2e8f0;
        border-radius: 0.65rem;
        text-decoration: none;
        transition: all 0.2s;
        font-family: 'Tajawal', sans-serif;
        cursor: pointer;
    }

    .btn-nav-logout:hover {
        border-color: #fca5a5;
        color: #dc2626;
        background: #fff1f2;
    }

    /* ===== MOBILE TOGGLE ===== */
    .nav-toggle {
        display: none;
        width: 38px;
        height: 38px;
        background: rgba(0, 95, 161, 0.07);
        border: 1.5px solid rgba(0, 95, 161, 0.18);
        border-radius: 0.55rem;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #005fa1;
        font-size: 1.05rem;
        transition: all 0.2s;
        margin-right: auto;
    }

    .nav-toggle:hover {
        background: rgba(0, 95, 161, 0.12);
    }

    /* ===== MOBILE MENU ===== */
    .nav-mobile-menu {
        display: none;
        padding: 0.75rem 0 0.5rem;
        border-top: 1px solid rgba(0, 95, 161, 0.08);
        margin-top: 0.6rem;
    }

    .nav-mobile-menu.open {
        display: block;
    }

    .nav-mobile-item {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        padding: 0.65rem 0.85rem;
        font-size: 0.95rem;
        font-weight: 600;
        color: #475569;
        text-decoration: none;
        border-radius: 0.65rem;
        transition: all 0.18s;
        margin-bottom: 0.15rem;
    }

    .nav-mobile-item i {
        width: 20px;
        text-align: center;
        color: #94a3b8;
    }

    .nav-mobile-item:hover,
    .nav-mobile-item.active {
        background: rgba(0, 95, 161, 0.07);
        color: #005fa1;
    }

    .nav-mobile-item.active i {
        color: #005fa1;
    }

    .nav-mobile-divider {
        height: 1px;
        background: rgba(0, 0, 0, 0.06);
        margin: 0.5rem 0;
    }

    .nav-mobile-cta {
        padding: 0 0.25rem 0.5rem;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
        margin-top: 0.25rem;
    }

    @media (max-width: 768px) {

        .nav-links,
        .nav-divider,
        .nav-brand-sub,
        .nav-cta-group {
            display: none !important;
        }

        .nav-toggle {
            display: flex;
        }
    }

    @media (min-width: 769px) {
        .nav-mobile-menu {
            display: none !important;
        }
    }
</style>

<header class="site-header" id="siteHeader">
    <div class="container">
        <nav class="nav-inner">
            {{-- Brand --}}
            <a href="{{ route('web.home') }}" class="nav-brand">
                <img src="{{ asset('assets/web/images/logo.jpeg') }}" alt="شعار القسم" class="nav-brand-logo">
                <div class="nav-brand-text">
                    <span class="nav-brand-title">قسم السلامة</span>
                    <span class="nav-brand-sub">مدينة الملك سلمان الطبية</span>
                </div>
            </a>

            {{-- Desktop Divider --}}
            <div class="nav-divider d-none d-md-block"></div>

            {{-- Desktop Links --}}
            <ul class="nav-links">
                <li class="nav-item">
                    <a href="{{ route('web.home') }}"
                        class="nav-link {{ request()->routeIs('web.home') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>
                        الرئيسية
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#our-services" class="nav-link">
                        <i class="fas fa-shield-halved"></i>
                        خدماتنا
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#about-us" class="nav-link">
                        <i class="fas fa-circle-info"></i>
                        من نحن
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#contact-us" class="nav-link">
                        <i class="fas fa-envelope"></i>
                        تواصل معنا
                    </a>
                </li>
            </ul>

            {{-- Desktop CTA --}}
            <div class="nav-cta-group">
                @auth
                    <a href="{{ route('web.profile') }}" class="nav-link-profile">
                        <div class="nav-profile-avatar">
                            @if (auth()->user()->signature)
                                <img src="{{ asset('upload/' . auth()->user()->signature) }}" alt="avatar">
                            @else
                                {{ mb_substr(auth()->user()->name, 0, 1) }}
                            @endif
                        </div>
                        {{ mb_substr(auth()->user()->name, 0, 14) }}{{ mb_strlen(auth()->user()->name) > 14 ? '…' : '' }}
                    </a>
                    <a href="{{ route('web.logout') }}" class="btn-nav-logout">
                        <i class="fas fa-right-from-bracket"></i>
                        خروج
                    </a>
                @endauth

                @guest
                    <a href="{{ route('web.login') }}" class="btn-nav-login">
                        <i class="fas fa-right-to-bracket"></i>
                        تسجيل الدخول
                    </a>
                @endguest
            </div>

            {{-- Mobile Toggle --}}
            <button class="nav-toggle" id="navToggle" aria-label="قائمة التنقل">
                <i class="fas fa-bars" id="navToggleIcon"></i>
            </button>
        </nav>

        {{-- Mobile Menu --}}
        <div class="nav-mobile-menu" id="navMobileMenu">
            <a href="{{ route('web.home') }}"
                class="nav-mobile-item {{ request()->routeIs('web.home') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                الرئيسية
            </a>
            <a href="#our-services" class="nav-mobile-item">
                <i class="fas fa-shield-halved"></i>
                خدماتنا
            </a>
            <a href="#about-us" class="nav-mobile-item">
                <i class="fas fa-circle-info"></i>
                من نحن
            </a>
            <a href="#contact-us" class="nav-mobile-item">
                <i class="fas fa-envelope"></i>
                تواصل معنا
            </a>

            @auth
                <a href="{{ route('web.profile') }}" class="nav-mobile-item">
                    <i class="fas fa-user-circle"></i>
                    ملفي الشخصي
                </a>
            @endauth

            <div class="nav-mobile-divider"></div>
            <div class="nav-mobile-cta">
                @guest
                    <a href="{{ route('web.login') }}" class="btn-nav-login" style="justify-content:center;">
                        <i class="fas fa-right-to-bracket"></i>
                        تسجيل الدخول
                    </a>
                @endguest
                @auth
                    <a href="{{ route('web.logout') }}" class="btn-nav-logout" style="justify-content:center;">
                        <i class="fas fa-right-from-bracket"></i>
                        تسجيل الخروج
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<script>
    (function() {
        var toggle = document.getElementById('navToggle');
        var menu = document.getElementById('navMobileMenu');
        var icon = document.getElementById('navToggleIcon');
        var header = document.getElementById('siteHeader');

        if (toggle && menu) {
            toggle.addEventListener('click', function() {
                var open = menu.classList.toggle('open');
                icon.className = open ? 'fas fa-xmark' : 'fas fa-bars';
            });
        }

        window.addEventListener('scroll', function() {
            if (header) {
                header.classList.toggle('scrolled', window.scrollY > 20);
            }
        });
    })();
</script>
