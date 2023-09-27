<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Documentación del paciente";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- documentacion del paciente -->
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col center-movil">
                    <h1 class="primary-font-blue my-5 mt-md-4">Documentación de apoyo al <span class="bold">paciente</span></h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container" id="hacker-list">
            <div class="row">
                <div class="col-12 col-lg-4 mt-3">
                    <input placeholder="Título" class="search" />
                </div>
                <div class="col-12 col-lg-2 text-center mt-3">
                    <div class="sort" data-sort="name">Ordenar por nombre</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="list">
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/DERECHOS-DEBERES-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Derechos y Deberes</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Formulario de solicitud de Historia Clinica.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Formulario de solicitud de Historia Clínica</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/guia-de-acogida-del-paciente.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Guía de acogida del paciente</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/guia_de_acogida_familiares_de_pacientes.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Guía de acogida familiares de pacientes en UCI</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/guiaDelusuario.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Guía del usuario de Atención Temprana</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Informacion-para-paciente-que-va-a-realizarse-una-Endoscopia-Digestiva.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Información para paciente que va a realizarse una Endoscopia Digestiva</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Informacion-para-paciente-que-va-a-ser-intervenido.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Información para paciente que va a ser intervenido</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col">
                    <h2 class="h2 primary-font-blue">Memorias de solidaridad</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2020-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2020</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2019-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2019</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2018-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2018</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2017-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2017</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2016-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2016</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2015-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2015</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2014-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2014</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a> 
                        <a target=”_blank” href="<?= $base_url ?>/files/doc/Memoria 2013-obra-social-sevilla.pdf">
                            <div class="d-flex justify-content-between my-5 p-4 border-documentacion">
                                <h3 class="name primary-font-blue">Memoria 2013</h3>
                                <img src="<?= $base_url ?>/files/img/pdficon.svg" alt="image">
                            </div>
                        </a>   
                    </div>
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
<script type="text/javascript" src="<?= $base_url ?>/src/js/list.js"></script>
<script>
    var options = {
    valueNames: [ 'name' ],
    };

    var hackerList = new List('hacker-list', options);
</script>