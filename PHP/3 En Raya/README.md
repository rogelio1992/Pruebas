# Información sobre el juego Tres en raya

El juego del tres en raya, también conocido como *Tic-Tac-Toe*, es un juego de dos jugadores en que cada uno, por turnos,
marcan las casillas de un tablero 3x3 con una X o una O respectivamente.
Al empezar el juego se le da nombre a cada jugador y se define que marca representa a cada cuál

# Requisitos previos

* [XAMPP (7.3.7)](https://www.apachefriends.org/download.html) (opción recomendada).
* PHP (7.3.X), Apache y MySQL por separado (opción alternativa).

## Instalación (con XAMPP)

Una vez tengamos XAMPP instalado, **copiamos el proyecto dentro del directorio "htdocs"**
de nuestra instalación de XAMPP.
* ```
  http://localhost/phpmyadmin/
  ```
  
  Creamos una base de datos llamada **"game"** de **collation "utf8_bin"**, dejando toda la **configuración por defecto**.MYSQL con privilegios sobre esa base de datos.


# Cargar el Juego
* ```
  http://localhost/<nombre de la carpeta raíz dentro de htdocs>/interfaz.php/
  ```
# Construido
Echo en el lenguaje PHP con IDE PHP Storm 2019.2.1, utilizando la variable $_SESSION para guardar todo lo que va sucediendo en cada sesion del juego y cada jugada y Mysql para guardar dicha variable cada vez que se realice alguna jugada.

# Autor
* **Rogelio Daniel González Martínez