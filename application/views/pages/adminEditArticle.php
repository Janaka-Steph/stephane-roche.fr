<?php echo validation_errors(); ?>

<?php /* echo form_open('admin/edit/'.$art_id); */?>
<?php echo form_open('admin/validateForm/'.$art_id); ?>

<div class="">
	<label for="art_title">Titre de l'article:</label>
	<input type="text" class="form-control" id="art_title" name="art_title" value="<?php if(isset($art_title)): echo $art_title; else: echo set_value('art_title'); endif; ?>" required />
</div>

<div class="">
	<label for="art_content">Contenu de l'article :</label>
	<textarea id="art_content" rows="30" class="form-control tinymce" name="art_content"><?php if(isset($art_content)): echo $art_content; else: echo set_value('art_content'); endif; ?></textarea>
</div>

<p>Rubriques :</p>
	<?php foreach ($rubrics->result() as $row): ?>
	<div class="">
		<label>
			<input type="radio" name="rub" id="<?php echo $row->r_title ;?>" value="<?php echo $row->r_id ;?>" <?php if( $page == 'edit_content' and isset($rubrics) and $row->r_id == $rub_id or set_value('rub') == $row->r_id ){ echo 'checked="checked"'; } ?> required />
			<?php echo $row->r_title; ?>
		</label>
	</div><!-- end .radio -->
	<?php endforeach; ?>
	
<input type="submit" class="" value="<?php if ($page == 'add_content'){ echo 'Ajouter';} else{ echo 'Modifier'; }; ?>" />

</form>