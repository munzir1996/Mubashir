<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier; 
use Image;
use Storage;
use File;
use Session;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:100',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // Shows .toaster message
        if ($user->save()) {
            Session::flash('success', '!تمت أضافة الأدمن بنجاح');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
     
        $this->validate($request, [
            'name' => 'sometimes|max:100',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes',
        ]);


        if ($request->has('name'))
        {
            $user->name = $request->name;
        }
        if ($request->has('email') && $user->email != $request->email)
        {
            $user->email = $request->email;
        }
        
        if ($request->has('password') && $request->password == $request->password_confirmation)
        {
            $user->password = bcrypt($request->password);
        }

        // Shows .toaster message
        if($user->save()){

            Session::flash('success', 'تم تعديل الأدمن بنجاح !');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Shows .toaster message
        if($user->delete()){

            Session::flash('success', 'تم حذف الأدمن بنجاح !');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.index');
    }
}
