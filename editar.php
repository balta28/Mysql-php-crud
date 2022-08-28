<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from tb_employee where codigo = ?;");
    $sentencia->execute([$codigo]);
    $bd_miempresa = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $bd_miempresa->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" required 
                        value="<?php echo $bd_miempresa->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtGenero" required 
                        value="<?php echo $bd_miempresa->genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" autofocus required
                        value="<?php echo $bd_miempresa->edad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cargo: </label>
                        <input type="text" class="form-control" name="txtCargo" required 
                        value="<?php echo $bd_miempresa->cargo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sueldo: </label>
                        <input type="number" class="form-control" name="txtSueldo" autofocus required
                        value="<?php echo $bd_miempresa->sueldo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $bd_miempresa->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>