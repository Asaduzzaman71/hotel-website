<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
     $categories=Category::paginate(10);
     return view('admin.allcategory',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $category= Category::create($this->validateRequest());
        Session::put('messege','Category inserted successfully!!!!');
        return redirect()->route('Category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.showcategory',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $category)
    {
         $category=Category::find($category);

         return view('admin.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($this->validateRequest());
          return redirect()->route('Category.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

     private function validateRequest(){
        return request()->validate([
            'category_name'=>'required',
            'category_based_no_of_rooms'=>'required|integer',
            'category_description'=>'required|max:1000',
          
          ]);  
    }
}
