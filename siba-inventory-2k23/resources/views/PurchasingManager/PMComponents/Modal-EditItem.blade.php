<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modaledititem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="UpdateItemDetailsForm" class="mb-3" method="POST" action="#">
                    @csrf

                    {{-- hidden id input field --}}
                    <input type="hidden" id="item_Id_hidden" name="item_Id_hidden">

                    <div class="mb-3">
                        <label for="po_no" class="form-label">PO Number</label>
                        <input type="text" class="form-control" id="po_no1" name="po_no"
                            placeholder="Enter your PO Number" :value="old('po_no')" required autofocus
                            autocomplete="po_no" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="product_name">Product Name</label>
                        <select class="form-select" id="product_id1" name="product_id" aria-label="product_name">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Electronic</option>
                            <option value="2">Stationary</option>
                            <option value="3">Cleaning</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="brand_name">Brand Name</label>
                        <select class="form-select" id="brand_id1" name="brand_id" aria-label="brand_name">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Electronic</option>
                            <option value="2">Stationary</option>
                            <option value="3">Cleaning</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="catagory">Item Name</label>
                        <input type="text" class="form-control" id="item_name1" name="item_name"
                            placeholder="Enter Item Name" />
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="condition">Condition</label>
                        <select class="form-select" id="condition1" name="condition" aria-label="condition">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Working</option>
                            <option value="2">Damaged</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="items_remaining">Item Count</label>
                        <input type="text" class="form-control" id="items_remaining1" name="items_remaining"
                            placeholder="Enter Item Count" />
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="lower_limit">Lower Limit</label>
                        <input type="text" class="form-control" id="lower_limit1" name="lower_limit"
                            placeholder="Enter Lower Limit" />
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <button class="btn btn-primary d-grid w-100" id="Update_product_button">Update</button>
                </form>

                <script>
                    $(document).ready(function() {

                        // Add an event listener to the modal close button
                        $('.btn-close').on('click', function() {
                            // Reset the form when the close button is clicked
                            $('#UpdateItemDetailsForm')[0].reset();
                            $('#password-error').hide();
                            $('.input-error').hide();
                        });

                        //edit user button
                        $(document).on('click', '.editItemButton', function(e) {
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
                                    $('#item_Id_hidden1').val(response.id);
                                    $('#po_no1').val(response.po_no);
                                    $('#product_id1').val(response.product_id);
                                    $('#brand_id1').val(response.brand_id);
                                    $('#item_name1').val(response.item_name);
                                    $('#condition1').val(response.condition);
                                    $('#items_remaining1').val(response.items_remaining);
                                    $('#lower_limit1').val(response.lower_limit);

                                }


                            });


                        })

                        function fetchAllProductData() {
                            $.ajax({
                                url: '{{ route('fetchAllItemData') }}',
                                method: 'get',
                                success: function(response) {
                                    // console.log(response);
                                    $('#show_all_product_data').html(response);
                                    // //Make table a data table
                                    $('#all_user_data').DataTable({

                                        // Enable horizontal scrolling
                                    });
                                }


                            });
                        }

                        //Update form
                        $('#UpdateItemDetailsForm').submit(function(e) {
                            e.preventDefault();
                            //save form data to fd constant
                            const fd = new FormData(this);

                            $.ajax({
                                url: '{{ route('product.update') }}',
                                method: 'post',
                                data: fd,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function(response) {
                                    // console.log(response);
                                    if (response.status == 200) {
                                        // $('#UpdateUserDetailsForm')[0].reset();
                                        $('#modaleditproduct').modal('hide');
                                        // fetch product data from database
                                        fetchAllProductData();

                                    }
                                }
                            });


                        });

                        // fetch categories
                        $.ajax({
                            url: '{{ route('categories.fetch') }}',
                            method: 'get',
                            success: function(categories) {
                                updateCategoryDropdown(categories);
                            }
                        });

                        // Function to update the category dropdown
                        function updateCategoryDropdown(categories) {
                            var categoryDropdown = $('#category_id1');
                            categoryDropdown.empty(); // Clear existing options

                            // Add default option
                            categoryDropdown.append('<option disabled selected hidden>Select a Category</option>');

                            // Populate the dropdown with categories
                            $.each(categories, function(index, category) {
                                categoryDropdown.append('<option value="' + category.id + '">' + category
                                    .category_name + '</option>');
                            });
                        }

                    });
                </script>

            </div>
        </div>
    </div>
</div>
