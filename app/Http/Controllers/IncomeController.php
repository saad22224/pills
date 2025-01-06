<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // استدعاء الفواتير
        $query = income::query();

        // فلترة بالتاريخ إذا تم التحديد
        if ($request->has('date_from') && $request->has('date_to')) {
            $query->where('date_from' , $request->date_from)->orWhere('date_to' , $request->date_to);
        }

        // جلب النتائج مع ترقيم الصفحات
        $incomes = $query->paginate(10);

        // عرض الصفحة مع النتائج
        return view('dashboard.income', compact('incomes'));
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
            'income_type' => 'required',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'total_amount' => 'required|numeric|min:1|max:10000000',
        ]);

        try {


            // إضافة البيانات إلى قاعدة البيانات
            income::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'income_type' => $request->income_type,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'total_amount' => $request->total_amount,
            ]);

            return redirect()->route('income.index')->with('success', 'Invoice added successfully');
        } catch (\Exception $e) {
            return "error: " . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return  view('dashboard.editIncome',[
        'income' => income::findOrFail($id)
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'income_type' => 'required|string|max:255',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'total_amount' => 'required|numeric|min:1|max:10000',
        ]);

        $invoice = income::findOrFail($id);
        $invoice->update([
            'title' => $request->title,
            'income_type' => $request->income_type,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
             'total_amount' => $request->total_amount,
        ]);
        return redirect()->route('income.index')->with('success', 'income updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        income::findOrFail($id)->delete();
        return redirect()->route('income.index')->with('success', 'income deleted successfully');
    }
}
