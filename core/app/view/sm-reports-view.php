<?php //Declaracion de variable y llamada de metodos
	$plants = PlantData::getAll();
	$priorities = PriorityData::getAll();
	$statuses = StatusData::getAll();
	$kinds = KindData::getAll();
	$table = (isset($_GET["tblname"])) ? $_GET["tblname"] : ''; 
	$ope = (isset($_GET["ope"])) ? $_GET["ope"] : '';
	$select = (isset($_GET['select'])) ? $_GET['select'] : '*';
	$condic = (isset($_GET['condicion'])) ? $_GET['condicion'] : '';
	if($table != "") {
		switch ($ope) {
			case 'cantidad':
					$sql = "select count(".$select.") cantidad";
			break;
			default:
				$sql = "select ".$select;
			break;
		}
		$sql .= " from ".$table;
		if(isset($_GET['where']) && $_GET['where'] != "" && $condic != ""){
			$where = $_GET['where'];
			$sql .= " where ".$where." = \"".$condic."\"";
		}elseif (isset($_GET['where1']) && $_GET['where1'] != "" && $condic != "") {
			$where = $_GET['where1'];
			$sql .= " where ".$where." = \"".$condic."\"";
		}
		var_dump($sql);
		// if($_GET["status_id"]!=""){
		// 	$sql .= " status_id = ".$_GET["status_id"];
		// }
		// if($_GET["kind_id"]!=""){
		// 	if($_GET["status_id"]!=""){
		// 		$sql .= " and ";
		// 	}
		// 	$sql .= " kind_id = ".$_GET["kind_id"];
		// }
		// if($_GET["project_id"]!=""){
		// 	if($_GET["status_id"]!=""||$_GET["kind_id"]!=""){
		// 		$sql .= " and ";
		// 	}
		// 	$sql .= " project_id = ".$_GET["project_id"];
		// }
		// if($_GET["priority_id"]!=""){
		// 	if($_GET["status_id"]!=""||$_GET["project_id"]!=""||$_GET["kind_id"]!=""){
		// 		$sql .= " and ";
		// 	}
		// 	$sql .= " priority_id = ".$_GET["priority_id"];
		// }
		// if($_GET["start_at"]!="" && $_GET["finish_at"]){
		// 	if($_GET["status_id"]!=""||$_GET["project_id"]!="" ||$_GET["priority_id"]!="" ||$_GET["kind_id"]!="" ){
		// 		$sql .= " and ";
		// 	}
		// 	$sql .= " ( created_at >= \"".$_GET["start_at"]."\" and created_at <= \"".$_GET["finish_at"]."\" ) ";
		// }
		 $reports = RequestData::getBySQL($sql);
	
	}else{
		$reports = RequestData::getAll();
	}
?> 
<form class="form-horizontal" role="form"> <!--formulario de busqueda de reporte-->
	<input type="hidden" name="view" value="reports">
	<div class="form-group" style="display: flex;align-items: center;"> <!--campos consulta basica -->
		<div class="col-lg-4"><!-- select buscar = $table -->
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
				<select name="tblname" id="tablename" class="form-control" onchange="tableChange(this)">
					<option value="">Buscar</option>
					<option value="ticket" <?php if(isset($_GET['tblname']) && $_GET['tblname'] == 'ticket'){ echo 'selected'; }?>>Ticket</option>
					<option value="area" <?php if(isset($_GET['tblname']) && $_GET['tblname'] == 'area'){ echo 'selected'; }?>>Area</option>
				</select>
			</div>
		</div>
		<div class="col-lg-4"><!-- select operacion = $ope -->
			<div class="input-group">
				<span class="input-group-addon">Operacion</span>
				<select name="ope" class="form-control">
					<option value="">NINGUNA</option>
					<option value="cantidad" <?php if(isset($_GET['ope']) && $_GET['ope'] == 'cantidad'){ echo 'selected'; }?>>Cantidad</option>
 				</select>
			</div>
		</div>
		<div class="col-lg-4"><!-- select campo = select depende del campo buscar -->
			<div class="input-group">
				<span class="input-group-addon">Campos</span>
				<select multiple name="select" id="select" class="form-control" novelidate>
						<option value="*">Todo</option>	
						<option value="title">Titulo</option>
						<option value="description">Descripcion</option>
						<option value="Kind_id">Tipo</option>
						<option value="status_id">Estado</option>	
				</select>
				<select multiple name="select" id="select1" class="form-control" novelidate >
						<option value="*">Todo</option>
						<option value="name">Nombre</option>
						<option value="kind">Tipo Area</option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group"><!-- campos opcionales de condiciones -->
		<div class="col-lg-3"><!-- select condicion depende del campo buscar(table) -->
			<div class="input-group">
				<span class="input-group-addon">Condición</span>
				<select name="where" id="where" class="form-control" novelidate>
						<option value="">NINGUNA</option>
						<option value="title">Titulo</option>
						<option value="description">Descripcion</option>
						<option value="Kind_id">Tipo</option>
						<option value="status_id">Estado</option>	
				</select>
				<select name="where1" id="where1" class="form-control" novelidate >
						<option value="">NINGUNA</option>					
						<option value="name">Nombre</option>
						<option value="kind">Tipo Area</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3"><!-- campo "igual", requerido para select condicion -->
			<div class="input-group">
				<span class="input-group-addon">=</span>
				<input type="text" name="condicion" class="form-control">
			</div>
		</div>
		<div class="col-lg-3"><!-- campo fecha inicio -->
			<div class="input-group">
				<span class="input-group-addon">INICIO</span>
				<input type="date" name="start_at" value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
			</div>
		</div>
		<div class="col-lg-3"><!-- Campo fecha final rango de fechas opcional -->
			<div class="input-group">
				<span class="input-group-addon">FIN</span>
				<input type="date" name="finish_at" value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
			</div>
		</div>
	</div>
	<div class="form-group"><!-- campos opcionales de condiciones y boton de reporte -->
		<div class="col-lg-6"><!-- campo de condicion opcional -->
			<div class="input-group" style="display:none;">
				<span class="input-group-addon">Condicion</span>
				<select name="" class="form-control">
					<option value="">Ninguna</option>
					<option value="">Title</option>
				</select>
			</div>
		</div>
		<div class="col-lg-6"><!-- boton procesar de reporte -->
			<button class="btn btn-primary btn-block">Procesar</button>
		</div>
	</div>
</form>
<?php if(count($reports)>0){ //si hay reporte que mostrar
		$_SESSION["report_data"] = $reports;
		?> <!-- // si hay requests -->
		<div class="panel panel-default">
			<div class="panel-heading">Reportes</div>
				<table class="table table-bordered table-hover"><!-- tabla para mostrar reportes generados o por defecto -->
					<?php if(isset($table) && $table != ""){ ?><!--si la variable table esta definida -->
						<?php switch ($table) {//casos para la tabla seleccionada
							case 'ticket':?><!--si la tabla es ticket -->
								<?php if ($ope == 'cantidad') { ?><!-- si la operacion es cantidad -->								<tr>
									<tr>
										<td>Cantidad</td>
										<td><?php echo $reports[0]->cantidad ?></td>
									</tr>		
									<tr>
										<td colspan="2">
											<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
												Detalle...
											</a>
										</td>
									</tr>
									<tr>
									<tr class="collapse" id="collapseExample">
											<td>ss</td>
											<td>ss</td>
										</tr>
									</tr>
									</tr>
									
								<?php }else{ ?><!-- la operacion es diferente de cantidad -->
									<tr>
										<th>Titulo</th>
									<tr>
									<?php foreach($reports as $report){?>							
									<tr>
										<td><?php echo $report->title; ?></td>
									</tr>
									<?php } ?>
								<?php } ?>
							<?php break; ?>
							<?php case 'area': ?><!--si la tabla es area -->
								<?php if ($ope == 'cantidad') { ?><!-- si la operacion es cantidad -->
									<tr>
										<?php foreach ($reports as $report) { ?>		
										<td>Cantidad</td>
											<td><?php echo $report->cantidad ?></td>
										<?php } ?>	
									</tr>
								<?php }else{?><!-- si no es operacion cantidad -->
									<tr>
										<th>Nombre</th>
									</tr>
									<?php foreach($reports as $report){?>	
										<tr>
											<td><?php echo $report->name; ?></td>
										</tr>
									<?php } ?>
								<?php } ?>
							<?php break; ?>			
							<?php default: ?>
									<td>cantidad</td>
									<td><?php echo $report->cantidad; ?></td>
								<?php break; ?>
						<?php }?>
					<?php } else { ?><!-- Tabla por defecto en report-view -->	
							<tr>
								<th>Asunto</th>
								<th>Area</th>
								<th>Tipo</th>
								<th>Categoria</th>
								<th>Prioridad</th>
								<th>Estado</th>
								<th>Fecha Creación</th>
								<th>Ultima Actualizacion</th>
							</tr>
							<?php foreach($reports as $report){//variables utilizas en la tabla por defecto
								$area  = $report->getArea();
								$prio = $report->getPriority();
								$kind = $report->getKind();
								$refe = $report->getReference();
								$status =  $report->getStatus();
							?>
							<tr>
								<td><?php echo $report->title; ?></td>
								<td><?php echo $area->name; ?></td>
								<td><?php echo $kind->name ?></td>
								<td><?php echo $refe->name ?></td>
								<td><?php echo $prio->name; ?></td>
								<td><?php echo $status->name ?></td>
								<td><?php echo $report->created_at; ?></td>
								<?php if($report->finished_at) {?>
										<td><?php echo $report->finished_at; ?></td>
								<?php }elseif($report->asigned_at){ ?>
										<td><?php echo $report->asigned_at; ?></td>
								<?php }else{ ?>
								<td><?php echo $report->created_at; ?></td>
								<?php } ?>
							</tr>
							<?php } ?>
						<tr><!-- promedio de timpos easignar requests en horas-->
							<td colspan="4">Promedio de tiempo en Asignar Tickets</td>
							<td colspan="4"><?php
								$prom = RequestData::getPromAsigned();
								echo round($prom[0]->dias,2)." - Horas";
							?></td>
						</tr>
						<tr><!--promedio de timposen desarrollar requests-->
							<td colspan="4">Promedio de tiempo en Desarrollar Tickets</td>
							<td colspan="4"><?php
								$prom = RequestData::getPromFromAsignedToFinished();
								echo round($prom[0]->dias,2)." - Horas";
							?></td>
						</tr>
						<tr><!--promedio de timpos desde el inicio hasta finalizar un ticket-->
							<td colspan="4">Promedio de tiempo en Terminar Tickets</td>
							<td colspan="4"><?php
								$prom = RequestData::getPromFinished();
								echo round($prom[0]->dias,2)." - Horas";
							?></td>
						</tr>
					<?php } ?>
				</table> 
			</div>
		</div>
<?php }else{ ?><!--mensaje no hay reportes por mostrar -->
			<p class='alert alert-danger'>No hay reportes</p>
<?php }	?>
<div class="panel panel-default"><!-- graficas de reportes -->
	<div class="row">
		<div id="columnchart_values" class="col-md-6"></div>
		<div id="piechart" class="col-md-6" style="width: 500px; height: 500px;"></div>
	</div>
	<div class="row">
		<div id="curve_chart" style="width: 500px; height: 450px" class="col-md-6"></div>
		<div id="" class="col-md-6"></div>
	</div>
</div>
<!-- Load the AJAX API
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">//scripts de las graficas de los reportes
	google.charts.load("current", {packages:['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	google.charts.setOnLoadCallback(drawChart2);
	google.charts.setOnLoadCallback(drawChart3);
	function drawChart() {
		let solicitados = parseInt(<?php echo count(RequestData::getAll()); ?>);
		let asignados = parseInt(<?php echo count(RequestData::getAllAsigned()); ?>);
		let pendientes = parseInt(<?php echo count(RequestData::getAllPendings()); ?>);
		let terminados = parseInt(<?php echo count(RequestData::getAllFinished()); ?>);
		var data = google.visualization.arrayToDataTable([
			["ticket", "cantidad", { role: "style" } ],
			["Generados", solicitados, "blue"],
			["Asingnados", asignados, "yellow"],
			["Pendientes", pendientes, "red"],
			["Terminados", terminados, "green"]
		]);

		var view = new google.visualization.DataView(data);
		view.setColumns([0, 1,
											{ calc: "stringify",
												sourceColumn: 1,
												type: "string",
												role: "annotation" },
											2]);

		var options = {
			title: "Reportes Tickets Generados",
			width: 350,
			height: 500,
			bar: {groupWidth: "95%"},
			legend: { position: "none" },
		};
		var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
		chart.draw(view, options);
	}

	function drawChart2() {
		let solicitados = parseInt(<?php echo count(RequestData::getAll()); ?>);
		let asignados = parseInt(<?php echo count(RequestData::getAllAsigned()); ?>);
		let pendientes = parseInt(<?php echo count(RequestData::getAllPendings()); ?>);
		let terminados = parseInt(<?php echo count(RequestData::getAllFinished()); ?>);
		var data = google.visualization.arrayToDataTable([
			['Ticket', 'Cantidad'],
			['Asignados',      asignados],
			['Pendientes',  pendientes],
			['Terminados', terminados]
		]);

		var options = {
			title: "Reportes Tickets Generados",
			colors: ["yellow", "red", "green"]
		};

		var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		chart.draw(data, options);
	}

	function drawChart3() {
		var data = google.visualization.arrayToDataTable([
			['Semana', 'Asignar', 'Desarrollar','Terminar'],
			['16',  1000,      400,       300],
			['17',  1170,      460,       550],
			['18',  660,       1120,      770],
			['19',  1030,      540,       400]
		]);

		var options = {
			title: 'Promedio Tickets',
			curveType: 'function',
			legend: { position: 'bottom' },
			colors:['red','yellow','green']
		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		chart.draw(data, options);
	}
</script>
<script>//scripts de los cambios de selects
	 function tableChange(sel) {
		select = document.getElementById("select");
		select1 = document.getElementById("select1");
		where = document.getElementById("where");
		where1 = document.getElementById("where1");
		 console.log(sel.value);
		switch (sel.value) {
			case "ticket":	
				select.style.display = "";
				where.style.display = "";
				select1.style.display="none";
				where1.style.display="none";
				break;
			case "area":
				select1.style.display="";
				where1.style.display="";
				select.style.display="none";
				where.style.display="none";
				break;		
			default:
				select1.style.display="none";
				select.style.display="none";
				where1.style.display="none";
				where.style.display="none";
				break;
		}
  }
	function onLoadSelect(){
	table = document.getElementById('tablename').value;
	select = document.getElementById("select");
	select1 = document.getElementById("select1");
	where = document.getElementById("where");
	where1 = document.getElementById("where1");
	switch (table) {
		case "ticket":
				select.style.display = "";
				where.style.display = "";
				select1.style.display="none";
				where1.style.display="none";
			break;
		case "area":
				select1.style.display="";
				where1.style.display="";
				select.style.display="none";
				where.style.display="none";
			break;		
		default:
				select1.style.display="none";
				select.style.display="none";
				where1.style.display="none";
				 where.style.display="none";
			break;
		}
	}
	onLoadSelect();

</script> -->