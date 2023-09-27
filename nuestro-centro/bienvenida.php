<?php $base_dir = dirname(dirname(__FILE__));
$web_title = "Bienvenidos a nuestro hospital";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- bienvenida -->
    <section>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-12 col-md-6 order-md-2 main-img-container">
                    <img class="img-100 img-main" src="<?= $base_url ?>/files/img/hospital-san-juan-de-dios-sevilla-centro-bienvenida.webp" alt="image">
                </div>
                <div class="col col-md-6 center-movil margin-desktop-top">
                    <h1 class="primary-font-blue mt-5"><span class="span-block2">Bienvenidos a nuestro</span> hospital en Sevilla</h1>
                    <p class="large third-font-gray mt-4">Queremos darte la bienvenida al Hospital San Juan de Dios y darte las gracias por elegirnos y confiar en nosotros.</p>
                    <p class="large third-font-gray mt-4">A continuación te presentamos el nuevo Hospital San Juan de Dios de Sevilla, un centro de la Orden Hospitalaria de San Juan de San Juan de Dios, una Institución sin ánimo de lucro, perteneciente a la Iglesia Católica y con presencia en todo el mundo, cuya misión es curar y cuidar a las personas enfermas y con escasos recursos.</p>
                    <div class="col-5 doctor-buttons">
                        <!-- <a href="<?= $base_url ?>/pedir-cita"><button class="primary-btn mt-3">Como llegar</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container main_container">
            <p class="third-font-gray">En este nuevo Hospital San Juan de Dios contamos con una cartera de especialidades ampliada para poder atender todas las necesidades sanitarias y sociosanitarias, siguiendo nuestra característica forma de hacer: la de la Hospitalidad. Esto significa que desde el momento en que alguien llega a nosotros, ponemos a la persona en el centro de todo, atendiendo todas sus dimensiones –física, mental, social y espiritual-, siguiendo la inspiración de nuestro Fundador Juan de Dios, quién con su labor marcó un punto de inflexión en la dignificación de las personas en situación de vulnerabilidad hace ya casi 500 años.</p>
            <p class="third-font-gray">Además de conocer nuestra amplia y variada actividad clínica, puedes unirte a nosotros para adentrarte en nuestra intensa labor social, con la que queremos aliviar la situación de personas y familias que no atraviesan momentos fáciles. En concreto, en este hospital sanitario en Sevilla trabajamos para paliar desigualdades infantiles, promoviendo desde el área de Solidaridad programas sociales que favorezcan a los hijos de familias en situación de exclusión social o riesgo de estarlo.</p>
            <p class="third-font-gray">Como parte de la Orden Hospitalaria, somos uno de los 17 centros que San Juan de Dios tiene en Andalucía, entre los que se encuentran hospitales, residencias de mayores, centros dedicados a la atención a la discapacidad, a la atención a la salud mental y centros y dispositivos sociales. En España, pertenecemos a una red de 80 centros, que se amplían a 405 atendiendo a nuestra dimensión internacional. En todo el mundo somos 65.000 profesionales, 1.020 Hermanos y más 25.300 voluntarios los que prestamos atención a más de 1.000.000 de personas al año.</p>
            <p class="third-font-gray">Abrimos este hospital en Sevilla con el propósito de que, si nos necesitas, encuentres cerca nuestra atención, que se basa tanto en la calidad como en la calidez.</p>
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