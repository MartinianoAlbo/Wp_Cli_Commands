<?php

if ( class_exists( 'WP_CLI_Command' )  ) {

  class Create_Order_WC_Command extends WP_CLI_Command {

        public function __invoke( $args, $assoc_args ) {
            list( $producto_skus ) = $args;
            $cantidades = array_map('intval', explode(',', $assoc_args['cantidad'] ?? '1'));
            $status = $assoc_args['status'] ?? 'processing';
            $skus = explode(',', $producto_skus);
            
            if ( count( $skus ) !== count( $cantidades ) ) {
                WP_CLI::error( "La cantidad de SKUs y cantidades no coinciden." );
                return;
            }

            $orden_data = [
              'first_name' => $assoc_args['nombre'] ?? 'Minimalart',
              'last_name'  => $assoc_args['apellido'] ?? 'Minimalart',
              'email'      => $assoc_args['email'] ?? 'minimalart@minimalart.co',
              'phone'      => $assoc_args['telefono'] ?? '',
              'address_1'  => $assoc_args['direccion'] ?? 'Niña 187',
              'city'       => $assoc_args['ciudad'] ?? 'Montevideo',
              'state'      => $assoc_args['estado'] ?? '',
              'postcode'   => $assoc_args['cp'] ?? '12500',
              'country'    => $assoc_args['pais'] ?? 'Uruguay',
            ];

            $orden = wc_create_order();

            $orden->set_address( $orden_data, 'billing' );
            $orden->set_address( $orden_data, 'shipping' );

            foreach ( $skus as $index => $sku ) {
                $producto = wc_get_product_id_by_sku( $sku );
                if ( ! $producto ) {
                    WP_CLI::warning( "Producto con SKU $sku no encontrado." );
                    continue;
                }
                $cantidad = $cantidades[$index] ?? 1;
                $orden->add_product( wc_get_product( $producto ), $cantidad );
            }

            if ( ! empty( $assoc_args['cupon'] ) ) {
              $codigo_cupon = sanitize_text_field( $assoc_args['cupon'] );
              $cupon = new WC_Coupon( $codigo_cupon );
              if ( $cupon->get_id() ) {
                  $orden->apply_coupon( $cupon );
              } else {
                  WP_CLI::warning( "Cupón con código $codigo_cupon no encontrado." );
              }
            }

            if ( ! empty( $assoc_args['descuento'] ) ) {
              $descuento_fijo = floatval( $assoc_args['descuento'] );
              $orden->set_discount_total( $descuento_fijo );
            }

            $orden->update_status( $status, 'Orden creada vía WP-CLI.' );

            WP_CLI::success( "Orden creada con éxito. ID de la orden: " . $orden->get_id() );
        }
    }
  

}
