# Gestor Financiero

Proyecto final de Programación III: aplicación web desarrollada en Laravel para registrar ingresos, gastos y cuentas, con control del saldo disponible.

El sistema permite a un usuario autenticado administrar sus categorías, cuentas y transacciones. Al registrar un ingreso aumenta el saldo de la cuenta; al registrar un gasto disminuye. Las ediciones y eliminaciones de transacciones actualizan correctamente el saldo.

## Funcionalidades

- Registro, inicio y cierre de sesión de usuarios.
- CRUD de categorías: nombre, tipo (ingreso o gasto) y descripción.
- CRUD de cuentas: nombre, descripción, saldo y moneda.
- CRUD de transacciones: cuenta, categoría, tipo, monto, fecha y descripción.
- Actualización automática del saldo de la cuenta.
- Reversión del efecto anterior al editar o eliminar una transacción.
- Validaciones para evitar montos menores o iguales a cero.
- Restricción de categorías según el tipo de transacción.
- Impedimento para registrar un gasto mayor al saldo disponible.
- Protección para no eliminar cuentas o categorías con transacciones asociadas.

## Tecnologías utilizadas

- PHP
- Laravel
- Blade
- MySQL / MariaDB
- Bootstrap
- Vite
- Git y GitHub

## Estructura del proyecto

- `app/Http/Controllers`: controladores de autenticación, categorías, cuentas y transacciones.
- `app/Models`: modelos de la aplicación.
- `database/migrations`: estructura de la base de datos.
- `resources/views`: vistas Blade de la interfaz.
- `routes`: rutas de la aplicación.
- `entrega`: archivo SQL y capturas de pantalla.
- `README.md`: documentación del proyecto.

## Requisitos

- PHP
- Composer
- Node.js y npm
- MySQL o MariaDB

## Instalación

1. Clonar el repositorio:

```bash
git clone [https://github.com/mosqueraingrid003-dot/Gestor-financiero.git](https://github.com/mosqueraingrid003-dot/Gestor-financiero.git)
cd Gestor-financiero
```

2. Instalar las dependencias de PHP:

```bash
composer install
```

3. Instalar las dependencias de JavaScript:

```bash
npm install
```

4. Crear el archivo de configuración:

```bash
cp .env.example .env
```

5. Generar la clave de la aplicación:

```bash
php artisan key:generate
```

6. Configurar la conexión a la base de datos en el archivo `.env`:

```env
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestor_financiero
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

7. Importar la base de datos desde el archivo SQL incluido en la carpeta `entrega`.

8. Iniciar el servidor:

```bash
php artisan serve
```

9. Abrir la aplicación en el navegador:

```text
http://127.0.0.1:8000
```

## Prueba del saldo

Ejemplo de validación del sistema:

1. Crear una cuenta con saldo de $200.000.
2. Registrar un ingreso de $150.000.
3. Registrar un gasto de $20.000.
4. El saldo final debe ser $330.000.

También se puede editar o eliminar una transacción para comprobar que el saldo se ajusta correctamente.

## Autora

Ingrid Mosquera  
Repositorio: https://github.com/mosqueraingrid003-dot/Gestor-financiero