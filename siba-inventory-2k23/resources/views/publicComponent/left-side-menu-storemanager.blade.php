<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/home" class="app-brand-link">
            <span class="app-brand-logo demo">

                <span class="app-brand-text demo menu-text fw-bolder ms-2">Welcome !</span>
                <br>
                {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2"></span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Store</span>
        </li>
        <li class="menu-item">
            <a href="/visit-store" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Visit Store </div>
            </a>
        </li>

        <!-- Forms -->

        <li class="menu-header small text-uppercase"><span class="menu-header-text">User Requests</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="/storeManager/view-requested-items" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">View Requests</div>
            </a>
            <a href="/storeManager/view-return-items" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">View Returns</div>
            </a>
            <a href="/Store/Not-Returned_Items" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">View Not Returned Items</div>
            </a>
            <!-- Components -->
        </li>




        <!-- Extended components -->


        <!-- Forms & Tables -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Store Quentity</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="/store/low-quentity" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Low Quentity</div>
            </a>




        <li class="menu-header small text-uppercase"><span class="menu-header-text">History</span></li>
        <!-- Forms -->
        <li class="menu-item">
            <a href="/store/History" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Check History</div>
            </a>
        </li>

        <!-- Misc -->

        </li>
    </ul>
</aside>
