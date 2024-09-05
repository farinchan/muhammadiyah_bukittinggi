@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <h1 class="card-title">
                        Ortom Menu
                    </h1>
                </div>
                <form action="{{ route('admin.ortom.update', $ortom->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body p-10 p-lg-15">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">Nama ortom Menu</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Menu"
                                value="{{ $ortom->name }}" name="name" />
                        </div>
                        <div id="kt_docs_ckeditor_document_toolbar"></div>
                        <div class="mb-10" id="kt_docs_ckeditor_document">
                            {!! $ortom->content !!}
                        </div>
                        <input type="hidden" name="content" id="content">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.ortom.index') }}" class="btn btn-light me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('back/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}"></script>

    <script>
        DecoupledEditor
            .create(document.querySelector('#kt_docs_ckeditor_document'))
            .then(editor => {
                const toolbarContainer = document.querySelector('#kt_docs_ckeditor_document_toolbar');
                toolbarContainer.appendChild(editor.ui.view.toolbar.element);

                document.querySelector('#content').value = editor.getData();
                editor.model.document.on('change:data', () => {
                    const data = editor.getData();
                    document.querySelector('#content').value = data;
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
