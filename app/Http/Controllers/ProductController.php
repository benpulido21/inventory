<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }

    public function index(){

    	$products = Product::all();

    	return view('products.index',compact('products'));
    }

    public function create(){

    	return view('products.create');
    }

    public function store(Request $request){

    	$this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $product = new Product;

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->user_id = Auth::user()->id;
        $product->save();

         return redirect('products')->with('success','PRODUCTO CREADO CON ÉXITO');
    }

    public function edit($id){

    	$product = Product::find($id);

    	return view('products.edit',compact('product'));
    }

    public function update(Request $request, $id){
        
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);


        $product = Product::find($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        
        return redirect('products')->with('success','PRODUCTO ACTUALIZADO CON ÉXITO');

    }

    public function destroy($id){

    	$product = Product::find($id);

    	$product->delete();

    	 return redirect('products')->with('success','PRODUCTO ELIMINADO CON ÉXITO');
    }

}
