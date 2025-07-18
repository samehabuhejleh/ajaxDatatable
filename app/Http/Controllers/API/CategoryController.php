<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        DB::beginTransaction();
        try {
            $perPage = $request->input('per_page', 10);

            $categories = Category::orderBy('sort_order')
                ->paginate($perPage)
                ->appends($request->query());

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Categories fetched successfully.',
                'data' => CategoryResource::collection($categories),
                'pagination' => [
                    'current_page' => $categories->currentPage(),
                    'last_page' => $categories->lastPage(),
                    'per_page' => $categories->perPage(),
                    'total' => $categories->total(),
                ]
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to fetch categories.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Category fetched successfully.',
                'data' => new CategoryResource($category),
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Failed to fetch category.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
