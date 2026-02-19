<?php
session_start();
if(isset($_SESSION['session_email'])){
  $email_session = $_SESSION['session_email'];

  $sql="SELECT us.id_usuario as id_usuario, us.nombres as
   nombres, us.email as email, rol.rol as rol 
   FROM tb_usuarios AS us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE email = '$email_session'";
  $query = $pdo->prepare($sql);
  $query->execute();
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

  foreach($usuarios as $usuario){
    $id_usuario_session = $usuario['id_usuario'];
    $nombre_session = $usuario['nombres'];
    $rol_session = $usuario['rol'];
  }

}else{
  echo "No existe la session";
  header('Location:'.$URL.'login');
}