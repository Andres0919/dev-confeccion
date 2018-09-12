<?php 
  $user = Core::$user;
  if (isset($_POST['consulta'])) {
    $Operacion=$_POST['operacion'];
    $Pieza=$_POST['pieza'];
    $Maquina=$_POST['maquina'];     
    if ($Operacion != '' && $Pieza != '' && $Maquina != '') {
        $codigos = CodigosData::getAllOptions($Operacion, $Pieza, $Maquina);    
    } elseif ($Operacion != '') {
        if($Pieza != ''){
            $codigos = CodigosData::getPiezaAndOperacion($Operacion, $Pieza);
        }elseif($Maquina != ''){
            $codigos = CodigosData::getOperacionAndMaquina($Operacion, $Maquina);
        }else{
            $codigos = CodigosData::getOperacion($Operacion);
        }

    } elseif ($Pieza != '') {
        if($Maquina != ''){
            $codigos = CodigosData::getPiezaAndMAquina($Pieza, $Maquina);
        }else{
            $codigos = CodigosData::getPieza($Pieza);
        }
    } elseif ($Maquina != '') {
        $codigos = CodigosData::getMaquina($Maquina);
    }else{
        $codigos = CodigosData::getAllCodigos();
    }
    
  }else{
    $codigos = CodigosData::getAllCodigos();
  }
?>
<div class="secc">
    <div class="card card-list">
        <div class="card-header">
            <h4>LISTADO DE CÓDIGOS</h4>
        </div>
        <div class="btns-left">
            <a href="./index.php?view=codigos-form" class="btn btn-info">VOLVER</a>
            <?php if ($user->Nombre != 'consulta') { ?>
        <!-- <a href="excel.php"><img src="assets/img/download2.png" alt="descargar" width="55" height="55" title="Descargar"></a> -->
            <?php } ?>
        </div>
        <form>
            <input id="searchTerm" placeholder="BUSCAR..." type="text" onkeyup="doSearch()" />
        </form>
        <div class="JStableOuter">
            <table border=2 align=center id=datos>
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>REFERENCIA</th>
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
                        <?php  if ($user->Categoria == "1"){ ?>
                            <th style='width:5%'>
                                ACCIONES
                            </th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php foreach($codigos as $codigo){ ?>
                    <tr>
                        <td style="width:7.5%"><?php echo $codigo->Codigo?></td>
                        <td><?php echo $codigo->Referencia?></td>
                        <td><?php echo $codigo->Operacion?></td>
                        <td><?php echo $codigo->Pieza?></td>
                        <td><?php echo $codigo->Maquina?></td>
                        <td><?php echo $codigo->Trayecto?></td>
                        <td><?php echo $codigo->Condicion_Tela?></td>
                        <td><?php echo $codigo->Geo_Pieza?></td>
                        <td><?php echo $codigo->Corte_Pieza?></td>
                        <td><?php echo $codigo->Insumo?></td>
                        <td><?php echo $codigo->Tipo_Tela?></td>
                        <td><?php echo $codigo->Descripcion?></td>
                        <td style="width:5%"><?php echo $codigo->Usuario?></td>
                        <td style="width:5%"><?php echo date_format($codigo->Fecha, 'd-m-Y')?></td>
                        <?php if ($user->Categoria == "1"){ ?>
                            <td style="width:5%; align:center">
                                <a class="btn btn-xs btn-warning" href="./index.php?view=codigos-form&op=<?php echo $codigo->Operacion; ?>&pi=<?php echo $codigo->Pieza; ?>&ma=<?php echo $codigo->Maquina; ?>&tr=<?php echo $codigo->Trayecto; ?>&te=<?php echo $codigo->Condicion_Tela; ?>&ge=<?php echo $codigo->Geo_Pieza; ?>&cor=<?php echo $codigo->Corte_Pieza; ?>&in=<?php echo $codigo->Insumo; ?>&ti=<?php echo $codigo->Tipo_Tela; ?>&co=<?php echo $codigo->Codigo; ?>&id=<?php echo $codigo->id ?>&rf=<?php echo $codigo->Referencia?>&d=<?php echo $codigo->Descripcion ?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-xs btn-danger" href="./index.php?action=codigos-eliminar&codigo=<?php echo $codigo->Codigo;?>=<?php echo $codigo->Usuario ?>suario=<?php echo $codigo->Usuario;?>&referencia=<?php echo $codigo->Referencia;?> ">X</a>
                            </td>
                        <?php } ?>
                    </tr>           
                <?php } ?>
            </table>
        </div>
    </div>
</div>
        <script>  
        $(document).ready(function() {
        $('.JStableOuter table').scroll(function(e) { 
        
            $('.JStableOuter thead').css("left", -$(".JStableOuter tbody").scrollLeft()); 
            $('.JStableOuter thead th:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft() -0 ); 
            $('.JStableOuter tbody td:nth-child(1)').css("left", $(".JStableOuter table").scrollLeft()); 

            $('.JStableOuter thead').css("top", -$(".JStableOuter tbody").scrollTop());
            $('.JStableOuter thead tr th').css("top", $(".JStableOuter table").scrollTop()); 

        });
        });

            function doSearch(){
                var tableReg = document.getElementById('datos');
                var searchText = document.getElementById('searchTerm').value;
                var cellsOfRow="";
                var found=false;
                var compareWith="";
     
                // Recorremos todas las filas con contenido de la tabla
                for (var i = 1; i < tableReg.rows.length; i++)
                {
                    cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                    found = false;
                    // Recorremos todas las celdas
                    for (var j = 0; j < cellsOfRow.length && !found; j++)
                    {
                        compareWith = cellsOfRow[j].innerHTML;
                        // Buscamos el texto en el contenido de la celda
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                        {
                            found = true;
                        }
                    }
                    if(found)
                    {
                        tableReg.rows[i].style.display = '';
                    } else {
                        // si no ha encontrado ninguna coincidencia, esconde la fila de la tabla
                        tableReg.rows[i].style.display = 'none';
                    }
                }
            }
        
        </script>