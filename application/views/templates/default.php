<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php echo $description; ?>">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
    <meta name="keywords" content="Développeur Web Freelance">
    <meta name="author" content="Stéphane Roche">
    <meta name="application-name" content="Blog / Portfolio de Stephane Roche">
    <meta name="geo.placename" content="paris">
    <meta name="geo.region" content="FR">
    <meta property="og:title" content="Blog / Portfolio de Stephane Roche">
    <meta property="og:type" content="Blog / Portfolio">
    <meta property="og:url" content="http://www.stephane-roche.fr">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="Blog / Portfolio de Stephane Roche">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:locality" content="paris">
    <meta property="og:region" content="FR">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--<script src="<?php echo base_url("bower_components/modernizr/modernizr.js"); ?>"></script>-->

    <link href="<?php echo base_url("assets/css/app.min.css"); ?>" rel="stylesheet" type="text/css" media="screen">

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-45501406-4', 'stephane-roche.fr');
        ga('send', 'pageview');
    </script>
</head>

<body>
<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">

        <aside class="right-off-canvas-menu">
            <ul class="off-canvas-list">
                <li><label>Menu</label></li>
                <li class="ajaxAcceuil right-off-canvas-toggleLink">
                    <a href="<?php echo site_url('home'); ?>">Accueil</a>
                </li>

                <li class="ajaxBlog right-off-canvas-toggleLink">
                    <a href="<?php echo site_url('blog'); ?>">Blog</a>
                    <ul class="off-canvas-subnav">
                        <li class="ajaxBlogJavascript right-off-canvas-toggleLink">
                            <a href="#">Javascript</a>
                        </li>
                        <li class="ajaxBlogCrypto right-off-canvas-toggleLink">
                            <a href="#">Crypto-monnaies</a>
                        </li>
                        <li class="ajaxBlogTools right-off-canvas-toggleLink">
                            <a href="#">Outils</a>
                        </li>
                    </ul>
                </li>

                <li class="ajaxRealisations right-off-canvas-toggleLink">
                    <a href="<?php echo site_url('realisations'); ?>">Réalisations</a>
                </li>

                <li class="ajaxCurriculum right-off-canvas-toggleLink">
                    <a href="<?php echo site_url('curriculum'); ?>">CV</a>
                </li>

                <li class="ajaxContact right-off-canvas-toggleLink">
                    <a href="<?php echo site_url('contact'); ?>">Contact</a>
                </li>

                <li><label>Réseaux Sociaux</label></li>
                <li class="right-off-canvas-toggleLink"><a href="https://www.facebook.com/stephane.roche.501"
                                                           target="_blank">Facebook</a></li>
                <li class="right-off-canvas-toggleLink"><a href="https://twitter.com/stephahimsa" target="_blank">Twitter</a>
                </li>
                <li class="right-off-canvas-toggleLink"><a href="http://www.viadeo.com/fr/profile/stéphane.roche.webdev"
                                                           target="_blank">Viadeo</a></li>
                <li class="right-off-canvas-toggleLink"><a href="https://www.linkedin.com/in/stephanerochewebdev"
                                                           target="_blank">LinkedIn</a></li>
            </ul>
        </aside>


        <header class="full-width">
            <nav class="top-bar row full-width">
                <ul class="no-bullet small-8 medium-5 large-4 column">
                    <!--<li>
                	<a href="<?php echo site_url('home'); ?>">
                    <h1 id="logo"><span class="block" id="nom">STEPHANE ROCHE</span> <span class="block" id="job">DEVELOPPEUR WEB</span></h1>
                </li>-->
                    <li>
                        <a href="<?php echo site_url('home'); ?>">
                            <div class="ajaxAcceuil ajax-trigger small-10 medium-10 large-9 column" id="logo">STEPHANE
                                ROCHE</br>DEVELOPPEUR WEB
                            </div>
                    </li>
                </ul>

                <ul class="no-bullet margin-bottom-free">
                    <li class="toggle-topbar">
                        <a class="right-off-canvas-toggle menu-icon" href="#">
                            <img class="small-1 right" id="icon_menu" alt="icon menu"
                                 src="<?php echo base_url("assets/images/burger_menu.png"); ?>">
                        </a>
                    </li>
                </ul>

                <section class="top-bar-section">
                    <ul class="no-bullet small-4 medium-7 large-8 column">
                        <li id="marker" data-ele=""></li>
                        <li id="accueil-menu" class="ajaxAcceuil ajax-trigger ">
                            <a href="<?php echo site_url('home'); ?>">Accueil</a>
                        </li>

                        <li class="ajaxBlog ajax-trigger has-dropdown" id="blog-menu">
                            <a href="<?php echo site_url('blog'); ?>">Blog</a>
                            <ul class="dropdown dropdown-blog">
                                <li id="blog-menu-javascript" class="ajaxBlogJavascript">
                                    <a href="<?php echo base_url(); ?>blog/javascript">JavaScript</a>
                                </li>
                                <li id="blog-menu-crypto" class="ajaxBlogCrypto">
                                    <a href="<?php echo base_url(); ?>blog/crypto">Crypto-monnaies</a>
                                </li>
                                <li id="blog-menu-tools" class="ajaxBlogTools">
                                    <a href="<?php echo base_url(); ?>blog/outils">Outils de dev</a>
                                </li>
                            </ul>
                        </li>

                        <li id="realisations-menu" class="ajaxRealisations ajax-trigger">
                            <a href="<?php echo site_url('realisations'); ?>">Réalisations</a>
                        </li>

                        <li id="curriculum-menu" class="ajaxCurriculum ajax-trigger">
                            <a href="<?php echo site_url('curriculum'); ?>">CV</a>
                        </li>

                        <li id="contact-menu" class="ajaxContact ajax-trigger">
                            <a href="<?php echo site_url('contact'); ?>">Contact</a>
                        </li>

                    </ul>
                </section>
            </nav>
        </header>

        <div id="breadcrumbs">
            <?php echo $breadcrumbs; ?>
        </div>

        <div id="content" class="row small-10">
            <?php echo $main; ?>
        </div>

        <footer class="full-width" id="footer-page">
            <div class="row medium-10" id="footer-container">
                <div class="small-10 medium-2 column show-for-medium-up">
                    <h3>
                        <small>MENU</small>
                    </h3>
                    <ul class="no-bullet">
                        <li class="ajaxAcceuil ajax-trigger"><?php echo anchor('home', 'Accueil'); ?></li>
                        <li class="ajaxBlog ajax-trigger"><?php echo anchor('blog', 'Blog'); ?></li>
                        <li class="ajaxRealisations ajax-trigger"><?php echo anchor('realisations', 'Réalisations'); ?></li>
                        <li class="ajaxCurriculum ajax-trigger"><?php echo anchor('curriculum', 'CV'); ?></li>
                        <li class="ajaxContact ajax-trigger"><?php echo anchor('contact', 'Contact'); ?></li>
                        <li class="ajaxAdmin ajax-trigger"><?php echo anchor('auth', 'Accès admin'); ?></li>
                    </ul>
                </div>

                <div class="small-10 small-push-1 medium-4 column">
                    <h3>
                        <small>À PROPOS</small>
                    </h3>
                    <p>Développeur web résidant en région parisienne, mon principal atout se situe dans mon parcours
                        hétéroclite qui me permet aujourd'hui de mener à bien vos projets avec sérieux et dextérité.</p>
                </div>

                <div class="small-10 small-centered medium-4 nofloatformobile column">
                    <h3>
                        <small>CONTACT</small>
                    </h3>
                    <p>N'hésitez pas à me faire part de votre projet, je réaliserai pour vous un devis
                        <strong>gratuit</strong></p>
                    <?php echo anchor('contact', 'Contact', 'class="ajaxContact ajax-trigger button"'); ?>
                </div>
            </div>


            <a href="#" class="go-top">
                <?php
                $image_properties = array(
                    'src' => 'top.png',
                    'id' => 'top-img',
                    'class' => '',
                    'alt' => 'Back to top',
                );

                echo img($image_properties);
                ?>
            </a>

        </footer>

        <!-- close the off-canvas menu -->
        <a class="exit-off-canvas"></a>

    </div>
</div>

<script src="<?php echo base_url("bower_components/tinymce/tinymce.min.js"); ?>"</script>
<script src="<?php echo base_url("bower_components/fastclick/lib/fastclick.js"); ?>"></script>
<script src="<?php echo base_url("bower_components/jquery/dist/jquery.min.js"); ?>"></script>
<script src="<?php echo base_url("bower_components/foundation/js/foundation.min.js"); ?>"></script>
<!--<script src="<?php echo base_url("assets/js/jquery.history.js"); ?>"></script>-->
<script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/tinymce.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

<script>
    $(document).foundation({
        abide: {
            patterns: {
                /*tel_number:  /^((\+|00)33\s?|0)[1-9](\s?\d{2}){4}$/,*/
                dashes_only: /^[0-9-]*$/,
                ip_address: /^((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])$/
            }
        }
    });
</script>

</body>
</html>