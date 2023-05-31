@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Select Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmitemAdd" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="AddItemId" name="site_content_id" value="">
                    <div class="form-group">
                        <label for="addItemLabel">
                            <h6>Item Name</h6>
                        </label>
                        <input type="text" class="form-control" id="addItemLabel" name="itemValue"
                            placeholder="" value="">
                        @error('itemValue')
                        <div class="alert alert-danger" role="alert">
                            <strong>Item</strong> required!
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Select Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmitemEdit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editItemId" name="id" value="">
                    <div class="form-group">
                        <label for="editItemLabel">
                            <h6>Item Name</h6>
                        </label>
                        <input type="text" class="form-control" id="editItemLabel" name="itemValue"
                            placeholder="" value="">
                        @error('itemValue')
                        <div class="alert alert-danger" role="alert">
                            <strong>Item</strong> required!
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="delete-item" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="delete-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Item Name</h6>
                            </label>
                            <input type="text" class="form-control" id="delete-value" name="itemValue"
                                placeholder="" value="" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <form action="{{ route('admin.about-us.update', $siteContent) }}" method="post" id="frmProductDetail" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col d-inline-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
            </div>
        </div>

        <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
            <div class="row px-0">
                <div class="col">
                    <h5 class="mb-0">About Us</h5>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0">
                        <label class="mb-0 ms-0" for="page-title">
                            <h6 class="mb-0">Title</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="page-title" name="title" placeholder="Title"
                                value="{{ $siteContent->title }}">
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <strong>Title</strong> required!
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0 ms-0" style="display: inline-flex; align-items: center; gap: 12px;">
                            <label for="product-service-slug" class="mb-0">
                                <h6 class="mb-0">{{ ENV('APP_URL') }}/</h6>
                            </label>
                            <input type="text" class="form-control" id="product-service-slug" name="slug"
                                placeholder="product-service" value="{{ $siteContent->slug ?? '' }}" readonly>
                            @error('slug')
                            <div class="alert alert-danger" role="alert">
                                <strong>Slug</strong> required & unique!
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0 px-2">Seo Meta</h6>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <label for="seoTitle">Meta Title</label>
                            <input type="text" class="form-control" id="seoTitle" name="seoTitle"
                                placeholder="SEO Meta Title" value="{{ $siteContent->seo_title ?? '' }}">
                            @error('seoTitle')
                            <div class="alert alert-danger" role="alert">
                                <strong>Seo Meta Title</strong> required!
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seoDescriptions">Meta Descriptions</label>
                            <input type="text" class="form-control" id="seoDescriptions" name="seoDescriptions"
                                placeholder="SEO Meta Descriptions" value="{{ $siteContent->seo_description ?? '' }}">
                            @error('seoDescriptions')
                            <div class="alert alert-danger" role="alert">
                                <strong>Seo Meta Descriptions</strong> required!
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seoKeywords">Meta Keywords</label>
                            <input type="text" class="form-control" id="seoKeywords" name="seoKeywords"
                                placeholder="SEO Meta Keywords" value="{{ $siteContent->seo_keywords ?? '' }}">
                            @error('seoKeywords')
                            <div class="alert alert-danger" role="alert">
                                <strong>Seo Meta Keywords</strong> required!
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0">
                        <label class="mb-0 ms-0" for="side-content-excerpt">
                            <h6 class="mb-0">Description</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <textarea id="side-content-excerpt"
                                name="excerpt">{!! $siteContent->excerpt ?? '' !!}</textarea>
                            @error('excerpt')
                            <div class="alert alert-danger" role="alert">
                                <strong>Descriptions</strong> required!
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <label for="site-content-image">
                            <h6 class="mb-0 px-2">Image</h6>
                        </label>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <input type="file" class="form-control" id="site-content-image" name="image"
                                        onchange="readURL('#preview-image',this, null, 200)">
                                    <div class="row mt-4">
                                        <img id="preview-image" src="{{ url($siteContent->image ?? '') }}"
                                            alt="{{ $siteContent->title }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection


@push('footer-js')
<script>
    function readURL(elementid, input, width, height) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(elementid).attr('src', e.target.result).width(width).height(height);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function itemAdd(item) {
        let addSelectItemForm = document.getElementById('frmitemAdd');
        if (addSelectItemForm) {
            addSelectItemForm.action = '/admin/contact-us/add-item/' + item.id;
        }
        let siteContentID = document.getElementById('AddItemId');
        if (siteContentID) {
            siteContentID.value = item.id;
        }
    }

    function itemEdit(item) {
        let editSelectItemForm = document.getElementById('frmitemEdit');
        if (editSelectItemForm) {
            editSelectItemForm.action = '/admin/contact-us/update-item/' + item.id;
        }
        let editID = document.getElementById('editItemId');
        if (editID) {
            editID.value = item.id;
        }
        let editValue = document.getElementById('editItemLabel');
        if (editValue) {
            editValue.value = item.value;
        }
    }

    function itemDelete(item) {
        let editSelectItemForm = document.getElementById('delete-item');
        if (editSelectItemForm) {
            editSelectItemForm.action = '/admin/contact-us/delete-item/' + item.id;
        }
        let editID = document.getElementById('delete-id');
        if (editID) {
            editID.value = item.id;
        }
        let editValue = document.getElementById('delete-value');
        if (editValue) {
            editValue.value = item.value;
        }
    }

    $(document).ready(function () {
        $('#side-content-excerpt').summernote({
            height: 150,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

    $(document).ready(function () {
        $('#side-content-side').summernote({
            height: 250,
            styleTags: [
                'p',
                {
                    title: 'Bold',
                    tag: 'p',
                    className: 'p-bold',
                    value: 'p'
                },
            ],
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

</script>
@endpush
