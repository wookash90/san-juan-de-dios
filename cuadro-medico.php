<?php $base_dir = dirname(__FILE__);
$web_title = "Cuadro médico";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";
?> 
<main>
    <section>
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col">
                    <h1 class="primary-font-blue">Cuadro médico</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container" id="hacker-list">
            <div class="row">
                <div class="col-12 col-lg-4 mt-3 dropdown">       
                    <input onclick="toggleServiciosName()" id="buscar-input" class="search text-center" placeholder="Buscar" />
                    <ul onclick="handleChange(event)" class="dropdown-menu animate slideIn suisse_intl" id="dropdown-servicios">
                        <li>Urgencias</li>
                        <li>Medicina interna</li>
                        <li>Pediatría y Áreas Específicas</li>
                        <li>Traumatología y Cirugía Ortopédica</li>
                        <li>Otorrinolaringología</li>
                        <li>Oftalmología</li>
                        <li>Cardiología</li>
                        <li>Urología</li>
                        <li>Neurología</li>
                        <li>Dermatología Quirúrgica y Venereología</li>
                        <li>Obstetricia y Ginecología</li>
                        <li>Aparato digestivo</li>
                        <li>Neurocirugía</li>
                        <li>Alergología</li>
                        <li>Cirugía Maxilofacial</li>
                        <li>Hematología y Hemoterapia</li>
                        <li>Medicina Intensiva</li>
                        <li>Endocrinología y Nutrición</li>
                        <li>Anestesiología y Reanimación</li>
                        <li>Neumología</li>
                        <li>Psicología</li>
                        <li>Rehabilitacion</li>
                        <li>Ostomia</li>
                        <li>Oncología Médica</li>
                    </ul>     
                </div>
                <div class="col-12 col-lg-2 text-center mt-3">
                    <div class="sort" data-sort="name">Ordenar por nombre</div>
                </div>
            </div>
            <!-- each servicio -->
            <div class="list row primary-font-blue text-center mt-4">
                <?php foreach ($especialidades as $k => $especialidad) {
                    if($especialidad->title_especialidad != "Rehabilitacion" && $especialidad->title_especialidad != "Cirugía plástica" && $especialidad->title_especialidad != "Neumología"){?>
                    <div class="name-to-search col-12 col-lg-6 my-5 pt-md-5">
                        <div class="d-flex align-items-center">
                        <img class="servicios-icon-doctores" src="<?= $base_url.$especialidad->icon ?>" alt="<?= $especialidad->short_title; ?>">
                        <h4 class="name mx-3"><?= $especialidad->short_title; ?></h4>
                        </div>
                        <div class="d-flex justify-content-center justify-content-md-start mt-5 ms-md-5">
                        <?php foreach ($doctores as $d => $doctor){
                            if(in_array($k, $doctor->especialidades) && $doctor->jefe) {?>
                        <a href="<?= $base_url.'/doctor?e='.$d ?>"><div class="otros-container doctor_min_img"><img class="img-100" src="<?= $base_url.$doctor->img_min ?>" alt="image"><p class="m-2"><?= $doctor->title ?></p></div></a>
                          <?php  }
                        } ?>
                        </div>
                    </div>
                <?php }} ?>
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
<!-- drop search -->
<script type="text/javascript" src="<?= $base_url ?>/src/js/list.js"></script>
<script>
    var options = {
    valueNames: [ 'name' ],
    data: ['id']
    };

    var hackerList = new List('hacker-list', options);
</script>
<script type="text/javascript" src="<?= $base_url ?>/src/js/list.js"></script>
<script>
    var options = {
    valueNames: [ 'name' ],
    data: ['id']
    };

    var hackerList = new List('hacker-list', options);
</script>