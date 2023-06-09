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

    <form action="{{ route('admin.product-service-card-update' , $siteContent) }}" method="post" id="frmCardProductAndService"
        enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col d-inline-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
                    <div class="ps-0 d-flex justify-content-between" style="width: 100%;">
                        <a href="{{ route('admin.product-service.index') }}"><i class="fas fa-arrow-left text-sm ms-1" aria-hidden="true"></i></a>
                        <h5 class="mb-0">{{ $siteContent->title }} Card Setting</h5>
                    </div>
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0">
                        <label class="mb-0 ms-0" for="site-content-content">
                            <h6 class="mb-0">Description</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <textarea style="display: none;" id="site-content-content"
                                name="content">{!! $siteContent->content ?? '' !!}</textarea>
                            @error('content')
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
                        <div class="row">
                            <div class="col">
                                <div class="form-group py-4">
                                    <label for="card-icon">
                                        <h5>Icon</h5>
                                    </label>
                                    <input type="file" class="form-control" id="card-icon"
                                        name="image"
                                        onchange="readURL('#preview-icon',this, null, 60)">
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        Icon file type svg only
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col" style="max-width: 80px; max-height: 80px;">
                                <div class="p-1 badge bg-gradient-secondary me-3"
                                    style="margin-top:62px;">
                                    <img id="preview-icon" src="{{ url($siteContent->image) ?? '' }}"
                                        alt="{{ $siteContent->title }}" class="avatar avatar-sm"
                                        style="object-fit: contain;">
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

    $(document).ready(function () {
        $('#site-content-content').summernote({
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