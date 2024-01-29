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
            </script>
        </div>
    </div>
</div>
@include('storeManager.SMcomponent.action-item-buttonModal-requestedtable')
