<?php
	$user = Core::$user;
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>TEST BONDING </h4>
		</div>
		<main>
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">CONSULTAR CÓDIGO</label>
			<?php if($user->Nombre != 'consulta'){ ?>
				<input id="tab2" type="radio" name="tabs">
				<label for="tab2">AGREGAR DATOS</label>
			<?php } ?>
			<section id="content1">
				<div class="search">
					<form class="form1" method="POST" action="./index.php?view=bonding-listIndicador">
						<input class="text-center" type="text" name="referencia" placeholder="Código Referencia" autofocus />
						<div class="btns">
							<button class="btn btn-success" name="historico" type="submit">HISTÓRICO</button>
							<button class="btn btn-success" name="desarrollo" type="submit">DESARROLLO</button>
						</div>
					</form>
					<div style="text-align: center">
						<a class="btn btn-info" name="todo" href="./index.php?view=bonding-listIndicador&todo=todo" >LISTAR TODO</a>
					</div>
				</div>
			</section>
			<section id="content2">	
				<?php if($user->Nombre != "consulta" ){ ?>
				<form method="post" onKeypress="if (event.keyCode == 13) event.returnValue = false;" action="./index.php?action=bonding-procesa" name="datos" >
					<div class="contentform">
						<div class="form-group">
							<div class="col-md-4">
								<label>
									<p>ORIGEN DEL TEST </p>
									<select name="origen"  required>
										<option selected></option>
										<option value="Desarrollo" class="text-dark">Desarrollo</option>
										<option value="P. Sabaneta" class="text-dark">P. Sabaneta</option>   
										<option value="P. Manizales" class="text-dark">P. Manizales</option>
										<option value="P. Pereira" class="text-dark">P. Pereira</option>   
									</select>
								</label>
							</div>
							<div class="col-md-4">
								<p>FECHA DE LA PRUEBA </p>	
								<input type="date" name="fechap" id="fechap" required/>
								<div class="validation"></div>
							</div>
							<div class="col-md-4">
								<p>HORA DE PRUEBA</p>
								<input type="time" style="text-transform:uppercase;" required name="horap" id="horap" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<p>REFERENCIA (CÓDIGO)</p>
								<input type="text" style="text-transform:uppercase;" required name="referencia" id="referencia" />
							</div>
							<div class="col-md-4">
								<p>NOMBRE REFERENCIA</p>
								<input type="text" style="text-transform:uppercase;" required name="nombre" id="nombre" />
							</div>
							<div class="col-md-4">
								<p>REFERENCIA TELA</p>
								<input type="text" style="text-transform:uppercase;" required name="reftela" id="reftela" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<p>PINTA</p>
								<input type="text" style="text-transform:uppercase;" required name="pinta" id="pinta" />
							</div>
							<div class="col-md-4">
								<p>COLOR (TP)</p>
								<input type="text" style="text-transform:uppercase;" required name="color" id="color" />
							</div>
							<div class="col-md-4">
								<label>
									<p>MÁQUINA</p>	
									<select name="maquina" onchange="changeMachine(this);">
										<option selected> </option>
										<option value="ultra_continua">ULTRASONIDO CONTINUA</option>
										<option value="ultra_presilla">ULTRASONIDO PRESILLA</option>
										<option value="at750v">AT750V</option>
										<option value="at750foa">AT750FOA</option>
										<option value="mx204">MX204</option>
										<option value="mx211">MX211</option>
										<option value="mx210">MX210</option>
										<option value="prensa_doble">PRENSA DOBLE BANDEJA</option>
										<option value="prensa">PRENSA UNA BANDEJA</option>  
										<option value="fusionadora">FUSIONADORA</option>  
									</select>
								</label>            
							</div>
						</div>
						<h4 class="subti">Si el proceso es el mismo en varios <br/> lugares de la prenda indique cual es</h4>
						<div class="form-group">
							<div class="col-md-4">
									<p>PROCESO</p>
									<select name="proceso" id="proceso" onchange="changeProcess(this);"> 
										<option selected></option>
										<option value="tiras">Tiras</option>
										<option value="traslapado">Traslapado</option>
										<option value="laminado">Laminado</option>
										<option value="encarterado">Encarterado</option> 
										<option value="dobladillado">Dobladillado</option> 
										<option value="ultrasonido">Ultrasonido</option>    
									</select>
							</div>
							<div id="ubicacion" class="col-md-4">
									<p>UBICACIÓN</p>					              
									<input type="text" style="text-transform:uppercase;" name="ubicacion" />
							</div>		
							<div id="sku" class="col-md-4">
									<p>SKU (Material Termoadhesivo)</p>	
									<input type="text" style="text-transform:uppercase;" name="sku"  />
							</div>
						</div>
						<hr>
						<div class="typeMachine">
							<div class="col-md-6" id="longitudini">
								<p >LONGITUD INICIAL (Tiras cm) </p>	
								<input type="text" style="text-transform:uppercase;" name="longitudini"  />
							</div>	
							<div class="col-md-6" id="longitudfin">
								<p >LONGITUD FINAL (Tiras cm) </p>	
								<input type="text" style="text-transform:uppercase;" name="longitudfin" />
							</div>
							<div class="col-md-6" id="peso">
								<p >PESO (Tiras gr) </p>	
								<input type="text" style="text-transform:uppercase;" name="peso" />
							</div>
							<div class="col-md-6" id="plancha">
								<p >°C PLANCHA FUSIONADORA O AT800K </p>	
								<input type="text" style="text-transform:uppercase;" name="plancha" />
							</div>				
							<div class="col-md-6" id="plato">
								<p >°C PLATO </p>	
								<input type="text" style="text-transform:uppercase;" name="plato" /> 
							</div>
							<div class="col-md-6" id="pie">
								<p >°C PIE </p>	
								<input type="text" style="text-transform:uppercase;" name="pie" />
							</div>
							<div class="col-md-6" id="vel_sup">
								<p >VELOCIDAD SUPERIOR </p>	
								<input type="text" style="text-transform:uppercase;" name="vel_sup"/>
							</div>
							<div class="col-md-6" id="vel_inf">
								<p >VELOCIDAD INFERIOR</p>	
								<input type="text" style="text-transform:uppercase;" name="vel_inf" />
							</div>	
							<div class="col-md-6" id="intensidad">
								<p >INTENSIDAD</p>	
								<input type="text" style="text-transform:uppercase;" name="intensidad" />
							</div>	
							<div class="col-md-6" id="airesup">
								<p >°C AIRE SUPERIOR </p>	
								<input type="text" style="text-transform:uppercase;" name="airesup" />
							</div>
							<div class="col-md-6" id="aireinf">
								<p >°C AIRE INFERIOR </p>	
								<input type="text" style="text-transform:uppercase;" name="aireinf" />
							</div>
							<div class="col-md-6" id="caudalsup">
								<p >CAUDAL SUPERIOR(megapascales)</p>	
								<input type="text" style="text-transform:uppercase;" name="caudalsup" />
							</div>
							<div class="col-md-6" id="caudalinf">
								<p >CAUDAL INFERIOR (megapascales)</p>	
								<input type="text" style="text-transform:uppercase;" name="caudalinf"/>
							</div>
							<div class="col-md-6" id="presion">
								<p >PRESIÓN (PSI)</p>	
								<input type="text" style="text-transform:uppercase;" name="presion" />
							</div>
							<div class="col-md-6" id="velocidad">
								<p >VELOCIDAD (mt/min)</p>	
								<input type="text" style="text-transform:uppercase;" name="velocidad" />
							</div>
							<div class="col-md-6" id="tiempo">
								<p >TIEMPO EXPOSICIÓN (seg)</p>	
								<input type="text" style="text-transform:uppercase;" name="tiempo"/>
							</div>
							<div class="col-md-6" id="proceso">
								<label>
									<p>RESULTADO</p>
									<select name="resultado"style="width:95%" style="height: 20%" 
										onchange="result(this)">
										<option selected></option>
										<option value="aprobado_tela">Aprobado. la tela se rompe</option>
										<option value="falla_costura">Falla. La costura se abre</option>
										<option value="aprobado_>90%">Aprobado. Recuperacion >= 90%</option>
										<option value="falla_<90%">Falla. Recuperacion < 90%</option>
										<option value="fuerza_minima_esperada">Fuerza mínima esperada del laminado (o dobladillo, o encarterado)</option>
										<option value="aprobado_fuerza_alcanzada">Aprobado. Fuerza minima alcanzada</option>
										<option value="falla_fuerza_no_alcanzada">Falla. Fuerza mínima no alcanzada</option> 
										<option value="falla_fuerza_no_alcanzada">Falla. La apariencia no es adecuada</option>    
									</select>
								</label>
							</div>
							<div class="col-md-6" id="dinamometro">
								<p >KG/FUERZA (Dinamometro)</p>	
								<input type="text" style="text-transform:uppercase;" id="dinamometro"  name="dinamometro" />
							</div>
						</div>
						<div class="obsBox">
							<span class="col-md-12" >OBSERVACIONES</span>
							<textarea class="col-md-12" name="observaciones"></textarea>
						</div>
					</div>
					<div class="btn-save">
						<button type="submit" name="save" class="btn btn-success col-md-4">GUARDAR DATOS</button>
					</div>
				</form>
				<?php } ?>
			</section>
		</main>
	</div>
</div>
