@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    @if(Session::has('saveSuccess'))
        <div class="alert alert-success" role="alert"
        x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
            {{ Session::get('saveSuccess') }}
        </div>
    @endif
    <div class="row">
        <div class="col mt-4">
            <form action="{{ route('home-setting.update', $homeSetting) }}" method="post" id="content-side-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="sectionTitle" name="name"
                            value="{{ $homeSetting->name }}">
                        <div class="row mb-3">
                            <div class="col d-inline-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                            </div>
                        </div>

                        <div
                            class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
                            <div class="row px-0">
                                <div class="col">
                                    <h5 class="mb-0" style="text-transform: uppercase">{{$homeSetting->name}} Section
                                        Setting</h5>
                                </div>
                            </div>
                        </div>
                    </form>

            <div class="card mt-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Section Title</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="form-group">
                        <label for="tinymcetitle">Title</label>
                        <textarea class="form-control" id="tinymcetitle" rows="3" name="title"
                            form="content-side-form">{{ $homeSetting->title ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Form Setting</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <!--META FORM-->
                    <div class="row" id="content-side-setting">
                        <div class="">
                            <div class="form-group">
                                <label for="tinymce">Content</label>
                                <textarea class="form-control" id="tinymce" rows="3" name="content"
                                    form="content-side-form"> {{ $content ?? '' }} </textarea>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="image"
                                        form="content-side-form" id="imageRadio" name="media-setting" @php
                                            if ($setting == 'image') {
                                                echo 'checked';
                                            }
                                        @endphp>
                                        <label class="form-check-label" for="imageRadio">
                                          Image
                                        </label>
                                      </div>
                                </div>
                                  <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="video"
                                        form="content-side-form" id="videoRadio" name="media-setting" @php
                                            if ($setting == 'video') {
                                                echo 'checked';
                                            }
                                        @endphp>
                                        <label class="form-check-label" for="videoRadio">
                                          Video
                                        </label>
                                      </div>
                                  </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="uploadimage">Media Upload</label>
                                        <input type="file" class="form-control" id="uploadimage" name="image"
                                            form="content-side-form" onchange="readURL('#preview-image',this, 500, null)" />
                                            <p class="text-xs">{{$image}}</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="uploadimage" class="form-label">Youtube Iframe</label>
                                        <textarea class="form-control" id="uploadimage" rows="3" 
                                        form="content-side-form" name="youtubeiframe">
                                            {{ $video ?? '' }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="uploadimage">Media Upload</label>
                                <input type="file" class="form-control" id="uploadimage" name="image"
                                    form="content-side-form" onchange="readURL('#preview-image',this, 500, null)" />
                            </div> --}}
                            <div class="row mt-6">
                                
                                @if ($setting == 'video')
                                {!! $video ?? '' !!}
                                @else
                                <img id="preview-image" src="{{ url($image) }}" height="500"
                                    style="height: 500px; object-fit: contain" />
                                @endif
                                
                            </div>
                        </div>
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
                $(elementid).attr('src', e.target.result).width('100%').height(height);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<script>
    $(document).ready(function () {
        $('textarea#tinymce').summernote({
            height: 250,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            styleTags: [{
                title: 'Heading',
                tag: 'h3',
                className: 'effect-1 text-navy',
                value: 'h3'
            }, ],
        });
        $('#tinymce').summernote('justifyLeft');
        $('#tinymce').summernote('Heading');

        $('textarea#tinymcetitle').summernote({
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            styleTags: [{
                title: 'Heading',
                tag: 'h4',
                className: 'effect-1 text-navy',
                value: 'h4'
            }, ],
        });
        $('#tinymcetitle').summernote('justifyLeft');
        $('#tinymcetitle').summernote('Heading');
    });

</script>
@endpush
