@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative min-vh-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-4">
                    <div class="pb-0">
                        <h3>Update Feature - {{ $feature->features }}</h3>
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        <form action="{{ route('admin.feature.update', $feature) }}" method="post" id="feature-edit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label for="sub-solution-title">
                                        <h6>Feature</h6>
                                    </label>
                                    <input type="text" class="form-control" id="feature-title" name="features"
                                        placeholder="Feature" value="{{ $feature->features }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label for="sub-solution-title">
                                        <h6>Description</h6>
                                    </label>
                                    <textarea style="display: none;" id="feature-description" name="description">{!! $feature->description !!}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="/admin/solutions/{{ $feature->sub_solution()->first()->solution_id }}/sub-solution/{{ $feature->sub_solution_id }}" class="btn bg-gradient-secondary">Back</a>
                                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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

</script>
<script>
    $(document).ready(function () {
        $('#feature-description').summernote({
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['forecolor']],
                ['insert', ['link']]
            ],
            styleTags: [
            'p',
                { title: 'Title with bullet', tag: 'p', className: 'title-bullet', value: 'p' },
            ],
        });
    });

</script>
@endpush
