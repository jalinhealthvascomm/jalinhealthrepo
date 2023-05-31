@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative min-vh-100 mt-1 border-radius-lg ">
    <div class="py-4">
        {{-- <div class="d-flex justify-content-end">
            <a class="btn bg-gradient-dark btn-md mt-4 mb-4"
                href="{{route('admin.solutions.create')}}">{{ 'Add New' }}</a>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                          <h6>Solutions</h6></th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solutions as $solution)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="p-1 badge bg-gradient-secondary me-3">
                                                        <img src="{{ url($solution->icon) }}" class="avatar avatar-sm"
                                                            style="object-fit: contain;" alt="user1">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $solution->title }}</h6>
                                                    <div class="text-xs text-secondary mb-0" style="white-space: normal">{!! $solution->description
                                                        !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-end">
                                            <a href="{{ route('admin.solutions.edit', $solution) }}" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
