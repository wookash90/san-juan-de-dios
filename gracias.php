<?php $base_dir = dirname(__FILE__);
$web_title = "Gracias";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php"; ?>
<section>
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-md-6 order-md-2 main-img-container">
                <img class="img-100 img-main rounded" src="files/img/contacto-enviado.jpg" alt="Enviado">
            </div>
            <div class="col col-md-6 center-movil margin-desktop-top">
                <h1 class="h1 primary-font-blue mt-5">¡Muchas gracias!</h1>
                <p class="p20 third-font-gray mt-4">Hemos recibido su solicitud correctamente. Muy pronto nos pondremos en contacto.</p>
            </div>
        </div>
    </div>
</section>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php"; ?>