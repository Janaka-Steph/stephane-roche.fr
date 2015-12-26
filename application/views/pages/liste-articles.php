<?php if (!isset($articles)) { ?>
<p>Il n'y a pas d'articles sur ce blog ou bien il y a un problème quelque part. Sorry !</p>
<?php }else{ ?>

<?php if($articles->num_rows() > 0): ?>

<?php foreach($articles->result() as $row): ?>

<section class="row" id="search-article">
	<label for="search-article-input">Chercher un terme</label>
	<input id="search-article-input" type="text" name="search-article-input" value="">

	<input id="search-article-input-submit" type="submit" class="button right" onclick="">
</section>


<section class="row" id="liste-article">

	<article class="accroche-article">
		<h1><a href="<?php base_url();?>blog/article/<?php echo $row->art_url_rw; ?>"><?php echo $row->art_title; ?></a></h1>
		<!-- Formatage Date -->
		<?php $jour  = date("d", strtotime($row->art_date)); ?>
		<?php $mois  = date("m", strtotime($row->art_date)); ?>
		<?php $annee = date("Y", strtotime($row->art_date)); ?>
		<!-- End Formatage Date -->
		<span class="meta_art_date"><em>Posté le <?php echo '<span class="date-article">' . date_fr($jour, $mois, $annee) . "</span>"; ?>
		
		<!-- Formatage Date -->
		<?php $jour  = date("d", strtotime($row->art_datemodif)); ?>
		<?php $mois  = date("m", strtotime($row->art_datemodif)); ?>
		<?php $annee = date("Y", strtotime($row->art_datemodif)); ?>
		<!-- End Formatage Date -->
		<?php if ($row->art_datemodif == "0000-00-00 00:00:00" || $row->art_datemodif == NULL) {
		    echo "</em></span>";
		}else {
		    echo ", mis à jour le " . '<span class="date-article">' . date_fr($jour, $mois, $annee) . "</span></em></span>";
		    
		}
		?>
		<p>
		    <?php $content = $row->art_content; echo word_limiter($content, 60);?>
		</p>
		
		<footer class="footer-article row full-width"> 
			<p class="small-9 column">Catégorie :
				<?php if($row->rub_id == 1) {echo "Javascript";}
				else if($row->rub_id == 2) {echo "Crypto-monnaies";}
				else if($row->rub_id == 3) {echo "Outils de dev";}?></p>
			<a class="suitelink" href="<?php base_url();?>blog/article/<?php echo $row->art_url_rw; ?>">
			<svg version="1.1" class="suite-img right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			width="38px" height="20px" viewBox="0 0 38 20" enable-background="new 0 0 38 20" xml:space="preserve" fill="#C1272D">
			<path d="M8.667,4.491c0.825,0,3.612,0.033,3.612,0.033L8.95,0l16.203,6.826l-15.034,7.436l1.948-3.859
			c0,0-1.166-0.034-2.69-0.034c-1.811,0-4.904,1.437-4.904,5.027C4.473,18.988,7.448,20,7.448,20s-6.315-1.452-6.315-7.902
			C1.132,5.65,7.46,4.491,8.667,4.491z"/>
			<text transform="matrix(0.9989 0 0 1 11.6377 19.7559)" font-family="'Courgette-Regular'" font-size="7.7355">Suite</text>
			</svg>
		</a>
		</footer>

	</article>	
<?php endforeach; ?>

<?php else: ?>
	<p>Aucun article n'est disponible pour le moment</p>
<?php endif; ?>

</section>	

<?php } ?>