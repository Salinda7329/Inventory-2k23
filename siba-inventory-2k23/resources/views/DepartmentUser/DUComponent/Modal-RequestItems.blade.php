{{-- mekedi palaweni input field ake a select karapu item aka (store table ake) name aka watenn oni item code aka etapasse edit karann bari wen vdiyata
auto watenn dann --}}


{{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalrequestitem">
    Request
</button> --}}

<!-- Modal -->
<div class="modal fade" id="modalrequestitem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalrequest">Request an Item</h5>
                <h5 class="modal-title" id="modalrequest">Request an Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form id="RequestItemForm" class="mb-3" method="POST" action="#">
                    @csrf
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input class="form-control" type="text" id="product_name" placeholder="" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="itemid" class="form-label">Item ID</label>
                        <input class="form-control" type="text" id="item_id" placeholder="" readonly />
                    </div>
                    <div class="mb-3">
                        <label for="itemname" class="form-label">Item Name</label>
                        <input class="form-control" type="text" id="item_name" placeholder="" readonly />
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="quentity" class="form-label">Quentity</label>
                            <input type="text" id="quentity" class="form-control" placeholder="" />
                        </div>
                        <div>
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" rows="3"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">request</button>
            </div>
            </form>
            <script>
                $(document).ready(function() {

                    // Add an event listener to the modal close button
                    $('.btn-close').on('click', function() {
                        // Reset the form when the close button is clicked
                        $('#RequestItemForm')[0].reset();
                        $('.input-error').hide();
                    });

                    //edit user button
                    $(document).on('click', '.requestItemButton', function(e) {
                        e.preventDefault();
                        let item_Id = $(this).attr('id');
                        // alert(id);

                        $.ajax({
                            url: '{{ route('item.edit') }}',
                            method: 'get',
                            data: {
                                item_Id: item_Id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {

                                console.log(response.po_no);
                                // Set id value to the hidden field
                                $('#item_id').val(response.id);
                                $('#item_name').val(response.item_name);
                                // Fetch product name using product_id
                                fetchProductName(response.product_id);
                            }


                        });


                    })


                    // Function to fetch product name using product_id
                    function fetchProductName(productId) {
                        $.ajax({
                            url: '{{ route('fetchProductDetails') }}',
                            method: 'get',
                            data: {
                                productId: productId,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $('#product_name').val(response.product_name);
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
</div>
