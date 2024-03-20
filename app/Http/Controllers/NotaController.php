<?php

namespace App\Http\Controllers;


use App\Models\Nota;
use App\Models\Materia;
use App\Models\Docente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notas = Nota::with('materia', 'docente')->get();
        return view('nota.index', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all();
        $docentes = Docente::all();
        return view('nota.create', compact('materias', 'docentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_materia' => 'required|exists:materias,id',
            'id_docente' => 'required|exists:docentes,id',
            'nota' => 'required|numeric|min:0|max:100',
        ]);

        Nota::create([
            'id_materia' => $request->input('id_materia'),
            'id_docente' => $request->input('id_docente'),
            'nota' => $request->input('nota'),
        ]);

        return redirect()->route('nota.index')->with('mensaje', 'Nota agregada con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $materias = Materia::all();
        $docentes = Docente::all();
        return view('nota.edit', compact('nota', 'materias', 'docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'id_materia' => 'required|exists:materias,id',
        'id_docente' => 'required|exists:docentes,id',
        'nota' => 'required|numeric|min:0|max:100',
    ]);

    $nota = Nota::findOrFail($id);

    $nota->update([
        'nota' => $request->input('nota'), // Agregado para actualizar la nota
        'id_materia' => $request->input('id_materia'),
        'id_docente' => $request->input('id_docente'),
       
    ]);

    return redirect('nota')->with('mensaje', 'Nota modificada correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Nota::destroy($id);
        return redirect('nota')->with('mensaje', 'Nota eliminada');
    }
}
