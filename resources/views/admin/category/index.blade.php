@extends('layouts.user_type.auth')

@section('content')
<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.store') }}" method="post" id="frmModalAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="category-label">
                                <h6>Category</h6>
                            </label>
                            <input type="text" class="form-control" id="category-label" name="title">
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
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="frmModalEdit"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="category-label">
                                <h6>Category</h6>
                            </label>
                            <input type="text" class="form-control" id="category-label-edit" name="title">
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
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
    aria-labelledby="modalDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Delete Category</h5>
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
                                <h6>Category</h6>
                            </label>
                            <input type="text" class="form-control" id="title-delete" name="title" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Delete Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert" 
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif

    <div class="mb-3 navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3 flex-column align-items-start">
        <div class="row px-0">
            <div class="col">
                <h5 class="mb-0">Resource Categories</h5>
            </div>
        </div>
    </div>


    @if ($categories)
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5>Categories</h5>
                            <button class="btn bg-gradient-dark btn-md" data-bs-toggle="modal"
                                data-bs-target="#modalAdd">{{ 'Add New' }}</button>
                        </div>
                    </div>
                    <div class="card-body pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $key => $category)
                                    <tr>
                                        <td style="white-space: normal!important;">
                                            <div class="px-2 py-1">
                                                <div class="d-flex gap-4 justify-content-start">
                                                    <h6 class="mb-0 text-sm">{{ $key + 1 }}</h6>
                                                    <h6 class="mb-0 text-sm">{!! $category->title !!}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle d-flex justify-content-end" style="gap: 24px;">
                                            @if (count($categories) > 1 && $category->id !== 1)
                                                @if ($category->postsCount < 1)
                                                <a href="#" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Delete" data-bs-toggle="modal"
                                                    data-bs-target="#modalDelete"
                                                    onclick="modalDelete({{$category}})">
                                                    Delete
                                                </a>
                                                @endif
                                            @endif
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit" data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"
                                                onclick="modalEdit({{$category}})">
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
    @endif

</div>
@endsection


@push('footer-js')
<script>
    function modalEdit(data) {
        let frmEdit = document.getElementById('frmModalEdit');
        if (frmEdit) {
            frmEdit.action = '/admin/categories/update/' + data.slug;
        }

        let editTitle = document.getElementById('category-label-edit');
        if (editTitle) {
            editTitle.value = data.title;
        }
    }
    function modalDelete(data) {
        let frmDelete = document.getElementById('frmModalDelete');
        if (frmDelete) {
            frmDelete.action = '/admin/categories/delete/' + data.slug;
        }

        let labelTitle = document.getElementById('title-delete');
        if (labelTitle) {
            labelTitle.value = data.title;
        }
    }
</script>
@endpush
