<!-- Actualidad -->
<section>
    <div class="container main_container">
        <div class="row center-movil">
            <h2 class="h2 primary-font-blue">Actualidad</h2>
        </div>
        <div class="justify-content-center">
            <!-- slick2 -->
            <div class="slick-carousel2 mt-3 animated_elem">
                <?php $limit = 3;
                $n = 0;
                foreach ($blogs as $z => $blog) {
                    if(!$blog->feature) continue;
                    $n++; ?>
                        <div class="col-12 col-md-4 slick2-card">
                            <a href="<?= $base_url.'/blog/'.$z ?>"><div loading="lazy" class="slick2-img"><img src="<?= $base_url; ?><?= $blog->img_main ?>" alt="image"><div class="overlay"></div></div></a>
                            <p class="secondary-font-green mt-3"><?= $blog->fecha ?></p>
                            <a href="<?= $base_url.'/blog/'.$z ?>"><h3 class="primary-font-blue mt-3 line-clamp"><?= $blog->title_noticia ?></h3></a>
                            <p class="third-font-gray mt-4 line-clamp-text"><?= $blog->short_notice ?></p>
                        </div>
                    <?php if ($n >= $limit) break;
                } ?>
            </div>
            <!-- slick2 -->
        </div>
        <div class="text-center my-5"><a class="nav-link" href="<?= $base_url ?>/actualidad"><button class="primary-btn">Ver todos</button></a></div>
    </div>
</section>

