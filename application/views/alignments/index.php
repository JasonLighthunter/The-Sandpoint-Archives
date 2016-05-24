<div class="row">
<?php
  foreach ($alignments as $alignment) {
?>
    <div class="col-sm-4">
      <h3>
      <?php
        echo '<a href='.site_url('/alignments/'.$alignment['id']).'>'.$alignment['name'].'</a>'
      ?>
      </h3>
    </div>
<?php
  }
?>
</div>
