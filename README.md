![](http://ilemiprojects.com/Altamira/wp-content/uploads/2016/10/banner-home-3.jpg)

# Gestión Clínica Alicante 

## Descripción del proyecto
Pagina web para la gestión de citas y datos de pacientes de una clínica privada

## Desarrolladores

* Carlos Zamora Sanz
* Juan Soliveres Olivares
* Miguel Campello Román
* Soufyan Rhazili Raoui

## Guía de despliegue

Pasos a seguir:
* Ir a la carpeta raíz
* Crear y rellenar las tablas de la BD "php artisan migrate:refresh --seed" *(en caso de fallo porque no existe un seeder ejecutar composer dump-autoload)
* Ejecutar "php artisan serve"
* Buscar en un navegador localhost:8000


Para entrar en el area de administración escribir la siguiente ruta:localhost:8000/usuario/1
Para entrar en el area de Médico escribir la siguiente ruta:localhost:8000/usuario/3
Para entrar en el area de paciente escribir la siguiente ruta:localhost:8000/usuario/9



Para entrar al área de usuario escribir la siguiente ruta: localhost:8000/usuario/{id}.
Los usuarios de prueba (para ver funcionalidades con datos concretos) son los siguientes:

* Administrador->ID=1
* Médico-> ID=3
* Paciente-> ID=9

Para resolver cualquier consultar al equipo desarrollador.


