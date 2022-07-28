<?php

namespace App\Http\Controllers;

use App\Http\Requests\Videos\Save as SaveRequest;
use App\Models\Video;

class Videos extends Controller
{
    public function index()
    {
        return view('videos.index', [ 'videos' => Video::orderByDesc('created_at')->get() ]);
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(SaveRequest $request)
    {
        $data = $request->validated();
        $video = Video::create($data);
        return redirect()->route('videos.show', [ $video->id ]);
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    public function update(SaveRequest $request, $id)
    {
        $data = $request->validated();
        $video = Video::findOrFail($id);
        $video->update($data);
        return redirect()->route('videos.show', [ $video->id ]);
    }

    public function destroy($id)
    {
        //
    }
}
