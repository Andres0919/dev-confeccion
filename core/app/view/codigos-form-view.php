<?php 
    $user = Core::$user;
    $operacion = OperacionData::getAll();
    $pieza = PiezaData::getAll();
    $maquina = MaquinaData::getAll();
    $insumo = InsumoData::getAll();

    if (isset($_GET['co'])) {
        $codigo_splited = str_split($_GET['co']);
        $codigo = new CodigosData();
        $codigo->operacion = $codigo_splited[0].$codigo_splited[1];
        $codigo->pieza = $codigo_splited[2].$codigo_splited[3];
        $codigo->maquina = $codigo_splited[4].$codigo_splited[5].$codigo_splited[6];
        $codigo->costura = $codigo_splited[7];
        $codigo->ctela = $codigo_splited[8];
        $codigo->geometria = $codigo_splited[9];
        $codigo->corte = $codigo_splited[10];
        $codigo->insumo = $codigo_splited[11];
        $codigo->ttela = $codigo_splited[12];

        $result = $codigo->getSimilars();
        
        $c = new stdClass();
        $codigos_valor = [];
        foreach ($result as $r ) {
            
            $count = 0;
            $codigo_splited = str_split($r->Codigo);

            if (count($codigo_splited) == 13) {
                $c->operacion = $codigo_splited[0].$codigo_splited[1];
                $c->pieza = $codigo_splited[2].$codigo_splited[3];
                $c->maquina = $codigo_splited[4].$codigo_splited[5].$codigo_splited[6];
                $c->costura = $codigo_splited[7];
                $c->ctela = $codigo_splited[8];
                $c->geometria = $codigo_splited[9];
                $c->corte = $codigo_splited[10];
                $c->insumo = $codigo_splited[11];
                $c->ttela = $codigo_splited[12];

                if($c->operacion == $codigo->operacion){
                    $count++;
                }
                if($c->pieza == $codigo->pieza){
                    $count++;
                }
                if($c->maquina == $codigo->maquina){
                    $count++;
                }
                if($c->costura == $codigo->costura){
                    $count++;
                }
                if($c->ctela == $codigo->ctela){
                    $count++;
                }
                if($c->geometria == $codigo->geometria){
                    $count++;
                }
                if($c->corte == $codigo->corte){
                    $count++;
                }
                if($c->insumo == $codigo->insumo){
                    $count++;
                }
                if($c->ttela == $codigo->ttela){
                    $count++;
                }
                
                array_push($codigos_valor, array($r->Codigo ,$count));
            }
        }
    }
?>
<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>CÓDIGOS </h4>
		</div>
		<main>
            <input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">GENERAR CÓDIGO</label>
			<input id="tab2" type="radio" name="tabs">
			<label for="tab2">CONSULTAR</label>
			<input id="tab3" type="radio" name="tabs">
            <label for="tab3">INTERPRETAR CÓDIGO</label>
            <?php if($user->Categoria == 1){ ?>
                <input id="tab4" type="radio" name="tabs">
                <label for="tab4">AGREGAR</label>
            <?php } ?>
            <div class="btns-right">
                <a class="btn btn-success" href = './index.php?view=codigos-listado' name="listado" value="listado">LISTADO</a>
            </div>            
            <section id="content1"><!-- GENERAR CÓDIGO -->
                <?php if($user->Nombre == "consulta"){ ?>
                <div class="img"> 
                    <img src="assets/img/consulta.png" >
                </div>
                <?php }else{ ?>
                <div class="contentform">
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=codigos-generar"  >
                        <div>
                            <label>
                                <p>OPERACIÓN </p>
                                <input type="text"  list="operacion" id="searchope" autocomplete="off" value="<?php echo (isset($_GET['op']))? $_GET['op'] : '' ?>" required name="operacion">
                                    <datalist id="operacion" class="scrollable" name="operacion" required >
                                        <option></option>
                                        <?php foreach($operacion as $res){ ?>
                                            <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                        <?php } ?>
                                    </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>PIEZA </p>
                                <input type="text" list="pieza" name="pieza" autocomplete="off" value="<?php echo (isset($_GET['pi']))? $_GET['pi'] : '' ?>" required >
                                <datalist id="pieza" name="pieza" required>
                                    <option selected></option>
                                    <?php foreach($pieza as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>
                                </datalist>
                            </label>
                        </div>  
                        <div>
                            <label>
                                <p>MÁQUINAS </p>
                                <input type="text" list="maquina" name="maquina" autocomplete="off" value="<?php echo (isset($_GET['ma']))? $_GET['ma'] : '' ?>" required >
                                <datalist id="maquina" name="maquina" required>
                                    <option selected></option>
                                    <?php foreach($maquina as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>      
                                </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>TRAYECTO DE COSTURA </p>
                                <input type="text" list="trayecto" name="trayecto" value="<?php echo (isset($_GET['tr']))? $_GET['tr'] : '' ?>" autocomplete="off" required >
                                <datalist id="trayecto" name="trayecto" required>
                                    <option selected></option>
                                    <option value="PEQUEÑO">1</option>
                                    <option value="MEDIANO">2</option>   
                                    <option value="GRANDE">3</option>
                                    <option value="NO APLICA">4</option>                   
                                </datalist>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p>CONDICIONES TELA </p>
                                <input type="text" list="condiciones" name="condiciones" value="<?php echo (isset($_GET['te']))? $_GET['te'] : '' ?>" autocomplete="off" required >
                                <datalist id="condiciones" name="condiciones" required>
                                    <option selected></option>
                                    <option value="FONDO">1</option>
                                    <option value="RAYAS">2</option>   
                                    <option value="NO APLICA">3</option>                                      
                                </datalist>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p>GEOMETRÍA PIEZA </p>
                                <input type="text" list="geopieza" name="geopieza" autocomplete="off" value="<?php echo (isset($_GET['ge']))? $_GET['ge'] : '' ?>" required >
                                <datalist id="geopieza" name="geopieza" required>
                                    <option selected></option>
                                    <option value="RECTO">1</option>
                                    <option value="CURVA">2</option>   
                                    <option value="NO APLICA">0</option>
                                </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>CORTE DE LA PIEZA </p>
                                <input type="text" list="corte" name="corte" autocomplete="off" value="<?php echo (isset($_GET['cor']))? $_GET['cor'] : '' ?>" required >
                                <datalist id="corte" name="corte" required>
                                    <option selected></option>
                                    <option value="ABIERTO">1</option>
                                    <option value="TUBULAR">2</option>   
                                    <option value="NO APLICA">3</option>                  
                                </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>INSUMO </p>
                                <input type="text" list="insumo" name="insumo" value="<?php echo (isset($_GET['in']))? $_GET['in'] : '' ?>" autocomplete="off" required >
                                <datalist id="insumo" name="insumo" required>
                                    <option selected></option>
                                    <?php foreach($insumo as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>         
                                </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>TIPO DE TELA </p>
                                <input type="text" list="tipotela" name="tipotela" value="<?php echo (isset($_GET['ti']))? $_GET['ti'] : '' ?>" autocomplete="off" required >
                                <datalist id="tipotela" name="tipotela" required>
                                    <option selected></option>
                                    <option value="ESTÁNDAR">1</option>
                                    <option value="ESPECIAL">2</option>   
                                    <option value="NO APLICA">3</option>                                     
                                </datalist>
                            </label>
                        </div>
                        <?php if(isset($_GET['co'])){ ?>
                        <div>
                            <label>
                                <p>CÓDIGO GENERADO: <?php echo strlen($_GET['co']) ?> Carácteres </p>
                                <input class="cod" style="color:red" name="codigo" id="resultado" value="<?php echo $_GET['co'] ?>" readonly minlength="13" inxlength="13">
                            </label>
                            <div class="similars">
                            <?php $origin = str_split($_GET['co']);
                                foreach ($codigos_valor as $valor) {
                                    if($valor[1] >= 8){ ?>
                                        <p>
                                        <?php $opcion = str_split($valor[0]);
                                            if($opcion[0] == $origin[0] && $opcion[1] == $origin[1]){ ?>
                                                    <span><?php echo $opcion[0].$opcion[1]; ?></span> 
                                            <?php }else{
                                                echo $opcion[0].$opcion[1];
                                            }
                                        ?>
                                        tiene <?php echo $valor[1] ?> items similares</p>
                                <?php }
                                }    
                            ?>
                            </div>
                            <div class="form-group">
                                <label>
                                    <p>REFERENCIA </p>
                                    <input type="text" list="referencia" name="referencia" value="<?php echo (isset($_GET['rf']))? $_GET['rf'] : '' ?>" autocomplete="off" required >                  
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>
                                <p>DESCRIPCIÓN </p>
                                <textarea style="width:98%; heigt:10px"  list="descripcion" name="descripcion" autocomplete="off" required ><?php echo (isset($_GET['d']))? $_GET['d'] : '' ?></textarea>              
                            </label>
                        </div>
                        <div class="btnSucc">
                        <?php if(isset($_GET['id']) && $_GET['id'] != ''){ ?> 
                            <button type="submit" class="btn btn-success col-md-5 my-5" name="update" >ACTUALIZAR DATOS</button>
                        <?php }else{ ?>
                            <button type="submit" class="btn btn-success col-md-5 my-5" name="save" >GUARDAR DATOS</button>
                        <?php } ?>                     
                            <a href="./index.php?view=codigos-form" class="btn btn-default col-md-4">CANCELAR</a>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo (isset($_GET['id']))? $_GET['id'] : '' ?>">
                        <div class="btnSucc">
                            <button type="submit" name="generate" class="btn btn-success col-md-10 ">GENERAR CÓDIGO</button>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </section>
            <section id="content2"><!-- CONSULTAR OPERACIÓN PIEZA -->
                <div class="contentform">
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?view=codigos-listado">
                        <div>
                            <label>
                                <p>OPERACIÓN </p>
                                <input type="text"  list="operacion" autocomplete="off"  name="operacion">
                                <datalist id="operacion" name="operacion">
                                    <option></option>
                                    <?php foreach($operacion as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>                                                                      
                                </datalist>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>PIEZA </p>
                                <input type="text" list="pieza" name="pieza" autocomplete="off">
                                <datalist id="pieza" name="pieza">
                                    <option selected></option>
                                    <?php foreach($pieza as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>
                                </datalist>
                            </label>
                        </div>
                        <div>
                            <label>
                                <p>MÁQUINA</p>
                                <input type="text" list="maquina" name="maquina" autocomplete="off">
                                <datalist id="maquina" name="maquina">
                                    <option selected></option>
                                    <?php foreach($maquina as $res){ ?>
                                        <option text="<?php echo $res->codigo;?>" value="<?php echo $res->nombre;?>" ><?php echo $res->codigo;?> </option>
                                    <?php } ?>
                                </datalist>
                            </label>
                        </div> 
                        <div class="btnSucc">                              
                            <button type="submit" name="consulta" class="btn btn-success col-md-6" >CONSULTAR</button>  
                        </div>
                    </form> 
                </div> 
            </section>
            <section id="content3"><!-- INTERPRETAR CÓDIGO -->
                <div class="contentform">
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?view=codigos-interpretado" >
                        <div>
                            <br>
                            <?php $var="ESTRUCTURA DE UN CÓDIGO: \n-operación:AA  -pieza:AA     -máquina:AAA \n-trayecto:1    -condición:1  -geometría:1 \n-corte:1       -insumo:A|1     -tipoTela:1"  ?>                                                            
                            <textarea name="observaciones"  readonly="readonly" > <?php echo $var ?> </textarea>  
                        </div>
                        <div>
                            <p>CÓDIGO</p>                
                            <input type="text" required name="codigo" id="codigo" minlength="13" maxlength="13"/>                
                        </div>       
                        <div class="btnSucc">
                            <input type="submit" class="btn btn-success"  value="ENVIAR"/>
                        </div>
                    </form> 
                </div> 
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTtile">INTERPRETACIÓN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>         
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <th>CÓDIGO INTERPRETADO</th>
                                        <td><span id="code"></span></td>                   
                                    </tr>
                                    <tr>
                                        <th>OPERACIÓN</th>
                                        <td><span id="ope"></span></td>
                                    </tr>
                                    <tr>
                                        <th>PIEZA</th>
                                        <td><span id="pie"></span></td>
                                    </tr>
                                    <tr>
                                        <th>MÁQUINA</th>
                                        <td><span id="maq"></span></td>
                                    </tr>
                                    <tr>
                                        <th>TRAYECTO DE TELA</th>
                                        <td><span id="tra"></span></td>
                                    </tr>
                                    <tr>
                                        <th>CONDICIÓN DE LA TELA</th>
                                        <td><span id="con"></span></td>
                                    </tr>
                                    <tr>
                                        <th>GEOMETRÍA DE LA PIEZA</th>
                                        <td><span id="geo"></span></td>
                                    </tr>
                                    <tr>
                                        <th>CORTE DE LA PIEZA</th>
                                        <td><span id="cor"></span></td>
                                    </tr>
                                    <tr>
                                        <th>INSUMO</th>
                                        <td><span id="ins"></span></td>
                                    </tr>
                                    <tr>
                                        <th>TIPO DE TELA</th>
                                        <td><span id="tel"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content4"><!-- AGREGAR -->
                <div class="contentform">
                    <button class="btn btn-info" onclick="window.location = './index.php?view=codigos-listAgregados'" name="listado" value="listado">LISTADO</button>
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=codigos-agregar"  >
                        <div>
                            <p>OPERACIÓN+CÓDIGO</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregaroperacion" id="agregaroperacion"  />             
                        </div>
                        <br>
                        <div>
                            <p>PIEZA+CÓDIGO</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarpieza" id="agregarpieza"  />             
                        </div>
                        <br>
                        <div>
                            <p>MÁQUINA+CÓDIGO</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarmaquina" id="agregarmaquina"  />             
                        </div>
                        <br>
                        <div>
                            <p>INSUMO+CÓDIGO</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarinsumo" id="agregarinsumo"  />             
                        </div>
                        <div class="btnSucc">
                            <button type="submit" class="btn btn-success col-md-6" >AGREGAR DATOS</button>         
                        </div>
                    </form> 
                </div> 
            </section>
        </main>
    </div>
</div>
<style>
.scrollable {
    
    height:50px !important;
   max-height:80px !important;
   overflow-y:auto;
}
</style>
<script>
// var search = document.querySelector('#searchope');
// var results = document.querySelector('#operacion');
// var templateContent = document.querySelector('#ope').content;
// search.addEventListener('keyup', function handler(event) {
//     while (results.children.length) results.removeChild(results.firstChild);
//         var inputVal = new RegExp(search.value.trim(), 'i');
//         var clonedOptions = templateContent.cloneNode(true);
//         var set = Array.prototype.reduce.call(clonedOptions.children, function searchFilter(frag, el) {
//         if (inputVal.test(el.value) && frag.children.length < 10) frag.appendChild(el);
            
//             return frag;
//     }, document.createDocumentFragment());
//     results.appendChild(set);
// });
</script>    

