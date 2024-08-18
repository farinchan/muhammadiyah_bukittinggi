@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            @foreach ($list_banner as $banner)
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Banner 1</h3>
                    </div>
                </div>
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
                        action="{{ route('admin.setting.banner.update', 1) }}">
                        @method('PUT')
                        @csrf
                        <div class="card-body border-top p-9">
                            <div class="mb-6">
                                <label class="form-label">Judul</label>
                                <div>
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px "
                                            style="background-image: url('{{ Storage::url($banner->image) }}')">
                                        </div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-text">Menerima File Tipe: png, jpg, jpeg.</div>
                                    <div class="form-text">Disarankan banner ukuran 1450px x 750px.</div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                    value="{{ $banner->title }}" placeholder="Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" class="form-control form-control-solid" name="subtitle"
                                    value="{{ $banner->subtitle }}" placeholder="Sub Judul Banner" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Remote URL</label>
                                <input type="url" class="form-control form-control-solid" name="url"
                                    value="{{ $banner->url }}" placeholder="URL Tujuan" required>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            @if ($list_banner->count() > 1)
                            <button type="reset" class="btn btn-danger btn-active-light-danger me-2">Hapus</button>
                            @endif
                            
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
@endsection
@section('scripts')
@endsection
