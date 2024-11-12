@extends('layouts.web.app')
@section('content')
    <!-- Jumbotron -->
    <div class="container my-4 text-white section-background">
        <div class="row align-items-center">
            <!-- Left Column: Image -->
            <div class="col-md-6 p-5 text-center">
                <img src="{{ asset('assets/web/images/jumbotron.webp') }}" alt="Jumbotron Image" class="img-fluid rounded-pill"
                    style="max-width: 70%;">
            </div>
            <!-- Right Column: Title and Text -->
            <div class="col-md-6">
                <h1 class="mb-3">قسم السلامة</h1>
                <h4 class="mb-3">اهلا وسهلا بكم في قسم السلامة - مدينة الملك سلمان الطبية</h4>
                <a data-mdb-ripple-init class="btn btn-light" href="{{ route('web.login') }}" role="button">تسجيل
                    الدخول</a>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->


    <!-- "من نحن؟" Section -->
    <div id="about-us" class="container my-4 text-white text-center py-5 section-background">
        <h2 class="mb-4">من نحن؟</h2>
        <p class="lead" style="font-size: 1.2rem;">
            نحن فريق قسم السلامة في مدينة الملك سلمان الطبية، حيث نكرس جهودنا لضمان بيئة عمل آمنة وصحية لجميع
            الموظفين والمرضى.
        </p>

        <div class="row">
            <div class="col-md-4">
                <i class="fas fa-shield-alt fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>تعزيز السلامة</h5>
                <p class="lead" style="font-size: 1rem;">
                    مهمتنا هي تعزيز ثقافة السلامة من خلال التدريب المستمر وتطبيق أفضل الممارسات.
                </p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-users fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>التعاون الجماعي</h5>
                <p class="lead" style="font-size: 1rem;">
                    نحن نؤمن بأن كل فرد له دور في تعزيز السلامة ونسعى لخلق وعي شامل بين جميع أعضاء المؤسسة.
                </p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-tools fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>الدعم والإرشاد</h5>
                <p class="lead" style="font-size: 1rem;">
                    نقدم الدعم الفني والإرشاد لضمان التزام الجميع بمعايير السلامة.
                </p>
            </div>
        </div>

        <p class="lead mt-4" style="font-size: 1.2rem;">
            نحن هنا لدعم الجميع في رحلتهم نحو بيئة عمل أكثر أمانًا.
        </p>
    </div>

    <!-- "خدماتنا" Section -->
    <div id="our-services" class="container my-4 text-white text-center py-5 section-background">
        <h2 class="mb-4">خدماتنا</h2>
        <p class="mb-5">
            نحن فريق قسم السلامة في مدينة الملك سلمان الطبية. نقدم مجموعة شاملة من الخدمات لتعزيز بيئة عمل آمنة
            وصحية لجميع الموظفين والمرضى.
        </p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <i class="fas fa-camera-retro fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>جولات سنوية</h5>
                <p>تنفيذ جولات سنوية لمراجعة وتقييم إجراءات السلامة.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-calendar-day fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>جولات يومية</h5>
                <p>جولات يومية للتأكد من الامتثال المستمر لمعايير السلامة.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-calendar-check fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>تشيكات شهرية</h5>
                <p>تدقيق شهري لتعزيز بيئة عمل آمنة ومستدامة.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-question-circle fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>الفرضيات</h5>
                <p>تطبيق فرضيات السلامة لتحسين الاستعداد والتصدي للحوادث.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>التدريب</h5>
                <p>برامج تدريبية تهدف لتعزيز الوعي بالسلامة بين الموظفين.</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-globe-americas fa-3x mb-3" style="color: #ffcc00;"></i>
                <h5>جولات بيئية</h5>
                <p>جولات بيئية لتقييم تأثير النشاطات الطبية على البيئة.</p>
            </div>
        </div>
    </div>

    <!-- "تواصل معنا" Section -->
    <div id="contact-us" class="container my-4 text-white py-5 px-5 section-background">

        <h2 class="text-center mb-4">تواصل معنا</h2>
        <p class="text-center mb-5">
            لا تتردد في التواصل معنا لأي استفسار أو للحصول على مزيد من المعلومات. نحن هنا للمساعدة.
        </p>
        <div class="row">
            <!-- Form Column -->
            <div class="col-md-6">
                <form>
                    <!-- Name Input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="nameID" class="form-control form-control-lg" required />
                        <label class="form-label text-white" for="nameID">الاسم</label>
                    </div>

                    <!-- Email Input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="emailID" class="form-control form-control-lg" required />
                        <label class="form-label text-white" for="emailID">البريد الإلكتروني</label>
                    </div>

                    <!-- Message Input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea id="messageID" class="form-control form-control-lg" rows="5" required></textarea>
                        <label class="form-label text-white" for="messageID">الرسالة</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-lg bg-white">إرسال</button>
                </form>
            </div>
            <!-- Image Column -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/web/images/contactus.jpg') }}" alt="Contact Us" class="img-fluid"
                    style="border-radius: 0.5rem;">
            </div>
        </div>
    </div>
@endsection
