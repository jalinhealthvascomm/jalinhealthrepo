@extends('layouts.user_type.auth')

@push('addheader')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<style>
    span.select2-container--default .select2-selection--single{
        border: unset;
    }
    span.select2-selection__rendered {
        border: 1px solid #d2d6da;
        border-radius: 4px;
        padding: 0.5rem;
        border-radius: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top: 50%!important;
        transform: translateY(-15%);
    }
    .select2-container--open .select2-dropdown--below{
        top: 5px;
        border-left: 1px solid #d2d6da;
        border-right: 1px solid #d2d6da;
        border-bottom: 1px solid #d2d6da;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    input.select2-search__field:focus {
        outline-color: transparent;
    }
</style>
@endpush



@section('content')
<div class="py-4">
    @if(Session::has('saveSuccess'))
    <div class="alert alert-success" role="alert"
    x-data="{ show: true}" x-init="setTimeout(()=>{show=false;}, 3000)"
        x-show="show" x-transition>
        {{ Session::get('saveSuccess') }}
    </div>
    @endif
</div>

<div class="row mb-4">
    <div class="col">
        <div class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-3">
            <div class="ps-0 d-flex justify-content-between" style="width: 100%">
                <a href="{{ route('admin.users-list.administrator') }}"><i class="fas fa-arrow-left text-sm ms-1"
                        aria-hidden="true"></i></a>
                <h5 class="mb-0">New User</h5>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <form action="{{ route('admin.users-list.store') }}" method="POST">
            @csrf
            <input type="hidden" name="backurl" value="{{ url()->previous() }}">
            <div class="card">
                <div class="card-header">
                    <h5>Create New User</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">
                            <h6 class="mb-0">Name</h6>
                        </label>
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name"
                            aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">
                            <h6 class="mb-0">Email</h6>
                        </label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                            aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                        @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">
                            <h6 class="mb-0">Password</h6>
                        </label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                            aria-label="Password" aria-describedby="password-addon">
                        @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="row mt-5 mb-2">
                        <div class="col">
                            <h5>User Role</h5>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="role" value="administrator">
                            {{-- <select class="role-select form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="role">
                                @forelse ($availableRoles as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @empty

                                @endforelse
                            </select> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @error('role')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn bg-gradient-primary mb-0">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('footer-js')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.role-select').select2();
        });
    </script>
@endpush