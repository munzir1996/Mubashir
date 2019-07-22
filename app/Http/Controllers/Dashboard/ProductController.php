<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Purifier; 
use Image;
use Storage;
use File;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.products.index')->withproducts($products);
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

        $product = new Product();
        $product->ar_name = $request->ar_name;
        $product->ar_description = $request->ar_description;
        $product->en_name = $request->en_name;
        $product->en_description = $request->en_description;
        // dd($request);

        if($request->hasFile('photo')){
			$image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->photo->move(public_path('uploads/'), $filename);
			$location = public_path('images/'.$filename);
            Image::make($image)->resize(370, 247)->save($location);
			
            $product->photo = $filename;
        }
        
        // Shows .toaster message
        if ($product->save()) {
            Session::flash('success', '!تمت أضافة منتجات بنجاح');
            //Redirect to another page
		    return redirect()->route('products.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة منتجات الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('dashboard.products.edit')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ar_name' => 'required|max:100',
            'ar_description' => 'required',
            'en_name' => 'required|max:100',
            'en_description' => 'required',
            'photo' => 'sometimes',
        ]);

        $product = Product::findOrFail($id);

        $product->ar_name = $request->ar_name;
        $product->ar_description = $request->ar_description;
        $product->en_name = $request->en_name;
        $product->en_description = $request->en_description;

        if($request->hasFile('photo')){
            //Add the product photo
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(460.5, 225)->save($location);
            //Delete the image
            File::delete('images/'.$product->photo);

            //Update the database
            $product->photo = $filename;
        }

        // Shows .toaster message
        if ($product->save()) {
            Session::flash('success', '!تم التعديل المنتج بنجاح');
            //Redirect to another page
		    return redirect()->route('products.index');
        }

        Session::flash('error', 'حصل خطااثناء التعديل المنتج الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        File::delete('images/'.$product->photo);
        // Shows .toaster message
        if($product->delete()){

            Session::flash('success', 'تم حذف الأخبار بنجاح !');
            //Redirect to another page
		    return redirect()->route('products.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الأخبار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('products.index');
    }
}
