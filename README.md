=== McoTests ===
# Install Composer

```bash
composer install
```
## Commands

### Create WC Order

In Shell.

```bash
wp crear_orden_wc
```

## OPTIONS
         
<producto_id>
SKU del producto a añadir a la orden.

[--cantidad=<cantidad>]
Cantidad del producto. Por defecto, 1.

[--status=<status>]
Status de orden: pending, completed, processing...

[--envio=<metodo_de_envio>]
Método de envío. Ejemplo: 'free_shipping'.

[--descuento=<descuento_fijo>]
Descuento fijo a aplicar a la orden.

[--cupon=<codigo_cupon>]
Código de un cupón existente para aplicar a la orden.

## EXAMPLES
```bash
wp crear_orden_wc "SKU1,SKU2" --cantidad="2,1" --status="processing"
```