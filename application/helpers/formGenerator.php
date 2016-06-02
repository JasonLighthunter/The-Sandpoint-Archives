<?php
  function generateFormGroup($label, $iconData = FALSE, $inputData, $hasErrDiv = FALSE, $isReq = FALSE, $helpBlockText = '') {
    echo '<div class="form-group">';
      echo form_label($label, $inputData['id']);
      if ($iconData !== FALSE || $isReq ) {
        echo '<div class="input-group">';
        if($iconData !== FALSE) {
          echo '<span class="input-group-addon">';
            echo '<i class="'.$iconData.'" aria-hidden="true"></i>';
          echo '</span>';
        }
        echo form_input($inputData);
        if($isReq) {
          echo '<span class="input-group-addon">';
            echo '<i class="fa fa-asterisk fa-fw" aria-hidden="true"></i>';
          echo '</span>';
        }
        echo '</div>';
      } else {
        echo form_input($inputData);
      }
      if ($hasErrDiv) {
        echo '<div class="help-block with-errors">'.$helpBlockText.'</div>';
      }
    echo '</div>';
  }
?>