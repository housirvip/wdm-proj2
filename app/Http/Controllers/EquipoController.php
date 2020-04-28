<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipoController extends Controller
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
        $equipos = \App\Equipo::all();
        return view('equipos', ['equipos' => $equipos]);
    }

    public function get()
    {
        return \App\Equipo::all();
    }

    public function post(Request $request)
    {
        $equipo = new \App\Equipo;
        $equipo->name = $request->input('name');
        $equipo->email = $request->input('email');
        $equipo->phone = $request->input('phone');
        $equipo->experience = $request->input('experience');
        $equipo->avatar = $request->input('avatar');
        $equipo->save();
        return $equipo;
    }

    public function put(Request $request)
    {
        $equipo = \App\Equipo::find($request->input('id'));
        $equipo->name = $request->input('name');
        $equipo->email = $request->input('email');
        $equipo->phone = $request->input('phone');
        $equipo->experience = $request->input('experience');
        $equipo->avatar = $request->input('avatar');
        $equipo->update();
        return $equipo;
    }

    public function delete(Request $request)
    {
        return \App\Equipo::destroy($request->input('id'));
    }
}
