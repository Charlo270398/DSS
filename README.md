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
* Si es la primera vez que se ejecuta, crear y rellenar las tablas de la BD con "php artisan migrate:refresh --seed" *(en caso de fallo porque no existe un seeder ejecutar composer dump-autoload)
* Ejecutar "php artisan serve"
* Buscar en un navegador localhost:8000

### Usuarios de prueba
Pasos a seguir: 
* Entrar en Iniciarsesión (arriba a la derecha)
* Para entrar en el área de administración escribir introducir los siguientes datos: EMAIL-> admin@gmail.com PASS->1234
* Para entrar en el área de médico eintroducir los siguientes datos: EMAIL-> jorgegonzalez@gmail.com PASS->1234
* Para entrar en el área de paciente introducir los siguientes datos: EMAIL-> yaelduran@gmail.com PASS->1234


Para resolver cualquier consultar al equipo desarrollador.


