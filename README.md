# practica_final_ing_2
### Instrucciones

Al aver descargado el .zip del proyecto
almacenar el archivo descomprimido en la carpeta htdocs
del xampp.

# Pasos para la ejecucion

Activar los servicios de apache y mysql en xampp control panel
luego:

## Paso 1
Crear la base de datos en mysql del servidor de xampp
> http://localhost//phpmyadmin

Con el siguiente script
```sql
CREATE DATABASE `todo`;
use `todo`;

CREATE TABLE `login` (
    `id` int(9) NOT NULL auto_increment,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tareas` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(100) NOT NULL,
    `login_id` int(11) NOT NULL,
    `fecha_date` date DEFAULT CURRENT_TIMESTAMP,
    `fecha`date,
    `clasi` varchar(100) NOT NULL,
    `status` varchar(15) NOT NULL DEFAULT 'sin terminar',
    PRIMARY KEY  (`id`),
    CONSTRAINT FK_products_1
    FOREIGN KEY (login_id) REFERENCES login(id)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
```

## Paso 2
Abrir en el navegador la carpeta del poryecto
> http://localhost/practica_final_ing_2-main


# Pasos para el uso de la pagina todo-list
Despues de aver ejecutado correctamente las anteriores pasos ahora seguimos con el uso de la pagina creada.

## Paso 1
Registrarte con:
+ Nombre
+ Email
+ Usuario
+ Contraseña

## Paso 2
Luego de aver registrado corectamente, iniciar seción
con el:
+ usuario
+ contraseña.

|Usuario
|-------------|
|`Usuario`|
|**Contraseña**|
|`Contraseña`|
|![](https://simg.nicepng.com/png/small/281-2819748_how-to-set-use-login-button-clipart-button.png)|



## Paso 3
**Agregar nuvas tareas**

Nueva tarea |............
------------- | -------------
 `Agregar tarea` | **Agregar**

**lista de tareas**

| id | Tarea  | Accion|............|
|---------|----------|---|-----|
|3| tarea 3 |editar|eliminar|
|2| tarea 2 |editar |eliminar|
| 1|tarea 1 | editar |eliminar|

---
### End
