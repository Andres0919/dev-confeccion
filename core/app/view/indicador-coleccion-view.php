<?php
    $id = $_GET['id'];
    $res = ColeccionData::getById($id);
    $referencias = IndicadorData::getRefsByColeccion($id);
    $references = ReferenciaData::getAll();
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
            <h4>COLECCIÓN</h4>
        </div>
        <div>
            <div class="btns-left">
                <a href="./index.php?view=indicador-listado" class="btn btn-primary">ATRAS</a>
            </div>
            <div class="btns-right">
                <a data-toggle="modal" data-target="#addRef" class="btn btn-success" >AGREGAR REFERENCIA</a>
            </div>
            <table class="tableC">
                <tr>
                    <td><?php echo $res->tcoleccion ?></td>
                </tr>
                <tr>
                    <td><?php echo $res->coleccion ?></td>                    
                </tr>
            </table>
            <!-- <form action="./index.php?action=indicador-addFechaRef" method="POST" class="addForm">
                <span>ACTIVIDAD:</span>
                <select name="actividad" id="actividad" onchange="showMF(this)" required>
                    <?php foreach ($actividades as $actividad) { ?>
                        <option value="<?php echo $actividad->id ?>"><?php echo $actividad->nombre ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="analista_ficha" placeholder="analista ficha" required>
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
            </form>-->
            <table class="table tableR table-bordered table-hover">
                <thead>
                    <td>REFERENCIAS</td>
                </thead>
                <?php foreach ($referencias as $referencia) { ?>
                    <tr onclick="window.location='./index.php?view=indicador-RefCol&id=<?php echo $referencia->id ?>'">
                        <td><?php echo $referencia->referencia ?></td>
                    </tr>    
                <?php } ?>
            </table> 
        </div>
    </div>
</div>
<div class="modal fade" id="addRef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR REFERENCIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./index.php?action=indicador-addRefInCol" method="POST">
        <div class="modal-body" id="addSel">
            <span>NOMBRE:<a class="plus" onclick="addSelect()"> +</a></span>
            <input type="text"  list="referencia" autocomplete="off"  name="referencia[]">
            <datalist id="referencia" >
                <option></option>
                <?php foreach($references as $reference){ ?>
                    <option value="<?php echo $reference->nombre;?>" ></option>
                <?php } ?>                                                                      
            </datalist>
            <input type="hidden" name="id" id="id" value="<?php echo $res->id ?>">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    function addSelect(){
        console.log('holi');
        let addSel = document.querySelector('#addSel');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'referencia[]';
        input.setAttribute('list','referencia');
        input.autocomplete = 'off';
        addSel.appendChild(input);
    }
</script>