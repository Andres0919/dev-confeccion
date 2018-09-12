<?php 
  $user = Core::$user;
  $bonding = new BondingData();
  if(isset($_POST['historico'])){
    $ref= $_POST['referencia'];
    $results = $bonding->getBondingHistorico($ref);
  }
  if(isset($_POST['desarrollo'])){
    $ref= $_POST['referencia'];
    $results = $bonding->getBondingDesarrollo($ref);
  }
  if(isset($_GET['todo'])){
    $results = $bonding->getBondingTodo();
  }
  if(isset($_GET['planta'])){
    $ref = $_GET['planta'];
    $results = $bonding->getBondingPlanta($ref);
  }

  for ($i=1; $i <= 33; $i++) { 
    $row[$i] = '';
  }

?>
<div class="secc">
		<div class="card card-list">
      <?php if (isset($_GET['todo']) || isset($_GET['planta']) ) { ?> <!-- Si el booón pulsado es listar todo o el nombre de una plata -->
      <div class="card-header">
        <h4>LISTADO COMPLETO <?php echo (isset($_GET['planta']))? $_GET['planta'] : ''?></h4> <!-- Muestre este titulo, añadir el nombre de la planta si es definido -->
      </div>
      <div class="btns-left">
      <a href="./index.php?view=bonding-fullForm" class="btn btn-info">VOLVER</a>
      <?php if ($user->Nombre !='consulta') { ?><!--si es el usuario consulta boton volver diferente -->
        <!-- <a href="editar.php"><img src="assets/img/editar.png" alt="editar" width="55" height="55" title="Editar"></a>         -->
      <?php }else{ ?> <!-- si es otro usuario boton volver y botón editar -->
      <?php } ?>
      </div>
        <!-- <a href="#" onclick="descargarExcel(); return false;"><img src="assets/img/download2.png" alt="descargar" width="55" height="55" title="Descargar"></a> BOTÓN DESCARGAR -->
      <div class="btns-right"> 
        <a class="btn btn-success" name="manizales" href= './index.php?view=bonding-listIndicador&planta=P. Manizales'>Manizales</a> <!-- BOTÓN MANIZALES -->
        <a class="btn btn-success" name="pereira" href= './index.php?view=bonding-listIndicador&planta=P. Pereira'>Pereira</a> <!-- BOTÓN PEREIRA -->
        <a class="btn btn-success" name="sabaneta" href= './index.php?view=bonding-listIndicador&planta=P. Sabaneta'>Sabaneta</a> <!-- BOTÓN SABANETA -->
        <a class="btn btn-success" name="desa" href= './index.php?view=bonding-listIndicador&planta=Desarrollo'>Desarrollo</a>  <!-- BOTÓN DESARROLLO -->
      </div>
      <?php }else{ ?> <!-- SI EL BOTON DEFINIDO ES LISTAR TODO -->
      <div class="card-header">
        <h4>LISTADO INDICADOR</h4> <!-- MUESTRE ESTE TITULO -->
      </div>
      <?php if ($user->Nombre == 'consulta') { ?> <!-- SI EL USUARIO ES CONSULTA  BOTÓN VOLVER-->
      <a href="./index.php?view=bonding-fullForm"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
      <?php }else{ ?> <!-- SI ES OTRO USUARIO BOTÓN VOLVER -->
        <!-- <a href="./index.php?view=bonding-fullForm"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a> -->
      <?php } ?>
      <div class="btns-right">
        <form>
          <input id="searchTerm" placeholder="buscar" type="text" onkeyup="doSearch()" /> <!-- INPUT BUSCAR PALABRA CLAVE -->
        </form>
      </div>
    <?php } ?>
    <?php foreach ($results as $result) { ?><!-- COLUMNAS DEL LISTADO -->
      <?php $row[1] .= "<td >".$result->Origen."</td>"; ?>
      <?php $row[2] .= "<td >".$result->Fechap."</td>"; ?>
      <?php $row[3] .= "<td >" .$result->Horap."</td>"; ?>
      <?php $row[4] .= "<td >" .$result->Cod_Referencia."</td>"; ?>
      <?php $row[5] .= "<td onclick ='getRef(".$result->id.");' data-toggle=\"modal\" data-target=\"#exampleModal\">" .$result->Nombre_Referencia."</td>"; ?>
      <?php $row[6] .= "<td >" .date_format($result->Fecha, 'd-m-Y')."</td>"; ?>
      <?php $row[7] .= "<td >" .$result->Hora."</td>"; ?>
      <?php $row[8] .= "<td >" .$result->Ref_Tela."</td>"; ?>
      <?php $row[9] .= "<td >" .$result->Pinta."</td>"; ?>
      <?php $row[10] .= "<td >" .$result->Color."</td>"; ?>
      <?php $row[11] .= "<td >" .$result->Proceso."</td>"; ?>
      <?php $row[12] .= "<td >" .$result->Ubicacion ."</td>"; ?>
      <?php $row[13] .= "<td >" .$result->SKU."</td>"; ?>
      <?php $row[14] .= "<td >" .$result->Maquina."</td>"; ?>
      <?php $row[15] .= "<td >" .$result->Longitud_Inicial."</td>"; ?>
      <?php $row[16] .= "<td >" .$result->Longitud_Final."</td>"; ?>
      <?php $row[17] .= "<td >" .$result->Peso."</td>"; ?>
      <?php $row[18] .= "<td >" .$result->Grados_PFoAT800K."</td>"; ?>
      <?php $row[19] .= "<td >" .$result->Grados_Plato."</td>"; ?>
      <?php $row[20] .= "<td >" .$result->Grados_Pie."</td>"; ?>
      <?php $row[21] .= "<td >" .$result->Grados_Aire_S."</td>"; ?>
      <?php $row[22] .= "<td >" .$result->Grados_Aire_I."</td>"; ?>
      <?php $row[23] .= "<td >" .$result->Caudal_Sup."</td>"; ?>
      <?php $row[24] .= "<td >" .$result->Caudal_Inf."</td>"; ?>
      <?php $row[25] .= "<td >" .$result->Presion."</td>"; ?>
      <?php $row[26] .= "<td >" .$result->Velocidad."</td>"; ?>
      <?php $row[27] .= "<td >" .$result->Velocidad_Sup."</td>"; ?>
      <?php $row[28] .= "<td >" .$result->Velocidad_Inf."</td>"; ?>
      <?php $row[29] .= "<td >" .$result->Intensidad."</td>"; ?>
      <?php $row[30] .= "<td >" .$result->Tiempo_Exp."</td>" ?>
      <?php $row[31] .= "<td >" .$result->Resultado."</td>"; ?>
      <?php $row[32] .= "<td >" .$result->Dinamometro."</td>"; ?>
      <?php $row[33] .= "<td >" .$result->Observaciones1."</td>"; ?>
    <?php } ?>
    <div class="JStableOuter" id="descarga"><!-- TABLA LISTADO -->
      <table>
        <tbody>
        <tr>
          <td>ORIGEN</td><?php echo $row[1]; ?>
        </tr>
        <tr>
          <td>FECHA PRUEBA</td><?php echo $row[2]; ?>
        </tr>
        <tr>
          <td>HORA PRUEBA</td><?php echo $row[3]; ?>
        </tr>
        <tr>
          <td>REFERENCIA</td><?php echo $row[4]; ?>
        </tr>
        <tr>
          <td>NOMBRE</td><?php echo $row[5]; ?>
        </tr>
        <tr>
          <td>FECHA</td><?php echo $row[6]; ?>
        </tr>
        <tr>
          <td>HORA</td><?php echo $row[7]; ?>
        </tr>
        <tr>
          <td>REFERENCIA TELA</td><?php echo $row[8]; ?>
        </tr>
        <tr>
          <td>PINTA</td><?php echo $row[9]; ?>
        </tr>
        <tr>
          <td>COLOR</td><?php echo $row[10]; ?>
        </tr>        
        <tr>
          <td>PROCESO</td><?php echo $row[11]; ?>
        </tr>
        <tr>
          <td>UBICACIÓN</td><?php echo $row[12]; ?>
        </tr>
        <tr>
          <td>SKU</td><?php echo $row[13]; ?>
        </tr>
        <tr>
          <td>MÁQUINA</td><?php echo $row[14]; ?>
        </tr>
        <tr>
          <td>LONGITUD INI(cm)</td><?php echo $row[15]; ?>
        </tr>
        <tr>
          <td>LONGITUD FIN(cm)</td><?php echo $row[16]; ?>
        </tr>
        <tr>
          <td>PESO (gr)</td><?php echo $row[17]; ?>
        </tr>
        <tr>
          <td>°C PLANCHA</td><?php echo $row[18]; ?>
        </tr>
        <tr>
          <td>°C PLATO</td><?php echo $row[19]; ?>
        </tr>
        <tr>
          <td>°C PIE</td><?php echo $row[20]; ?>
        </tr>
        <tr>
          <td>°C AIRE SUP</td><?php echo $row[21]; ?>
        </tr>
        <tr>
          <td>°C AIRE INF</td><?php echo $row[22]; ?>
        </tr>
        <tr>
          <td>CAUDAL SUPERIOR</td><?php echo $row[23]; ?>
        </tr>
        <tr>
          <td>CAUDAL INFERIOR</td><?php echo $row[24]; ?>
        </tr>
        <tr>
          <td>PRESIÓN</td><?php echo $row[25]; ?>
        </tr>
        <tr>
          <td>VELOCIDAD</td><?php echo $row[26]; ?>
        </tr>
        <tr>
          <td>VELOCIDAD SUP</td><?php echo $row[27]; ?>
        </tr>
        <tr>
          <td>VELOCIDAD INF</td><?php echo $row[28]; ?>
        </tr>
        <tr>
          <td>INTENSIDAD</td><?php echo $row[29]; ?>
        </tr>
        <tr>
          <td>TIEMPO EXP</td><?php echo $row[30]; ?>
        </tr>
        <tr>
          <td>RESULTADO</td><?php echo $row[31]; ?>
        </tr>
        <tr>
          <td>DINAMÓMETRO</td><?php echo $row[32]; ?>
        </tr>
        <tr>
          <td>OBSERVACIONES</td><?php echo $row[33]; ?>
        </tr>
        </tbody>
      </table>
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
					<form action="./index.php?action=bonding-procesa" method="post">
						<div class="modal-body">
              <div class="contentform">
                <div class="form-group"> <!-- row 1 -->
                  <div class="col-md-4">
                    <p>ORIGEN DEL TEST </p>
                    <select name="origen" id="origen"  required>
                      <option selected></option>
                      <option value="Desarrollo" class="text-dark">Desarrollo</option>
                      <option value="P. Sabaneta" class="text-dark">P. Sabaneta</option>   
                      <option value="P. Manizales" class="text-dark">P. Manizales</option>
                      <option value="P. Pereira" class="text-dark">P. Pereira</option>   
                    </select>
                  </div>
                  <div class="col-md-4">
                    <p>FECHA DE LA PRUEBA </p>	
                    <input type="date" name="fechap" id="fechap" required/>
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
                      <p>MÁQUINA</p>	
                      <select name="maquina" id="maquina" onchange="changeMachine(this);">
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
                      <input type="text" style="text-transform:uppercase;" name="ubicacion" id="ubi" />
                  </div>		
                  <div id="sku" class="col-md-4">
                      <p>SKU (Material Termoadhesivo)</p>	
                      <input type="text" style="text-transform:uppercase;" name="sku" id="skm"/>
                  </div>
                </div>
                <hr>
                <div class="typeMachine">
                  <div class="col-md-6" id="longitudini">
                    <p >LONGITUD INICIAL (Tiras cm) </p>	
                    <input type="text" style="text-transform:uppercase;" name="longitudini" id="loi" />
                  </div>	
                  <div class="col-md-6" id="longitudfin">
                    <p >LONGITUD FINAL (Tiras cm) </p>	
                    <input type="text" style="text-transform:uppercase;" name="longitudfin" id="lof"/>
                  </div>
                  <div class="col-md-6" id="peso">
                    <p >PESO (Tiras gr) </p>	
                    <input type="text" style="text-transform:uppercase;" name="peso" id="pes" />
                  </div>
                  <div class="col-md-6" id="plancha">
                    <p >°C PLANCHA FUSIONADORA O AT800K </p>	
                    <input type="text" style="text-transform:uppercase;" name="plancha" id="plan"/>
                  </div>				
                  <div class="col-md-6" id="plato">
                    <p >°C PLATO </p>	
                    <input type="text" style="text-transform:uppercase;" name="plato" id="plat" /> 
                  </div>
                  <div class="col-md-6" id="pie">
                    <p >°C PIE </p>	
                    <input type="text" style="text-transform:uppercase;" name="pie" id="pi" />
                  </div>
                  <div class="col-md-6" id="vel_sup">
                    <p >VELOCIDAD SUPERIOR </p>	
                    <input type="text" style="text-transform:uppercase;" name="vel_sup" id="vels" />
                  </div>
                  <div class="col-md-6" id="vel_inf">
                    <p >VELOCIDAD INFERIOR</p>	
                    <input type="text" style="text-transform:uppercase;" name="vel_inf" id="veli" />
                  </div>	
                  <div class="col-md-6" id="intensidad">
                    <p >INTENSIDAD</p>	
                    <input type="text" style="text-transform:uppercase;" name="intensidad" id="int" />
                  </div>	
                  <div class="col-md-6" id="airesup">
                    <p >°C AIRE SUPERIOR </p>	
                    <input type="text" style="text-transform:uppercase;" name="airesup" id="ais" />
                  </div>
                  <div class="col-md-6" id="aireinf">
                    <p >°C AIRE INFERIOR </p>	
                    <input type="text" style="text-transform:uppercase;" name="aireinf" id="aii" />
                  </div>
                  <div class="col-md-6" id="caudalsup">
                    <p >CAUDAL SUPERIOR(megapascales)</p>	
                    <input type="text" style="text-transform:uppercase;" name="caudalsup" id="cas"/>
                  </div>
                  <div class="col-md-6" id="caudalinf">
                    <p >CAUDAL INFERIOR (megapascales)</p>	
                    <input type="text" style="text-transform:uppercase;" name="caudalinf" id="cai"/>
                  </div>
                  <div class="col-md-6" id="presion">
                    <p >PRESIÓN (PSI)</p>	
                    <input type="text" style="text-transform:uppercase;" name="presion" id="pre" />
                  </div>
                  <div class="col-md-6" id="velocidad">
                    <p >VELOCIDAD (mt/min)</p>	
                    <input type="text" style="text-transform:uppercase;" name="velocidad" id="vel"/>
                  </div>
                  <div class="col-md-6" id="tiempo">
                    <p >TIEMPO EXPOSICIÓN (seg)</p>	
                    <input type="text" style="text-transform:uppercase;" name="tiempo" id="tie"/>
                  </div>
                  <div class="col-md-6">
                      <p>RESULTADO</p>
                      <select name="resultado" id="resultado" style="width:95%" style="height: 20%" 
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
                  </div>
                  <div class="col-md-6" id="dinamometro">
                    <p >KG/FUERZA (Dinamometro)</p>	
                    <input type="text" style="text-transform:uppercase;" id="dina"  name="dinamometro" />
                  </div>
                </div>
                <div class="obsBox">
                  <span class="col-md-12" >OBSERVACIONES</span>
                  <textarea class="col-md-12" name="observaciones" id="obsBox"></textarea>
                </div>
              </div>
            </div>
            <input type="hidden" id="idInput" name="idInput">
						<div class="modal-footer">
							<button type="submit" name="edit" class="btn btn-info btn1">ACTUALIZAR DATOS</button>
							<button type="submit" name="save" class="btn btn-success btn2">CREAR NUEVO</button>
						</div>  
					</form> 
				</div>
			</div>
		</div>
  </div>
</div>
<script>
  function getRef(id) {
    let origen = document.querySelector('#origen');
    let fechap = document.querySelector('#fechap');
    let horap = document.querySelector('#horap');
    let referencia = document.querySelector('#referencia');
    let nombre = document.querySelector('#nombre');
    let reftela = document.querySelector('#reftela');
    let pinta = document.querySelector('#pinta');
    let color = document.querySelector('#color');
    let maquina = document.querySelector('#maquina');
    let proceso = document.querySelector('#proceso');
    let ubi = document.querySelector('#ubi');
    let skm = document.querySelector('#skm');
    let loi = document.querySelector('#loi');
    let lof = document.querySelector('#lof');
    let pes = document.querySelector('#pes');
    let plan = document.querySelector('#plan');
    let plat = document.querySelector('#plat');
    let pi = document.querySelector('#pi');
    let vels = document.querySelector('#vels');
    let veli = document.querySelector('#veli');
    let int = document.querySelector('#int');
    let ais = document.querySelector('#ais');
    let aii = document.querySelector('#aii');
    let cas = document.querySelector('#cas');
    let cai = document.querySelector('#cai');
    let vel = document.querySelector('#vel');
    let pre = document.querySelector('#pre');
    let tie = document.querySelector('#tie');
    let resultado = document.querySelector('#resultado');
    let dina = document.querySelector('#dina');
    let obsBox = document.querySelector('#obsBox');
    let idInput = document.querySelector('#idInput');

    params = {
			"id": id
		}
        $.ajax({
            data: params,
            url: './index.php?action=bonding-getRef',
            dataType: 'json',
            type: 'GET',
            beforeSend: function () {
                console.log('cargando');
            },
            success: function(res){
                // console.log(res);
                origen.value = res.Origen;
                fechap.value = res.Fechap;
                horap.value = res.Horap;
                referencia.value = res.Cod_Referencia;
                nombre.value = res.Nombre_Referencia;
                reftela.value = res.Ref_Tela;
                pinta.value = res.Pinta;
                color.value = res.Color;
                maquina.value = res.Maquina;
                proceso.value = res.Proceso;
                ubi.value = res.Ubicacion;
                skm.value = res.SKU;
                loi.value = res.Longitud_Inicial;
                lof.value = res.Longitud_Final;
                pes.value = res.Peso;
                plan.value = res.Grados_PFoAT800K;
                plat.value = res.Grados_Plato;
                pi.value = res.Grados_Pie;
                vels.value = res.Velocidad_Sup;
                veli.value = res.Velocidad_Inf;
                int.value = res.Intensidad;
                ais.value = res.Grados_Aire_S;
                aii.value = res.Grados_Aire_I;
                cas.value = res.Caudal_Sup;
                cai.value = res.Caudal_Inf;
                vel.value = res.Velocidad;
                pre.value = res.Presion;
                tie.value = res.Tiempo_Exp;
                resultado.value = res.Resultado;
                dina.value = res.Dinamometro;
                obsBox.value = res.Observaciones1;
                idInput.value = id;

                changeMachine(maquina);
                changeProcess(proceso);
            },
            error: function (err) {
                console.log(err);
            }
        })
  }
</script>