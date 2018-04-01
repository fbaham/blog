<?php require 'views/header.php' ?>
<!-- <div class="contenedor"> -->
  <div class="row sidenav">
    <div class="col-2">
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
    </div>
    <div class="contenedor col-8">
      <?php foreach ($posts as $post): ?>
        <div class="post">
          <article>
            <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
            <p class="fecha"><?php echo fecha($post['fecha']); ?></p>
            <div class="thumb">
              <a href="#">
                <img src="<?php echo RUTA; ?>img/<?php echo $post['thumb']; ?>" alt="">
              </a>
            </div>
            <p class="extracto"><?php echo $post['extracto']; ?></p>
            <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Seguir leyendo</a>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="col-2 sidenav">
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
      <p><a href="">Link</a></p>
    </div>
  </div>
<?php require 'views/paginacion.php' ?>
<!-- </div> -->
<?php require 'views/footer.php' ?>
