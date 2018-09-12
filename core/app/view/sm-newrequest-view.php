<?php
  $user = Core::$user;
  $plants = PlantData::getAll();
?>
<div class="row">
  <div class="col-md-12"> 
    <div class="card">
      <div class="card-header">
        <h4>Nueva Solicitud</h4>
      </div>
      <div class="card-content table-responsive">
        <form class="form-horizontal" role="form" method="post" action="./?action=sm-addrequest">
          <div class="row">
            <label for="inputEmail1" class="col-md-2 ">Motivo</label>
            <div class="col-md-4">
              <select name="reason" id="reason" onchange="divChange(this)" required>
                <option value="">-- SELECCIONE --</option>
                <option value="Montar Canaleta">Montar Canaleta</option>
                <option value="Desmontar Canaleta">Desmontar Canaleta</option>
                <option value="Reportar Problema">Reportar Problema</option>
              </select>
            </div>
            <label for="plant_id" class="col-md-2">Planta</label>
            <div class="col-md-3">
              <select name="plant_id" required>
                <option value="">-- SELECCIONE --</option>
                <?php foreach ($plants as $plant) { ?>
                <option value="<?php echo $plant->id ?>"><?php echo $plant->name ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div id="op1">
            <div id="aux" class="col-md-1"></div>
            <label id="nove1" class="col-lg-2 ">Novedad</label>
            <div class="col-md-3" id="nove">
              <select name="nove" id="nov">
                <option value="">-- SELECCIONE --</option>
                <option value="Terminal no enciende">Terminal no enciende</option>
                <option value="Terminal modo escritorio">Terminal modo escritorio</option>
                <option value="Terminal No cuenta">Terminal No cuenta</option>
                <option value="Terminal No corre tiempo">Terminal No corre tiempo</option>
              </select>
            </div>
            <label id="canal1" class="col-lg-1">Canaleta</label>
            <div class="col-md-2" id="canal">
              <select name="canal" id="cana">
                <option value="">-- SELECCIONE --</option>
                <?php for ($i=1; $i <= 66; $i++) { ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
            <label id="term1" class="col-lg-1">Terminal</label>
            <div class="col-md-2" id="term">
              <select name="term" id="ter">
                <option value="">-- SELECCIONE --</option>
                <?php for ($i=1; $i <= 18; $i++) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="desc">
              <textarea name="description" placeholder="Descripción"></textarea>
          </div>
          <input type="hidden" name="created_id" value="<?php echo $user->id ?>">
          <div>
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-success">Agregar Solicitud</button>
              <a href="./index.php?view=sm-requests" class="btn btn-secondary">Cancelar</a>            
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    function divChange(sel) {
    div1 = document.getElementById("op1");
    aux = document.getElementById("aux");
    cana = document.getElementById("cana");
    ter = document.getElementById("ter");
    nov = document.getElementById("nov");
    canal = document.getElementById("canal");
    canal1 = document.getElementById("canal1");
    term = document.getElementById("term");
    term1 = document.getElementById("term1");
    nove = document.getElementById("nove");
    nove1 = document.getElementById("nove1");
    switch (sel.value) {
        case "Montar Canaleta":
        case "Desmontar Canaleta":
            div1.style.display = "";
            aux.style.display = "";
            canal.style.display="";
            cana.required = "true";
            canal1.style.display="";
            term.style.display="none";
            ter.required = "";
            term1.style.display="none";
            nove.style.display="none";
            nov.required = "";
            nove1.style.display="none";
            break;
        case "Reportar Problema":
            div1.style.display = "";
            aux.style.display = "none";
            canal.style.display="";
            cana.required = "true";
            canal1.style.display="";
            term.style.display="";
            ter.required = "true";
            term1.style.display="";
            nove.style.display="";
            nov.required = "true";
            nove1.style.display="";
            break;		
        default:
            div1.style.display = "none";
            aux.style.display = "none";        
            canal.style.display="none";
            cana.required = "";
            canal1.style.display="none";
            term.style.display="none";
            ter.required = "";
            term1.style.display="none";
            nove.style.display="none";
            nov.required = "";
            nove1.style.display="none";
            break;
    }
  }
  function onLoadSelect(){
    reason = document.getElementById('reason').value;
    div1 = document.getElementById("op1");
    aux = document.getElementById("aux");
    cana = document.getElementById("cana");
    canal = document.getElementById("canal");
    canal1 = document.getElementById("canal1");
    term = document.getElementById("term");
    term1 = document.getElementById("term1");
    nove = document.getElementById("nove");
    nove1 = document.getElementById("nove1");
    switch (reason) {
        case "Montar Canaleta":
        case "Desmontar Canaleta":
        div1.style.display = "";
        aux.style.display = "";
        canal.style.display="";
        cana.required = "true";
        canal1.style.display="";
        term.style.display="none";
        ter.required = "";
        term1.style.display="none";
        nove.style.display="none";
        nov.required = "";
        nove1.style.display="none";
        break;
    case "Reportar Problema":
        div1.style.display = "";
        aux.style.display = "none";
        canal.style.display="";
        cana.required = "true";
        canal1.style.display="";
        term.style.display="";
        ter.required = "true";
        term1.style.display="";
        nove.style.display="";
        nov.required = "true";
        nove1.style.display="";
        break;		
    default:
        div1.style.display = "none";
        aux.style.display = "none";        
        canal.style.display="none";
        cana.required = "";
        canal1.style.display="none";
        term.style.display="none";
        ter.required = "";
        term1.style.display="none";
        nove.style.display="none";
        nov.required = "";
        nove1.style.display="none";
        break;
    }
  }
	onLoadSelect();
</script>

