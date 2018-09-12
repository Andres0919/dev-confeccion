<?php
    $planta = (isset($_POST['planta']))? $_POST['planta'] : $_GET['planta'];
    $set = (isset($_POST['set']))? $_POST['set'] : $_GET['set'];
?>


<style type="text/css">


    .info p {
    text-align:center;
    color: #999;
    text-transform:none;
    font-weight:600;
    font-size:15px;
    margin-top:2px
    }

    .info i {
    color:#F6AA93;
    }

    form h1 {
    font-size: 18px;
    background: #F6AA93 none repeat scroll 0% 0%;
    color: rgb(255, 255, 255);
    padding: 22px 25px;
    border-radius: 5px 5px 0px 0px;
    margin: auto;
    text-shadow: none; 
    text-align:left
    }

    form {
    border-radius: 5px;
    max-width:400px;
    width:400px;
    margin: 5% auto;
    background-color: #FFFFFF;
    overflow: hidden;
    
    }

    p span {
    color: #F00;
    }

    p {
    margin: 0px;
    font-weight: 500;
    line-height: 2;
    color:#333;
    }

    h1 {
    text-align:center; 
    color: #666;
    text-shadow: 1px 1px 0px #FFF;
    margin:50px 0px 0px 0px
    }

    input {
    border-radius: 0px 5px 5px 0px;
    border: 1px solid #131313;
    margin-bottom: 15px;
    width: 98%;
    height: 20px;
    padding: 0px 15px;
    }

    a {
    text-decoration:inherit
    }

    .form-group {
    overflow: hidden;
    clear: both;
    }

    .icon-case {
    width: 35px;
    float: left;
    border-radius: 5px 0px 0px 5px;
    background:#eeeeee;
    height:42px;
    position: relative;
    text-align: center;
    line-height:40px;
    }

    i {
    color:#555;
    }

    .bouton-contact{
    background-color: #81BDA4;
    color: #FFF;
    text-align: center;
    width: 100%;
    border:0;
    padding: 17px 25px;
    border-radius: 0px 0px 5px 5px;
    cursor: pointer;
    margin-top: 10px;
    font-size: 18px;
    }

    .validation {
    display:none;
    margin: 0 0 10px;
    font-weight:400;
    font-size:13px;
    color: #DE5959;
    }

    #sendmessage {
    border:1px solid #fff;
    display:none;
    text-align:center;
    margin:10px 0;
    font-weight:600;
    margin-bottom:30px;
    background-color: #EBF6E0;
    color: #5F9025;
    border: 1px solid #B3DC82;
    padding: 13px 40px 13px 18px;
    border-radius: 3px;
    box-shadow: 0px 1px 1px 0px rgba(0, 0, 0, 0.03);
    }

    #sendmessage.show,.show  {
    display:block;
    }

    h3{
    text-align: center;
    }







    button {
    border: none;
    background: #3a7999;
    color: #f2f2f2;
    padding: 10px;
    font-size: 18px;
    border-radius: 5px;
    position: relative;
    box-sizing: border-box;
    transition: all 500ms ease;}
    
    textarea{
    border-radius: 10px;
    color: black;
    }

    p{float: left}


    .bt{margin: 0 auto;}

</style>

<a href="set.php"><img src="assets/img/atras.png" alt="atras" width="55" height="55" title="atrás"></a>
 
  <h1>AJUSTE HILOS</h1>
 
    <div class="contentform">

    <form style="text-align:center" style="color:black" onKeypress="if (event.keyCode == 13) event.returnValue = false;" method="post" action="./index.php?action=hilos-guardar"  >
       
        <h1 style="text-align:center">AJUSTE HILOS</h1> 
          
            <div>
            <!--    <p>PLANTA</p>        -->        
                <input type="hidden" style="width:98%" style="text-transform:uppercase;" value="<?php echo $planta; ?>" required name="planta" id="planta"  />                
            </div>

            <div>
            <!--    <p>SET</p>                -->  
                <input type="hidden" style="width:98%" style="text-transform:uppercase;" value="<?php echo $set; ?>" required name="set" id="set"  />                
            </div>

            <div>
                <p>PINTA</p>                
                <input type="text" style="width:98%" style="text-transform:uppercase;" required name="pinta" id="pinta"  />                
            </div>

            <div >
                <label>
                    <p>INSUMO</p>
                    <select name="insumos" id="insumos" style="width:98%" required>
                    <option>HILO</option>   
                    <option>NYLON</option>
                    <option>POLIESTER</option>                             
                    </select>
                </label>
            </div>

            <div>
                <label>
                    <p>CALIBRE INSUMO</p>
                    <br> <br>                   
                      <input style="width:7%" style="color:black" type="radio" name="calibre" value="TEX-18" checked> TEX-18 
                      <input style="width:7%" style="color:black" type="radio" name="calibre" value="TEX-24"> TEX-24 
                      <input style="width:7%" style="color:black" type="radio" name="calibre" value="TEX-40"> TEX-40                                              
                </label>
            </div>
            
            <br>
            <div>
                <p >REFERENCIA HILO / NYLON</p>   
                <input type="text" style="width:98%" required name="referencia" id="referencia"></input>  
            </div>  

            <div>
                <p >CONSUMO FICHA (m)</p>   
                <input type="number" step="any" style="width:98%" required name="consumo-ficha" id="consumo-ficha"></input>  
            </div>     
            
            <div>
                <p >CONSUMO REAL (M)</p>   
                <input type="number" step="any"  style="width:98%" required name="consumo-real" id="consumo-real"></input>  
            </div>   
      <button type="submit" class="bouton-contact">Guardar Datos</button>
     <?php if(isset($_GET['otro'])){ ?>
      
      <a name="enviar_2" class="btn bouton-contact" href="./index.php?view=hilos-set">Nuevo Set</a>
     <?php } ?>
    </div>
    
  </form> 
</div>  

