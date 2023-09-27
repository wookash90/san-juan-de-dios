<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Servicio de Atención Espiritual";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- atencion espiritual -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-san-juan-de-dios-sevilla-centro-atencion-espiritual.webp" alt="">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Servicio de Atención Espiritual y Religiosa<span class="span-medium600"></span></h1>
                    <p class="third-font-gray mt-4">El SAER es un servicio de orientación terapéutica que –en coordinación con los demás servicios– coopera con su presencia, su testimonio y sus acciones, a la asistencia y el tratamiento, la curación y el cuidado de las personas atendidas. De este modo contribuye al desarrollo de la atención integral, realizando así la misión del Centro. Su objetivo es “atender la dimensión espiritual y religiosa de las personas asistidas, sus familias y colaboradores, siguiendo y recreando los gestos y actitudes evangélicos, según el modelo de la Orden Hospitalaria de San Juan de Dios”, como se afirma "La Pastoral según el estilo de San Juan de Dios".</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <h2 class="primary-font-blue center-movil">Modelo propio de atención</h2>
            <p class="third-font-gray mt-4">La Orden Hospitalaria tiene un modelo de Atención Espiritual y Religiosa definido que, de forma flexible y adaptada a cada caso particular, intenta implantarse en cada una de sus realidades.</p>
            <p class="third-font-gray mt-4">Es un modelo que garantiza la calidad de la atención y el cuidado de la dimensión espiritual y religiosa en base a la gestión por procesos, donde se establecen indicadores y se recogen datos de las diferentes intervenciones con el fin de realizar un seguimiento e identificar el alcance del proceso terapéutico, con un objetivo de mejora y excelencia continuos.</p>
            <h2 class="primary-font-blue center-movil mt-5">Queremos poner en valor</h2>
            <p class="third-font-gray mt-4">1. Que la dimensión espiritual es constitutiva del ser humano y dentro de ella se sitúa la experiencia religiosa.</p>
            <p class="third-font-gray mt-4">2. Que la atención a la persona ha de ser integral.</p>
            <p class="third-font-gray mt-4">3. Que los SAER deben tener en cuenta la diversidad de culturas y de experiencias espirituales y religiosas.</p>
        </div>
    </section>
    <!-- collapse -->
    <div class="section">
        <div class="container main_container">
            <div class="row">
                <div class="col gx-0 gx-md-auto">
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="arrow-down"> 
                        <div class="d-flex justify-content-between align-items-end slick-green py-4 px-3 px-md-5">
                            <h3 class="mb-0 text-center">Qué ofrecemos:</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down"><img src="<?= $base_url ?>/files/img/SVG/tickGreen.svg" alt="img"></div>
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card no-border card-body slick-green pb-5">
                            <li class="mx-md-5 mt-3 third-font-gray">Detección y abordaje de las Necesidades Espirituales y Religiosas.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Acompañamiento espiritual y/o religioso individual, mediante la visita diaria a su habitación.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Atención particular a los familiares que deseen dialogar con nosotros.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Atención al final de la vida y al duelo.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Asesoramiento en cuestiones religiosas y éticas.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Celebración de los Sacramentos: Reconciliación, comunión diaria en la habitación, Unción de los enfermos, celebración de la Eucaristía los domingos.</li>
                            <li class="mx-md-5 mt-3 third-font-gray">Se facilita asistencia religiosa a las personas de otros credos, contactando con sus pastores o ministros siempre que lo soliciten.</li>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" id="arrow-down2"> 
                        <div class="d-flex justify-content-between align-items-end slick-orange py-4 px-3 px-md-5">
                            <h3 class="mb-0 text-center">¿Quiénes somos?</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down2"><img src="<?= $base_url ?>/files/img/SVG/tickYellow.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse center-movil" id="collapseExample2">
                        <div class="card no-border card-body slick-orange pb-5">
                            <p class="large mx-md-5 third-font-gray">El SAER del <span class="span-medium600">Hospital San Juan de Dios</span> de Sevilla está compuesto por:</p>
                            <p class="mx-md-5 third-font-gray">Profesional SAER, especializada en atención espiritual y religiosa</p>
                            <p class="large mx-md-5 third-font-gray"><span class="span-medium600">Sonia Moreno Guinea</span></p>
                            <a href="" id="auto-email-send"><button class="mx-md-5 flexy-yellow-btn my-4">sonia.moreno@sjd.es</button></a>
                            <p class="mx-md-5 third-font-gray">Sacerdote</p>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" id="arrow-down3"> 
                        <div class="d-flex justify-content-between align-items-end slick-blue py-4 px-3 px-md-5">
                            <h3 class="mb-0 text-center">¿Cómo contactar?</h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down3"><img src="<?= $base_url ?>/files/img/SVG/tickBlue.svg" alt="img"></div>
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample3">
                        <div class="card no-border card-body slick-blue pb-5">
                            <p class="large mx-md-5 third-font-gray">Contacto telefónico:</p>
                            <p class="large mx-md-5 third-font-gray"><span class="span-medium600"><a href="tel:954939300">954 939 300 (Hospital)</a></span></p>
                            <p class="mx-md-5 third-font-gray">Directamente a través de cualquier miembro del Equipo del SAER.</p>
                            <p class="mx-md-5 third-font-gray">El Hospital San Juan de Dios de Sevilla tratará sus datos para prestarle la asistencia religiosa o espiritual que ha solicitado. Puede ejercer sus derechos en el correo c03_dpo@sjd.es. Para más información consulte nuestra <a href="<?= $base_url ?>/politica-de-privacidad.php"><span class="span-medium600"><span class="link-blog">política de privacidad</span></span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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