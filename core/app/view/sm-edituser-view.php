<?php 
  $user = UserData::getById($_GET["id"]);
  $plantas = PlantData::getAll();
?>
<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header" >
        <h4>Editar Usuario</h4>
      </div>
      <div class="card-content table-responsive">
		    <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=updateuser" role="form">
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
            <div class="col-md-6">
              <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
            <div class="col-md-6">
              <input type="text" name="last_name" value="<?php echo $user->last_name;?>" required class="form-control" id="last_name" placeholder="Apellido">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
            <div class="col-md-6">
              <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
            <div class="col-md-6">
              <input type="email" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
            <div class="col-md-6">
              <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
              <p class="help-block">La contrase&ntilde;a solo se modificara si escribes algo, en caso contrario no se modifica.</p>
            </div>
          </div>
          <div class="form-group" id="planta">
            <label for="inputEmail1" class="col-lg-2 control-label">Planta</label>
            <div class="col-md-6">
              <select name="plant" class="form-control">
                <?php foreach ($plantas as $planta) { ?>
                  <option value="<?php echo $planta->id ?>" <?php if($planta->id==$user->plant_id){ echo "selected"; }?>><?php echo $planta->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Tipo</label>
            <div class="col-md-6">
              <select name="rol" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                <option value="1" <?php if($user->rol==1){ echo "selected"; }?>>Administrador</option>
                <option value="2" <?php if($user->rol==2){ echo "selected"; }?>>Usuario</option>
              </select> 
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
              <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </div>
          </div>
        </form>
	    </div>
    </div>
  </div>
</div>
