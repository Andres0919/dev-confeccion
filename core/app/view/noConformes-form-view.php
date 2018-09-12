<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>NO CONFORMES </h4>
        </div>
        <main>
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">AGREGAR</label>
            <div class="btns-right">
              <a class="btn btn-success" href = './index.php?view=noConformes-listadoNC' name="listado" >LISTADO</a>
            </div>
            <section id="content1">
                <div class="contentform">
                    <form onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=noConformes-guardar">
                        <div class="plantas">
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
                            <label class="radio inline">
                                    <input type="radio" name="planta" value="Corte"> 
                                    <span>Corte</span>                         
                            </label>
                        </div>               
                        <div>
                            <label>
                                <p>CATEGORÍA</p>
                                <select id="primary" style="width:98%"  required  name="categoria" onchange="funtion(this.value)">
                                    <option selected></option>
                                    <option value="molderia">MOLDERIA</option>
                                    <option value="fic">FIC</option>
                                    <option value="hilos">HILOS</option> 
                                    <option value="ficha_tecnica">FICHA TECNICA</option>
                                </select>
                            </label>
                        </div> 
                        <div>
                            <label>
                                <p>ÍTEM</p>
                                <select id="secondary" required style="width:98%" name="item">

                                </select>
                            </label>
                        </div>    
                        <div >
                            <label>
                                <p>MARCA</p>
                                <select name="marca" style="width:98%" required>
                                    <option selected></option>
                                    <option value="Andrea">ANDREA</option>   
                                    <option value="Baby fresh">BABY FRESH</option>
                                    <option value="Casino">CASINO</option> 
                                    <option value="Galax">GALAX</option>  
                                    <option value="Gef">GEF</option> 
                                    <option value="Liverpool">LIVERPOOL</option>  
                                    <option value="Michael kors">MICHAEL KORS</option>
                                    <option value="Nordstrom">NORDSTROM</option> 
                                    <option value="Punto blanco">PUNTO BLANCO</option>  
                                    <option value="Voury">VOURY</option>                
                                </select>
                            </label>
                        </div>
                        <div>
                            <p>REFERENCIA</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="referencia" id="referencia"  />                
                        </div>
                        <div>
                            <label>
                                <p>FAMILIA</p>
                                <select name="familia" style="width:98%" required>
                                    <option selected></option>
                                    <option value="Boxer">BOXER MASC</option>   
                                    <option value="Brassier">BRASSIER</option>
                                    <option value="Camisetas">CAMISETAS</option> 
                                    <option value="Chaquetas">CHAQUETAS</option>  
                                    <option value="Mamelucos/Bodys">MAMELUCOS/ BODYS</option> 
                                    <option value="Pantaloncillos">PANTALONCILLOS</option>  
                                    <option value="Panta/Berm/Short">PANTALONES/ BERMUDAS/ SHORT</option>
                                    <option value="Panties/Boxer/Cucos">PANTIES/ BOXER/ CUCOS</option> 
                                    <option value="Polos">POLOS</option>  
                                    <option value="Tops">TOPS</option>    
                                    <option value="Faldas">FALDAS</option>              
                                </select>
                            </label>
                        </div>
                        <div>
                            <p >OBSERVACIONES</p>   
                            <textarea style="width:98%" name="observaciones" ></textarea>  
                        </div>        
                        <div>
                            <p >NOMBRE DEL RESPONSABLE</p>   
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="nombre" id="nombre"  />
                        </div>   
                        <button type="submit" class="btn btn-success col-md-12">Guardar Datos</button>
                    </form> 
                </div>
            </section>
        </main>
    </div>
</div>