<?php $base_dir = dirname(__FILE__);
$web_title = "Campaña aseguradoras medico privado";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- home -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/foto-1-banner-2.jpg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Tu salud, tu tranquilidad</span></h1>
                    <p class="large third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras para que solo te preocupes de lo que de verdad importa, tu salud y la de los tuyos. </p>
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
                    <img src="<?= $base_url ?>/files/img/foto-2-banner-2.jpg" alt="image">
                </div>
                <div class="col-12 col-md-6 ps-md-5">
                    <h2 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Disfruta de las ventajas de estar asegurado</span></h2>
                    <p class="large third-font-gray mt-4">Accede a servicios de salud exclusivos, altamente especializados y sin esperas, mejorando tu experiencia sanitaria y accediendo a los mejores profesionales en cada una de las especialidades.  </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5 py-5">
            <div class="row center-movil">
                <div class="col-12 col-md-6 pe-md-5 mb-4 mb-sm-0 d-flex flex-column justify-content-center">
                    <h2 class="primary-font-blue mt-5 mt-md-4"><span class="bold">Compañías aseguradoras</span></h2>
                    <p class="large third-font-gray mt-4">El Hospital San Juan de Dios de Sevilla trabaja con las siguientes compañías aseguradoras: Caser Seguros, Mapfre, Sanitas, FIATC Seguros, Plus Ultra Seguros, Seguros Bilbao, Catalana Occidente, Generali, Divina Pastora Seguros y AEGON. </p>
                </div>
                <div class="col-12 col-md-6 mt-5 mt-md-0 gx-0 gx-md-4">
                    <img class="img-companias" src="<?= $base_url ?>/files/img/logos_aseguradoras.svg" class="d-block" alt="image">
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