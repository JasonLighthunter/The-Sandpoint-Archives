<?php 
  if(isset($errorType)) {
    switch ($errorType) {
      case 'warning':
        echo '<div class="alert alert-warning" role="alert">';
        break;
      case 'danger':
      default:
        echo '<div class="alert alert-danger" role="alert">';
        break;
    }
    echo validation_errors().'</div>';
  }
?>
