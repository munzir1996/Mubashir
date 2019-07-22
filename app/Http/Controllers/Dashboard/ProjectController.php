<?php

namespace App\Http\Controllers\Dashboard;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier; 
use Image;
use Storage;
use File;
use Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('dashboard.projects.index')->withprojects($projects);
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
            'ar_description' => 'required',
            'en_name' => 'required|max:100',
            'en_description' => 'required',
            'photo' => 'required',
        ]);

        $project = new Project();
        $project->ar_name = $request->ar_name;
        $project->ar_description = $request->ar_description;
        $project->en_name = $request->en_name;
        $project->en_description = $request->en_description;
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
			$location = public_path('images/'.$filename);
            Image::make($image)->save($location);
			
            $project->photo = $filename;
        }
        
        // Shows .toaster message
        if ($project->save()) {
            Session::flash('success', '!تمت أضافة المشروع بنجاح');
            //Redirect to another page
		    return redirect()->route('projects.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة المشروع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('dashboard.projects.edit')->withproject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename = '';
        $this->validate($request, [
            'ar_name' => 'required|max:100',
            'ar_description' => 'required',
            'en_name' => 'required|max:100',
            'en_description' => 'required',
            'photo' => 'sometimes',
        ]);

        $project = project::findOrFail($id);

        $project->ar_name = $request->ar_name;
        $project->ar_description = $request->ar_description;
        $project->en_name = $request->en_name;
        $project->en_description = $request->en_description;
        
        
        if($request->hasFile('photo')){
            
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //Add the project photo
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);
            File::delete('images/'.$project->photo);
            //Update the database
            $project->photo = $filename;
            //Delete the image
        }

        // Shows .toaster message
        if ($project->save()) {
            Session::flash('success', '!تم التعديل المشروع بنجاح');
            //Redirect to another page
           return redirect()->route('projects.index');
        //    return $request->photo;

        }

        Session::flash('error', 'حصل خطااثناء التعديل المشروع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        File::delete('images/'.$project->photo);
        // Shows .toaster message
        if($project->delete()){

            Session::flash('success', 'تم حذف المشروع بنجاح !');
            //Redirect to another page
		    return redirect()->route('projects.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف المشروع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('projects.index');
    }
}
