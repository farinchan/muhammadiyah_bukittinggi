@extends('back.app')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-category-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Cari Inbox" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Tambah Inbox
                        </a> --}}
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 " id="kt_ecommerce_category_table">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px ">
                                    <div class="ms-5">Inbox </div>
                                </th>
                                <th class="min-w-125px text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600 ">
                            @foreach ($list_inbox as $inbox)
                                <tr >
                                    <td>
                                        <div class="d-flex ms-5">

                                            <div class="">
                                                <h2 href="#" class="text-gray-800 fw-bold mb-3">{{ $inbox->subject }}
                                                </h2>
                                                <div>
                                                    <span class="text-gray-800 fs-5 fw-bold mb-1">
                                                        {{ $inbox->name }}
                                                    </span>
                                                    <a class="text-muted fs-7 mb-1 text-hover-primary" href="mailto:{{ $inbox->email }}?subject=re:{{ $inbox->subject }}&body=Halo {{ $inbox->name }},"> ({{ $inbox->email }})</a>
                                                </div>
                                                <span
                                                    class="text-muted fs-7 fw-bold">{{ $inbox->created_at->diffForHumans() }}</span>
                                                <div class="text-muted fs-5 mt-2">{{ $inbox->message }}</div>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="mailto:{{ $inbox->email }}?subject=re:{{ $inbox->subject }}&body=Halo {{ $inbox->name }}," class="btn btn-icon btn-light-linkedin me-2">
                                            <i class="fa-solid fa-reply fs-4"></i>
                                        </a>
                                        <a href="#" class="btn btn-icon btn-light-youtube me-2"data-bs-toggle="modal"
                                            data-bs-target="#delete_category{{ $inbox->id }}">
                                            <i class="fa-solid fa-trash-can fs-4"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($list_inbox as $inbox)
        <div class="modal fade" tabindex="-1" id="delete_category{{ $inbox->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Inbox</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('admin.news.category.destroy', $inbox->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus Inbox <strong>{{ $inbox->subject }}</strong>?</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus Inbox</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('scripts')
    <script src="{{ asset('back/js/custom/apps/ecommerce/catalog/inbox.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#kt_ecommerce_category_table').DataTable({
                "responsive": true
            });
        });
    </script> --}}
@endsection
