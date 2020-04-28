<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $videos = \App\Video::all();
        return view('videos', ['videos' => $videos]);
    }

    public function get()
    {
        return \App\Video::all();
    }

    public function post(Request $request)
    {
        $video = new \App\Video;
        $video->author = $request->input('author');
        $video->description = $request->input('description');
        $video->url = $request->input('url');
        $video->save();
        return $video;
    }

    public function put(Request $request)
    {
        $video = \App\Video::find($request->input('id'));
        $video->author = $request->input('author');
        $video->description = $request->input('description');
        $video->url = $request->input('url');
        $video->update();
        return $video;
    }

    public function delete(Request $request)
    {
        return \App\Video::destroy($request->input('id'));
    }
}
