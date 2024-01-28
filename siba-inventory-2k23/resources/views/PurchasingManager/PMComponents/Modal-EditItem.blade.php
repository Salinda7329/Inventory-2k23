<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modaledititem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>
                <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="UpdateItemDetailsForm" class="mb-3" method="POST" action="#">
                    @csrf

                    {{-- hidden id input field --}}
                    <input type="hidden" id="item_Id_hidden" name="item_Id_hidden">
                    <input type="hidden" id="item_Id_hidden" name="item_Id_hidden">

                    <div class="mb-3">
                        <label for="po_no" class="form-label">PO Number</label>
                        <input type="text" class="form-control" id="po_no2" name="po_no"
                            placeholder="Enter your PO Number" :value="old('po_no')" required autofocus
                            autocomplete="po_no" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="product_name">Product Name</label>
                        <select class="form-select" id="product_id2" name="product_id" aria-label="product_name">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Electronic</option>
                            <option value="2">Stationary</option>
                            <option value="3">Cleaning</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="brand_name">Brand Name</label>
                        <select class="form-select" id="brand_id2" name="brand_id" aria-label="brand_name">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Electronic</option>
                            <option value="2">Stationary</option>
                            <option value="3">Cleaning</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="catagory">Item Name</label>
                        <input type="text" class="form-control" id="item_name2" name="item_name"
                            placeholder="Enter Item Name" />
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="condition">Condition</label>
                        <select class="form-select" id="condition2" name="condition" aria-label="condition">
                            <option disabled selected hidden>Select an option</option>
                            <option value="1">Working</option>
                            <option value="2">Damaged</option>
                        </select>
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="items_remaining">Item Count</label>
                        <input type="text" class="form-control" id="items_remaining2" name="items_remaining"
                            placeholder="Enter Item Count" />
                        <div class="input-error text-danger" style="display: none"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="lower_limit">Lower Limit</label>
                        <input type="text" class="form-control" id="lower_limit2" name="lower_limit"
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
                                    $('#item_Id_hidden2').val(response.id);
                                    $('#po_no2').val(response.po_no);
                                    $('#product_id2').val(response.product_id);
                                    $('#brand_id2').val(response.brand_id);
                                    $('#item_name2').val(response.item_name);
                                    $('#condition2').val(response.condition);
                                    $('#items_remaining2').val(response.items_remaining);
                                    $('#lower_limit2').val(response.lower_limit);

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

                        // fetch products
                        $.ajax({
                            url: '{{ route('products.fetch') }}',
                            method: 'get',
                            success: function(products) {
                                updateProductDropdown(products);
                            }
                        });

                        // Function to update the product dropdown
                        function updateProductDropdown(products) {
                            var productDropdown = $('#product_id2');
                            productDropdown.empty(); // Clear existing options

                            // Add default option
                            productDropdown.append('<option disabled selected hidden>Select a Product</option>');

                            // Populate the dropdown with products
                            $.each(products, function(index, product) {
                                productDropdown.append('<option value="' + product.id + '">' + product
                                    .product_name + '</option>');
                            });
                        }

                        // fetch brands
                        $.ajax({
                            url: '{{ route('brands.fetch') }}',
                            method: 'get',
                            success: function(brands) {
                                updateBrandDropdown(brands);
                            }
                        });

                        // Function to update the brand dropdown
                        function updateBrandDropdown(brands) {
                            var brandDropdown = $('#brand_id2');
                            brandDropdown.empty(); // Clear existing options

                            // Add default option
                            brandDropdown.append('<option disabled selected hidden>Select a Brand</option>');

                            // Populate the dropdown with products
                            $.each(brands, function(index, brand) {
                                brandDropdown.append('<option value="' + brand.id + '">' + brand
                                    .brand_name + '</option>');
                            });
                        }

                    });
                </script>

            </div>
        </div>
    </div>
</div>
