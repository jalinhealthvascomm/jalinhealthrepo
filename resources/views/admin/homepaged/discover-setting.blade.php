@extends('layouts.user_type.auth')


@section('content')
<div class="modal fade" id="modalDiscoverItemEdit" tabindex="-1" role="dialog" aria-labelledby="modalDiscoverItemEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Discover Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmDiscoverItemEdit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editItemId" name="id" value="">
                    <div class="form-group">
                        <label for="editItemLabel">
                            <h6>Label</h6>
                        </label>
                        <input type="text" class="form-control" id="editItemLabel" name="discoverValue"
                            placeholder="Discover" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDiscoverItemEditWithTarget" tabindex="-1" role="dialog" aria-labelledby="modalDiscoverItemEditWithTarget"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Discover Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmDiscoverItemWithTargetEdit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editItemWithTargetId" name="id" value="">
                    <div class="form-group">
                        <label for="editItemLabel">
                            <h6>Label</h6>
                        </label>
                        <input type="text" class="form-control" id="editItemWithTargetLabel" name="discoverValue"
                            placeholder="Discover" value="">
                    </div>
                    <div class="form-group">
                        <label for="editItemTarget">
                            <h6>Target Url</h6>
                        </label>
                        <input type="text" class="form-control" id="editItemWithTargetTarget" name="discoverTarget"
                            placeholder="{{ ENV('APP_URL') }}" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <div class="row mb-4">
        <div class="col mt-4">
            <form action="" method="post" id="discover-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
    @forelse ($discovers as $discover)
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Discover - {{ $discover->title }}</h5>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Select Items</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($discover->discoverItems as $key => $discoverItem)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <div>
                                                    <h6 class="mb-0 text-sm">{{ $discoverItem->value }}</h6>
                                                    @if ($discover->name == 'discover-3-with-target')
                                                    <h6 class="mb-0 text-sm">URL - {{ $discoverItem->target }}</h6>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-end">
                                        @if ($discover->name != 'discover-3-with-target')
                                        <a 
                                            href="#"
                                            class="text-secondary font-weight-bold text-xs act-btn"
                                            data-bs-toggle="modal" data-bs-target="#modalDiscoverItemEdit"
                                            onclick="discoverItemEdit({{$discoverItem}})">
                                            Edit
                                        </a>
                                        @else
                                        <a 
                                            href="#"
                                            class="text-secondary font-weight-bold text-xs act-btn"
                                            data-bs-toggle="modal" data-bs-target="#modalDiscoverItemEditWithTarget"
                                            onclick="discoverItemWithTargetEdit({{$discoverItem}})">
                                            Edit
                                        </a>
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
    @empty
    <div class="d-flex px-2 py-1">
        <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">Empty</h6>
        </div>
    </div>
    @endforelse
</div>
@endsection

@push('footer-js')
<script>
    function discoverItemEdit(discoverItem) {
        let editDiscoverForm = document.getElementById('frmDiscoverItemEdit');
        if (editDiscoverForm) {
            editDiscoverForm.action = '/admin/discover-item/update/' + discoverItem.id;
        }
        let editID = document.getElementById('editItemId');
        if (editID) {
            editID.value = discoverItem.id;
        }
        let editTitle = document.getElementById('editItemLabel');
        if (editTitle) {
            editTitle.value = discoverItem.value;
        }
    }
    function discoverItemWithTargetEdit(discoverItem) {
        let editDiscoverForm = document.getElementById('frmDiscoverItemWithTargetEdit');
        if (editDiscoverForm) {
            editDiscoverForm.action = '/admin/discover-item/update/' + discoverItem.id;
        }
        let editID = document.getElementById('editItemWithTargetId');
        if (editID) {
            editID.value = discoverItem.id;
        }
        let editTitle = document.getElementById('editItemWithTargetLabel');
        if (editTitle) {
            editTitle.value = discoverItem.value;
        }

        let editTarget = document.getElementById('editItemWithTargetTarget');
        if (editTarget) {
            editTarget.value = discoverItem.target;
        }
    }

</script>
@endpush
