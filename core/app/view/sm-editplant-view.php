<?php $plant = PlantData::getById($_GET["id"]);?>
<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Editar Planta</h4>
      </div>
      <div class="card-content table-responsive">
        <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=sm-updateplant" role="form">
          <div>
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" value="<?php echo $plant->name;?>" id="name" placeholder="Nombre">
            </div>
          </div>
          <div>
            <div class="col-lg-offset-2 col-lg-10">
            <input type="hidden" name="origin_id" value="<?php echo $plant->id;?>">
              <button type="submit" class="btn btn-success">Actualizar Planta</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	</div>
</div>