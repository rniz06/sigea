# Proyecto de Tesis

## Tecnologías
- Laravel 12
- Postgresql 17 

## Requisitos previos

- PHP 8.2 o superior
- Composer
- Una base de datos compatible (MySQL, PostgreSQL, SQLite, etc.) por defecto usamos PostgreSQL

## Instalación

1. Clona el repositorio:

    ```bash
    git clone https://github.com/rniz06/sigea.git && cd sigea
    ```

2. En el directorio Instala las dependencias de Composer:
    ```bash
    composer install
    ```

3. Copia el archivo de configuración .env.example a .env y configura tus variables de entorno:
    ```bash
    cp .env.example .env
    ```

4. Genera una nueva clave de aplicación:
    ```bash
    php artisan key:generate
    ```

5. Realiza las migraciones y ejecuta los seeders:
    ```bash
    php artisan migrate --seed
    ```

¡Listo! Ahora puedes acceder al sistema en tu navegador web.

# Uso

Una vez instalado, puedes iniciar sesión en el sistema utilizando las siguientes credenciales:

Correo: admin@admin.com
Contraseña: admin

# Soporte

Ante dudas o consultas contactar con...