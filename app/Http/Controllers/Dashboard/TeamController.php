<?php

namespace App\Http\Controllers\Dashboard;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier; 
use Image;
use Storage;
use File;
use Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();

        return view('dashboard.teams.index')->withTeams($teams);
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
            'ar_specialization' => 'required',
            'en_name' => 'required|max:100',
            'en_specialization' => 'required',
            'photo' => 'required',
            'face' => 'sometimes',
            'insta' => 'sometimes',
            'google' => 'sometimes',
            'twit' => 'sometimes',
        ]);

        $team = new Team();
        $team->ar_name = $request->ar_name;
        $team->ar_specialization = $request->ar_specialization;
        $team->en_name = $request->en_name;
        $team->en_specialization = $request->en_specialization;
        if ($request->has('face')) {
            $team->face = $request->face;
        }
        if ($request->has('insta')) {
            $team->insta = $request->insta;
        }
        if ($request->has('google')) {
            $team->google = $request->google;
        }
        if ($request->has('twit')) {
            $team->twit = $request->twit;
        }
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
			$location = public_path('images/'.$filename);
            Image::make($image)->save($location);
			
            $team->photo = $filename;
        }
        
        // Shows .toaster message
        if ($team->save()) {
            Session::flash('success', '!تمت أضافة الفريق بنجاح');
            //Redirect to another page
		    return redirect()->route('teams.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الفريق الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('dashboard.teams.edit')->withTeam($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_name' => 'required|max:100',
            'ar_specialization' => 'required',
            'en_name' => 'required|max:100',
            'en_specialization' => 'required',
            'photo' => 'sometimes',
            'face' => 'sometimes',
            'insta' => 'sometimes',
            'google' => 'sometimes',
            'twit' => 'sometimes',
        ]);

        $team = Team::findOrFail($id);

        $team->ar_name = $request->ar_name;
        $team->ar_specialization = $request->ar_specialization;
        $team->en_name = $request->en_name;
        $team->en_specialization = $request->en_specialization;
        if ($request->has('face')) {
            $team->face = $request->face;
        }
        if ($request->has('insta')) {
            $team->insta = $request->insta;
        }
        if ($request->has('google')) {
            $team->google = $request->google;
        }
        if ($request->has('twit')) {
            $team->twit = $request->twit;
        }
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
			$location = public_path('images/'.$filename);
            Image::make($image)->save($location);
			
            $team->photo = $filename;
        }
        
        // Shows .toaster message
        if ($team->save()) {
            Session::flash('success', '!تمت تعديل الفريق بنجاح');
            //Redirect to another page
		    return redirect()->route('teams.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل الفريق الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        
        File::delete('images/'.$team->photo);
        // Shows .toaster message
        if($team->delete()){

            Session::flash('success', 'تم حذف الفريق بنجاح !');
            //Redirect to another page
		    return redirect()->route('teams.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الفريق الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('teams.index');
    }
}
