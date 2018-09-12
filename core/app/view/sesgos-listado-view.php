<?php 
    $user = Core::$user;
    $sesgos = SesgosData::getAll();
?>
<p class="text-center">INSUMOS: SESGOS Y ELÁSTICOS</p>
<h1 class="h1"></h1>
<div style="float:left">
    <a href="./index.php?view=sesgos-form"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
    <a href="excel.php"><img src="assets/img/download2.png" alt="descargar" width="55" height="55" title="Descargar"></a>        
    <br><br>
</div>
<table border=2 align=center>       
    <tr>
        <th colspan="3"><th colspan='2'>Pinta</th><th colspan='2'>Referencia</th> <th colspan="10">  
    </tr>
    <tr>
        <th>Fecha</th>
        <th>Planta</th>
        <th>Insumo</th>        
        <th>Nombre</th>
        <th>Cod</th>        
        <th>Color</th>
        <th>Cod</th>
        <th>Recipiente</th>
        <th>Talla</th>
        <th>Sku</th>
        <th>Unidades Bongo</th>
        <th>Unidades Faltantes</th>
        <th>Cantidad Requerida (Metros)</th>
        <th>Problematica</th>
        <th>Nombre</th>
        <th>Hora</th>
        <?php if ($user->Categoria == "1"){ ?>            
            <th>Eliminar</th>
        <?php } ?>              
    </tr>
    <?php foreach($sesgos as $sesgo){ ?>
        <?php if($sesgo->Planta =='Sabaneta'){
                $bgColor = "#91f0b5";
              }elseif ($sesgo->Planta =='Manizales') {
                    $bgColor = "#a9c7b4";
              }else{
                    $bgColor = "#eafcf1";
              } 
        ?>
    <tr>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo date_format($sesgo->Fecha, 'd-m-Y') ?></td>             
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Planta ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Insumo ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Nombre_Ref ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Cod_Ref ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Nombre_Pinta ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Cod_Pinta ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Recipiente ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Talla ?></td>            
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Sku ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Und_Bongo ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Faltantes ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Cantidad ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Problematica  ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Nombre_Responsable ?></td>
        <td style="background-color:<?php echo $bgColor ?>"><?php echo $sesgo->Hora ?></td>
        <?php if ($user->Categoria  == "1"){ ?> 
            <td style="background-color:<?php echo $bgColor ?>"><a href="eliminar.php?b=<?php echo $sesgo->Hora;?>&a=<?php echo date_format($sesgo->Fecha, 'd-m-Y');?>">eliminar</a></td>
        <?php } ?>                           
    </tr>
        <?php } ?>          
</table>