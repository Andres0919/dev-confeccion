<?php
// define('LBROOT',getcwd()); // LegoBox Root ... the server root
// include("core/controller/Database.php");

if(Session::getUID()=="") {
	if(isset($_POST['nombre']) && isset($_POST['pass'])){
		$login = new UserData();
		$login->Nombre = $_POST['nombre'];
		$login->pass = $_POST['pass']; 
		$user = $login->login();
		if(isset($user)){
			if($user->estado == 1){
				if($user->Pass == $login->pass){
					$login->actividad();
					$_SESSION['user'] = $user->id;
					print "Cargando ... $user->Nombre";
					print "<script>window.location='index.php?view=home';</script>";
						
				}else{
				echo"      
					<script>
					alert('error, no coincide la contraseña');
					window.location='./index.php?view=login';
					</script>";
				}
			}else{
				echo"      
				<script>
					alert('error, el usuario no esta activo');
					window.location='./index.php?view=login';
				</script>";
			}
		}else{
			echo"      
			<script>
				alert('error, no existe usuario');
				window.location='./index.php?view=login';
			</script>";
		}
	}else{
		echo"      
		<script>
			window.location='./index.php?view=login';
		</script>";	
	}
}
?>