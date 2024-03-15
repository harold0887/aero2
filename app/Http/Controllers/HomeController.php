<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function internal()
    {
        return view('internal');
    }

    public function dashboard()
    {
        $casos = Caso::where('user_id', Auth::user()->id)
            ->count();
        $casosDay = Caso::where(function ($query) {
            $query->whereDay('closed_at', date_format(now(), 'd'));
        })
            ->where('user_id', Auth::user()->id)
            ->where('status_id', 1)
            ->count();
            $pending = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 2)
            ->count();
        $in_process = Caso::where('user_id', Auth::user()->id)
            ->where('status_id', 3)
            ->count();
        return view('dashboard', compact('casos','casosDay','pending', 'in_process'));
    }
    public function contactos()
    {
        return view('contactos');
    }


    //buscar solicitudes previas
    public function search(Request $request)
    {
        $term = $request->get('term');

        $query = Caso::where('solicitud', 'LIKE', '%' . $term . '%')
            ->orderBy('solicitud')
            ->get();

        $data = [];

        foreach ($query as $q) {
            $data[] = [
                'label' => $q->solicitud,
                'value' => $q->solicitud
            ];
        }

        return $data;
    }

    //buscar soluciones
    public function solucion(Request $request)
    {
        $term = $request->get('term');

        $query = Caso::where('solucion', 'LIKE', '%' . $term . '%')
            ->orderBy('solucion')
            ->get();

        $data = [];

        foreach ($query as $q) {
            $data[] = [
                'label' => $q->solucion,
                'value' => $q->solucion
            ];
        }

        return $data;
    }
}
