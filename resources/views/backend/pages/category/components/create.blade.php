<!-- Modal -->
<div class="modal fade" id="createModalCategory" tabindex="-1" aria-labelledby="createModalCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalCategoryLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <form id="create-form-category" method="POST">
                            @CSRF
                            <div class="card-body">
                                    <label style="margin-bottom:5px">Category Name <span
                                            style="color: red ; margin-bottom:5px">*</span></label>

                                    <input class="form-control mb-3" type="text" name="name">

                                    <label style="margin-bottom:5px">Slug</label>

                                    <input class="form-control mb-3" type="text" name="slug">

                                    <label style="margin-bottom:5px">Description</label>

                                    <textarea class="form-control mb-3" type="text" name="description" rows="5" cols="50"></textarea>


                                    <label style="margin-bottom:5px">Image</label>

                                    <input class="form-control mb-3" type="text" name="image">

                                    <label style="margin-bottom:5px">Meta Title</label>

                                    <input class="form-control mb-3" type="text" name="meta_title">

                                    <label style="margin-bottom:5px">Meta Description</label>

                                    <textarea class="form-control mb-3" type="text" name="meta_description" rows="5" cols="50"></textarea>

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                        </form>
        </div>
    </div>
</div>