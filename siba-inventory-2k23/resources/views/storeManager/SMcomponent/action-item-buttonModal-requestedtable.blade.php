<!-- Your existing modal -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActionTitle">Process Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createProductsForm" class="mb-3" method="POST" action="#">
                    @csrf

                    {{-- hiidden field to store user_id --}}
                    <input type="text" value="{{ Auth::user()->id }}" name="store_manager"
                        id="store_manager_id_hidden" hidden>

                    <div class="container-xxl">
                        <!-- ... (your existing form content) ... -->
                        <div class="mb-3">
                            <label for="type1" class="form-label">User Request Type</label>
                            <input type="text" class="form-control" id="type1" name="type" readonly disabled>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="type1" class="form-label">Requested Item ID</label>
                                    <input type="text" class="form-control" id="item_user1" name="item_user1"
                                        readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="type1" class="form-label">Requested Quantity</label>
                                    <input type="text" class="form-control" id="quantity_user1" name="quantity_user"
                                        readonly disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="type1" class="form-label">Request Remark</label>
                            <input type="text" class="form-control" id="user_remark1" name="user_remark" readonly
                                disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status1">Action</label>
                            <select class="form-select" id="status1" name="status" aria-label="catagory">
                                <option disabled selected hidden>Select an option</option>
                                <option value="2">Approve</option>
                                <option value="3">Reject</option>
                            </select>
                            <div class="input-error text-danger" style="display: none"></div>
                        </div>
                        <div class="row">
                            <!-- Left side -->
                            <div class="col-md-7">
                                <!-- ... (your existing form content) ... -->
                                <!-- Your first input field -->
                                <div class="mb-3">
                                    <label for="item_id1" class="form-label">Enter Item ID</label>
                                    <input type="text" class="form-control" id="item_id1" name="item_id"
                                        placeholder="Item ID..">
                                </div>
                            </div>

                            <!-- Right side -->
                            <div class="col-md-5">
                                <!-- ... (your existing form content) ... -->
                                <!-- Your third input field -->
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="quantity1" name="quantity"
                                        placeholder="">
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="comments" class="form-label">Remark</label>
                            <textarea class="form-control" id="sm_remark1" name="sm_remark" rows="3" placeholder="Add your comments here..."></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                id="btnClose">Close</button>
                            <button type="submit" id="createNewProduct" class="btn btn-primary">Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                $(document).ready(function() {
                    //edit user button ( role,department,isActive)
                    $(document).on('click', '.actionRequestButton', function(e) {
                        e.preventDefault();
                        let request_id = $(this).attr('id');
                        // alert(request_id);

                        $.ajax({
                            url: '{{ route('dataForProcessModal') }}',
                            method: 'get',
                            data: {
                                request_id: request_id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {

                                console.log(response.type);
                                // Set id value to the hidden field
                                if (response.type == 1) {
                                    $('#type1').val("Requesting");
                                    // Set color to red when type is 1
                                    $('#type1').css('color', 'red');
                                } else {
                                    $('#type1').val("Returning");
                                    // Set color to green when type is not 1
                                    $('#type1').css('color', 'green');
                                }
                                $('#modalActionTitle').text("Process Request - ID " + response.id);
                                $('#item_user1').val(response.item_user);
                                $('#quantity_user1').val(response.quantity_user);
                                $('#user_remark1').val(response.user_remark);

                            }


                        });


                    })
                });
            </script>
        </div>
    </div>
</div>
