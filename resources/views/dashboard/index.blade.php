@include('dashboard.layouts.header') <!-- سيتم تضمين الملف فقط إذا كان موجودًا -->
<style>
    .sen p {
        color: #333;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        font-weight: 600;
    }

    .sen p.mb-0 {
        font-size: 1.5rem;
        color: #4caf50;
        /* اللون الأساسي الأخضر */
    }

    .sen p.mt-2 {
        font-size: 1.2rem;
        color: #555;
        font-weight: 400;
    }

    .sen {
        font-size: 18px;
        flex-direction: column;
    }

    .header_mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .header_mobile {
            display: block;
            position: absolute;
            top: 90%;
        }

        .mobile_nav {
            display: block !important;
            position: relative;
            top: 40%;
            right: 30%;
        }
    }
    @media(max-width:450px){
        .mobile_nav {
            display: block !important;
            position: relative;
            top: 60%;
            right: 30%;
        }
    }
</style>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="index.html" id="site-logo-inner">
                            <img class="" alt="" src="" data-light="" data-dark="">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <div class="center-item">
                                <div class="center-heading">Home</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children active">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-grid"></i></div>
                                            <div class="text">managment system</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{ url('/dashboard') }}" class="active">
                                                    <div class="text">Home</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="center-item">
                                <!-- <div class="center-heading">التحكمات</div> -->
                                <ul class="menu-list">
                                    <li class="menu-item has-children">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                                            <div class="text">invoices&Expenses</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{route('addpage.index')}}" class="">
                                                    <div class="text">add pills&Expenses&income</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('invoices.index')}}" class="">
                                                    <div class="text">invoices</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('expenses.index')}}" class="">
                                                    <div class="text">Expenses</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('income.index')}}" class="">
                                                    <div class="text">income</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                            </div>
                            </ul>
                            </li>

                        </div>
                    </div>
                     <!-- mobile  -->
                     <div class="popup-wrap mobile_nav user type-header" style="display: none;">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="header-user wg-user">
                                            <span class="image">
                                                <img src="images/avatar/user-1.png" alt="">
                                            </span>
                                            <span class="flex flex-column">
                                                <span class="body-title mb-2">{{auth()->user()->name}}</span>
                                            </span>
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end has-content"
                                        aria-labelledby="dropdownMenuButton3">
                                        <li>

                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" style="background: none; border: none; padding: 0;">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </button>
                                            </form>

                                        </li>
                                    </ul>
                                </div>
                                </ul>
                            </div>
                </div>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">

                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                                <form class="form-search flex-grow">


                                </form>
                            </div>
                            <div class="header-grid">
                                <div class="header-item button-dark-light">
                                    <i class="icon-moon"></i>
                                </div>
                                <div class="popup-wrap noti type-header">
                                    <!-- <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                    </div> -->
                                </div>
                                <div class="header-item button-zoom-maximize">
                                    <div class="">
                                        <i class="icon-maximize"></i>
                                    </div>
                                </div>
                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="images/avatar/user-1.png" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{auth()->user()->name}}</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton3">
                                            <li>

                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" style="background: none; border: none; padding: 0;">
                                                        <div class="icon">
                                                            <i class="icon-log-out"></i>
                                                        </div>
                                                        <div class="body-title-2">Log out</div>
                                                    </button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="text-center sen d-flex justify-content-center fs-1 fw-bold align-items-center col-12 vh-70">
                                <p class="mb-0">Easily manage your expenses, bills, and entries with our intuitive platform.</p>
                                <p class="mt-2">Track your financials efficiently and stay organized in just a few clicks.</p>
                            </div>

                        </div>
                        <!-- /main-content-wrap -->
                    </div>
                    <!-- /main-content-wrap -->
                    <!-- bottom-page -->

                    <!-- /bottom-page -->
                </div>
                <!-- /main-content -->
            </div>
            <!-- /section-content-right -->
        </div>
        <!-- /layout-wrap -->
    </div>
    <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    @include('dashboard.layouts.footer') <!-- سيتم تضمين الملف فقط إذا كان موجودًا -->
</body>

</html>
