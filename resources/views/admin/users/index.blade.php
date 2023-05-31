@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
    aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="get" id="frmModalDelete" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="title">
                                <h6>User</h6>
                            </label>
                            <input type="text" class="form-control" id="title-delete" name="title" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete User</button>
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

    <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
        <div class="row px-0">
            <div class="col">
                <h5 class="mb-0">Users</h5>
            </div>
        </div>
    </div>

    <div class="row" id="users-list-wrapper">
        <div class="col">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Users</h5>
                        @if (Request::is(['admin/user/membership']) === false)
                            <a href="{{ route('admin.users-list.create') }}" class="btn bg-gradient-dark btn-md">{{ 'Add New' }}</a>
                        @endif
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role </th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $user)
                                <tr>
                                    <td style="white-space: normal!important;">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="white-space: normal!important;">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->email }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="white-space: normal!important;">
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $user->getRoleNames()[0] ?? '' }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-end">
                                        @if (Request::is(['admin/user/membership']) === false)
                                            <div class="d-flex gap-3 justify-content-end">
                                                @if (count($users) > 1)
                                                <a href="#" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Delete" data-bs-toggle="modal"
                                                    data-bs-target="#modalDelete"
                                                    onclick="modalDelete({{$user}})">
                                                    Delete
                                                </a>
                                                @endif

                                                <a href="{{ route('admin.users-list.edit', $user) }}" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit">
                                                    Edit
                                                </a>
                                            </div>
                                        @endif
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
        function modalDelete(data) {
        let frmDelete = document.getElementById('frmModalDelete');
        if (frmDelete) {
            http://jalinhealth.test/admin/user/delete/1
            frmDelete.action = '/admin/user/delete/' + data.id;
        }

        let labelTitle = document.getElementById('title-delete');
        if (labelTitle) {
            labelTitle.value = data.name;
        }
    }
    </script>
@endpush