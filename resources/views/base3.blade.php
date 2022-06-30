<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GED</title>
    <!-- base:css -->
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../vendors/jquery-bar-rating/fontawesome-stars-o.css">
    <link rel="stylesheet" href="../../vendors/jquery-bar-rating/fontawesome-stars.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/ged-logo.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('welcome') }}"><img src="../../images/ged-logo.png"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('welcome') }}"><img
                        src="../../images/ged-logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-flex mr-4 ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                            id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                            @if (Auth::user())
                                <form method="POST" action="{{ route('logout') }}"
                                    class="dropdown-item preview-item">
                                    @csrf

                                    <button type="submit" class="btn">
                                        <i class="icon-inbox"></i>Déconnexion
                                    </button>
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="user-profile">
                    <div class="user-image">
                        <img src="../../images/users/{{ Auth::user()->image }}">
                    </div>
                    <div class="user-name">
                        {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                    </div>
                    <div class="user-designation">
                        {{ Auth::user()->role }}
                    </div>
                </div>
                @if (Auth::user()->role == 'ADMIN')
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                <i class="icon-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->status == 'ACTIVE')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documents') }}">
                                    <i class="icon-paper-stack menu-icon"></i>
                                    <span class="menu-title">Documents</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('folders.index') }}">
                                <i class="icon-folder menu-icon"></i>
                                <span class="menu-title">Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('groupes') }}">
                                <i class="icon-grid menu-icon"></i>
                                <span class="menu-title">Groupes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="icon-head menu-icon"></i>
                                <span class="menu-title">Utilisateurs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('compte') }}">
                                <i class="icon-head menu-icon"></i>
                                <span class="menu-title">Compte</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="docs/documentation.html">
                                <i class="icon-cog menu-icon"></i>
                                <span class="menu-title">Paramétres</span>
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">
                                <i class="icon-box menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->status == 'ACTIVE')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('documents') }}">
                                    <i class="icon-paper-stack menu-icon"></i>
                                    <span class="menu-title">Documents</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('compte') }}">
                                <i class="icon-head menu-icon"></i>
                                <span class="menu-title">Compte</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="docs/documentation.html">
                                <i class="icon-cog menu-icon"></i>
                                <span class="menu-title">Paramétres</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </nav>


            @yield('content')




        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="../../vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
