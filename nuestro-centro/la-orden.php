<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "La Orden Hospitalaria";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- la orden -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-san-juan-de-dios-sevilla-centro-laorden.webp" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5">La Orden Hospitalaria</h1>
                    <p class="large third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios es una de las mayores organizaciones internacionales de cooperación sin ánimo de lucro. Su finalidad es atender a las personas más vulnerables mediante la puesta en marcha y desarrollo de programas de acción social y salud.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <p class="third-font-gray">La Orden de San Juan de Dios es una institución sin ánimo de lucro y de carácter internacional que tiene su origen en la figura de Juan Ciudad, un hombre que no solo revolucionó el mundo de los cuidados sanitarios, siendo el precursor de la Enfermería, sino que también impulsó la dignificación de los colectivos más desfavorecidos de su época gracias a su manera de tratar y atender a las personas con escasos recursos.</p>
            <p class="third-font-gray">Con Juan de Dios como inspiración, la Orden Hospitalaria lleva casi 500 años dedicándose a la atención sanitaria, sociosanitaria, social​, docente e investigadora a través de diversos dispositivos, entre los que se incluyen hospitales, centros de salud mental, centros para personas con discapacidad, para personas mayores y para personas en situación de vulnerabilidad y exclusión social.</p>
            <p class="third-font-gray">La Hospitalidad es el valor central de la Institución, que se sustenta en otros cuatro valores que vertebran todas las acciones que lleva a cabo la Orden: Calidad, Respeto, Responsabilidad y Espiritualidad.</p>
            <p class="third-font-gray">En España, la Orden Hospitalaria de San Juan de Dios cuenta con una red de 80 centros sanitarios, sociales, sociosanitarios, docentes y de investigación que atienden a casi un millón y medio de personas anualmente. Está integrada por 180 Hermanos, 15.000 profesionales, casi 3.500 voluntarios y numerosos donantes y bienhechores.</p>
            <p class="third-font-gray">En el mundo, la Orden Hospitalaria está presente en 52 países en los cinco continentes. Cuenta con 405 centros, que incluyen hospitales y dispositivos sociales y sanitarios para personas con enfermedad mental, discapacidad, mayores, personas sin hogar y en riesgo de exclusión social.</p>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <h2 class="primary-font-blue text-center text-lg-start">Presencia de San Juan de Dios en el mundo</h2>
            <div class="mapa-mundo">
                <img class="mt-4" src="<?= $base_url ?>/files/img/MAPA-voluntariado.png" alt="image">
            </div>
        </div>
    </section>
    <section class="tale-background-opacity py-5">
        <div class="container">
            <p class="large third-font-gray">La presencia y actividad internacional de San Juan de Dios se lleva a cabo en los <span class="bold">cinco continentes</span> a través de <span class="bold">405 centros</span> en los que se ofrecen más de <span class="bold">37.700 camas o plazas.</span> Para ello, son <span class="bold">65.000 profesionales</span> los que prestan más de <span class="bold">35 millones de atenciones</span> cada año. Además, cuenta con <span class="bold">1.020 Hermanos</span> y más de <span class="bold">25.300 voluntarios/as.</span></p>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <h2 class="primary-font-blue center-movil">La Orden en España</h2>
            <p class="third-font-gray mt-4">En España, la Orden cuenta con la presencia de 180 Hermanos y 80 centros sanitarios, sociosanitarios, sociales, docentes y de investigación.</p>
            <p class="third-font-gray">Junto a 15.000 profesionales, 3.500 voluntarias y voluntarios, así como numerosos donantes y bienhechores, San Juan de Dios atiende cada año a más de 1.500.000 personas con un modelo de atención adaptado a los retos de la sociedad actual y a las nuevas realidades.</p>
            <p class="third-font-gray">Su objetivo es promocionar y mejorar la salud de las personas y su calidad de vida, sin distinción por cuestión de género, creencias u origen, para crear una sociedad más justa y solidaria.</p>
            <h2 class="primary-font-blue mt-5 center-movil">Distribución de los centros en España</h2>
            <div class="mapa-mundo">
                <img class="mt-4" src="<?= $base_url ?>/files/img/mapa-provincias-sjd.svg" alt="image">
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