<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <h5 class="card-header">View Return Items</h5>
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
                        <th>Return Date</th>
                        <th>Time</th>
                        <th>Item name</th>
                        <th>Item code</th>
                        <th>Return by</th>
                        <th>Departmant</th>
                        <th>Catagory Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>@include('storeManager.SMcomponent.accept-button')
                            @include('storeManager.SMcomponent.cancel-button-modal-request-table')</td>

                    </tr>
                    <tr>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>@include('storeManager.SMcomponent.accept-button')
                            @include('storeManager.SMcomponent.cancel-button-modal-request-table')</td>
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
