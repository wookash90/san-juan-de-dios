<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Envía un agradecimiento";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- Envía un agradecimiento -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h2 primary-font-blue my-5">Envía un agradecimiento</h1>
                    <p class="p15 third-font-gray">Pagina en construcción</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Centro de Atención -->
    <?php require "$base_dir/lib/centro-de-atencion.php";?>
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php";?>
    <!-- blue -->
    <?php require "$base_dir/lib/cartera-de-servicios-azul.php";?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php";?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php";?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php";?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>