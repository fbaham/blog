<?php require 'views/header.php' ?>
<div class="row contenedor">
  <div class="col-12 col-md-10">
    <div class="post">
      <article>
        <h2 class="titulo"><?php echo $post['titulo']; ?></h2>
        <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
        <div class="thumb">
            <img src="<?php echo RUTA; ?>img/<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo']; ?>">
        </div>
        <p class="extracto"><?php echo nl2br($post['texto']); ?></p>
      </article>
    </div>
  </div>
<?php require 'views/columna-derecha.php' ?>
<?php require 'views/footer.php' ?>
