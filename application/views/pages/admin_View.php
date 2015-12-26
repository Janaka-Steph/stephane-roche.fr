<div id="admin-container">
    <div class="row">
        <h1 class="small-10 column text-center">Gestion du blog</h1>
        <div class="small-2 column text-right"><?php echo anchor('auth/logout', '<i class="fi fi-power"></i>'); ?></div>
    </div>

    <?php if (!isset($articles)) { ?>
        <p>Il n'y a pas d'articles sur ce blog ou bien il y a un problème quelque part. Sorry !</p>
    <?php } else { ?>
    
    	<div><?php echo anchor('admin/addEditNew', '<i class="fi fi-plus"></i>'); ?></div>

        <?php if ($articles->num_rows() > 0): ?>
            <div class="marginTop30">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Rubrique</th>
                        <th>Slug</th>
                        <th>Date</th>
                        <th>MAJ</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($articles->result() as $row): ?>
                        <tr>
                            <td><?php echo $row->art_id; ?></td>
                            <td><?php echo $row->art_title; ?></td>
                            <td><?php echo character_limiter($row->art_content, 64); ?></td>
                            <td><?php
                                if ($row->rub_id == 1) {
                                    echo "Javascript";
                                } else if ($row->rub_id == 2) {
                                    echo "Crypto-monnaies";
                                } else if ($row->rub_id == 3) {
                                    echo "Outils";
                                }
                                ?>
                            </td>
                            <td><?php echo $row->art_url_rw; ?></td>
                            <td><?php echo date("d/m/Y à H:i:s", strtotime($row->art_date)); ?></td>
                            <td><?php echo date("d/m/Y à H:i:s", strtotime($row->art_datemodif)); ?></td>
                            <td><a href="<?php echo base_url('admin/edit/' . $row->art_id); ?>" title="Modifier"><i class="fi-pencil"></i></a></td>
                            <td><a href="<?php echo base_url('admin/delete/' . $row->art_id); ?>" title="Supprimer"><i class="fi-trash"></i></a></td>
                        </tr>
            <?php endforeach; ?>
                </table>
            </div>

    <?php else: ?>
            <p>Aucun article n'est disponible pour le moment</p>
    <?php endif; ?>

<?php } ?>
	
	<div class="line2">&nbsp;</div>
    <div class="marginTop50"><?php echo anchor('auth/create_user', 'Créer un utilisateur'); ?></div>
</div>