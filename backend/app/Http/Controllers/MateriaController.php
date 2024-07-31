<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function get(){
        try {
            $data = Materia::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request){
        try {
            $object = new Materia();
            $object->fill($request->all())->save();
            return response()->json( $object, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function getById($id){
        try {
            $data = Materia::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try {
            $object = Materia::find($id);
            if (empty($object)) {
                return response()->json([ 'error' => 'La materia no existe'], 500);
            }
            $object->fill($request->all())->save();
            return response()->json( $object , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function delete($id){
        try {
            $object = Materia::find($id);
            if (empty($object)) {
                return response()->json([ 'error' => 'La materia no existe'], 500);
            }
            $object->delete();
            return response()->json([ "deleted" => $object ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

}
