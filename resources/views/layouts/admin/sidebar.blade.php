<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="{{Request::path() == '/home' ? 'active' : ''}}">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{Request::path() == 'admin/siteSetting' ? 'active' : ''}}">
                <a href="{{ url('/admin/siteSetting') }}">
                    <i class="fa fa-cogs"></i> <span>Site Settings</span>
                </a> 
            </li>
<!-- 
            <li class="{{Request::path() == 'admin/subAdmin' ? 'active' : ''}}">
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-user-secret"></i> <span>Sub-Admin Management</span>
                </a>
            </li> -->

            <li class="{{Request::path() == 'admin/users' ? 'active' : ''}}">
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i> <span>User Management</span>
                </a>
            </li>

<!--             <li class="{{ Request::path() == 'admin/category' ? 'active' : ''}}">
                <a href="{{ url('/admin/category') }}">
                    <i class="fa fa-code-fork"></i> <span>Category Management</span>
                </a>
            </li>
 -->
            <li class="{{ Request::path() == 'admin/contentType' || Request::path() == 'admin/content'   ? 'active treeview menu-open' : ''}}">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Content Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{ Request::path() == 'admin/contentType' ? 'active' : ''}}"><a href="{{ asset('admin/contentType') }}"><i class="fa fa-circle-o"></i>Manage Content Type</a></li>
                    <li class="{{ Request::path() == 'admin/content' ? 'active' : ''}}"><a href="{{ asset('admin/content') }}"><i class="fa fa-circle-o"></i>Manage Content</a></li>
                </ul>
            </li>

            <li class="{{ Request::path() == 'admin/faqCat' || Request::path() == 'admin/faq'   ? 'active treeview menu-open' : ''}}">
                <a href="#">
                    <i class="fa fa fa-question-circle"></i> <span>FAQ Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-down pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="">
                    <li class="{{ Request::path() == 'admin/faqCat' ? 'active' : ''}}"><a href="{{ asset('admin/faqCat') }}"><i class="fa fa-circle-o"></i>Manage FAQ Category</a></li>
                    <li class="{{ Request::path() == 'admin/faq' ? 'active' : ''}}"><a href="{{ asset('admin/faq') }}"><i class="fa fa-circle-o"></i>Manage FAQ</a></li>
                </ul>
            </li>

            <!--
            <li class="{{Request::path() == 'admin/email' ? 'active' : ''}}">
                <a href="{{ url('/admin/email') }}">
                    <i class="fa fa fa-envelope-o"></i> <span>Mail Template </span>
                </a>
            </li>

            <li class="{{Request::path() == 'admin/review' ? 'active' : ''}}">
                <a href="{{ url('admin/review') }}">
                    <i class="fa fa fa-renren"></i> <span>Comment Review</span>
                </a>
            </li>

            <li class="{{Request::path() == 'admin/product' ? 'active' : ''}}">
                <a href="{{ url('/admin/product') }}">
                    <i class="fa fa fa-shopping-cart"></i> <span>Product Management</span>
                </a>
            </li>

            <li class="{{Request::path() == 'landingpage' ? 'active' : ''}}">
                <a href="{{url(" landingpage ")}}">
                    <i class="fa fa fa-rupee"></i> <span>Payment</span>
                </a>
            </li>

            <li class="{{Request::path() == 'admin/contactus' ? 'active' : ''}}">
                <a href="{{url( '/admin/contactus')}}">
                    <i class="fa fa fa-phone"></i> <span>Contact us</span>
                </a>
            </li>
 -->        <li class="{{Request::path() == 'menu' ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa fa-newspaper-o"></i> <span>Newsletter Management</span>
                </a>
            </li>
            
            <li class="{{Request::path() == 'admin/email' ? 'active' : ''}}">
                <a href="{{ url('/admin/email') }}">
                    <i class="fa fa-envelope"></i> <span>Email Template Management</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>