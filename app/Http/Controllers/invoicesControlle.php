<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use Illuminate\Http\Request;

class invoicesControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // جلب جميع الفواتير بشكل افتراضي
        $query = Invoices::query();
        // التحقق من وجود تواريخ للفلترة
        if ($request->has('date')  && $request->date) {
            // إذا تم اختيار تواريخ، يتم فلترة النتائج
            $query->where('date', $request->date);
        }
        // جلب النتائج مع ترقيم الصفحات
        $invoices = $query->paginate(10);

        // عرض الصفحة مع النتائج
        return view('dashboard.invoices', compact('invoices'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:1|max:10000',
            'date' => 'required|date',
            'description' => 'required|string|max:1000',
            'invoice_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240', // الصورة اختيارية
        ]);

        try {
            $filename = null; // تعريف المتغير بقيمة افتراضية

            // التحقق إذا كان الملف موجودًا
            if ($request->hasFile('invoice_image')) {
                $file = $request->file('invoice_image');

                // التحقق من نجاح رفع الملف
                if ($file->isValid()) {
                    $filename = $file->getClientOriginalName();
                    $file->storeAs('public/invoices', $filename);
                }
            }

            // إضافة البيانات إلى قاعدة البيانات
            Invoices::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'price' => $request->price,
                'date' => $request->date,
                'description' => $request->description,
                'invoice_image' => $filename, // يمكن أن يكون null إذا لم يتم رفع صورة
            ]);

            return redirect()->route('invoices.index')->with('success', 'Invoice added successfully');
        } catch (\Exception $e) {
            return "error: " . $e->getMessage();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.editInvoices', [
            'invoice' => Invoices::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:1|max:10000',
            'date' => 'required|date',
            'description' => 'required|string|max:1000',
            'invoice_image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
        ]);

        $invoice = Invoices::findOrFail($id);
        $invoice->update([
            'title' => $request->title,
            'price' => $request->price,
            'date' => $request->date,
            'description' => $request->description,
             'invoice_image' => $request->invoice_image,
        ]);
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoices::findOrFail($id)->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
    }



}
