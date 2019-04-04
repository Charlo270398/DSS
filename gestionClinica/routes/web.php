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

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/departamentos','DepartamentosController@mostrarListaDepartamentos');
Route::get('/departamentos/{id}', 'DepartamentosController@mostrarDepartamento');
//Route::get('/departamentos/{id}', 'MedicosController@mostrarMedico');

Route::get('/login/medico', function () { return view('/user/sesionmedico');});
Route::get('/login/paciente', function () { return view('/user/sesionpaciente');});

Route::get('/medicos','MedicosController@mostrarListaMedicos');
Route::get('/medicos/{id}', 'MedicosController@mostrarMedico');
Route::get('/medicos&{nombre}', 'MedicosController@mostrarListaMedicosPorNombre');


//Administracion
Route::get('/admin/{id}','UsuarioController@autenticarAdmin');
Route::get('/clinica/edit','ClinicaController@mostrarEditarForm');

Route::post('clinica/editar_create', [
    'uses' => 'ClinicaController@editarClinica'
]);

