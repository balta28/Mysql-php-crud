<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtGenero"]) || empty($_POST["txtEdad"]) || empty($_POST["txtCargo"]) || empty($_POST["txtSueldo"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $genero = $_POST["txtGenero"];
    $edad = $_POST["txtEdad"];
    $cargo = $_POST["txtCargo"];
    $sueldo = $_POST["txtSueldo"];
    
    $sentencia = $bd->prepare("INSERT INTO tb_employee(nombre,apellido,genero,edad,cargo, sueldo) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$genero, $edad, $cargo, $sueldo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>