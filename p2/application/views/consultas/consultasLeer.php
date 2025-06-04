<!DOCTYPE html>
<html>
<head>
    <title><?php echo $titulo; ?></title>
</head>
<body>
    <section>
        <div class="consulta-class">
            <h1>CONSULTAS</h1>
        </div>
        <div class="btn-leido">
            <button onclick="window.location.href='<?php echo site_url('consultas_leidas'); ?>'" class="btn btn-primary">Ver Consultas Leídas</button>
        </div>
        <div class="sec-consulta">
            <table class="full-table">
                <thead class="head-table">
                    <tr>
                        <th class="nombrerow">Nombre</th>
                        <th>Email</th>
                        <th class="telrow">Teléfono</th>
                        <th class="mensajerow">Mensaje</th>
                        <th>Leidos</th>
                        <th>Ampliar</th>
                    </tr>
                </thead>
                <tbody class="body-consulta">
                    <?php if (!empty($consultas)) {
                        foreach ($consultas->result() as $consulta) { ?>
                            <tr style="margin-left: 15px">
                                <td class="nombrerow"><?php echo $consulta->nombre; ?></td>
                                <td><?php echo $consulta->email; ?></td>
                                <td class="telrow"><?php echo $consulta->numero; ?></td>
                                <td class="mensajerow"><?php echo $consulta->mensaje; ?></td> 
                                <td>
                                    <form action="<?php echo base_url('consulta_leer/' . $consulta->id); ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-t btn-success" style="margin-right: 10px; margin-left: 10px;">Marcar Leído</button>
                                    </form>
                                </td>
                                <td>
                                <form action="<?php echo base_url('ver_consulta/' . $consulta->id); ?>" method="post" style="display:inline;">
                                        <button type="submit" class="btn btn-t btn-primary" style="margin-right: 10px; margin-left: 10px;">Ampliar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No hay consultas de usuarios disponibles.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
