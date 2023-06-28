<?php

// require_once './Conexion.php';
// //------------------------------------------------------//
// $con = new Conexion;
// $con->conectar();
// $sql='INSERT INTO `administradores`(adm_nombre,adm_apellido,adm_correo,adm_usuario,adm_contrasenia)VALUES(?,?,?,?,?)';
// $nombre = 'Sergio Alejandro';
// $apellido = 'Parra Toro';
// $usuario ='sergioAdmin';
// $contrasenia =password_hash('1234567890',PASSWORD_DEFAULT);
// $correo ='admin@mail.com';
// $stmt = $con->preparar_consulta($sql,[$nombre, $apellido,$correo, $usuario, $contrasenia]);
// var_dump($stmt);
// $con->desconectar();

//------------------------------------------------------//

// if ($stmt) {
//     // Recorrer los registros y actualizar las contraseñas encriptadas
//     foreach ($stmt as $row) {
//         $adm_id = $row['adm_id'];
//         $contrasenia_actual = $row['adm_contrasenia'];

//         // Generar el hash bcrypt de la contraseña actual
//         $nueva_contrasenia = password_hash($contrasenia_actual, PASSWORD_DEFAULT);

//         // Actualizar la contraseña en la base de datos
//         $sql_actualizar = "UPDATE administradores SET adm_contrasenia = :nueva_contrasenia WHERE adm_id = :adm_id";
//         $parametros = array(':nueva_contrasenia' => $nueva_contrasenia, ':adm_id' => $adm_id);
//         $con->preparar_consulta($sql_actualizar, $parametros);
//     }
//     var_dump($con);
// }

// // Desconectar la base de datos
// $con->desconectar();

// //------------------------------------------------------//