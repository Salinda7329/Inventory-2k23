{{-- mekedi penn oni usersla request krpu items tk awa issue krann issue button aka abuwam ana modal ake a userge epf num aka , nama , departmnt aka ,
item code aka okkm visthara tka auto fill wela thiynn oni. --}}

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <br><br>
        <div class="authentication-inner">

            <div class="card">
                <div class="card-header">
                    Requested Items by Users
                </div>
                <div class="card-body">
                    <div id="show_all_requests_data"></div>
                </div>
            </div>

            {{-- <script>
                $(document).ready(function() {
                    fetchAllRequestData();

                    showActionButton();

                    function showActionButton() {
                    // Select the button with the specific itemUser value
                    var button = $('.processRequestButton');
                    // Show or hide action button based on data-status
                    button.each(function() {
                        console.log('It worked');
                        var status = $(this).data('status');
                        var actionButton = $(this).next('.actionRequestButton');

                        if (status == 0) {
                            actionButton.hide();
                        } else {
                            actionButton.show();
                        }
                    });
                }

                    function fetchAllRequestData() {
                        $.ajax({
                            url: '{{ route('fetchAllRequestData') }}',
                            method: 'get',
                            success: function(response) {
                                // console.log(response);
                                $('#show_all_requests_data').html(response);
                                // //Make table a data table
                                $('#all_request_data').DataTable({
                                    // Enable horizontal scrolling
                                    // "scrollX": true,
                                });

                            }


                        });
                    }

                    // Add event listeners for process buttons
                    $(document).on("click", ".processRequestButton", function(e) {
                        e.preventDefault();

                        const itemUser = this.id;

                        // Send AJAX request to the backend using jQuery
                        $.ajax({
                            url: '{{ route('RequestAction') }}',
                            type: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: JSON.stringify({
                                itemUser: itemUser
                            }),
                            dataType: 'json',
                            success: function(data) {
                                fetchAllRequestData();
                            },
                            error: function(error) {
                                console.error('Error performing request action:', error);
                            }
                        });
                    });
                })
            </script> --}}
            {{-- <script>
                $(document).ready(function() {
                    fetchAllRequestData();

                    function fetchAllRequestData() {
                        // Store a reference to the button
                        var processButton = $('.processRequestButton');
                        $.ajax({
                            url: '{{ route('fetchAllRequestData') }}',
                            method: 'get',
                            success: function(response) {
                                // console.log(response);
                                $('#show_all_requests_data').html(response);
                                // //Make table a data table
                                $('#all_request_data').DataTable({
                                    // Enable horizontal scrolling
                                    // "scrollX": true,
                                });

                                // Check if the text is "Process"
                                if ($('.processRequestButton').text().trim() === 'Processing') {
                                    // Remove the existing classes and add the new ones
                                    $(this).removeClass('btn-outline-secondary').addClass('btn-outline-danger');
                                }else{
                                    $(this).removeClass('btn-outline-danger').addClass('btn-outline-secondary');
                                }
                            }
                        });
                    }

                    // Add event listeners for process buttons
                    $(document).on("click", ".processRequestButton", function(e) {
                        e.preventDefault();

                        const itemUser = this.id;

                        // Send AJAX request to the backend using jQuery
                        $.ajax({
                            url: '{{ route('RequestAction') }}',
                            type: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: JSON.stringify({
                                itemUser: itemUser
                            }),
                            dataType: 'json',
                            success: function(data) {
                                fetchAllRequestData();
                            },
                            error: function(error) {
                                console.error('Error performing request action:', error);
                            }
                        });
                    });
                });
            </script> --}}
            <script>
                $(document).ready(function() {
                    fetchAllRequestData();

                    function fetchAllRequestData() {
                        // Store a reference to the button
                        var processButton = $('.processRequestButton');

                        $.ajax({
                            url: '{{ route('fetchAllRequestData') }}',
                            method: 'get',
                            success: function(response) {
                                // console.log(response);
                                $('#show_all_requests_data').html(response);
                                // //Make table a data table
                                $('#all_request_data').DataTable({
                                    // Enable horizontal scrolling
                                    // "scrollX": true,
                                });

                                // Check if the text is "Processing"
                                processButton.each(function() {
                                    var buttonText = $(this).text().trim();

                                    if (buttonText === 'Processing') {
                                        // Remove the existing classes and add the new ones
                                        $(this).removeClass('btn-outline-secondary').addClass(
                                            'btn-outline-danger');
                                    } else {
                                        $(this).removeClass('btn-outline-danger').addClass(
                                            'btn-outline-secondary');
                                    }
                                });
                            }
                        });
                    }

                    // Add event listeners for process buttons
                    $(document).on("click", ".processRequestButton", function(e) {
                        e.preventDefault();

                        const itemUser = this.id;

                        // Store a reference to the button
                        var clickedButton = $(this);

                        // Send AJAX request to the backend using jQuery
                        $.ajax({
                            url: '{{ route('RequestAction') }}',
                            type: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            data: JSON.stringify({
                                itemUser: itemUser
                            }),
                            dataType: 'json',
                            success: function(data) {
                                fetchAllRequestData();
                                // Use the stored reference to update the clicked button's class
                                if (data.message === 0) {
                                    clickedButton.removeClass('btn-outline-danger').addClass(
                                        'btn-outline-secondary');
                                } else {
                                    clickedButton.removeClass('btn-outline-secondary').addClass(
                                        'btn-outline-danger');
                                }
                            },
                            error: function(error) {
                                console.error('Error performing request action:', error);
                            }
                        });
                    });
                });
            </script>

        </div>
    </div>
</div>
@include('storeManager.SMcomponent.action-item-buttonModal-requestedtable')
