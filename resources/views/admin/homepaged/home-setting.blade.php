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
        <div class="coll mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Jalin Health - Seo Meta</h6>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/home-setting/seometa/update')}}" method="post">
                        @csrf  
                        <div class="form-group">
                            <label for="seoTitle">Meta Title</label>
                            <input type="hidden" value="{{ $metaTitle->id ?? '' }}" name="seoTitleId">
                            <input type="text" class="form-control" id="seoTitle" name="seoTitle"
                                placeholder="SEO Meta Title" value="{{ $metaTitle->title ?? '' }}">
                            @error('seoTitle')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Seo Meta Title</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seoDescriptions">Meta Descriptions</label>
                            <input type="hidden" value="{{ $metaDesc->id ?? '' }}" name="seoDescriptionsId">
                            <input type="text" class="form-control" id="seoDescriptions" name="seoDescriptions"
                                placeholder="SEO Meta Descriptions" value="{{ $metaDesc->title ?? '' }}">
                            @error('seoDescriptions')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Seo Meta Descriptions</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="seoKeywords">Meta Keywords</label>
                            <input type="hidden" value="{{ $metaKeywords->id ?? '' }}" name="seoKeywordsId">
                            <input type="text" class="form-control" id="seoKeywords" name="seoKeywords"
                                placeholder="SEO Meta Keywords" value="{{ $metaKeywords->title ?? '' }}">
                            @error('seoKeywords')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Seo Meta Keywords</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (!empty($contactUs->contentMetas))
    <div class="row">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Contact</h6>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/home-setting/contact-us/update')}}" method="post">
                        @csrf  
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="hidden" value="{{ $contactUs->contentMetas[0]->id ?? '' }}" name="contact_email">
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="admin@mail.com" value="{{ $contactUs->contentMetas[0]->value ?? '' }}">
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Contact Email</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="hidden" value="{{ $contactUs->contentMetas[1]->id ?? '' }}" name="contact_phone">
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="123456" value="{{ $contactUs->contentMetas[1]->value ?? '' }}">
                            @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Contact phone</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="hidden" value="{{ $contactUs->contentMetas[2]->id ?? '' }}" name="contact_address">
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="address" value="{{ $contactUs->contentMetas[2]->value ?? '' }}">
                            @error('address')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Contact address</strong> required!
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="map">Map Embed</label>
                            <input type="hidden" value="{{ $contactUs->contentMetas[3]->id ?? '' }}" name="contact_map">
                            {{-- <input type="text" class="form-control" id="address" name="address"
                                placeholder="address" value="{{ $contactUs->contentMetas[2]->value ?? '' }}"> --}}
                             style="display: none;" class="form-control" name="map" id="map" cols="30" rows="5">{{ $contactUs->contentMetas[3]->value ?? '' }}</textarea>
                             <textarea  class="form-control" name="map" id="map" cols="30" rows="5">{{ $contactUs->contentMetas[3]->value ?? '' }}</textarea>
                            @error('map')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Contact address</strong> required!
                                </div>
                            @enderror
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if (!empty($sosmed))
        <div class="row">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Social Media</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/home-setting/social-media/update')}}" method="post">
                            @csrf
                            @foreach ($sosmed as $item)
                            <div class="form-group">
                                <label for="{{ $item->key }}">{{ ucwords(str_replace('sosmed-', '', $item->key)) }}</label>
                                <input type="hidden" value="{{ $item->id }}" name="{{$item->key . '-id'}}">
                                <input type="url" class="form-control" id="{{ $item->key . '-' . $item->id}}" name="{{ $item->key }}"
                                    placeholder="https://jalinhealth.com" value="{{ $item->value }}">
                                @error($item->key)
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ ucwords(str_replace('sosmed-', '', $item->key)) }}</strong> required!
                                    </div>
                                @enderror
                            </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
 
    {{-- <div class="row">
        <div class="col mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Landing Page Setting</h6>
                    <div class="d-flex justify-content-end">
                        <a class="btn bg-gradient-dark btn-md mt-4 mb-4"
                            href="{{ route('home-setting.create') }}">{{ 'Add New Section' }}</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div> --}}
</div>
@endsection
