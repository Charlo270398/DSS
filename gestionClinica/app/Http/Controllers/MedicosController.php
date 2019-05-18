<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Departamento;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;
use App\BL\CitaDAO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;;

class MedicosController extends Controller
{
    public function mostrarListaMedicos(){
        $u = new UserDAO();
        $med = $u->mostrarListaMedicos();
        $d = new DepartamentoDAO();
        return view('/user/medico/lista', ['medicos' => $med->paginate(5), 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'mostrar']);
    }
    public function mostrarListaMedicosPorNombre(Request $request){
        $u = new UserDAO();
        $d = new DepartamentoDAO();
        $nombre = $request->input('nombre');
        $op = $request->input('op');
        if($nombre == null){
            $users = $u->mostrarListaMedicos();
        }else{
            $users = $u->mostrarListaMedicosPorNombre($nombre);
        }

        return view('/user/medico/lista', ['medicos' => $users->paginate(5), 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>"$op"]);
    }

    public function mostrarMedico($id) {
        $u = new UserDAO();
        return view('/user/medico/medico', ['medico' => $u->mostrarUsuario($id), 'departamento' => $u->mostrarDepartamento($id)]);
    }
    public function mostrarAddForm() {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==1){
                return view('/user/medico/add', ['clinica' => 1] );
            }
            else{
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'No tienes permisos de administrador!']);
            }
        }
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
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'No tienes permisos de administrador!']);
            }
        }
    }
    public function addMedico(Request $request) {
        $u = new UserDAO();
        $user = new User();
        $user->dni = $request->input('dni');
        $user->nombre = $request->input('nombre');
        $user->password = $request->input('password');
        $user->apellidos = $request->input('apellidos');
        $user->email = $request->input('email');
        $user->fecha_nacimiento = $request->input('fecha_nacimiento');
        $user->num_colegiado = $request->input('num_colegiado');
        $user->departamento_id = $request->input('departamento_id');
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
        //$user->password = $request->input('password'); Hash::make($data['password'])
        $user->password = Hash::make($request->input ('password'));
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

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($userId)->id==1){//ID de admin es 1
                if($u->mostrarRol($id)->id==3){//ID de médico es 3
                    $u -> borrarUsuario($id);
                    return redirect('/medico/editList');
                }else{
                    return view('/user/menuusuario', ['tipo' => $u->mostrarRol($userId), 'error' =>'¡Intentas borrar un usuario que no es médico!']);
                }
                
            }
            else{
                return view('/user/menuusuario', ['tipo' => $u->mostrarRol($userId), 'error' =>'¡No tienes permisos de administrador!']);
            }
        }
    }
    public function mostrarListaMedicosEditar(){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==1){
                $rol = Rol::where('nombre', '=', 'Medico')->first();
                $d = new DepartamentoDAO();
                $users = User::where('rol_id', '=', $rol->id)->orderBy('apellidos')->paginate(5); //bootstrap4.blade
                return view('/user/medico/lista', ['medicos' => $users, 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'editar']);
            }
            else{
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'No tienes permisos de administrador!']);
            }
        }
    }
    public function mostrarListaMedicosReserva(){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $d = new UserDAO();
            if($d->mostrarRol($userId)->id==2){//Id de paciente es 2
                $rol = Rol::where('nombre', '=', 'Medico')->first();
                $d = new DepartamentoDAO();
                $users = User::where('rol_id', '=', $rol->id)->paginate(5); //bootstrap4.blade
                return view('/user/medico/lista', ['medicos' => $users, 'departamentos'=>$d->mostrarListaDepartamentos(), 'op' =>'reservar']);
            }
            else{
                return view('/user/menuusuario', ['tipo' => $d->mostrarRol($userId), 'error' =>'No eres paciente!']);
            }
        }
    }

    public function mostrarListaPacientes(){
        $u = new UserDAO();
        $med = $u->mostrarListaPacientes();
        return view('/user/paciente/lista', ['medicos' => $med->paginate(5)]);
    }
}
