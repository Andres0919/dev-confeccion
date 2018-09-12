<?php 
    if(isset($_GET['planta'])){
        $hilos = HilosData::getByPlant($_GET['planta']);
    }else{
        $hilos = HilosData::getAll();
    }
    
?>

<p>PROBLEMATICA HILOS <?php echo (isset($_GET['planta']))? $_GET['planta'] : ''; ?></p>
<h1 class="h1"></h1>

<div style="float:left">
<a href="./index.php?view=hilos-set"><img src="assets/img/atras.png" alt="descargar" width="55" height="55" title="atrás"></a>
<a href="excel.php"><img src="assets/img/download2.png" alt="descargar" width="55" height="55" title="Descargar"></a>
<button style="width:100px; background:#9999ff" name="manizales" onclick="window.location = './index.php?view=hilos-listado&planta=Manizales'">Manizales</button>
<button style="width:100px; background:#9999ff" name="pereira" onclick="window.location = './index.php?view=hilos-listado&planta=Pereira'" >Pereira</button>
<button style="width:100px; background:#9999ff" name="sabaneta" onclick="window.location = './index.php?view=hilos-listado&planta=Sabaneta'">Sabaneta</button>

<!--<p id="ejemplo"></p>-->
<br><br>
</div>
<table border=2 align=center>
    <tr>
        <th>Fecha</th>
        <th>Planta</th>
        <th> Set</th>
        <th>Pinta</th>
        <th>Insumo</th>
        <th>Calibre</th>
        <th>Referencia H/N</th>
        <th>Consumo Ficha</th>
        <th>Consumo Real</th>
        <th>Diferencia (metros)</th>
        <th>Porcentaje (%)</th>
        <th>Act Desarrollo</th>
        <th>Act Ficha</th>
        <th style=' width:4%'>Actualizar Desarrollo?</th>
        <th style=' width:4%'>Actualizar Ficha?</th>
        <th>Usuario Des</th>
        <th>Fecha Act Desarrollo</th>
        <th>Usuario Fic</th>
        <th>Fecha Act Ficha</th>
    </tr>

    <?php foreach($hilos as $hilo){ ?>
    <tr>
        <?php if ($hilo->Planta == 'Sabaneta') { 
                    $bgcolor = "#91f0b5";
                }elseif($hilo->Planta=='Manizales'){
                    $bgcolor = "#a9c7b4" ;
                }elseif ($hilo->Planta == 'Pererira') {
                    $bgcolor = "#a9c7b4";
                }else{
                    $bgcolor = "yellow";
                } 
        ?>
            
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo date_format($hilo->Fecha, 'd-m-Y')  ?></td>             
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Planta ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Set1 ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Pinta ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Insumos ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Calibre ?></td>            
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->Referencia ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo round($hilo->ConsumoFicha,'2') ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo round($hilo->ConsumoReal,'2') ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo round($hilo->Diferencia,'2') ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo round($hilo->Porcentaje,'2') ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->actDes ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><?php echo $hilo->actFic ?></td>
        <td style="background-color:<?php echo $bgcolor ?>"><a href="bd-modificar1.php?b=<?php echo $hilo->Referencia ;?>&a=<?php echo $hilo->Calibre ;?>&c=<?php echo $hilo->Pinta ?>"  OnClick="if (! confirm('seguro desea actualizar?')) return false;">actualizar</a></td>
        <td style="background-color:<?php echo $bgcolor ?>"><a href="bd-modificar2.php?b=<?php echo $hilo->Referencia ;?>&a=<?php echo $hilo->Calibre ;?>&c=<?php echo $hilo->Pinta ?>"  OnClick="if (! confirm('seguro desea actualizar?')) return false;">actualizar</a></td>
        <td style="background-color:<?php echo $bgcolor ?>; color:red"><?php echo $hilo->Usuario_Des ?></td>
        <td style="background-color:<?php echo $bgcolor ?>; color:red"><?php echo (isset($hilo->FechaAct))? date_format($hilo->FechaAct , 'd/m/Y H:i:s') : '-' ?></td>
        <td style="background-color:<?php echo $bgcolor ?>; color:blue"><?php echo $hilo->usuario_Fic ?></td>
        <td style="background-color:<?php echo $bgcolor ?>; color:blue"><?php echo (isset($hilo->FechaAct_Ficha))? date_format($hilo->FechaAct_Ficha , 'd/m/Y H:i:s') : '-' ?></td>
    </tr>           
    <?php } ?>
</table>