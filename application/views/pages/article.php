<?php if (!isset($article)) { ?>
    <p>La page demandée est inaccessible. Sorry !</p>
<? } else { ?>

    <article id="article-container">
        <h1 id="art_title-<?php echo $article->art_id; ?>"><?php echo $article->art_title; ?></h1>

        <!-- Date Formating -->
        <?php $jour = date("d", strtotime($article->art_date)); ?>
        <?php $mois = date("m", strtotime($article->art_date)); ?>
        <?php $annee = date("Y", strtotime($article->art_date)); ?>
        <!-- End Date Formating -->
        <span class="meta_art_date">
            <em>Posté le
                <?php echo '<span class="date-article">' . date_fr($jour, $mois, $annee) . "</span>"; ?>

                <!-- Date Formating -->
                <?php $jour = date("d", strtotime($article->art_datemodif)); ?>
                <?php $mois = date("m", strtotime($article->art_datemodif)); ?>
                <?php $annee = date("Y", strtotime($article->art_datemodif)); ?>
                <!-- End Date Formating -->
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
                    var disqus_shortname = 'stephaneroche';

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function () {
                        var dsq = document.createElement('script');
                        dsq.type = 'text/javascript';
                        dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
                <noscript>
                    Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by
                        Disqus.</a>
                </noscript>
    </article>
<?php } ?>

