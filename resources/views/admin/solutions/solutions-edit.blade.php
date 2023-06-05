@extends('layouts.user_type.auth')

@section('content')

<!-- Modal -->
<div class="modal fade" id="modalSubSolution" tabindex="-1" role="dialog" aria-labelledby="modalSubSolution"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Sub Solution</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/sub-solution/new/{{$solution->id}}" method="post" id="solution-edit"
                            enctype="multipart/form-data">
                            @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="sub-solution-title">
                                <h6>Sub Solution Title</h6>
                            </label>
                            <input type="text" class="form-control" id="sub-solution-title" name="title"
                                placeholder="Solution" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group">
                                    <label for="sub-solution-description">
                                        <h6>Description</h6>
                                    </label>
                                    <textarea style="display: none;" id="sub-solution-description"
                                        name="description"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="sub-solution-description">
                                        <h6>Icon</h6>
                                    </label>
                                    <input type="file" class="form-control" id="solution-icon" name="icon">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <label for="sub-solution-description">
                                        <h6>Image</h6>
                                    </label>
                                    <input type="file" class="form-control" id="solution-icon" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sub-solution-detail">
                                    <h6>Detail</h6>
                                </label>
                                <textarea style="display: none;" id="sub-solution-detail"
                                    name="detail"></textarea>
                            </div>
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

<main class="main-content position-relative min-vh-100 mt-1 border-radius-lg ">
    @if(Session::has('saveSuccess'))
        <div class="alert alert-success" role="alert" 
        x-data="{ show: true}"
        x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
                {{ Session::get('saveSuccess') }}
        </div>
    @endif
    
    <div class="py-4">
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <div class="px-2 pb-2">
                        <form action="{{route('admin.solutions.update', $solution)}}" method="post" id="solution-edit"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col d-inline-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                </div>
                            </div>
                            <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
                                <div class="" style="width: 100%;">
                                    <div class="form-group">
                                        <label for="solution-title">
                                            <h5>Solution Title</h5>
                                        </label>
                                        <input type="text" class="form-control" id="solution-title" name="title"
                                            placeholder="Solution" value="{{ $solution->title }}">
                                        @error('title')
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Title</strong> required!
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="display: inline-flex; align-items: center; gap: 12px;">
                                        <label for="solution-url" class="mb-0">
                                            <h6 class="mb-0">{{ ENV('APP_URL') }}/solutions/</h6>
                                        </label>
                                        <input type="text" class="form-control" id="solution-url" name="slug"
                                            placeholder="Solution" value="{{ $solution->slug ?? '' }}" style="width: fit-content;" readonly>
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
                                                    placeholder="SEO Meta Title" value="{{ $solution->seo_title ?? '' }}">
                                                @error('seoTitle')
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Seo Meta Title</strong> required!
                                                    </div>
                                                @enderror
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="seoDescriptions">Meta Descriptions</label>
                                                <input type="text" class="form-control" id="seoDescriptions" name="seoDescriptions"
                                                    placeholder="SEO Meta Descriptions" value="{{ $solution->seo_description ?? '' }}">
                                                @error('seoDescriptions')
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Seo Meta Descriptions</strong> required!
                                                    </div>
                                                @enderror
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="seoKeywords">Meta Keywords</label>
                                                <input type="text" class="form-control" id="seoKeywords" name="seoKeywords"
                                                    placeholder="SEO Meta Keywords" value="{{ $solution->seo_keywords ?? '' }}">
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
                                                    <h6>Description</h6>
                                                </label>
                                                <textarea style="display: none;" id="solution-description"
                                                    name="description">{!! $solution->description !!}</textarea>
                                                @error('description')
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
                                        <div class="card-body py-2">
                                            <div class="form-group">
                                                <label for="solution-detail">
                                                    <h6>Detail</h6>
                                                </label>
                                                <textarea style="display: none;" id="solution-detail"
                                                    name="detail">{!! $solution->detail !!}</textarea>
                                                @error('detail')
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Detail</strong> required!
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body py-2">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group py-4">
                                                        <label for="solution-icon">
                                                            <h6>Icon</h6>
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
                                                        <img id="preview-icon" src="{{ url($solution->icon) }}"
                                                            alt="{{ $solution->title }}" class="avatar avatar-sm"
                                                            style="object-fit: contain;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="solution-image">
                                                            <h6>Image</h6>
                                                        </label>
                                                        <input type="file" class="form-control" id="solution-image" name="image"
                                                            onchange="readURL('#preview-image',this, null, 200)">
                                                        <div class="row mt-4">
                                                            <img id="preview-image" src="{{ url($solution->image) }}"
                                                                alt="{{ $solution->title }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                        </form>

                        <div class="row mt-4">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between">
                                            <h3>Sub Solution</h3>
                                            {{-- <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                                                data-bs-target="#modalSubSolution">{{ 'Add New' }}</button> --}}
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 pb-2">
                                        <div class="table-responsive p-0">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Solution Type</th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    @forelse ($subSolutions as $subSolution)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div>
                                                                    <div class="p-1 badge bg-gradient-secondary me-3">
                                                                        <img src="{{ url($subSolution->icon) }}" class="avatar avatar-sm"
                                                                            style="object-fit: contain;" alt="user1">
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $subSolution->title }}</h6>
                                                                    <p class="text-xs text-secondary mb-0">{!! $subSolution->description
                                                                        !!}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-end">
                                                            <a href="sub-solution/{{$subSolution->slug}}" class="text-secondary font-weight-bold text-xs"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div
                                                                    class="d-flex flex-column justify-content-center">
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
            height: 300,
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
            height: 300,
            toolbar: [
                // ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

</script>
@endpush
