<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.casos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::orderBy('status', 'desc')
            ->get();
        $casosDay = Caso::where(function ($query) {
            $query->whereDay('closed_at', date_format(now(), 'd'))
                ->whereMonth('closed_at', date_format(now(), 'm'))
                ->whereYear('closed_at', date_format(now(), 'Y'));
        })->count();


        return view('admin.casos.create', compact('status', 'casosDay'));
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
            'case' =>  'required|numeric|unique:casos',
            'url' => 'required|string',
            'solicitud' => 'required|string',
            'status' => 'required',

        ]);

        if ($request->status == 1) {
            $request->validate([
                'solucion' => 'required',
                'cuenta' => 'required',
                'valor' => 'required',
                'vuelo' => 'required',
                'tipificacion' => 'required',
                'soportes' => 'required',
                'duplicado' => 'required',
            ]);
        }

        if ($request->status == 3) {
            $request->validate([
                'contingencia' => 'required',
            ]);
        }



        try {
            Caso::create([
                'case' => request('case'),
                'url' => request('url'),
                'solicitud' => request('solicitud'),
                'cuenta' => request('cuenta') == 1 ? 1 : 0,
                'valor' => request('valor') == 1 ? 1 : 0,
                'vuelo' => request('vuelo') == 1 ? 1 : 0,
                'tipificacion' => request('tipificacion') == 1 ? 1 : 0,
                'soportes' => request('soportes') == 1 ? 1 : 0,
                'duplicado' => request('duplicado') == 1 ? 1 : 0,
                'compensacion' => request('compensacion') == 1 ? 1 : 0,
                'contingencia' => request('contingencia') == 1 ? 1 : 0,
                'notas' => isset($request->nota) ? $request->nota : null,
                'solucion' => request('solucion'),
                'status_id' => request('status'),
                'user_id' => Auth::user()->id,
                'closed_at' => $request->status == 1 ? now() : null,
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
        $case = Caso::findOrFail($id);
        $status = Status::orderBy('status', 'desc')
            ->get();

        return view('admin.casos.edit', compact('case', 'status'));
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
            'case' => 'required|numeric',
            'url' => 'required|string',
            'solicitud' => 'required|string',
            'status' => 'required',

        ]);

        if ($request->status == 1) {
            $request->validate([
                'solucion' => 'required',
                'cuenta' => 'required',
                'valor' => 'required',
                'vuelo' => 'required',
                'tipificacion' => 'required',
                'soportes' => 'required',
                'duplicado' => 'required',

            ]);
        }

        $case_select = Caso::findOrFail($id);

        //validar que no cambie el status al actualizar un registro cerrado
        if (request('status') == 1) {
            if ($case_select->status_id == 1) {
                $close = $case_select->closed_at;
            } else {
                $close = $request->status == 1 ? now() : null;
            }
        } else {
            $close = $request->status == 1 ? now() : null;
        }





        try {
            Caso::findOrFail($id)->update([
                'case' => request('case'),
                'url' => request('url'),
                'solicitud' => request('solicitud'),
                'cuenta' => request('cuenta') == 1 ? 1 : 0,
                'valor' => request('valor') == 1 ? 1 : 0,
                'vuelo' => request('vuelo') == 1 ? 1 : 0,
                'tipificacion' => request('tipificacion') == 1 ? 1 : 0,
                'soportes' => request('soportes') == 1 ? 1 : 0,
                'duplicado' => request('duplicado') == 1 ? 1 : 0,
                'compensacion' => request('compensacion') == 1 ? 1 : 0,
                'contingencia' => request('contingencia') == 1 ? 1 : 0,
                'notas' => isset($request->nota) ? $request->nota : null,
                'solucion' => request('solucion'),
                'status_id' => request('status'),
                'user_id' => Auth::user()->id,
                'closed_at' => $close,
            ]);


            return back()->with('success', 'Registro actualizado de manera correcta');
        } catch (QueryException $e) {
            return back()->with('error', 'Error al actualizar el registro - ' . $e->getMessage());
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
            $case = Caso::findOrFail($id);
            Caso::destroy($case->id);
            return redirect()->back()->withStatus(__('Case successfully deleted.'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Error al eliminar el registro - ' . $e->getMessage());
        }
    }
}
