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

            <script>
                $(document).ready(function() {
                    fetchAllRequestData();

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

                                //Change status button color
                                $('.processRequestButton').each(function() {
                                    var status = $(this).attr('data-status');
                                    if (status == "1") {
                                        $(this).removeClass('btn-outline-primary').addClass(
                                            'btn-outline-danger');
                                    } else if (status == "0") {
                                        $(this).removeClass('btn-outline-danger').addClass(
                                            'btn-outline-secondary');
                                    }
                                });

                                $('.processRequestButton').each(function() {
                                    if ($(this).data('status') == 1) {
                                        $(this).closest('#requestButtonContainer').find(
                                            '.requestActionButton').show();
                                    } else {
                                        $(this).closest('#requestButtonContainer').find(
                                            '.requestActionButton').hide();
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
