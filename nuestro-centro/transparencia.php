<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Transparencia";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- transparencia -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-san-juan-de-dios-sevilla-centro-transparencia.webp" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5 mt-md-4">Transparencia</h1>
                    <p class="large third-font-gray mt-4">Canal de Denuncia</p>
                    <p class="third-font-gray mt-4">Es un instrumento de comunicación habilitado por la Orden Hospitalaria de San Juan de Dios-Provincia San Juan de Dios España en el marco de su Sistema de Gestión de Compliance, para poner en conocimiento de la institución un posible comportamiento irregular o ilícito producido en el seno de la misma, garantizando la confidencialidad de la persona denunciante que así lo solicite.</p>
                    <div class="col-5 doctor-buttons">
                        <!-- <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Pedir cita</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <p class="third-font-gray">Dichas denuncias de comportamiento irregular o ilícito se referirán a posibles infracciones o vulneraciones al Código Ético o de Conducta, normas internas de la organización y/o normativa del Ordenamiento Jurídico.</p>
            <p class="mt-4 third-font-gray">El canal de denuncia está gestionado por la firma externa Maio Legal, encargada del tratamiento de los datos personales facilitados, junto a la Orden Hospitalaria de San Juan de Dios-Provincia San Juan de Dios España, con la finalidad de gestionar la información facilitada y realizar la investigación pertinente de los hechos denunciados.</p>
            <p class="mt-4 third-font-gray">En este enlace puede acceder al Canal de Denuncia, donde encontrará un formulario para presentar una denuncia, y toda la información relativa a las normas de uso y funcionamiento del canal:</p>
            <div class="text-center"><a href="https://canaldenuncia.sjd.es/" target="_blank" ><button class="primary-btn-wider my-4">Canal de denuncia</button></a></div>
            <p class="mt-4 third-font-gray">Le informamos que le estamos redirigiendo a otra web que no es propiedad del Hospital San Juan de Dios de Sevilla para que puedan prestarle el servicio que está solicitando.</p>
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