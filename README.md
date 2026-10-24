# NovaPOS

Punto de venta e inventario web hecho en PHP y MySQL. Lo desarrollé e implementé para una empresa del sector servicios que llevaba sus ventas y su inventario a mano.

*In English: a PHP and MySQL point of sale and inventory system that I built and deployed for a service-sector company.*

## Qué hace

- Venta en caja: se agregan productos por código, se asigna un cliente y se registra la venta. No deja vender más unidades de las que hay en existencia.
- La venta y el descuento del inventario se guardan en una misma transacción, así que no quedan ventas a medias.
- Ticket de venta y reporte de ganancias en PDF.
- Catálogo de productos con precio de compra y de venta, clientes, vendedores y usuarios.
- Dos roles, administrador y vendedor, cada uno con su propio menú.
- Panel con el total de productos, ventas, usuarios y clientes.

## Tecnología

PHP 8 con PDO, MySQL o MariaDB, JavaScript, Bootstrap 4 con la plantilla SB Admin 2 y FPDF para los PDF. Todas las consultas usan sentencias preparadas y las contraseñas se guardan con `password_hash`.

## Cómo correrlo

Requisitos: PHP 8 y MySQL o MariaDB (con XAMPP funciona).

```bash
mysql -u root -p < database/schema.sql   # crea la base ventas_php
mysql -u root -p < database/seeds.sql    # datos de prueba
cp config.example.php config.php         # usuario y contraseña de MySQL, y nombre del negocio
php -S localhost:8000
```

Después se abre http://localhost:8000.

Usuario de prueba: `admin` con contraseña `admin123` (administrador). Si se instala fuera de un entorno local, conviene cambiar la contraseña desde **Perfil**.

## Pendientes

- No tiene pruebas automatizadas.
- No avisa cuando un producto se está quedando sin existencias.
- Es para un solo local: no maneja sucursales ni varias cajas con inventario separado.

## Licencia

[MIT](LICENSE)
