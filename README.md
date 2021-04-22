<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Explicacion del Proyecto Pemex

## Tablas

### contratados
```
id
posicion
subdireccion
rupo
motivo_vacante
vigencia
plaza 
gerencia

ficha
profesion
situacion_contractual
resultados_tecnicos
nombre
num_cedula
cpp

created_at
updated_at
```


### candidatos_rechazados
```
id
nombre
ficha
num_cedula
observaciones
created_at
updated_at
```

<!-- Voy a tomar en cuenta que para llevasr el proceso de registro de un candidato tengo que llevar una referencia de el, por lo 
que me voy a basar en el id que tenga el registro de "integracion_regional" y distribuirlo en cada una de las tablas en las que se manipule sus archivos correspondientes -->

### integracion_regional
```
id
posicion
subdireccion
rupo
motivo_vacante
vigencia
plaza 
gerencia
validacion (boolean)
memorandum
cedula_siep
created_at
updated_at
```

### desarrollo_humano
```
id
id_integracion
ficha
profesion
situacion_contractual
resultados_tecnicos
nombre
num_cedula
cpp
validacion (boolean)
memorandum
cedula_siep_document
carta_no_inhabilitacion
cedula_siep
validacion_sep
resultados_ev_tec
documento1
documento2
documento3
documento4

created_at
updated_at
```

### departamento_personal
```
id
id_integracion
validacion (boolean)
memorandum
cedula_siep
created_at
updated_at
```

## Explicacion del Modelo MySQL
* Si algun departamento decide que un registro no procede, automaticamente lo buscare tanto en integracion, desarrollo humano y departamento personal para eliminarlo, y de igual manera buscar cada uno de sus archivos, ya que tiene logica que no permanezca más activo en el sistema cuando ya fue rechazado

* Los rechazados se registran en otra tabla

* Al momento en que un departamento decide que el proceso de un candidato procede al siguiente departamento, tengo que actualizar el estado de "validacion" por un valor "true", para que pueda diferenciar de registros que aun no han sido validados de aquellos que ya fueron validados, asi como tambien poder conservar todos sus datos y documentos inclusive aun siendo ya contratado

* Cabe destacar que en desarrollo humano, se registrara la entrada de 8 documentos (4 obligatorios y 4 opciones dependiendo si es clausula 3 o no), en la cual las primeras 4 tendran que ser adjuntadas obligatoriamente, pero dejare el espacio para que adjutnte de forma opcional los archivos correspondientes a clausula 3, en el cual al no insertar un registro, simplemente el valor de ese campo sera "null"

## Requerimientos

* Autenticacion con Bootstrap de Laravel
* Instalacion de AdminLTE 3
* Uso de Laravel Excel (Para generar reportes de Excel)
* Uso de Blade Templates de Laravel para la gestion de vistas, componentes y logica del backend
* Uso de Storage para el almacenimiento de archivos


## Uso de Laravel
* Migraciones (nuestra tabla)
* Modelos (capa de nuestra tabla)
* Controladores (para aplicar la logica de programacion del lado de backend y temas de base de datos)
* Rutas (GET, POST, RESOURCE)
* Componentes de Blade
* Vistas de Blade
* Formularios presentes en todo momento
* Cargar nuestro propio archivo con funciones reservadas para la simplificacion y eficiencia de codigo


## Vistas

* candidatos-index
* candidatos-show

* usuaria-create

* integracion-regional-index
* integracion-regional-show

* desarrollo-humano-index
* desarrollo-humano-show

* departamento-personal-index
* departamento-personal-show

* fecha-candidatos-index
* fecha-candidatos-show

* reporte-excel-index
* reporte-excel-show



## Posibles Componentes

* Buscador de Registros
* Control No procede
* Control Procede
* fechas
* Control Reporte Excel

## Organizacion de Storage (Almacenimiento de Archivos)

``` Tomando en cuenta que Estan dentro de Storage/ ```

* public
   * integracion_regional

      * memorandum
      * cedula_siep

   * desarrollo_humano

      * memorandum
      * cedula_siep
      * documentos_especiales
          
          * documentos_desarrollo_humano
          * clausula_3

  * departamento_personal

      * memorandum
      * cedula_siep



# Instrucciones para la Ejecucion

* Descomprimir el proyecto y guardarlo dentro de xampp/htdocs/
* Si está en tu posibilidad, crea un dominio virtual o local con ayuda de xampp y system 32 de tu pc
* Luego debes crear un archivo ".env" y escribir lo siguiente en el:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:FX36dFyv2XZDfiQwDSs0aAJssJ4FCBEm5oozg+5GbHA=
APP_DEBUG=true
APP_URL=http://pemex.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pemex
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
* Luego crea una base de datos en PHPMYADMIN de preferencia , la base de datos llamala "pemex" o nombrala
con el nombre que colocas en el ".env" en la propiedad "DB_DATABASE"
* Despues de lograr ejecutar el proyecto, procede a ejecutar los siguientes comandos

     * composer install
     * composer dumpautoload
     * npm install
     * npm run dev
     * CREAR LA BASE DE DATOS "PEMEX"
     * IMPORTAR LA TABLA "TRABAJADORES" 
     * php artisan migrate
     * php artisan storage:link
     * composer require phpoffice/phpword
     * EJECUTA EL PROYECTO

## REPOSITORIO DISPONIBLE EN
* https://github.com/Raul-system/project-pemex


