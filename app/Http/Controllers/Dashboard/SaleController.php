<?php

namespace App\Http\Controllers\Dashboard;

use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();

        return view('dashboard.sales.index')->withSales($sales);
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
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',
        ]);

        $sale = new Sale();
        $sale->ar_detail = $request->ar_detail;
        $sale->en_detail = $request->en_detail;
        // dd($request);

        // Shows .toaster message
        if ($sale->save()) {
            Session::flash('success', '!تمت أضافة بنجاح');
            //Redirect to another page
		    return redirect()->route('sales.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);

        return view('dashboard.sales.edit')->withSale($sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',

        ]);

        $sale = Sale::findOrFail($id);

        $sale->ar_detail = $request->ar_detail;
        $sale->en_detail = $request->en_detail;

        // Shows .toaster message
        if ($sale->save()) {
            Session::flash('success', '!تم التعديل بنجاح');
            //Redirect to another page
		    return redirect()->route('sales.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
