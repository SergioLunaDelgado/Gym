# Iniciar un proyecto en wp
1. Descargar el zip de wordpress desde la pagina oficial https://wordpress.org/download/
2. Crear la base de datos
3. Comenzar con la instalacion de WP
4. Crear una carpeta dentro de wp-content/themes/
5. Crear un archivo index.php
6. Crear el archivo general de los estilos style.css
    * Incluir el comentario de inicialización 
    * Creamos los archivos index.php y style.css para verificar que todo este correcto
7. En el panel de admin activamos el tema
8. En Usuarios / Ajuses hacemos los cambios necesarios desde el panel de admin
9. Instalamos los siguientes Plugins: Disable Gutenberg y Advanced Custom Fields
    * Despues podemos instalar como se valla necesitando pero estas dos son indispensables
10. Crear algunas paginas
    * Las más importantes son la del inicio y blog. Despues tenemos que ir Ajustes -> Lectura y seleccionar la opcion de 'Una Pagina Estatica' y seleccionamos estas dos paginas
    * De igual manera podemos seguir creando más paginas como se avance en el proyecto
11. Iniciamos con la creacion de los archivos de php empezando por el header y el footer

# Pasos para la instalacion de temas 

1. En la ruta raiz del proyecto `wp-content/themes` tenemos que crear lo siguiente
    * Se debe respetar el nombre y el contenido de estos archivos
    1. style.css = Debemos copiar el comentario de ese archivo con toda la info
    2. index.php = Crear la estructura basica de html y en una etiqueta main escribir el loop de wordpress
    3. /src = Crear una carpeta con las imagenes que se usara en todo el sitio web
    4. /template-parts = Carpeta con codigo reutilizable no generico
    5. functions.php = Siguiendo las convenciones de WP debemos crear un archivo general para las funciones
    6. header.php
    * Para incluirlo en los demas archivos se debe usar el get_header()
    7. page.php = Plantilla por defecto
    8. page-{cualquier nombre}.php = Otro tipo de plantilla, por lo generar es con algun cambio de page.php
    * Colocando el comentario con el Template Name
    9. Si abrimos un enlace de un Custom Post Type y no se ve reflejado el contenido entonces tenemos que ir ajustes / enlaces permanentes y darele en guardar cambios para que modifique el archivo .htaccess
    10. single.php = Para Custom post (clases) y entradas de blog
    11. single-{el nombre del plugin}: Solo visible para las clases y no para las entradas de blog
    12. sidebar.php = este es un archivo opcional aunque la mayoria de blogs contienen un sidebar
    13. Una carpeta /includes
    14. widgets.php Dentro de la carpeta de includes creamos un archivo para almacenar los widges personalizados
    * recordar incluirlo con un require al functions
    15. OPCIONAL: si se desea añadir un panel de galeria wp ya incluye uno (Añadir objeto -> crear galeria) pero se puede mejorar con la libreria de lightbox para eso se tiene que agregar:
    * carpeta /css
    * carpeta /js
    * carpeta /images
    * en functions.php gymfitness_scripts_styles agregar los styles y los scripts
    16. home.php = Para las entradas
    17. category.php = Este archivo puede ser opcional, si en un blog se agregan categorias en el panel de administracion se necesita crear un template especial donde se junten todas las categorias
    18. author.php = Si se crea un blog y se quiere mostrar que persona escribio la entrada se necesita un template especial
    19. front-page.php = Sera nuestra pagina principal (por defecto era page.php o index.php)
    20. queries.php = Un archivo de funciones para reutilizar codigo, podemos pasarle parametros para hacer la mas dinamica. No son como /template-parts ya que eso incluye codigo html, los queries son funciones tomando la funciones de includes

Desde el panel de administracion de WP

2. En el apartado de plugin debemos instalar y activar la extension: **Disable Gutenberg**

3. En el apartado de plugin debemos instalar y activar la extension: **Advanced Custom Fields** para tener mas campos personalizados que no brinda wp
* Si queremos tener en nuestro template una zona de mapas al igual que leafletjs, tenemos que instalar el plugin **ACF OpenStreetMap Field**
* Si queremos tener un formulario tenemos que descargar el plugin **Contact Form 7**. NECESITA UNA CUENTA EN **SENDINBLUE**
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

sergioluna13102001@gmail.com


<!-- Yoast SEO -->
<!-- WP Super Cache - Automatic -->

4. En el apartado de paginas debemos crear y publicar las paginas de nuestro sitio web

5. En el apartado de ajustes/lectura selecionamos una pagina estatica y elegimos la pagina de portada (/inicio) y la de entradas (/blog)
* Aqui tambien podemos seleccionar un numero de entradas por si queremos paginar

6. En el pandel de admin buscamos Usuarios -> root -> editar -> Agregamos nuestro nombre, apellido y la forma que se va buscar publicamente
* Tambien podemos agregar una descripcion en la seccion 'Información biográfica'

7. En ajustes -> generales podemos modificar el formato de la fecha para usarlo con el metodo the_time().
* Tambien tenemos que agregar una descripcion corta para aumentar el SEO

8. Para crear un plugin (en este caso una seccion que no sea una pagina o entrada) seguir el ejemplo que esta en la carpeta de /plugins

9. Cuando se imprima algo en pantalla se tiene que escapar