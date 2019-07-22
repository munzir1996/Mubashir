<?php

namespace App\Http\Controllers\Dashboard;

use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = Pharmacy::all();

        return view('dashboard.pharmacies.index')->withPharmacies($pharmacies);
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

        $pharmacy = new Pharmacy();
        $pharmacy->ar_detail = $request->ar_detail;
        $pharmacy->en_detail = $request->en_detail;
        // dd($request);

        // Shows .toaster message
        if ($pharmacy->save()) {
            Session::flash('success', '!تمت أضافة بنجاح');
            //Redirect to another page
		    return redirect()->route('pharmacies.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('pharmacies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmacy $pharmacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);

        return view('dashboard.pharmacies.edit')->withpharmacy($pharmacy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',

        ]);

        $pharmacy = Pharmacy::findOrFail($id);

        $pharmacy->ar_detail = $request->ar_detail;
        $pharmacy->en_detail = $request->en_detail;

        // Shows .toaster message
        if ($pharmacy->save()) {
            Session::flash('success', '!تم التعديل بنجاح');
            //Redirect to another page
		    return redirect()->route('pharmacies.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('pharmacies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacy $pharmacy)
    {
        //
    }
}
