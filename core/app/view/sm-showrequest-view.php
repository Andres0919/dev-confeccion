<?php 
  $request = RequestData::getById($_GET["id"]);
  $plant = $request->getPlant();
  $comments = CommentData::getAll($_GET["id"]);
?>
<div class="row">
	<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4>Solicitud</h4>
      </div>
      <div class="card-content table-responsive form-horizontal">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Motivo</label>
          <div class="col-lg-3">
            <span name="title" id="reason" class="form-control" ><?php echo $request->reason; ?></span>
          </div>
          <label for="inputEmail1" class="col-lg-2 control-label">Planta</label>
          <div class="col-lg-3">
            <span name="title" class="form-control" ><?php echo $plant->name; ?></span>
          </div>
        </div>
        <div class="form-group" id="op1">
          <div id="aux" class="col-md-1"></div>
          <label id="nove1" class="col-lg-2">Novedad</label>
          <div class="col-lg-3" id="nove">
            <span name="title" class="form-control" ><?php echo $request->nove; ?></span>
          </div>
          <label id="canal1" class="col-lg-1 ">Canaleta</label>
          <div class="col-md-2" id="canal">
            <span name="title" class="form-control" ><?php echo $request->canal; ?></span>
          </div>
          <label id="term1" class="col-lg-1">Terminal</label>
          <div class="col-md-2" id="term">
            <span name="title" class="form-control" ><?php echo $request->term; ?></span>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
          <div class="col-lg-8">
           <p class="form-control" name="description" placeholder="Descripcion"><?php echo $request->description;?></p>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Comentarios</label>
          <div class="col-lg-6">
            <?php if (count($comments)>0){ ?>
            <?php foreach ($comments as $comment) { ?>
            <span class="form-control"><?php echo $comment->description; ?></span>
            <?php } ?>
            <?php }else{ ?>
            <span class="form-control text-danger">No hay comentarios</span>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button onclick="goBack()" class="btn btn-secondary" >Volver</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
<script>
  function onLoadSelect(){
      reason = document.getElementById('reason').innerHTML;
      div1 = document.getElementById("op1");
      aux = document.getElementById("aux");
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
          canal1.style.display="";
          term.style.display="none";
          term1.style.display="none";
          nove.style.display="none";
          nove1.style.display="none";
          break;
      case "Reportar Problema":
          div1.style.display = "";
          aux.style.display = "none";
          canal.style.display="";
          canal1.style.display="";
          term.style.display="";
          term1.style.display="";
          nove.style.display="";
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
