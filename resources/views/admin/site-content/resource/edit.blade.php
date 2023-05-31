@extends('layouts.user_type.auth')

@section('content')

<div class="py-4">
    <div class="row mb-4">
        <div class="col">
            <form action="{{ route('admin.resources.update', $resource) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col d-inline-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                    </div>
                </div>

                <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 mb-3">
                    <div class="ps-0 d-flex justify-content-between" style="width: 100%;">
                        <a href="{{ route('admin.resources.index') }}"><i class="fas fa-arrow-left text-sm ms-1"
                                aria-hidden="true"></i></a>
                        <h5 class="mb-0">Update Resource</h5>
                    </div>
                </div>

                <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
                    <div class="" style="width: 100%;">
                        <div class="form-group">
                            <label for="resource-title">
                                <h5>Title</h5>
                            </label>
                            <input type="text" class="form-control" id="resource-title" name="title"
                                placeholder="resource" value="{{ $resource->title }}">
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <strong>Title</strong> required!
                            </div>
                            @enderror
                        </div>
                        <div class="form-group" style="display: inline-flex; align-items: center; gap: 12px;">
                            <label for="resource-url" class="mb-0">
                                <h6 class="mb-0">{{ ENV('APP_URL') }}/resources/</h6>
                            </label>
                            <input type="text" class="form-control" id="resource-url" name="slug" placeholder="resource"
                                style="width: fit-content;" value="{{ $resource->slug }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <div class="card" style="height: 327px">
                            <div class="card-header pb-0">
                                <label for="resource-image mb-0">
                                    <h6 class="mb-0">Feature Image</h6>
                                </label>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-0 d-flex flex-column justify-content-between"
                                    style="height: 100%;">
                                    <div class="row d-flex justify-content-center flex-grow-1">
                                        @if (!empty($resource->image))
                                        <img id="preview-image" style="max-height: 170px; object-fit: contain;"
                                        src="{{ url($resource->image) }}" />
                                        @else
                                        <img id="preview-image" style="max-height: 170px; object-fit: contain;"
                                        src="{{ url('/images/blank-image.jpg') }}" />
                                        @endif
                                        
                                    </div>
                                    <input type="file" class="form-control" id="resource-image" name="image"
                                        onchange="readURL('#preview-image',this, null, null)">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0 px-2">Seo Meta</h6>
                            </div>
                            <div class="card-body py-2">
                                <div class="form-group">
                                    <label for="seoTitle">Meta Title</label>
                                    <input type="text" class="form-control" id="seoTitle" name="seoTitle"
                                        placeholder="SEO Meta Title" value="{{ $resource->seo_title ?? '' }}">
                                    @error('seoTitle')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Seo Meta Title</strong> required!
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="seoDescriptions">Meta Descriptions</label>
                                    <input type="text" class="form-control" id="seoDescriptions" name="seoDescriptions"
                                        placeholder="SEO Meta Descriptions"
                                        value="{{ $resource->seo_description ?? '' }}">
                                    @error('seoDescriptions')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Seo Meta Descriptions</strong> required!
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="seoKeywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="seoKeywords" name="seoKeywords"
                                        placeholder="SEO Meta Keywords" value="{{ $resource->seo_keywords ?? '' }}">
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
                            <div class="card-header pb-0 px-3">

                            </div>
                            <div class="card-body py-2">
                                <div class="form-group">
                                    <textarea id="resource-content" name="content">{!! $resource->content !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <label for="resource-image mb-0">
                                    <h6 class="mb-0">Resource Categories</h6>
                                </label>
                            </div>
                            <div class="card-body">
                                @forelse ($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="{{$category->id}}" 
                                    name="category" id="categories-{{$category->id}}" 
                                    @if ( $category->id === $resource->resourceCategory->id ) @checked(true) @endif>
                                    <label class="form-check-label" for="categories-{{$category->id}}">
                                      {{ $category->title }}
                                    </label>
                                  </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0 px-2">Relate Tag</h6>
                            </div>
                            <div class="card-body py-2">
                                <div class="form-group">
                                    <label for="tagRelate">Tag for relate resources</label>
                                    <input type="text" class="form-control" id="tagRelate" name="tagRelate"
                                        placeholder="Resources" value="{{ $resource->relateTag->value }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

</script>
<script>
    $(document).ready(function () {
        $('#resource-content').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'table', 'video']],
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
            tabsize: 2,
            height: 500
        });
    });

</script>
@endpush
