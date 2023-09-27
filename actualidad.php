<?php $base_dir = dirname(__FILE__);
$page = !empty($_GET['page']) ? intval($_GET['page']) : 1;
$web_title = "Actualidad/$page";
require "$base_dir/lib/head.php";
require "$base_dir/lib/header.php";?> 
<main>
    <!-- sticky footer -->
    <?php require "$base_dir/lib/sticky-footer.php";?> 
    <!-- Actualidad -->
    <section>
        <div class="container main_container">
            <div class="row center-movil">
                <div class="col-12">
                    <h1 class="primary-font-blue">Actualidad</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php $limit_per_page = 9;
                $init = $page > 1 ? ($page * $limit_per_page) - $limit_per_page : 0;
                $n = 0;
                $showed = 0;
                foreach ($blogs as $z => $blog) {
                    $n++; 
                    if ($init >= $n) continue;
                    $showed++; ?>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">       
                            <a href="<?= $base_url.'/blog/'.$z ?>"><div class="slick2-img"><img src="<?= $base_url; ?><?= $blog->img_main ?>" alt="image"><div class="overlay"></div></div></a>
                            <p class="secondary-font-green mt-3"><?=  $blog->fecha ?></p>
                            <a href="<?= $base_url.'/blog/'.$z ?>"><h3 class="primary-font-blue mt-3 line-clamp"><?= $blog->title_noticia ?></h3></a>
                            <p class="third-font-gray mt-4 line-clamp-text"><?= $blog->short_notice ?></p>
                        </div>
                    </div>
                    <?php if ($showed >= $limit_per_page) break;
                } ?>
            </div>
        </div>
        <div class="container main_container">
            <div class="row">
                <div class="col">
                    <?php
                    $total_blogs = count($blogs);
                    $total_pages = ceil($total_blogs / $limit_per_page);
                    $actual_page = $page;
                    if($total_blogs > $limit_per_page) { ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination_actualidad">
                                <?php if ($actual_page > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/1"><span aria-hidden="true">&laquo;</span></a></li>
                                <?php }
                                if (($actual_page - 2) >= 1) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/<?= $actual_page - 2; ?>"><?= $actual_page - 2; ?></a></li>
                                <?php }
                                if (($actual_page - 1) >= 1) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/<?= $actual_page - 1; ?>"><?= $actual_page - 1; ?></a></li>
                                <?php } ?>
                                <li class="page-item active" aria-current="page"><a class="page-link" ><?= $actual_page ?></a></li>
                                <?php if (($actual_page + 1) <= $total_pages) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/<?= $actual_page + 1; ?>"><?= $actual_page + 1; ?></a></li>
                                <?php } 
                                if (($actual_page + 2) <= $total_pages) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/<?= $actual_page + 2; ?>"><?= $actual_page + 2; ?></a></li>
                                <?php } 
                                if ($actual_page < $total_pages) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $base_url;?>/actualidad/<?= $total_pages ?>"><span aria-hidden="true">&raquo;</span></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- <div class="pagination-container">
            <div class="container" id="page-content-1" data-page="1">
                <div class="row">
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" data-page="2" id="page-content-2" style="display:none;">
                <div class="row">
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" data-page="3" id="page-content-3" style="display:none;">
                <div class="row">
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/handshake_2.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miércoles, 27 de Abril de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">de Sevilla recibe la visita</span>institucionaldel S.F.C.</h3>
                            <p class="p15 third-font-gray mt-4">El nuevo Hospital San Juan de Dios de Sevilla ha recibido la visita de la directiva del Sevilla Fútbol Club a sus ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/hospitalphoto.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Miécoles, 31 de Agosto</p>
                            <h3 class="h3 primary-font-blue mt-3">San Juan de Dios Sevilla, un hospital con una localización privilegiada y nuevas instalaciones</h3>
                            <p class="p15 third-font-gray mt-4">En Hospital San Juan de Dios Sevilla trabajamos con las principales aseguradoras. Para conocer la cobertura de tu seguro con nuestro centro hospitalario, consúltanos.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-5">
                        <div class="slick2-card">
                            <div class="slick2-img"><img src="<?= $base_url; ?>/files/img/waitingroom.png" alt="image"></div>
                            <p class="p15 secondary-font-green mt-3">Lunes, 16 de Mayo de 2022</p>
                            <h3 class="h3 primary-font-blue mt-3">El Hospital San Juan de Dios<span class="span-block2">acoge a varias</span>familias desplazadas</h3>
                            <p class="p15 third-font-gray mt-4">La Orden Hospitalaria de San Juan de Dios ya ha comenzado la acogida de personas desplazadas que ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagination pagination-centered pagination-large container d-flex justify-content-center mt-5">
                <ul class="page_control d-flex">
                    <li data-page="-" ><a id href="#" >&lt;</a></li>
                    <li class="active" data-page="1"><a id="page-selector-1" href="#" >1</a></li>
                    <li data-page="2"><a href="#" id="page-selector-2">2</a></li>
                    <li data-page="3"><a href="#" id="page-selector-3">3</a></li>
                    <li data-page="+"><a href="#" >&gt;</a></li>
                </ul>
            </div>
        </div> -->
    </section>
    <!-- Centro de Atención -->
    <?php require "$base_dir/lib/centro-de-atencion.php";?>
    <!-- cartera de servicios azul -->
    <?php require "$base_dir/lib/cartera-de-servicios-azul.php";?>
    <!-- nuestro-valores -->
    <?php require "$base_dir/lib/nuestros-valores.php";?>
    <!-- subscribete -->
    <?php require "$base_dir/lib/subscribete.php";?>
    <!-- trabaja con nosotros -->
    <?php require "$base_dir/lib/trabaja-con-nosotros.php";?>
</main>
<!-- footer -->
<?php require "$base_dir/lib/footer.php";
require "$base_dir/lib/foot.php";?>
<!-- pagination -->
<script>
    var paginationHandler = function(){
        // store pagination container so we only select it once
        var $paginationContainer = $(".pagination-container"),
            $pagination = $paginationContainer.find('.pagination ul');
    
        // click event
        $pagination.find("li a").on('click.pageChange',function(e){
            e.preventDefault();
    
            // get parent li's data-page attribute and current page
            var parentLiPage = $(this).parent('li').data("page"),
                currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
                numPages = $paginationContainer.find("div[data-page]").length;
    
            // make sure they aren't clicking the current page
            if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
                // hide the current page
                $paginationContainer.find("div[data-page]:visible").hide();
    
                if ( parentLiPage === '+' ) {
                    // next page
                    $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
                } else if ( parentLiPage === '-' ) {
                    // previous page
                    $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
                } else {
                    // specific page
                    $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
                }
    
            }
        });
    };
    $( document ).ready( paginationHandler );
</script>