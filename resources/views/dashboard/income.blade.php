@include('dashboard.layouts.header')

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <!--      <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> -->
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

                                </ul>
                                </li>

                                </ul>
                            </div>
                        </div>
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
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                    </div>
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
                                                <a href="login.html" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </a>
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
                            <div class="main-content-wrap">

                               <!-- product-list -->
                               <div class="wg-box">
                                    <div class="title-box">
                                        <i class="icon-coffee"></i>
                                        <div class="body-text">نصيحة للبحث حسب معرف المنتج: يتم تزويد كل منتج بمعرف فريد
                                            يمكنك الاعتماد عليه للعثور على المنتج الدقيق الذي تحتاجه.</div>
                                    </div>
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">

                                            <form class="form-search">

                                                <div class="button-submit">
                                                    <!-- <button class="" type="submit"><i class="icon-search"></i></button> -->
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{route('addpage.index')}}"><i
                                                class="icon-plus"></i>add income</a>


                                    </div>
                                    <div class="wg-table table-product-list">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">invoice name</div>
                                            </li>d

                                            <li>
                                                <div class="body-title">price</div>
                                            </li>
                                            <li>
                                                <div class="body-title">date from</div>
                                            </li>
                                            <li>
                                                <div class="body-title">date to</div>
                                            </li>
                                            <li>
                                                <div class="body-title">income type</div>
                                            </li>
                                            <li>
                                                <div class="body-title">roles</div>
                                            </li>
                                        </ul>
                                        @foreach($incomes as $income)


                                        <ul class="flex flex-column">
                                            <li class="product-item gap14">

                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name">
                                                        <a href="product-list.html" class="body-title-2">
                                                            {{$income->title}} </a>
                                                    </div>
                                                    <div class="body-text"  style="transform:translateX(30%)"> {{$income->total_amount}}</div>

                                                    <div class="body-text"  style="transform:translateX(17%)"> {{$income->date_from}}</div>
                                                    <div class="body-text"> {{$income->date_to}}</div>
                                                    <div class="body-text"> {{$income->income_type}}</div>



                                                    <div class="list-icon-function">

                                                        <div class="item edit">
                                                            <a href="{{route('income.edit',$income->id)}}">

                                                                <i class="icon-edit-3"></i>
                                                            </a>
                                                        </div>
                                                        <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="i" onclick="return confirm('Are you sure you want to delete this invoice?')">
                                                                <i class="icon-trash-2"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 entries</div>
                                        {{ $incomes->links('pagination::bootstrap-5') }}
                                        <a href="#"><i class="icon-chevron-right"></i></a>
                                    </div>

                                    <!-- /product-list -->
                                </div>
                                <!-- /product-list -->
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

    @include('dashboard.layouts.footer')
</body>

</html>
