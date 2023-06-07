@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Value Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/about-us/value-item/add" method="post" id="frmitemAdd" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="parent" name="parent" value="">
                    <div class="form-group">
                        <label for="value-title">
                            <h6>Value Name</h6>
                        </label>
                        <input type="text" class="form-control" id="value-title" name="value-title" placeholder="" value="">
                    </div>
                    <div class="row align-items-center mb-4">
                        
                        <div class="col">
                            <div class="form-group mb-0">
                                <input type="file" class="form-control" name="value-image" 
                                onchange="readURL('#preview-icon',this, null, null)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1 badge">
                                <img src="{{ url('/images/not-found-icon.png') }}" class="avatar avatar-md" style="object-fit: contain;" alt=""
                                    id="preview-icon">
                            </div>
                        </div>
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Value Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmitemEdit" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editId" name="editId" value="">
                    <div class="form-group">
                        <label for="EditTitle">
                            <h6>Value Name</h6>
                        </label>
                        <input type="text" class="form-control" id="EditTitle" name="value-title" placeholder="" value="">
                    </div>
                    <div class="row align-items-center mb-4">
                        
                        <div class="col">
                            <div class="form-group mb-0">
                                <input type="file" class="form-control" name="value-image" 
                                onchange="readURL('#edit-preview-icon',this, null, null)">
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1 badge">
                                <img src="" class="avatar avatar-md" style="object-fit: contain;" alt=""
                                    id="edit-preview-icon">
                            </div>
                        </div>
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

<!-- Modal Delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Value Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmitemDelete" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="deleteId" name="id" value="">
                    <div class="form-group">
                        <label for="title">
                            <h6>Value Name</h6>
                        </label>
                        <input type="text" class="form-control" id="deleteTitle" name="title" placeholder="" value="" readonly>
                        @error('title')
                        <div class="alert alert-danger" role="alert">
                            <strong>Title</strong> required!
                        </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@error('value-title')
<div class="alert alert-danger" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition>
    <strong>Title Value</strong> required!
</div>
@enderror

@error('value-image')
<div class="alert alert-danger" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
    x-show="show" x-transition>
    <strong>Image icon</strong> required!
</div>
@enderror

<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert" x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <form action="{{ route('admin.about-us-sections.update', $siteContent->id) }}" method="post" id="frm"
        enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col d-inline-flex justify-content-end">
                <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
            </div>
        </div>

        <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
            <div class="row px-0">
                <div class="col">
                    <h5 class="mb-0">About Us -- Section -- {{ $siteContent->title }}</h5>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0">
                        <label class="mb-0 ms-0" for="page-title">
                            <h6 class="mb-0">Title</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="page-title" name="title" placeholder="Title"
                                value="{{ $siteContent->title }}">
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                <strong>Title</strong> required!
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header pb-0">
                        <label class="mb-0 ms-0" for="side-content">
                            <h6 class="mb-0">Content</h6>
                        </label>
                    </div>
                    <div class="card-body py-2">
                        <div class="form-group">
                            <textarea style="display: none;" id="side-content" name="content">{!! $siteContent->content ?? '' !!}</textarea>
                            @error('content')
                            <div class="alert alert-danger" role="alert">
                                <strong>Descriptions</strong> required!
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    @empty(!$gridItems)
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Value Lists</h5>
                        <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                            data-bs-target="#modalAdd"
                            onclick="itemAdd({{$siteContent}})">{{ 'Add New' }}</button>
                    </div>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Values</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($gridItems as $key => $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex gap-4 justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                <div class="d-flex gap-4">
                                                    @if ($item->image)
                                                    <img src="{{ url('/' . $item->image) }}" alt="" style="height: 49px; width: 49px; object-fit: cover;">
                                                    @else
                                                    <img src="{{ url('/images/not-found-icon.png') }}" alt="" style="height: 49px; width: 49px; object-fit: cover;">
                                                    @endif
                                                    <h6 class="mb-0 text-sm">{{ $item->title }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-end">
                                        @if (count($gridItems) > 0)
                                        <a href="#" class="text-secondary font-weight-bold text-xs act-btn me-3"
                                            data-bs-toggle="modal" data-bs-target="#modalDelete"
                                            onclick="itemDelete({{$item}})">
                                            Delete
                                        </a>
                                        @endif

                                        <a href="#" class="text-secondary font-weight-bold text-xs act-btn"
                                            data-bs-toggle="modal" data-bs-target="#modalEdit"
                                            onclick="itemEdit({{$item}})">
                                            Edit
                                        </a>
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
    @endempty

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

    function itemAdd(item) {
        let addForm = document.getElementById('frmitemAdd');
        if (addForm) {
            addForm.action = '/admin/about-us/value-item/add';
        }
        let siteParentID = document.getElementById('parent');
        if (siteParentID) {
            siteParentID.value = item.id;
        }
    }

    function itemDelete(item) {
        let deleteForm = document.getElementById('frmitemDelete');
        if (deleteForm) {
            deleteForm.action = '/admin/about-us/value-item/delete';
        }
        let id = document.getElementById('deleteId');
        if (id) {
            id.value = item.id;
        }

        let title = document.getElementById('deleteTitle');
        if (title) {
            title.value = item.title;
        }
    }

    function itemEdit(item) {
    let EditForm = document.getElementById('frmitemEdit');
    if (EditForm) {
        EditForm.action = '/admin/about-us/value-item/update';
    }
    let id = document.getElementById('editId');
    if (id) {
        id.value = item.id;
    }

    let title = document.getElementById('EditTitle');
    if (title) {
        title.value = item.title;
    }

    let previewIcon = document.getElementById('edit-preview-icon');
    if (previewIcon) {
        previewIcon.src = '/' + item.image;
    }
}

    $(document).ready(function () {
        $('#side-content').summernote({
            height: 150,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

    $(document).ready(function () {
        $('#side-content').summernote({
            height: 250,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });

</script>
@endpush
