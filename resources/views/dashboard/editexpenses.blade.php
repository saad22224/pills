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
                                            <a href="{{route('incomePage.index')}}" class="">
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
                            <form class="tf-section-2 form-add-product" enctype="multipart/form-data" action="{{route('expenses.update' , $expense->id)}}" method="Post">
                                @csrf
                                @method('PUT')
                                <div dir="rtl" class="wg-box">
                                    <fieldset class="name">
                                        <div class="body-title mb-10"> invoices name <span class="tf-color-1">*</span>
                                        </div>
                                        <input class="mb-10" type="text"  placeholder="invoices name" name="title"
                                            tabindex="0" value="{{$expense->title}}" aria-required="true" required="">
                                        <div class="text-tiny">لا تتجاوز 20 حرفًا عند إدخال المنتج
                                            اسم.</div>
                                    </fieldset>




                                    <select name="type" id="select" value="{{$expense->type}}">
                                        <option value="choose" disabled selected id="">expenses type</option>
                                        <option value="Home expenses" id="">Home expenses</option>
                                        <option value="personal expenses" id="">personal expenses</option>
                                        <option value="work expenses" id="">work expenses</option>
                                    </select>

                                    <select name="provider" id="select" value="{{$expense->provider}}">
                                        <option value="" disabled selected>Choose a provider</option>
                                        <option value="supermarket">Supermarket</option>
                                        <option value="rent">Rent</option>
                                        <option value="electricity">Electricity</option>
                                        <option value="water">Water</option>
                                        <option value="internet">Internet</option>
                                        <option value="groceries">Groceries</option>
                                        <option value="transportation">Transportation</option>
                                        <option value="gas">Gas</option>
                                        <option value="education">Education</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="insurance">Insurance</option>
                                        <option value="subscriptions">Subscriptions</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="mobile">Mobile Recharge</option>
                                        <option value="clothing">Clothing</option>
                                        <option value="restaurants">Restaurants</option>
                                        <option value="furniture">Furniture</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="charity">Charity</option>
                                        <option value="childcare">Childcare</option>
                                        <option value="maintenance">Home Maintenance</option>
                                        <option value="travel">Travel</option>
                                        <option value="gym">Gym Membership</option>
                                        <option value="pets">Pet Care</option>
                                        <option value="beauty">Beauty & Personal Care</option>
                                        <option value="books">Books & Stationery</option>
                                        <option value="software">Software & Licenses</option>
                                        <option value="events">Events & Celebrations</option>

                                        <option value="other">other</option>
                                    </select>

                                    <div class="gap22 cols">
                                        <fieldset class="category">
                                            <div class="body-title mb-10">price <span class="tf-color-1">*</span>
                                            </div>
                                            <div class="">
                                                <input name="price" type="number" value="{{$expense->price}}"  placeholder="price">
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="gap22 cols">
                                        <fieldset class="category">
                                            <div class="body-title mb-10">Date <span class="tf-color-1">*</span></div>
                                            <div>
                                                <input name="date" value="{{$expense->date}}"  type="date" id="date" placeholder="Date" lang="en">
                                            </div>
                                        </fieldset>
                                    </div>


                                    <fieldset class="description">
                                        <div class="body-title mb-10">description <span class="tf-color-1">*</span>
                                        </div>
                                        <textarea  class="mb-10" name="description" placeholder="description" tabindex="0"
                                            aria-required="true" required="">{{$expense->description }} </textarea>
                                        <div class="text-tiny">لا تتجاوز 100 حرف عند الدخول
                                            اسم المنتج.</div>
                                    </fieldset>
                                </div>
                                <div dir="rtl" class="wg-box">
                                    <fieldset>
                                        <div class="body-title mb-10">ارفق الصور </div>
                                        <div class="upload-image mb-16">
                                            <div class="item">
                                                <img src="images/upload/upload-1.png" alt="">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('storage/expenses/' . $expense->expense_image) }}" alt="">
                                            </div>
                                            <div class="item up-load">
                                                <label class="uploadfile" for="myFile">
                                                    <span class="icon">
                                                        <i class="icon-upload-cloud"></i>
                                                    </span>
                                                    <span class="text-tiny">أسقط صورك هنا أو اختر <span
                                                            class="tf-color">click to browse</span></span>
                                                    <input type="file" value="{{$expense->expense_image }} " id="myFile"  name="invoice_image">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="body-text">تحتاج إلى إضافة 4 صور على الأقل. انتبه إلى جودة الصور
                                            التي تضيفها، والتزم بمعايير ألوان الخلفية. يجب أن تكون الصور بأبعاد
                                            معينة. لاحظ أن المنتج يظهر كافة التفاصيل</div>
                                    </fieldset>


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
</script>
</body>

</html>
