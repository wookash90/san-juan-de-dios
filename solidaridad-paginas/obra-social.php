<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Obra-social";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- Obra social -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/obra-social.jpeg" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Obra social</h1>
                    <p class="large third-font-gray mt-5">Desde los diferentes programas sociales que desarrollamos en el <span class="span-bold">Hospital de San Juan de Dios de Sevilla</span> damos cobertura a las necesidades básicas, de atención y sociosanitarias de aquellas personas que se encuentran en situación o en riesgo de exclusión social, que acuden a nuestro centro, bien por iniciativa propia o bien derivada desde cualquier entidad pública o privada.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container my-5">
            <div class="row center-movil">
                <div class="col">
                    <h3 class="third-font-gray">Actualmente nuestro centro cuenta con los siguientes</h3>
                    <h2 class="primary-font-blue">Programas sociales</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col gx-0">
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="arrow-down"> 
                        <div class="d-flex justify-content-between align-items-end slick-green py-4 px-2 px-md-5">
                            <h3 class="mb-0"><span class="bold">Urgencia social</span></h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down">
                                <img src="<?= $base_url ?>/files/img/SVG/tickGreen.svg" alt="img">
                            </div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card no-border card-body slick-green pb-5 ">
                            <p class="mx-md-5 mt-3 third-font-gray">Nuestra prioridad durante esta situación de pandemia ha sido la de mantener el apoyo a las familias cuya situación se ha agravado con esta crisis, atendiendo sus necesidades básicas, urgentes y puntuales. Los beneficiarios son personas en situación de sin hogar, desempleo o trabajo precario, con dificultad para cubrir los gastos básicos de la vivienda, o para afrontar gastos extraordinarios.</p>
                            <div class="d-md-flex flex-row justify-content-between">
                                <ul class="suisse_intl third-font-gray mx-md-5">
                                    <li class="my-2">Atención bucodental</li>
                                    <li class="my-2">Ayudas en metálico para gastos personales</li>
                                    <li class="my-2">Pobreza energética</li>
                                    <li class="my-2">Farmacia social</li>
                                    <li class="my-2">Ayudas a familias para mobiliario y equipamiento</li>
                                    <li class="my-2">Ayudas para gastos personales a pacientes/residentes</li>
                                </ul>
                                <div class="corazon-image py-3 py-lg-0"><img src="<?= $base_url ?>/files/img/accion-mayores.jpeg" alt="image"></div>
                            </div>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" id="arrow-down2"> 
                        <div class="d-flex justify-content-between align-items-end slick-orange py-4 px-2 px-md-5">
                            <h3 class="mb-0"><span class="bold">Atención social a la infancia</span></h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down2"><img src="<?= $base_url ?>/files/img/SVG/tickYellow.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample2">
                        <div class="card no-border card-body slick-orange pb-5">
                            <p class="mx-md-5 mt-3 third-font-gray">Con el Programa de Atención Social a la Infancia está dirigido a familias con menores de 0 a 14 años que no disponen de los medios suficientes para cubrir las necesidades más básicas.</p>
                            <div class="d-md-flex flex-row justify-content-between">
                                <ul class="suisse_intl third-font-gray mx-md-5">
                                    <li class="my-2">Ayudas de higiene y alimentación infantil</li>
                                    <li class="my-2">Ayudas básicas a la infancia</li>
                                    <li class="my-2">Ayudas para comedores escolares</li>
                                    <li class="my-2">Becas de atención temprana</li>
                                    <li class="my-2">Ayuda, higiene, alimentación y salud infantil</li>
                                    <li class="my-2">Ningún niño sin juguete</li>
                                    <li class="my-2">Material ortoprotésico infantil</li>
                                    <li class="my-2">Material puericultura 0-3 años</li>
                                    <li class="my-2">Ropero infantil</li>
                                    <li class="my-2">Transporte escolar y ayudas para el transporte</li>
                                </ul>
                                <div class="corazon-image py-3 py-lg-0"><img src="<?= $base_url ?>/files/img/atencion-social.jpeg" alt="image"></div>
                            </div>
                        </div>
                    </div>
                    <a data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" id="arrow-down3"> 
                        <div class="d-flex justify-content-between align-items-end slick-blue py-4 px-2 px-md-5">
                            <h3 class="mb-0"><span class="bold">Garantía alimentaria</span></h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down3"><img src="<?= $base_url ?>/files/img/SVG/tickBlue.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample3">
                        <div class="card no-border card-body slick-blue pb-5">
                            <p class="mx-md-5 mt-3 third-font-gray">Con este programa se garantiza la cobertura de necesidades básicas como la alimentación e higiene de familias en situación de vulnerabilidad, bien por bajos recursos, bien por cuidado de personas mayores, fomentando una mayor autonomía.</p>
                            <div class="d-md-flex flex-row justify-content-between">
                                <ul class="suisse_intl third-font-gray mx-md-5">
                                    <li class="my-2">Dietas para usuarios, acompañantes y familiares</li>
                                    <li class="my-2">Aportaciones para economatos externos</li> 
                                </ul>
                                <div class="corazon-image py-3 py-lg-0"><img src="<?= $base_url ?>/files/img/accion-alimentaria.jpeg" alt="image"></div>
                            </div>
                        </div>
                    </div>


                    <a data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4" id="arrow-down4"> 
                        <div class="d-flex justify-content-between align-items-end slick-pink py-4 px-2 px-md-5">
                            <h3 class="mb-0"><span class="bold">Prestaciones sociosanitarias benéficas</span></h3>
                            <div class="dropdown-arrow-down" id="dropdown-arrow-down4"><img src="<?= $base_url ?>/files/img/SVG/tickPink.svg" alt="img"></div> 
                        </div>
                    </a>
                    <div class="collapse" id="collapseExample4">
                        <div class="card no-border card-body slick-pink pb-5">
                            <p class="mx-md-5 third-font-gray">A través de este programa nuestra Obra Social cofinancia, entre otros proyectos, estancias residenciales de mayores en situación de vulnerabilidad y con escasos recursos económicos; ofrece acogida integral a personas en situación de dependencia mejorando la salud y calidad de vida de las personas cuidadoras a través de la Unidad de Respiro Familiar; y atención socio-sanitaria en domicilio.</p>
                            <div class="d-md-flex flex-row justify-content-between">
                                <ul class="suisse_intl third-font-gray mx-md-5">
                                    <li class="my-2">Atención domiciliaria</li>
                                    <li class="my-2">Acompañamiento hospitalario</li>
                                    <li class="my-2">Plazas becadas en residencia de mayores</li>
                                    <li class="my-2">Compras o préstamos material ortoprotésico</li>
                                    <li class="my-2">Respiro familiar</li>
                                    <li class="my-2">Voluntariado domiciliario</li> 
                                </ul>
                                <div class="corazon-image py-3 py-lg-0"><img src="<?= $base_url ?>/files/img/sociosanitario.jpeg" alt="image"></div>
                            </div>
                        </div>
                    </div>
                </div>
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