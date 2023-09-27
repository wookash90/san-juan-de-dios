
<?php $base_dir = dirname(__FILE__);
$web_title = "Trabaja con nosotros";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/trabaja-con-nosotros-san-juan-de-dios-sevilla.jpg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5">Trabaja con <span class="bold">nosotros</span></h1>
                    <p class="large third-font-gray mt-4">¿Quieres ser parte de nuestro gran equipo? Completa el siguiente formulario y sé el siguiente en formar parte de nuestra familia. </p>
                </div>
            </div>
        </div>
    </section>
    <!-- formulario -->
    <section class="blue-opacity-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col on_blue">
                    <?php require "$base_dir/lib/trabaja-con-nosotros-contacto.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php";?>
    <!-- blue -->
    <?php require "$base_dir/lib/cartera-de-servicios-azul.php";?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php";?>
    <!-- subscribete -->

    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php";?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>