@extends('layouts.user_type.auth')

@section('content')
<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <form action="{{ route('admin.resource-setting.update', $siteContent) }}" method="post" id="frmProductDetail" enctype="multipart/form-data">
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
                    <h5 class="mb-0">{{ $siteContent->title }}</h5>
                </div>
            </div>
        </div>

        <div class="row mb-3" style="display: none;">
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
                                value="{{ $siteContent->title }}" readonly>
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <strong>Title</strong> required!
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0 ms-0" style="display: none!important;">
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

        <div class="row mb-3" style="display: none;">
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
                            <h6 class="mb-0">Content</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="side-content-excerpt" name="excerpt"
                                        value="{{ $siteContent->excerpt ?? 'Our Blog Is Launching Soon!' }}">
                                    @error('excerpt')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Contents</strong> required!
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="side-content-content" name="content"
                                        value="{{ $siteContent->content ?? 'We\'re working hard to bring you the latest and greatest insights on health business and tech industry. Check back soon for updates!' }}">
                                    @error('content')
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Contents</strong> required!
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
                            <h6 class="mb-0 px-2">Empty Image</h6>
                        </label>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group d-flex flex-row-reverse align-items-center gap-6">
                                    <input type="file" style="height: fit-content!important;" class="form-control" id="site-content-image-2" name="image2"
                                        onchange="readURL('#preview-image-2',this, null, 159)">
                                    <div class="row mt-4">
                                        <img id="preview-image-2" style="object-fit: contain; max-height: 182px; min-height: 159px" src="{{ url($siteContent->contentMetas[0]->value ?? '/images/not-found-icon.png') }}"
                                            alt="{{ $siteContent->title }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3" style="display: none!important;">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <label for="site-content-image">
                            <h6 class="mb-0 px-2">Header Image</h6>
                        </label>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-group">
                                    <input type="file" class="form-control" id="site-content-image" name="image"
                                        onchange="readURL('#preview-image',this, null, 336)" readonly>
                                    <div class="row mt-4">
                                        <img id="preview-image" style="max-height: 336px; object-fit: cover" src="{{ url($siteContent->image ?? '') }}"
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


</script>
@endpush
