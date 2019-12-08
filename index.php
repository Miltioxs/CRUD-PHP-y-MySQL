<!DOCTYPE html>
<?php
include('conexion.php');
$con = conectar();
if ($con){
    echo 'Conexion exitosa';
}else{
    echo 'Conexion fallida';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD PHP & MySQL</title>
    <link href='css/bootstrap.min.css' rel="stylesheet">
</head>
<body>
    <div class='col-md-8 col-md-offset-2'>
    <h1>CRUD CON PHP & MySQL</h1>

    <form action="index.php" method="post">

        <div class='form-group'>
            <label>Nombre:</label>
            <input type='text' name= 'nombre' class='form-control' placeholder="Escriba su nombre"><br/>
        </div>

        <div class='form-group'>
            <label>Contraseña:</label>
            <input type='text' name= 'pass' class='form-control' placeholder="Escriba su contraseña"><br/>
        </div>

        <div class='form-group'>
            <label>Email:</label>
            <input type='text' name= 'email' class='form-control' placeholder="Escriba su email"><br/>
        </div>

        <div class='form-group'>
            <input type='submit' name= 'insert' class='btn btn-warning'value="Insertar datos"><br/>
        </div>

    </form>
    </div>
<br/><br/><br/>
<?php
//Insertar Datos

if  (isset($_POST['insert'])){
    $usuario = $_POST['nombre'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    $insertar = "INSERT INTO usuarios (usuario,pass,email) VALUES ('$usuario', '$pass', '$email') " ;
    $ejecutar = mysqli_query($con, $insertar); 

    if ($ejecutar){
        echo '<h3>Insertado correctamente</h3>';

    }
}
?>
<div class='col-md-8 col-md-offset-2'>
    <table class='table table-bordered table-resposive'>
        <tr>
            <td>ID</td>
            <td>usuario</td>
            <td>Password</td>
            <td>Email</td>
            <td>Accion</td>
            <td>Accion</td>
        </tr>

        <?php

        //Mostrar Datos
        $consulta= 'SELECT * FROM usuarios';
        $ejecutar= mysqli_query($con, $consulta);

        $i = 0 ; 

        while ($fila = mysqli_fetch_array($ejecutar)){
            $id= $fila['id'];
            $usuario =$fila['usuario'];
            $pass = $fila['pass'];
            $email=$fila['email'];

            $i++ ; 
        
        ?>

        <tr align='center'>
            <td><?php echo $id?></td>
            <td><?php echo $usuario?></td>
            <td><?php echo $pass?></td>
            <td><?php echo $email?></td>
            <td><a href='index.php?editar=<?php echo $id;?>'>Editar</a></td>
            <td><a href='index.php?borrar=<?php echo $id;?>'>Borrar</a></td>
        </tr>
        <?php } ?>

    


    </table>

</div>
<?php
//Actualizar Datos
if (isset($_GET['editar'])){
    include('editar.php');
    
}
?>

<?php
//Eliminar Datos
if (isset($_GET['borrar'])){
    $borrar_id = $_GET['borrar'];

    $borrar= "DELETE FROM usuarios Where id = '$borrar_id'";
    $ejecutar= mysqli_query($con, $borrar);

    $fila= mysqli_fetch_array($ejecutar);

    if ($ejecutar){
        echo "<script>alert('El usuario ha sido eliminado')</script>";
        echo "<script>window.open('index.php', '_self')</script>'";
    }
    
}
?>

</body>
</html>