<?php
    $id = $_GET['id'];
    $res = ColeccionData::getRefCol($id);
    $fechas = IndicadorData::getAllRefOpc($id);
    $actividades = IndicadorData::getAllActividades();
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
            <h4>REFERENCIA - COLECCIÓN</h4>
        </div>
        <div>
            <table>
                <tr>
                    <td>REFERENCIA: </td>
                    <td><?php echo $res->referencia ?></td>
                </tr>
                <tr>
                    <td>COLECCIÓN: </td>
                    <td> <?php echo $res->coleccion ?></td>
                </tr>
                <tr>
                    <td>FECHA ENTREGA: </td>
                    <td> <?php echo $res->entrega->format('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td>ANALISTA COTIZACIÓN: </td>
                    <td> <?php echo $res->analista ?></td>
                </tr>
                <tr>
                    <td>ANALISTA FICHA: </td>
                    <td> <?php echo $res->analista_ficha ?></td>
                </tr>
            </table>
            <form action="./index.php?action=indicador-addFechaRef" method="POST">
                <span>ACTIVIDAD</span>
                <select name="actividad" id="actividad" required>
                    <?php foreach ($actividades as $actividad) { ?>
                        <option value="<?php echo $actividad->id ?>"><?php echo $actividad->nombre ?></option>
                    <?php } ?>
                </select>
                <span>FECHA INICIO</span>
                <input type="date" name="fecha_inicio" required>
                <span>FECHA FIN</span>
                <input type="date" name="fecha_fin" >
                <input type="hidden" name="id" value="<?php echo $id ?>" >
                <input type="submit">
            </form>
            <table>
                <thead>
                    <th>ACTIVIDAD</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                </thead>
                <?php foreach ($fechas as $fecha) { ?>
                    <tr>
                        <td><?php echo $fecha->actividad ?></td>
                        <td><?php echo $fecha->fecha_inicio->format('d-m-Y') ?></td>
                        <td><?php echo ($fecha->fecha_fin->format('d-m-Y') != '01-01-1900')? $fecha->fecha_fin->format('d-m-Y') : '-' ?></td>
                    </tr>    
                <?php } ?>
            </table>
            
        </div>
    </div>
</div>