<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Category;

class ProductController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        //insert ke Table Data (Data nama seusai pengguna)
        //Data::create($request-> all());   <- Cara pertama harus urut
        $request->validate([
            //validasi, bagian name itu rule nya
            'product_name' => 'required|min:3|max:10',
            'price' => 'required',
            'stock' => 'required'
        ]);
        
        Data::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        //return back untuk tetap di path sebelumnya 
        return back();
        //return redirect untuk ke path alamat yang dituju
        //setelah submit
        //return redirect('/products');
    }

    public function viewProduct()
    {
        $products = Data::all();
        return view('products', compact('products'));
    }

    public function edit($id)
    {
        $products = Data::where('id',$id)->first();
        return view('edit', compact('products'));
    }

    public function update(Request $request, $id)
    {
        Data::where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect('/products');
    }

    public function delete($id){
        Data::destroy($id);
        return back();
    }
}
