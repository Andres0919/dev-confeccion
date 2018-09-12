<div class="secc">
	<div class="card">
		<div class="card-header">
			<h4>AJUSTE HILOS </h4>
        </div>
        <main>
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1">HILOS</label>
            <div class="btns-right">
                <a class="btn btn-success" href = './index.php?view=hilos-listado' name="listado" value="listado">LISTADO</a>  
            </div>
            <section id="content1">    
                <div class="contentform">
                    <form style="text-align:center" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?view=hilos-datos"  >
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
                        <div>
                            <p>SET</p>                
                            <input type="text" style="width:98%" style="text-transform:uppercase;" required name="set" id="set"  />                
                        </div>
                        <div class="btnSucc">        
                            <button type="submit" class="btn btn-success col-md-6" >Agregar Datos</button>
                        </div>
                    </form> 
                </div>
            </section>
        </main>
    </div>
</div>