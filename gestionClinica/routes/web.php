<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//HOME
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', function () {
    return view('home');
});
//Departamentos
Route::get('/departamentos','DepartamentosController@mostrarListaDepartamentos');
Route::get('/departamentos/editList','DepartamentosController@mostrarListaDepartamentosEditar')->middleware('auth');;
Route::get('/departamentos/{id}', 'DepartamentosController@mostrarDepartamento');
Route::get('/departamentos/{id}/editar', 'DepartamentosController@mostrarEditarForm')->middleware('auth');;
Route::get('/departamentos/{id}/borrar', 'DepartamentosController@borrarDepartamento')->middleware('auth');;

Route::get('/medicos','MedicosController@mostrarListaMedicos');
Route::get('/medicos/{id}', 'MedicosController@mostrarMedico');
Route::get('/medico/editList','MedicosController@mostrarListaMedicosEditar')->middleware('auth');
Route::get('/medico/deleteList','MedicosController@mostrarListaMedicosBorrar')->middleware('auth');
Route::get('/medicos&{nombre}', 'MedicosController@mostrarListaMedicosPorNombre');
Route::get('/medicos/{id}/editar', 'MedicosController@mostrarEditarForm')->middleware('auth');
Route::get('/medicos/{id}/borrar', 'MedicosController@borrarMedico')->middleware('auth');
Route::get('/medico/reservas', 'MedicosController@mostrarListaMedicosReserva')->middleware('auth');
//Administracion
//Comprobamos que el usuario autenticado tiene rol == 1
Route::get('/clinica/edit','ClinicaController@mostrarEditarForm')->middleware('auth');
Route::get('/box/add','BoxController@mostrarAddForm')->middleware('auth');
Route::get('/box/deleteList','BoxController@mostrarListaBoxBorrar')->middleware('auth');
Route::get('/departamento/add','DepartamentosController@mostrarAddForm')->middleware('auth');
Route::get('/medico/add','MedicosController@mostrarAddForm')->middleware('auth');
Route::get('/box/{id}/borrar','BoxController@borrarBox')->middleware('auth');
//Metodos post
Route::post('clinica/editar_create', [
    'uses' => 'ClinicaController@editarClinica'
])->middleware('auth');
Route::post('departamento/editar_create', [
    'uses' => 'DepartamentosController@addDepartamento'
])->middleware('auth');
Route::post('box/editar_create', [
    'uses' => 'BoxController@addBox'
])->middleware('auth');
Route::post('departamentos/editar_create', [
    'uses' => 'DepartamentosController@editarDepartamento'
])->middleware('auth');
Route::post('medicos/add/editar_create', [
    'uses' => 'MedicosController@addMedico'
])->middleware('auth');
Route::post('medicos/edit/editar_create', [
    'uses' => 'MedicosController@editarMedico'
])->middleware('auth');
Route::post('medicos', [
    'uses' => 'MedicosController@mostrarListaMedicosPorNombre'
])->middleware('auth');
Route::post('citas/reservar', [
    'uses' => 'CitasController@reservar'
])->middleware('auth');
Route::post('entradas/add', [
    'uses' => 'EntradasController@addEntrada'
])->middleware('auth');
Route::post('pacientes', [
    'uses' => 'UsuarioController@mostrarListaPacientesPorNombre'
])->middleware('auth');
Route::post('&pacientes', [
    'uses' => 'UsuarioController@mostrarListaPacientesPorDni'
])->middleware('auth');
Route::post('usuario/edit', [
    'uses' => 'UsuarioController@editarPaciente'
])->middleware('auth');
//----USUARIO----
Route::get('/usuario','UsuarioController@autenticarUsuario')->middleware('auth');
Route::get('/logged', function () { //Para redirigir a panel de usuario una vez iniciamos sesión
    $currentuser = Auth::user();
    if(!$currentuser){
        return redirect("home");
    }
    else{
        return redirect("/usuario");
    }
});
//Usuario-Historial
Route::get('/historial&{modo}','UsuarioController@mostrarHistorial')->middleware('auth');
Route::get('/historial/{idH}','EntradasController@mostrarEntrada')->middleware('auth');//Comprobar que el historial es del paciente autenticado en ese momento
Route::get('/historial/entrada/add&{idPaciente}','EntradasController@mostrarAddEntradaForm')->middleware('auth');
//Usuario-Citas
Route::get('/citas&{modo}','UsuarioController@mostrarCitas')->middleware('auth');
Route::get('/citas/disponibles&{idM}','CitasController@mostrarCitasDisponibles')->middleware('auth');
Route::get('/citas/{idC}','CitasController@mostrarCita')->middleware('auth');//Comprobar que esa cita es del paciente autenticado en ese momento
Route::get('/citas/confirmar/d={dia}&h={hora}&m={idMedico}','CitasController@mostrarConfirmarCita')->middleware('auth');
Route::get('/citas/{idC}/borrar','CitasController@borrarCita')->middleware('auth');
Route::get('/medico/citas','MedicosController@mostrarListaCitas')->middleware('auth');
Route::get('/medico/{idM}/horarios','CitasController@mostrarCitasDisponibles')->middleware('auth');
//Usuario-medico
Route::get('/pacientes','UsuarioController@mostrarListaPacientes')->middleware('auth');
Route::get('/pacientes/{idP}','UsuarioController@mostrarPaciente')->middleware('auth');
Route::get('/pacientes/{idP}/historial&{modo}','EntradasController@mostrarHistorialDePaciente')->middleware('auth');
Route::get('/pacientes/{idP}/entrada&{idH}','EntradasController@mostrarEntradaPaciente')->middleware('auth');
//Usuario-paciente
Route::get('/usuario/editar','UsuarioController@mostrarEditUsuarioForm')->middleware('auth');


//CREADO POR AUTH
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
