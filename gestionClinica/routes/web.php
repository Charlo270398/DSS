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
Route::get('/departamentos/{id}', 'DepartamentosController@mostrarDepartamento');

//Login
Route::get('/login/medico', function () { return view('/user/sesionmedico');});
Route::get('/login/paciente', function () { return view('/user/sesionpaciente');});

//Medicos
Route::get('/medicos','MedicosController@mostrarListaMedicos');
Route::get('/medicos/{id}', 'MedicosController@mostrarMedico');
Route::get('/medicos&{nombre}', 'MedicosController@mostrarListaMedicosPorNombre');

Route::get('/usuario/{id}','UsuarioController@autenticarUsuario');

//Administracion
Route::get('/clinica/edit','ClinicaController@mostrarEditarForm');
Route::get('/box/add','BoxController@mostrarAddForm');

//Metodos post
Route::post('clinica/editar_create', [
    'uses' => 'ClinicaController@editarClinica'
]);

Route::post('box/editar_create', [
    'uses' => 'BoxController@addBox'
]);

//Pacientes
Route::get('/paciente/{id}','UsuarioController@autenticarPaciente');
