<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <form action="" method="post" id="frmModalEdit"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="parent" value="36">
                    <div class="row">
                        <div class="form-group">
                            <label for="title">
                                <h6>Name</h6>
                            </label>
                            <input type="text" class="form-control" id="partnertitle" name="partner-title">
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="form-group">
                            <label for="content">
                                <h6>Descriptions</h6>
                            </label>
                            <input type="text" class="form-control" id="partnercontent" name="content">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="excerpt">
                                <h6>Website</h6>
                            </label>
                            <input type="text" class="form-control" id="partnerexcerpt" name="excerpt">
                        </div>
                    </div>
        
                    <div class="row align-items-center mb-4">
                        <div class="col text-center">
                            <div class="p-1 badge">
                                <img src="/images/not-found-icon.png" height="60" style="object-fit: contain;" alt=""
                                    id="edit-preview-icon">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-0">
                                <input type="file" class="form-control" name="image" 
                                onchange="readURL('#edit-preview-icon',this, null, 60)">
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
