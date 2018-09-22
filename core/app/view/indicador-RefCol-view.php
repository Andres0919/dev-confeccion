<?php
    $id = $_GET['id'];
    $res = ColeccionData::getRefCol($id);
    $fechas = IndicadorData::getAllRefOpc($id);
    $actividades = IndicadorData::getAllActividades();
    $mfs= IndicadorData::getAllMF($res->referencia_id);
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
            <h4>REFERENCIA - COLECCIÓN</h4>
        </div>
        <div>
            <div class="btns-left">
                <a href="./index.php?view=indicador-listado" class="btn btn-primary">ATRAS</a>
            </div>
            <?php if(!$res->codigo){ ?>
            <div class="btns-right">
                <a data-toggle="modal" data-target="#addCode" class="btn btn-success">AGREGAR CÓDIGO REFERENCIA</a>
            </div>
            <?php } ?>
            <table>
                <tr>
                    <td>REFERENCIA: </td>
                    <td><?php echo $res->referencia ?></td>
                </tr>
                <tr>
                    <td>TIPO REFERENCIA: </td>
                    <td><?php echo $res->treferencia ?></td>
                </tr>
                <tr>
                    <td>COLECCIÓN: </td>
                    <td> <?php echo $res->coleccion ?></td>
                </tr>
                <tr>
                    <td>TIPO COLECCIÓN: </td>
                    <td> <?php echo $res->tcoleccion ?></td>
                </tr>
                <tr>
                    <td>FECHA ENTREGA: </td>
                    <td> <?php echo $res->entrega->format('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td>ANALISTA COTIZACIÓN: </td>
                    <td> <?php echo $res->analista ?></td>
                </tr>
                <?php if($res->codigo){ ?>
                <tr>
                    <td>CÓDIGO: </td>
                    <td><?php echo $res->codigo ?></td>
                </tr>
                <?php } ?> 
                <?php if($mfs){ ?>
                    <tr>
                        <td colspan="2"><strong>MUESTRA FÍSICA</strong></td>
                    </tr>
                    <?php foreach ($mfs as $mf) { ?>
                    <tr>
                        <td><?php echo $mf->actividad ?>: </td>
                        <td><?php echo ($mf->mf)? 'SI' : 'NO' ?></td>
                    </tr>
                <?php   }
                      } ?>  

            </table>
            <form action="./index.php?action=indicador-addFechaRef" method="POST" class="addForm">
                <span>ACTIVIDAD:</span>
                <select name="actividad" id="actividad" onchange="showMF(this)" required>
                    <?php foreach ($actividades as $actividad) { ?>
                        <option value="<?php echo $actividad->id ?>"><?php echo $actividad->nombre ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="analista_ficha" placeholder="analista ficha">
                <div id="mf" hidden>
                    <span>MF: </span>
                    <span>SI</span>
                    <input type="radio" value="1" name="mf">
                    <span>NO</span>
                    <input type="radio" value="0" name="mf">
                </div>                
                <span>FECHA INICIO:</span>
                <input type="date" name="fecha_inicio" required>
                <span>FECHA FIN:</span>
                <input type="date" name="fecha_fin" >
                <input type="hidden" name="id" value="<?php echo $id ?>" >
                <input type="submit" class="btn btn-success" value="AGREGAR">
            </form>
            <table>
                <thead>
                    <th>ACTIVIDAD</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                    <th>ANALISTA FICHA</th>
                    <th>ANALISTA COTIZACIÓN</th>
                    <th></th>
                </thead>
                <?php foreach ($fechas as $fecha) { ?>
                    <tr>
                        <td><?php echo $fecha->actividad ?></td>
                        <td><?php echo $fecha->fecha_inicio->format('d-m-Y') ?></td>
                        <td><?php echo ($fecha->fecha_fin->format('d-m-Y') != '01-01-1900')? $fecha->fecha_fin->format('d-m-Y') : '-' ?></td>
                        <td><?php echo $fecha->analista_ficha ?></td>
                        <td><?php echo $fecha->analista ?></td>
                        <td><a class="btn-xs btn-warning" data-toggle="modal" data-target="#editAct" onclick="editAct(<?php echo $fecha->id ?>)"><i class="fa fa-pencil"></i></a></td>
                    </tr>    
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="editAct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR ACTIVIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./index.php?action=indicador-editAct" method="POST">
        <div class="modal-body">
            <span>ACTIVIDAD:</span>
            <select name="actividad" id="actividadModal" required>
                <?php foreach ($actividades as $actividad) { ?>
                    <option value="<?php echo $actividad->id ?>"><?php echo $actividad->nombre ?></option>
                <?php } ?>
            </select><br/>
            <span>FECHA INICIO:</span>
            <input type="date" name="fecha_inicio" id="inicioModal" required>
            <span>FECHA FIN:</span>
            <input type="date" name="fecha_fin" id="finModal" >
            <input type="hidden" name="id" id="idModal" >
            <input type="hidden" name="idref" id="idRef" >
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="addCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR ACTIVIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./index.php?action=indicador-addCode" method="POST">
        <div class="modal-body">
            <span>CÓDIGO:</span>
            <input type="text" name="codigo" required autocomplete="off">
            <input type="hidden" id="idcode" name="id" value="<?php echo $res->id ?>">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    function editAct(id) {
        let actividad = document.querySelector('#actividadModal');
        let fecha_inicio = document.querySelector('#inicioModal');
        let fecha_fin = document.querySelector('#finModal');
        let idModal = document.querySelector('#idModal');
        let idRef = document.querySelector('#idRef');
        params = {
            "id": id
        }

        $.ajax({
            data: params,
            url: './index.php?action=indicador-getAct',
            dataType: 'json',
            type: 'GET',
            success: function(res){
                console.log(res);
                actividad.value = res.actividades_id;
                fecha_inicio.value = res.fecha_inicio.date.substring(0,10).toString();
                fecha_fin.value = (res.fecha_fin.date.substring(0,10).toString() === '1900-01-01')? '' : res.fecha_fin.date.substring(0,10).toString();
                idModal.value = id;
                idRef.value = res.refColeccion_id;
            }
        })
    }

    function showMF(e){
        let mf = document.querySelector('#mf');
        switch (e.value) {
            case '2':
            case '7':
                mf.style.display = 'block'
                break;
        
            default:
                mf.style.display = 'none'
                break;
        }
    }
</script>