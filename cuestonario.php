<?php $base_dir = dirname(__FILE__);
$web_title = "Cuestonario de satisfacción";
require "$base_dir/lib/head.php";?> 
<main>
    <section class="blue-opacity-light">
        <div class="container pt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-4">
                    <a href="<?= $base_url ?>"><img class="logoBanner" src="<?= $base_url ?>/files/img/logo.svg" alt="image"></a>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row d-flex justify-content-center white-background formulario-style">
                <div class="col-10 py-5">
                    <h1 class="primary-font-blue pt-5">Encuesta de satisfacción<br><strong>Jornadas Puertas Abiertas</strong> 22 y 29 de Octubre</h1>
                    <p class="open-sans-reg third-font-gray mt-5">Gracias por haber asistido a la Jornada de Puertas Abiertas del Hospital San Juan de Dios Sevilla. Le dejamos un breve cuestionario para conocer su opinión.</p>
                </div>
                <div class="col-10 py-5 tale-background-opacity border-1rem d-flex align-items-center flex-column">
                    <div class="col-8"><p class="open-sans-reg third-font-gray">Valora de <strong>1 a 5</strong> (siendo 1 la menor puntuación y 5 la mayor) las siguientes preguntas respecto a tu visita al <strong>Hospital San Juan de Dios Sevilla.</strong></p></div>
                    <div class="d-flex justify-content-center mt-4 preguntas_images"><img src="<?= $base_url ?>/files/img/Group 65.png" alt="img"></div>
                </div>
                <div class="col-10">
                    <?php require "$base_dir/lib/cuestonario-form.php";?>
                </div>
                <div class="col-12 formulario-background mt-5 py-4 py-lg-0">
                    <div class="col-12 col-lg-6 m-lg-5 p-lg-5 center-movil">
                        <h2 class="primary-font-blue">Estuvimos<br><strong>Estamos</strong><br>Estaremos</h2>
                        <h5 class="mt-5"><a class="primary-font-blue" href="https:/sjdsevilla.com" target="_blank">sjdsevilla.com</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</main>
<?php require "$base_dir/lib/foot.php";?>