@extends('front.app')

@section('seo')
    <title>Home</title>
    <meta name="description" content="Home">
    <meta name="keywords" content="Home">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <style>
        h5 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        p {
            font-size: 1rem;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 1.25rem 0.75rem;
        }

        .preview {
            height: 250px;
            object-fit: cover;
            max-width: 100%;
            display: block;
        }

        .thumbnail-image {
            cursor: pointer;
            width: 100%;
            height: 270px;
            overflow: hidden;
            border-radius: 10px;
            margin: 10px 0;
            border: 2px solid #cecece;
            position: relative; /* Set thumbnail-image as relative */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tagify__input {
            border: none;
            outline: none;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }
    </style>
@endsection

@section('content')
    <main class="my-5">
        <div class="container">

            <div class="row">
                
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title">Buat Kajian</h5>
                        </div>
                        <form action="{{ route('user.kajian.update', $kajian->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">


                                    <div class="form-group">
                                        
                                        <label>Thumbnail
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="thumbnail-image" id="thumbnail">
                                            <img src="{{ $kajian->getThumbnail() }}" class="img-fluid preview"
                                                alt="thumbnail" id="preview">
                                        </div>
                                        <input type="file" class="form-control" style="display: none;" name="thumbnail"
                                            accept="image/*">
                                        @error('thumbnail')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Kajian
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp"
                                            autocomplete="off" required name="title" value="{{ $kajian->title }}"
                                            autofocus>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Content
                                            <span class="text-danger">*</span>
                                        </label>
                                        <textarea name="content" id="my-editor" class="form-control">
                                            {!! $kajian->content !!}
                                        </textarea>
                                        @error('content')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tags
                                        </label>
                                        <input type="text" class="form-control" id="tags" autocomplete="off"
                                            name="tags" value="{{ $kajian->tags }}">
                                        @error('tags')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <small class="form-text text-muted">Tags digunakan untuk SEO, pisahkan dengan koma
                                            <code>(,) </code> jika lebih dari satu keywoard yang digunakan</small>
                                    </div>

                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('user.kajian') }}" class="genric-btn default radius">Batal</a>
                                <button type="submit" class="genric-btn success radius">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script>
            $('#thumbnail').click(function() {
                console.log("test");
                $('input[name="thumbnail"]').click();
                
            });
            $('input[name="thumbnail"]').change(function() {
                let reader = new FileReader();
                reader.onload = e => {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            
    </script>
    <script src="{{ asset('back/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#my-editor',
            height: 500,
            menubar: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            plugins: 'image imagetools media link code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | media image | \
                                                                alignleft aligncenter alignright alignjustify | \
                                                                bullist numlist outdent indent | removeformat | link code',
            automatic_uploads: true,

        });
    </script>
    <script src="{{ asset('back/plugins/global/plugins.bundle.js') }}"></script>
    <script>
        new Tagify(document.querySelector('input[name=tags]'), {
            classNames: {
                tag: 'tagify__tag',
                tagInput: 'tagify__input',
                dropdown: 'tagify__dropdown',
                dropdownItem: 'tagify__dropdown__item',
            }
        });
    </script>
@endsection
