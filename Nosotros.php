<?php 
require('class/rutas.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi primera pagina</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="favicon.png.ico">

</head>
<body>
<!-- aqui va todo lo que ve el usuario -->
<!-- cabecera del sitio y menu de navagacion -->
<header>
    <h1>Cabecera</h1>
    <?php include("partials/menu.php"); ?>
</header>
<!-- cuerpo central del sitio web -->
<section>
 <h1>Nuestra empresa</h1>
 <!-- lado derecho de la pagina -->
 <article class="derecho">
     <img src="img/gumball.jpg" alt="imagen empresa" style=" width: 85%; margin-right: 28px"> 
 </article>
 <!-- lado izquierdo de la pagina -->
 <article class="izquierdo">
    <div class="texto">
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit a aliquid, quia aut reiciendis accusamus corporis modi consequatur omnis, vero vitae nobis labore ex, cum dolorem! Vel, officiis. Delectus, quod.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nisi ad pariatur ullam rerum? Ipsa, nam facilis? Assumenda corporis error neque mollitia. Nobis minima inventore impedit a illum praesentium possimus.</p>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam distinctio fugit omnis accusantium recusandae, commodi incidunt officiis perspiciatis at corporis. Repudiandae alias harum soluta. Esse adipisci nam autem tempore praesentium.</p>
    </div>
    <div class="video">
    <iframe width="640" height="360" src="https://www.youtube.com/embed/o1lKMrLat_I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
 </article>
</section>
<!-- pie de pagina del sitio -->
<footer>
<?php include("partials/footer.php"); ?>
</footer>
 
</body>
</html>