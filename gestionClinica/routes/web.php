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
Route::get('/departamentos/deleteList','DepartamentosController@mostrarListaDepartamentosBorrar')->middleware('auth');;
Route::get('/departamentos/{id}', 'DepartamentosController@mostrarDepartamento');
Route::get('/departamentos/{id}/editar', 'DepartamentosController@mostrarEditarForm')->middleware('auth');;
Route::get('/departamentos/{id}/borrar', 'DepartamentosController@borrarDepartamento')->middleware('auth');;

//Box
Route::get('/box/{id}/borrar','BoxController@borrarBox')->middleware('auth');;

//Medicos
Route::get('/medicos','MedicosController@mostrarListaMedicos');
Route::get('/medicos/{id}', 'MedicosController@mostrarMedico');
Route::get('/medico/editList','MedicosController@mostrarListaMedicosEditar')->middleware('auth');;
Route::get('/medico/deleteList','MedicosController@mostrarListaMedicosBorrar')->middleware('auth');;
Route::get('/medicos&{nombre}', 'MedicosController@mostrarListaMedicosPorNombre');
Route::get('/medicos/{id}/editar', 'MedicosController@mostrarEditarForm')->middleware('auth');;
Route::get('/medicos/{id}/borrar', 'MedicosController@borrarMedico')->middleware('auth');;
Route::get('/medico/reservas', 'MedicosController@mostrarListaMedicosReserva')->middleware('auth');;
Route::get('/medico/{id}/horarios', function ($id) { return redirect("/citas/disponibles&$id");})->middleware('auth');;


//Administracion
Route::get('/clinica/edit','ClinicaController@mostrarEditarForm');
Route::get('/box/add','BoxController@mostrarAddForm');
Route::get('/box/delete','BoxController@mostrarListaBoxBorrar');
Route::get('/departamento/add','DepartamentosController@mostrarAddForm');
Route::get('/medico/add','MedicosController@mostrarAddForm');

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
//Usuario-Citas
Route::get('/citas&{modo}','UsuarioController@mostrarCitas')->middleware('auth');
Route::get('/citas/disponibles&{idM}','CitasController@mostrarCitasDisponibles')->middleware('auth');
Route::get('/usuario/{idU}/citas/{idC}','CitasController@mostrarCita')->middleware('auth');
//CREADO POR AUTH
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home'); 