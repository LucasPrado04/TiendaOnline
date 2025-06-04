<body>
    <section>
      <div class="consulta-class">
        <h1><?php echo $titulo; ?></h1>
      </div>
      <div class="btn-lei2">
        <button onclick="window.location.href='<?php echo site_url('ver_consultas'); ?>'" class="btn btn-t btn-primary">Ver Consultas por leer
      </div>
      <div class="sec-consulta">
        <table class="full-table">
            <thead class="head-table">
                <tr>
                    <th class="emailrow">Nombre</th>
                    <th >Email</th>
                    <th class="telrows">Teléfono</th>
                    <th class="mensajerows">Mensaje</th>
                    <th class="btn-fulc">Ampliar</th>
                </tr>
            </thead>
            <tbody class="body-consulta">
                <?php if (!empty($consultas)) {
                    foreach ($consultas->result() as $consulta) { ?>
                        <tr>
                            <td class="emailrow"><?php echo $consulta->nombre; ?></td>
                            <td ><?php echo $consulta->email; ?></td>
                            <td class="telrows"><?php echo $consulta->numero; ?></td>
                            <td class="mensajerows"><?php echo $consulta->mensaje; ?></td>
                            <td class="btn-fulc">
                                <form action="<?php echo base_url('ver_consulta/' . $consulta->id); ?>" method="post" style="display:inline;">
                                    <button type="submit" class="btn btn-tl btn-primary" style="margin-left: 80px;">Ampliar</button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="4">No hay consultas de usuarios disponibles.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
      </div>
    </section>
</body>

