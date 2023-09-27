<?php $base_dir = dirname(__FILE__);
$web_title = "Compañias";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php"; ?>
<main>
    <!-- Companias -->
    <section class="img-background-companias">
        <div class="container-md padding-desktop-top">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-5 mt-5">
                    <div class="companias-card text-white">
                        <div class="d-flex flex-column equal-margin">
                            <h2><span class="bold">Tu salud,<br> tu tranquilidad</span></h2>
                            <p class="my-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras para que solo te preocupes de lo que de verdad importa, tu salud y la de los tuyos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container center-movil">
            <div class="row">
                <div class="col-12">
                    <h1 class="primary-font-blue">Compañías aseguradoras</h1>
                    <p class="third-font-gray mt-4">El Hospital San Juan de Dios de Sevilla trabaja con las siguientes compañías aseguradoras:</p>
                </div>
            </div>
        </div>
        <div class="container main_container">
            <div class="row text-center align-items-center">
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/sanitas.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/mapfre.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/caser.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/dkv.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/cosalud.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/hna.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/general.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/divinapastora.png">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/aegon.png">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/FIATC.svg">
                </div>
                <div class="col-6 col-md-4 mt-5 logo-companias-container">
                    <img class="logo-companias" src="<?= $base_url; ?>/files/img/logos/adeslas_logo.svg">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row d-md-flex justify-content-between">
                <div class="col-12 col-md-6">
                    <h2 class="primary-font-blue center-movil margin-desktop-right15">Disfruta de las ventajas de estar asegurado</h2>
                    <p class="third-font-gray mt-4 center-movil margin-desktop-right15">Accede a servicios de salud exclusivos, altamente especializados y sin esperas, mejora tu experiencia sanitaria</p>
                    <div class="row margin-desktop-right15">
                        <div class="col">
                            <div class="text-center mt-5">
                                <img class="blue-icons-companias" src="<?= $base_url ?>/files/img/SVG/clock.svg" alt="image">
                                <p class="third-font-gray mt-2"><span class="span-block">Sin</span> esperas</p>
                            </div>
                            <div class="text-center mt-5">
                                <img class="blue-icons-companias" src="<?= $base_url ?>/files/img/SVG/handset.svg" alt="image">
                                <p class="third-font-gray mt-2"><span class="span-block2">Atención</span> personalizada</p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center mt-5">
                                <img class="blue-icons-companias" src="<?= $base_url ?>/files/img/SVG/doctor.svg" alt="image">
                                <p class="third-font-gray mt-2"><span class="span-block">Servicios</span> especializados</p>
                            </div>
                            <div class="text-center mt-5">
                                <img class="blue-icons-companias" src="<?= $base_url ?>/files/img/SVG/calendario.svg" alt="image">
                                <p class="third-font-gray mt-2"><span class="span-block2">Citas con plazos</span> inferiores a una semana</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0">
                    <img class="img-companias" src="./files/img/young-woman-sitting-in-waiting-room.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row blue-opacity-light border-1rem">
                <div class="col primary-font-blue pt-5 px-md-5">
                    <h2 class="center-movil"><span class="bold">¿No encuentras tu compañía aseguradora?</span></h2>
                    <p class="mt-5">Si has mirado en el listado de aseguradoras con las que trabajamos en Hospital San Juan de Dios Sevilla y no encuentras la tuya, ponte en contacto con nosotros para informarte.</p>
                    <p class="mt-4">Si no tienes aseguradora te ayudamos a descubrir las ventajas y beneficios de estar asegurado.</p>
                    <a href="<?= $base_url ?>/contacto">
                        <div class="text-center my-5"><button class="btn-companias">Consúltanos</button></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php"; ?>
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