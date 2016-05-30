<?php
  if(!empty(validation_errors())) {
    echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
  }
?>
