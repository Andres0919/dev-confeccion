<?php
    $Operacion=$_POST['operacion'];
    $Pieza=$_POST['pieza'];        

    $codigos = CodigosData::getPiezaAndOperación($Operacion, $Pieza);
?>


<p><strong>LISTADO DE CODIGOS</strong></p>
<h1 class="h1"></h1>
<a href="./index.php?view=codigos-consulta"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
<br><br>

<table border=2 align=center>
    <tr>
        <th>CÓDIGO</th>
        <th>OPERACIÓN</th>
        <th>PIEZA</th>
        <th>MÁQUINA</th>
        <th>TRAYECTO</th>
        <th>CONDICIÓN TELA</th>
        <th>GEOMETRÍA PIEZA</th>
        <th>CORTE PIEZA</th>
        <th>INSUMO</th>
        <th>TIPO TELA</th>
        <th>DESCRIPCIÓN</th>
        <th>USUARIO</th>
        <th>FECHA</th>
    </tr>

    <?php foreach($codigos as $codigo){ ?>
    <tr>
        <td><?php echo $codigo->Codigo ?></td>
        <td><?php echo $codigo->Operacion ?></td>
        <td><?php echo $codigo->Pieza ?></td>
        <td><?php echo $codigo->Maquina ?></td>
        <td><?php echo $codigo->Trayecto ?></td>
        <td><?php echo $codigo->Condicion_Tela ?></td>
        <td><?php echo $codigo->Geo_Pieza ?></td>
        <td><?php echo $codigo->Corte_Pieza ?></td>
        <td><?php echo $codigo->Insumo ?></td>
        <td><?php echo $codigo->Tipo_Tela ?></td>
        <td><?php echo $codigo->Descripcion ?></td>
        <td><?php echo $codigo->Usuario ?></td>
        <td><?php echo date_format($codigo->Fecha, 'd-m-Y') ?></td>
    </tr>           
    <?php } ?>
</table>
