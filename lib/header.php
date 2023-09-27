<!-- header -->
<header class="header">
    <div class="container">
        <div class="row banner d-flex align-items-center d-none d-md-flex">
            <div class="col-12 col-md-6 ">
                <a class="logo-svg" href="<?= $base_url ?>/"><img src="<?= $base_url ?>/files/img/SVG/logo_icon.svg" class="me-3 order-first"><h2 class="header-logo-title">Hospital <span class="header-logo-title-bold">San Juan De Dios</span> <span class="header-logo-title-border">Sevilla</span></h2></a>
            </div>
            <div class="col-6 col-md-6 text-end text-nowrap margin-mobil-top">
                <div class="row position-relative row_contenedor_de_informacion_citas" style="justify-content: end;">
                    <div class="col d-flex flex-column justify-content-center" style="max-width: 193px;">
                        <div class="row row_informacion justify-content-end">
                            <div class="col display_content">
                                <img src="<?= $base_url ?>/files/img/SVG/phone.svg" alt="call" class="icon cursor-poiner phoneImg" style="margin-right: 10%;">
                            </div>
                            <div class="col display_content">
                                <span class="primary-font-blue" style="font-size: 12px;">información</span>
                            </div>
                        </div>
                        <div class="row">
                            <a href="tel:+34954939300" class="primary-font-blue link-number-header link-num-header-blue">+34 954 939 300</a>
                        </div>
                    </div>
                    <div class="header-divider"></div>
                    <div class="col d-flex justify-content-center flex-column margen_citas_movil" style="max-width: 187px;">
                        <div class="row justify-content-end row_citas">
                            <div class="col display_content">
                                <?= file_get_contents("$base_dir/files/img/SVG/icono_calendario.svg"); ?>
                            </div>
                            <div class="col display_content">
                                <span class="secondary-font-green" style="font-size: 12px;">citas</span>
                            </div>
                        </div>
                        <div class="row">
                            <a href="tel:+34 955045999" class="secondary-font-green link-number-header link-num-header-green">+34 955 045 999</a>
                        </div>
                    </div>
                    <div class="col d-none d-md-block div_sobre_ipad_btn_margin" style="max-width: 181px;">
                        <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-4 mb-4 ms-4 display-none-inline ipad-btn-margin">Pedir cita online</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-md-none">
            <!-- citas -->
            <div class="col-12 citas-container-movil" style="z-index: 2;">
                <div class="d-flex align-items-center">
                    <figure class="icon cursor-poiner phoneImg me-3 figureHeader"><?= file_get_contents("$base_dir/files/img/SVG/phone_blanco.svg"); ?></figure>
                    <a href="tel:+34954939300"class="span-medium600">+34 954 939 300</a>  
                </div>
                <div class="header-mobile-divider"></div>
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 304.77 320.5" fill="#FFFFFF" alt="call" class="icon cursor-poiner phoneImg me-3">
                        <g id="" data-name="Capa 2">
                            <g id="" data-name="">
                                <path d="M32.73,210.65q0,29.94,0,59.87c0,11.4,5.37,16.83,16.71,16.85q37.68.06,75.36,0a37.34,37.34,0,0,1,5.6.31c9.32,1.41,14.14,7,14.13,16.27s-4.88,14.78-14.23,16.2a28.29,28.29,0,0,1-4.11.28c-25.62,0-51.24.09-76.86,0-22.84-.09-41.2-13.33-47.33-33.9a46.06,46.06,0,0,1-2-13.26Q0,176.18.05,79.07A47.18,47.18,0,0,1,46.69,32c4.62-.08,9.25-.11,13.87,0,2.43.05,3.36-.89,3.3-3.31-.11-4.11-.1-8.23,0-12.34C64.08,6.65,70.69.05,80.16,0,90,0,96.45,6.49,96.53,16.53c0,3.62.22,7.25,0,10.85s.89,4.75,4.58,4.71c17.37-.18,34.74-.08,52.12-.08,11.62,0,23.25-.09,34.87.06,3.15,0,4.18-1.06,4-4.12-.2-3.85-.07-7.73,0-11.59C192.12,6.53,198.45.13,208.19,0c9.28-.12,16.12,6.36,16.48,15.8.17,4.24.15,8.49,0,12.73-.07,2.57.88,3.49,3.48,3.52,6.61.08,13.22-.41,19.83.57a46.94,46.94,0,0,1,40.51,46.24c.1,25.95.05,51.89,0,77.84,0,10.13-6.09,16.41-15.8,16.5-10.38.09-16.68-6-16.88-16.29-.06-3.12-.08-6.24,0-9.36,0-2.07-.88-3-2.93-2.87-.88.05-1.75,0-2.63,0H38.43c-5.7,0-5.7,0-5.7,5.71Q32.72,180.52,32.73,210.65ZM143.9,112h22.49q42.54,0,85.09,0c2.36,0,4.46.21,4.4-3.31-.17-9.84.08-19.7-.14-29.55-.16-7.49-4.8-12.5-12.17-14-5-1-10-.25-14.95-.58-2.88-.19-4.08.76-3.94,3.78.19,4.23.15,8.48,0,12.72-.34,9.34-7.18,15.73-16.59,15.63-9.57-.09-15.94-6.41-16.06-16-.05-4.24-.09-8.48,0-12.72.06-2.28-.57-3.42-3.14-3.41q-44.61.09-89.21,0c-2.54,0-3.24,1.06-3.18,3.38.11,4.11.06,8.23,0,12.35-.09,9.93-6.33,16.3-16,16.4S64,90.31,63.85,80.4c-.08-4.24-.06-8.48,0-12.72,0-2-.57-3.07-2.76-3-4.37.08-8.76-.19-13.12.11-10,.7-15.16,6.37-15.22,16.29-.05,8.61,0,17.21,0,25.82,0,5.16,0,5.17,5.09,5.17Z"></path>
                                <path d="M176.19,255.77a15.52,15.52,0,0,1,11.72,5c5.85,5.8,11.76,11.54,17.45,17.49,2.19,2.29,3.53,2.15,5.7,0q31.84-32,63.84-63.81c3.72-3.72,7.71-6.64,13.36-6.55,7.2.12,12.08,3.76,15,10,2.84,6,1.48,11.66-2.64,16.73a23,23,0,0,1-1.8,1.9q-39.22,39.17-78.47,78.3c-7.49,7.46-16.44,7.68-23.85.42-10.43-10.22-20.82-20.49-31-31-8.78-9.05-6.86-21.63,3.8-26.88A13.66,13.66,0,0,1,176.19,255.77Z"></path>
                            </g>
                        </g>
                    </svg>
                    <a href="tel:+34955045999" class="span-medium600">+34 955 045 999</a>
                </div>
            </div>
            <!-- hamburger menu -->
            <div class="col-12 position-relative" style="z-index: 2;" id="hamburger_menu_nav">
                <div class="d-flex justify-content-between logo-svg">
                    <a href="<?= $base_url ?>/"><img src="<?= $base_url ?>/files/img/SVG/logo_icon.svg"></a>
                    <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn m-3">Pedir cita online</button></a>
                    <div class="menu-bars-container text-center" id="hamburgerContainer">
                        <div id="nav-icon4" class="d-flex flex-column align-items-center justify-content-center">
                            <span class="span_nav w-100"></span>
                            <span class="span_nav w-100"></span>
                            <span class="span_nav w-100"></span>
                        </div>
                    </div>
                </div>
                <!-- hamburger dropdown -->
                <div class="dropdown-container">
                    <div class="dropdown-menu dropdown-menu-movil primary-background-blue animate slideDown" id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <!-- navbar -->
                        <nav class="navbar navbar-mobil">
                            <ul class="navbar-nav mt-3 mx-4">
                                <li class="nav-item-movil dropdown pt-4">
                                    <a class="nav-link d-flex" href="#" id="navbarDropdownMobile1" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nuestro Centro
                                        <div class="arrow-navbar ms-2" id="navbarArrowMobil1">
                                            <?= file_get_contents("$base_dir/files/img/SVG/tick.svg"); ?>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu link-menu-movil" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="/nuestro-centro/bienvenida">Bienvenida</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/la-orden">La Orden</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/sobre-nosotros">Sobre nosotros</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/instalaciones">Instalaciones</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/calidad">Calidad</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/atencion-espiritual">Atención Espiritual</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/etica">Ética</a></li>
                                        <li><a class="dropdown-item" href="/nuestro-centro/transparencia">Transparencia</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item-movil dropdown">
                                    <a class="nav-link d-flex" href="#" id="navbarDropdownMobile2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Área del paciente
                                        <div class="arrow-navbar ms-2" id="navbarArrowMobil2">
                                        <?= file_get_contents("$base_dir/files/img/SVG/tick.svg"); ?>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu link-menu-movil" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="/pedir-cita">Pedir cita</a></li>
                                        <li><a class="dropdown-item" href="/area-del-paciente/documentacion-del-paciente">Documentación del paciente</a></li>
                                        <li><a class="dropdown-item" href="/files/doc/DERECHOS-DEBERES-sevilla.pdf" target="”_blank”">Derechos y deberes</a></li>
                                        <li><a class="dropdown-item" href="/area-del-paciente/proteccion-de-datos">Protección de datos</a></li>
                                        <li><a class="dropdown-item" href="/companias">Compañías aseguradoras</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/servicios">Especialidades</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/fides">FIDES</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/infantil-temprana">Atención infantil temprana</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/solidaridad">Solidaridad</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/actualidad">Actualidad</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/contacto">Contacto</a>
                                </li>
                                <li class="nav-item-movil">
                                    <a class="nav-link" href="/trabaja-con-nosotros">Trabaja con nosotros</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="nav-item-movil my-4 text-center d-flex justify-content-center">
                            <a href="https://www.facebook.com/hospitalsanjuandediossevilla" rel="nofollow" target="_blank"><img class="dropdown-menu-media mx-2" src="/files/img/SVG/facebook.svg" alt="SJD Facebook"></a>
                            <a href="https://www.instagram.com/hospital_sjd_sevilla" rel="nofollow" target="_blank"><img class="dropdown-menu-media mx-2" src="/files/img/SVG/insta.svg" alt="SJD Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- title -->
            <div class="col-12 py-3" id="title_hide_scroll">
                <div class="text-center">
                <a href="<?= $base_url ?>/"><h2 class="header-logo-title mb-0"><span class="d-block">Hospital </span><span class="header-logo-title-bold">San Juan De Dios</span> <span class="header-logo-title-border">Sevilla</span></h2></a>
                </div>
            </div>
        </div>
    </div>
    <!-- navbar - desktop -->
    <nav class="primary-background-blue display-none-navbar">
        <div class="container navbar navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-11">
                    <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-between">
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex ps-0" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Nuestro centro<div class="arrow-navbar ms-2" id="navbarArrow1"><?= file_get_contents("$base_dir/files/img/SVG/tick.svg"); ?></div>
                            </a>
                            <ul class="dropdown-menu navigation-list animate slideIn" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/bienvenida">Bienvenida</a></li>
                                <?php { ?> <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/la-orden">La Orden</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/sobre-nosotros">Sobre nosotros</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/instalaciones">Instalaciones</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/calidad">Calidad</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/atencion-espiritual">Servicio de Atención Espiritual</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/etica">Ética</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/nuestro-centro/transparencia">Transparencia</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/servicios">Especialidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/fides">FIDES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/infantil-temprana">Atención infantil temprana</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link d-flex" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Área del paciente<div class="arrow-navbar ms-2" id="navbarArrow2"><?= file_get_contents("$base_dir/files/img/SVG/tick.svg"); ?></div>
                            </a>
                            <ul class="dropdown-menu navigation-list animate slideIn" aria-labelledby="navbarDropdown">
                                <?php { ?><li><a class="dropdown-item" href="<?= $base_url ?>/pedir-cita">Pedir cita</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/area-del-paciente/documentacion-del-paciente">Documentación del paciente</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/files/doc/DERECHOS-DEBERES-sevilla.pdf" target=”_blank”>Derechos y deberes</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/area-del-paciente/proteccion-de-datos">Protección de datos</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>/companias">Compañías aseguradoras</a></li><?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/solidaridad">Solidaridad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/actualidad">Actualidad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $base_url ?>/trabaja-con-nosotros">Trabaja con nosotros</a>
                        </li>
                    </ul>
                </div>
                <div class="col-1">
                    <div class="d-flex float-end">
                        <?php foreach ($rrss as $r) { ?>
                            <a href="<?= $r['url'] ?>"rel="nofollow" target="_blank"><img class="dropdown-menu-media mx-2" src="<?= $base_url . '/' . $r['icon'] ?>" title="<?= $r['title'] ?>" alt="<?= $r['title'] ?>"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>