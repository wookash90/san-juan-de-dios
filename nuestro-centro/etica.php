<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Ética";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- etica -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-san-juan-de-dios-sevilla-centro-etica.jpg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Ética</h1>
                    <p class="large third-font-gray mt-4">Los encargados del área de Ética y Bioética de nuestro centro tienen como objetivo asesorar, sensibilizar, formar, difundir e investigar sobre los asuntos relacionados con la Ética, Bioética y Humanización de la Asistencia.</p>
                    <div class="col-5 doctor-buttons">
                        <!-- <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tale-background-opacity">
        <div class="container main_container">
            <h2 class="primary-font-blue center-movil pt-5">Equipo Local de Bioética</h2>
            <p class="large third-font-gray mt-4"><span class="bold">Sevilla</span></p>
            <p class="third-font-gray mt-4">El área de Ética y Bioética tiene la misión de reflexionar sobre las aplicaciones prácticas de nuestro quehacer profesional diario, donde los principios y valores humanos se pueden ver comprometidos, con la voluntad de generar sensibilización hacia estos aspectos en los equipos asistenciales.</p>
            <p class="large third-font-gray mt-4"><span class="bold">El Área de Ética y Bioética se constituye por:</span></p>
            <p class="third-font-gray mt-4 pb-5">El Comité Institucional de Bioética de la Provincia Bética y los Equipos Locales de Ética y Bioética</p>
        </div>
    </section>
    <!-- collapse -->
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col gx-0 gx-md-auto">
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="arrow-down"> 
                        <div class="d-flex justify-content-between align-items-end slick-green py-4 px-3 px-md-5">
                            <h3 class="mb-0">¿Qué servicios ofrece?</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down"><img src="<?= $base_url ?>/files/img/SVG/tickGreen.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card no-border card-body slick-green pb-5 ">
                            <p class="mx-md-5 mt-3 third-font-gray">1. Asesoramiento desde una perspectiva que pretende orientar al profesional sobre los aspectos éticos que intervienen en la toma de decisiones asistenciales.</p>
                            <p class="mx-md-5 mt-3 third-font-gray">2. Reflexiones sobre las aplicaciones prácticas de nuestro quehacer profesional diario, donde los principios y valores humanos se puede ver comprometidos, con la voluntad de generar sensibilización hacia estos aspectos en los equipos asistenciales.</p>
                            <p class="mx-md-5 mt-3 third-font-gray">3. Participamos activamente en la formación, docencia e investigación sobre Ética y Humanización de la Asistencia.</p>
                            <p class="mx-md-5 mt-3 third-font-gray">4. Colaboramos con el Área de Humanización del centro, procurando trasladar un mensaje único e integral.</p>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" id="arrow-down2"> 
                        <div class="d-flex justify-content-between align-items-end slick-orange py-4 px-3 px-md-5">
                            <h3 class="mb-0">¿Quiénes pueden realizar una consulta?</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down2"><img src="<?= $base_url ?>/files/img/SVG/tickYellow.svg" alt="img"></div>
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample2">
                        <div class="card no-border card-body slick-orange pb-5">
                            <p class="mx-md-5 mt-3 third-font-gray">Los profesionales del Centro tienen la posibilidad de consultar sobre los aspectos éticos de la asistencia.</p>
                            <p class="large mx-md-5 mt-3 third-font-gray"><span class="span-medium600">Finalidad de la consulta:</span></p>
                            <p class="mx-md-5 mt-3 third-font-gray">Asesoramiento sobre algún aspecto de la asistencia que a juicio del profesional requiera una deliberación Bioética.</p>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" id="arrow-down3"> 
                        <div class="d-flex justify-content-between align-items-end slick-blue py-4 px-3 px-md-5">
                            <h3 class="mb-0">¿Cómo contactar?</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down3"><img src="<?= $base_url ?>/files/img/SVG/tickBlue.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse center-movil" id="collapseExample3">
                        <div class="card no-border card-body slick-blue pb-5">
                            <p class="mx-md-5 mt-3 third-font-gray">Solicitar una consulta, exponiendo brevemente el caso:</p>
                            <p class="large mx-md-5 mt-3 third-font-gray"><span class="span-medium600">Correo electrónico:</span></p>
                            <a href="" id="auto-email-send2"><button class="mt-3 mx-md-5 flexy-blue-btn">miguel.sanchezdalp@sjd.es</button></a>
                            <a href="" id="auto-email-send3"><button class="mt-3 mx-md-5 flexy-blue-btn">mariaisabel.herrero@sjd.es</button></a>
                            <p class="large mx-md-5 mt-5"><span class="span-medium600">Contacto telefónico:</span></p>
                            <p class="mx-md-5 mt-3 third-font-gray"><span class="span-medium600">954 939 300</span> (Hospital)</p>
                            <p class="mx-md-5 mt-3 third-font-gray">El Hospital SJD de Sevilla tratará sus datos para prestarle la asistencia religiosa o espiritual que ha solicitado. Puede ejercer sus derechos en el correo c03_dpo@sjd.es. Para más información consulte nuestra <a href="<?= $base_url ?>/politica-de-privacidad"><span class="span-medium600"><span class="link-blog">política de privacidad</span></span></a></p>
                            <p class="mx-md-5 mt-3 third-font-gray">Directamente a través de cualquier miembro del Equipo de Ética y Bioética.</p>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4" id="arrow-down4"> 
                        <div class="d-flex justify-content-between align-items-end slick-pink py-4 px-3 px-md-5">
                            <h3 class="mb-0">Miembros</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down4"><img src="<?= $base_url ?>/files/img/SVG/tickPink.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample4">
                        <div class="card no-border card-body slick-pink pb-5">
                            <p class="mx-md-5 third-font-gray">Sonia Moreno Guinea</p>
                            <p class="mx-md-5 third-font-gray">Amparo Fernández Parladé</p>
                            <p class="mx-md-5 third-font-gray">Miguel Sánchez-Dalp Jiménez</p>
                            <p class="mx-md-5 third-font-gray">Cristina Lucenilla Hidalgo</p>
                            <p class="mx-md-5 third-font-gray">Beatriz Jiménez Domínguez (Secretaria)</p>
                            <p class="mx-md-5 third-font-gray">Mª Isabel Herrero Panadero (Coordinadora)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container py-5">
            <h2 class="primary-font-blue text-center">Conoce la Ética según San Juan de Dios, visita nuestra web corporativa</h2>
            <div class="text-center"><a href="https://sjd.es/quienes-somos/etica-sjd/" target="_blank"><button class="primary-btn mt-4">Más información</button></a></div>
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