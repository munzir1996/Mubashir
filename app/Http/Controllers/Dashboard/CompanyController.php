<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('dashboard.companies.index')->withCompanies($companies);
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
            'ar_name' => 'required|max:100',
            'ar_profile' => 'required',
            'en_name' => 'required|max:100',
            'en_profile' => 'required',
            'happy_co' => 'required',
            'project_succ' => 'required',
            'years' => 'required',
            'professional' => 'required'

        ]);

        $company = new Company();
        $company->ar_name = $request->ar_name;
        $company->ar_profile = $request->ar_profile;
        $company->en_name = $request->en_name;
        $company->en_profile = $request->en_profile;
        $company->projectSuccessful = $request->project_succ;
        $company->yearsOfExperienced = $request->years;
        $company->professionalExpert = $request->professional;
        $company->happyCustomers = $request->happy_co;

        // Shows .toaster message
        if ($company->save()) {
            Session::flash('success', '!تمت أضافة الشركة بنجاح');
            //Redirect to another page
            return redirect()->route('companies.index');

        }

        Session::flash('error', 'حصل خطااثناء اضافة الشركة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('companies.index');
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
        $company = Company::findOrFail($id);

        return view('dashboard.companies.edit')->withCompany($company);
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
        $this->validate($request, [
            'ar_name' => 'required|max:100',
            'ar_profile' => 'required',
            'en_name' => 'required|max:100',
            'en_profile' => 'required',
            'happy_co' => 'sometimes',
            'project_succ' => 'sometimes',
            'years' => 'sometimes',
            'professional' => 'sometimes'
        ]);

        $company = Company::findOrFail($id);

        $company->ar_name = $request->ar_name;
        $company->ar_profile = $request->ar_profile;
        $company->en_name = $request->en_name;
        $company->en_profile = $request->en_profile;
        $company->projectSuccessful = $request->project_succ;
        $company->yearsOfExperienced = $request->years;
        $company->professionalExpert = $request->professional;
        $company->happyCustomers = $request->happy_co;

        // Shows .toaster message
        if ($company->save()) {
            Session::flash('success', '!تم التعديل الشركة بنجاح');
            //Redirect to another page
		    return redirect()->route('companies.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الشركة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        // Shows .toaster message
        if($company->delete()){

            Session::flash('success', 'تم حذف الشركة بنجاح !');
            //Redirect to another page
		    return redirect()->route('companies.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الشركة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('companies.index');
    }
}
