<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Category;
use Input as Input;
use Illuminate\Support\Facades\Auth;
Use Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id',null)->get();
        return view('admin.product.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foto 1
        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $request->file('photo')->move('static/dist/img/',$filename);
        //foto 2
        $file2 = $request->file('photo2');
        $filename2 = $file2->getClientOriginalName();
        $request->file('photo2')->move('static/dist/img/',$filename2);
        //foto 3
        $file3 = $request->file('photo3');
        $filename3 = $file3->getClientOriginalName();
        $request->file('photo3')->move('static/dist/img/',$filename3);
        $product = new Product;
        $product->slug = $request->slug;
        $product->photo = 'static/dist/img/'.$filename;
        $product->photo2 = 'static/dist/img/'.$filename2;
        $product->photo3 = 'static/dist/img/'.$filename3;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect('admin/product')->with('success', 'Data Successfully added!');

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
        $product = Product::find($id);
        $category = Category::where('parent_id',null)->get();
        return view('admin.product.edit',compact('product','category'));
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

        if($file = $request->file('photo'))
        {
        $filename = $file->getClientOriginalName();
        $request->file('photo')->move('static/dist/img/',$filename);
        }
        else{
            $img = $request->tmp_image;
        }
        $product = Product::find($id);
        $product->slug = $request->slug;
        $product->photo = $img;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->user_id = Auth::user()->id;
        $product->save();
        return redirect('admin/product')->with('success', 'Data Successfully added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Alert::success('','Product has been delete');
        return redirect(route('product.index'));
    }
}
