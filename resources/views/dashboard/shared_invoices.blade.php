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
    @media(max-width:450px){
        #print-btn{
            /* display: none; */
            position: absolute;
            left: 10%;
            top: 5%;
        }
        .user_name_invoices{
            /* display: none; */
            transform: translateY(270%);
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
                <!--      <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>


                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="wg-filter flex-grow">

                                                <p class="user_name_invoices" style="text-align: center; position:relative; left:50%">{{$user->name}}  invoices</p>


                                    <button style="margin-top: 20px;" id="print-btn" class="tf-button">
                                        <i class="icon-printer"></i> Print
                                    </button>
                                </div>
                                </div>

                                <!-- product-list -->
                                <div class="wg-box">
                                    <div class="title-box">
                                        <i class="icon-coffee"></i>

                                    </div>
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">

                                        </div>



                                    </div>
                                    <div class="wg-table table-product-list" id="table-to-print">
                                        <ul class="table-title flex gap20 mb-14">
                                            <li>
                                                <div class="body-title">invoice name</div>
                                            </li>

                                            <li>
                                                <div class="body-title" style="transform: translateX(-10%);">price</div>
                                            </li>
                                            <li>
                                                <div class="body-title" style="transform: translateX(-10%);">date</div>
                                            </li>
                                            <li>
                                                <div class="body-title" style="transform: translateX(-100%);">description</div>
                                            </li>

                                        </ul>
                                        @foreach($invoices as $invoice)


                                        <ul class="flex flex-column">
                                            <li class="product-item gap14">
                                                <div class="image no-bg">
                                                    <img src="{{ asset('storage/invoices/' . $invoice->invoice_image) }}" alt="">
                                                </div>
                                                <div class="flex items-center justify-between gap20 flex-grow">
                                                    <div class="body-title-2" style="font-size: 17px;">

                                                        {{$invoice->title}}
                                                    </div>
                                                    <div class="body-text"> {{$invoice->price}}</div>

                                                    <div class="body-text"> {{$invoice->date}}</div>



                                                    <div class="body-text"> {{$invoice->description}}</div>
                                                    <div class="list-icon-function">



                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10">
                                        <div class="text-tiny">Showing 10 entries</div>

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



            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("print-btn").addEventListener("click", function() {
                    const {
                        jsPDF
                    } = window.jspdf;
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
                            const title = item.querySelector('.body-title-2');
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
                            head: [
                                ["Invoice Name", "Price", "Date", "Description"]
                            ], // حدد الأعمدة التي تريدها
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
