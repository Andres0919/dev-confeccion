
<a href="./index.php?view=codigos-form"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
<div class="bt" style="text-align: center">
    <h1>Agregar</h1>
    <br><br>
    <button class="btn btn-info" style="width:10%;" onclick="window.location = './index.php?view=codigos-listAgregados'" name="listado" value="listado">LISTADO</button>
</div>

<div class="contentform">
    <form style="text-align:center" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=codigos-agregar"  >
        <h1 style="text-align:center">Agregar</h1> 
        <div>
            <p>Operacion + Codigo</p>                
            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregaroperacion" id="agregaroperacion"  />             
        </div>
        <br>
        <div>
            <p>Pieza + Codigo</p>                
            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarpieza" id="agregarpieza"  />             
        </div>
        <br>
        <div>
            <p>Maquina + Codigo</p>                
            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarmaquina" id="agregarmaquina"  />             
        </div>
        <br>
        <div>
            <p>Insumo + Codigo</p>                
            <input type="text" style="width:98%" style="text-transform:uppercase;" name="agregarinsumo" id="agregarinsumo"  />             
        </div>
        <button type="submit" class="bouton-contact" >Agregar Datos</button>         
    </form> 
</div> 