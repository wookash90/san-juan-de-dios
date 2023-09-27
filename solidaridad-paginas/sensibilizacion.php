<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "sensibilizacion";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sensibilizacion -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/sensibilizacion.jpeg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Sensibilizacion</h1>
                    <p class="large third-font-gray center-movil mt-4">Creemos que es necesario favorecer el cambio y la transformación social para reducir la estigmatización que sufren aquellas personas y /o colectivos más vulnerables de la sociedad. Con la Sensibilización pretendemos</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <div class="d-md-flex flex-row mt-5">
                        <div class="sensibilizacion m-auto m-md-0"><img src="<?= $base_url ?>/files/img/sensibilizacion-01.jpeg" alt="image"></div>
                        <ul class="third-font-gray mx-md-5 mt-5 mt-md-0 suisse_intl">
                            <li class="my-2">Desmontar mitos y demostrar situaciones de vulnerabilidad cotidianas y cercanas.</li>
                            <li class="my-2">Provocar la reflexión, generar cuestionamientos, dudas, preguntas e inquietudes.</li>
                            <li class="my-2">Incitar a la acción.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="d-md-flex flex-row">
                        <div class="sensibilizacion m-auto m-md-0"><img src="<?= $base_url ?>/files/img/sensibilizacion-02.jpeg" alt="image"></div>
                        <div class="suisseIntlmed third-font-gray mx-md-5 mt-5 mt-md-0 center-movil">
                            <h3 class="primary-font-blue">RedES –Red de escuelas solidarias-</h3>
                            <p class="third-font-gray">A través de RedES ofrecemos charlas de sensibilización y proyectos de Aprendizaje Servicio (APS) para fomentar la cultura de la implicación social y la solidaridad del alumnado.</p>
                            <h3 class="primary-font-blue mt-5">Campañas de sensibilización</h3>
                            <p class="third-font-gray">Acciones de sensibilización como paso previo y necesario para que la solidaridad sea efectiva y afectiva.</p>
                            <p class="third-font-gray"><span class="bold">La Vida Misma:</span> Te acercamos las diversas situaciones de exclusión social para que rompas estereotipos y nos ayudes a combatirlas. <span class="link-blog bold"><a target="_blank" href="https://www.lavidamisma-sjd.org/">www.lavidamisma-sjd.org</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
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