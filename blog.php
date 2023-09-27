<?php $base_dir = dirname(__FILE__);
require_once "$base_dir/lib/app_data.php";
$web_title = "";
$slug = !empty($_GET['n']) ? $_GET['n'] : 'unanoticiadeprueba';
$blog = $elem = $blogs[$slug];

$meta_title = !empty($blog->page_title) ? $blog->page_title : '';
$page_description = !empty($blog->page_description) ? $blog->page_description : '';
$meta_keywords = !empty($blog->keywords) ? $blog->keywords : '';
$canonicalNoticia = !empty($blog->canonical) ? $blog->canonical : '';

require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";
?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- header -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="p15 secondary-font-green mt-5"><?= $blog->fecha ?></p>
                </div>            
            </div>
            <div class="row center-movil">
                <div class="col-12 col-md-9">
                    <h1 class="primary-font-blue"><span class="bold"><?= $blog->title_noticia ?></span></h1>
                </div>
                <div class="col-12 mt-4 order-2 order-md-3 blog-ismg-header-container">
                    <?php if($blog->img_main != "/files/img/blog/encuentro_empresarios_rsc_ribamar_3.jpg") {?> 
                        <img class="blog-img-header" src="<?= $base_url . $blog->img_main ?>" alt="<?php echo isset($blog->alt_img) ? $blog->alt_img : 'image'; ?>" title="<?php echo isset($blog->title_img) ? $blog->title_img : 'image'; ?>">

                    <?php } ?> 
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
    <section>
        <div class="container padding-sides">
            <div class="row">
                <div class="col third-font-gray">
                <?= $blog->content ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Actualidad -->
    <?php require "$base_dir/lib/actualidad-slick.php";?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php";?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php";?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php";?>
</main>
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>