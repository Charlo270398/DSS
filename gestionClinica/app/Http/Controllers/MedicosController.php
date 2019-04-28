<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Departamento;
use App\BL\DepartamentoDAO;
use App\BL\UserDAO;
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
        $d = new UserDAO();
        $dep = $d->mostrarUsuario($id);
        return view("/user/medico/editar", ['medico' => $dep] );
    }
    public function addMedico(Request $request) {
        $b = new UserDAO();
        $box = new User();
        $box->dni = $request->input('dni');
        $box->nombre = $request->input('nombre');
        $box->pass = $request->input('pass');
        $box->apellidos = $request->input('apellidos');
        $box->email = $request->input('email');
        $box->fecha_nacimiento = $request->input('fecha_nacimiento');
        $box->num_colegiado = $request->input('num_colegiado');
        $box->departamento_id = 1;
        $box->rol_id = 3;
        if($b->addMedico($box)){
            return view('/user/medico/add', ['medico' => $box] );
        }else{
            return view('/error', ['error' => 'Error añadiendo el medico'] );
        }
    }
    public function editarMedico(Request $request) {
        $b = new UserDAO();
        $box = new User();
        $box = $b->mostrarUsuario($request->input('id'));
        $box->dni = $request->input('dni');
        $box->nombre = $request->input('nombre');
        $box->pass = $request->input('pass');
        $box->apellidos = $request->input('apellidos');
        $box->email = $request->input('email');
        $box->fecha_nacimiento = $request->input('fecha_nacimiento');
        $box->num_colegiado= $request->input('num_colegiado');
        $box->rol_id = 3;
        if($b->addMedico($box)){
            return view('/user/medico/editar', ['medico' => $box] );
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