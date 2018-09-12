<?php


// 13 de Abril del 2014
// Module.php
// @brief tareas que se realizan con modulos.

class Module {
	public static function loadLayout(){
		if(Core::$root==""){
			$_GET['view'] = isset($_GET['view']) ? $_GET['view'] : 'home';
			include "core/app/layouts/layout.php";
		}else if(Core::$root=="admin/"){
			include "core/app/".Core::$theme."/layouts/layout.php";
		}
	}
}



?>
