<?php $base_dir = dirname(__FILE__);
$web_title = "Campaña urgencia sevilla";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- home -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/foto-1-banner-1.jpg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Urgencias 24 horas</span></h1>
                    <p class="large third-font-gray mt-4">Nuestro servicio de Urgencias es ininterrumpido, las 24 horas del día y los 365 días del año, siempre atendido por un equipo multidisciplinar cualificado que ofrece una atención eficaz y cercana a pacientes y familiares.</p>
                    <div class="col-5 doctor-buttons">
                        <a href="https://api.whatsapp.com/send?phone=607919025&utm_source=Landing+prostata&utm_medium=web&utm_campaign=Mes+del+cancer+de+prostata" target="_blank" onclick="btnscriptpixel()"><button class="primary-btn">Pedir cita</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <section class="blue-opacity-light mt-5 py-5">
        <div class="container">
            <div class="row py-md-5">
                <div class="col-12 col-md-6 image-puertas-abiertas">
                    <img src="<?= $base_url ?>/files/img/foto-2-banner-1.jpg" alt="image">
                </div>
                <div class="col-12 col-md-6 ps-md-5">
                    <h2 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Atención pediátrica</span></h2>
                    <p class="large third-font-gray mt-4">Ofrecemos una atención médica completa e integral, desde niños recién nacidos a adolescentes a través de una atención eficiente, segura y de calidad enfocada a la promoción de la salud y la prevención como pilares fundamentales. </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row center-movil">
                <div class="col-12 col-md-6 pe-md-5 mb-4 mb-sm-0 d-flex flex-column justify-content-center">
                    <h2 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Atención de adultos</h2>
                    <p class="large third-font-gray mt-4">En el Hospital San Juan de Dios de Sevilla disponemos de un amplio número de especialidades que ponemos al servicio de nuestros pacientes. Tu hospital para todas las etapas de la vida. </p>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 gx-0 gx-md-4">
                    <img class="img-companias" src="<?= $base_url ?>/files/img/foto-3-banner-1.jpg" class="d-block" alt="image">
                </div>
            </div>
        </div>
    </section>
    <section class="secondary-green-opacity">
        <div class="container">
            <div class="row pt-5 pt-md-0">
                <div class="col-4 col-md-2 mt-md-5 pt-md-5 d-flex flex-column justify-content-evenly">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/mapfre.svg" alt="image">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/aegon.png" alt="image">
                </div>
                <div class="col-4 col-md-2 mb-md-5 pb-md-5 d-flex flex-column justify-content-evenly">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/sanitas.svg" alt="image">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/catalanaoccidente.svg" alt="image">
                </div>
                <div class="col-4 col-md-2 mt-md-5 pt-md-5 d-flex flex-column justify-content-evenly">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/caser.svg" alt="image">
                    <img class="my-4 logo-companias" src="<?= $base_url ?>/files/img/logos/general.svg" alt="image">
                </div>
                <div class="col-12 col-md-6 my-5 center-movil ps-md-5">
                    <h2 class="primary-font-blue mt-md-5">Preocúpate solo de tu salud y la de los tuyos</h2>
                    <p class="third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales compañías aseguradoras para que solo te preocupes de lo que de verdad importa: tu salud y la de los tuyos.</p>
                    <p class="third-font-gray mt-4">Si no encuentras la tuya entre las aseguradoras con las que trabajamos en Hospital San Juan de Dios Sevilla, ponte en contacto para que podamos comprobar la cobertura de tu seguro médico y su convenio con nosotros.</p>
                    <a href="<?= $base_url ?>/companias"><button class="primary-btn mt-4 mb-md-5">Infórmate</button></a>
                </div>
            </div>
        </div>
    </section>
    <!-- contacto -->
    <section class="blue-opacity-light">
        <div class="container">
            <div class="row" id="tagging">
                <div class="col-12 col-md-6 text-left">
                    <h2 class="primary-font-blue mt-5">Formulario de contacto</h2>
                    <p class="third-font-gray mt-4">Inscríbete para reservar un tour por nuestras instalaciones acompañado por nuestros profesionales.</p>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <?php require "$base_dir/lib/contacto.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php";?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php";?>
    </main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>