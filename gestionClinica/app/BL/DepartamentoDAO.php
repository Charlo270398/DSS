<?php

namespace App\BL;
use App\Departamento;
use App\User;
use App\Rol;

class DepartamentoDAO
{

    public function mostrarDepartamento($id) {
        $departamento  = Departamento::findOrFail($id)->first(); 
        return $departamento;
    }

    public function mostrarListaDepartamentosAlfabetica() {
        $departamentos  = Departamento::orderBy('nombre')->get(); 
        return $departamentos;
    }

    public function mostrarListaDepartamentos() {
        $departamentoes  = Departamento::all(); 
        return $departamentoes;
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
        $user = User::where('rol_id', '=', $rol->id)->paginate(5);
        return $user;
    }
}
?>
