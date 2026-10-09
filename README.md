# Control de Pedidos e Inventario de Insumos - Panadería Panes y Manjares

Proyecto individual de Gerencia de Software (Universidad Santo Tomás, Seccional Villavicencio).

Stack: PHP y MySQL con XAMPP.

## Módulos
- `registro_insumos`: registro de insumos (T-01)
- `registro_recetas`: productos y recetas por producto (T-02)
- `registro_pedidos`: pedidos por encargo (T-03)
- `medicion`: script para medir el tiempo del listado de insumos

## Instalación
1. Iniciar Apache y MySQL en XAMPP.
2. Importar en phpMyAdmin `insumos.sql`, `recetas.sql` y `pedidos.sql`.
3. Copiar las carpetas a `C:\xampp\htdocs\`.
4. Abrir `http://localhost/registro_insumos/insumos.php`.

## Convención de commits
Cada mensaje empieza con el identificador de la tarjeta de Trello, por ejemplo: `T-01 módulo de registro de insumos`.
