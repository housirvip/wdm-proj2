<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $projects = \App\Project::all();
        return view('proyectos',['projects' => $projects]);
    }

    public function get()
    {
        return \App\Project::all();
    }


    public function post(Request $request)
    {
        $project = new \App\Project;
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
        $project->content = $request->input('content');
        $project->image_url1 = $request->input('image_url1');
        $project->image_url2 = $request->input('image_url2');
        $project->save();
        return $project;
    }

    public function put(Request $request)
    {
        $project = \App\Project::find($request->input('id'));
        $project->title = $request->input('title');
        $project->subtitle = $request->input('subtitle');
        $project->content = $request->input('content');
        $project->image_url1 = $request->input('image_url1');
        $project->image_url2 = $request->input('image_url2');
        $project->update();
        return $project;
    }

    public function delete(Request $request)
    {
        return \App\Project::destroy($request->input('id'));
    }
}
