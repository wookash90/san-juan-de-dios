<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Protección de datos";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- Protección de datos -->
    <section>
        <div class="container main_container">
            <div class="row">
                <div class="col center-movil">
                    <h1 class="primary-font-blue">Protección de datos</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col">
                    <p class="third-font-gray">El hospital San Juan de Dios de Sevilla se ampara en la <a href="https://www.boe.es/buscar/doc.php?id=BOE-A-1999-23750" target=”_blank”><span class="link-blog span-medium600">Ley Orgánica de Protección de Datos (Ley15/1999)</span></a> y en la <a href="https://www.boe.es/diario_boe/txt.php?id=BOE-A-2002-22188" target=”_blank”><span class="link-blog span-medium600">Ley Reguladora de la Autonomía del Paciente (Ley 41/2002)</span></a> para tratar de manera adecuada los datos de sus pacientes.</p>
                    <p class="third-font-gray mt-4">Con ello se garantiza la salvaguarda de las libertades públicas y los derechos fundamentales de las personas físicas tanto en el tratamiento de sus datos personales, como de los clínicos, respetando en todo momento su honor e intimidad personal y familiar.</p>
                    <p class="large third-font-gray mt-5"><span class="span-medium600">Consulte nuestra políticas:</span></p>
                    <div class="d-flex flex-column flex-md-row">
                        <a href="<?= $base_url ?>/politica-de-privacidad"><button class="primary-btn-wider mx-md-3 my-2">Política de privacidad</button></a>
                        <a href="<?= $base_url ?>/aviso-legal"><button class="primary-btn-wider mx-md-3 my-2">Aviso legal</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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