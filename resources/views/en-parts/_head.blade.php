<head>
    <title> Mobasher @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo" rel="stylesheet">

    <link rel="stylesheet" href={{asset("en/css/open-iconic-bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("en/css/animate.css")}}>

    <link rel="stylesheet" href={{asset("en/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("en/css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{asset("en/css/magnific-popup.css")}}>

    <link rel="stylesheet" href={{asset("en/css/aos.css")}}>

    <link rel="stylesheet" href={{asset("en/css/ionicons.min.css")}}>

    <link rel="stylesheet" href={{asset("en/css/bootstrap-datepicker.css")}}>
    <link rel="stylesheet" href={{asset("en/css/jquery.timepicker.css")}}>


    <link rel="stylesheet" href={{asset("en/css/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("en/css/icomoon.css")}}>
    <link rel="stylesheet" href={{asset("en/css/style.css")}}>
    <link rel="stylesheet" href={{asset("en/css/main.css")}}>
    <link rel="stylesheet" href={{asset("en/css/jquery.toast.min.css")}}>

    @yield('stylesheet')

    <style>

/* .dropdown-menu {
  display: none;
  position: absolute;
  z-index: 1;
}
.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown:hover .dropdown-menu {
    display: block;
} */

        .dropdown-menu {
            position: relative;
            margin-top: -1px;
            min-width: 11rem;
        }
        .dropdown-submenu {
            position: relative;
            margin-top: -1px;
        }
        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
        }
        .dropdown-submenu:hover .dropdown-menu {
        /* display: none; */
        display: block;
    }
        .hover:hover { background-color:#f5f5f5; }

    </style>

</head>
