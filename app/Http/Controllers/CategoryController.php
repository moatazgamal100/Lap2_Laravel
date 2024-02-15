<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\support\facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'required|image|mimes:png,jpg'
        ]);
        $imgName=Storage::putFile("public/categories",$data['img']);
        $data['img']=$imgName;
        Category::create($data);
        return redirect(url('/categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::findOrFail($id);
        $category->load('books');
        return view('categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::findOrFail($id);
        return view('categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'img'=>'nullable|image|mimes:png,jpg'
        ]);
        $category=Category::findOrFail($id);
        if($request->hasFile('img')){
            Storage::delete($category->img);
            $fimgName=Storage::putFile("public/categories",$data['img']);
            $data['img']=$fimgName;

        }
        $category->update($data);
        return redirect(url('/categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::findOrFail($id);
        Storage::delete($category->img);
        $category->delete();
        return redirect('/categories');
    }
}
