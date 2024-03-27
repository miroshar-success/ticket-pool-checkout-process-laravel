<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::OrderBy('id','DESC')->get();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required',
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = (new AppHelper)->saveImage($request);
        }
        Category::create( $data);
        return redirect()->route('category.index')->withStatus(__('Category has added successfully.'));
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.category.edit', compact( 'category'));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'bail|required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            (new AppHelper)->deleteFile($category->image);
            $data['image'] = (new AppHelper)->saveImage($request);
        }
        Category::find($category->id)->update( $data);
        return redirect()->route('category.index')->withStatus(__('Category has updated successfully.'));
    }

}
