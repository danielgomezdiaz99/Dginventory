# inventario
Dginventory es una aplicación para la gestión completa del inventario informático de una empresa. La aplicación permite a los usuarios gestionar productos, realizar operaciones de CRUD (Crear, Leer, Actualizar, Eliminar) y cuenta con un sistema de gestión de usuarios con verificación por token y roles de administrador.

Características
Gestión de inventario: CRUD completo para administrar productos en el inventario.
Sistema de usuarios: Verificación por token para gestionar accesos y roles de administrador.
Autenticación: Sistema seguro de autenticación con token JWT.
API propia: La gestión del inventario se realiza a través de una API personalizada.
Tecnologías utilizadas
Backend: Laravel, PHP
Frontend: JavaScript
Base de datos: MySQL
Autenticación: JSON Web Token (JWT)
Instalación
Clona este repositorio:

bash
Copiar código
git clone https://github.com/danielgomezdiaz99/Dginventory.git
Instala las dependencias de Laravel:

bash
Copiar código
composer install
Configura el archivo .env con los detalles de tu base de datos y la clave de JWT:

bash
Copiar código
cp .env.example .env
php artisan key:generate
Configura la base de datos:

bash
Copiar código
php artisan migrate
Inicia el servidor de desarrollo:

bash
Copiar código
php artisan serve
Uso
Registra un nuevo usuario o inicia sesión.
Una vez autenticado, podrás acceder a las funcionalidades de gestión de productos.
Los administradores pueden crear, editar y eliminar productos.
Contribuciones
Las contribuciones son bienvenidas. Si deseas contribuir a este proyecto, por favor abre un issue o envía un pull request.

Licencia
Este proyecto está licenciado bajo la MIT License.
