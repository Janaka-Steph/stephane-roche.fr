<?php if (!isset($article)) { ?>
    <p>La page demandée est inaccessible. Sorry !</p>
<? } else { ?>

    <article id="article-container">
        <h1 id="<?php echo $article->art_id; ?>"><?php echo $article->art_title; ?></h1>

        <!-- Formatage Date -->
        <?php $jour = date("d", strtotime($article->art_date)); ?>
        <?php $mois = date("m", strtotime($article->art_date)); ?>
        <?php $annee = date("Y", strtotime($article->art_date)); ?>
        <!-- End Formatage Date -->
        <span class="meta_art_date"><em>Posté
                le <?php echo '<span class="date-article">' . date_fr($jour, $mois, $annee) . "</span>"; ?>

                <!-- Formatage Date -->
                <?php $jour = date("d", strtotime($article->art_datemodif)); ?>
                <?php $mois = date("m", strtotime($article->art_datemodif)); ?>
                <?php $annee = date("Y", strtotime($article->art_datemodif)); ?>
                <!-- End Formatage Date -->
                <?php
                if ($article->art_datemodif == "0000-00-00 00:00:00" || $article->art_datemodif == NULL) {
                    echo "</em></span>";
                } else {
                    echo ", mis à jour le " . '<span class="date-article">' . date_fr($jour, $mois, $annee) . "</span></em></span>";
                }
                ?>
                <p>
                    <?php echo $article->art_content; ?>
                </p>

                <footer class="row full-width">
                    <p class="small-12 medium-9 large-9 column">Tags : <?php echo $article->art_tags; ?></p>
                </footer>

                <div id="disqus_thread"></div>
                <script type="text/javascript">
                    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                    var disqus_shortname = 'stephaneroche'; // required: replace example with your forum shortname

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function () {
                        var dsq = document.createElement('script');
                        dsq.type = 'text/javascript';
                        dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by
                        Disqus.</a>
                </noscript>

    </article>

<?php } ?>