<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-header">System Users
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            @include('systemAdmin.SysAdmincomponent.create-new-user')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <table id="example" class="hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>User_ID</th>
                                    <th>EPF</th>
                                    <th>Role</th>
                                    <th>First_Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                    <td>System Architect</td>
                                </tr>



                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#example').DataTable({
                                    "scrollX": true, // Enable horizontal scrolling
                                });
                            });
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
