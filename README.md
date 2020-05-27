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

### Rutas
Estas son la siguientes rutas de la api


| descripcion | Ruta |
| ------ | ------ |
| Crear documento | [api/document][PlDb] |
| Borrar documento | [api/document/delete/{id}][PlDb] |
| Update documento | [api/document/update][PlDb] |
| Select documento | [api/document/{id}][PlDb] |
| Select documentos | [api/documents][PlDb] |
| autenticacion usuario | [api/login][PlDb] |
| registro usuario | [api/register][PlDb] |
| Borrar usuario | [api/user/delete/{id}][PlDb] |
| Usuarios documentos | [api/user/doc/{id}][PlDb] |
| Update usuario | [api/user/update/{id}][PlDb] |
| Select usuario | [api/user/{id}][PlDb] |
| Select usuarios | [api/users][PlDb] |

Para facilidad te adjunto archivos de postman realizar los request necesarios
con el nombre `examenLaravel.postman_collection.json` 

**Developer Ricardo Lugo 🤓🤓 , Hey Difruta!**