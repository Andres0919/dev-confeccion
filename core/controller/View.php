<?php

// View.php
// @brief Una vista corresponde a cada componente visual dentro de un modulo.

class View {
	/**
	* @function load
	* @brief la funcion load carga una vista correspondiente a un modulo
	**/	
	public static function load($view){
		// Module::$module;}
			if (isset($_SESSION['user']) || $view != 'login' ) {
				if(!isset($_GET['view'])){
					include "core/app/view/".$view."-view.php";
				}else{
					if(View::isValid()){
						$sm = strpos($_GET['view'], "sm-");
						if($sm !== false && Core::$user->Categoria == 1){
							$url = "core/app/layouts/sm-menu.php";
							include $url;					
						}
							$url = "core/app/view/".$_GET['view']."-view.php";
						include $url;
					}else{
						View::Error("<b>404 NOT FOUND</b> Vista <b>".$_GET['view']."</b>");
					}
				}
			}else{
				include "core/app/view/login-view.php";
			}
	}

	/**
	* @brief valida la existencia de una vista
	**/	
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			$url ="";
			if(Core::$root==""){
			$url = "core/app/view/".$_GET['view']."-view.php";
			}else if(Core::$root=="admin/"){
			$url = "core/app/".Core::$theme."/view/".$_GET['view']."-view.php";				
			}
			if(file_exists($file = $url)){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}
}
?>