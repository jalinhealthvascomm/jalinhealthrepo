@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Add -->
<div class="modal fade" id="modalFeature" tabindex="-1" role="dialog" aria-labelledby="modalFeature"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Product Other Benefits</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/content-feature/new/{{$siteContent->id}}" method="post" id="frmProductFeatureAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="other-benefit">
                    <div class="row">
                        <div class="form-group">
                            <label for="product-feature-add">
                                <h6>Product Other Benefits </h6>
                            </label>
                            <textarea style="display: none;" id="product-feature-add" name="description"></textarea>
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
<div class="modal fade" id="modalFeatureEdit" tabindex="-1" role="dialog" aria-labelledby="modalFeatureEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal">Edit Product Other Benefits</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmProductFeatureEdit"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="product-feature-edit">
                                <h6>Product Other Benefits </h6>
                            </label>
                            <textarea style="display: none;" id="product-feature-edit" name="description"></textarea>
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

@error('description')
<div class="alert alert-danger" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition style="color: white">
    <strong>Product Benefits Description</strong> required!
</div>
@enderror


<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <div class="row mb-4">
        <div class="col">
            <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
                <div class="ps-0 d-flex justify-content-between" style="width: 100%;">
                    <a href="{{ route('admin.product-detail.index') }}"><i class="fas fa-arrow-left text-sm ms-1"
                            aria-hidden="true"></i></a>
                    <h5 class="mb-0">Other Benefits</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="productfeaturewrapper">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Other Benefits</h5>
                        <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                            data-bs-target="#modalFeature">{{ 'Add New' }}</button>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Benefits </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siteContent->contentFeatures as $key => $contentFeature)
                                <tr>
                                    <td style="white-space: normal!important;">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <h6 class="mb-0 text-sm">{!! $contentFeature->description !!}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-end">
                                        @if (count($siteContent->contentFeatures) > 0)
                                        {{-- <a href="/admin/content-feature/delete/{{$contentFeature->id}}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Delete Feature">
                                            Delete
                                        </a> --}}
                                        <a href="#" class="text-secondary font-weight-bold text-xs act-btn me-3"
                                                data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                onclick="itemDelete('{{strip_tags($contentFeature->description);}}', 
                                                    '/admin/content-feature/delete/{{$contentFeature->id}}')">
                                                Delete
                                            </a>
                                        @endif
                                        <a href="#" class="text-secondary font-weight-bold text-xs"
                                            data-toggle="tooltip" data-original-title="Edit Feature" data-bs-toggle="modal"
                                            data-bs-target="#modalFeatureEdit"
                                            onclick="productFeatureEdit({{$contentFeature}})">
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
        $('#product-feature-add').summernote({
            height: 100,
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

    function productFeatureEdit(feature) {
        let editFeature = document.getElementById('frmProductFeatureEdit');
        if (editFeature) {
            editFeature.action = '/admin/content-feature/update/' + feature.id;
        }

        let editTitle = document.getElementById('product-feature-edit');
        if (editTitle) {
            editTitle.value = feature.description;
        }
        $('#product-feature-edit').summernote({
            height: 100,
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

    var modalEdit = document.getElementById('modalFeatureEdit')
    modalEdit.addEventListener('hidden.bs.modal', function (event) {
        $('#product-feature-edit').summernote('destroy');
    })

</script>
@endpush
