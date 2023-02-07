<?php

use PhpParser\Node\Expr\Empty_;

foreach ($contenido as $key => $value) { ?>
    <tr>
        <td style="text-align: center;"><?= $key + 1 ?></td>
        <td style="text-align: center;"><?php echo (!empty($value->colores) ? $value->colores : '-') ?></td>
        <td style="text-align: center;"><?php echo (!empty($value->densidades) ? $value->densidades : '-') ?></td>
        <td style="text-align: center;"><?php echo (!empty($value->porcentaje_agua) ? $value->porcentaje_agua : '-') ?></td>
        <td style="text-align: center;"><?php echo (!empty($value->delta_e) ? $value->delta_e : '-') ?></td>
    </tr>
<?php } ?>