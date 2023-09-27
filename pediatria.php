<?php $base_dir = dirname(__FILE__);
$web_title = "Pediatría";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- home -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/pediatria-img.webp" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="h1 primary-font-blue mt-5">Pediatría</h1>
                    <p class="p15 third-font-gray mt-4">Ofrecemos una atención médica completa e integral, desde niños recién nacidos a adolescentes. Atención eficiente, segura y de calidad a la población pediátrica.</p>
                    <div class="col-5 doctor-buttons">
                        <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?>
    <!-- info -->
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col center-movil">
                    <p class="open-sans-reg third-font-gray">El servicio de Pediatría del Hospital San Juan de Dios Sevilla va dirigido a toda la población infantil, tanto sana como enferma, por lo que se cubren todos los cuidados y necesidades para el buen desarrollo y toda la atención médica de los niños desde el nacimiento hasta la adolescencia.</p>
                    <p class="open-sans-reg third-font-gray">Esta atención integral se lleva a cabo con controles de salud desde los primeros días de vida del paciente. En estos controles de salud no solo se valorará su desarrollo físico, psicológico y social, ya que nuestro objetivo es lograr la mayor excelencia en salud en todos los aspectos: preventivos, curativos y paliativos. Para ello contamos con un gran equipo de profesionales y especialistas.</p>
                    <p class="open-sans-reg third-font-gray span-medium600">Áreas de especialización</p>
                    <p class="open-sans-reg third-font-gray">La cartera de servicios de Pediatría busca atender las demandas y necesidades de estos pacientes en todas sus edades. Para ello contamos con consultas externas para revisiones de salud o de patologías frecuentes de la infancia, consultas de diferentes especialidades pediátricas, área de urgencias, observación y atención al paciente crítico pediátrico las 24 horas.</p>
                    <p class="open-sans-reg third-font-gray">Para satisfacer las expectativas y necesidades de todos los usuarios, además de la atención del paciente en consultas y urgencias se ofrece la coordinación con todas las especialidades médicas y hospitalizaciones.</p>
                    <p class="open-sans-reg third-font-gray">En las consultas externas de esta área, en la primera planta, se realiza bajo demanda la instauración, seguimiento y desarrollo de los diferentes procesos asistenciales y planes integrales de salud. Además, un factor clave en esta especialidad es la promoción de la salud y prevención.</p>
                    <p class="open-sans-reg third-font-gray span-medium600">Servicios diferenciales</p>
                    <p class="open-sans-reg third-font-gray">Los profesionales que trabajan en esta unidad han elaborado unos cuidados procedimientos y protocolos en materia de promoción de la salud y prevención, algo sumamente importante para que nuestros niños crezcan sanos y desarrollen todo su potencial, además de prevenir enfermedades en el futuro.</p>
                    <p class="open-sans-reg third-font-gray">Para ello, las revisiones o controles de salud son fundamentales. Es conveniente acudir a los controles periódicamente, independientemente de que los niños estén o no sanos. En estas consultas, además de dar pautas para una vida saludable, se pueden detectar alteraciones en el crecimiento y desarrollo e identificar enfermedades en fases tempranas.</p>
                    <p class="open-sans-reg third-font-gray">Ofrecemos una atención cálida y cercana, informando de forma clara y adaptada a cada familia de todos los procesos a los que son sometidos los menores, con una inmediatez que otros hospitales no pueden dar. Sí necesitas asistencia o realizar algún tipo de pregunta o duda, tenemos consultas todas las semanas.</p>
                    <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-4">Más información</button></a>
                </div>
            </div>
        </div>
    </section>
    <!--  -->
    <?php require "$base_dir/lib/principales-aseguradoras.php" ?>
    <!-- testimonio -->
    <section class="secondary-green-opacity">
        <div class="container mb-5 margin-desktop-top border-radius-movil">
            <div class="row center-movil">
                <div class="col-12 col-md-6 mb-4">
                    <div class="margin-box"></div>
                    <!-- <h4 class="p15 primary-font-blue mt-3 margin-desktop-top10">Testimonio</h4> -->
                    <h2 class="h2 primary-font-blue margin-desktop-top10">La tranquilidad de saber que estás en<span class="span-medium span-block2">buenas manos</span></h2>
                    <p class="p15 third-font-gray my-4 margin-desktop-right15">Nuestro espacio de urgencias destinado a los más pequeños está especialmente adaptado a ellos, tanto con profesionales especializados en medicina infantil, como con instalaciones y entornos pensados para su comodidad y la de sus familiares.</p>
                    <!-- <p class="p15 third-font-gray my-4 margin-desktop-right15 margin-desktop-top10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p> -->
                </div>
                <div class="col-12 col-md-6 sala-vidas-img-container gx-0">
                    <img class="sala-vidas-img" src="<?= $base_url; ?>/files/img/manwithchild-min.png" alt="image">
                    <!-- <img class="sala-vidas-play online-store display-none-block" src="<?= $base_url; ?>/files/img/SVG/blueplaybtn.svg" alt="img"> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Profesionales del servicio -->
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 center-movil">
                    <h2 class="h2 primary-font-blue">Profesionales del servicio</h2>
                </div>
                <div class="col-12 d-flex justify-content-evenly mt-5 flex-column flex-md-row">
                    <?php foreach ($doctores as $slug => $doctor) {
                        if(!in_array('pediatria', $doctor->especialidades)) continue; ?>
                        <div class="text-center">
                            <a href="<?= $base_url ?>/doctor?d=<?= $slug ?>"><img class="doctor-portrait-sm mt-4" src="<?= $base_url.$doctor->img_min ?>" alt="image"></a>
                            <h3 class="h3 primary-font-blue mt-3"><?= $doctor->title; ?></h3>
                        </div>
                    <?php } ?>
                </div>
                <!-- <div class="col-12 center-movil">
                    <h2 class="h2 primary-font-blue mt-5">Descripción</h2>
                    <p class="open-sans-reg third-font-gray mt-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                    <p class="open-sans-reg third-font-gray mt-4">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Principales consultas -->
    <section>
        <div class="container my-5 margin-desktop-top">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 center-movil px-5">
                    <h2 class="h2 primary-font-blue">Principales consultas</h2>
                    <!-- <p class="open-sans-reg mt-4 third-font-gray">Lorem ipsum dolor sit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p> -->
                    <div class="d-flex mt-4">
                        <div class="col open-sans-semi third-font-gray l-style-none">
                            <li class="mt-4">Catarro de vías altas</li>
                            <li class="mt-4">Faringoamigdalitis</li>
                            <li class="mt-4">Otitis</li>
                            <li class="mt-4">Conjuntivitis</li>
                        </div>
                        <!-- <div class="col open-sans-semi third-font-gray l-style-none">
                            <li>Lorem 4</li>
                            <li>Lorem 5</li>
                            <li>Lorem 6</li>
                        </div> -->
                    </div>
                    <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn my-5">Pedir cita</button></a>
                </div>
                <div class="col-12 col-md-6 order-md-1">
                    <img class="img-100" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-pediatria-lactancia.webp" alt="image">
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