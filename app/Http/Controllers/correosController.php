<?php

namespace App\Http\Controllers;

use App\Correo;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class correosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.correos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.correos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:correos,email',
            'comment' => 'required',
            'area' => 'required',
        ]);

        try {
            Correo::create([
                'email' => request('email'),
                'area' => request('area'),
                'comentario' => request('comment'),
            ]);


            return back()->with('success', 'Registro exitoso');
        } catch (QueryException $e) {
            return back()->with('error', 'Error al guardar el registro - ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correo = Correo::findOrFail($id);
        return view('admin.correos.edit', compact('correo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'comment' => 'required',
            'area' => 'required',
        ]);

        try {
            Correo::findOrFail($id)->update([
                'email' => request('email'),
                'area' => request('area'),
                'comentario' => request('comment'),
            ]);


            return back()->with('success', 'Registro exitoso');
        } catch (QueryException $e) {
            return back()->with('error', 'Error al guardar el registro - ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        try {

    
            Correo::destroy($id);
           



            return back()->with('success', 'Registro eliminado');
        } catch (QueryException $e) {


            return back()->with('error', 'Error al borrar el registro - ' . $e->getMessage());
        }
    }
}
