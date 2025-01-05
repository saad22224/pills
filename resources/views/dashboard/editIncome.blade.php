@include('dashboard.layouts.header')

<!-- #wrapper -->
<div id="wrapper" lang="en" dir="ltr">
    <!-- #page -->
    <div id="page" class="">
        <!-- layout-wrap -->
        <div class="layout-wrap">
            <!-- preload -->
            <!--   <div id="preload" class="preload-container">
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




                        <!-- main-content-wrap -->
                        <div class="main-content-wrap" id="invoices" >
                            <!-- form-add-product -->
                            <form class="tf-section-2 form-add-product" enctype="multipart/form-data" action="{{route('income.update' , $income->id)}}" method="Post">
                                @csrf
                                @method('PUT')
                                <div dir="rtl" class="wg-box">
                                    <!-- اسم الدخل -->
                                    <fieldset class="name">
                                        <div class="body-title mb-10">income name <span class="tf-color-1">*</span></div>
                                        <input value="{{$income->title}}" class="mb-10" type="text" placeholder="income name" name="title" tabindex="0" required>
                                    </fieldset>

                                    <!-- اختيار نوع الدخل -->
                                    <select name="income_type"  id="income_type" required>
                                        <option value="choose" disabled selected>income type</option>
                                        <option value="side_job">side job</option>
                                        <option value="company_job">company job</option>
                                    </select>

                                    <!-- حقل job number يظهر فقط عند اختيار side job -->
                                    <div id="job_number_field" style="display: none;">
                                        <fieldset class="category">
                                            <div class="body-title mb-10">job number <span class="tf-color-1">*</span></div>
                                            <input id="job_number" name="job_number" type="number" placeholder="job number" min="1">
                                        </fieldset>
                                    </div>

                                    <!-- اختيار cash type يظهر فقط عند اختيار company job -->
                                    <div id="cash_type_field" style="display: none;">
                                        <select name="cash_type" id="cash_type">
                                            <option value="choose" disabled selected>cash type</option>
                                            <option value="cash_in_hand">cash in hand</option>
                                            <option value="cash_app">cash app</option>
                                            <option value="credit">credit</option>
                                        </select>
                                    </div>

                                    <!-- حقل amount -->
                                    <div class="gap22 cols">
                                        <fieldset class="category">
                                            <div class="body-title mb-10">amount <span class="tf-color-1">*</span></div>
                                            <input id="amount" name="amount" type="number" placeholder="amount" min="1" required>
                                        </fieldset>
                                    </div>

                                    <!-- حقل التواريخ -->
                                    <div class="gap22 cols">
                                        <fieldset class="category">
                                            <div class="body-title  mb-10">from <span class="tf-color-1">*</span></div>
                                            <input value="{{$income->date_from}}" name="date_from" id="date" type="date" required>
                                        </fieldset>
                                    </div>
                                    <div class="gap22 cols">
                                        <fieldset class="category">
                                            <div class="body-title mb-10">to <span class="tf-color-1">*</span></div>
                                            <input name="date_to" value="{{$income->date_to}}"  id="date" type="date" required>
                                        </fieldset>
                                    </div>

                                    <!-- عرض وحفظ total amount -->
                                    <div>
                                        <span>total amount:</span>
                                        <input type="text" id="total_amount"  name="total_amount" value="{{$income->total_amount}}" readonly>
                                    </div>

                                    <!-- زر الإضافة -->
                                    <div class="col-12">
                                        <button class="tf-button w-full" type="submit">اضافة المنتج</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /form-add-product -->
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#date", {
            dateFormat: "Y-m-d", // تنسيق التاريخ
            locale: "en" // اللغة
        });
    })

        // عناصر HTML
        const incomeType = document.getElementById('income_type');
    const jobNumberField = document.getElementById('job_number_field');
    const jobNumberInput = document.getElementById('job_number');
    const cashTypeField = document.getElementById('cash_type_field');
    const amountInput = document.getElementById('amount');
    const totalAmountInput = document.getElementById('total_amount');

    // تحديث العرض بناءً على نوع الدخل
    incomeType.addEventListener('change', () => {
        const selectedType = incomeType.value;
        if (selectedType === 'side_job') {
            jobNumberField.style.display = 'block';
            cashTypeField.style.display = 'none';
        } else if (selectedType === 'company_job') {
            jobNumberField.style.display = 'none';
            cashTypeField.style.display = 'block';
        } else {
            jobNumberField.style.display = 'none';
            cashTypeField.style.display = 'none';
        }
        calculateTotal();
    });

    // حساب total amount عند إدخال القيم
    jobNumberInput.addEventListener('input', calculateTotal);
    amountInput.addEventListener('input', calculateTotal);
    incomeType.addEventListener('change', calculateTotal);

    function calculateTotal() {
        const amount = parseFloat(amountInput.value) || 0;
        const jobNumber = parseInt(jobNumberInput.value) || 0;
        const selectedType = incomeType.value;

        let totalAmount = amount;

        if (selectedType === 'side_job') {
            totalAmount = amount - (jobNumber * 3);
        } else if (selectedType === 'company_job') {
            const cashType = document.getElementById('cash_type').value;
            if (cashType === 'credit') {
                totalAmount = amount - (amount * 0.03);
            }
        }

        totalAmountInput.value = totalAmount.toFixed(2);
    }
</script>
</body>

</html>
