<?php

namespace App\Http\Controllers\Dashboard;

use App\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $systems = System::all();

        return view('dashboard.systems.index')->withSystems($systems);
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

        $system = new System();
        $system->ar_detail = $request->ar_detail;
        $system->en_detail = $request->en_detail;
        // dd($request);

        // Shows .toaster message
        if ($system->save()) {
            Session::flash('success', '!تمت أضافة بنجاح');
            //Redirect to another page
		    return redirect()->route('systems.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('systems.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $system = System::findOrFail($id);

        return view('dashboard.systems.edit')->withSystem($system);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',

        ]);

        $system = System::findOrFail($id);

        $system->ar_detail = $request->ar_detail;
        $system->en_detail = $request->en_detail;

        // Shows .toaster message
        if ($system->save()) {
            Session::flash('success', '!تم التعديل بنجاح');
            //Redirect to another page
		    return redirect()->route('systems.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('systems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
