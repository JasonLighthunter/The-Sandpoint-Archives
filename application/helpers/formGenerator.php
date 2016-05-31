<?php
  function generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrDiv = FALSE, $isReq = FALSE, $helpBlockText = '') {
    echo '<div class="form-group">';
      echo form_label($label, $inputData['id']);
      if ($hasIcon || $isReq ) {
        echo '<div class="input-group">';
        if($hasIcon) {
          echo '<span class="input-group-addon">';
            echo '<i  class="';
            foreach ($iconData as $i) {
              echo $i.' ';
            }
            echo '"></i>';
          echo '</span>';
        }
        echo form_input($inputData);
        if($isReq) {
          echo '<span class="input-group-addon">';
            echo '<i  class="fa fa-asterisk fa-fw"></i>';
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