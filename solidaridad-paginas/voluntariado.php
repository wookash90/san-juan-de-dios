<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Voluntariado";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- voluntariado -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/voluntariado.jpeg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Voluntariado</h1>
                    <p class="large third-font-gray mt-5"><span class="bold">CONTACTO:</span></p>
                    <p class="large third-font-gray mt-4">El Voluntariado de San Juan de Dios en la actualidad está integrado en la <span class="bold">Fundación Juan Ciudad-Comisión Interprovincial.</span> Si quieres formar parte de nuestro equipo de voluntarios, escríbenos a la siguiente dirección.</p>
                    <a href="" id="auto-email-send4"><p class="large"><span class="link-blog bold">Paloma.perez@sjd.es</span></p></a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <p class="third-font-gray">El voluntariado es una forma de solidaridad que está integrado en el proyecto asistencial desde los valores de la Orden Hospitalaria. La acción voluntaria tiene identidad propia en nuestro Centro y es complementaria a la labor de los profesionales para ofrecer una asistencia integral a la persona enferma y/o necesitada. Esta acción está coordinada para integrarse adecuadamente a la actividad sociosanitaria.</p>
                    <p class="third-font-gray">El objetivo central de nuestro voluntariado es <span class="bold">ESTAR y ACOMPAÑAR.</span> En la actualidad, el Hospital de San Juan de Dios cuenta con un equipo de personas voluntarias que colaboran en los distintos programas que desde el <span class="bold">Área de SOLIDARIDAD</span> se impulsan en nuestro Centro.</p>
                    <p class="third-font-gray">Los voluntarios y voluntarias de San Juan de Dios junto con el resto de colaboradores y hermanos presentes en los centros formamos parte de un proyecto asistencial en el que la razón de ser es la Personas Asistida. El voluntariado forma parte del personal de los centros como colaboradores de la Orden y tiene su espacio y sus funciones propias.</p>
                    <p class="third-font-gray">Acción del voluntariado La actividad en la que participa el voluntariado es muy diversa; acompañamiento en hospitalización, a mayores en soledad, acompañamiento telefónico, soporte a talleres, actividades de dinamización del tiempo libre, apoyo en la gestión de programas sociales, eventos culturales y solidarios y actividades de sensibilización… entre otros.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row my-5">
                <div class="col">
                    <h2 class="primary-font-blue center-movil">Programas en los que puedes participar como voluntario</h2>
                </div>
            </div>
            <div class="row my-5">
                <div class="col">
                    <ul class="third-font-gray suisse_intl">
                        <li class="my-2">ACOMPAÑAMIENTO Y APOYO EN LA PLANTA DE HOSPITALIZACIÓN.</li>
                        <li class="my-2">ATENCIÓN SOCIAL A LA INFANCIA</li>
                        <li class="my-2">SERVICIO BUCODENTAL</li>
                        <li class="my-2">APOYO PUNTUAL EN GESTIONES Y PEQUEÑOS GASTOS</li>
                        <li class="my-2">VOLUNTARIADO DOMICILIARIO</li>
                        <li class="my-2">VOLUNTARIADO INTERNACIONAL (en colaboración con la Fundación Juan Ciudad).</li>
                    </ul>
                    <p class="third-font-gray mt-4">Además, ofrecemos la posibilidad de acercar nuestra actividad social y voluntaria a todas aquellas empresas y centros educativos que quieran hacer la experiencia de llevar a cabo una labor social transformadora.</p>
                    <h3 class="primary-font-blue my-5">Enlaces de interés:</h3>
                    <a target=”_blank” href="<?= $base_url ?>/files/doc/Cuadriptico-voluntariado.pdf">
                        <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                            <h3 class="name primary-font-blue">Cuadríptico Voluntariado</h3>
                            <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                        </div>
                    </a>
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