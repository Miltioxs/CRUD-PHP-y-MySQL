<?php
function conectar(){
    $conexion = mysqli_connect('localhost','root','','prueba_usuarios') or die('La conexion fallo');
    //mysqli_select_db($conexion,'prueba_usuarios');
    
    return $conexion;
}
