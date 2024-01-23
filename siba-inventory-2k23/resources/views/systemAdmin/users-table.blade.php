<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-header">System Users
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            @include('systemAdmin.SysAdmincomponent.create-new-user')
                            @include('systemAdmin.SysAdmincomponent.edit-user')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="show_all_user_data"></div>
                </div>

            </div>
        </div>
    </div>
</div>
