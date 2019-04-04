<?php

namespace App\BL;
use App\Departamento;
use App\User;
use App\Rol;

class DepartamentoDAO
{

    public function mostrarDepartamento($id) {
        $departamento = Departamento::where('id', '=', $id)->first();
        return $departamento;
    }

    public function mostrarListaDepartamentosAlfabetica() {
        $departamentos  = Departamento::orderBy('nombre')->get(); 
        return $departamentos;
    }

    public function mostrarListaDepartamentos() {
        $departamentos  = Departamento::all(); 
        return $departamentos;
    }

    public function actualizarDepartamento($departamento){
        try{
            $departamento->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function addDepartamento($departamento){
        try{
            $departamento->save();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    }

    public function borrarDepartamento($departamento){
        try{
            $departamento->delete();
            return true;
        }catch(\Exception $ex){
            return false;
        }
    } 

    public function mostrarMedicosDepartamento($id) {
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $user = User::whereRaw("rol_id =  $rol->id and departamento_id = $id")->paginate(5);
        return $user;
    }
}
?>
