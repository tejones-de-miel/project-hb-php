<?php
    session_start();
    include_once '../classes/clsCliente.php';
    include_once '../classes/clsEmpleado.php';
    if(empty($_POST) && !isset($_SESSION['usuario'])){
        header("Location: ../login.html"); #El .html es provisional en tanto no se haya puesto una validacion de la sesion 
    }
    else{
        $usuario = $_POST['usuario'];
        $contra = $_POST['contra'];
        
    }
?>