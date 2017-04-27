<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Envoyer un message</h2>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-2" for="sujet">Sujet:</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="sujet" placeholder="Entrez le sujet">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="destinataire">Destinataire:</label>
      <div class="col-sm-10">
          <?php
          if ($user != null) {
              ?><input type="text" class="form-control" id="destinataire" value='<?php echo $user->getPseudo();?>' disabled=""><?php
          } else {
              ?><input type="text" class="form-control" id="destinataire" placeholder="Entrez le destinataire"><?php
          }
          ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="corps">Corps:</label>
      <div class="col-sm-10">
          <textarea class="form-control" rows="5" id="corps" placeholder="Entrez le corps de votre message"></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</section>


<?php
include('v_footer.php');