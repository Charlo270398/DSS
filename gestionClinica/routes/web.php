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
Route::get('/departamentos/editList','DepartamentosController@mostrarListaDepartamentosEditar');
Route::get('/departamentos/deleteList','DepartamentosController@mostrarListaDepartamentosBorrar');
Route::get('/departamentos/{id}', 'DepartamentosController@mostrarDepartamento');
Route::get('/departamentos/{id}/editar', 'DepartamentosController@mostrarEditarForm');
Route::get('/departamentos/{id}/borrar', 'DepartamentosController@borrarDepartamento');

//Login
Route::get('/login/medico', function () { return view('/user/sesionmedico');});
Route::get('/login/paciente', function () { return view('/user/sesionpaciente');});

//Medicos
Route::get('/medicos','MedicosController@mostrarListaMedicos');
Route::get('/medicos/{id}', 'MedicosController@mostrarMedico');
Route::get('/medicos&{nombre}', 'MedicosController@mostrarListaMedicosPorNombre');
Route::get('/medicos/{id}/editar', 'MedicosController@mostrarEditarForm');
Route::get('/medicos/{id}/borrar', 'MedicosController@borrarMedico');



//Administracion
Route::get('/clinica/edit','ClinicaController@mostrarEditarForm');
Route::get('/box/add','BoxController@mostrarAddForm');
Route::get('/departamento/add','DepartamentosController@mostrarAddForm');
//Metodos post
Route::post('clinica/editar_create', [
    'uses' => 'ClinicaController@editarClinica'
]);

Route::post('departamento/editar_create', [
    'uses' => 'DepartamentosController@addDepartamento'
]);


Route::post('box/editar_create', [
    'uses' => 'BoxController@addBox'
]);
Route::post('departamentos/editar_create', [
    'uses' => 'DepartamentosController@editarDepartamento'
]);
Route::post('medicos/editar_create', [
    'uses' => 'MedicosController@editarMedico'
]);

//Usuario
Route::get('/usuario/{id}','UsuarioController@autenticarUsuario');
Route::get('/usuario/{id}/historial&{modo}','UsuarioController@mostrarHistorial');