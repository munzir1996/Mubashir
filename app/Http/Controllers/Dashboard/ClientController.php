<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier;
use Image;
use Storage;
use File;
use Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('dashboard.clients.index')->withClients($clients);
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
            'name' => 'required|max:100',
            'photo' => 'required',
        ]);

        $client = new Client();
        $client->name = $request->name;
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
            $location = public_path('images/'.$filename);
            Image::make($image)->save($location);
            Image::make($image)->resize(150, 100)->save($location);

            $client->photo = $filename;
        }

        // Shows .toaster message
        if ($client->save()) {
            Session::flash('success', '!تمت أضافة العميل بنجاح');
            //Redirect to another page
		    return redirect()->route('clients.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة العميل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('dashboard.clients.edit')->withClient($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'photo' => 'sometimes',
        ]);

        $client = Client::findOrFail($id);

        $client->name = $request->name;

        if($request->hasFile('photo')){

            //Add the new photo
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(150, 100)->save($location);
            $oldFilename = $client->photo;
            //Update the database
            $client->photo = $filename;
            //Delete the image
            File::delete('images/'.$oldFilename);
        }

        // Shows .toaster message
        if ($client->save()) {
            Session::flash('success', '!تم التعديل العميل بنجاح');
            //Redirect to another page
		    return redirect()->route('clients.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل العميل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        File::delete('images/'.$client->photo);
        // Shows .toaster message
        if($client->delete()){

            Session::flash('success', 'تم حذف العميل بنجاح !');
            //Redirect to another page
		    return redirect()->route('clients.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف العميل الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('clients.index');
    }
}
