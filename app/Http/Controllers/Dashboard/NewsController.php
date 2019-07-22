<?php

namespace App\Http\Controllers\Dashboard;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier;
use Image;
use Storage;
use File;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('dashboard.news.index')->withNews($news);
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
            'ar_title' => 'required|max:100',
            'ar_details' => 'required',
            'en_title' => 'required|max:100',
            'en_details' => 'required',
            'photo' => 'required',
        ]);

        $new = new News();
        $new->ar_title = $request->ar_title;
        $new->ar_details = $request->ar_details;
        $new->en_title = $request->en_title;
        $new->en_details = $request->en_details;
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(450, 355)->save($location);

            $new->photo = $filename;
        }

        // Shows .toaster message
        if ($new->save()) {
            Session::flash('success', '!تمت أضافة الأخبار بنجاح');
            //Redirect to another page
		    return redirect()->route('news.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الأخبار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);

        return view('dashboard.news.edit')->withNew($new);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_title' => 'required|max:100',
            'ar_details' => 'required',
            'en_title' => 'required|max:100',
            'en_details' => 'required',
            'photo' => 'sometimes',
        ]);

        $new = News::findOrFail($id);

        $new->ar_title = $request->ar_title;
        $new->ar_details = $request->ar_details;
        $new->en_title = $request->en_title;
        $new->en_details = $request->en_details;

        if($request->hasFile('photo')){

            //Add the new photo
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(450, 355)->save($location);
            $oldFilename = $new->photo;
            //Update the database
            $new->photo = $filename;
            //Delete the image
            File::delete('images/'.$oldFilename);
        }

        // Shows .toaster message
        if ($new->save()) {
            Session::flash('success', '!تم التعديل الأخبار بنجاح');
            //Redirect to another page
		    return redirect()->route('news.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل الأخبار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);

        File::delete('images/'.$new->photo);
        // Shows .toaster message
        if($new->delete()){

            Session::flash('success', 'تم حذف الأخبار بنجاح !');
            //Redirect to another page
		    return redirect()->route('news.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الأخبار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('news.index');
    }
}
