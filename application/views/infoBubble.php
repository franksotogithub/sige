<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="<?php echo $this->config->item('author'); ?>">
        <link href="/sige/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <title>Sistema de Consulta de Centros Poblados</title>
        <!--
        <?php echo $this->config->item('var_sis'); ?>
        -->
    </head>
    <body topmargin="0" leftmargin="0" oncontextmenu="return false" >
        <table id="tblArea_informacion" border="1">
            <thead>
                <th>Descripci&oacute;n</th>
                <th>Total</th>
            </thead>
            <tbody>
                <?php foreach ($data->rows as $k => $v): ?>
                <tr>
                    <td><?php echo $k; ?></td>
                    <td><?php echo $v; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if( isset($image) && $image ): ?>
        <p><b>Imagen</b></p>
<!--        <a href="<?php echo $image; ?>" id="boton">Ver Foto</a>-->
        <img src="<?php echo $image; ?>"  height="350" width="500"  />
        <?php endif; ?>
    </body>
</html>