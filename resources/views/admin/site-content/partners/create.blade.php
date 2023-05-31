<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">New Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <form action="{{ route('admin.partners.store') }}" method="post" id="frmModalAdd"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="parent" value="36">
                    <div class="row">
                        <div class="form-group">
                            <label for="title">
                                <h6>Name</h6>
                            </label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="form-group">
                            <label for="content">
                                <h6>Descriptions</h6>
                            </label>
                            <input type="text" class="form-control" id="content" name="content">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="excerpt">
                                <h6>Website</h6>
                            </label>
                            <input type="text" class="form-control" id="excerpt" name="excerpt">
                        </div>
                    </div>
        
                    <div class="row align-items-center mb-4">
                        <div class="col text-center">
                            <div class="p-1 badge">
                                <img src="/images/not-found-icon.png" height="60" style="object-fit: contain;" alt=""
                                    id="preview-icon">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-0">
                                <input type="file" class="form-control" name="image" 
                                onchange="readURL('#preview-icon',this, null, 60)">
                                @error('image')
                                <div class="alert alert-danger" role="alert">
                                    <strong>Image icon</strong> required!
                                </div>
                                @enderror
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
