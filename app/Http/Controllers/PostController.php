<?php

namespace App\Http\Controllers;


use App\Models\Salida;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.plantillas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salidas = Salida::where('user_id', Auth::user()->id)
            ->orderBy('salida', 'asc')
            ->get();

        return view('admin.plantillas.create', compact('salidas'));
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
            'salida' => 'required',
        ]);

        try {
            Message::create([
                'title' => request('title'),
                'message' => request('information'),
                'user_id' => Auth::user()->id,
                'salida_id' => request('salida'),

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
        $plantilla = Message::findOrFail($id);
        $salidas = Salida::all();
        return view('admin.plantillas.edit', compact('plantilla', 'salidas'));
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
            'salida' => 'required',
        ]);


        try {
            Message::findOrFail($id)->update([
                'title' => request('title'),
                'message' => request('information'),
                'user_id' => Auth::user()->id,
                'salida_id' => request('salida'),

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
            Message::destroy($id);
            return back()->with('success', 'Registro eliminado');
        } catch (QueryException $e) {

            return back()->with('error', 'Error al borrar el registro - ' . $e->getMessage());
        }
    }
}
