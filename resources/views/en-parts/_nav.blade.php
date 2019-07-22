<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  {{ Request::is('en-home') ? 'active' : '' }}"><a href="/en-home"
                        class="nav-link pl-0">Home</a></li>
                <li class="nav-item {{ Request::is('en-about') ? 'active' : '' }}"><a href="/en-about"
                        class="nav-link">About us</a></li>
                {{-- <li class="nav-item {{ Request::is('en-project') ? 'active' : '' }}"><a href="/en-project"
                        class="nav-link">Departments</a></li> --}}
                <li class="dropdown" style="padding-top: 17px;">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:white;">
                        Departments
                    </a>
                    <ul class="dropdown-menu">
                        <li class="hover">
                            <a href="/en-affair" style="color: black;padding-left: 5px;">
                                Regulatory affairs</a>
                        </li>
                        <li class="hover">
                            <a href="/en-account" style="color: black;padding-left: 5px;">
                                Account</a>
                        </li>
                        <li class="hover">
                            <a href="/en-support" style="color: black;padding-left: 5px;">
                                Techinical support</a>
                        </li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-toggle" href="#" style="color: black;padding-left: 5px;">
                                Sales<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="hover">
                                    <a href="/en-pharmacy" style="color: black;padding-left: 5px;">
                                        Almustfa pharmacy</a></li>
                                <li class="hover">
                                    <a href="/en-system" style="color: black;padding-left: 5px;">
                                        Cooling delivery system</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('en-product') ? 'active' : '' }}"><a href="/en-product"
                        class="nav-link">Products</a></li>
                <li class="nav-item {{ Request::is('en-event') ? 'active' : '' }}"><a href="/en-event"
                        class="nav-link">News</a></li>
                <li class="nav-item  {{ Request::is('en-contact') ? 'active' : '' }}"><a href="/en-contact"
                        class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
