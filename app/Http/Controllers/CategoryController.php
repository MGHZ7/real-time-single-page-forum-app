<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'signup']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()->json(
            [
                'message' => 'created',
                'code' => 202
            ],
            Response::HTTP_ACCEPTED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Category $category
     * @return \App\Http\Resources\CategoryResource
     */
    public function show(Category $category)
    {
        return new \App\Http\Resources\CategoryResource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);

        return \response()->json(
            [
                'message' => 'Category Updated Successfully',
                'code' => Response::HTTP_ACCEPTED
            ],
            202
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return \response()->json(
            [
                'message' => 'Category Deleted Successfully',
                'code' => 202
            ],
            Response::HTTP_ACCEPTED
        );
    }
}
