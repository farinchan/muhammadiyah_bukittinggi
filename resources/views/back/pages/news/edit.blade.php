@extends('back.app')
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
                action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
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
                                    background-image: url('@if($news->thumbnail) {{ Storage::url($news->thumbnail) }} @else {{ asset('back/media/svg/files/blank-image.svg') }} @endif');
                                }
                            </style>
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Ubah Thumbnail">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Batalkan Thumbnail">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Hapus Thumbnail">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">
                                Set Thumbnail Berita, hanya menerima file dengan ekstensi .png, .jpg, .jpeg
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Status</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_category_status">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select name="status" class="form-select mb-2" data-control="select2" data-hide-search="true"
                                data-placeholder="Select an option" id="kt_ecommerce_add_category_status_select" required>
                                <option></option>
                                <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ $news->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="archived" {{ $news->status == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="text-danger fs-7">{{ $message }}</div>
                            @enderror
                            <div class="text-muted fs-7">
                                Set Status Berita, <code>Published</code> untuk mempublikasikan berita, <code>Draft</code> untuk menyimpan berita sebagai draft, <code>Archived</code> untuk menyimpan berita sebagai arsip 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Berita</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Judul</label>
                                <input type="text" name="title" class="form-control mb-2"
                                    placeholder="Judul Pengumuman" value="{{ $news->title }}" required />
                                @error('title')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10 fv-row">
                                <label class="required form-label">Kategori</label>
                                <select name="category_id" class="form-select mb-2" data-control="select2"
                                    data-hide-search="true" data-placeholder="Pilih Kategori Berita" required>
                                    <option></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $news->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                    </option>
                                </select>
                                @error('category_id')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-10">
                                <label class="form-label">Content</label>
                                <div id="quill_content" name="kt_ecommerce_add_category_description"
                                    class="min-h-400px mb-2">
                                    {!! $news->content !!}
                                </div>
                                <input type="hidden" name="content" id="content" required>
                                @error('content')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label">Meta Tag Keywords</label>
                                <input id="keyword_tagify" name="meta_keywords" class="form-control mb-2"
                                    value="{{ $news->meta_keywords }}" />
                                @error('meta_keywords')
                                    <div class="text-danger fs-7">{{ $message }}</div>
                                @enderror
                                <div class="text-muted fs-7">
                                    Meta Tag Keywords digunakan untuk SEO, pisahkan dengan koma <code>,</code> jika lebih
                                    dari satu keywoard yang digunakan
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
    <script>
        var quill = new Quill('#quill_content', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video', 'formula'],

                    [{
                        header: [1, 2, 3, 4, 5, 6, false]
                    }], // custom button values
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'list': 'check'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }], // superscript/subscript
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }], // outdent/indent
                    [{
                        'direction': 'rtl'
                    }], // text direction

                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // dropdown with defaults from theme
                    [{
                        'font': []
                    }],
                    [{
                        'align': []
                    }],
                    ['clean'] // remove formatting button
                ]
            },
            placeholder: 'Tulis Pengumuman disini...',
            theme: 'snow' // or 'bubble'
        });

        $("#content").val(quill.root.innerHTML);
        quill.on('text-change', function() {
            $("#content").val(quill.root.innerHTML);
        });

        var tagify = new Tagify(document.querySelector("#keyword_tagify"), {
            whitelist: [],
            dropdown: {
                maxItems: 20, // <- mixumum allowed rendered suggestions
                classname: "tags-look",
                enabled: 0,
                closeOnSelect: true
            }
        });
    </script>
@endsection
