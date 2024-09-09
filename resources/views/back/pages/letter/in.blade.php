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
                                class="form-control form-control-solid w-250px ps-12" placeholder="Cari Surat" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.letter.in.create') }}" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Tambah Surat
                        </a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_category_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-250px">Surat</th>
                                <th class="min-w-150px">Pengirim</th>
                                <th class="min-w-150px">Penerima</th>
                                <th class="min-w-150px">Tanggal Surat</th>
                                <th class="min-w-150px">File</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($letters as $letter)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">

                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                    data-kt-ecommerce-category-filter="category_name">No:
                                                    {{ $letter->nomor_surat }}</a>
                                                <div class="text-muted fs-7 fw-bold">Hal: {{ $letter->description }}.</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $letter->pengirim }}
                                    </td>
                                    <td>
                                        {{ $letter->penerima }}
                                    </td>
                                    <td>
                                        {{ $letter->tanggal_surat }}
                                    </td>
                                    <td>
                                        @if ($letter->file)
                                            <a href="{{ asset('storage/' . $letter->lampiran) }}" target="_blank">
                                                <i class="ki-duotone ki-file-added text-primary fs-3x" data-bs-toggle="tooltip" data-bs-placement="right" title="Lihat File">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        @else
                                            <i class="ki-duotone ki-file-deleted text-danger fs-3x" data-bs-toggle="tooltip" data-bs-placement="right" title="File Tidak Ada">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route("admin.letter.in.edit", $letter->id) }}" class="menu-link px-3">
                                                    Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#delete_category{{ $letter->id }}">
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @foreach ($letters as $letter)

        <div class="modal fade" tabindex="-1" id="delete_category{{ $letter->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Surat</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('admin.letter.in.destroy', $letter->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus Surat <strong>{{ $letter->nomor_surat }}</strong>?</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus Surat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('scripts')
    <script src="{{ asset('back/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
@endsection
