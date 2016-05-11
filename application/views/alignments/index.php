<?php
  foreach ($alignments as $alignment) {
    echo '<h3><a href="'.site_url().'/alignments/'.$alignment['id'].'">'.$alignment['name'].'</a></h3>';
  }
?>
