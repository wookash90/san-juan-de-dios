 <!-- Footer -->
 <footer class=" primary-background-blue">
        <div class="container py-5">
            <div class="row center-movil2 footer text-white">
                <div class="col-12 col-lg-4 order-lg-4">
                    <a href="<?= $base_url ?>/pedir-cita"><button class="btn-secondary mt-4 display-none-block2 margin-left-button float-end">Pedir cita</button></a>
                    <a href="<?= $base_url ?>/"><img class="logo-footer mt-5 margin-desktop-top35 float-right-desktop2" src="<?= $base_url ?>/files/img/SVG/logoblanco.svg" alt="image"></a>
                    <a href="<?= $base_url ?>/pedir-cita"><button class="btn-secondary mt-5 mx-5 display-none-desktop2">Pedir cita</button></a>
                    <p class="h3 text-white mt-5 display-none-desktop2"><img class="mx-3 icon" src="<?= $base_url ?>/files/img/SVG/phoneblanco.svg" alt="image"><a href="tel:+34954939300">+34 954 939 300</a></p>
                    <div class="display-none-block2 mt-4 float-right-desktop">
                        <div class="d-flex text-nowrap float-end">
                            <p class="text-white mx-3"><a href="tel:+34954939300"><img class="mx-3 icon" src="<?= $base_url ?>/files/img/SVG/phoneblanco.svg" alt="image">+34 954 939 300</a></p>
                            <a href="" id="auto-email-send5"><p class="text-white"><img class="mx-3 icon-small" src="<?= $base_url ?>/files/img/SVG/emailblanco.svg" alt="image"> info@sjdsevilla.com</p></a>
                        </div>
                    </div>
                    <p class="text-white mt-5 suisseIntLight float-text-right float-right-desktop2 margin-mobil-top">Hospital San Juan de Dios de Sevilla<br>C/ San Juan de Dios, 1<br>41005 | SEVILLA</p>
                </div>
                <div class="col-12 col-lg-2 mt-4">
                    <ul>
                        <li class="bold">Nuestro Centro</li>
                        <a href="<?= $base_url ?>/nuestro-centro/bienvenida"><li>Bienvenida</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/la-orden"><li>La Orden</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/sobre-nosotros"><li>Sobre nosotros</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/instalaciones"><li>Instalaciones</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/calidad"><li>Calidad</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/etica"><li>Ética</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/transparencia"><li>Transparencia</li></a>
                        <a href="<?= $base_url ?>/nuestro-centro/atencion-espiritual"><li class="text-nowrap">Atención Espiritual</li></a>
                    </ul>
                </div>
                <div class="col-12 col-lg-2 mt-4">
                    <ul>
                        <li class="bold">Área del paciente</li>
                        <a href="<?= $base_url ?>/files/doc/DERECHOS-DEBERES-sevilla.pdf" target=”_blank”><li>Derechos y deberes</li></a>
                        <a href="<?= $base_url ?>/area-del-paciente/proteccion-de-datos"><li>Protección de datos</li></a>
                        <!-- <a href="<?= $base_url ?>/area-del-paciente/envia-un-agradecimiento"><li>Envía un agradecimiento</li></a> -->
                        <a href="<?= $base_url ?>/companias"><li>Compañías aseguradoras</li></a>
                        <a href="<?= $base_url ?>/area-del-paciente/documentacion-del-paciente"><li class="text-nowrap">Documentación paciente</li></a>
                    </ul>
                </div>
                <div class="col-12 col-lg-2 mt-4 display-none-block2">
                    <ul>
                        <li class="bold">Salud</li>
                        <a href="<?= $base_url ?>/servicios"><li>Especialidades</li></a>
                        <?php /*<a href="<?= $base_url ?>/cuadro-medico"><li>Cuadro médico</li></a> */?>
                        <a href="<?= $base_url ?>/infantil-temprana"><li>Atención infantil temprana</li></a>
                    </ul>
                </div>
                <div class="col-12 col-lg-2 mt-4 display-none-desktop2">
                    <ul>
                    <?php /*<a href="<?= $base_url ?>/cuadro-medico"><li class="span-medium">Cuadro médico</li></a> */?>
                        <a href="<?= $base_url ?>/servicios"><li class="bold">Especialidades</li></a>
                        <a href="<?= $base_url ?>/solidaridad"><li class="bold">Solidaridad</li></a> 
                        <a href="<?= $base_url ?>/actualidad"><li class="bold">Actualidad</li></a>
                        <!-- <a href="<?= $base_url ?>/trabaja-con-nosotros"><li class="bold">Trabaja con nosotros</li></a> -->
                        <a href="<?= $base_url ?>/contacto"><li class="bold">Contacto</li></a>
                    </ul>
                </div>
                <div class="col col-lg-2 mt-4 display-none-block2">
                    <ul>
                        <li class="bold">Otros</li>
                        <a href="<?= $base_url ?>/solidaridad"><li>Solidaridad</li></a>
                        <a href="<?= $base_url ?>/actualidad"><li>Actualidad</li></a>
                        <!-- <a href="<?= $base_url ?>/trabaja-con-nosotros"><li>Trabaja con nosotros</li></a> -->
                        <a href="<?= $base_url ?>/contacto"><li>Contacto</li></a>
                    </ul>
                </div>
                <div class="col-12 mt-4 display-none-desktop2">
                    <?php foreach ($rrss as $r) { ?>
                        <a href="<?= $r['url'] ?>"rel="nofollow" target="_blank"><img class="dropdown-menu-media mx-2" src="<?= $base_url.'/'.$r['icon'] ?>" alt="<?= $r['title'] ?>"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="smallest text-white text-center"><?= date('Y') ?> ©  <?= $conf_empresa ?> | <span class="span-block"><a href="<?= $base_url ?>/aviso-legal">Aviso legal</a> | <a href="<?= $base_url ?>/politica-de-privacidad">Política de privacidad</a></span></p>
                </div>
            </div>
        </div>
    </footer>