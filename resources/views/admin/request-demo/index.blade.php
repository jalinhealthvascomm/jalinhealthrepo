@extends('layouts.user_type.auth')

@section('content')

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Detail Request Demo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a href="#"
                    class="text-secondary font-weight-bold text-xs mark-as-read">
                    Mark As Read
                </a>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="detail-message" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="detail-id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <label for="detail-name" style="margin-bottom: 0!important;">
                                <h6>Name</h6>
                            </label>
                            <input type="text" class="form-control" id="detail-name" placeholder="" value="" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="detail-phone" style="margin-bottom: 0!important;">
                                <h6>Phone</h6>
                            </label>
                            <input type="text" class="form-control" id="detail-phone" placeholder="" value="" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="detail-email" style="margin-bottom: 0!important;">
                                <h6>Phone</h6>
                            </label>
                            <input type="text" class="form-control" id="detail-email" placeholder="" value="" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="detail-date" style="margin-bottom: 0!important;">
                                <h6>Date</h6>
                            </label>
                            <input type="text" class="form-control" id="detail-date" placeholder="" value="" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <p>Message : </p>
                            <p class="message"></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-gradient-primary">Delete Request</button>
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
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
                                        Name </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Organization type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Inquiry subject</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Submit Date</th>
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
                                                <a href="#"
                                                    class="text-secondary font-weight-bold text-xs" 
                                                    data-toggle="tooltip"
                                                    data-original-title="Detail Request Demo"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"
                                                    onclick="showDetail({{$scheduleDemo}})">
                                                    <h6 class="mb-0 text-sm">{{ $scheduleDemo->name }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->email }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->phone }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->organization }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->inquiry }}</p>
                                    </td>
                                    <td class="align-top" style="white-space: normal!important;">
                                        <p>{{ $scheduleDemo->created_at }}</p>
                                    </td>
                                    <td class="align-midle">
                                        <a href="#"
                                                    class="text-secondary font-weight-bold text-xs" 
                                                    data-toggle="tooltip"
                                                    data-original-title="Detail Request Demo"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalDetail"
                                                    onclick="showDetail({{$scheduleDemo}})">
                                                    Detail
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

    function showDetail(item){
        let editSelectItemForm = document.getElementById('detail-message');
        if (editSelectItemForm) {
            editSelectItemForm.action = 'request-demo/delete/' + item.id;
        }
        let id = document.getElementById('detail-id');
        if (id) {
            id.value = item.id;
        }
        let name = document.getElementById('detail-name');
        if (name) {
            name.value = item.name;
        }
        let phone = document.getElementById('detail-phone');
        if (phone) {
            phone.value = item.phone;
        }
        let email = document.getElementById('detail-email');
        if (email) {
            email.value = item.email;
        }

        let detaildate = document.getElementById('detail-date');
        if (detaildate) {
            let dateFormat = new Date(item.created_at);
            
            detaildate.value = dateFormat.toLocaleString();
        }

        let message = document.querySelector('p.message');
        if (message) {
            message.innerText = item.message;
        }

        let asRead = document.querySelector('.mark-as-read');

        if (asRead && item.read < 1) {
            asRead.href = '/admin/request-demo/active/' + item.id;
            asRead.style.display='block';
        }else{
            asRead.href = '#';
            asRead.style.display='none';
        }
    }

</script>
@endpush
