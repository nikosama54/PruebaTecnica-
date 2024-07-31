<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    public function get(){
        try {
            $data = Nota::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $object = new Nota();
            $object->fill($request->all())->save();
            return response()->json( $object, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getByMateria($materiaId){
        try {
            $data = Nota::where('materia_id', $materiaId)->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $object = Nota::find($id);
            if (empty($object)) {
                return response()->json([ 'error' => 'La Nota no existe'], 500);
            }
            $object->fill($request->all())->save();
            return response()->json( $object , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $object = Nota::find($id)->delete();
            if (empty($object)) {
                return response()->json([ 'error' => 'La Nota no existe'], 500);
            }
            return response()->json([ "deleted" => $object ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

}

