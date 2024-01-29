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
                })
            </script>
        </div>
    </div>
</div>
@include('storeManager.SMcomponent.issue-item-buttonModal-requestedtable')
@include('storeManager.SMcomponent.cancel-button-modal-request-table')
