<!-- Button to trigger the modal -->
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaleditproduct">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="modaleditproduct" tabindex="-1" aria-labelledby="modaleditproductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaleditproductLabel">Edit Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                            <div class="col-md-10">
                                <input class="form-control" type="time" value="12:30:00" id="html5-time-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Item Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="itemname" value="" id="html5-text-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Item Code</label>
                            <div class="col-md-10">
                                <input class="form-control" type="itemcode" value="" id="html5-text-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Quentity</label>
                            <div class="col-md-10">
                                <input class="form-control" type="quentity" value="" id="html5-text-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Brand</label>
                            <div class="col-md-10">
                                <input class="form-control" type="brand" value="" id="html5-text-input" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <!-- Move your buttons here -->
                        <button type="button" class="btn btn-info">Clear</button>
                        <button type="button" class="btn btn-success">Update</button>
                    </div>
                </div>
