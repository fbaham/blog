<?php

define('RUTA', 'http://localhost/Cursos/curso_php/practicas/blog/');
//configuracion de base de datos
$bd_config = array(
  'basededatos' => 'curso_blog',
  'usuario' => 'root',
  'pass' => ''
);

//configuracion general
$blog_config = array(
  'post_por_pagina' => 2,
  'carpeta_imagenes' =>  'img/'
);

//configuracion de administrador
//obtener usuario y pass desde base de datos
$blog_admin = array(
  'usuario' => 'Carlos',
  'password' => '123'
);

?>
