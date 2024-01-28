{{-- mekedi penn oni usersla request krpu items tk awa issue krann issue button aka abuwam ana modal ake a userge epf num aka , nama , departmnt aka ,
item code aka okkm visthara tka auto fill wela thiynn oni. --}}

     <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <br><br>
            <div class="authentication-inner">

                <div class="card">
                    <div class="card-header">
                        <H3>Requested Items</H3>
                    </div>
                    <br><br>
                    <div class="card-body">

                        <div class="row">
                            <!-- Left side -->
                            <div class="col-md-6">

                            </div>
                            <!-- Right side -->
                            <div class="col-md-6">
                </div>

                <table id="example" class="hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Requested Date</th>
                            <th>Requested Time</th>
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Requested By</th>
                            <th>Department</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>************</td>
                            <td>************</td>
                            <td>************</td>
                            <td>************</td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
                               @include('storeManager.SMcomponent.issue-item-buttonModal-requestedtable')
                               @include('storeManager.SMcomponent.cancel-button-modal-request-table')
                            </td>

                        </tr>


                </table>
                    <script>
                        $(document).ready( function () {
                            $('#example').DataTable();
                        });
                    </script>
            </div>
        </div>
    </div>
