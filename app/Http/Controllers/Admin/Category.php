<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Сategory\Store as SaveRequest;
use App\Http\Requests\Сategory\Update;
use App\Models\Category as MCategory;


class Category extends Controller
{
   
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => MCategory::paginate(5),
        ]);

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $category = MCategory::create($data);
        return redirect()->route('categories.show', [ $category->id ]);
    }

    public function show(MCategory $category)
    {
        return view('admin.categories.show', compact('category'));
    }


    public function edit(MCategory $category)
    { 
        $category = MCategory::findOrFail($category->id);
       
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Update $request, MCategory $category)
    {
        $data = $request->validated();
        $category = MCategory::findOrFail($category->id);
        $category->update($data);
        return redirect()->route('categories.index');
    }

    
    public function destroy(MCategory $category)
    {
        MCategory::findOrFail($category->id)->delete();
        return redirect()->route('categories.index');
    }
}
