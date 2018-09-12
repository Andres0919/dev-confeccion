<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>AJUSTES INSUMOS </h4>
        </div>
        <main>
            <input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1">SESGOS/ELÁSTICOS</label>
            <div class="btns-right">
                <a class="btn btn-success" href = './index.php?view=sesgos-listado' name="listado" >LISTADO</a>
            </div>
            <section id="content1">
                <div class="contentform">
                    <form style="text-align:center" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=sesgos-guardar"  >
                        <div>
                            <p>PLANTA</p>                        
                            <label class="radio inline">  
                                    <input type="radio" name="planta" value="Sabaneta" checked> 
                                    <span>Sabaneta</span>
                            </label>
                            <label class="radio inline">
                                    <input type="radio" name="planta" value="Manizales"> 
                                    <span>Manizales</span>
                            </label>
                            <label class="radio inline">
                                    <input type="radio" name="planta" value="Pereira"> 
                                    <span>Pereira</span>
                            </label>
                        </div>     
                        <div class="form-title">
                            <p style="padding-left:15px;">INSUMO</p> 
                            <label>               
                                <select name="insumo" id="insumo" style="width:98%" required>
                                    <option>SESGO</option>   
                                    <option>ELÁSTICO</option>
                                </select> 
                            </label>              
                        </div>
                        <br>
                        <div class="form-title">
                            <p style="padding-left:15px;">RECIPIENTE</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="recipiente" id="recipiente"  />                
                        </div>
                        <div class="form-title">           
                            <p style="padding-left:15px;">NOMBRE REFERENCIA</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="nombre_ref" id="nombre_ref"  />    
                            <p style="padding-left:15px;">CODIGO REFERENCIA</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="cod_ref" id="cod_ref"  />            
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">COLOR</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="nombre_pinta" id="nombre_pinta"  />    
                            <p style="padding-left:15px;">CODIGO PINTA</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="cod_pinta" id="cod_pinta"  />                
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">TALLA DE LA PRENDA</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="talla" id="talla"  />                
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">SKU</p>                
                            <input type="number" style="width:98%" style="text-transform:uppercase;" required name="sku" id="sku"  />                
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">UNIDADES BONGO</p>                
                            <input type="number" style="width:98%" style="text-transform:uppercase;" required name="und_bongo" id="und_bongo"  />                
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">UNIDADES FALTANTES</p>                
                            <input type="number" style="width:98%" style="text-transform:uppercase;" required name="und_faltantes" id="und_faltantes"  />                
                        </div>
                        <div class="form-title">
                            <p style="padding-left:15px;">CANTIDAD REQUERIDA (METROS)</p>                
                            <input type="number" style="width:98%" style="text-transform:uppercase;" required name="cantidad" id="cantidad"  />                
                        </div>
                        <div class="form-title">
                            <label>
                                <p style="padding-left:15px;">PROBLEMATICA</p>
                                <br> <br> 
                                <select name="problematica" id="problematica" style="width:98%" required>
                                    <option></option>
                                    <option>DESPERDICIO POR OPERARIO</option>
                                    <option>MONTAJE</option>
                                    <option>ARREGLO MAQUINARIA</option>
                                    <option>CONSUMO EQUIVOCADO</option>
                                    <option>MAQUINARIA DAÑADA </option>
                                    <option>REPROCESO</option>
                                    <option>CALIDAD</option>
                                </select>                             
                            </label>
                        </div>
                        <div class="btnSucc">
                            <button type="submit" class="btn btn-success col-md-6">Guardar Datos</button>
                        </div>
                    </form> 
                </div>
            </section>
        </main>
    </div>
</div>