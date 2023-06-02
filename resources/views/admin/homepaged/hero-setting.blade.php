@extends('layouts.user_type.auth')

@push('tiny-mce-init')
<script src="https://cdn.tiny.cloud/1/ys0rrpfel6425sxv7jlqo3uauqxdmczlsqvms3nexgn2z323/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush

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
            <form action="{{ route('home-setting.update', $homeSetting) }}" method="post" id="hero-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="sectionTitle" name="name"
                    value="{{ $homeSetting->name }}">
                <div class="row mb-3">
                    <div class="col d-inline-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                    </div>
                </div>
        
                <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
                    <div class="row px-0">
                        <div class="col">
                            <h5 class="mb-0" style="text-transform: uppercase">{{$homeSetting->name}} Section Setting</h5>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Form Setting</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row" id="hero-setting">
                        <div class="">
                            <div class="form-group">
                                <label for="tinymce-headline">Hero Title</label>
                                <textarea style="display: none;" class="form-control" id="tinymce-headline" rows="3" name="heroContentHeadline" form="hero-form"> {{ $heroContentHeadline }} </textarea>
                            </div>

                            <div class="form-group sub-headline">
                                <label for="tinymce">Hero Content</label>
                                <textarea style="display: none;" class="form-control" id="tinymce" rows="3" name="content" form="hero-form"> {{ $heroContent }} </textarea>
                            </div>

                            <div class="form-group">
                                <label for="uploadimage">Upload Cover Image</label>
                                <input type="file" class="form-control" id="uploadimage" name="image" form="hero-form" 
                                onchange="readURL('#preview-image',this, null, 450)"/>
                            </div>
                            <div class="row mt-4">
                                <img id="preview-image" src="{{ url($heroImage) }}" />
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
                $(elementid).attr('src', e.target.result).width(width).height(height);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('textarea#tinymce').summernote({
                height: 150,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ],
            });
            $('textarea#tinymce').summernote('removeFormat');
            $('textarea#tinymce').summernote('formatPara');

            $('textarea#tinymce-headline').summernote({
                height: 150,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ],
            });
            $('textarea#tinymce-headline').summernote('removeFormat');
            $('textarea#tinymce-headline').summernote('formatH1');
        });
    </script>
@endpush