<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/castle/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Global</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Panel</div>
            </a>
            <ul>
                <li> <a href="{{route('castle.dashboard')}}"><i class="bi bi-circle"></i>İstatistik</a>
                </li>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Language Management</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bi bi-circle"></i>Language List</a>
                </li>
                <li> <a href="#"><i class="bi bi-circle"></i>Language Add</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Modules</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Catalog</div>
            </a>
            <ul>
                <li> <a href="{{route('castle.category.index')}}"><i class="bi bi-circle"></i>Categories</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Products</a>

            </ul>

        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Sales</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bi bi-circle"></i>Orders</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Products</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Gift Vouchers</a>

            </ul>


        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Customers</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bi bi-circle"></i>Customers</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Customers Group</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Gift Vouchers</a>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">System</div>
            </a>
            <ul>
                <li> <a href="#"><i class="bi bi-circle"></i>Settings</a>
                <li> <a href="#"><i class="bi bi-circle"></i>Admin Users</a>
            </ul>
        </li>


    </ul>
    <!--end navigation-->
</aside>
