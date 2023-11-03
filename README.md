# Instalación del Back-end

## Guia paso a paso de la instalación del Back-end en local
1. Tener instalado Composer + XAMPP con PHP ^8.1 (ejecutar SQL)
2. Clonar el repositorio: https://github.com/No-Country/nc_c14-40-m-php-vue.git
3. Acceder a la rama de back: git checkout develop-back
4. Entrar dentro de la carpeta de back para poder ejecutar los compandos de artisan (Laravel): cd back
5. Primero de todo instalar las dependencias del composer: composer install
6. Cambiar el nombre del archivo env.example a .env
7. Hacer la migracion de la base de datos con sus tablas y unos seeders de prueba: php artisan migrate:fresh --seed
8. Instalar las dependencias de Laravel Passport para que los tokens funcionen correctamente: php artisan passport:install
9. Crear un Personal Access Token para poder logear y crear usuarios: php artisan passport:client --personal
    En el nombre que nos dice de poner, escribir: Personal Access Token
10. Generar la key: php artisan key:generate
    
**Y ya podemos observar en PHPMyAdmin como estan todas las tablas con algunos ejemplos creados!
**

**Cada vez que se hace un migrate:fresh --seed (paso nº7), se han de realizar otra vez los pasos 8 y 9!
**
