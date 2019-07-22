<?php

namespace App\Http\Controllers\Dashboard;
use Session;
use App\Affair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AffairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affairs = Affair::all();

        return view('dashboard.affairs.index')->withAffairs($affairs);
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

        $affair = new Affair();
        $affair->ar_detail = $request->ar_detail;
        $affair->en_detail = $request->en_detail;
        // dd($request);

        // Shows .toaster message
        if ($affair->save()) {
            Session::flash('success', '!تمت أضافة بنجاح');
            //Redirect to another page
		    return redirect()->route('affairs.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('affairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affair  $affair
     * @return \Illuminate\Http\Response
     */
    public function show(Affair $affair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affair  $affair
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $affair = Affair::findOrFail($id);

        return view('dashboard.affairs.edit')->withAffair($affair);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affair  $affair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_detail' => 'required',
            'en_detail' => 'required',

        ]);

        $affair = Affair::findOrFail($id);

        $affair->ar_detail = $request->ar_detail;
        $affair->en_detail = $request->en_detail;

        // Shows .toaster message
        if ($affair->save()) {
            Session::flash('success', '!تم التعديل بنجاح');
            //Redirect to another page
		    return redirect()->route('affairs.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('affairs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affair  $affair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affair $affair)
    {
        //
    }
}
