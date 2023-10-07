<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Dashboard</label>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Invoice</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Invoices</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('invoices.index') }}">Invoices</a></li>
                        <li><a href="{{ route('invoices.create') }}">Create New Invoice</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Products</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon">
                            <i class="feather icon-package"></i></span><span class="pcoded-mtext">Products</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                        <li><a href="{{ route('products.create') }}">Add New Product</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-activity"></i></span><span class="pcoded-mtext">Brands</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('brands.index') }}">Brands</a></li>
                        <li><a href="{{ route('brands.create') }}">Add New Brands</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layers"></i></span><span class="pcoded-mtext">Categories</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('categories.create') }}">Add New Category</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-hash"></i></span><span class="pcoded-mtext">Batch</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('batches.index') }}">Batches</a></li>
                        <li><a href="{{ route('batches.create') }}">Add New Batch</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>People</label>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-users"></i></span><span class="pcoded-mtext">Customers</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('customers.index') }}">Customers</a></li>
                        <li><a href="{{ route('customers.create') }}">Add customer</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-grid"></i></span><span class="pcoded-mtext">Suppliers</span></a>

                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
                        <li><a href="{{ route('suppliers.create') }}">Add Supplier</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Expenses</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-file-text"></i></span><span class="pcoded-mtext">Expenses</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('expenses.index') }}">All Expense</a></li>
                        <li><a href="{{ route('expenses.create') }}">Add Expense</a></li>
                        <li><a href="{{ route('types.index') }}">Expense Types</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Reports</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Reports</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ url('reports?range=daily') }}">Daily Report</a></li>
                        <li><a href="{{ url('reports?range=weekly') }}">Weekly Report</a></li>
                        <li><a href="{{ url('reports?range=monthly') }}">Monthly Report</a></li>
                        <li><a href="{{ url('reports?range=yearly') }}">Yearly Report</a></li>
                        <li><a href="{{ url('reports?range=set_custom_range') }}">Custom Report</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Settings</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-settings"></i></span><span
                            class="pcoded-mtext">Settings</span></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
