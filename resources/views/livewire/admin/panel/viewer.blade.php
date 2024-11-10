<div class="container-fluid">
    <div class="p-4 mb-4">

        <div class="row mb-4" wire:ignore>
            @livewire('partials.page-header', ['title' => 'الموظفين', 'label' => $user->name, 'model' => true, 'user' => $user])
        </div>

        <!-- Data Tables -->
        <div class="row" wire:ignore>
            <div class="row p-2 mb-3">
                {{-- <div class="col-md-3">
                    <div class="form-outline">
                        <i class="fab fa-searchengin trailing text-primary"></i>
                        <input type="search" id="search" wire:model.live="search"
                            class="form-control form-icon-trailing" aria-describedby="textExample1" />
                        <label class="form-label" for="search">البحث</label>
                    </div>
                </div> --}}

                <div class="col-md-3">
                    <select class="select selectForm" wire:model="form">
                        <option value="">اختر احد الفورمات</option>
                        @foreach ($forms as $form)
                            <option value="{{ $form->id }}">{{ __("$form->name") }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="table-responsive-md text-center">
                    <div class="datatable-loader bg-light" style="height: 8px;" wire:loading>
                        <span class="datatable-loader-inner"><span class="datatable-progress bg-primary"></span></span>
                    </div>
                    <table class="table table-bordered text-center" style="margin-bottom: 0rem;" wire:ignore.self>
                        <thead>
                            <tr>
                                <th class="th-sm"><strong>ID</strong></th>
                                <th class="th-sm"><strong>رقم النموذج</strong></th>
                                <th class="th-sm"><strong>التاريخ</strong></th>
                                <th class="th-sm"><strong>التحكم</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($solutions as $solution)
                                <tr>
                                    <td>{{ $solution->id }}</td>
                                    <td>{{ $solution->form_id }}</td>
                                    <td>{{ $solution->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a type="button" class="text-primary fa-lg me-2 ms-2"
                                            wire:click="openForm({{ $solution->id }})" href="#" title="Show">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a type="button" class="text-danger fa-lg me-2 ms-2 imagesDownload"
                                            wire:click="downloadImages({{ $solution->id }})" href="#"
                                            title="Show">
                                            <i class="fas fa-file-zipper"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4" class="fw-bold fs-6">لا يوجد نتائج !!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    {{-- <p class="text-center text-muted my-4" wire:loading>جاري تحميل البيانات ...</p> --}}
                </div>

                <!-- Table Pagination -->
                <div class="d-flex justify-content-between mt-4">

                    <nav aria-label="...">
                        <ul class="pagination pagination-circle">
                            {{ $solutions->withQueryString()->onEachSide(0)->links() }}
                        </ul>
                    </nav>

                    <div class="col-md-1" wire:ignore>
                        <select class="select selectPagination" wire:model="pagination">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                </div>
                <!-- Table Pagination -->
            </div>

            <div class="col-md-6">
                <div class="card" wire:ignore.self>
                    <iframe id="pdfframe" src="{{ $pdf_path }}" width="100%" height="670px">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</div>



@push('scripts')
    <script>
        $(document).ready(function() {
            var $imagesDownload = $(".imagesDownload");
            var $selectForm = $(".selectForm");
            var $selectPagination = $(".selectPagination");
            var $pdfframe = $("#pdfframe");
            var $downloadSignature = $('.downloadSignature');

            $selectForm.on('change', function() {
                let $user_action = $(this);
                let $form_id = $user_action.val();
                @this.set('form', $form_id);

                if ($form_id == 2 || $form_id == 3) {
                    $imagesDownload.show();
                } else {
                    $imagesDownload.hide();
                }
            });

            $selectPagination.on('change', function() {
                let $user_action = $(this);
                @this.set('pagination', $user_action.val());
            });

            $downloadSignature.on('click', function() {
                Livewire.dispatch('download');
            });

            Livewire.on('setPDFFile', (path) => {
                console.log(path);
                $pdfframe.attr('src', path);
            });

            // Listen for the Livewire event to download the file
            Livewire.on('downloadFile', function(event) {
                const link = document.createElement('a');
                link.href = event[0].url;
                link.download = 'images.zip';
                link.click();
            });

        });
    </script>
@endpush
