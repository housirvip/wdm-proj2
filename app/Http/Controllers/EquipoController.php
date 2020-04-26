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

    public function post()
    {
        return \App\Equipo::all();
    }

    public function put()
    {
        return \App\Equipo::all();
    }

    public function delete()
    {
        return \App\Equipo::all();
    }
}
