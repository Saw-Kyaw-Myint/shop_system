<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
       
        return view('pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {    
        if($request->hasFile('cimage')){
            $imageName=uniqid()."cimage".$request->cimage->extension();
            $request->cimage->storeAs('public/',$imageName);
        }
        Category::create(['ctitle'=>$request->ctitle,'cimage'=>$imageName]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
         return view('pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return route('category.index)
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
         
        if($request->hasFile('cimag')){
            $imageName= uniqid().'image'.$request->cimage;
            $request->cimage->storeAs('public/',$request->cimage);
            Storage::delete('public/' . $category->cimage);
        }else{
            $imageName=$category->cimage;
        }
        $category->update(['ctitle'=>$request->ctitle,'cimage'=>$imageName]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return back();
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }

    
}
