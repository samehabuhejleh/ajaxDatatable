<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="create-form" enctype="multipart/form-data" class="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label  class="form-label pt-3" for="description">Description</label>
                            <input type="text"  class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label  class="form-label pt-3" for="stock">Stock</label>
                            <input type="number"  class="form-control" id="stock" name="stock">
                        </div>
                        <div class="form-group">
                            <label  class="form-label pt-3" for="price">Price</label>
                            <input  class="form-control" type="number" id="price" name="price">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>