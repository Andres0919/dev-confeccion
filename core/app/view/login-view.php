<?php

	if(Session::getUID()!=""){
		print "<script>window.location='index.php?view=home';</script>";
	}
?>

<div class="login-container">
  <section class="login" id="login">
    <header>
      <h2>Web Confecciones</h2>
      <h4>Iniciar</h4>
    </header>
    <form class="login-form" action="./index.php?action=processlogin" method="post">
      <input type="text" placeholder="Usuario" class="login-input" name="nombre" required autofocus/>
      <input type="password" placeholder="Contraseña" class="login-input" name="pass" required/>
      <div class="submit-container">
        <button type="submit" class="btn btn-success">Iniciar</button>
        <a class="btn btn-info" href="/seguimiento_referencia">Seguimiento referencia</a>
      </div>
    </form>
  </section>
</div>
<div class="img">
	<img src="assets/img/crystal.png" >
</div> 

