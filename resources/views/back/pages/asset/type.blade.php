@extends('back.app')
@section('styles')
    <link href="{{ asset('vendor/iconpicker/css/fontawesome-iconpicker.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .iconpicker-popover {
            z-index: 9999999;
        }
        .popover {
            z-index: 9999999;
        }
        .iconpicker-popover.popover {
            z-index: 9999999;
        }
        .iconpicker-popover.popover.bottom {
            z-index: 9999999;
        }
        .iconpicker-popover.popover.bottom .arrow:after {
            border-bottom-color: #fff;
        }
        .iconpicker-popover.popover.bottom .arrow {
            border-bottom-color: #fff;
        }
    </style>
@endsection
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
                                class="form-control form-control-solid w-250px ps-12" id="search" placeholder="Cari Tipe Aset" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Tambah Tipe Aset
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
                                <th class="min-w-250px">Tipe Aset</th>
                                <th class="min-w-150px">Slug</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($list_asset as $asset)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url({{ Storage::url($asset->icon) }});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                    data-kt-ecommerce-category-filter="category_name">{{ $asset->name }}</a>
                                                <div class="text-muted fs-7 fw-bold">{{ $asset->description }}.</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge">{{ $asset->slug }}</div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#edit_category{{ $asset->id }}">
                                                    Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#delete_category{{ $asset->id }}">
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

    <div class="modal fade" tabindex="-1" id="add_category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Tipe Aset</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('admin.asset.type.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="icon" class="form-label required">Icon</label>
                            <input type="file" class="form-control form-control-solid" id="icon" name="icon"
                            accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label required">Nama Tipe Aset</label>
                            <input type="text" class="form-control form-control-solid" id="name" name="name"
                                placeholder="Tipe Aset Baru" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label required">Deskripsi</label>
                            <textarea class="form-control form-control-solid" id="description" name="description" rows="3"
                                placeholder="Deskripsi Tipe Aset"></textarea>
                            <small class="text-muted">
                                disarankan untuk mengisi deskripsi untuk Search Engine Optimization (SEO)
                            </small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Buat Tipe Aset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($list_asset as $asset)
        <div class="modal fade" tabindex="-1" id="edit_category{{ $asset->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Tipe Aset</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('admin.asset.type.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="icon" class="form-label required">Icon</label>
                                <input type="file" class="form-control form-control-solid" id="icon" name="icon"
                                accept="image/*" required>
                                <small class="text-muted">
                                   icon: <a href="{{ Storage::url($asset->icon) }}" target="_blank">{{ $asset->icon }}</a>, Kosongkan jika tidak ingin mengubah icon
                                </small>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label required">Nama Tipe Aset</label>
                                <input type="text" class="form-control form-control-solid" id="name"
                                    name="name" placeholder="Tipe Aset Baru" value="{{ $asset->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control form-control-solid" id="description" name="description" rows="3"
                                    placeholder="Deskripsi Tipe Aset">{{ $asset->description }}</textarea>
                                <small class="text-muted">
                                    disarankan untuk mengisi deskripsi untuk Search Engine Optimization (SEO)
                                </small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Tipe Aset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" id="delete_category{{ $asset->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Tipe Aset</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('admin.asset.type.destroy', $asset->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus Tipe Aset <strong>{{ $asset->name }}</strong>?</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus Tipe Aset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('scripts')
    <script src="{{ asset('back/js/custom/apps/ecommerce/catalog/categories.js') }}"></script>
    <script src="{{ asset('vendor/iconpicker/js/universal-icon-picker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var uip = new UniversalIconPicker('#selector', options);
        });
    </script>
@endsection
