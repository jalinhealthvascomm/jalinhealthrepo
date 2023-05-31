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
        <div class="col-md-5 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">CTA Section Setting</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('home-setting.update', $homeSetting) }}" method="post" id="cta-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')   
                        <div class="form-group">
                            <label for="sectionTitle">Section Title</label>
                            <input type="text" class="form-control" id="sectionTitle" name="name"
                                placeholder="Section" value="{{ $homeSetting->name }}" readonly>
                        </div>

                        {{-- <div class="form-group">
                            <label for="sectionType">Type</label>
                            <select class="form-control" id="sectionType" name="type" disabled>
                                <option value="content" {{ $homeSetting->type == 'content' ? 'selected' : '' }}>Default</option>
                                <option value="hero" {{ $homeSetting->type == 'hero' ? 'selected' : '' }}>Hero</option>
                                <option value="card-list" {{ $homeSetting->type == 'card-list' ? 'selected' : '' }}>Card List</option>
                                <option value="content-side" {{ $homeSetting->type == 'content-side' ? 'selected' : '' }}>Content-Side</option>
                                <option value="cta" {{ $homeSetting->type == 'cta' ? 'selected' : '' }}>CTA</option>
                            </select>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Form Setting</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row px-2" id="hero-setting">
                        <div class="card py-2">
                            <h6 class="mb-2">CTA Content</h6>
                            <div class="form-group">
                                <label for="cta-title">CTA Title</label>
                                <input type="text" class="form-control" id="cta-title" name="cta-title"
                                    placeholder="CTA Title" value="{{ $ctaTitle ?? '' }}" form="cta-form"/>
                            </div>
                            <div class="form-group">
                                <label for="cta-description">CTA Description</label>
                                <input type="text" class="form-control" id="cta-description" name="cta-description"
                                    placeholder="CTA Description" value="{{ $ctaDescription  ?? ''}}" form="cta-form"/>
                            </div>
                        </div>
                        <div class="card my-4 py-2">
                            <h6 class="mb-2">CTA Button</h6>
                            <div class="form-group">
                                <label for="cta-title">Primary Button</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="cta-p-button-label" name="cta-p-button-label"
                                    placeholder="Secondary Button" value="{{ $ctaPrimaryButtonLabel ?? '' }}" form="cta-form"/>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="url" class="form-control" id="cta-p-button-url" name="cta-p-button-url"
                                    placeholder="https://" value="{{ $ctaPrimaryButtonUrl ?? '' }}" form="cta-form"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cta-description">Secondary Button</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="cta-s-button-label" name="cta-s-button-label"
                                    placeholder="Secondary Button" value="{{ $ctaSecondaryButtonLabel ?? '' }}" form="cta-form"/>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="url" class="form-control" id="cta-s-button-url" name="cta-s-button-url"
                                    placeholder="https://" value="{{ $ctaSecondaryButtonUrl ?? '' }}" form="cta-form"/>
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
@endsection
