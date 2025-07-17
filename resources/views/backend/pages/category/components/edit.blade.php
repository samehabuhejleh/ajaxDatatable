<!-- Modal -->
<div class="modal fade" id="editModalCategory" tabindex="-1" aria-labelledby="editModalCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalCategoryLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             <form id="edit-form-category" method="POST">
                            @CSRF
                            @method('PUT')
                             <div class="modal-body">
                                <input type="hidden" name="id" id="category-id">
                                <label style="color: rgb(0, 60, 255) ; margin-bottom:5px">Category Name <span
                                        style="color: red ; margin-bottom:5px">*</span></label>

                                <input class="form-control mb-3" type="text" name="name" id="name" >


                                <label style="color: rgb(0, 60, 255) ; margin-bottom:5px">Slug</label>

                                <input class="form-control mb-3" type="text" name="slug" id="slug">



                                <label style="margin-bottom:5px">Description</label>

                                <textarea class="form-control mb-3" type="text" id="description" name="description" rows="5" cols="50"></textarea>


                                <label style="margin-bottom:5px">Image</label>

                                <input class="form-control mb-3" type="text" name="image" id="image">


                                <label style="margin-bottom:5px">Meta Title</label>

                                <input class="form-control mb-3" type="text"
                                    name="meta_title" id="meta_title">


                                <label style="margin-bottom:5px">Meta Description</label>

                                <textarea class="form-control mb-3" type="text" id="meta_description" name="meta_description" rows="5" cols="50"></textarea>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
        </div>
    </div>
</div>