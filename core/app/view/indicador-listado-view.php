<?php 
    $user = Core::$user;
    $indicadores = IndicadorData::getAll();
    $coleccionesini = ColeccionData::getAllini();
    $referencias = ReferenciaData::getAll();
    $colecciones = ColeccionData::getAll();
    $treferencias = ReferenciaData::getAllTypes();
    $tcoleccion = ColeccionData::getAllTypes();
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>INDICADOR </h4>
        </div>
        <main>
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">LISTADO</label>
            <?php if($user->id === 7 || $user->id ===1){ ?>
            <input id="tab2" type="radio" name="tabs">
            <label for="tab2">COLECCIONES INICIADAS</label>
            <input id="tab3" type="radio" name="tabs">
			<label for="tab3">INICIAR COLECCIÓN</label>
            <input id="tab4" type="radio" name="tabs">
            <label for="tab4">AGREGAR REFERENCIA-COLECCIÓN</label>
            <?php } ?>
            <section id="content1">
                <div class="JStableOuter Scrollp">
                    <?php if (count($indicadores)>0) { ?>                    
					<table>
						<thead>
							<tr>
                                <th>TIPO COLECCIÓN</th>
								<th>COLECCIÓN</th>
								<th>REFERENCIA</th>
								<th>FECHA ENTREGA</th>
							</tr>
						</thead>
						<tbody class="table-hover">
                            <?php foreach ($indicadores as $indicador) {	?>
							<tr onclick="window.location='./index.php?view=indicador-RefCol&id=<?php echo $indicador->id ?>';">
                                <td><?php echo $indicador->tcoleccion ?></td>
								<td><?php echo $indicador->coleccion?></td>
								<td><?php echo $indicador->referencia?></td>
								<td><?php echo $indicador->entrega->format('d-m-Y') ?></td>
							</tr>                            
                            <?php } ?>
						</tbody>
                    </table>
                    <?php }else{ ?>
                            <div class="alert alert-danger nh">No hay listado</div>
                    <?php } ?>
				</div>
            </section>
            <section id="content2">
                <div class="JStableOuter Scrollp">
                    <?php if (count($coleccionesini)>0) { ?>                    
					<table>
						<thead>
							<tr>
                                <th>TIPO COLECCIÓN</th>
                                <th>COLECCIÓN</th>
								<th>FECHA ENTREGA</th>
							</tr>
						</thead>
						<tbody class="table-hover">
                            <?php foreach ($coleccionesini as $coleccion) {	?>
							<tr data-toggle="modal" data-target="#addRef" onclick="addId(<?php echo $coleccion->id ?>)">
								<td><?php echo $coleccion->tcoleccion ?></td>
								<td><?php echo $coleccion->coleccion ?></td>
								<td><?php echo $coleccion->entrega->format('d-m-Y') ?></td>
							</tr>                            
                            <?php } ?>
						</tbody>
                    </table>
                    <?php }else{ ?>
                            <div class="alert alert-danger nh">No hay listado</div>
                    <?php } ?>
				</div>
            </section>
            <section id="content3">
                <div class="contentform">
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=indicador-addindicador">
                        <div>
                            <p>TIPO COLECCIÓN</p>
                            <select id="tcoleccion" name="tcoleccion">
                                <?php foreach($tcoleccion as $t){ ?>
                                    <option value="<?php echo $t->id;?>" ><?php echo $t->nombre;?> </option>
                                <?php } ?>                                                                      
                            </select>
                        </div> 
                        <div>
                            <p>COLECCIÓN </p>
                            <input type="text"  list="coleccion" autocomplete="off"  name="coleccion">
                            <datalist id="coleccion" name="coleccion">
                                <option></option>
                                <?php foreach($colecciones as $coleccion){ ?>
                                    <option value="<?php echo $coleccion->nombre;?>" ><?php echo $coleccion->id;?> </option>
                                <?php } ?>                                                                      
                            </datalist>
                        </div>
                        <div>
                            <p>FECHA ENTREGA</p>
                            <input type="date" name="entrega">
                        </div>
                        <div class="btnSucc">                              
                            <button type="submit" name="consulta" class="btn btn-success col-md-8" >INICIAR COLECCIÓN</button>  
                        </div>
                    </form> 
                </div> 
            </section>
            <section id="content4">
                <div class="optSave">
                    <span>AGREGAR: </span>
                    <select name="opList" id="opList" onchange="option(this);">
                        <option value="col">COLECCIÓN</option>
                        <option value="ref">REFERENCIA</option>
                    </select>
                </div>
                <div>
                    <form action="./index.php?action=indicador-addColeccion" id="col" method="POST">
                        <div>    
                            <p>NOMBRE</p>
                            <input name="nombre" type="text" autocomplete="off">
                        </div>
                        <div class="btnSucc">                              
                            <button type="submit" name="consulta" class="btn btn-success col-md-8" >GUARDAR COLECCIÓN</button>  
                        </div>
                    </form>
                    <form action="./index.php?action=indicador-addReferencia" id="ref" method="POST" hidden>
                        <div>    
                            <p>TIPO</p>
                            <select name="treferencia" id="treferencia">
                                <option value=""></option>
                                <?php foreach ($treferencias as $t ) { ?>
                                    <option value="<?php echo $t->id ?>"><?php echo $t->nombre ?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                        <div>    
                            <p>NOMBRE</p>
                            <input name="nombre" type="text" autocomplete="off">
                        </div>
                        <div class="btnSucc">                              
                            <button type="submit" name="consulta" class="btn btn-success col-md-8" >GUARDAR REFERENCIA</button>  
                        </div>
                    </form>
                </div>
            </section>
        </main>
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
        <div class="modal-body">
            <span>NOMBRE:</span>
            <input type="text"  list="referencia" autocomplete="off"  name="referencia">
            <datalist id="referencia" >
                <option></option>
                <?php foreach($referencias as $referencia){ ?>
                    <option value="<?php echo $referencia->nombre;?>" ></option>
                <?php } ?>                                                                      
            </datalist>
            <input type="hidden" name="id" id="id">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">GUARDAR</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    function option(e){
        let fcol = document.querySelector('#col');
        let fref = document.querySelector('#ref');
        switch (e.value) {
            case 'ref':
                fref.style.display = 'block';
                fcol.style.display = 'none';
                break;
        
            default:
                fref.style.display = 'none';
                fcol.style.display = 'block';
                break;
        }
    }

    function addId(id){
        let idInput = document.querySelector('#id');
        idInput.value = id;
    }
</script>