<div wire:ignore>

    <!-- Page Title  -->
    <h2 style="font-weight: bold;">{{ $title }}</h2>
    <!-- Page Title  -->

    <!-- Breadcrumb -->
    <nav class="d-flex navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-weight: bold;">
                    <li class="breadcrumb-item"><a href="#">لوحة التحكم</a></li>
                    <li class="breadcrumb-item"><a href="#">إدارة {{ $title }}</a></li>
                    @if ($user)
                        <li class="breadcrumb-item active"><a
                                href="#">{{ $user->name . ' رقم التوظيف ' . $user->job_number }}</a>
                        </li>
                    @endif
                </ol>
            </nav>

            @if ($model)
                <div class="d-flex align-items-center pe-3">
                    <a class="btn btn-sm {{ $user->signature ? 'btn-success' : 'btn-danger' }}  downloadSignature">
                        <i class="fas fa-signature me-2"></i>
                        @if ($user->signature)
                            <span>تحميل توقيع الموظف</span>
                        @else
                            <span>الموظيف لم يوقع بعد !</span>
                        @endif

                    </a>
                </div>
            @endif

            @if ($model)
                <div class="d-flex align-items-center pe-3">
                    <a class="btn btn-sm {{ $user->signature ? 'btn-success' : 'btn-danger' }}  downloadSignature">
                        <i class="fas fa-signature me-2"></i>
                        @if ($user->signature)
                            <span>تحميل توقيع الموظف</span>
                        @else
                            <span>الموظيف لم يوقع بعد !</span>
                        @endif

                    </a>
                </div>
            @endif

            @if ($perm)
                <div class="d-flex align-items-center pe-3">
                    <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="{{ '#user-modal' }}"
                        href="{{ '#user-modal' }}">
                        <i class="far fa-square-plus me-2"></i>
                        <span>إضافة {{ $label }}</span>
                    </a>
                </div>
            @endif





        </div>
    </nav>
    <!-- Breadcrumb -->
</div>
