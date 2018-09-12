<?php 
	$plants = PlantData::getAll();
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>Plantas</h4>
		</div>
		<div class="card-content table-responsive">
			<a href="index.php?view=sm-newplant" class="btn btn-success">Nueva Planta</a>
			<?php if(count($plants)>0){ ?> <!-- // si hay usuarios -->
			<table class="table table-bordered table-hover">
				<tr>
					<th>Nombre</th>
					<th style="width:80px;"></th>
				</tr>
				<?php foreach($plants as $plant){ ?>
				<tr>
					<td><?php echo $plant->name; ?></td>
					<td style="width:130px;" >
						<a href="index.php?view=sm-editplant&id=<?php echo $plant->id;?>" rel="tooltip" title="Editar" class="btn btn-simple btn-warning btn-xs"><i class='fa fa-pencil-square-o'></i></a>
						<a href="index.php?action=sm-delplant&id=<?php echo $plant->id;?>" rel="tooltip" title="Eliminar" class=" btn-simple btn btn-danger btn-xs"><i class='fa fa-remove'></i></a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<?php }else{ ?>
			<p class='alert alert-danger'>No hay Categorias</p>"
			<?php }	?>
		</div>
	</div>
</div>