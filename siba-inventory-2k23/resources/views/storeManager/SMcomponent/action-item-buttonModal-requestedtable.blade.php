<!-- Your existing modal -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalissueTitle">Process Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-xxl">
                    <!-- ... (your existing form content) ... -->
                    <div class="mb-3">
                        <label for="displayquentity1" class="form-label">User Request Type</label>
                        <input type="text" class="form-control" id="displayquentity1" readonly disabled>
                    </div>
                    <div class="row">
                        <!-- Left side -->
                        <div class="col-md-7">
                            <!-- ... (your existing form content) ... -->
                            <!-- Your first input field -->
                            <div class="mb-3">
                                <label for="itemcode" class="form-label">Enter Item ID</label>
                                <input type="text" class="form-control" id="itemcode" placeholder="Item code ..">
                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="col-md-5">
                            <!-- ... (your existing form content) ... -->
                            <!-- Your third input field -->
                            <div class="mb-3">
                                <label for="displayquentity1" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="displayquentity1" placeholder="">
                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="catagory">Action</label>
                        <select class="form-select" id="category_id1" name="category_id" aria-label="catagory">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Approve</option>
                            <option value="2">Reject</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>
                    <div class="mb-3">
                        <label for="comments" class="form-label">Remark</label>
                        <textarea class="form-control" id="comments" rows="3" placeholder="Add your comments here..."></textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
