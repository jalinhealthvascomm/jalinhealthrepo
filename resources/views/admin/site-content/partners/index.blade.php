@extends('layouts.user_type.auth')

@section('content')
@if(Session::has('saveSuccess'))
<div class="alert alert-success" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition>
    {{ Session::get('saveSuccess') }}
</div>
@endif

@include('admin.site-content.partners.create')
@include('admin.site-content.partners.edit')

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
    aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="modal-delete">
                    @csrf
                    <input type="hidden" id="modal-resource-id" name="id" value="">
                    <div class="row">
                        <p>are you sure to delete <span id="modal-title" style="font-weight: 600;"></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Partner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="py-4">

    <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
        <div class="row px-0">
            <div class="col">
                <h5 class="mb-0">Partners</h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Parnter List</h5>
                        <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">{{ 'New Partner' }}</button>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Feature Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Website</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($partners as $key => $partner)
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        @if (!empty($partner->image))
                                        <img src="{{url($partner->image)}}" alt="{{$partner->title}}" width="80px" height="80px" style="object-fit: contain;">
                                        @else
                                        <img src="{{url('/images/not-found-icon.png')}}" alt="{{$partner->title}}" width="80px" height="80px" style="object-fit: contain;">
                                        @endif
                                        
                                    </td>
                                    <td class="align-top pt-0" style="white-space: normal!important;">
                                        <div class="d-flex px-2">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <div>
                                                    <h6 class="mb-2"><a href="#">{{ $partner->title }}</a></h6>
                                                    <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                        {!! $partner->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-top">{{ $partner->excerpt ?? '' }}</td>
                                    <td class="align-top">
                                        <div class="d-flex justify-content-end gap-3">
                                            
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                onclick="modalDelete({{$partner}})">
                                                Delete
                                            </a>
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"
                                                onclick="modalEdit({{$partner}})">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Empty</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">

                                    </td>
                                </tr>
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


    function modalEdit(data) {
        let frmEdit = document.getElementById('frmModalEdit');
        if (frmEdit) {
            frmEdit.action = '/admin/partners/' + data.id ;
        }

        let editTitle = document.getElementById('partnertitle');
        if (editTitle) {
            editTitle.value = data.title;
        }
        let editContent = document.getElementById('partnercontent');
        if (editContent) {
            editContent.value = data.content;
        }
        let editExcerpt = document.getElementById('partnerexcerpt');
        if (editExcerpt) {
            editExcerpt.value = data.excerpt;
        }
        let img = document.getElementById('edit-preview-icon');
        img.src = data.image ? '/' + data.image : '/images/not-found-icon.png';
    }
    function modalDelete(data){
        let frmDelete = document.getElementById('modal-delete');
        if (frmDelete) {
            frmDelete.action = '/admin/partners/delete/' + data.id;
        }
        let deleteID = document.getElementById('modal-resource-id');
        if (deleteID) {
            deleteID.value = data.id;
        }
        let deleteTitle = document.getElementById('modal-title');
        if (deleteTitle) {
            deleteTitle.innerText = data.title;
        }
    }
</script>

@endpush
