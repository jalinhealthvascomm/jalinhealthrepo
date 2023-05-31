@extends('layouts.user_type.auth')

@section('content')

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="delete-item" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="delete-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="delete-name">
                                <h6>Name</h6>
                            </label>
                            <input type="text" class="form-control" id="delete-name" placeholder="" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="delete-phone">
                                <h6>Phone</h6>
                            </label>
                            <input type="text" class="form-control" id="delete-phone" placeholder="" value="" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="delete-email">
                                <h6>Phone</h6>
                            </label>
                            <input type="text" class="form-control" id="delete-email" placeholder="" value="" readonly>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <div class="row mb-4">
        <div class="col">
            <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
                <div class="ps-0 d-flex justify-content-between" style="width: 100%;">
                    <a href="/dashboard"><i class="fas fa-arrow-left text-sm ms-1"
                            aria-hidden="true"></i></a>
                    <h5 class="mb-0">Schedule Demo Submited</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="servicefeaturewrapper">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Schedule Demo</h5>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Request Info </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Organization type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Inquiry subject</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Message</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($scheduleDemos as $key => $scheduleDemo)
                                <tr class="{{ $scheduleDemo->read === 0 ? 'table-info' : '' }}">
                                    <td class="align-top">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{ $scheduleDemo->name }}</h6>
                                                    <div class="d-flex gap-2">
                                                        <p class="mb-0 text-sm" style="width: 50px;">Phone</p>
                                                        <p class="mb-0 text-sm">: {{ $scheduleDemo->phone }}</p>
                                                    </div>

                                                    <div class="d-flex gap-2">
                                                        <p class="mb-0 text-sm" style="width: 50px;">Email</p>
                                                        <p class="mb-0 text-sm">: {{ $scheduleDemo->email }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->organization }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->inquiry }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <div>
                                            {!! $scheduleDemo->message !!}
                                        </div>
                                    </td>
                                    <td class="align-top">
                                        <div class="d-flex gap-4 justify-content-end">
                                            <a href="#"
                                                class="text-secondary font-weight-bold text-xs" 
                                                data-toggle="tooltip"
                                                data-original-title="Delete Feature"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalDelete"
                                                onclick="itemDelete({{$scheduleDemo}})">
                                                Delete
                                            </a>
                                            @if ($scheduleDemo->read < 1) 
                                                <a href="{{ url('admin/request-demo/active/' . $scheduleDemo->id) }}"
                                                    class="text-secondary font-weight-bold text-xs">
                                                    Mark As Read
                                                </a>
                                                @endif
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
    function itemDelete(item) {
        let editSelectItemForm = document.getElementById('delete-item');
        if (editSelectItemForm) {
            editSelectItemForm.action = 'request-demo/delete/' + item.id;
        }
        let id = document.getElementById('delete-id');
        if (id) {
            id.value = item.id;
        }
        let name = document.getElementById('delete-name');
        if (name) {
            name.value = item.name;
        }
        let phone = document.getElementById('delete-phone');
        if (phone) {
            phone.value = item.phone;
        }
        let email = document.getElementById('delete-email');
        if (email) {
            email.value = item.email;
        }
    }

</script>
@endpush
