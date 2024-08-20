@extends('back.app')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('admin.asset.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <style>
                                .image-input-placeholder {
                                    background-image: url("@if ($asset->image) {{ Storage::url($asset->image) }} @else {{ asset('back/media/svg/files/blank-image.svg') }} @endif");    
                                }
                            </style>
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah gambar">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan gambar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus gambar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">
                                Set gambar aset yang akan ditambahkan, dengan format .png, .jpg, .jpeg
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Tipe Aset</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <select name="asset_type_id" class="form-select mb-2" data-control="select2"
                                data-hide-search="true" data-placeholder="Select an option"
                                id="kt_ecommerce_add_category_status_select" required>
                                <option></option>
                                @foreach ($list_asset_type as $type)
                                    <option value="{{ $type->id }}" @if ($asset->asset_type_id == $type->id) selected @endif>
                                        {{ $type->name }} </option>
                                @endforeach
                            </select>
                            @error('asset_type_id')
                                <div class="text-danger fs-7">{{ $message }}</div>
                            @enderror
                            <div class="text-muted fs-7">
                                Set tipe aset yang akan ditambahkan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>informasi Umum</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-5 fv-row">
                                <label class="required form-label">Nama Tempat</label>
                                <input type="text" name="name" class="form-control mb-2" placeholder="Nama Tempat"
                                    value="{{ $asset->name }}" required />
                                @error('name')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">deskripsi</label>
                                <textarea name="description" class="form-control mb-2" rows="5" placeholder="Deskripsi Tempat">{{ $asset->description }}</textarea>
                                @error('description')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="tel" name="phone" class="form-control mb-2" placeholder="Nomor Telepon"
                                    value="{{ $asset->phone }}" />
                                @error('phone')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control mb-2" placeholder="Email"
                                    value="{{ $asset->email }}" />
                                @error('email')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Website</label>
                                <input type="url" name="website" class="form-control mb-2" placeholder="Website"
                                    value="{{ $asset->website }}" />
                                @error('website')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Lokasi</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-5">
                                <label class="form-label required">Alamat</label>
                                <textarea name="address" class="form-control mb-2" rows="5" placeholder="Alamat Tempat" required>{{ $asset->address }}</textarea>
                                @error('address')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Latitude</label>
                                    <input type="text" name="latitude" class="form-control mb-2"
                                        placeholder="Latitude" id="latitude" value="{{ $asset->latitude }}" readonly />
                                    @error('latitude')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Longitude</label>
                                    <input type="text" name="longitude" class="form-control mb-2"
                                        placeholder="Longitude" id="longitude" value="{{ $asset->longitude }}"
                                        readonly />
                                    @error('longitude')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-5">
                                <label class="form-label required">Pilih Lokasi</label>
                                <div id="map"></div>
                                <div class="text-muted fs-7">
                                    Pilih lokasi tempat dengan mengklik pada peta, atau drag marker pada peta untuk
                                    mengubah lokasi
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Social Media</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" name="facebook" class="form-control mb-2"
                                        placeholder="https://facebook.com/username" value="{{ $asset->facebook }}" />
                                    @error('facebook')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" name="instagram" class="form-control mb-2"
                                        placeholder="Instagram Tempat" value="{{ $asset->instagram }}" />
                                    @error('instagram')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Twitter</label>
                                    <input type="url" name="twitter" class="form-control mb-2"
                                        placeholder="https://twitter.com/username" value="{{ $asset->twitter }}" />
                                    @error('twitter')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Youtube</label>
                                    <input type="url" name="youtube" class="form-control mb-2"
                                        placeholder="https://youtube.com/channel/username"
                                        value="{{ $asset->youtube }}" />
                                    @error('youtube')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Linkedin</label>
                                    <input type="url" name="linkedin" class="form-control mb-2"
                                        placeholder="https://linkedin.com/in/username" value="{{ $asset->linkedin }}" />
                                    @error('linkedin')
                                        <div class="text-danger fs-7">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.pengumuman.index') }}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan Perubahan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        let latitude = document.getElementById('latitude').value;
        let longitude = document.getElementById('longitude').value;

        var map = L.map('map').setView([latitude, longitude], 13);

        // Tambahkan tile layer ke peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Muhammadiyah Bukittinggi'
        }).addTo(map);

        // Inisialisasi marker yang bisa didrag, posisi awal akan diperbarui nanti
        var marker = L.marker([latitude, longitude], {
            draggable: true
        }).addTo(map);

        // Event listener untuk mengupdate latitude dan longitude saat marker didrag
        marker.on('dragend', function(e) {
            var latlng = marker.getLatLng();
            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
        });

        // Event listener untuk mengupdate marker dan latitude, longitude saat peta diklik
        map.on('click', function(e) {
            var latlng = e.latlng;
            marker.setLatLng(latlng);
            document.getElementById('latitude').value = latlng.lat;
            document.getElementById('longitude').value = latlng.lng;
        });

        
    </script>
@endsection
