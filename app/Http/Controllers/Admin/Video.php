<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Video\Store as SaveVideoRequest;
use App\Models\Video as MVideo;

class Video extends Controller
{
   
    public function index()
    {
        return view('admin.videos.index', ['videos' => MVideo::orderByDesc('created_at')->with('user')->paginate(5)]);
    }

   
    public function create()
    {
        return view('admin.videos.create');
    }

   
    public function store(SaveVideoRequest $request)
    {
        $data = $request->validated() + ['user_id' => auth()->id()];
        $video = MVideo::create($data);
        return redirect()->route('video.show', [ $video->id ]);
    }

   
    public function show($id)
    {
        $video = MVideo::with('comments')->findOrFail($id);
        return view('admin.videos.show', compact('video'));
    }

   
    public function edit($id)
    {
        $this->authorize('update', MVideo::findOrfail($id));
        $video = MVideo::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    
    public function update(SaveVideoRequest $request, $id)
    {
        $data = $request->validated();
        $video = MVideo::findOrFail($id);
        $video->update($data);
        return redirect()->route('video.show', [ $video->id ]);
    }

    
    public function destroy($id)
    {
        Mvideo::findOrFail($id)->delete();
        return redirect()->route('video.index');
    }
}
