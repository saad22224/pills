@include('dashboard.layouts.header')
<style>
    /* تخصيص الباجينايشن */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .pagination .page-item {
        border-radius: 50%;
    }

    .pagination .page-link {
        border-radius: 50%;
        padding: 10px 15px;
        font-size: 14px;
        color: #333;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f8f9fa;
        color: #6c757d;
        border-color: #ddd;
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
                            <div class="wg-filter flex-grow">
                                    <form method="GET" action="{{ route('expenses.index') }}" class="form-search flex items-center gap10">
                                        <fieldset class="name">
                                            <label for="date_from">From:</label>
                                            <input type="date" name="date" id="date" value="{{ request('date_from') }}">
                                        </fieldset>

                                        <button class="tf-button style-1" type="submit">
                                            <i class="icon-search"></i> Filter

                                        </button>
                                        <a href="{{ route('expenses.index') }}" class="tf-button">Reset</a>
                                    </form>
                                    <button id="print-btn" class="tf-button">
                                        <i class="icon-printer"></i> Print
                                    </button>
                                </div>
                                <!-- product-list -->
                                <div class="wg-box">
                                    <div class="title-box">
                                        <i class="icon-coffee"></i>
                                        <div class="body-text">Search by date: You can rely on the date to find the exact invoice you need."</div>
                                    </div>
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
<!--
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form> -->
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{route('addpage.index')}}"><i
                                                class="icon-plus"></i>add expenses</a>
                                    </div>
                                    <div class="wg-table table-product-list" id="table-to-print">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">expenses name</div>
                                            </li>
                                            <li>
                                                <div class="body-title"> price </div>
                                            </li>
                                            <li>
                                                <div class="body-title"> date</div>
                                            </li>
                                            <li>
                                                <div class="body-title"> description</div>
                                            </li>
                                            <li>
                                                <div class="body-title">  type </div>
                                            </li>
                                            <li>
                                                <div class="body-title"> provider</div>
                                            </li>
                                            <li>
                                                <div class="body-title">roles</div>
                                            </li>
                                        </ul>
                                        @foreach($expenses as $expense)




                                        <ul class="flex flex-column">
                                            <li class="product-item gap14">
                                                <div class="image no-bg">
                                                    <img src="{{ asset('storage/expenses/' . $expense->expenses_image) }}" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="name" style="font-size: 17px;">

                                                            {{$expense->title}}
                                                    </div>
                                                    <div class="body-text"> {{$expense->price}}</div>

                                                    <div class="body-text"> {{$expense->date}}</div>



                                                    <div class="body-text"> {{$expense->description}}</div>
                                                    <div class="body-text"> {{$expense->type}}</div>
                                                    <div class="body-text"> {{$expense->provider}}</div>
                                                    <div class="list-icon-function">

                                                        <div class="item edit">
                                                            <a href="{{route('expenses.edit',$expense->id)}}">

                                                                <i class="icon-edit-3"></i>
                                                            </a>
                                                        </div>
                                                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
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
                                        {{ $expenses->links('pagination::bootstrap-5') }}
                                        <a href="#"><i class="icon-chevron-right"></i></a>
                                    </div>

                                    <!-- /product-list -->
                                </div>
                                <!-- /main-content-wrap -->
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
        </div>
        @include('dashboard.layouts.footer')
        <!-- تحميل jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- تحميل autoTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#date", {
                    dateFormat: "Y-m-d", // تنسيق التاريخ
                    locale: "en" // اللغة
                });
            })



    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById("print-btn").addEventListener("click", function() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // احصل على الـ wrapper الذي يحتوي على المحتوى الذي تريد طباعته
            const content = document.getElementById('table-to-print');

            if (!content) {
                console.error("Content not found.");
                return; // لا تتابع إذا لم يتم العثور على العنصر
            }

            const rows = [];
            const items = content.querySelectorAll('.product-item');

            if (items.length > 0) {
                items.forEach(item => {
                    const rowData = [];
                    const title = item.querySelector('.name');
                    const price = item.querySelector('.body-text');
                    const date = item.querySelectorAll('.body-text')[1];
                    const description = item.querySelectorAll('.body-text')[2];

                    // أضف البيانات إلى الصف
                    rowData.push(title ? title.innerText : '');
                    rowData.push(price ? price.innerText : '');
                    rowData.push(date ? date.innerText : '');
                    rowData.push(description ? description.innerText : '');

                    rows.push(rowData);
                });

                // إضافة البيانات إلى PDF
                doc.autoTable({
                    head: [["Expenses Name", "Price", "Date", "Description"]],  // حدد الأعمدة التي تريدها
                    body: rows,
                });

                // حفظ PDF
                doc.save("invoice-list.pdf");
            } else {
                console.error("No items found in the content.");
            }
        });
    });



        </script>
</body>

</html>
