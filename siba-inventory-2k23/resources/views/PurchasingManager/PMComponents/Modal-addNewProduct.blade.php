<!-- Button to trigger the modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalAddnewproduct">
    Add New Product
</button>

<!-- Modal -->
<div class="modal fade" id="modalAddnewproduct" tabindex="-1" aria-labelledby="modalAddnewproductLabel" aria-hidden="true">
    <div class="modal-dialog"> <!-- Adjust the modal size as needed -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddnewproductLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label" for="po-number">Enter PO Number</label>
                    <input type="text" class="form-control" id="po-number" placeholder="" />
                </div>

                <!-- Dropdown menu on the left side -->
                <div class="mb-3">
                    <label class="form-label" for="catagory">Catagory</label>
                    <select class="form-select" id="catagory" aria-label="catagory">
                        <option selected>Select an option</option>
                        <option value="electronic">Electronic</option>
                        <option value="stationary">Stationary</option>
                        <option value="cleaning">Cleaning</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="catagory">Product Name</label>
                    <input type="text" class="form-control" id="productname" placeholder="" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
