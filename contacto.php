<?php $base_dir = dirname(__FILE__);
$web_title = "Contacto";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- contacto -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-privado-sevilla-contactar-parking-nervion.webp" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5">Cómo llegar</h1>
                    <h4 class="primary-font-blue mt-4">Aparcamientos</h4>
                    <p class="third-font-gray mt-3">Cuenta con zona de aparcamiento y diversos accesos adaptados. Acceso a parking por la calle Marqués de Nervión.</p>
                    <h4 class="primary-font-blue mt-4">Transporte público</h4>
                    <p class="third-font-gray mt-3">Se puede acceder a sus instalaciones mediante transporte público.<br>
                    Autobús: <strong>Líneas 05, 22, 32, 52, A4 y B4.</strong><br>
                    Metro: <strong>Línea 1, estaciones Nervión y Gran Plaza.</strong></p>
                </div>
            </div>
        </div>
    </section>
    <section class="blue-opacity-light">
        <div class="container main_container">
            <div class="row">
                <div class="col-12 col-md-7 text-left">
                    <h2 class="primary-font-blue mt-5">Formulario de contacto</h2>
                    <p class="third-font-gray mt-4">Si quiere recibir más información, o contactar con nosotros, rellene el siguiente formulario y nos pondremos en contacto con usted o llama al <a href="tel:+34954939300"><strong>+34 954 939 300</strong></a></p>
                </div>
            </div>
        </div>
        <div class="container main_container form-width">
            <div class="row">
                <div class="col pb-3 on_blue">
                    <?php require "$base_dir/lib/contacto.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="mapouter mapouter-width"><div class="gmap_canvas gmap_canvas-width"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Hospital%20San%20Juan%20de%20Dios%20de%20Sevilla%20Avenida.%20Eduardo%20Dato,%2042,%2041005%20%7C%20SEVILLA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">how to add a google map to your website</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
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

    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php";?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>
<!-- select2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            "language": {
            "noResults": function() {
                return "Sin resultados"
                }
                },
            minimumResultsForSearch: 6,
            escapeMarkup: function (markup) {
            return markup
            }
        });
    });
</script> -->
<script type="text/javascript" src="<?= $base_url ?>/src/js/list.js"></script>
<script>
    var options = {
    valueNames: [ 'name' ],
    data: ['id']
    };

    var hackerList = new List('hacker-list', options);
</script>