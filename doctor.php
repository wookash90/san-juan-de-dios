<?php $base_dir = dirname(__FILE__);
require_once "$base_dir/lib/app_data.php";
$slug = !empty($_GET['e']) ? $_GET['e'] : '';
$doctor = $elem = $doctores[$slug];
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- Home -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url.$doctor->img_main ?>" alt="<?= $doctor->title ?>">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5"><?= $doctor->title ?></h1>
                    <p class="large third-font-gray mt-4"><?= $doctor->intro; ?></p>
                    <div class="col-5 doctor-buttons d-flex flex-column align-items-center">
                        <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a>
                        <!-- <button class="btn-third mt-3">Conócelo</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!--  -->
    <?php require "$base_dir/lib/principales-aseguradoras.php" ?>
    <!-- CV -->
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex d-md-block justify-content-center">
                    <img class="doctor-portrait-sm" src="<?= $base_url.$doctor->img_min ?>" alt="<?= $doctor->title ?>">
                    <div class="info-doctor margin-desktop-top">
                        <p class="third-font-gray mb-0">Años de experiencia</p>
                        <h4 class="primary-font-blue"><?= $doctor->anyos ?></h4>
                        <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a>
                    </div>
                </div>
                <div class="col-12 mt-5 order-md-3 text-columns-1 text-columns-md-2">
                    <?= $doctor->body ?>
                </div>
                <div class="col-12 col-md-6 mt-5 order-md-2 text-center mb-5 mb-md-0">
                    <img class="img-100 image-high-five" src="<?= $base_url ?>/files/img/highfive-min.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- testimonio -->
    <section class="secondary-green-opacity">
        <div class="container mb-5 margin-desktop-top border-radius-movil">
            <div class="row center-movil">
                <div class="col-12 col-md-6 mt-md-5 pe-md-5">
                    <div class="margin-box"></div>
                    <?php if(!$doctor->body2) { ?>
                        <h2 class="pb-5 pb-md-0 primary-font-blue margin-desktop-top10">La tranquilidad de saber que estás en<span class="span-medium span-block2">buenas manos</span></h2>
                    <?php } else { ?>
                        <?= $doctor->body2; ?>
                    <?php } ?>
                    
                </div>
                <div class="col-12 col-md-6 sala-vidas-img-container gx-0">
                    <img class="sala-vidas-img" src="<?= $base_url ?>/files/img/manwithchild-min.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row" id="first_row">
                <div class="col-12 center-movil"> 
                    <h2 class="primary-font-blue">Nuestros otros especialistas</h2>
                </div>
            </div>
            <div class="row" id="second_row">
                <?php $current_doctor = $doctor->especialidades ?>
                <?php foreach ($doctores as $doctor){
                    if(in_array($current_doctor[0], $doctor->especialidades) && $doctor->especialista) {?>
                <div class="col-6 col-md-4 otros-container mt-5 text-center"><img class="img-100" src="<?= $base_url.$doctor->img_min ?>" alt="image"><p><?= $doctor->title ?></p></div>
                    <?php  }
                } ?>
            </div>
        </div>
    </section>
    <?php if($current_doctor[0] === "pediatria-sevilla") require "$base_dir/lib/centro-de-atencion.php";?>
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
<script>
    if ($("#second_row").children().length == 0){
            $("#first_row").remove();
        }
</script>