<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" style="margin-top: 6%; margin-bottom: 0px;"
    id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" style="margin-left: 50%;" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/" class="nav-link pl-0">الرئسيه</a></li>
                <li class="nav-item {{ Request::is('ar-about') ? 'active' : '' }} ">
                    <a href="/ar-about" class="nav-link">من نحن</a>
                </li>
                {{-- <li class="nav-item {{ Request::is('ar-project') ? 'active' : '' }}">
                    <a href="/ar-project" class="nav-link">الإدارات</a>
                </li> --}}
                <li class="dropdown" style="padding-top: 12px;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                        الإدارات
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/ar-affair">شؤون تنظيمية</a>
                        </li>
                        <li>
                            <a href="/ar-account">الحساب</a>
                        </li>
                        <li>
                            <a href="/ar-support">الدعم الفني</a>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#">مبيعات<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/ar-pharmacy">صيدلية المصطفى</a></li>
                                <li><a href="/ar-system">نظام تسليم التبريد</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('ar-product') ? 'active' : '' }}"><a href="/ar-product"
                        class="nav-link">المنتجات</a></li>
                <li class="nav-item {{ Request::is('ar-event') ? 'active' : '' }}"><a href="/ar-event"
                        class="nav-link">الأخبار</a></li>
                <li class="nav-item {{ Request::is('ar-contact') ? 'active' : '' }}"><a href="/ar-contact"
                        class="nav-link">واصلنا</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
