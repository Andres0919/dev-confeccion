<?php
	$user = Core::$user;
	$plants = PlantData::getAll();
	$cantRequestsp=-1;
	$cantRequestsa=-1;
	if ($user->Categoria == 1 || $user->Nombre == 'consulta') {
		$pendientes = RequestData::getAllPendings();
		$asignados = RequestData::getAllAsigned();
		$terminados = RequestData::getAllFinished();
	}else{
		$pendientes = RequestData::getAllPendingsPlant($user->planta_id);
		$asignados = RequestData::getAsignedUser($user->id);
		$terminados = RequestData::getAllFinishedUser($user->id);
	}
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>SOLICITUDES MARCE </h4>
		</div>
		<main>
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">PENDIENTES</label>
			<input id="tab2" type="radio" name="tabs">
			<label for="tab2">ASIGNADOS</label>
			<input id="tab3" type="radio" name="tabs">
			<label for="tab3">TERMINADOS</label>
			<?php if ($user->Categoria == 1) { //BOTON NUEVA SOLICITUD SI ES ADMINISTRADOR?>
				<div class="btns-right">
					<a data-toggle="modal" data-target="#exampleModalLong" onclick="newReq();" class="btn btn-success">NUEVA SOLICITUD</a>
				</div>
			<?php } ?>
			<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"  id="modalTitle" ></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>         
						</div>
						<form class="form-horizontal" role="form" method="post" action="./index.php?action=sm-addrequest" enctype="multipart/form-data" id="modalForm">							
						<div class="modal-body">
							<div class="row rowmodal">
								<label for="reason" class="col-md-2 ">MOTIVO</label>
								<div class="col-md-4">
									<select name="reason" id="reason" onchange="divChange(this)" required>
										<option value="">-- SELECCIONE --</option>
										<option value="Montar Canaleta">Montar Canaleta</option>
										<option value="Desmontar Canaleta">Desmontar Canaleta</option>
										<option value="Reportar Problema">Reportar Problema</option>
									</select>
								</div>
							</div>
							<div id="op1" class="row rowmodal">
								<div id="aux" class="col-md-1"></div>
								<label id="nove1" class="col-lg-2 ">NOVEDAD</label>
								<div class="col-md-3" id="nove">
								<select name="nove" id="nov">
									<option value="">-- SELECCIONE --</option>
									<option value="Terminal no enciende">Terminal no enciende</option>
									<option value="Terminal modo escritorio">Terminal modo escritorio</option>
									<option value="Terminal No cuenta">Terminal No cuenta</option>
									<option value="Terminal No corre tiempo">Terminal No corre tiempo</option>
								</select>
								</div>
								<label id="canal1" class="col-lg-1">CANALETA</label>
								<div class="col-md-2" id="canal">
								<select name="canal" id="cana" class="sel">
									<option value=""> -- </option>
									<?php for ($i=1; $i <= 66; $i++) { ?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
								</div>
								<label id="term1" class="col-lg-1">TERMINAL</label>
								<div class="col-md-2" id="term">
								<select name="term" id="ter" class="sel">
									<option value=""> -- </option>
									<?php for ($i=1; $i <= 18; $i++) { ?>
									<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
								</div>
								<div id="file">
									<label>Agregar Plano canaleta</label>
									<input type="file" name="fileM" id="fileM">
								</div>
								<a id="downloadFile" class="btn btn-info" download hidden >DESCARGAR PLANO</a>								
							</div>
							<div class="desc row">
								<textarea name="description" id="desc" placeholder="Descripción...(opcional)"></textarea>
							</div>
								<input type="hidden" name="created_id" value="<?php echo $user->id ?>">
								<input type="hidden" name="id" id="idInput">
							<div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" id="btnMondal" class="btn btn-success" value="CREAR SOLICITUD">
						</div>
						</form>						
					</div>
				</div>
			</div>
			<section id="content1"> <!-- PENDIENTES -->
				<span>PLANTA: </span>
				<select name="" id="searchPlanta" onchange="doSearch()">
					<option value="">Todas</option>
					<?php foreach ($plants as $plant ) { ?>
						<option value="<?php echo $plant->name ?>"><?php echo $plant->name ?></option>
					<?php } ?>
				</select>
				<div class="JStableOuter Scrollp">
					<table id="solicitudes">
						<thead>
							<tr>
								<th>PLANTA</th>
								<th>MOTIVO</th>
								<th>NOVEDAD</th>
								<th>CANALETA</th>
								<th>TERMINAL</th>
								<th>CREADO POR </th>
								<th>FECHA CREACIÓN</th>
								<th>TIEMPO</th>
								<th>ACCIÓN</th>
							</tr>
						</thead>
						<tbody class="table-hover">
							<?php if (count($pendientes)>0) { ?>
							<?php $num = 0;?>
							<?php foreach ($pendientes as $pendiente) {	?>
							<?php
							$cantRequestsp++;
							$created = $pendiente->getCreated(); 
							$plant = $pendiente->getPlant();
							$fecha = new DateTime(date('Y-m-d H:i:s'));//current date
							$intervalo = $pendiente->created_at->diff($fecha);
							$dias = $intervalo->d;
							$horas = $intervalo->h;
							$minutos = $intervalo->i;
							$segundos = $intervalo->s;
							?>	
							<tr>
								<td><?php echo $plant->name?></td>
								<td><?php echo $pendiente->reason?></td>
								<td><?php echo ($pendiente->nove == '')? '-' : $pendiente->nove ?></td>
								<td><?php echo $pendiente->canal?></td>
								<td><?php echo ($pendiente->term == 0)? '-' : $pendiente->term?></td>
								<td><?php echo $created->Nombre ?></td>
								<td><?php echo date_format($pendiente->created_at, 'd/m/Y H:i:s') ?></td>
								<td>
									<?php if($dias > 0 ){?><span id="Diasp<?php echo $cantRequestsp ?>"><?php echo $dias ?></span>dias<?php } ?>
									<span id="Horasp<?php echo $cantRequestsp ?>"><?php echo $horas ?></span>
									<span id="Minutosp<?php echo $cantRequestsp ?>">:<?php echo ($minutos < 10)? '0'.$minutos :$minutos ?></span>
									<span id="Segundosp<?php echo $cantRequestsp ?>">:<?php echo ($segundos < 10)? '0'.$segundos :$segundos ?></span>
								</td>
								<td class="td-actions <?php echo ($user->Categoria == 2) ? 'td-requests':''?>">
								<a title="Ver" onclick="showRequest(<?php echo $pendiente->id ?>)" data-toggle="modal" data-target="#exampleModalLong" class="btn-info btn-xs"><i class='fa fa-eye'></i></a>
										<?php if ($user->Categoria == 2 && $user->Nombre != 'consulta') {?>
										<a title="Asignarme" href="index.php?action=sm-addasignacion&id=<?php echo $pendiente->id;?>&user_id=<?php echo $user->id; ?>" class="btn btn-simple btn-warning btn-xs"><i class='fa fa fa-check'></i></a>
										<?php }else if($user->Categoria == 1){ ?>
										<a title="Editar" data-toggle="modal" data-target="#exampleModalLong" onclick="formEdit(<?php echo $pendiente->id ?>);" class="btn-warning btn-xs"><i class='fa fa-pencil-square-o'></i></a>
										<!-- <a href="index.php?action=delrequest&id=<?php //echo $request->id;?>"  class="btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a> -->
										<?php } ?>
								</td>
								<?php } ?>
								<?php }else{ ?>
									<td colspan="9" style="background-color:#f55a4e;color:white;">No hay Solicitudes Pendientes</td>
								<?php } ?>
								<span id="tp" hidden><?php echo $cantRequestsp ?></span>					
							</tr>
						</tbody>
					</table>
				</div>
			</section>
			<section id="content2"><!-- ASIGNADOS -->
				<div class="JStableOuter">
					<table >
						<thead>
							<tr>
								<?php if($user->Categoria == 1){ ?><th>PLANTA</th><?php } ?>
								<th>MOTIVO</th>
								<th>CANALETA</th>
								<th>CREADO POR</th>
								<?php if($user->Categoria == 1){ ?><th>ASIGNADO A</th><?php } ?>
								<th>FECHA CREACIÓN</th>
								<th>FECHA ASIGNACIÓN</th>
								<th>TIEMPO</th>
								<th>ACCIÓN</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($asignados)>0) { ?>
							<?php $num = 0; ?>
							<?php foreach ($asignados as $asignado) {
								$cantRequestsa++;
								$created = $asignado->getCreated();	
								$asigned = $asignado->getAsigned();								
								$plant = $asignado->getPlant();
								$fecha = new DateTime(date('Y-m-d H:i:s'));//current date
								$intervalo = $asignado->asigned_at->diff($fecha);
								$dias = $intervalo->d;
								$horas = $intervalo->h;
								$minutos = $intervalo->i;
								$segundos = $intervalo->s;
							?>
							<tr>
								<?php if($user->Categoria == 1){ ?><td><?php echo $plant->name; ?></td><?php } ?>
								<td><?php echo $asignado->reason; ?></td>
								<td><?php echo $asignado->canal ?></td>
								<td><?php echo $created->Nombre; ?></td>
								<?php if($user->Categoria == 1){ ?><td><?php echo $asigned->Nombre; ?></td><?php } ?>
								<td><?php echo date_format($asignado->created_at, 'd/m/Y H:i:s'); ?></td>
								<td><?php echo date_format($asignado->asigned_at, 'd/m/Y H:i:s'); ?></td>
								<td>
									<?php if($dias > 0 ){?><span id="Diasa<?php echo $cantRequestsa ?>"><?php echo $dias ?></span>dias<?php } ?>
									<span id="Horasa<?php echo $cantRequestsa ?>"><?php echo $horas ?></span>
									<span id="Minutosa<?php echo $cantRequestsa ?>">:<?php echo ($minutos < 10)? '0'.$minutos :$minutos ?></span>
									<span id="Segundosa<?php echo $cantRequestsa ?>">:<?php echo ($segundos < 10)? '0'.$segundos :$segundos ?></span>
								</td>
								<td>
								<a title="Ver" rel="tooltip" onclick="showRequest(<?php echo $asignado->id ?>)" data-toggle="modal" data-target="#exampleModalLong" class="btn btn-warning btn-xs"><i class='fa fa-eye'></i></a>	
								<?php if($user->Categoria == 1){ ?>
									<!-- <a href="index.php?action=delrequest&id=<?php echo $asignado->id;?>"  class="btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a> -->
								<?php }else if($user->Categoria == 2 && $user->Nombre != 'consulta') { ?>
										<a title="Comentar" rel="tooltip" class="btn btn-simple btn-primary btn-xs" data-toggle="collapse" href="<?php echo '#'.$asignado->id; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-bookmark"></i></a>
										<a title="Terminar" rel="tooltip" href="index.php?action=sm-checkrequest&id=<?php echo $asignado->id;?>" class="btn btn-simple btn-success btn-xs"><i class='fa fa-check'></i></a>
								<?php } ?>
								</td>
							</tr>
							<tr class="collapse" id="<?php echo $asignado->id; ?>">
								<td colspan="7" style="padding:0;" >	 
									<form class="form-group" method="POST" action="index.php?action=sm-addcomment&id=<?php echo $asignado->id;?>">
										<textarea class="form-control col-md-12" id="comentario" name="comentario"  placeholder="Comentario..." ></textarea>
										<input type="submit" class="btn btn-primary btn-xs" value="Enviar">
									</form>
								</td>
							</tr>
								<?php } ?>
							<?php }else{ ?>
								<td colspan="9" style="background-color:#f55a4e;color:white;">No hay Solicitudes Asignadas</td>
							<?php } ?>
							<span id="ta" hidden><?php echo $cantRequestsa ?></span>
							</tr>

						</tbody>
					</table>
				</div>
			</section>
			<section id="content3"><!-- TERMINADOS -->
				<div class="JStableOuter">
					<table>
						<thead>
							<tr>
								<?php if($user->Categoria == 1){ ?><th>PLANTA</th><?php } ?>
								<th>MOTIVO</th>
								<th>CANALETA</th>
								<th>CREADO POR</th>
								<?php if($user->Categoria == 1){ ?><th>FINALIZADO POR</th><?php } ?>
								<th>FECHA CREACIÓN</th>
								<th>FECHA ASIGNACIÓN</th>
								<th>FECHA FINALIZACIÓN</th>
								<th>ACCIÓN</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($terminados)>0) { ?>
							<?php $num = 0; ?>
							<?php foreach ($terminados as $terminado) {	
								$created  = $terminado->getCreated();
										$asigned = $terminado->getAsigned();
										$plant = $terminado->getPlant();
							?>
									<tr>
										<?php if($user->Categoria == 1){ ?><td><?php echo $plant->name; ?></td><?php } ?>
										<td><?php echo $terminado->reason; ?></td>
										<td><?php echo $terminado->canal; ?></td>
										<td><?php echo $created->Nombre; ?></td>
										<?php if($user->Categoria == 1){ ?><td><?php echo $asigned->Nombre; ?></td><?php } ?>
										<td><?php echo date_format($terminado->created_at, 'd/m/Y H:i:s'); ?></td>
										<td><?php echo date_format($terminado->asigned_at, 'd/m/Y H:i:s'); ?></td>
										<td><?php echo date_format($terminado->finished_at, 'd/m/Y H:i:s'); ?></td>
										<td style="width:80px;" >
											<button title="Ver" onclick="showRequest(<?php echo $terminado->id ?>)" data-toggle="modal" data-target="#exampleModalLong" rel="tooltip"  class="btn btn-warning btn-xs"><i class='fa fa-eye'></i></button>
										</td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<td colspan="9" style="background-color:#f55a4e;color:white;">No hay Solicitudes Terminadas</td>
							<?php } ?>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</main>
	</div>
</div>
<script>
$(document).ready(function() {
	$('.Scrollp table').scroll(function(e) { 
		$('.Scrollp thead').css("left", -$(".Scrollp tbody").scrollLeft()); 
		$('.Scrollp thead th:nth-child(1)').css("left", $(".Scrollp table").scrollLeft() -0 ); 
		$('.Scrollp tbody td:nth-child(1)').css("left", $(".Scrollp table").scrollLeft()); 

		$('.Scrollp thead').css("top", -$(".Scrollp tbody").scrollTop());
		$('.Scrollp thead tr th').css("top", $(".Scrollp table").scrollTop()); 

	});
});
function divChange(sel) {
	div1 = document.getElementById("op1");
	aux = document.getElementById("aux");
	cana = document.getElementById("cana");
	ter = document.getElementById("ter");
	nov = document.getElementById("nov");
	canal = document.getElementById("canal");
	canal1 = document.getElementById("canal1");
	term = document.getElementById("term");
	term1 = document.getElementById("term1");
	nove = document.getElementById("nove");
	nove1 = document.getElementById("nove1");
	file = document.getElementById('file');
	fileM = document.getElementById('fileM');
	fileM = document.getElementById('fileM').style.display = "";
	downloadFile = document.querySelector("#downloadFile").style.display = "none";
	switch (sel.value) {
	case "Montar Canaleta":
		div1.style.display = "";
		aux.style.display = "";
		canal.style.display="";
		cana.required = "true";
		canal1.style.display="";
		term.style.display="none";
		ter.required = "";
		term1.style.display="none";
		nove.style.display="none";
		nov.required = "";
		nove1.style.display="none";
		file.style.display = "";
		fileM.required = "true";
		break;
	case "Desmontar Canaleta":
		div1.style.display = "";
		aux.style.display = "";
		canal.style.display="";
		cana.required = "true";
		canal1.style.display="";
		term.style.display="none";
		ter.required = "";
		term1.style.display="none";
		nove.style.display="none";
		nov.required = "";
		nove1.style.display="none";
		file.style.display = "none";
		fileM.required = "";
		break;
	case "Reportar Problema":
		div1.style.display = "";
		aux.style.display = "none";
		canal.style.display="";
		cana.required = "true";
		canal1.style.display="";
		term.style.display="";
		ter.required = "true";
		term1.style.display="";
		nove.style.display="";
		nov.required = "true";
		nove1.style.display="";
		file.style.display = "none";
		fileM.required = "";
		break;		
	default:
		div1.style.display = "none";
		aux.style.display = "none";        
		canal.style.display="none";
		cana.required = "";
		canal1.style.display="none";
		term.style.display="none";
		ter.required = "";
		term1.style.display="none";
		nove.style.display="none";
		nov.required = "";
		nove1.style.display="none";
		file.style.display = "none";
		fileM.required = "";
		break;
	}
}

function formEdit(id){
	let modalTitle = document.querySelector("#modalTitle");
	let form = document.querySelector("#modalForm");
	let reason = document.querySelector("#reason");
	let nov = document.querySelector("#nov");
	let cana = document.querySelector("#cana");
	let ter = document.querySelector("#ter");
	let desc = document.querySelector("#desc");
	let idInput = document.querySelector("#idInput");
	let btnMondal = document.querySelector("#btnMondal");
	let params = {
		"id": id 
	}
	$.ajax({
			data:  params,
			url:   './index.php?action=sm-getRequest',
			dataType: 'json',
			type:  'get',
			beforeSend: function () {
				//mostramos gif "cargando"
				console.log('CARGANDO...');
			},
			success:  function (res) {
				// console.log(res);
				modalTitle.innerHTML = "EDITAR SOLICITUD";
				form.action = "./index.php?action=sm-updaterequest";
				reason.value = res.reason;
				nov.value = res.nove;
				cana.value = res.canal;
				ter.value = res.term;
				desc.value = res.description;
				desc.placeholder = 'Descripción...(opcional)'
				idInput.value = res.id;
				reason.disabled = false;
				nov.disabled = false;
				cana.disabled = false;
				ter.disabled = false;
				desc.disabled = false;
				idInput.disabled = false;
				btnMondal.type = 'submit';
				btnMondal.value = "ACTUALIZAR SOLICITUD";
				divChange(reason);
			},
			error: function (err) {
				console.log(err);
			}
	});
}

function showRequest(id){
	let modalTitle = document.querySelector("#modalTitle");
	let form = document.querySelector("#modalForm");
	let reason = document.querySelector("#reason");
	let nov = document.querySelector("#nov");
	let cana = document.querySelector("#cana");
	let ter = document.querySelector("#ter");
	let desc = document.querySelector("#desc");
	let idInput = document.querySelector("#idInput");
	let btnMondal = document.querySelector("#btnMondal");
	let fileM = document.querySelector("#fileM");
	let downloadFile = document.querySelector("#downloadFile");
	let file = document.querySelector("#file");
	let params = {
		"id": id 
	}
	$.ajax({
			data:  params,
			url:   './index.php?action=sm-getRequest',
			dataType: 'json',
			type:  'get',
			beforeSend: function () {
				//mostramos gif "cargando"
				console.log('CARGANDO...');
			},
			success:  function (res) {
				console.log(res);
				modalTitle.innerHTML = "SOLICITUD";
				form.action = "./index.php?action=sm-updaterequest";
				reason.value = res.reason;
				nov.value = res.nove;
				cana.value = res.canal;
				ter.value = res.term;
				desc.value = res.description;
				desc.placeholder = ''
				idInput.value = res.id;
				reason.disabled = true;
				nov.disabled = true;
				cana.disabled = true;
				ter.disabled = true;
				desc.disabled = true;
				idInput.disabled = true;
				btnMondal.type = 'hidden';
				divChange(reason);
				fileM.style.display = 'none';
				if (res.reason == 'Montar Canaleta'){ 
					file.style.display = "none";
					downloadFile.href = `./core/app/fileMarce/${res.fileM}`;
					downloadFile.style.display = "";
				};
			},
			error: function (err) {
				console.log(err);
			}
	});
}

function newReq(){
	let modalTitle = document.querySelector("#modalTitle");
	let form = document.querySelector("#modalForm");
	let reason = document.querySelector("#reason");
	let nov = document.querySelector("#nov");
	let cana = document.querySelector("#cana");
	let ter = document.querySelector("#ter");
	let desc = document.querySelector("#desc");
	let btnMondal = document.querySelector("#btnMondal");
	modalTitle.innerHTML = "NUEVA SOLICITUD";
	form.action = "./index.php?action=sm-addrequest";
	reason.value = '';
	nov.value = '';
	cana.value = '';
	ter.value = '';
	desc.value = '';
	desc.placeholder = 'Descripción...(opcional)'
	idInput.value = '';
	reason.disabled = false;
	nov.disabled = false;
	cana.disabled = false;
	ter.disabled = false;
	desc.disabled = false;
	idInput.disabled = false;
	btnMondal.type = 'submit';
	btnMondal.value = "CREAR SOLICITUD";
	divChange(reason);
}

function doSearch(){
	var tableReg = document.getElementById('solicitudes');
	var searchText = document.getElementById('searchPlanta').value;
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