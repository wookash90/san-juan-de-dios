<?php $base_dir = dirname(__FILE__);
$web_title = "Fides";
$page_description = "El Servicio FIDES Hospital San Juan de Dios de Sevilla facilita todos los trámites a los pacientes, desde resolución de dudas y consultas hasta gestiones administrativas.";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- Companias -->
    <section class="img-background-fides">
        <div class="container-md padding-desktop-top">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-5 mt-5">
                    <div class="fides-card">
                        <div class="d-flex flex-column equal-margin">
                            <h2 class="h1"><span class="span-bold">FIDES</span><span class="h3 d-block">Nuevo modelo de atención 360º</span></h2>
                            <p class="my-3">El centro hospitalario San Juan de Dios de Sevilla ha integrado el gestor <b><strong>FIDES,</strong></b> un novedoso modelo de gestión que ayuda a los pacientes en todos sus trámites, desde gestiones administrativas, acompañamientos, citas, hasta la resolución de dudas y consultas.</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1 class="invisible">FIDES Atención humanitaria 360º</h1>
    </section>
    <section>
        <div class="container main_container">
            <div class="row d-md-flex justify-content-between">
                <div class="col-12 col-lg-6 pe-md-5">
                    <h2 class="secondary-font-green center-movil">Atención desde el inicio y las 24 horas del día</h2>
                    <p class="third-font-gray mt-4 center-movil">El Hospital San Juan de Dios de Sevilla, ha integrado el servicio FIDES como parte de su proceso de modernización y dinamización de las gestiones. Este modelo de gestión ayuda a los pacientes más vulnerables en sus trámites administrativos, gestiones y cualquier tipo de dudas que puedan surgir cuando se necesita algún tipo de asistencia sanitaria.</p>
                    <p class="third-font-gray mt-4 center-movil">A través de este sistema, recibirás un trato único y cercano. En FIDES encuentras todos los servicios del hospital y mediante email, sms o llamada telefónica puedes contactar directamente con tu Gestor. Con él/ella de una forma personalizada puedes contactar las 24 horas del día. Puedes pedir desde una primera cita médica, pedir una revisión, cambiar alguna cita, así como cualquier otra gestión o consulta que necesites realizar.</p>
                </div>
                <div class="col-12 col-lg-6 mt-5 mt-lg-0 d-md-flex justify-content-end fides_video_container gx-0">
                    <div class="gx-0 d-flex justify-content-center align-items-center position-relative">
                        <video autoplay playsinline muted loop class="sin_esperas_video_green">
                            <source src="<?= $base_url ?>/files/video/hospital-sin-esperas-popup.mP4" type="video/mp4" title="" alt="">
                        </video>
                        <div class="text-green-section">
                            <div class="d-flex flex-column align-items-center">
                                <button type="button" class="button-modal mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><img onclick="startModalVideo()" class="play_esperas_btn" src="<?= $base_url ?>/files/img/play.svg"></button>
                                <h2 class="h2-fides text-white center-movil p-md-5 pb-md-0">El Gestor FIDES gestiona todo lo necesario al paciente, facilitando horarios, gestión de citas y revisiones, siempre gestionando su caso de manera personalizada.</h2>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-index">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button onclick="stopModalVideo()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body modal_video">
                                                <video id="modal-video" controls playsinline src="<?= $base_url ?>/files/video/hospital-sin-esperas-popup.mP4"></video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row secondary-green-opacity border-1rem">
                <div class="col secondary-font-green py-5 px-md-5">
                    <h2 class="text-center"><span class="bold">Ventajas del protocolo FIDES</span></h2>
                    <p class="mt-5">El nuevo modelo de atención humanizada 360º, busca que todas las personas que visiten el Hospital San Juan de Dios de Sevilla, y en especial las personas en situación de vulnerabilidad, encuentren una atención completa y de calidad, con un servicio personalizado desde el primer minuto con atención pre-asistencial, durante su estancia y un control personalizado post-asistencial, una vez finalizada su intervención o incluso habiendo recibido el alta. </p>
                    <p class="mt-4">El paciente tendrá una relación directa e inmediata con su Gestor FIDES, que podríamos decir que es como  tener a un conocido, amigo o familiar atendiendote cuando lo necesites. Con ello, ofrecemos exclusividad, personalización y agilizar la atención, a la vez que innovamos en nuestros procedimientos para adaptarnos a las nuevas demandas que han aparecido con las nuevas generaciones, cada día más digitalizadas.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row d-md-flex justify-content-between">
                <div class="col-12 col-md-6">
                    <img class="img-companias border-1rem" src="./files/img/fidesIMG/gestor-fides-san-juan-de-dios-sevilla.png" alt="image">
                </div>
                <div class="col-12 col-md-6 ps-md-5">
                    <h2 class="secondary-font-green center-movil mt-5 mt-md-0">¿A quién va dirigido?</h2>
                    <p class="third-font-gray mt-4 center-movil">El Gestor FIDES, basado en un modelo de atención 360º, va destinado principalmente a dos tipos de usuarios:</p>
                    <ul class="suisse_intl">
                        <li class="third-font-gray my-5">Pacientes con especial vulnerabilidad: pacientes que debido a su diagnóstico tengan una mayor dificultad para acceder a los servicios del hospital, requieran de una atención más personalizada para la realización de trámites administrativos, autorizaciones con las compañías, mayor dedicación para explicarle tratamientos, seguimiento post-quirúrgico y acompañarlos en todo momento.</li>
                        <li class="third-font-gray my-5">Pacientes que requieren trámites administrativos complejos: aquellos pacientes que, por la dificultad y especialidad quirúrgica, requieran de una mayor atención para elaboración de presupuestos, organización de la intervención quirúrgica y coordinación del circuito del paciente.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row d-md-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 d-md-flex justify-content-end">
                    <img class="img-companias border-1rem" src="./files/img/fidesIMG/fides-san-juan-de-dios-sevilla.png" alt="image">
                </div>
                <div class="col-12 col-md-6 order-md-1 pe-md-5">
                    <h2 class="secondary-font-green center-movil mt-5 mt-md-0">¿Cómo funciona?</h2>
                    <p class="secondary-font-green mt-4 center-movil fides-p-style">Disponible las 24 horas del día a través de teléfono móvil, Whatsapp o email</p>
                    <p class="secondary-font-green mt-4 center-movil fides-p-style">Modelo 360º: control asistencial, gestiones, visitas, acompañamientos, autorizaciones, citas</p>
                    <p class="secondary-font-green mt-4 center-movil fides-p-style">Atención completa y de calidad</p>
                </div>
            </div>
        </div>
    </section>
    <section class="tale-background-opacity py-5 py-md-0">
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col-12 col-md-6 mb-4 d-flex align-items-center pe-md-5">
                    <h2 class="secondary-font-green"><span class="bold">Nuestros gestores FIDES,</span><span class="span-block2">se encargarán de asesorarte y acompañarte durante todo tu proceso</span></h2>
                </div>
                <div class="col-12 col-md-6 sala-vidas-img-container gx-0">
                    <img class="sala-vidas-img" src="<?= $base_url ?>/files/img/fidesIMG/woman-talking-waiting-room.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
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
    // jQuery( document ).ready(function($) {
    // $('#fides_video').click(function() {
    //     this.paused ? this.play() : this.pause();
    //     $('.play-btn-fides').toggleClass("slideDownFides");
    //     $('#fides_video_text').toggleClass("slideDownFides");
    // });
    // });
    // function disableVideoControls() { 
    // $("#fides_video").removeAttr("controls"); 
    // }


    function startModalVideo() {
        $("#modal-video").trigger("play");
    }
    function stopModalVideo() {
        $("#modal-video").trigger("pause");
    }
</script>