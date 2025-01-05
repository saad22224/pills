<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use Illuminate\Http\Request;

class expensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = auth()->user()->expenses()->paginate(5);
        return view('dashboard.expenses', compact('expenses'));
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
            'expenses_image' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
            'type' => 'required|string',
            'provider' => 'required|string',
        ]);

        try {
            // التحقق إذا كان الملف موجودًا
            if ($request->hasFile('expenses_image')) {
                $file = $request->file('expenses_image');

                // التحقق من نجاح رفع الملف
                if ($file->isValid()) {
                    $filename = $file->getClientOriginalName();
                    $file->storeAs('public/expenses', $filename);
                } else {
                    // إذا كانت المشكلة في رفع الملف
                    return "error, 'File is not valid!";
                }
            } else {
                // إذا لم يتم رفع الملف
                return "error Please upload an expenses image ";
            }

            // إضافة البيانات إلى قاعدة البيانات
            expenses::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'price' => $request->price,
                'date' => $request->date,
                'description' => $request->description,
                'type' => $request->type,
                'provider' => $request->provider,
                'expenses_image' => $filename,
            ]);
            return redirect()->route('expenses.index')->with('success', 'Invoice added successfully');
        } catch (\Exception $e) {
            return "error" . $e->getMessage();
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
        return view('dashboard.editexpenses', [
            'expense' => expenses::findOrFail($id)
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

        $invoice = expenses::findOrFail($id);
        $invoice->update([
            'title' => $request->title,
            'price' => $request->price,
            'date' => $request->date,
            'description' => $request->description,
            'expenses_image' => $request->invoice_image,
            'type' => $request->type,
            'provider' => $request->provider,
        ]);
        return redirect()->route('expenses.index')->with('success', 'expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        expenses::findOrFail($id)->delete();
        return redirect()->route('expenses.index')->with('success', 'expense deleted successfully');
    }
}
