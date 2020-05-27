# Examen Laravel 7

Para la instalacion entrar al directorio y correr el siguiente comando

```sh
$ composer install 
```
### configuración base datos
Cambiar nombre del archivo `.env.example` por `.env`, modificar la seccion de base de datos:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE="AQUI VA BD"
DB_USERNAME="USER BD"
DB_PASSWORD="USUARIO PASSWORD"
```

### Migraciones
para las migraciones corremos el siguiente
```sh
$ php artisan migrate
```
se crearan las tablas utilizadas para el proyecto

### Llaves encriptadas
Para generar las llaves de encriptación necesarias para generar los tokens de acceso, que utiliza el el paquete de passport
```sh
$ php artisan passport:install
```

### Acceso Personal
El "personal access" se genera con el siguiente comando
```sh
$ php artisan passport:client --personal
What should we name the personal access client? [Laravel Personal Access Client]:
 >Contactos
 
Personal access client created successfully.
Client ID: 3
Client secret: 7QP7Nwd9UIt0nKpNBDyeLxMoAmHqO8G4wqQxq2xv
```

### Poblacion tablas
Para poblar la tabla corremos el siguiente comando
```sh
$ php artisan db:seed
```
[1]: <http://127.0.0.1:8000/api/document>
[2]: <http://127.0.0.1:8000/api/document/delete/{id}>
[3]: <http://127.0.0.1:8000/api/document/update>
[4]: <http://127.0.0.1:8000/api/document/{id}>
[5]: <http://127.0.0.1:8000/api/documents>
[6]: <http://127.0.0.1:8000/api/login>
[7]: <http://127.0.0.1:8000/api/register>
[8]: <http://127.0.0.1:8000/api/user/delete/{id}>
[9]: <http://127.0.0.1:8000/api/user/doc/{id}>
[10]: <http://127.0.0.1:8000/api/user/update/{id}>
[11]: <http://127.0.0.1:8000/api/user/{id}>
[12]: <http://127.0.0.1:8000/api/users>
### Rutas
Estas son la siguientes rutas de la api
| descripcion | Ruta |
| ------ | ------ |
| Crear documento | [api/document][1] |
| Borrar documento | [api/document/delete/{id}][2] |
| Update documento | [api/document/update][3] |
| Select documento | [api/document/{id}][4] |
| Select documentos | [api/documents][5] |
| autenticacion usuario | [api/login][6] |
| registro usuario | [api/register][7] |
| Borrar usuario | [api/user/delete/{id}][8] |
| Usuarios documentos | [api/user/doc/{id}][9] |
| Update usuario | [api/user/update/{id}][10] |
| Select usuario | [api/user/{id}][11] |
| Select usuarios | [api/users][12] |

Para facilidad te adjunto archivos de postman realizar los request necesarios
con el nombre `examenLaravel.postman_collection.json` 

### Cron

```sh
 user
  user:all             Lista los usuarios existentes en consola
```
para correr el cron
```sh
  php artisan user:all
admin@gmail.com
fake0@gmail.com
fake1@gmail.com
fake3@gmail.com
fake4@gmail.com
fake5@gmail.com
fake6@gmail.com
fake7@gmail.com
fake8@gmail.com
fake9@gmail.com
fake10@gmail.com
Finalizo el listado de usuarios user:all
```

# Nota
todos los usuarios tienes la contraseña `12345678`

### Correr Servidor
```sh 
$ php artisan serve
Laravel development server started: http://127.0.0.1:8000
[Tue May 26 23:49:07 2020] PHP 7.4.6 Development Server (http://127.0.0.1:8000) started
```


**Developer Ricardo Lugo 🤓🤓 , Hey Disfruta!**