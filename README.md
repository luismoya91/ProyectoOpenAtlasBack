Proyecto Open Atlas - BackEnd

Para hacer funcionar el proyecto se requiere se tenga instalado:

    -PHP 8.2+
    -MariaDB 10.4.+
    -Composer 2.8+

1.Se debe crear la base de datos

2.Se debe configurar la base de datos en el archivo .env

3.Ejecutar:
    -composer install
    -php artisan migrate
    -php artisan db:seed

4.Para subir el proyecto en local, ejecutar:
    -php artisan serve

5.Ingresar a http://127.0.0.1:8000/api/user/register para registar un usuario o entrar con alguno de los usuarios de prueba:

    usuario admin
    email: admin.opena@gmail.com
    password: $+V6&ZNs,DAD-ZK

    usuario1
    email: user1.openap@gmail.com
    password: yu,WVxA{hC30B6[

    usuario2
    email: user2.openap@gmail.com
    password: h?bq$+7rF8Xc9f



