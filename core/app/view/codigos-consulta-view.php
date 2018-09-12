<?php
    $user = Core::$user;
    $codigos = CodigosData::getAllAgregar();
?>
<?php if ($user->Nombre =='consulta') { ?>
    <a href="./index.php?view=codigos-form"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
<?php }else{ ?>
    <a href="./index.php?view=codigos-form"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
<?php } ?>
<div class="contentform">
    <br>
    <h1>Codigos</h1>
    <form style="text-align:center" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?view=codigos-listado-consulta">
        <h1 style="text-align:center">Códigos</h1> 
        <div>
            <label>
                <p>OPERACIÓN </p>
                <input type="text"  list="operacion" autocomplete="off" required name="operacion" >
                <datalist id="operacion" name="operacion" style="width:95%" style="height: 20%" required >
                    <option></option>
                    <?php foreach($codigos as $codigo){ ?>
                        <?php $res = explode('+', $codigo->OperacionCodigo ); ?>
                        <option text="<?php echo $res[1];?>" value="<?php echo $res[0];?>" ><?php echo $res[1];?> </option>
                    <?php } ?>                                                                      
                </datalist>
            </label>
        </div> 
        <div>
            <label>
                <p>PIEZA </p>
                <input type="text" list="pieza" name="pieza" autocomplete="off" required >
                <datalist id="pieza" name="pieza" style="width:95%" style="height: 20%" required>
                    <option selected></option>
                    <?php foreach($codigos as $codigo){ ?>
                        <?php $res = explode('+', $codigo->PiezaCodigo ); ?>
                        <option text="<?php echo $res[1];?>" value="<?php echo $res[0];?>" ><?php echo $res[1];?> </option>
                    <?php } ?>
                </datalist>
            </label>
        </div>                               
        <button type="submit" class="bouton-contact" >Consultar</button>  
    </form> 
</div> 
