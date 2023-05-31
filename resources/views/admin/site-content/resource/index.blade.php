@extends('layouts.user_type.auth')

@section('content')
@if(Session::has('saveSuccess'))
<div class="alert alert-success" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition>
    {{ Session::get('saveSuccess') }}
</div>
@endif
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
    aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Resource</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="resource-delete">
                    @csrf
                    <input type="hidden" id="delete-resource-id" name="id" value="">
                    <div class="row">
                        <p>are you sure to delete <span id="resource-title" style="font-weight: 600;"></span> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Resource</button>
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
                <h5 class="mb-0">Resources</h5>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Resources List</h5>
                        <a href="{{ route('admin.resources.create') }}" class="btn bg-gradient-dark btn-md">{{ 'New Resource' }}</a>
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
                                        Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($resources as $key => $resource)
                                <tr>
                                    <td class="">
                                        @if (!empty($resource->image))
                                        <img src="{{url($resource->image)}}" alt="{{$resource->title}}" width="100px" height="100px" style="object-fit: cover;">
                                        @else
                                        <img src="{{url('/images/not-found-icon.png')}}" alt="{{$resource->title}}" width="100px" height="100px" style="object-fit: cover;">
                                        @endif
                                        
                                    </td>
                                    <td class=" pt-0" style="white-space: normal!important; max-width: 430px;">
                                        <h6 class="mb-2"><a href="#">{{ $resource->title }}</a></h6>
                                        {{-- <div class="d-flex px-2">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <div>
                                                    <h6 class="mb-2"><a href="#">{{ $resource->title }}</a></h6>
                                                    <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                                        {!! $resource->content !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </td>
                                    <td class="">{{ $resource->resourceCategory->title ?? '' }}</td>
                                    <td class="">
                                        <div class="d-flex justify-content-end gap-3">
                                            
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                onclick="resourceDelete({{$resource}})">
                                                Delete
                                            </a>
                                            <a href="{{ route('admin.resources.edit', $resource) }}" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit Feature"
                                                >
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
    function resourceDelete(data){
        let frmDelete = document.getElementById('resource-delete');
        if (frmDelete) {
            frmDelete.action = '/admin/resources/delete/' + data.id;
        }
        let deleteID = document.getElementById('delete-resource-id');
        if (deleteID) {
            deleteID.value = data.id;
        }
        let deleteTitle = document.getElementById('resource-title');
        if (deleteTitle) {
            deleteTitle.innerText = data.title;
        }
    }
</script>

@endpush
