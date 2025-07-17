<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $datatable){
     return $datatable->render('backend.pages.category.index');
    }

    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
    ]);

    $category = Category::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'image' => $request->image,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
    ]);

    return response()->json(['success' => true, 'message'=>"Category Created Successfully"]);
    }


     public function edit($id)
    {
         $category = Category::find($id);
        return response()->json(['status' => true, 'data' => $category]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|string',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
    ]);

    $category = Category::findOrFail($id);

    $category->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'description' => $request->description,
        'image' => $request->image,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
    ]);

    return response()->json(['success' => true, 'message'=>"Category Updated Successfully"]);
}

 public function destroy($id)
    {
    try{
        $category = Category::find($id);
        $category->delete();

        return response()->json(['status'=>true, 'message'=>"Category Deleted Successfully"]);

    }catch(\Exception $e){
        return response()->json(['status'=>false, 'message'=>$e->getMessage()]);
    }
    }
}
