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

    <form action="{{ route('admin.product-service.update' , $siteContent) }}" method="post" id="frmProductAndService"
        enctype="multipart/form-data">
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
                    <h5 class="mb-0">Product & Service</h5>
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
                        <label class="mb-0 ms-0" for="site-content-excerpt">
                            <h6 class="mb-0">Description</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <textarea id="site-content-excerpt"
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
                    <div class="card-header">
                        <label class="mb-0 ms-0" for="site-content-image">
                            <h6 class="mb-0">Image</h6>
                        </label>
                    </div>
                    <div class="card-body">
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
    </form>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <h6>Product And Service Cards</h6>
                                    </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siteContent->childs as $child)
                                <tr>
                                    <td>
                                        <div class="px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $child->title }}</h6>
                                                <p class="text-xs text-secondary mb-0">{!! $child->content
                                                    !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-end">
                                        <a href="{{ route('admin.product-service-card', $child) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                                @empty

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
        $('#site-content-excerpt').summernote({
            height: 150,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

</script>
@endpush
