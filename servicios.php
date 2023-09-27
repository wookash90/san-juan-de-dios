<?php $base_dir = dirname(__FILE__);
require_once "$base_dir/lib/app_data.php";
$web_title = "Cartera de Servicios del Centro";
$slug = !empty($_GET['e']) ? $_GET['e'] : '';
// $especialidad = $elem = $especialidades[$slug];      tab name 'urgencias'
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- Servicios -->
    <section>
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col">
                    <h1 class="primary-font-blue"><span class="span-block">Cartera de Servicios</span> del Centro</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container" id="hacker-list">
            <div class="row">
                <!-- <select class="js-example-basic-single" name="state">
                    <option value="AL">Urgencias</option>
                    <option value="AL">Medicina interna</option>
                    <option value="AL">Pediatría y Áreas Específicas</option>
                    <option value="AL">Traumatología y Cirugía Ortopédica</option>
                    <option value="WY">Otorrinolaringología</option>
                </select> -->
                <div class="col-12 col-lg-4 mt-3 dropdown">       
                    <input id="buscar-input" class="search text-center" placeholder="Buscar servicios y especialidades" />
                    <ul onclick="handleChange(event)" class="dropdown-menu animate slideIn" id="dropdown-servicios">
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
                <!-- <div class="col-12 col-md-3 mt-3">
                    <input class="search text-center" placeholder="Aseguradoras" />
                </div> -->
                <div class="col-12 col-lg-3 col-xl-2 text-center mt-3">
                    <div class="sort" data-sort="name">Ordenar por nombre</div>
                </div>
            </div>
            <div class="list row primary-font-blue text-center mt-4">
                <?php foreach ($especialidades as $k => $especialidad) {?>
                    <div class="name-to-search col-6 col-md-3">
                        <a href="<?= !$especialidad->fake_link ? $base_url.$k : $base_url.'/contacto'; ?>"><img class="mt-5 servicios-icon" src="<?= $base_url.$especialidad->icon ?>" alt="<?= $especialidad->short_title; ?>"></a>
                        <h4 class="mt-3 small name"><?= $especialidad->short_title; ?></h4>
                    </div>
                <?php } ?>
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
<script type="text/javascript" src="<?= $base_url ?>/src/js/list.js"></script>
<script>
    var options = {
    valueNames: [ 'name' ],
    data: ['id']
    };

    var hackerList = new List('hacker-list', options);
</script>
