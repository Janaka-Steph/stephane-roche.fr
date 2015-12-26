<div id="home-container">
    <div>
        <p class="small-12 small-centered medium-9 column text-center" id="intro">Bienvenue sur mon portfolio où je présente mes réalisations de sites internet. Visitez aussi la section blog où j'écris sur Javascript et son écosystème.</p>
        
        <?php
        $image_properties = array(
            'src' => 'inkblot.png',
            'id' => 'inkblot',
            'class' => 'show-for-large-up',
            'alt' => "tache d'encre",
        );

        echo img($image_properties);
        ?>
    </div>
    <?php
    $image_properties = array(
        'src' => 'separation.png',
        'id' => 'separation',
        'class' => 'small-4 small-centered medium-3 large-2 column',
        'alt' => 'separation intro et article',
    );

    echo img($image_properties);

    $attr = array(
        'id' => 'last_articles',
        'class' => 'text-center',
    );
    echo heading('Derniers articles', 1, $attr);
    ?>

    <div class="line small-10 small-push-1"></div>
    <?php include 'liste-articles.php'; ?>
</div>
