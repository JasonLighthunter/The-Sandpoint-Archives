<?php 
  function generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv) {
    echo '<div class="form-group">';
      echo form_label($label, $inputData['id']);
      if ($hasIcon) {
        echo '<div class="input-group">';
          echo '<span class="input-group-addon">';
            echo '<i  class="';
            foreach ($iconData as $i) {
              echo $i.' ';
            }
            echo '"></i>';

          echo '</span>';
          echo form_input($inputData);
        echo '</div>';
      } else {
        echo form_input($inputData);
      }
      if ($hasErrorDiv) {
        echo '<div class="help-block with-errors"></div>';
      }
    echo '</div>';
  }
?>