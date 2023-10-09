Prueba técnica para desarrolladores
Prueba técnica para desarrollador, prueba realizada en php framework laravel, esta prueba consiste en la creación de una app de taraeas donde el usuario pudiera crear y completar una actividad, asi mismo, en estas dos acciones se debia enviar un mensaje via correo electrónico.

siga las instrucciones para realizar el testeo de la app:
    1.Instalar XAMPP
    2.Instalar Composer
    3.Instalar Laravel mediante composer con el siguiente script "composer create-project laravel/laravel example-app"
    4.clone el codigo de git hub realizando apertura de una consola git en la carpeta donde desee clonarlo con el comando git clone url
    5.valide en el proyecto creado de ejemplo con el comando php artisen serve, que realmente este funcionando laravel
    6.una vez validado, copie los archivos internos del repositorio clonado y peguelos en el nuevo proyecto
    7.inicialice XAMPP y realice la activacion de Apache y Mysql
    8.Damos clic en admin de mysql y alli nos arrojara nuestro servidor local de la base de datos
    9.Crearemos la base de datos "prueba"
    10. En el archivo .env configuraremos de la siguiente manera la conexion de la base de datos
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=prueba
        DB_USERNAME=root
        DB_PASSWORD=
    11.Generaremos una consola dentro de nuestra carpeta de proyecto o dentro de vs code y usaremos el comando php artisan migrate para crear las tablas dentro de nuestra base de datos
    12.Iremos nuevamente al archivo .env y configuraremos nuestro email de la siguiente manera:
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=alexestebann64@gmail.com
        MAIL_PASSWORD=nenyerupbqlwbhqn
        MAIL_ENCRYPTION=ssl
        MAIL_FROM_ADDRESS="alexestebann64@gmail.com"
        MAIL_FROM_NAME="${APP_NAME}"
    13.En la consola anteriormente creada inicializaremos nuestro proyecto con el comando php artisan serve
    14. Haremos el testeo de cada funcionalidad, teniendo en cuenta el agregar tareas, editarlas, eliminarlas , completarlas, podremos registrarnos, iniciar sesion, cerrar sesion, tendemos tareas
    que se empaginaran cada 7 elemenetos.
