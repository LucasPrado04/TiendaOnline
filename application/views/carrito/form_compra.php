<!DOCTYPE html>
<html>
<head>
    <title>Cierre de Venta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div id="detailh1">
        <h1>Cierre de Venta</h1>
    </div>
    <section class="container" style="margin-bottom: 0px;">
        <div class="contenedor_detail" id="cierreventad">
            <?php if (isset($error) && $error) : ?>
              <div class="alert alert-danger">
                <?php echo $error; ?>
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url('cierre_venta'); ?>" method="post">
                <h2>¡Ingrese un nombre, direccion y numero de telefono para poder coordinar el envío!</h2>
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="tel">Teléfono:</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="<?php echo set_value('tel'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="direc">Dirección:</label>
                    <input type="text" class="form-control" id="direc" name="direc" value="<?php echo set_value('direc'); ?>" required>
                </div>
                <div class="button-container" style="margin-bottom: 2px; margin-top: 0px;">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a type="button" class="btn btn-danger" href="<?php echo base_url("borrar_carrito");?>">Cancelar compra</a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
