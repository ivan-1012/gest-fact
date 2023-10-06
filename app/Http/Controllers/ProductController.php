<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::select('products.id', 'products.product_nam', 'products.descriptions', 'products.id_category', 'categories.name_category', 'products.price', 'products.stock')
        ->join('categories', 'products.id_category', '=', 'categories.id')
        ->orderBy('products.id', 'ASC')
        ->paginate(10);

        return view('product.index', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_category = Category::pluck('name_category', 'id');
        return view('product.create', compact('type_category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_nam = $request->get('name_product');
        $product->descriptions = $request->get('observacion');
        $product->id_category = $request->get('tipo_categoria');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        
        $product->save();
        return Redirect::to('productos')->with('success', 'Producto creado correctamente');
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
        $type_category = Category::pluck('name_category', 'id');
        $product = Product::findOrFail($id);
        return view("product.edit", ["product" => $product , "type_category" => $type_category]);
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
        $product = Product::findOrFail($id);
        $product->product_nam = $request->get('name_product');
        $product->descriptions = $request->get('observacion');
        $product->id_category = $request->get('tipo_categoria');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        
        $product->save();
        return Redirect::to('productos')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return Redirect::to('productos')->with('success', 'Producto eliminado correctamente');
    }
}
