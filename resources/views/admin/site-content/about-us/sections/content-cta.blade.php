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

    <form action="{{ route('admin.about-us-sections.update', $siteContent->id) }}" method="post" id="frm" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col d-inline-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
            </div>
        </div>

        <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
            <div class="row px-0">
                <div class="col">
                    <h5 class="mb-0">About Us -- CTA Section -- {{ $siteContent->title }}</h5>
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
                        <label class="mb-0 ms-0" for="page-excerpt">
                            <h6 class="mb-0">Headline</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <input type="text" class="form-control" id="page-excerpt" name="excerpt" placeholder="Headline"
                                value="{{ $siteContent->excerpt ?? '' }}">
                            @error('excerpt')
                            <div class="alert alert-danger" role="alert">
                                <strong>Headline</strong> required!
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
                        <label class="mb-0 ms-0" for="side-content">
                            <h6 class="mb-0">Content</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <textarea style="display: none;" id="side-content"
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
    </form>

</div>
@endsection

@push('footer-js')
<script>

    $(document).ready(function () {
        $('#side-content').summernote({
            height: 250,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            styleTags: [{
                title: 'paragraph',
                tag: 'p',
                className: 'text-2xl text-white',
                value: 'p'
            }, ],
        });
        $('#side-content').summernote('paragraph');
    });
    

</script>
@endpush