@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card card-flush">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_settings_store">
                                <i class="ki-duotone ki-shop fs-2 me-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>Website</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary d-flex align-items-center pb-5 " data-bs-toggle="tab"
                                href="#kt_ecommerce_settings_general">
                                <i class="ki-duotone ki-home fs-2 me-2"></i>Informasi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_ecommerce_settings_store" role="tabpanel">
                            <form id="kt_ecommerce_settings_general_store" class="form"
                                action="{{ route('admin.setting.website.update') }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Website Setting</h2>
                                    </div>
                                </div>
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Nama Website</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="atur nama Website">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-solid" name="name"
                                            value="{{ $setting->name }}" required />
                                    </div>
                                </div>
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Logo</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Set the store owner's name">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                            <div class="image-input-wrapper w-125px h-125px "
                                                style="background-image: url('{{ Storage::url( $setting->logo) }}')">
                                            </div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Ganti Logo">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="batal">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Hapus Logo">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Favicon</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Set the store owner's name">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('{{ asset('back/media/svg/avatars/blank.svg') }}')">
                                            <div class="image-input-wrapper w-125px h-125px "
                                                style="background-image: url('{{ Storage::url($setting->favicon) }}')">
                                            </div>
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Ganti Favicon">
                                                <i class="ki-duotone ki-pencil fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <input type="file" name="favicon" accept="image/*"
                                                     />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="batal">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="hapus favicon">
                                                <i class="ki-duotone ki-cross fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- Email --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Email</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="atur email Website">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control form-control-solid" name="email"
                                            value="{{ $setting->email }}" />
                                    </div>
                                </div>
                                {{-- phone --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">No Telp</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="atur email Website">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control form-control-solid" name="phone"
                                            value="{{ $setting->phone }}" required />
                                    </div>
                                </div>
                                {{-- alamat --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span class="required">Alamat</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Set the store's full address.">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control form-control-solid" name="address" required>{{ $setting->address }}</textarea>
                                    </div>
                                </div>
                                {{-- latitude --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>latitude</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="latitude" class="form-control form-control-solid" name="latitude"
                                            value="{{ $setting->latitude }}" />
                                    </div>
                                </div>
                                {{-- longitude --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Longitude</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-solid" name="longitude"
                                            value="{{ $setting->longitude }}" />
                                    </div>
                                </div>
                                {{-- about --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Tentang Website</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_about" class=" min-h-150px mb-5">
                                            {!! $setting->about !!}
                                        </div>
                                        <input type="hidden" id="about_quill" name="about">
                                    </div>
                                </div>

                                {{-- facebook --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Facebook</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="facebook"
                                            value="{{ $setting->facebook }}" />
                                    </div>
                                </div>

                                {{-- instagram --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Instagram</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="instagram"
                                            value="{{ $setting->instagram }}" />
                                    </div>
                                </div>

                                {{-- twitter --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Twitter</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="twitter"
                                            value="{{ $setting->twitter }}" />
                                    </div>
                                </div>

                                {{-- youtube --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Youtube</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="youtube"
                                            value="{{ $setting->youtube }}" />
                                    </div>
                                </div>

                                {{-- whatsapp --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Whatsapp</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control form-control-solid" name="whatsapp"
                                            value="{{ $setting->whatsapp }}" />
                                    </div>
                                </div>

                                {{-- telegram --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Telegram</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="telegram"
                                            value="{{ $setting->telegram }}" />
                                    </div>
                                </div>

                                {{-- linkedin --}}
                                <div class="row fv-row mb-7">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Linkedin</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="url" class="form-control form-control-solid" name="linkedin"
                                            value="{{ $setting->linkedin }}" />
                                    </div>
                                </div>
                                <div class="row py-10">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Save</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade " id="kt_ecommerce_settings_general" role="tabpanel">
                            <form id="kt_ecommerce_settings_general_form" class="form" action="" method="POST">
                                @method("PUT")
                                @csrf
                                <div class="row mb-7">
                                    <div class="col-md-9 offset-md-3">
                                        <h2>Setting Informasi</h2>
                                    </div>
                                </div>
                                {{-- privacy_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Privacy Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_privacy_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->privacy_policy !!}
                                        </div>
                                        <input type="hidden" id="privacy_policy" name="privacy_policy">
                                    </div>
                                </div>

                                {{-- terms_and_conditions --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Terms & Conditions</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_terms_and_conditions"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->terms_and_conditions !!}
                                        </div>
                                        <input type="hidden" id="terms_and_conditions" name="terms_and_conditions">
                                    </div>
                                </div>

                                {{-- return_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Return Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_return_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->return_policy !!}
                                        </div>
                                        <input type="hidden" id="return_policy" name="return_policy">
                                    </div>
                                </div>

                                {{-- shipping_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Shipping Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_shipping_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->shipping_policy !!}
                                        </div>
                                        <input type="hidden" id="shipping_policy" name="shipping_policy">
                                    </div>
                                </div>

                                {{-- cancellation_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Cancellation Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_cancellation_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->cancellation_policy !!}
                                        </div>
                                        <input type="hidden" id="cancellation_policy" name="cancellation_policy">
                                    </div>
                                </div>

                                {{-- refund_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Refund Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_refund_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->refund_policy !!}
                                        </div>
                                        <input type="hidden" id="refund_policy" name="refund_policy">
                                    </div>
                                </div>

                                {{-- payment_policy --}}
                                <div class="row fv-row mb-18">
                                    <div class="col-md-3 text-md-end">
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Payment Policy</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="editor_payment_policy"
                                            class="form-control form-control-solid min-h-150px mb-5">
                                            {!! $setting->payment_policy !!}
                                        </div>
                                        <input type="hidden" id="payment_policy" name="payment_policy">
                                    </div>
                                </div>

                                <div class="row py-10">
                                    <div class="col-md-9 offset-md-3">
                                        <div class="d-flex">
                                            <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                                class="btn btn-light me-3">Cancel</button>
                                            <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                class="btn btn-primary">
                                                <span class="indicator-label">Save</span>
                                                <span class="indicator-progress">Please wait...
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        const quill = new Quill('#editor_about', {
            theme: 'snow'
        });
        var quillEditor = document.getElementById('about_quill');
        quillEditor.value = quill.root.innerHTML;
        quill.on('text-change', function() {
            quillEditor.value = quill.root.innerHTML;
        });
    </script>
@endsection
