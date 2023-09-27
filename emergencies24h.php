<?php $base_dir = dirname(__FILE__);
require_once "$base_dir/lib/app_data.php";
require "$base_dir/lib/head.php";
?>


<section class="container-emergencies pt-md-5">
    <div class="z-3">
        <div class="container">

            <div class="row d-flex justify-content-between">

                <div class="col-12 col-md-4 d-flex mt-md-0 mt-4 justify-content-md-start justify-content-center flex-column flex-md-row align-items-center gap-2">
                    <!-- <span class="span1 d-flex align-items-center flex-row">Hospital </span><span class="span2">San Juan de Dios </span><span class="span3">Sevilla</span> -->
                    <!-- <?= file_get_contents("$base_dir/files/img/emergencies24h/texto_cabecera_urgencias.svg"); ?>
                    <?= file_get_contents("$base_dir/files/img/emergencies24h/texto_cabecera_urgencias_movil.svg"); ?> -->
                    <p class="text-center"><span class="span1">Hospital</span><br><spam class="span2">San Juan de Dios</spam><br><span class="span3">Sevilla</span></p>

                </div>

                <div class="d-md-flex justify-content-center d-none col-md-4 text-center">
                    <?= file_get_contents("$base_dir/files/img/logos/logo_sjd.svg"); ?>
                    <!-- <a href="<?= $base_url ?>"><img class="imagen-logo" src="<?= $base_url ?>/files/img/emergencies24h/logo.png" alt="logo"></a>  -->
                </div>

                <div class="col-12 col-md-4 order-first order-md-last p-0 p-md-auto background-emergencies d-flex justify-content-md-end justify-content-center align-items-center">

                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span><img id="phone" src="<?= $base_url ?>/files/img/emergencies24h/phoneIcon.svg" alt="image"></span>
                        <span class="span-phone"><a href="tel:+34955045999 ">+34 955 045 999 </a></span>
                    </div>

                </div>

            </div>

        </div>
        <div class="container container-header container_principal_urgencias">
            <div class="row center-movil mx-1 ">
                <div class="col-12 gx-0 col-lg-6">
                    <div class="d-flex align-items-center gap-md-4 mb-5">
                        <div>
                           <!--  <img src="<?= $base_url ?>/files/img/emergencies24h/emergencies.png" alt="emergencias"> -->
                            <?= file_get_contents("$base_dir/files/img/emergencies24h/urgencias_logo_urgencias.svg"); ?>
                        </div>

                        <span class="font-emergencies font-family-emergencies texto_emergencies text-start">Emergencies 24h</span>
                    </div>
                    <div class="d-flex gap-5 mb-5 ms-3">
                    <?= file_get_contents("$base_dir/files/img/emergencies24h/logo_p_parking_urgencias_ingles.svg"); ?>
                       <!--  <img class="" src="<?= $base_url ?>/files/img/emergencies24h/parking.svg" alt="emergencias"> -->
                        <div class="text-start">
                            <span class="font-emergencies font-weight-emergencies font-family-emergencies">FREE PARKING</span><br><span class="font-emergencies-no-resaltado font-family-emergencies"> for patients</span>
                        </div>
                    </div>
                    <span>
                    <?= file_get_contents("$base_dir/files/img/emergencies24h/aseguradoras_header_urgencias.svg"); ?>
                        <!-- <img class="marcas" src="<?= $base_url ?>/files/img/emergencies24h/marcas.png" alt="familia"> -->
                    </span>
                    <div class="row my-5">
                        <div class="col-12 mb-4 mb-md-0 col-md-auto d-flex justify-content-center"><a href="https://sjdsevilla.com/pedir-cita?utm_source=emergencies-book-apointment&utm_medium=emergencies-book-apointment&utm_campaign=emergencies-book-apointment"><button class="btn-secondary tamaño-boton font-family-emergencies btns_urgencias_ingles">Book an appointment</button></a></div>
                        <div class="col-12 mb-4 mb-md-0 col-md-auto d-flex justify-content-center"><a id="divPhone" href="https://sjdsevilla.com/contacto?utm_source=emergencies-location&utm_medium=emergencies-location&utm_campaign=emergencies-location"><button class="btn-secondary d-flex justify-content-center align-items-center gap-2 span-boton-contacto font-family-emergencies btns_urgencias_ingles"><img id="imgPhone" src="<?= $base_url ?>/files/img/emergencies24h/phoneIcon.svg" alt="phone">Contact</button></a></div>
                    </div>
                </div>
                <div class=" col-12 gx-0 col-lg-6  d-flex flex-column justify-content-center">
                    <img class="position-relative imagen-emergencias" id="imagen_animacion_emergencias" src="<?= $base_url ?>/files/img/emergencies24h/familia-joven-sus-hijos-casa-divirtiendose.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<section class="mt-5">
    <div class="container my-5">
        <div class="mb-5 d-flex justify-content-center align-items-center flex-column d-lg-block">
            <img class="position-relative imagen-reloj" src="<?= $base_url ?>/files/img/emergencies24h/reloj.svg" alt="reloj">
            <h2 class="titulo2-emergencies titulo_ingles_emergencies">No queue</h2>
            <span class="span-titulo-emergencies">For urgent care and medical specialties</span>
        </div>

        <div class="row center-movil mx-1">

            <div class="col-12 gx-0 col-lg-6 primary-background-blue d-flex flex-column container-emergencies-24h border-radius-top">
                <img class="imagen-ambulancia imagen_ambulancia_true" src="<?= $base_url ?>/files/img/emergencies24h/ambulancia.svg" alt="ambulancia">
                <h2 class="h2 text-white mt-4 equal-margin m-0"><span class="span-medium emergencies24h_span_bold">Emergencies 24h</span></h2>
                <ul class="mt-4 mb-4 p-0">
                    <li class="checkIcon text-start"><img src="<?= $base_url ?>/files/img/emergencies24h/iconCheck.svg" alt="check"><span class="text-check text-check-ingles ms-3"> Pediatrics</span></li>
                    <li class="checkIcon text-start"><img src="<?= $base_url ?>/files/img/emergencies24h/iconCheck.svg" alt="check"><span class="text-check text-check-ingles ms-3"> Surgery</span> </li>
                    <li class="checkIcon text-start"><img src="<?= $base_url ?>/files/img/emergencies24h/iconCheck.svg" alt="check"><span class="text-check text-check-ingles ms-3"> General Medicine</span> </li>
                </ul>

                <div class="row d-flex align-items-center mt-4">
                    <div class="col-12 text-center  my-2 d-flex justify-content-center align-items-center "><a href="https://sjdsevilla.com/contacto?utm_source=emergencies-location&utm_medium=emergencies-location&utm_campaign=emergencies-location "><button class="btn-secondary boton-location tamaño-boton">Location</button></a></div>
                    <div class="col-12 text-center  my-2 d-flex justify-content-center align-items-center "><a href="https://sjdsevilla.com/contacto?utm_source=emergencies-location&utm_medium=emergencies-location&utm_campaign=emergencies-location"><button id="botonPhone" class="btn-secondary boton-contact d-flex justify-content-center align-items-center gap-2 border-contact tamaño-boton"><img id="imgBoton2" src="<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg" alt="phone">Contact</button></a></div>
                </div>

            </div>

            <div class="col-12 gx-0 col-lg-6 gradiente_movil_urgencias">
                <img class="img-100 z-3 borde_redondeado_movil" src="<?= $base_url ?>/files/img/emergencies24h/doctor-escuchando-pulmones-ninos-estetoscopio.jpg" alt="image">
            </div>

        </div>
    </div>

    <div class="container my-5">
        <div class="row center-movil mx-1">
            <div class="col-12 gx-0 col-lg-6 order-1 order-md-0">
                <img class="img-100 z-3" src="<?= $base_url ?>/files/img/emergencies24h/edificio.jpg" alt="image">
            </div>
            <div class="col-12 gx-0 col-lg-6 d-flex flex-column container-emergencies-24 ps-md-5 mb-5 mb-md-0">
                <img class="imagen-ambulancia imagen_ambulancia_false m-0" src="<?= $base_url ?>/files/img/emergencies24h/parking.svg" alt="ambulancia">
                <h2 class="h2 text-white mt-4 equal-margin m-0"><span class="span-medium text-parking">Free Parking</span>
                    <p class="text-parking">for patients</p>
                </h2>
                <p class="maxWidth-parking texto-aseguradoras-emergencias">Hospital San Juan de Dios Sevilla offers you a three-level parking garage in the neighborhood of Nervión</p>
                <div class="mt-4"><a href="https://sjdsevilla.com/contacto?utm_source=emergencies-location&utm_medium=emergencies-location&utm_campaign=emergencies-location "><button class="btn-secondary tamaño-boton btns_urgencias">Location</button></a></div>

            </div>
        </div>
    </div>
</section>

<section class="section-marcas margin-section">
    <div class="container">
        <p class="text-center texto-aseguradoras-emergencias">We work with the main health <span class="span-medium">insurance companies</span></p>

        <div class="row mt-5">
            <div class="col-6 col-md-12 d-flex justify-content-between flex-column  flex-lg-row align-items-center">
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/sanitas.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/mapfre.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/caser.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/dkv.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/plus.svg" alt="">
                </figure>
            </div>
            <div class="col-6 col-md-12 d-flex justify-content-between flex-column  flex-lg-row align-items-center">
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/aegon.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/catalana.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/generali.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/bilbao.svg" alt="">
                </figure>
                <figure>
                    <img class="tamaño-img my-2 my-lg-0" src="<?= $base_url ?>/files/img/emergencies24h/marcas/divinapastora.svg" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>

<section class="footer-hospital-san-juan border-footer-emergencias mt-5 pb-5">
    <div class="container d-none d-lg-block">

        <div class="text-center pt-5 text-footer"><?= file_get_contents("$base_dir/files/img/emergencies24h/logo_urgencias_blanco_footer.svg"); ?></div>

        <div class="row mt-5 d-flex flex-md-row flex-column align-items-center">

            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-start mt-4 flex-column">
                <p class="p-footer">Hospital San Juan de Dios de Sevilla</p>
                <p class="p-footer">C/ San Juan de Dios, 1</p>
                <p class="p-footer">41005 | SEVILLA</p>
            </div>

            <div class="col-lg-4 d-lg-flex  d-flex justify-content-center">
                <figure>
                    <a href="<?= $base_url ?>"><img src="<?= $base_url ?>/files/img/emergencies24h/logo2.svg" alt=""></a>
                </figure>
            </div>

            <div class="col-lg-4 col-6 d-flex justify-content-end order-first order-md-last">
                <div class="container-div-footer d-flex align-items-lg-end align-items-center flex-column">
                    <div class="mb-3">
                        <span class="mx-lg-3"><a href="https://www.facebook.com/hospitalsanjuandediossevilla"><img class="dropdown-menu-media" src="<?= $base_url ?>/files/img/emergencies24h/facebook.svg" alt="image"></a> </span>
                        <span><a href="https://www.instagram.com/hospital_sjd_sevilla"><img class="dropdown-menu-media" src="<?= $base_url ?>/files/img/emergencies24h/instagram.svg" alt="image"></a> </span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-2 tamañoSpan">
                        <span><img src="<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg" alt="image"></span>
                        <a href="tel:+34955045999 "><span class="text-white">+34 955 045 999 </span></a>
                    </div>
                    <p class="text-white tamañoSpan"><a href="<?= $base_url ?>">sjdsevilla.com</a></p>
                </div>
            </div>

        </div>
    </div>
    <div class="container d-lg-none">
        <div class="row pt-5 d-flex flex-md-row flex-column align-items-center">
            <div class="col-lg-4 d-lg-flex  d-flex justify-content-center">
                <figure>
                    <a href="<?= $base_url ?>"><img src="<?= $base_url ?>/files/img/emergencies24h/logo2.svg" alt=""></a>
                </figure>
            </div>
            <p class="text-center"><span class="span1_footer">Hospital</span><br><spam class="span2_footer">San Juan de Dios</spam><br><span class="span3_footer">Sevilla</span></p>
            <div class=" d-flex justify-content-center align-items-center text-center mt-4 flex-column">

                <p class="p-footer">Hospital San Juan de Dios de Sevilla</p>
                <p class="p-footer">C/ San Juan de Dios, 1</p>
                <p class="p-footer">41005 | SEVILLA</p>
            </div>
            <div class="d-flex justify-content-center align-items-center gap-2 tamañoSpan my-4">
                <span><img src="<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg" alt="image"></span>
                <a href="tel:+34955045999 "><span class="text-white">+34 955 045 999 </span></a>
            </div>
            <div class="mb-3 d-flex justify-content-center ">
            <a href="https://www.facebook.com/hospitalsanjuandediossevilla" target="_blank"><img class="dropdown-menu-media-urgencias mx-4" src="<?= $base_url ?>/files/img/SVG/facebook.svg" alt="SJD Facebook"></a>
                <span><a href="https://www.instagram.com/hospital_sjd_sevilla"><img class="dropdown-menu-media urgencias_social" src="<?= $base_url ?>/files/img/emergencies24h/instagram.svg" alt="image"></a> </span>
            </div>
        </div>
    </div>
</section>


<?php
require "$base_dir/lib/foot.php"; ?>

<script>
    window.addEventListener('DOMContentLoaded', () => {

        document.getElementById('divPhone').addEventListener('mouseover', () => {
            document.getElementById('imgPhone').src = '<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg'
        })

        document.getElementById('divPhone').addEventListener('mouseout', () => {
            document.getElementById('imgPhone').src = '<?= $base_url ?>/files/img/emergencies24h/phoneIcon.svg'
        })

        document.getElementById('botonPhone').addEventListener('mouseover', () => {
            document.getElementById('imgBoton2').src = '<?= $base_url ?>/files/img/emergencies24h/phoneIcon.svg'
        })

        document.getElementById('botonPhone').addEventListener('mouseout', () => {
            document.getElementById('imgBoton2').src = '<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg'
        })

        if (screen.width < 576) {
            document.getElementById('phone').src = "<?= $base_url ?>/files/img/emergencies24h/phoneWhite.svg"
        } else {
            document.getElementById('phone').src = "<?= $base_url ?>/files/img/emergencies24h/phoneIcon.svg"
        }

    })
</script>