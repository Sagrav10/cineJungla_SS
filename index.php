<?php 


include_once 'controlador/user.php';
include_once 'controlador/user_Sesion.php';


$userSession = new UserSession();
$user = new Usuario();

if(isset($_SESSION['user'])){
	$user->setUser($userSession->getCurrentUser());
	$tipo=$user->getTipoUsuario();
		if($tipo==2){
		header('location: tablaProductos.php');
		}else if($tipo==1){
			echo "mandar a la de director ";
		}else if($tipo==6){
			echo "mandar a la de global";
		}
	
}else if(isset($_POST['username']) && isset($_POST['password'])){
	$userForm = $_POST['username'];
	$passForm = $_POST['password'];

	if($user->existe($userForm,$passForm)){
		echo "usuario validado";
		$userSession->setCurrentUser($userForm);
		$user->setUser($userForm);
		if($tipo==2){
		header('location: tablaProductos.php');
		}else if($tipo==1){
			echo "mandar a la de director ";
		}else if($tipo==6){
			echo "mandar a la de global";
		}

	}else{
		$errorEntrada="nombre de usuario o contraseña incorrecto";
		include_once 'login.php';
	}
}else{

	include_once 'login.php';
}
 

 ?>


