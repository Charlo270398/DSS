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
                return view('/user/medico/add', ['clinica' => 1] );//El ID de la clínica es 1
            }
            else{
                error_log("Intento de mostrar AddForm de médicos sin ser admin", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $d->mostrarRol($userId), 'error' =>'¡No tienes permisos de administrador!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
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
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }
    public function addMedico(Request $request) {
        
        if (Auth::check()) {
            $userId = Auth::user()->id;
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
                error_log("Fallo añadiendo médico", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($userId), 'error' =>'Ha habido un error intentando añadir el médico']); 
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }
    public function editarMedico(Request $request) {
        if(Auth::check()){
            $userId = Auth::user()->id;
            $u = new UserDAO();
            if($u->mostrarRol($userId)->id==1){//ID de admin es 1
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
                    error_log("Fallo editando médico", 0);
                    return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($userId), 'error' =>'Ha habido un error editando el médico']); 
                }
            }else{
                error_log("Intento de editar médico sin ser admin", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($userId), 'error' =>'¡Intentas borrar un usuario que no es médico!']); 
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
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
                    error_log("Intento de borrar médico siendo el ID a borrar de un usuario que no es médico", 0);
                    return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($userId), 'error' =>'¡Intentas borrar un usuario que no es médico!']);
                }
            }
            else{
                error_log("Intento de borrado médico sin ser admin", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $u->mostrarRol($userId), 'error' =>'¡No tienes permisos de administrador!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
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
                error_log("Intento de mostrarListaMedicosEditar sin ser admin", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $d->mostrarRol($userId), 'error' =>'No tienes permisos de administrador!']);
            }
        }else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
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
                error_log("Intento de mostrar ListaMedicosReserva sin ser paciente", 0);
                return view('/user/menuusuario', ['citas' => 0, 'tipo' => $d->mostrarRol($userId), 'error' =>'No eres paciente!']);
            }
        }
        else{
            error_log("Intento de acceso sin haber iniciado sesión", 0);
            return redirect('/login');
        }
    }

}
