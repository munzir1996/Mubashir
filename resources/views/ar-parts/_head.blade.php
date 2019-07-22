<head>
    <title> مباشر @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo" rel="stylesheet">

    <link rel="stylesheet" href={{asset("ar/css/open-iconic-bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/animate.css")}}>

    <link rel="stylesheet" href={{asset("ar/css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/owl.theme.default.min.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/magnific-popup.css")}}>

    <link rel="stylesheet" href={{asset("ar/css/aos.css")}}>

    <link rel="stylesheet" href={{asset("ar/css/ionicons.min.css")}}>

    <link rel="stylesheet" href={{asset("ar/css/bootstrap-datepicker.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/jquery.timepicker.css")}}>


    <link rel="stylesheet" href={{asset("ar/css/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/icomoon.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/style.css")}}>
    <link rel="stylesheet" href={{asset("ar/css/main.css")}}>
    <link rel="stylesheet" href={{asset("en/css/jquery.toast.min.css")}}>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">


    @yield('stylesheet')

    <style>
        .dropdown-menu {
            position: relative;
            text-align: right;
        }
        .dropdown-submenu {
            position: relative;
            text-align: right;

        }
        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: -100%;
            margin-top: -1px;
            display: none !important;
        }
        .dropdown-submenu:hover .dropdown-menu {
            /* display: none; */
            display: block !important;
        }

    </style>

</head>
