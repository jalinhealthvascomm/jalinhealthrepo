@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative min-vh-100 mt-1 border-radius-lg ">
    <div class="py-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-4">
                    <div class="pb-0">
                        <h3>New Solution</h3>
                    </div>
                    <div class="px-2 pt-4 pb-2">
                        <form action="{{route('admin.solutions.store')}}" method="post" id="solution-create" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col d-inline-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group card px-3 py-4">
                                    <label for="solution-title"><h6>Solution Title</h6></label>
                                    <input type="text" class="form-control" id="solution-title" name="title"
                                        placeholder="Solution" value="">
                                </div>
                            </div>
                            <div class="row gx-5 mb-6" style="gap: 10px;">
                                <div class="col px-3">
                                    <div class="form-group card px-3 py-4">
                                        <label for="solution-description"><h6>Description</h6></label>
                                        <textarea style="display: none;" id="solution-description" name="description"></textarea>
                                    </div>

                                    <div class="form-group card px-3 py-4">
                                        <label for="solution-detail"><h6>Detail</h6></label>
                                        <textarea style="display: none;" id="solution-detail" name="detail"></textarea>
                                    </div>
                                </div>

                                <div class="col px-3">
                                    <div class="card">
                                        <div class="row px-3">
                                            <div class="col">
                                                <div class="form-group py-4">
                                                    <label for="solution-icon"><h6>Icon</h6></label>
                                                    <input type="file" class="form-control" id="solution-icon" name="icon" onchange="readURL('#preview-icon',this, null, 60)">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <img id="preview-icon" src="#" alt="" />
                                            </div>
                                        </div>
                                        <div class="form-group px-3 py-4">
                                            <label for="solution-image"><h6>Image</h6></label>
                                            <input type="file" class="form-control" id="solution-image" name="image" onchange="readURL('#preview-image',this, null, 200)">
                                            <div class="row mt-4">
                                                <img id="preview-image" src="#" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
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
        $(document).ready(function() {
            $('#solution-description').summernote({
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
            $('#solution-detail').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['forecolor']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endpush
