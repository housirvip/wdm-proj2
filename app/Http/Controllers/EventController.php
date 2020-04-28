<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
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
        $events = \App\Event::all();
        return view('eventos',['events' => $events]);
    }

    public function get()
    {
        return \App\Event::all();
    }

    public function post(Request $request)
    {
        $event = new \App\Event;
        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->image_url = $request->input('image_url');
        $event->save();
        return $event;
    }

    public function put(Request $request)
    {
        $event = \App\Event::find($request->input('id'));
        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->image_url = $request->input('image_url');
        $event->update();
        return $event;
    }

    public function delete(Request $request)
    {
        return \App\Event::destroy($request->input('id'));
    }
}
