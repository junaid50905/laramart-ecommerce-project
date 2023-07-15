@php
   $logo =  DB::table('website_settings')->first()->logo;
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('storage/files/website_settings_images/'.$logo) }}" alt="Laramart Logo" height="60" width="60" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-primary"><h4>Laramart</h4></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('ui/admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->name }}
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item {{ Request::path() === 'admin/dashboard/categories' || Request::path() === 'admin/dashboard/subcategories' || Request::path() === 'admin/dashboard/childcategory' || Request::path() === 'admin/dashboard/brands' || Request::path() === 'admin/dashboard/warehouses' ? 'active-parent-item' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- ========== Start category ========== -->
                        <li class="nav-item {{ 'admin/dashboard/categories' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <!-- ========== End category ========== -->

                        <!-- ========== Start subcategory ========== -->
                        <li class="nav-item {{ 'admin/dashboard/subcategories' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('subcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subcategory</p>
                            </a>
                        </li>
                        <!-- ========== End subcategory ========== -->

                        <!-- ========== Start childcategory ========== -->
                        <li class="nav-item {{ 'admin/dashboard/childcategory' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('childcategory.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Childcategory</p>
                            </a>
                        </li>
                        <!-- ========== End childcategory ========== -->

                        <!-- ========== Start brands ========== -->
                        <li class="nav-item {{ 'admin/dashboard/brands' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('brand.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <!-- ========== End brands ========== -->

                        <!-- ========== Start warehouse ========== -->
                        <li class="nav-item {{ 'admin/dashboard/warehouses' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('warehouse.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Warehouse</p>
                            </a>
                        </li>
                        <!-- ========== End warehouse ========== -->

                    </ul>
                </li> <!--end category-->

                <li class="nav-item {{ request()->is('admin/dashboard/settings/*') ? 'active-parent-item' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- ========== Start Seo ========== -->
                        <li class="nav-item {{ 'admin/dashboard/settings/seo' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('settings.seo.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Seo settings</p>
                            </a>
                        </li>
                        <!-- ========== End Seo ========== -->

                        <!-- ========== Start SMTP ========== -->
                        <li class="nav-item {{ 'admin/dashboard/settings/smtp' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('settings.smtp.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMTP settings</p>
                            </a>
                        </li>
                        <!-- ========== End SMTP ========== -->

                        <!-- ========== Start Website settings ========== -->
                        <li class="nav-item {{ 'admin/dashboard/settings/website-settings' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('settings.website.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website settings</p>
                            </a>
                        </li>
                        <!-- ========== End Website settings ========== -->


                    </ul>
                </li> <!--end settings-->

                <li class="nav-item  {{ request()->is('admin/dashboard/offers/*') ? 'active-parent-item' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Offers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- ========== Start coupon ========== -->
                        <li class="nav-item  {{ 'admin/dashboard/offers/coupons' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('offers.coupon.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Coupon</p>
                            </a>
                        </li>
                        <!-- ========== End coupon ========== -->

                    </ul>
                </li> <!--end offers-->
                <li class="nav-item {{ 'admin/dashboard/pickup-points' === Request::path() ? 'active-parent-item' : '' }}">
                    <a href="{{ route('pickup_points.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Pickup Points
                        </p>
                    </a>
                </li> <!--end pickup points-->
                <li class="nav-item {{ request()->is('admin/dashboard/product/*') ? 'active-parent-item' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- ========== Start coupon ========== -->
                        <li class="nav-item {{ 'admin/dashboard/product/add-product' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('add_product.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <!-- ========== End coupon ========== -->

                        <!-- ========== Start manage-product ========== -->
                        <li class="nav-item {{ 'admin/dashboard/product/manage-products' === Request::path() ? 'active-child-item' : '' }}">
                            <a href="{{ route('add_product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Product</p>
                            </a>
                        </li>
                        <!-- ========== End manage-product ========== -->

                    </ul>
                </li> <!--end offers-->
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
