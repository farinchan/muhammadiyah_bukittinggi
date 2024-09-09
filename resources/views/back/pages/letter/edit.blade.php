@extends('back.app')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="
                @if(request()->routeIs('admin.letter.in.edit'))
                    {{ route('admin.letter.in.update', $letter->id) }}
                @elseif(request()->routeIs('admin.letter.out.edit'))
                    {{ route('admin.letter.out.update', $letter->id) }}
                @endif
                " method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
              
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Surat Masuk</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Nomor Surat</label>
                                <input type="text" name="nomor_surat" class="form-control mb-2"
                                    placeholder="Nomor Surat" value="{{ $letter->nomor_surat }}" required />
                                @error('nomor_surat')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Perihal</label>
                                <input type="text" name="perihal" class="form-control mb-2"
                                    placeholder="perihal" value="{{  $letter->perihal }}" required />
                                @error('perihal')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="mb-10 fv-row">
                                <label class="required form-label">Lampiran</label>
                                <input type="file" name="lampiran" class="form-control mb-2"
                                    placeholder="lampiran" value="{{ old('lampiran') }}" required />
                                @error('lampiran')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Pengirim</label>
                                <input type="text" name="pengirim" class="form-control mb-2"
                                    placeholder="pengirim" value="{{  $letter->pengirim }}" required />
                                @error('pengirim')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Penerima</label>
                                <input type="text" name="penerima" class="form-control mb-2"
                                    placeholder="penerima" value="{{  $letter->penerima }}" required />
                                @error('penerima')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Tanggal Surat</label>
                                <input type="date" name="tanggal_surat" class="form-control mb-2"
                                    placeholder="tanggal_surat" value="{{  $letter->tanggal_surat }}" required />
                                @error('tanggal_surat')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="form-label">file</label>
                                <input type="file" name="file" class="form-control mb-2" accept=".pdf,.doc,.docx"
                                    placeholder="file" value="{{ old('file') }}" />
                                    @if($letter->file)
                                        file surat sebelumnya: <a href="{{ asset('storage/'.$letter->file) }}" target="_blank">{{ $letter->file }}</a>, kosongkan jika tidak ingin mengubah file
                                    @endif
                                @error('file')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control mb-2" rows="5"
                                    placeholder="keterangan" >{{ $letter->keterangan }}</textarea>
                                @error('keterangan')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
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
    
@endsection
