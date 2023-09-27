<?php $base_dir = dirname(__FILE__);
$web_title = "Servicio de cita previa";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php"; ?>
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php"; ?>
    <!-- Servicio de cita previa -->
    <section>
        <div class="container main_container">
            <span class="d-flex align-items-center gap-3">

                <h2 class="titulo-cita m-0" id="ancla_pedircita">Pide tu cita online</h2>
                <span><img class="icon-blanco display-none-block" src="<?= $base_url ?>/files/img/SVG/pedir-cita-icon-material-phone-iphone.svg" alt=""></span>
            </span>
            <div class="row ">
                <div class="col-12 col-lg-6 d-lg-inline d-flex justify-content-center">
                    <iframe id="mop_iframe" frameborder="0" name="mop_iframe" scrolling="no" style="width:100%; height:500px; " allowtransparency="true"></iframe>
                    <script type="text/javascript">
                        window.scrollTo = function() {};
                        var mop_source = "https://app.tuotempo.com/mop/index.php?dbName=tt_ticares_sjd_sevilla_prod";
                    </script>
                    <script type="text/javascript" src="https://app.tuotempo.com/js/mop_loader.js.php"></script>
                </div>
                <div class="col-12 col-lg-6">
                    <figure>
                        <img class="w-100 mt-5 mt-lg-0 imagen-cita" src="<?= $base_url ?>/files/img/Grupo-58p2.jpg" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5 bg-cita">
        <div class="container pb-md-5">
            <div class="row d-lg-flex justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-6 order-lg-0 order-1">
                    <img class="imagen-cita w-100 mb-lg-0 mb-4" src="<?= $base_url ?>/files/img/retrato-hermosa-enfermera-sonriente-estacion-escritorio.jpg" alt="image">
                </div>
                <div class="col-12 col-lg-6 center-movil ps-md-5 mb-5 mb-lg-0">
                    <h1 class="primary-font-blue titulo-cita">Cita telefónica</h1>
                    <span class="d-md-flex text-center align-items-center py-4"><img class="icon-blanco display-none-block" src="<?= $base_url ?>/files/img/SVG/ic_phone_24px.svg" alt="">
                        <h2 class="primary-font-blue mx-3"><span class="bold"><a class="font-cita font-size36" href="tel:+34954939300"> 955 045 999</a></span></h2>
                    </span>
                    <p class="large third-font-gray mt-4 font-cita">Pide tu cita llamando directamente a nuestro teléfono de atención de citas o el siguiente formulario de citas indicando tus datos y describiendo brevemente el motivo de tu solicitud.</p>
                    <p class="large third-font-gray mt-4 font-cita">Si lo prefieres indícanos tu número de teléfono y nos pondremos en contacto contigo a la mayor brevedad.</p>
                    <?php require "$base_dir/lib/llamame-form.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- form -->
    <section class="blue-opacity-light pb-3">
        <div class="container">
            <div class="row">
                <h2 class="primary-font-blue mt-5">Formulario de contacto</h2>
                <p class="large third-font-gray mt-4">Si quiere recibir más información, o contactar con nosotros, rellene el siguiente formulario y nos pondremos en contacto con usted.</p>
            </div>
        </div>
        <div class="container form-width my-5">
            <?php require "$base_dir/lib/cita.php"; ?>
        </div>
    </section>
    <section>
        <div class="mapouter mapouter-width">
            <div class="gmap_canvas gmap_canvas-width"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Hospital%20San%20Juan%20de%20Dios%20de%20Sevilla%20Avenida.%20Eduardo%20Dato,%2042,%2041005%20%7C%20SEVILLA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net"></a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 600px;
                    }
                </style><a href="https://www.embedgooglemap.net">how to add a google map to your website</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 600px;
                    }
                </style>
            </div>
        </div>
    </section>
    <!-- Centro de Atención -->
    <?php require "$base_dir/lib/centro-de-atencion.php"; ?>
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php"; ?>
    <!-- blue -->
    <?php require "$base_dir/lib/cartera-de-servicios-azul.php"; ?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php"; ?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php"; ?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php"; ?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php"; ?>
