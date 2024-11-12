<section class="mt-md-4 pt-md-2 mb-5 p-5">
    <div class="row">
        <a class="col-xl-3 col-md-6 mb-5" href="{{ route('admin.panel.users') }}">
            <div class="card card-cascade cascading-admin-card">
                <div class="admin-up">
                    <i class="fas fa-users green-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase fs-6 fw-bold">الموظفين</p>
                        <h4 class="font-weight-bold text-dark">{{ models_count('User') }}</h4>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
