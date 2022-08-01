<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\Save as SaveRequest;
use App\Http\Requests\Tags\Update as UpdateRequest;
use App\Models\Tag as MTag;

class Tag extends Controller
{
    public function index()
    {
        return view('admin.tags.index', [ 'tags' => MTag::paginate(5) ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
       
        MTag::create($data);
        return redirect()->route('tags.index');
    }

    public function show()
    {
        abort(404);
    }

    public function edit($id)
    {
        $tag = MTag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $tag = MTag::findOrFail($id);
        $tag->update($data);
        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        MTag::findOrFail($id)->delete();
        return redirect()->route('tags.index');
    }

}
