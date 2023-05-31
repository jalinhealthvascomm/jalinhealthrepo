@extends('layouts.user_type.auth')

@php
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );  
@endphp


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
            <form action="{{ route('home-setting.update', $homeSetting) }}" method="post" id="solution-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="sectionTitle" name="name" value="{{ $homeSetting->name }}">
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
        </div>
    </div>

    <div class="">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Form Setting</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <!--META FORM-->
                    <div class="row" id="solution-setting-headline">
                        <div class="col">
                            <label for="setting-solution-headline">Heading</label>
                            <div class="form-group">
                                <textarea id="setting-solution-headline" form="solution-form"
                                    name="section-headline">{{ $contentHeadline ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="solution-setting">
                        <div class="col">
                            <label for="setting-solution-title">Description</label>
                            <div class="form-group">
                                <textarea id="setting-solution-title" form="solution-form"
                                    name="section-title">{{ $content ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4" id="solution-cards">
                        <h6 for="setting-solution-title">Card Setting</h6>
                        <ul class="list-group">
                            {{-- CARD ITEM 1 --}}
                            <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="row">
                                    <div class="col">
                                        <div class="p-1 badge bg-gradient-secondary me-3 solution-icon">
                                            <img src="{{ url($solutionCardItem1->icon) }}" class="avatar avatar-sm"
                                            style="object-fit: contain;" alt="" id="preview-icon-1">
                                            @php
                                                // {!! file_get_contents(url($solutionCardItem1->icon), false, stream_context_create($arrContextOptions)) !!}
                                            @endphp
                                            
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input form="solution-form" type="file" class="form-control"
                                                name="solutionCardItem1Icon" onchange="readURL('#preview-icon-1',this, null, null)">
                                            @error('solutionCardItem1Icon')
                                            <div class="alert alert-danger" role="alert">
                                                Icon file type svg only
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">Card Label</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem1[content]" placeholder="Card 1 Title"
                                        value="{{$solutionCardItem1->content}}">
                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">URL</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem1[url]" placeholder="Card 1 url"
                                        value="{{$solutionCardItem1->url}}">
                                </div>
                            </li>

                            {{-- CARD ITEM 2 --}}
                            <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="row">
                                    <div class="col">
                                        <div class="p-1 badge bg-gradient-secondary me-3 solution-icon">
                                            <img src="{{ url($solutionCardItem2->icon) }}" class="avatar avatar-sm"
                                            style="object-fit: contain;" alt="" id="preview-icon-2">
                                            @php
                                                // {!! file_get_contents(url($solutionCardItem2->icon), false, stream_context_create($arrContextOptions)) !!}
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input form="solution-form" type="file" class="form-control"
                                                name="solutionCardItem2Icon" onchange="readURL('#preview-icon-2',this, null, null)">
                                            @error('solutionCardItem2Icon')
                                            <div class="alert alert-danger" role="alert">
                                                Icon file type svg only
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">Card Label</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem2[content]" placeholder="Card 2 Title"
                                        value="{{$solutionCardItem2->content}}">
                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">URL</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem2[url]" placeholder="Card 2 url"
                                        value="{{$solutionCardItem2->url}}">
                                </div>
                            </li>

                            {{-- CARD ITEM 3 --}}
                            <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="row">
                                    <div class="col">
                                        <div class="p-1 badge bg-gradient-secondary me-3 solution-icon">
                                            <img src="{{ url($solutionCardItem3->icon) }}" class="avatar avatar-sm"
                                            style="object-fit: contain;" alt="" id="preview-icon-3">
                                            @php
                                                // {!! file_get_contents(url($solutionCardItem3->icon), false, stream_context_create($arrContextOptions)) !!}
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input form="solution-form" type="file" class="form-control"
                                                name="solutionCardItem3Icon" onchange="readURL('#preview-icon-3',this, null, null)">
                                            @error('solutionCardItem3Icon')
                                            <div class="alert alert-danger" role="alert">
                                                Icon file type svg only
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">Card Label</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem3[content]" placeholder="Card 3 Title"
                                        value="{{$solutionCardItem3->content}}">
                                </div>
                                <div class="form-group">
                                    <label for="Card1Title">
                                        <h6 class="mb-0">URL</h6>
                                    </label>
                                    <input form="solution-form" type="text" class="form-control" id="Card1Title"
                                        name="solutionCardItem3[url]" placeholder="Card 3 url"
                                        value="{{$solutionCardItem3->url}}">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('footer-js')
<script type="text/javascript">

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
        $('#setting-solution-title').summernote({
                height: 150,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ],
            });
            $('#setting-solution-title').summernote('removeFormat');
            $('#setting-solution-title').summernote('formatPara');

            $('#setting-solution-headline').summernote({
                height: 150,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ],
            });

            $('#setting-solution-headline').summernote('removeFormat');
            $('#setting-solution-headline').summernote('formatH2');
    })

</script>
@endpush
