<?php

namespace App\Http\Controllers;

use App\Internal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class InternalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.internal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.internal.create');
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
            'title' => 'required|max:150',
            'information' => 'required',
            'nombre' => 'required',

        ]);



        try {
            Internal::create([
                'title' => request('title'),
                'message' => request('information'),
                'user_id' => Auth::user()->id,
                'name' => request('nombre'),
                'nota' => request('nota') ? request('nota') : '',
                'email' => request('email') ? request('email') : '',


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

        $plantilla = Internal::findOrFail($id);

        return view('admin.internal.edit', compact('plantilla'));
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
            'title' => 'required|max:150',
            'information' => 'required',
            'nombre' => 'required',

        ]);




        try {
            Internal::findOrFail($id)->update([
                'title' => request('title'),
                'message' => request('information'),
                'user_id' => Auth::user()->id,
                'name' => request('nombre'),
                'nota' => request('nota') ? request('nota') : '',
                'email' => request('email') ? request('email') : '',


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

            Internal::destroy($id);

            return back()->with('success', 'Registro eliminado correctamente');
        } catch (QueryException $e) {


            return back()->with('error', 'Error al borrar el registro - ' . $e->getMessage());
        }
    }
}
