<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>

            <li class="heading">
                <h3 class="uppercase">لوحة التحكم</h3>
            </li>
            <li class="nav-item  ">
                <a href="{{route('admin')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الصفحة الرئيسية</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">الأدمن</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('companies.index')}}" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">من نحن</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('news.index')}}" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">الأخبار</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">المنتجات</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{route('projects.index')}}" class="nav-link nav-toggle">
                    <i class="icon-bulb"></i>
                    <span class="title">مشاريع</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{route('teams.index')}}" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">الفريق</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('clients.index')}}" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">العملاء</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('accounts.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">الحساب</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('affairs.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">شوؤن التنظيمية</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('pharmacies.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">صيدلية مصطفى</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{route('sales.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">المبيعات</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{route('supports.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">الدعم الفني</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('systems.index')}}" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">نظام تسليم التبريد</span>
                </a>
            </li>



        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
