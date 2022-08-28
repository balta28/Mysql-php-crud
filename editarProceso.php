<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $genero = $_POST["txtGenero"];
    $edad = $_POST["txtEdad"];
    $cargo = $_POST["txtCargo"];
    $sueldo = $_POST["txtSueldo"];
    $codigo = $_POST["codigo"];

    $sentencia = $bd->prepare("UPDATE tb_employee SET nombre = ?, apellido = ?, genero = ?, edad = ?, cargo = ?, sueldo = ? where codigo = ?;");
    $resultado = $sentencia->execute([$nombre,$apellido,$genero, $edad, $cargo, $sueldo, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>