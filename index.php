<?php $base_dir = dirname(__FILE__);
$page_description = "Hospital San Juan De Dios Sevilla situado en el barrio de Nervión. Tu hospital en Sevilla sin esperas. Trabajamos con las principales aseguradoras.";

require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php"; ?>
<main>
    <!-- home -->
    <section>
        <div class="slick-container">
            <div class="slick-carousel1 text-white">
                <div class="slick-slide">
                    <picture>
                        <source class="img_mequiero" srcset="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_unidad_trafico_mobile.webp" media="(max-width: 767px)">
                        <img class="slick1-img" src="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_unidad_trafico_desktop.webp" alt="Unidad trafico">
                    </picture>
                    <div class="container-md mt-5 padding-desktop-top">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-5">
                                <div class="slick1-card">
                                    <div class="d-flex flex-column equal-margin">
                                        <h2 class="h1">Nueva <br><span class="semibold">Unidad de Tráfico</span></h2>
                                        <p class="my-4">Conoce nuestro servicio de asistencia inmediata, servicios de rehabilitación y servicios de psicología, para brindar apoyo integral a las víctimas de un accidente de tráfico.</p>
                                        <span class="button-slick-span">
                                            <div class="card-btn-con"><a href="<?= $base_url ?>/unidad-trafico"><button class="btn-secondary-transparent btn-secondary-transparent1 text-white">Más info</button></a></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide">
                    <picture>
                        <source class="img_mequiero" srcset="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_unidad_mama_movil.webp" media="(max-width: 767px)">
                        <img class="slick1-img" src="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_unidad_mama_desktop.webp" alt="Unidad de mama">
                    </picture>
                    <div class="container-md mt-5 padding-desktop-top">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-5">
                                <div class="slick1-card cardRosa_banner">
                                    <div class="d-flex flex-column equal-margin textoRosaOscuro">
                                        <h2 class="h1">Nueva <br><span class="semibold">Unidad de mama</span></h2>
                                        <p class="my-4">Ofrecemos un diagnóstico y tratamiento integral sin esperas. Combinando las técnicas más avanzadas y los mejores profesionales.</p>
                                        <span class="button-slick-span">
                                            <div class="card-btn-con"><a href="<?= $base_url ?>/unidad-de-mama"><button class="btn-secondary-transparent btn-secondary-transparent-letra-rosa text-white">Más info</button></a></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide video_slide">
                    <video muted autoplay loop class="slick1-video" src="<?= $base_url ?>/files/video/slide-index-comp.mp4" alt="Video sobre hospital san juan de dios"></video>
                    <div class="container-md mt-5 padding-desktop-top">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-5">
                                <div class="slick1-card card4">
                                    <div class="d-flex flex-column equal-margin">
                                        <h2 class="h1">Tu Hospital en Sevilla <span class="semibold">sin esperas</span></h2>
                                        <p class="my-4">Cuentes o no con un seguro de salud, en el Hospital San Juan de Dios de Sevilla contarás con plazos reducidos inferiores a una semana en tus citas previas.</p>
                                        <span class="button-slick-span">
                                            <div class="card-btn-con"><a href="<?= $base_url ?>/pedir-cita"><button class="btn-secondary-transparent btn-secondary-transparent-letra-naranja text-white">Pedir cita</button></a></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide">
                    <picture>
                        <source srcset="<?= $base_url ?>/files/img/slider-mobil.webp" media="(max-width: 767px)">
                        <img class="slick1-img" src="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_urgencias-min.webp" alt="MDN">
                    </picture>
                    <div class="container-md mt-5 padding-desktop-top">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-5">
                                <div class="slick1-card">
                                    <div class="d-flex flex-column equal-margin">
                                        <h2 class="h1">Urgencias<br><span class="semibold">24 horas</span></h2>
                                        <p class="my-4">En Hospital San Juan de Dios Sevilla disponemos de todos los servicios y los mejores profesionales los 365 días del año para ofrecerte la mejor atención sanitaria</p>
                                        <span class="button-slick-span">
                                            <div class="card-btn-con"><a href="<?= $base_url ?>/urgencias-sevilla"><button class="btn-secondary-transparent btn-secondary-transparent1 text-white">Más info</button></a></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide">
                    <picture>
                        <source srcset="<?= $base_url ?>/files/img/slider-mobil2.webp" media="(max-width: 767px)">
                        <img class="slick1-img" src="<?= $base_url ?>/files/img/slider-hospital-san-juan-dios-sevilla_aseguradoras.webp" alt="MDN">
                    </picture>
                    <div class="container-md mt-5 padding-desktop-top">
                        <div class="row d-flex justify-content-between">
                            <div class="col-12 col-md-7 col-lg-5">
                                <div class="slick1-card card3">
                                    <div class="d-flex flex-column equal-margin">
                                        <h2 class="h1">Aseguradoras y mutuas</h2>
                                        <p class="my-4">Trabajamos con las principales compañías aseguradoras del país. Llámanos e infórmate sin compromiso.</p>
                                        <span class="button-slick-span">
                                            <div class="card-btn-con"><a href="<?= $base_url ?>/companias"><button class="btn-secondary-transparent btn-secondary-transparent2 text-white">Más info</button></a></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-5 col-lg-6 logos-col display-none-block">
                                <div class="d-flex flex-column">
                                    <img class="logos-imgs" src="<?= $base_url ?>/files/img/SVG/mapfre.svg" alt="img">
                                    <img class="logos-imgs mx-auto" src="<?= $base_url ?>/files/img/SVG/sanitas.svg" alt="img">
                                    <img class="logos-imgs" src="<?= $base_url ?>/files/img/SVG/cesar.svg" alt="img">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php"; ?>
    <!-- cookies banner  -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <?php require "$base_dir/lib/politica_cookies.php"; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Servicios icons -->
    <section>
        <div class="container main_container">
            <div class="row primary-font-blue text-center">
                <h1 class="h2 text-center text-lg-start"><b>Especialidades médicas</b><br class="d-none d-md-block"> del Hospital San Juan De Dios</h1>
                <?php foreach ($especialidades as $k => $especialidad) {
                    if (!$especialidad->destacado) continue; ?>
                    <div class="col-6 col-md-3">
                        <a href="<?= !$especialidad->fake_link ? $base_url . $k : $base_url . '/contacto'; ?>"><img class="mt-5 servicios-icon" src="<?= $base_url . $especialidad->icon ?>" alt="image"></a>
                        <h4 class="mt-3 small"><?= $especialidad->short_title; ?></h4>
                    </div>
                <?php } ?>
            </div>
            <div class="col text-center my-5">
                <a href="<?= $base_url ?>/servicios"><button class="primary-btn">Ver todas</button></a>
            </div>
        </div>
    </section>
    <?php require "$base_dir/lib/principales-aseguradoras.php" ?>
    <section>
        <div class="container-fluid main_container gx-0 container-height d-flex justify-content-center align-items-center">
            <!-- <img src="./files/img/quirofano_index_secciขn_sjd_sevilla-tecnologia-innovacion.webp" alt=""> -->
            <video autoplay playsinline muted loop class="sin_esperas_video">
                <source src="<?= $base_url ?>/files/video/hospital-sin-esperas-popup.mP4" type="video/mp4" title="" alt="">
            </video>
            <div class="text-blue-section">
                <div class="d-flex flex-column align-items-center">
                    <h2 class="text-white center-movil">Tu hospital en Sevilla <span class="semibold">sin esperas</span></h2>
                    <button type="button" class="button-modal" data-bs-toggle="modal" data-bs-target="#exampleModal"><img onclick="startModalVideo()" class="play_esperas_btn" src="<?= $base_url ?>/files/img/play.svg"></button>
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
    </section>
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php"; ?>
    <!-- Cards -->
    <section>
        <div class="container main_container">
            <h2 class="primary-font-blue center-movil mb-4">¿Qué nos hace <span class="span-block">diferentes?</span></h2>
            <div class="row d-flex justify-content-center animated_elem">
                <div class="slick-carousel3">
                    <div class="slick3-card slick-green">
                        <h3>Con Fides no ponemos barreras a tu salud</h3>
                        <p class="mt-4">Solicita nuestro servicio Fides y un Health Manager estará a tu disposición siempre que lo necesites. Sin limitaciones geográficas ni barreras físicas o tecnológicas. Resuelve todas tus dudas al instante, sin desplazamientos innecesarios.</p>
                        <button class="mb-4 hide-btn">Saber más</button>
                    </div>
                    <div class="slick3-card slick-blue">
                        <h3>Urgencias 24 horas</h3>
                        <p class="mt-4">Contamos con un servicio de urgencias especializado para niños y adultos donde tratar cualquier imprevisto que presente el paciente. Además el centro dispone de zonas UCI, URPA y REA que nos permite reaccionar de forma inmediata frente a cualquier contratiempo.</p>
                        <a href="<?= $base_url ?>/urgencias-sevilla"><button class="mb-4">Urgencias 24 horas</button></a>
                    </div>
                    <div class="slick3-card slick-orange">
                        <h3>Equipamiento vanguardista</h3>
                        <p class="mt-4">Las instalaciones de nuestro centro hospitalario han sido renovadas y ampiadas recientemente para adaptar el centro a los nuevos tiempos y ofrecer a nuestros pacientes un servicio médico exclusivo y de calidad.</p>
                        <a href="<?= $base_url ?>/nuestro-centro/instalaciones"><button class="mb-4">Nuestras instalaciones</button></a>
                    </div>
                    <div class="slick3-card slick-brown">
                        <h3>Consultas externas sin esperas</h3>
                        <p class="mt-2 mt-md-4">Sabemos que cuando tienes una dolencia la rapidez en el tratamiento es fundamental. Por ello contamos con un amplio equipo de especialistas y una gestión interna optimizada para reducir el tiempo de las esperas al mínimo y ofrecer una atención de calidad y también inmediata.</p>
                        <a href="<?= $base_url ?>/servicios"><button class="mb-4">Especialidades médicas</button></a>
                    </div>
                    <div class="slick3-card slick-gray">
                        <h3>Obra social</h3>
                        <p class="mt-4">Nuestros valores nos definen. A través de nuestras acciones solidarias intentamos prestar ayuda a aquellos que más la necesitan. Por ello cada año atendemos a más de 300 personas sin hogar a través de algunos de nuestros programas de comedor, higiene personal o ropería.</p>
                        <a href="<?= $base_url ?>/solidaridad"><button class="mb-4">Nuestra Obra Social</button></a>
                    </div>
                    <div class="slick3-card slick-pink">
                        <h3>Ubicación privilegiada</h3>
                        <p class="mt-4">En pleno barrio de Nervión, junto al estado Ramón Sánchez Pizjuán, se ubican las nuevas y modernas instalaciones del nuevo Hospital San Juan de Dios. Un espacio que lleva prestando servicios a Sevilla y sus visitantes desde 1943.</p>
                        <a href="<?= $base_url ?>/contacto"><button class="mb-4">Contacto</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Nuevas instalaciones-->
    <section>
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col-12 col-md-6 mb-4">
                    <h2 class="primary-font-blue mx-3"><span class="span-block2">El hospital privado que </span><span class="semibold">necesitaba Sevilla</span></h2>
                    <p class="third-font-gray mt-4 mx-3">Tras más de 10 años volvemos con unas instalaciones mucho más amplias, renovadas y con un personal y equipamientos de primer nivel. Contamos con multitud de especialidades médicas disponibles y los mejores profesionales en cada una de las mismas. Somos tu hospital de referencia en la ciudad de Sevilla. </p>
                    <a href="<?= $base_url ?>/contacto"><button class="primary-btn mt-5 mx-3 display-none-block">Contactar</button></a>
                </div>
                <div id="carouselExampleControls1" class="carousel slide col-12 col-md-6 gx-0" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img loading="lazy" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-2.webp" class="d-block" alt="image">
                        </div>
                        <div class="carousel-item">
                            <img loading="lazy" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-1.webp" class="d-block" alt="image">
                        </div>
                        <div class="carousel-item">
                            <img loading="lazy" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-instalaciones-3.webp" class="d-block" alt="image">
                        </div>
                    </div>
                    <a class="n-insta-btn-container" href="<?= $base_url ?>/contacto"><button class="n-insta-btn">Contactar</button></a>
                    <button class="white-btn-top display-none-block justify-content-center align-items-center" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                        <img class="icon" src="<?= $base_url ?>/files/img/SVG/arrowleft.svg" alt="img">
                    </button>
                    <button class="white-btn-bottom display-none-block justify-content-center align-items-center" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                        <img class="icon" src="<?= $base_url ?>/files/img/SVG/arrowright.svg" alt="img">
                    </button>
                </div>
            </div>
            <div class="row center-movil">
                <div class="col-12 col-md-6 order-1 order-md-2 mb-4">
                    <h2 class="primary-font-blue mt-5 mx-3"><span class="semibold">Profesionales</span><span class="span-block2">que cuidan de ti</span></h2>
                    <p class="third-font-gray mt-4 mx-3">Nuestro personal facultativo y sanitario abandera los valores de San Juan de Dios y ofrece una atención médica personalizada en la que prioriza los derechos de los pacientes por encima de todo. Contamos con los mejores profesionales dotados con la última tecnología disponible en cada una de las especialidades médicas, así como citas con plazos reducidos. </p>
                    <a href="<?= $base_url ?>/contacto"><button class="primary-btn mt-5 mx-3 display-none-block">Contactar</button></a>
                </div>
                <div id="carouselExampleControls2" class="carousel slide col-12 col-md-6 gx-0 order-2 order-md-1" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img loading="lazy" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-equipo_medico.webp" class="d-block" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonio -->
    <section class="secondary-green-opacity">
        <div class="container main_container border-radius-movil">
            <div class="row center-movil">
                <div class="col-12 col-md-6 my-5 my-lg-auto">
                    <!-- <div class="margin-box"></div> -->
                    <h2 class="primary-font-blue">La solidaridad <span class="semibold span-block2">salva vidas</span></h2>
                    <p class="third-font-gray my-4 margin-desktop-right15">En San Juan de Dios siempre nos hemos sentido identificados con las personas más vulnerables. Desde la<span class="bold"> Obra Social del Hospital San Juan de Dios de Sevilla</span> ofrecemos posibilidades y recursos para dar respuesta a necesidades insuficientemente atendidas, motivándonos a la búsqueda de todas las herramientas posibles que estén a nuestro alcance.</p>
                    <p class="third-font-gray mt-4 mb-0 margin-desktop-right15">En 2020 se han realizado más de <span class="bold">3.000 atenciones sociales</span> de las que se han beneficiado casi <span class="bold">1.000 personas.</span></p>
                    <div class="center-movil"><a href="<?= $base_url ?>/solidaridad"><button class="primary-btn mt-5">Colaborar</button></div></a>
                </div>
                <div class="col-12 col-md-6 sala-vidas-img-container gx-0">
                    <img loading="lazy" class="sala-vidas-img" src="<?= $base_url ?>/files/img/centro-medico-privado-sevilla-solidaridad.webp" alt="image">
                </div>
            </div>
        </div>
    </section>
    <!-- Centro de Atención -->
    <?php require "$base_dir/lib/centro-de-atencion.php"; ?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php"; ?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php"; ?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php"; ?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php"; ?>
<script>
    $(document).ready(function() {
        $('.slick-carousel1').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 1000,
            autoplay: true,
            autoplaySpeed: 13000,
            slidesToShow: 1,
            slidesToScroll: 1,
            customPaging: function(slider, i) {
                return '<a><div class="dots-slick"> <div/></a>';
            },
        });

        $('.slick-carousel3').slick({
            arrows: false,
            infinite: true,
            autoplay: false,
            slidesToShow: 6,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1.05,
                    slidesToScroll: 1,
                    centerMode: false,
                }
            }]

        });

        var options = {
            arrows: false,
            infinite: true,
            autoplay: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            centerMode: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    centerMode: false,
                    slidesToShow: 1.04,
                    slidesToScroll: 1,
                }
            }]
        }
        $("#slick4").slick(options);
        $('.slick-carousel1').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            if (document.querySelector("#slick-slide12").getAttribute("tabindex") == 0) {

                $(".slick-carousel1").slick('slickSetOption', 'autoplaySpeed', '13000');
            } else {

                $(".slick-carousel1").slick('slickSetOption', 'autoplaySpeed', '3000');
            }
        });
    })
</script>
<script>
    function startModalVideo() {
        $("#modal-video").trigger("play");
    }
    function stopModalVideo() {
        $("#modal-video").trigger("pause");
    }
</script>