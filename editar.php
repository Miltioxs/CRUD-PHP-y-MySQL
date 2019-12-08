<?php

if (isset($_GET['editar'])){
    $editar_id =$_GET['editar'];

    $consulta= "SELECT * FROM usuarios Where id = '$editar_id'";
    $ejecutar= mysqli_query($con, $consulta);

    $fila= mysqli_fetch_array($ejecutar);

    $usuario = $fila[1];
    $pass = $fila[2];
    $email = $fila[3];

}




?>
<br>
<div class='col-md-8 col-md-offset-2'>
    

    <form action="" method="post">

        <div class='form-group'>
            <label>Nombre:</label>
            <input type='text' name= 'nombre' class='form-control' value='<?php echo $usuario;?>'><br/>
        </div>

        <div class='form-group'>
            <label>Contraseña:</label>
            <input type='text' name= 'pass' class='form-control' value='<?php echo $pass;?>'><br/>
        </div>

        <div class='form-group'>
            <label>Email:</label>
            <input type='text' name= 'email' class='form-control' value='<?php echo $email;?>'><br/>
        </div>

        <div class='form-group'>
            <input type='submit' name= 'actualizar' class='btn btn-warning' value='Actualizar datos'><br/>
        </div>

    </form>
    </div>

    <?php
    if (isset($_POST['actualizar'])){

        $actualizar_nombre = $_POST['nombre'];
        $actualizar_pass = $_POST['pass'];
        $actualizar_email = $_POST['email'];
        
    
        $consulta= " UPDATE usuarios SET usuario = '$actualizar_nombre' , pass = '$actualizar_pass' , email = '$actualizar_email' Where id = '$editar_id'";
        $ejecutar= mysqli_query($con, $consulta);
        
        if ($ejecutar){
            echo "<script>alert('Datos actualizados')</script>";
            echo "<script>window.open('index.php', '_self')</script>'";
        }
        
    
        
    
    }
    ?>