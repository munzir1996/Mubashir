<?php

namespace App\Http\Controllers\Dashboard;

use App\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::all();

        return view('dashboard.supports.index')->withSupports($supports);
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

        $support = new Support();
        $support->ar_detail = $request->ar_detail;
        $support->en_detail = $request->en_detail;
        // dd($request);

        // Shows .toaster message
        if ($support->save()) {
            Session::flash('success', '!تمت أضافة بنجاح');
            //Redirect to another page
		    return redirect()->route('supports.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('supports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $support = Support::findOrFail($id);

        return view('dashboard.supports.edit')->withSupport($support);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',

        ]);

        $support = Support::findOrFail($id);

        $support->ar_detail = $request->ar_detail;
        $support->en_detail = $request->en_detail;

        // Shows .toaster message
        if ($support->save()) {
            Session::flash('success', '!تم التعديل بنجاح');
            //Redirect to another page
		    return redirect()->route('supports.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('supports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy(Support $support)
    {
        //
    }
}
