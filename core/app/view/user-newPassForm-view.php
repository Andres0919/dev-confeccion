<?php 
	$u = Core::$user;
	$users = UserData::getAll();
	$n = 0;
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>CONFIGURACIÓN USUARIO</h4>
		</div>
		<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-4">
						<a href="#" class="active" id="login-form-link">CAMBIAR CONTRASEÑA</a>
					</div>
					<?php if($u->Categoria == "1"){ ?>
					<div class="col-xs-4">
						<a href="#" id="register-form-link">USUARIO NUEVO</a>
					</div>
					<?php  } ?>
					<?php if($u->Nombre == "jarboled" || $u->Nombre == "admin"){ ?>
					<div class="col-xs-4">
						<a href="#" id="user-list-link">USUARIOS</a>
					</div>
					<?php } ?>
				</div>
				<hr>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<form id="login-form" action="./index.php?action=user-updatePass" method="post" role="form">
							<div class="input">
								<input type="password" name="pass" id="current_pass" tabindex="1" placeholder="Contraseña Actual" required>
							</div> 
							<div class="input">
								<input type="password" name="newpass" id="new_pass" tabindex="2" placeholder="Contraseña Nueva" required>
							</div>
							<div>
								<div class="row">
									<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-success" value="CAMBIAR">
								</div>
							</div>
						</form>
						<form id="register-form" action="./index.php?action=user-registrar" method="post" role="form" style="display: none;">
							<div class="input">
								<input type="text" name="usuario" id="usuario" tabindex="1" placeholder="Usuario">
							</div>
							<div class="input">
								<input type="password" name="pass" id="contra" tabindex="2" placeholder="Contraseña">
							</div>
							<div class="tipoUsuario">
								<label class="radio inline">  
										<input type="radio" name="categoria" value="1" checked> 
										<span>Administrador</span>
								</label>
								<label class="radio inline">
										<input type="radio" name="categoria" value="2"> 
										<span>Usuario</span>
								</label>
							</div> 
							<div class="plant">
								<label>
									<select name="planta"  style="width:95%" style="height: 40px" onchange="changeMachine(this);">
										<option selected>--Planta--</option>
										<option value="1">Sabaneta</option>
										<option value="2">Pereira</option>
										<option value="7">Manizales</option>
									</select>
								</label>            
							</div>
							<div>
								<div class="row">
									<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-success" value="REGISTRAR">
								</div>
							</div>
						</form>
						<table id="user-list" class="user-list table-hover" style="display:none;">
							<thead>
								<th>#</th>
								<th>USUARIO</th>
								<th>CONTRASEÑA</th>
								<th>ESTADO</th>
								<th>ACCIÓN</th>
							</thead>
							<tbody>
								<?php foreach($users as $user){ ?>
								<tr>
									<td><?php echo ++$n ?></td>
									<td><?php echo $user->Nombre ?></td>
									<td><?php echo $user->Pass ?></td>
									<td><?php echo ($user->estado == 1) ? 'Activo' : 'Desactivo' ?></td>
									<td><a href="" class="btn btn-warning" onclick="getUser(<?php echo $user->id ?>);" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIO</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="./index.php?action=user-updateUser" method="post">
						<div class="modal-body">
							<label for="nameInput">NOMBRE</label>
							<input type="text" name="nameInput" id="nameInput">
							<label for="passInput">CONTRASEÑA</label>
							<input type="text" name="passInput" id="passInput">
							<label for="estado">ESTADO</label>
							<select name="estado" id="estado">
								<option value="1">Activo</option>
								<option value="0">Desactivo</option>
							</select>
							<input type="hidden" name="idInput" id="idInput">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
							<button type="submit" name="save" class="btn btn-success">GUARDAR CAMBIOS</button>
						</div>  
					</form> 
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function getUser(id) {
        let nameInput = document.querySelector("#nameInput");
		let passInput = document.querySelector("#passInput");
		let estado = document.querySelector("#estado");
        let idInput = document.querySelector("#idInput");
        params = {
			"id": id
		}
        $.ajax({
            data: params,
            url: './index.php?action=user-getUser',
            dataType: 'json',
            type: 'GET',
            beforeSend: function () {
                console.log('cargando');
            },
            success: function(res){
                // console.log(res);
                nameInput.value = res.Nombre;
				passInput.value = res.Pass;
				estado.value = res.estado;
                idInput.value = res.id;
            },
            error: function (err) {
                console.log(err);
            }
        })
	}
</script>
        