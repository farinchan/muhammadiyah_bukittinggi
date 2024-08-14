@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <h1 class="card-title">
                        Profile Menu

                    </h1>
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="ki-duotone ki-plus fs-2"></i>
                            Buat Menu Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($list_profile as $profile)
                    <div class="col-md-6">
                        <div class="card card-md-stretch me-xl-3 mb-md-0 mt-6">
                            <div class="card-body p-10 p-lg-15">
                                <div class="d-flex flex-stack mb-3">
                                    <a href="">
                                        <h1 class="fw-bold text-gray-900 text-hover-primary">
                                            {{ $profile->name }}
                                        </h1>
                                    </a>
                                    <div class="d-flex align-items-center">
                                        <a href="" class="text-danger fw-bold me-4">Hapus</a>
                                        <a href="{{ route('admin.profile.edit', $profile->id) }}"
                                            class="text-primary fw-bold me-1">Edit</a>
                                        <i class="ki-duotone ki-arrow-right fs-2 text-primary"><span
                                                class="path1"></span><span class="path2"></span></i>
                                    </div>
                                </div>
                                <div class="m-0">
                                    <span class="text-muted">Dibuat Pada :
                                        <span class="fw-bold text-muted">
                                            {{ $profile->created_at->format('d F Y H:i') }}</span>
                                    </span>
                                    <br>
                                    <span class="text-muted">Diedit Pada :
                                        <span class="fw-bold text-muted">
                                            {{ $profile->updated_at->format('d F Y H:i') }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah Menu</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('admin.profile.store') }}" method="post">
                    @csrf

                    <div class="modal-body">
                        <div class="">
                            <label for="exampleFormControlInput1" class="required form-label">Nama Menu</label>
                            <input type="text" name="name" class="form-control form-control-solid"
                                placeholder="Menu" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($list_profile as $profile)
    @endforeach
@endsection
@section('scripts')
@endsection
