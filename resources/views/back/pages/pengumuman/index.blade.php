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
                                class="form-control form-control-solid w-250px ps-12" placeholder="Cari Pengumuman" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_category" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Buat Pengumuman
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
                                <th class="min-w-250px">Kategori</th>
                                <th class="min-w-150px">Slug</th>
                                <th class="min-w-150px">Status</th>
                                <th class="min-w-150px">Dibuat Oleh</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($list_pengumuman as $pengumuman)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url({{ $pengumuman->image ? storage::url($pengumuman->image) : asset('back/media/pengumuman.png') }});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                    data-kt-ecommerce-category-filter="category_name">{{ $pengumuman->title }}</a>
                                                <div class="text-muted fs-7 fw-bold">
                                                    {{ Str::limit(strip_tags($pengumuman->content), 100) }}...</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge">{{ $pengumuman->slug }}</div>
                                    </td>
                                    <td>
                                        @if ($pengumuman->is_active == 1)
                                            <span class="badge badge-light-success">Aktif</span>
                                        @else
                                            <span class="badge badge-light-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex justify-content-start flex-column">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">
                                                    {{ $pengumuman->user->name }}</a>
                                                <span
                                                    class="text-muted fw-bold">{{ $pengumuman->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
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
                                                    data-bs-target="#edit_category{{ $pengumuman->id }}">
                                                    Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                    data-bs-target="#delete_pengumuman{{ $pengumuman->id }}">
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


    @foreach ($list_pengumuman as $pengumuman)
        

        <div class="modal fade" tabindex="-1" id="delete_pengumuman{{ $pengumuman->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Pengumuman</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('admin.pengumuman.destroy', $pengumuman->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus pengumuman <strong>{{ $pengumuman->title }}</strong>?</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
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
