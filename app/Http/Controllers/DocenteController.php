<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['docentes']=Docente::paginate(2);
        return view('docente.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Rfc'=>'required|string|max:13',
            'Correo'=>'required|email',
            'Telefono'=>'required|int|min:10'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request, $campos, $mensaje);



        //$datosDocente = request()->all();
        $datosDocente = request()->except('_token');
        Docente::insert($datosDocente);

        //return response()->json($datosDocente);
        return redirect('docente')->with('mensaje', 'Docente Agregado con Exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $docente = Docente::findOrFail($id);

        return view('docente.edit', compact('docente'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Rfc'=>'required|string|max:13',
            'Correo'=>'required|email',
            'Telefono'=>'required|int|min:10'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];
        
        $this->validate($request, $campos, $mensaje);


        $datosDocente = request()->except(['_token', '_method']);
        Docente::where('id', '=', $id)->update($datosDocente);

        $docente = Docente::findOrFail($id);

        //return view('docente.edit', compact('docente'));
        return redirect('docente')->with('mensaje', 'Docente Modificado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Docente::destroy($id);
        return redirect('docente')->with('mensaje', 'Docente Borrado');
    }
}
