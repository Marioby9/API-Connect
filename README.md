<a name="readme-top"></a>

<br />
<div align="center">
  <img src="./public/logo.png"/>
  <br><br>
  <p align="center">
    Servicio Web API Rest para consumir libros en JSON. 
  </p>
</div>

<!-- TABLA DE CONTENIDO -->
<details>
  <summary>Tabla de contenido</summary>
  <ol>
    <li>
      <a href="#resumen">Resumen</a>
      <ul>
        <li><a href="#características-principales">Características Principales<a></li>
      </ul>
    </li>
    <li><a href="#requisitos-previos">Requisitos previos</a></li>
    <li><a href="#instalación">Instalación</a></li>
    <li><a href="#contribuye">Contribuye</a></li>
    <li><a href="#licencia">Licencia</a></li>
    <li><a href="#contacto">Contacto</a></li>
    <li><a href="#agradecimiento">Agradecimiento</a></li>
  </ol>
</details>

<!-- EMPEZAMOS -->

## Resumen

Bienvenido a API-Connect. Es una aplicación realizada en PHP que levanta una API REST a partir de un fichero .xml. Se basa en crear un servicio web realizado con PHP para, posteriormente, consumirlo con una aplicación cliente. 
El funcionamiento lineal de la aplicación es: Leer un fichero XML, transformarlo a una array de objetos PHP, pasarlo a JSON y levantar la API con los datos obtenidos.

### Características Principales:

- **Lectura de fichero:** Obtén unos datos proporcionados por fichero XML y pásalos a formato JSON.
- **Transforma datos a JSON:** Utiliza funciones para convertir una estructura de datos PHP a tipo JSON.

- **Gestión de peticiones:** Gestiona el tratamiento de peticiones GET recibidas desde el cliente que consume la API y devuelve los datos solicitados.

- **Despliegue de API:** Levanta la API REST para que sea utilizable y tratable por distintos clientes.



Este proyecto busca proporcionar una solución robusta para que el usuario que lo utilice, pueda levantar un servicio web de una manera fácil y rápida. 

Siéntete libre de explorar, contribuir y adaptar este proyecto según tus necesidades específicas. ¡Disfruta de tu experiencia en nuestra API REST PHP!

## Requisitos previos

Antes de comenzar con la instalación, asegúrate de tener instalado Apache en tu sistema. Puedes descargar e instalar XAMPP, que incluye Apache, PHP y MySQL, desde [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).

## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Configuración de Apache:**

   - Abre el archivo de configuración de vhost de Apache. Esto puede variar según tu sistema operativo. En Windows, generalmente se encuentra en `C:\xampp\apache\conf\extra\httpd-vhosts.conf`.
   - Agrega la siguiente configuración para tu proyecto:

     ```apache
     <VirtualHost *:80>
        ServerName tudnslocal.com

        DocumentRoot "/xampp/htdocs/tudnslocal.com/src/paginas"
        <Directory "/xampp/htdocs/tudnslocal.com/src/paginas">
            Options -Indexes +FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>

        Alias "/public" "/xampp/htdocs/tudnslocal.com/public"
        <Directory "/xampp/htdocs/tudnslocal.com/public">
            Options -Indexes +FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>
     </VirtualHost>
     ```

2. **Mover el proyecto a htdocs:**

   - Copia todos los archivos de tu proyecto a la carpeta `htdocs` de XAMPP (generalmente en `C:\xampp\htdocs` en Windows).

3. **Configuración del archivo hosts:**

   - Abre el archivo `hosts` de tu sistema. En Windows, se encuentra en `C:\Windows\System32\drivers\etc\hosts`. Puedes editarlo con un editor de texto con privilegios de administrador.
   - Agrega la siguiente línea al final del archivo:

     ```
     127.0.0.1 tudnslocal.com
     ```

4. **Descarga e Instalación de browscap.ini:**

   - Visita la página web oficial de [https://browscap.org/](https://browscap.org/).

   - Descarga la versión más reciente del archivo `full_php_browscap.ini`.

   - Coloca el archivo descargado en la carpeta de configuración de PHP/Extras (por ejemplo, `C:\xampp\php\extras\browscap.ini`).

   ```bash
   # Puedes usar comandos como wget o curl para descargar el archivo directamente en la terminal.
   wget https://browscap.org/stream?q=PHP_BrowsCapINI -O C:\xampp\php\extras\browscap.ini
   ```

5. **Cambio de Ruta del Directorio en .htaccess:**

   - Abre o crea el archivo `.htaccess` en la raíz de tu proyecto.
   - Agrega la siguiente línea para cambiar la ruta del directorio del proyecto:

     ```apache
     php_value include_path "C:\xampp\htdocs\tu_proyecto\ruta\del\directorio"
     ```

     Asegúrate de modificar `C:\xampp\htdocs\tu_proyecto\ruta\del\directorio` con la ruta correcta hacia tu directorio de proyecto.

6. **Configuración de Variables Globales:**

   - Abre el archivo `Config/globalParams.php` y ajusta las variables de acceso al fichero xml de lectura de ficheros.

     ```php
     <?php
     //PARÁMETROS DE CONFIGURACIÓN GLOBALES
      const XMLFILE = "./Files/books.xml";
     ?>
     ```

   - Abre el archivo `books.php` y configura las importaciones globales según tus necesidades.

     ```php
     <?php
      //Importamos la clase Response y la clase User
      require_once './Class/DataXML.php';
      require_once './Config/globalParams.php';
      require_once './Class/Response.inc.php';
      require_once './Class/Book.inc.php';
     ```

7. **Reiniciar Apache:**

   - Reinicia el servidor Apache desde el panel de control de XAMPP o usando los comandos apropiados para tu sistema.


Ahora deberías poder acceder a tu proyecto a través de [http://tudnslocal.com/books](http://tudnslocal.com/books) en tu navegador. Asegúrate de que las variables en los archivos de configuración estén configuradas correctamente y que las tablas y datos de prueba se hayan creado con éxito.

¡Listo! Tu entorno local está configurado para ejecutar el proyecto de API REST en PHP con las variables globales personalizadas y datos de prueba. ¡Feliz desarrollo!

<p align="right">(<a href="#readme-top">Volver arriba</a>)</p>
      
<!-- CONTRIBUYE -->
## Contribuye

Las contribuciones son las que hacen de la comunidad de código abierto un lugar increíble para aprender, inspirar y crear. Cualquier contribución que hagas será muy apreciada.

Si tiene alguna sugerencia que pueda mejorar esto, bifurque el repositorio y cree una solicitud de extracción. También puedes simplemente abrir un problema con la etiqueta "mejora". ¡No olvides darle una estrella al proyecto! ¡Gracias de nuevo!

<p align="right">(<a href="#readme-top">Volver arriba</a>)</p>

<!-- LICENCIA -->

## Licencia

Distribuido bajo la licencia Apache License 2.0. Consulte `LICENCIA.txt` para obtener más información.

<p align="right">(<a href="#readme-top">Volver arriba</a>)</p>

<!-- CONTACTO -->

## Contacto

Mario Martín Godoy - [@mariomg]() - mmartin.mrmg@gmail.com

Enlace del proyecto: [https://github.com/Marioby9/API-Connect](https://github.com/Marioby9/API-Connect)

<p align="right">(<a href="#readme-top">Volver arriba</a>)</p>

<!-- AGREDECIMIENTO -->

## Agradecimiento

Utilice este espacio para enumerar los recursos que le resulten útiles y a los que le gustaría dar crédito. ¡He incluido algunos de mis favoritos para comenzar!

- [Elije una licencia de código abierto](https://choosealicense.com)
- [PHP](https://www.php.net/)

<p align="right">(<a href="#readme-top">Volver arriba</a>)</p>
