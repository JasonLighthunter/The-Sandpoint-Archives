<div class="row">
  <?php foreach ($alignments as $alignment) { ?>
    <div class="col-sm-4">
      <?php
        $anchor = anchor(
          'alignment/'.$alignment['id'],
          $alignment['name']
        );
        echo heading($anchor, 3);
      ?>
    </div>
  <?php } ?>
</div>
