@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Add -->
<div class="modal fade" id="modalSupportServiceAdd" tabindex="-1" role="dialog" aria-labelledby="modalSupportServiceAdd"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Support Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="content-meta/new/{{$supportServices->id}}" method="post" id="frmSupportServiceAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="card-item" name='key'>
                    <div class="row">
                        <div class="form-group">
                            <label for="support-service-add">
                                <h6>Support Services </h6>
                            </label>
                            <input type="text" class="form-control" id="support-service-add" name="value">
                        </div>
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

<div class="modal fade" id="modalSuccessServiceAdd" tabindex="-1" role="dialog" aria-labelledby="modalSuccessServiceAdd"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Success Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="content-meta/new/{{$successServices->id}}" method="post" id="frmSuccessServiceAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="card-item" name='key'>
                    <div class="row">
                        <div class="form-group">
                            <label for="Success-service-add">
                                <h6>Success Services </h6>
                            </label>
                            <input type="text" class="form-control" id="success-service-add" name="value">
                        </div>
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
<div class="modal fade" id="modalSupportServiceEdit" tabindex="-1" role="dialog" aria-labelledby="modalSupportServiceEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Support Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmSupportServiceEdit"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="card-item" name='key'>
                    <div class="row">
                        <div class="form-group">
                            <label for="support-service-edit">
                                <h6>Support Services </h6>
                            </label>
                            <input type="text" class="form-control" id="support-service-edit" name="value">
                        </div>
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

<div class="modal fade" id="modalSuccessServiceEdit" tabindex="-1" role="dialog" aria-labelledby="modalSuccessServiceEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Success Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmSuccessServiceEdit"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="card-item" name='key'>
                    <div class="row">
                        <div class="form-group">
                            <label for="success-service-edit">
                                <h6>Success Services </h6>
                            </label>
                            <input type="text" class="form-control" id="success-service-edit" name="value">
                        </div>
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
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Feature Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="frmitemDelete" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="deleteId" name="id" value="">
                    <div class="form-group">
                        <label for="title">
                            <h6>Feature Name</h6>
                        </label>
                        <input type="text" class="form-control" id="deleteTitle" name="title" placeholder="" value="" readonly>
                        @error('title')
                        <div class="alert alert-danger" role="alert">
                            <strong>Title</strong> required!
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete</button>
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

    <form action="{{ route('admin.service-detail.update', $siteContent) }}" method="post" id="frmServiceDetail" enctype="multipart/form-data">
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
                    <h5 class="mb-0">Service Detail</h5>
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
                            <textarea style="display: none;" id="side-content-excerpt"
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

        @if ($contentSide)
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-header pb-0">
                            <label class="mb-0 ms-0" for="side-content-image">
                                <h6 class="mb-0">Side Content With Image</h6>
                            </label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="mb-0" for="side-content-image">
                                            <h6 class="mb-0">Image</h6>
                                        </label>
                                        <input type="file" class="form-control" id="side-content-image" name="side-content-image"
                                            onchange="readURL('#preview-image1',this, null, 250)">
                                        <div class="row mt-4">
                                            <img id="preview-image1" src="{{ url($contentSide->image ?? '') }}"
                                                alt="{{ $contentSide->title }}" style="object-fit: scale-down" height="250"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label class="mb-0 ms-0" for="side-content-side">
                                            <h6 class="mb-0">Side Content</h6>
                                        </label>
                                        <textarea style="display: none;" id="side-content-side"
                                            name="side-content-content">{!! $contentSide->content ?? '' !!}</textarea>
                                        @error('side-content-content')
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Side Content</strong> required!
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </form>

    @if ($supportServices)
        <div class="row" id="client-support-services">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Client Support Services</h5>
                            <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                                data-bs-target="#modalSupportServiceAdd">{{ 'Add New' }}</button>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client Support Services </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($supportServices->contentMetas as $key => $contentMeta)
                                    <tr>
                                        <td style="white-space: normal!important;">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex gap-4 justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                    <h6 class="mb-0 text-sm">{!! $contentMeta->value !!}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-end">
                                            @if (count($supportServices->contentMetas) > 1)
                                            <a href="#" class="text-secondary font-weight-bold text-xs act-btn me-3"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                onclick="itemDelete('{{$contentMeta->value}}', '/admin/content-meta/delete/{{$contentMeta->id}}')">
                                                Delete
                                            </a>
                                            @endif
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit Feature" data-bs-toggle="modal"
                                                data-bs-target="#modalSupportServiceEdit"
                                                onclick="supportServicerEdit({{$contentMeta}})">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Empty</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
    
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($successServices)
        <div class="row" id="client-success-services">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Client Success Services</h5>
                            <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                                data-bs-target="#modalSuccessServiceAdd">{{ 'Add New' }}</button>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Client Success Services </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($successServices->contentMetas as $key => $contentMeta)
                                    <tr>
                                        <td style="white-space: normal!important;">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex gap-4 justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                    <h6 class="mb-0 text-sm">{!! $contentMeta->value !!}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-end">
                                            @if (count($successServices->contentMetas) > 1)
                                            <a href="#" class="text-secondary font-weight-bold text-xs act-btn me-3"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                onclick="itemDelete('{!! $contentMeta->value !!}', '/admin/content-meta/delete/{{$contentMeta->id}}')">
                                                Delete
                                            </a>
                                            @endif
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit Feature" data-bs-toggle="modal"
                                                data-bs-target="#modalSuccessServiceEdit"
                                                onclick="successServiceEdit({{$contentMeta}})">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Empty</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
    
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
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


    function supportServicerEdit(data) {
        let editFeature = document.getElementById('frmSupportServiceEdit');
        if (editFeature) {
            editFeature.action = '/admin/content-meta/update/' + data.id;
        }

        let editTitle = document.getElementById('support-service-edit');
        if (editTitle) {
            editTitle.value = data.value;
        }
    }

    function successServiceEdit(data) {
        let editFeature = document.getElementById('frmSuccessServiceEdit');
        if (editFeature) {
            editFeature.action = '/admin/content-meta/update/' + data.id;
        }

        let editTitle = document.getElementById('success-service-edit');
        if (editTitle) {
            editTitle.value = data.value;
        }
    }

    function itemDelete(item, act) {
        let deleteForm = document.getElementById('frmitemDelete');
        if (deleteForm) {
            deleteForm.action = act;
        }

        let title = document.getElementById('deleteTitle');
        if (title) {
            title.value = item;
        }
    }

</script>
@endpush
