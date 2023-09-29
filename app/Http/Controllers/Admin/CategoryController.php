<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $filename = '';
        if($request->hasFile('image')){
            $file = $request->image;
            $filename = time() . '.' . $file->getCLientOriginalExtension();
            $file->move('uploads/category', $filename);
        }
        Category::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['slug']),
            'description' => $data['description'],
            'image' => $filename,
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keyword' => $data['meta_keyword'],
            'navbar_status' => $request->navbar_status == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'created_by' => Auth::user()->id,
        ]);
        return redirect('admin/category')->with('message','Category Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.create',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, string $id)
    {
        $data = $request->validated();
        $category = Category::find($id);

        $filename = '';

        if($request->hasFile('image')){
            $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->image;
            $filename = time() . '.' . $file->getCLientOriginalExtension();
            $file->move('uploads/category', $filename);
        }
        $category->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['slug']),
            'description' => $data['description'],
            'image' => $filename,
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keyword' => $data['meta_keyword'],
            'navbar_status' => $request->navbar_status == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'created_by' => Auth::user()->id,
        ]);
        return redirect('admin/category')->with('message','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $destination = 'uploads/category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            
        $category->delete();
        return redirect('admin/category')->with('message','Category Deleted Successfully');
    }
}
