<?php 
    $user = Core::$user;
?>

<?php if ($user->Nombre == 'consulta') { ?>
    <a href="./index.php?view=codigos-form"><img src="assets/img/atras.png" alt="descargar" width="55" height="55" title="atrás"></a>
<?php }else{ ?>
    <a href="./index.php?view=codigos-form"><img src="assets/img/atras.png" alt="descargar" width="55" height="55" title="atrás"></a>
<?php } ?>
<div class="contentform">
    <h1>Interpretar Codigo</h1>
    <form style="text-align:center" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?view=codigos-interpretado" >
        <h1 style="text-align:center">Interpretar Codigo</h1> 
        <div>
            <br>
            <?php $var="ESTRUCTURA DE UN CODIGO: \n-operacion:AA  -pieza:AA     -maquina:AAA \n-trayecto:1    -condicion:1  -geometria:1 \n-corte:1       -insumo:A|1     -tipoTela:1"  ?>                                                            
            <textarea style="width:98%;height:80px;" name="observaciones"  readonly="readonly" > <?php echo $var ?> </textarea>  
        </div>
        <div>
            <p>CODIGO</p>                
            <input type="text" style="width:98%" required name="codigo" id="codigo" minlength="13" maxlength="13"/>                
        </div>       
        <button type="submit" class="bouton-contact" >Interpretar</button>
    </form> 
</div> 
