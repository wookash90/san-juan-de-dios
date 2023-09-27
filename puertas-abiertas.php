<?php $base_dir = dirname(__FILE__);
$web_title = "Puertas abiertas";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- home -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/IMG_4384-min.png" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="h1 primary-font-blue mt-5 mt-md-4"><span class="span-medium600">Puertas abiertas</span></h1>
                    <h2 class="h2med primary-font-blue">22 y 29 de Octubre</h2>
                    <p class="p20 third-font-gray mt-4">Abrimos nuestras puertas los días 22 y 29 de octubre para que puedas conocer nuestras nuevas instalaciones y servicios ampliados de la mano de nuestros profesionales.</p>
                    <div class="col-5 doctor-buttons">
                        <a href="#tagging"><button class="primary-btn mt-3">Participar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <section class="blue-opacity-light main_container py-5">
        <div class="container">
            <div class="row py-md-5">
                <div class="col-12 col-md-6 image-puertas-abiertas">
                    <img src="<?= $base_url ?>/files/img/IMG_4360-min-min.png" alt="image">
                </div>
                <div class="col-12 col-md-6 ps-md-5">
                    <h2 class="h2med primary-font-blue center-movil mt-5 mt-sm-0"><span class="span-medium600">Un hospital renovado y moderno. Sin tiempos de espera</span></h2>
                    <p class="p15 third-font-gray mt-4 center-movil">En nuestro afán por ofrecer una asistencia médica de calidad, además de fluida y rápida, facilitamos <span class="span-medium600">citas con nuestros especialistas en tiempos reducidos</span>, que en un horizonte temporal comprendido entre 24 -72h horas desde el momento de la solicitud de la cita.</p>
                    <p class="p15 third-font-gray mt-4 center-movil">Todo ello en una ubicación privilegiada en el barrio de Nervión, con unas <span class="span-medium600">instalaciones y equipos sanitarios de última generación</span> en manos de los mejores profesionales.</p>
                    <div class="col-5 doctor-buttons mt-4">
                        <a href="#tagging"><button class="primary-btn">Participar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row center-movil">
                <div class="col-12 col-md-6 pe-md-5 mb-4 mb-sm-0 d-flex flex-column justify-content-center">
                    <h2 class="h2 primary-font-blue mt-5 mt-sm-0">Unas instalaciones pensadas para tu comodidad<span class="span-block2"></span><span class="span-medium"></span></h2>
                    <p class="p15 third-font-gray mt-4">La salud y bienestar del paciente y su familia es primordial. Por ello, hemos puesto todo nuestro esfuerzo en diseñar y dotar al centro hospitalario de todo lo necesario para poder ofrecer la mejor atención, a la vez que hemos creado un espacio confortable para pacientes y acompañantes.</p>
                </div>
                <div id="carouselExampleControls1" class="carousel slide col-12 col-md-6 gx-0" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-2.webp" class="d-block" alt="image">
                      </div>
                      <div class="carousel-item">
                        <img src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-1.webp" class="d-block" alt="image">
                      </div>
                      <div class="carousel-item">
                        <img src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-3.webp" class="d-block" alt="image">
                      </div>
                    </div>
                    <a class="n-insta-btn-container" href="<?= $base_url ?>/contacto"><button class="n-insta-btn">Contactar</button></a>
                    <button class="white-btn-top display-none-block justify-content-center align-items-center" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                        <img class="icon" src="<?= $base_url ?>/files/img/SVG/arrowleft.svg" alt="img">
                    </button>
                    <button class="white-btn-bottom display-none-block justify-content-center align-items-center" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                        <img class="icon" src="<?= $base_url ?>/files/img/SVG/arrowright.svg" alt="img">
                    </button>
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
                    <h2 class="h2 primary-font-blue mt-md-5">Preocúpate solo de tu salud y la de los tuyos</h2>
                    <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales compañías aseguradoras para que solo te preocupes de lo que de verdad importa: tu salud y la de los tuyos.</p>
                    <p class="p15 third-font-gray mt-4">Si no encuentras la tuya entre las aseguradoras con las que trabajamos en Hospital San Juan de Dios Sevilla, ponte en contacto para que podamos comprobar la cobertura de tu seguro médico y su convenio con nosotros.</p>
                    <a href="<?= $base_url ?>/companias"><button class="primary-btn mt-4 mb-md-5">Infórmate</button></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row center-movil">
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center pe-md-5">
                    <h2 class="h2 primary-font-blue mt-5 mt-lg-0">Los mejores profesionales en consultas externas</h2>
                    <p class="p15 third-font-gray mt-4">Brindamos una atención sanitaria integral y personalizada. Nuestra unidad dispone de modernas consultas y una amplia cartera de servicios y especialidades a tu disposición, avaladas por un cuadro médico formado por personal con una amplia y reconocida trayectoria profesional.</p>
                    <p class="p15 third-font-gray mt-4">Tu salud y la de los tuyos siempre en las mejores manos.</p>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 gx-0 gx-md-4">
                    <img class="img-companias" src="<?= $base_url ?>/files/img/IMG_4322.png" class="d-block" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- video -->
    <section>
        <div class="container my-5 pt-md-5">
            <div class="row">
                <div class="col gx-0 gx-md-4">
                    <video class="video-settings" controls>
                        <source src="<?= $base_url ?>/files/video/videoDirector.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section>
    <!-- contacto -->
    <section class="blue-opacity-light">
        <div class="container">
            <div class="row" id="tagging">
                <div class="col-12 col-md-6 text-left">
                    <h2 class="h2 primary-font-blue mt-5">Formulario de contacto</h2>
                    <p class="p15 third-font-gray mt-4">Inscríbete para reservar un tour por nuestras instalaciones acompañado por nuestros profesionales.</p>
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