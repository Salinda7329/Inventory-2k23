
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        @include('PurchasingManager.PMComponents.Modal-addNewProduct')
        <br><br>
        <div class="authentication-inner">

            <div class="card">

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
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Quentity</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                        <td>@include('PurchasingManager.PMComponents.Modal-UpdateProduct')
                            @include('PurchasingManager.PMComponents.Modal-DeletProduct')</td>

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
