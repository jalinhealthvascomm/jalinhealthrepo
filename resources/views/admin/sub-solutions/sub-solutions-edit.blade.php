@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Feature Add -->
<div class="modal fade" id="modalFeature" tabindex="-1" role="dialog" aria-labelledby="modalFeature" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/feature/new/{{$subSolution->id}}" method="post" id="feature-add"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Feature</h6>
                            </label>
                            <input type="text" class="form-control" id="feature-title" name="features"
                                placeholder="Feature" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Description</h6>
                            </label>
                            <textarea style="display: none;" id="feature-description" name="description"></textarea>
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
<!-- Modal Feature Edit -->
<div class="modal fade" id="modalFeatureEdit" tabindex="-1" role="dialog" aria-labelledby="modalFeatureEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="edit-feature-edit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit-feature-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Feature</h6>
                            </label>
                            <input type="text" class="form-control" id="edit-feature-title" name="features"
                                placeholder="Feature" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group solution-description">
                            <label for="sub-solution-description">
                                <h6>Description</h6>
                            </label>
                            <textarea style="display: none;" id="edit-feature-description" name="description"></textarea>
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
<!-- Modal Feature Delete -->
<div class="modal fade" id="modalFeatureDelete" tabindex="-1" role="dialog" aria-labelledby="modalFeatureDelete"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="delete-feature" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="delete-feature-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Feature</h6>
                            </label>
                            <input type="text" class="form-control" id="delete-feature-title" name="features"
                                placeholder="Feature" value="" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Other Feature Add -->
<div class="modal fade" id="modalOtherFeature" tabindex="-1" role="dialog" aria-labelledby="modalOtherFeature"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Other Feature / Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/other-feature/new/{{$subSolution->id}}" method="post" id="other-feature-add"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Other Feature / Benefit</h6>
                            </label>
                            <textarea style="display: none;" id="other-feature-title" name="features"></textarea>
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
<!-- Modal Other Feature Edit -->
<div class="modal fade" id="modalOtherFeatureEdit" tabindex="-1" role="dialog" aria-labelledby="modalOtherFeatureEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Other Feature / Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="other-feature-edit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="edit-other-feature-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Other Feature / Benefit</h6>
                            </label>
                            <textarea style="display: none;" id="other-feature-title-edit" name="features"></textarea>
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
<!-- Modal Other Feature Delete -->
<div class="modal fade" id="modalOtherFeatureDelete" tabindex="-1" role="dialog"
    aria-labelledby="modalOtherFeatureDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Other Feature / Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="other-feature-delete" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="delete-other-feature-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Other Feature / Benefit</h6>
                            </label>
                            <textarea style="display: none;" id="other-feature-title-delete" name="features" readonly></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Other Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<main class="main-content position-relative min-vh-100 mt-1 border-radius-lg ">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <div class="py-4">
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    {{-- <div class="pb-0">
                        <h3>Sub Solution - {{ $subSolution->title }}</h3>
                </div> --}}
                <div class="px-2 pb-2">
                    <form action="{{route('admin.sub-solution.update', $subSolution)}}" method="post"
                        id="sub-solution-edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col d-inline-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
                                    <div class="ps-0 d-flex justify-content-between" style="width: 100%;">
                                        <a href="{{ route('admin.solutions.edit', $subSolution->solution) }}"><i class="fas fa-arrow-left text-sm ms-1"
                                                aria-hidden="true"></i></a>
                                        <h5 class="mb-0">{{$subSolution->solution->title ?? 'Sub Solution'}} - {{ $subSolution->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
                            <div class="" style="width: 100%;">
                                <div class="form-group">
                                    <label for="title">
                                        <h5>Title</h5>
                                    </label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Solution" value="{{ $subSolution->title }}">
                                    @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Title</strong> required!
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group" style="display: none; align-items: center; gap: 12px;">
                                    <label for="url" class="mb-0">
                                        <h6 class="mb-0">
                                            {{ ENV('APP_URL') }}/solutions/{{ $subSolution->solution->slug }}/
                                        </h6>
                                    </label>
                                    <input type="text" class="form-control" id="url" name="slug" placeholder="Solution"
                                        value="{{ $subSolution->slug ?? '' }}">
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Slug</strong> required & unique!
                                    </div>
                                    @enderror
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
                                                placeholder="SEO Meta Title"
                                                value="{{ $subSolution->seo_title ?? '' }}">
                                            @error('seoTitle')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Seo Meta Title</strong> required!
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="seoDescriptions">Meta Descriptions</label>
                                            <input type="text" class="form-control" id="seoDescriptions"
                                                name="seoDescriptions" placeholder="SEO Meta Descriptions"
                                                value="{{ $subSolution->seo_description ?? '' }}">
                                            @error('seoDescriptions')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Seo Meta Descriptions</strong> required!
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="seoKeywords">Meta Keywords</label>
                                            <input type="text" class="form-control" id="seoKeywords" name="seoKeywords"
                                                placeholder="SEO Meta Keywords"
                                                value="{{ $subSolution->seo_keywords ?? '' }}">
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
                                    <div class="card-body py-2">
                                        <div class="form-group">
                                            <label for="solution-description">
                                                <h5>Description</h5>
                                            </label>
                                            <textarea style="display: none;" id="solution-description"
                                                name="description">{!! $subSolution->description !!}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Seo Meta Description</strong> required!
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
                                    <div class="card-body py-2">
                                        <div class="form-group">
                                            <label for="solution-detail">
                                                <h5>Detail</h5>
                                            </label>
                                            <textarea style="display: none;" id="solution-detail"
                                                name="detail">{!! $subSolution->detail !!}</textarea>
                                            @error('detail')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Seo Meta Detail</strong> required!
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
                                    <div class="card-body py-2">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group py-4">
                                                    <label for="solution-icon">
                                                        <h5>icon</h5>
                                                    </label>
                                                    <input type="file" class="form-control" id="solution-icon"
                                                        name="icon" onchange="readURL('#preview-icon',this, null, 60)">
                                                    @error('icon')
                                                    <div class="alert alert-danger" role="alert">
                                                        Icon file type svg only
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col" style="max-width: 80px; max-height: 80px;">
                                                <div class="p-1 badge bg-gradient-secondary me-3"
                                                    style="margin-top:62px;">
                                                    <img id="preview-icon" src="{{ url($subSolution->icon) }}"
                                                        alt="{{ $subSolution->title }}" class="avatar avatar-sm"
                                                        style="object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="solution-image">
                                                <h5>Image</h5>
                                            </label>
                                            <input type="file" class="form-control" id="solution-image" name="image"
                                                onchange="readURL('#preview-image',this, null, 200)">
                                            <div class="row mt-4">
                                                <img id="preview-image" src="{{ url($subSolution->image) }}"
                                                    alt="{{ $subSolution->title }}" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3" id="inpFeatures">
        <div class="col">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">{{ $subSolution->title }} - Features</h5>
                                <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                                    data-bs-target="#modalFeature">{{ 'Add New Feature' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <p class="ps-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                        style="border-bottom: 1px solid #e9ecef!important;">
                        Feature </p>
                    <ul class="list-group list-feature">
                        @foreach ($features as $key => $feature)
                        <li class="list-group-item border-0 d-flex row"
                            style="border-bottom: 1.5px solid #e9ecef!important;">
                            <div class="d-flex flex-column item-feature col-lg-10 col-xxxl-11 px-0">
                                <div class="d-flex">
                                    <h6 class="mb-0 text-sm me-3">{{ $key + 1 }}</h6>
                                    <h6 class="text-sm">{{ $feature->features }}</h6>
                                </div>
                                <div class="content-featured" style="padding-left: 24px; max-height: 100px; overflow: hidden;">
                                    {!! $feature->description !!}
                                </div>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center px-0" style="gap: 1rem;">
                                @if (count($features) > 0 )
                                {{-- <a class="text-secondary font-weight-bold text-xs"
                                        href="/admin/feature/delete/{{$feature->id}}">Delete</a> --}}
                                <a href="#" class="text-secondary font-weight-bold text-xs btn-edit"
                                    data-bs-toggle="modal" data-bs-target="#modalFeatureDelete"
                                    onclick="featureDelete({{$feature}})">Delete</a>
                                @endif
                                {{-- <a class="text-secondary font-weight-bold text-xs" href="{{ route('admin.feature.edit', $feature) }}">Edit</a>
                                --}}
                                <a href="#" class="text-secondary font-weight-bold text-xs btn-edit"
                                    data-bs-toggle="modal" data-bs-target="#modalFeatureEdit"
                                    onclick="featureEdit({{$feature}})">Edit</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="otherfeaturewrapper">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Other Feature / Benefit</h5>
                        <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                            data-bs-target="#modalOtherFeature">{{ 'Add New' }}</button>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Feature / Benefit</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($otherFeatures as $key => $otherFeature)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <h6 class="mb-0 text-sm">{!! $otherFeature->features !!}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        
                                        {{-- <a href="/admin/other-feature/delete/{{$otherFeature->id}}"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user"
                                        >
                                        Delete
                                        </a> --}}
                                        <div class="d-flex gap-3 justify-content-end">
                                            @if (count($otherFeatures) > 0)
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#modalOtherFeatureDelete"
                                                onclick="otherFeatureDelete({{$otherFeature}})">
                                                Delete
                                            </a>
                                            @endif
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit" data-bs-toggle="modal"
                                                data-bs-target="#modalOtherFeatureEdit"
                                                onclick="otherFeatureEdit({{$otherFeature}})">
                                                Edit
                                            </a>
                                        </div>
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
</main>

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

</script>
<script>
    $(document).ready(function () {
        $('#solution-description').summernote({
            height: 150,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
        $('#solution-detail').summernote({
            height: 180,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
        $('#sub-solution-description').summernote({
            height: 100,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
        $('#sub-solution-detail').summernote({
            height: 180,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
        $('#feature-description').summernote({
            height: 100,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            styleTags: [
                'p',
                {
                    title: 'Title with bullet',
                    tag: 'p',
                    className: 'title-bullet',
                    value: 'p'
                },
            ],
        });
        $('#other-feature-title').summernote({
            height: 100,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']]
            ]
        });


    });

    function featureEdit(feature) {
        let editFeature = document.getElementById('edit-feature-edit');
        if (editFeature) {
            editFeature.action = '/admin/feature/update/' + feature.id;
        }
        let editID = document.getElementById('edit-feature-id');
        if (editID) {
            editID.value = feature.id;
        }
        let editTitle = document.getElementById('edit-feature-title');
        if (editTitle) {
            editTitle.value = feature.features;
        }
        let editDescription = document.getElementById('edit-feature-description');
        if (editDescription) {
            editDescription.value = feature.description;
        }
        $('#edit-feature-description').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            styleTags: [
                'p',
                {
                    title: 'Title with bullet',
                    tag: 'p',
                    className: 'title-bullet',
                    value: 'p'
                },
                {
                    title: 'Content for bullet',
                    tag: 'p',
                    className: 'content-for-bullet',
                    value: 'p'
                },
            ],
        });
    }

    function featureDelete(feature) {
        let deleteFeature = document.getElementById('delete-feature');
        if (deleteFeature) {
            deleteFeature.action = '/admin/feature/delete/' + feature.id;
        }
        let editID = document.getElementById('delete-feature-id');
        if (editID) {
            editID.value = feature.id;
        }
        let editTitle = document.getElementById('delete-feature-title');
        if (editTitle) {
            editTitle.value = feature.features;
        }
        let editDescription = document.getElementById('delete-feature-description');
        if (editDescription) {
            editDescription.value = feature.description;
        }
    }

    function otherFeatureEdit(feature) {
        let editFeature = document.getElementById('other-feature-edit');
        if (editFeature) {
            editFeature.action = '/admin/other-feature/update/' + feature.id;
        }
        let editID = document.getElementById('edit-other-feature-id');
        if (editID) {
            editID.value = feature.id;
        }
        let editTitle = document.getElementById('other-feature-title-edit');
        if (editTitle) {
            editTitle.value = feature.features;
        }
        $('#other-feature-title-edit').summernote({
            height: 100,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
        });
    }

    function otherFeatureDelete(feature) {
        let deleteFeature = document.getElementById('other-feature-delete');
        if (deleteFeature) {
            deleteFeature.action = '/admin/other-feature/delete/' + feature.id;
        }
        let deleteID = document.getElementById('delete-other-feature-id');
        if (deleteID) {
            deleteID.value = feature.id;
        }
        let deleteTitle = document.getElementById('other-feature-title-delete');
        if (deleteTitle) {
            deleteTitle.value = feature.features;
        }
        $('#other-feature-title-delete').summernote({
            height: 100,
            toolbar: [

            ],
        });
        $('#other-feature-title-delete').summernote('disable');
    }

</script>
@endpush
