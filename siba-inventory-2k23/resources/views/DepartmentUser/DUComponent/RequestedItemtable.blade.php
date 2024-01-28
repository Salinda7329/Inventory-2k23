{{-- methana departmnt user dapu request tka timestamp akath akk penn piliwelata view wenn hdann. thaw usert oninm edit krann cancel krann plwn wenn hadann
     --}}
{{--
     thaw request aka store manager accept kralanm status aka update krann hadnn athkot edit , cancel buttons penn hdnn epa athkot view status
     kiyala button akk thiyanw aka obapuwam modl akk anw ake storemanager dala thiyana comment akai accept karpu date aki time akai penn hdnn --}}

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
                        <th>Item No</th>
                        <th>Item Name</th>
                        <th>Quentity</th>
                        <th>Requested Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>************</td>
                        <td>Pending</td>

                        <td>
                            @include('DepartmentUser.DUComponent.Modal-editRequestitem')
                           @include('DepartmentUser.DUComponent.Modal-cancelRequest')
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
