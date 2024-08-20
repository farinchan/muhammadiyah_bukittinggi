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
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Cari Aset" />
                        </div>
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        {{-- <div class="w-100 mw-150px">
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">Semua</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div> --}}
                        <a href="{{ route("admin.asset.create", ['type_id' => 1]) }}" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>Tambah Aset</a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-200px">Aset</th>
                                <th class="text-start min-w-100px">Alamat</th>
                                <th class="text-start min-w-150px">Contact</th>
                                <th class="text-center min-w-100px">Social Media</th>
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
                                    <td >
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image:url( @if($asset->image) {{ Storage::url($asset->image) }} @else {{ asset('back/media/svg/files/blank-image.svg') }} @endif);"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1"
                                                    data-kt-ecommerce-category-filter="category_name">{{ $asset->name }}</a>
                                                <div class="text-muted fs-7 fw-bold">
                                                    {{ $asset->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start pe-0">
                                        {{ $asset->address }}
                                    </td>
                                    <td class=" pe-0">
                                        <ul>
                                            <li>{{ $asset->phone }}</li>
                                            <li>{{ $asset->email }}</li>
                                            <li>{{ $asset->website }}</li>
                                        </ul>
                                    </td>
                                    <td class="text-center pe-0">
                                        <div class="rating justify-content-end">
                                            <a href="{{ $asset->facebook }}" class="btn btn-icon btn-light-facebook me-5 "><i class="fab fa-facebook-f fs-4"></i></a>
                                            <a href="{{ $asset->twiter }}" class="btn btn-icon btn-light-twitter me-5 "><i class="fab fa-twitter fs-4"></i></a>
                                            <a href="{{ $asset->instagram }}" class="btn btn-icon btn-light-instagram me-5 "><i class="fab fa-instagram fs-4"></i></a>
                                        </div>
                                        <div class="rating justify-content-center mt-4">
                                            <a href="{{ $asset->youtube }}" class="btn btn-icon btn-light-youtube me-5 "><i class="fab fa-youtube fs-4"></i></a>
                                            <a href="{{ $asset->linkedin }}" class="btn btn-icon btn-light-linkedin me-5 "><i class="fab fa-linkedin fs-4"></i></a>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route("admin.asset.edit", $asset->id) }}" class="menu-link px-3">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                                                data-bs-target="#delete_news{{ $asset->id }}">Delete</a>
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
    @foreach ($list_asset as $asset)
        <div class="modal fade" tabindex="-1" id="delete_news{{ $asset->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Aset</h3>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <form action="{{ route('admin.asset.destroy', $asset->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <p>Apakah Anda yakin ingin menghapus Aset <strong>{{ $asset->name }}</strong>?</p>
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
    <script src="{{ asset('back/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
@endsection
