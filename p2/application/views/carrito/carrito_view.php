<body>
        <section class="conteinersF">
            <div class="cart">
                <div class="heading">
                    <h1 class="tit text-center">PRODUCTOS DE TU CARRITO</h1>
                </div>
                <div class="isi">
                    <?php $cart_check = $this->cart->contents();
                    if (empty($cart_check)){
                        echo 'Para agregar productos al carrito, click en "Agregar al Carrito"';
                    } ?>
                </div>
                <?php if($mensaje = $this->session->flashdata('mensaje')): ?> 
                    <div class="alert alert-warning" style="margin: 0 50px 25px 50px"> 
                        <?php echo $mensaje; ?> 
                    </div> 
                <?php endif; ?>
                <div class="teibol">
                    <form action="<?php echo base_url('stock_actualizar'); ?>" method="post">
                        <table class="table">
                                <?php if ($cart = $this->cart->contents()): ?>
                                    <tr class="text-center fuenteTabla" id="headUsuarios">
                                        <td class="borrow">ID</td>
                                        <td>Descripción</td>
                                        <td class="borrow2">Precio</td>
                                        <td>Cantidad</td>
                                        <td>Subtotal</td>
                                        <td>Cancelar Producto</td>
                                    </tr>
                                    <?php
                                    $gran_total = 0;
                                    $i = 1;
                                    foreach ($cart as $item):
                                        $row_id = 'row_' . $item['rowid'];
                                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                        ?>
                                        <tbody class="container-table">
                                            <tr class="text-center fuenteTabla" id="<?php echo $row_id; ?>">
                                                <td class="borrow"><?php echo $i++; ?></td>
                                                <td><?php echo $item['name']; ?></td>
                                                <td class="borrow2">$ <?php echo number_format($item['price'], 2); ?></td>
                                                <td><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: center"'); ?></td>
                                                <td>$ <?php echo number_format($item['subtotal'], 2); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila('<?php echo $row_id; ?>', '<?php echo $item['rowid']; ?>')">Eliminar producto</button>
                                                </td>
                                            </tr>
                                            <?php $gran_total += $item['subtotal']; ?>
                                        </tbody>
                                    <?php endforeach; ?>
                                </table>
                                    <h1 class="text-center" id="totald">Total: $<?php echo number_format($gran_total, 2); ?></h1>
                                <?php endif; ?>
                        <div class="button-container">
                            <input type="button" class="btn btn-danger fuenteBotones btn-md" value="Borrar Carrito" onclick="window.location = 'borrar_carri' "> 
                            <input type="submit" class="btn btn-secondary fuenteBotones btn-md" value="Actualizar">
                            <input type="button" class="btn btn-success fuenteBotones btn-md" value="Confirmar Orden" onclick="window.location = '<?php echo base_url('form_compra'); ?>'">
                        </div>
                    </form>
                </div>
            </div>
        </section>
</body>
    <script>
    function eliminarFila(rowId, rowid) {
        if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
            // Eliminar la fila del DOM
            var fila = document.getElementById(rowId);
            fila.parentNode.removeChild(fila);

            // Enviar solicitud AJAX para eliminar el ítem del servidor
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo base_url('carrito/removeone'); ?>', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Redirigir a la página para refrescar la información
                    window.location.reload();
                }
            };
            xhr.send('rowid=' + rowid);
        }
    }
    </script>
</body>
</html>
