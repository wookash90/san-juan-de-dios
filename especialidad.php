<?php $base_dir = dirname(__FILE__);
require_once "$base_dir/lib/app_data.php";

$slug = !empty($_GET['e']) ? $_GET['e'] : 'urgencias';
$especialidad = $elem = $especialidades[$slug];
$web_title = "";
$meta_title = !empty($especialidad->seoTitle) ? $especialidad->seoTitle : '';
$page_description = !empty($especialidad->seoMeta) ? $especialidad->seoMeta : '';
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php"; ?>
<main>
    <!-- home -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <?php if ($especialidad->title_especialidad != "Unidad de tráfico") { ?>
                        <img class="img-100 img-main" src="<?= $base_url . $especialidad->img_main ?>" alt="<?= $especialidad->title_especialidad ?>">
                    <?php } else { ?>
                        <?= $especialidad->img_main ?>
                    <?php } ?>
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5"><?= $especialidad->title_especialidad ?></h1>
                    <p class="large third-font-gray mt-4"><?= $especialidad->intro ?></p>
                    <?php if ($especialidad->btn_servicio) { ?>
                        <div class="col-5 doctor-buttons">
                            <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Como llegar</button></a>
                        </div>
                    <?php } else if ($especialidad->btn_telefono) { ?>
                        <div class="doctor-buttons">
                            <a href="tel:+34954939100"><button class="primary-btn mt-4 btn_unidad_trafico"> <?= file_get_contents("$base_dir/files/img/SVG/phone_blanco.svg"); ?> Unidad de tráfico</button></a>
                        </div>
                        <script>
                            function startModalVideo() {
                                $("#modal-video").trigger("play");
                            }

                            function stopModalVideo() {
                                $("#modal-video").trigger("pause");
                            }
                        </script>
                    <?php } else { ?>
                        <div class="col-5 doctor-buttons">
                            <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- info -->
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col center-movil">
                    <?= $especialidad->info ?>
                    <!-- <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-4">Más información</button></a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php"; ?>
    <!--  -->
    <?php require "$base_dir/lib/principales-aseguradoras.php" ?>
    <!-- Profesionales del servicio -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 center-movil">
                    <?php if (isset($especialidad->profesionales_title)) {
                        if ($especialidad->profesionales_title != "") {
                    ?>
                            <div class="center-movil">
                                <h2 class="primary-font-blue mt-5"><?= $especialidad->profesionales_title ?></h2>
                                <?= $especialidad->profesionales_info ?>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <?php foreach ($doctores as $k => $doctor) {
                    if (!in_array($slug, $doctor->especialidades)) continue; ?>
                    <div class="col-6 col-lg-3 center-movil d-md-flex flex-column align-items-center">
                        <!-- imagen interior <a> -->
                        <!-- <a href="<?= $base_url ?>/doctor?d=<?= $k ?>"></a> -->
                        <img class="doctor-portrait-sm mt-4" src="<?= $base_url . $doctor->img_min ?>" alt="image">
                        <h3 class="primary-font-blue mt-3 text-center"><?= $doctor->title; ?></h3>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php if (isset($especialidad->servicios_title)) {
                        if ($especialidad->servicios_title != "") {
                    ?>
                            <div class="center-movil">
                                <h2 class="primary-font-blue mt-5"><?= $especialidad->servicios_title ?></h2>
                                <?= $especialidad->servicios_info ?>
                            </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Principales consultas -->
    <section>
        <div class="container main_container margin-desktop-top">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 px-md-5">
                    <h2 class="primary-font-blue center-movil">Principales consultas</h2>
                    <div class="mt-4">
                        <div class="col-12 open-sans-semi third-font-gray l-style-none">
                            <?= $especialidad->consultas ?>
                        </div>
                    </div>
                    <div class="center-movil"><a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn my-5">Pedir cita</button></a></div>
                </div>
                <div class="col-12 col-md-6 order-md-1">
                    <img class="img-especialidad" src="<?= $base_url . $especialidad->principales_img ?>" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- Centro de Atención -->
    <?php require "$base_dir/lib/centro-de-atencion.php"; ?>
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php"; ?>
    <!-- blue -->
    <?php require "$base_dir/lib/cartera-de-servicios-azul.php"; ?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php"; ?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php"; ?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php"; ?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php"; ?>
</main>
