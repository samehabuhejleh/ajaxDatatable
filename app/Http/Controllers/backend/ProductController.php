<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('backend.pages.product.index');
    }

    public function productDataTable()
    {
        $products = Product::all();

        return DataTables::of($products)
            ->addColumn('name', function ($product) {
                return $product->name;
            })
            ->addColumn('description', function ($product) {
                return $product->description;
            })
            ->addColumn('stock', function ($product) {
                return $product->stock;
            })
            ->addColumn('price', function ($product) {
                return $product->price;
            })
            ->addColumn('action', function ($product) {
               return '
                    <button type="button" class="btn btn-primary btn_edit" 
                        id="btn_edit"
                        data-product-id="' . $product->id . '" 
                        data-bs-toggle="modal" 
                        data-bs-target="#editModal">
                        Edit
                    </button>'.
                    ' <button type="button" class="btn btn-danger btn_delete"
                     data-product-id="' . $product->id . '"
                      id="btn_delete">
                        Delete
                    </button>';

            })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
             Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            return response()->json(['status' => true, 'message' => "Product Store Successfuly"], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $product = Product::find($id);
        return response()->json(['status' => true, 'data' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
        $product = Product::find($id);
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);

        return response()->json(['status'=>true, 'message'=>"Product Updated Successfully !"]);

       }catch(\Exception $e){
        return response()->json(['status'=>false, 'message'=>$e->getMessage()]);

       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    try{
        $product = Product::find($id);
        $product->delete();

        return response()->json(['status'=>true, 'message'=>"Product Deleted Successfully"]);

    }catch(\Exception $e){
        return response()->json(['status'=>false, 'message'=>$e->getMessage()]);
    }
    }
}
