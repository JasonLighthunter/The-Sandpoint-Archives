<?php
  if(isset($messageType) && isset($message)) {
    switch ($messageType) {
      case 'info':
      case 'success':
      case 'warning':
      case 'danger':
        echo '<div class="alert alert-'.$messageType.'" role="alert">';
        break;
      default :
        echo '<div>';
        break;
    }
    echo $message.'</div>';
  }
?>
