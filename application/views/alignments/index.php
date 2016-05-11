<?php
  foreach ($alignments as $alignment) {
    echo '<h3><a href"'.base_url().'alignments/'.$alignment['id'].'">'.$alignment['name'].'</a></h3>';
  }
?>
