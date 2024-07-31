<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoEstudiante;

class CursoEstudianteController extends Controller
{
    public function get(){
        try {
            $data = CursoEstudiante::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $object = new CursoEstudiante();
            $object->fill($request->all())->save();
            return response()->json( $object, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }


    public function getByCurso($curso_id)
    {
        $cursosEstudiantes = CursoEstudiante::where('curso_id', $curso_id)->get();
        return response()->json($cursosEstudiantes);
    }

    public function update(Request $request,$id){
        try {
            $object = CursoEstudiante::find($id);
            if (empty($object)) {
                return response()->json([ 'error' => 'La relacion no existe'], 500);
            }
            $object->fill($request->all())->save();
            return response()->json( $object , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|integer|exists:cursos,id',
            'estudiante_id' => 'required|integer|exists:estudiantes,id',
        ]);

        $curso_id = $request->input('curso_id');
        $estudiante_id = $request->input('estudiante_id');

        $cursoEstudiante = CursoEstudiante::where('curso_id', $curso_id)
                                          ->where('estudiante_id', $estudiante_id)
                                          ->first();

        if (!$cursoEstudiante) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        $cursoEstudiante->delete();

        return response()->json(['message' => 'Registro eliminado con éxito'], 200);
    }

}
