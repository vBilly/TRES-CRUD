<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::with('docente')->get(); // Cargamos la relación con los docentes
        return view('materia.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $docentes = Docente::all(); // Obtener todos los docentes
        return view('materia.create', compact('docentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materia' => 'required|string|max:100',
            'id_docente' => 'required|exists:docentes,id', // Asegúrate de que el docente exista en la tabla de docentes
        ], [
            'required' => 'El campo :attribute es requerido',
            'exists' => 'El :attribute seleccionado no es válido',
        ]);
    
        Materia::create([
            'materia' => $request->input('materia'),
            'id_docente' => $request->input('id_docente'),
        ]);
    
        return redirect('materia')->with('mensaje', 'Materia agregada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $materia = Materia::findOrFail($id);
        $docentes = Docente::all(); // Obtener todos los docentes
        return view('materia.edit', compact('materia', 'docentes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'materia' => 'required|string|max:100',
            'id_docente' => 'required|exists:docentes,id', // Asegúrate de que el docente exista en la tabla de docentes
        ], [
            'required' => 'El campo :attribute es requerido',
            'exists' => 'El :attribute seleccionado no es válido',
        ]);
    
        // Obtener la materia por su ID
        $materia = Materia::findOrFail($id);
    
        // Actualizar los datos de la materia
        $materia->update([
            'materia' => $request->input('materia'),
            'id_docente' => $request->input('id_docente'),
        ]);
    
        // Redireccionar con un mensaje de éxito
        return redirect('materia')->with('mensaje', 'Materia modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Materia::destroy($id);
        return redirect('materia')->with('mensaje', 'Materia Borrado');
    }
}
