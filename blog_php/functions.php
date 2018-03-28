<?php
//establece conexion con la base de datos
function conexion($bd_config){
  try {
    $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['basededatos'], $bd_config['usuario'], $bd_config['pass']);
    return $conexion;
  } catch (PDOException $e) {
    return false;
  }
}

//limpia datos de caracteres especiales
function limpiar_datos($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

//obtiene numero de pagina a travez de la variable p
function pagina_actual(){
  return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

//obtiene posts disponibles para la pagina actual
function obtener_posts($post_por_pagina, $conexion){
  $inicio = (pagina_actual() > 1 ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0); //obtiene el primer post de la pagina
  $sentencia = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
  $sentencia -> execute();
  return $sentencia -> fetchAll();
}
//obtiene numero de páginas para la paginación
function numero_paginas($post_por_pagina, $conexion){
  $total_post = $conexion -> prepare('SELECT FOUND_ROWS() as total');
  $total_post -> execute();
  $total_post = $total_post -> fetch()['total'];
  $numero_paginas = ceil($total_post / $post_por_pagina);
  return $numero_paginas;
}

//retorna solo valores enteros
function id_articulo($id){
  return (int)limpiar_datos($id);
}
//obtiene un post a partir de un id
function obtener_post_por_id($conexion, $id){
  $resultado = $conexion -> query("SELECT * FROM articulos WHERE id = $id LIMIT 1");
  $resultado = $resultado->fetchAll();
  return ($resultado) ? $resultado : false;
}

//transforma fecha de tipo TIMESTAMP a string
function fecha($fecha){
  $timestamp = strtotime($fecha);
  $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  $day = date('d', $timestamp);
  $month = date('m', $timestamp) - 1;
  $year = date('Y', $timestamp);
  $fecha = $day . ' de ' . $meses[$month] . " del " . $year;
  return $fecha;
}

//comprueba si la sesión de admin se encuentra iniciada
function comprobar_sesion(){
  if (!isset($_SESSION['admin'])) {
    header('Location: ' . RUTA);
  }
}

?>
