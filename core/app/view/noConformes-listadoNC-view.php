<?php 
  $user = Core::$user;
  $noConformes = NoConformesData::getAll();
?>
<p class="text-center" ><strong>LISTADO NO CONFORMES</strong></p>
<h1 class="h1"></h1>
<div style="float:left">
    <?php if ($user->Nombre=='consulta') { ?>
            <a style="text-aligne:left" href="../consulta.php"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
    <?php }else{ ?>
            <a style="text-aligne:left" href="./index.php?view=noConformes-form"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
    <?php } ?>
    <a style="text-aligne:left" href="excel.php"><img src="assets/img/download2.png" alt="descargar" width="55" height="55" title="Descargar"></a>
</div>
<br><br>
<form>
    <input id="searchTerm" placeholder="buscar" type="text" onkeyup="doSearch()" />
</form>
<table border=2 align=center id=datos>
    <tr>
        <th>Planta</th>
        <th>Fecha</th>
        <th>Semana</th>
        <th>Categoria</th>
        <th>Item</th>
        <th>Marca</th>
        <th>Referencia</th>
        <th style='width:15px;'>Familia</th>
        <th>Observaciones</th>
        <th>Responsable</th>
        <th>Usuario</th>
        <?php if ($user->Categoria == "1"){ ?>        
            <th>Eliminar</th>
        <?php } ?>
    </tr>

    <?php foreach($noConformes as $noConforme){ ?>
    <tr>
        <td><?php $noConforme->Planta ?></td>
        <td><?php date_format($noConforme->Fecha, 'd-m-Y') ?></td>
        <td><?php date_format($noConforme->Semana, 'W') ?></td>
        <td><?php $noConforme->Categoria ?></td>
        <td><?php $noConforme->Item ?></td>
        <td><?php $noConforme->Marca ?></td>
        <td><?php $noConforme->Referencia ?></td>
        <td><?php $noConforme->Familia ?></td>
        <td><?php $noConforme->Observaciones ?></td>
        <td><?php $noConforme->Responsable ?></td>
        <td><?php $noConforme->Usuario ?></td>
        <?php if ($user->Categoria == "1"){ ?>
            <td><a href="bd-eliminar.php?cod=<?php echo $row["Referencia"];?>&a=<?php echo $row["Observaciones"];?>&b=<?php echo $row["Item"]?>">eliminar</a></td>
        <?php } ?>
    </tr>           
    <?php } ?>
</table>