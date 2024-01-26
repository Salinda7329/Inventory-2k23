<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modaleditproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="UpdateProductDetailsForm" class="mb-3" method="POST" action="#">
                    @csrf

                    {{-- hidden id input field --}}
                    <input type="hidden" id="product_Id_hidden" name="product_Id_hidden">

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name1" name="product_name"
                            placeholder="Enter your Product Name" :value="old('product_name')" required autofocus
                            autocomplete="product_name" />
                    </div>


                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category_id1" name="category_id" required>
                            <option disabled selected hidden>Select a Category</option>
                            <!-- Categories will be dynamically added here through JavaScript -->
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Select Status</label>
                        <select class="form-control" id="status1" name="isActive">
                            <option disabled selected hidden>Select a Status</option>
                            <option value="1">Active</option>
                            <option value="2">Deactive</option>
                            <option value="3">Delete</option>
                        </select>
                    </div>


                    <button class="btn btn-primary d-grid w-100" id="Update_product_button">Update</button>
                </form>

                <script>
                    $(document).ready(function() {

                        // Add an event listener to the modal close button
                        $('.btn-close').on('click', function() {
                            // Reset the form when the close button is clicked
                            $('#UpdateProductDetailsForm')[0].reset();
                            $('#password-error').hide();
                            $('.input-error').hide();
                        });

                        //edit user button
                        $(document).on('click', '.editProductButton', function(e) {
                            e.preventDefault();
                            let product_Id = $(this).attr('id');
                            // alert(id);

                            $.ajax({
                                url: '{{ route('product.edit') }}',
                                method: 'get',
                                data: {
                                    product_Id: product_Id,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {

                                    // console.log(response.name);
                                    // Set id value to the hidden field
                                    $('#product_Id_hidden').val(response.id);
                                    $('#product_name1').val(response.product_name);
                                    $('#category_id1').val(response.category_id);
                                    $('#status1').val(response.isActive);

                                }


                            });


                        })

                        function fetchAllProductData() {
                            $.ajax({
                                url: '{{ route('fetchAllProductData') }}',
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
                        $('#UpdateProductDetailsForm').submit(function(e) {
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
