
# Control de inventarios - Laravel 10
<p align="center"><a href="./public/proyecto.png" target="_blank"><img src="./public/proyecto.png" width="600" alt="Proyecto final"></a></p>

Esta es una guia de instalacion del proyecto "Control de inventarios" para el curso de Laravel 10

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Instalaciones
1. Instalar dependencias del proyecto
```bash
composer install
```

2. Renombrar el archivo ``.env.example`` a ``.env`` (Corregir variables de entorno si es necesario).

3. Crear contenedor de Docker con la base de datos
```bash
docker compose up -d
```

4. Correr migraciones
```bash
php artisan migrate
```

5. Ejecutar el proyecto
```bash
php artisan serve

# en otra terminal

npm run dev
```