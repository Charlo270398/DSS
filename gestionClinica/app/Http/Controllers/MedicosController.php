<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Departamento;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;
use Illuminate\Support\Facades\Auth;

class MedicosController extends Controller
{
    public function mostrarListaMedicos(){
        $u = new UserDAO();
        $med = $u->mostrarListaMedicos();
        $d = new DepartamentoDAO();
        return view('/user/medico/lista', ['medicos' => $med->paginate(5), 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'mostrar']);
    }
    public function mostrarListaMedicosPorNombre($nombre){
        $u = new UserDAO();
        $d = new DepartamentoDAO();
        $users = $u->mostrarListaMedicosPorNombre($nombre);
        return view('/user/medico/lista', ['medicos' => $users->paginate(5), 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'mostrar']);
    }
    public function mostrarMedico($id) {
        $u = new UserDAO();     
        return view('/user/medico/medico', ['medico' => $u->mostrarUsuario($id), 'departamento' => $u->mostrarDepartamento($id)]);
    }
    public function mostrarAddForm() {
        return view('/user/medico/add', ['clinica' => 1] );
    }
    public function mostrarEditarForm($id) {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==1){
                $dep = $d->mostrarUsuario($id);
                return view("/user/medico/editar", ['medico' => $dep] );
            }
            else{
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId)]);
            }
        }
        
    }
    public function addMedico(Request $request) {
        $u = new UserDAO();
        $user = new User();
        $user->dni = $request->input('dni');
        $user->nombre = $request->input('nombre');
        $user->pass = $request->input('pass');
        $user->apellidos = $request->input('apellidos');
        $user->email = $request->input('email');
        $user->fecha_nacimiento = $request->input('fecha_nacimiento');
        $user->num_colegiado = $request->input('num_colegiado');
        $user->departamento_id = 1;
        $user->rol_id = 3;
        if($u->addMedico($user)){
            return view('/user/medico/add', ['medico' => $user] );
        }else{
            return view('/error', ['error' => 'Error añadiendo el medico'] );
        }
    }
    public function editarMedico(Request $request) {
        $u = new UserDAO();
        $user = new User();
        $user = $u->mostrarUsuario($request->input('id'));
        $user->dni = $request->input('dni');
        $user->nombre = $request->input('nombre');
        $user->pass = $request->input('pass');
        $user->apellidos = $request->input('apellidos');
        $user->email = $request->input('email');
        $user->fecha_nacimiento = $request->input('fecha_nacimiento');
        $user->num_colegiado= $request->input('num_colegiado');
        $user->rol_id = 3;
        if($u->addMedico($user)){
            return view('/user/medico/editar', ['medico' => $user] );
        }else{
            return view('/error', ['error' => 'Error ctualizando el medico'] );
        }
    }
    public function borrarMedico($id) {
        $u = new UserDAO();
        $d = new DepartamentoDAO();
        if($u->borrarMedico($id)){
            return view('/user/medico/lista', ['medicos' => $u->mostrarListaMedicos()->paginate(5), 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'editar']);//TODO REDIRECCION
        }else{
            return view('/error', ['error' => 'Error borrando el medico.'] );
        }
    }
    public function mostrarListaMedicosEditar(){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $d = new DepartamentoDAO();
        $users = User::where('rol_id', '=', $rol->id)->orderBy('apellidos')->paginate(5); //bootstrap4.blade
        return view('/user/medico/lista', ['medicos' => $users, 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'editar']);
    }
    public function mostrarListaMedicosBorrar(){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $d = new DepartamentoDAO();
        $users = User::where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade
        return view('/user/medico/lista', ['medicos' => $users, 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'borrar']);
    }
    public function mostrarListaMedicosReserva(){
        $rol = Rol::where('nombre', '=', 'Medico')->first();
        $d = new DepartamentoDAO();
        $users = User::where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade
        return view('/user/medico/lista', ['medicos' => $users, 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'reservar']);
    }
}