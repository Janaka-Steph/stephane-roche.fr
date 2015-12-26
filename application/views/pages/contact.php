<div id="contact-container">

    <div class="row" id="contact-coordonees">
        <p>
            <span class="block"><strong>Roche Stéphane</strong></span>
            <span class="block">63 avenue des linas 77181 COURTRY</span>
            <span class="block">06 67 29 20 11</span>
            <span class="block">webdev@stephane-roche.fr</span>
            <span class="block">N° Siret : 795 207 117 00016</span>
        </p>
    </div>


    <?php echo validation_errors(); ?>

    <?php echo form_open('contact', "data-abide"); ?>
    <!--<form data-abide action="contact" method="POST">-->

    <div class="row">
        <p>Vous pouvez m'envoyer un mail directement via ce formulaire de contact</p>

        <div>
            <label for="contact-nom">Nom *
                <input type="text" name="nom" value="<?php echo set_value('nom'); ?>" id="contact-nom" required />
            </label>
            <small class="error">Le champ "nom" est vide</small>
        </div>


        <div>
            <label for="contact-email">Email *
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="contact-email" required />
            </label>
            <small class="error">L'adresse mail n'est pas valide</small>
        </div>

        <div>
            <label for="contact-tel">Téléphone
                <input type="text" name="telephone" value="<?php echo set_value('telephone'); ?>" id="contact-tel" />
            </label>
            <small class="error">Le numéro de téléphone n'est pas valide</small>
        </div>

        <div> 
            <label for="contact-message">Votre message *
                <textarea rows="6" name="message" id="contact-message" required><?php echo set_value('message'); ?></textarea>
            </label>
            <small class="error">Le champ "message" est vide</small>
        </div>

        <input type="submit" value="Valider" class="button radius right" />

    </div>
</form>

</div>
