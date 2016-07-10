<div class="row">
  <?php foreach ($alignments as $alignment) { ?>
    <div class="col-sm-4">
      <?php
        $href   = site_url('alignments/'.$alignment['id']);
        $anchor = anchor($href, $alignment['name']);
        echo heading($anchor, 3);
      ?>
    </div>
  <?php } ?>
</div>
