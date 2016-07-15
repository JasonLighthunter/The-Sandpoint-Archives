<?php
  function generateFormGroup($label, $inputType, $iconData = FALSE, $inputData, $hasErrDiv = FALSE, $isReq = FALSE, $helpBlockText = '') {

    echo '<div class="form-group">';
    if($label !== FALSE) {
      echo form_label($label);
    }
    if ($iconData !== FALSE || $isReq ) {
      echo '<div class="input-group">';
      if($iconData !== FALSE) {
        echo '<span class="input-group-addon">';
          echo '<i class="'.$iconData.'" aria-hidden="true"></i>';
        echo '</span>';
      }
      $data = array('class' => "form-control");
      foreach ($inputData as $key => $value) {
        $data[$key] = $value;
      }
      if($isReq) {
        $data['required'] = '';
      }
      getCorrectForm($inputType, $data);
      if($isReq) {
        echo '<span class="input-group-addon">';
          echo '<i class="fa fa-asterisk fa-fw" aria-hidden="true"></i>';
        echo '</span>';
      }
      echo '</div>';
    } else {
      getCorrectForm($inputType, $inputData);
    }
    if ($hasErrDiv) {
      echo '<div class="help-block with-errors">'.$helpBlockText.'</div>';
    }
    echo '</div>';
  }

  function getCorrectForm($inputType, $data) {
    switch ($inputType) {
      case 'textArea':
        echo form_textarea($data);
        return;
      case 'password':
        echo form_password($data);
        return;
      case 'input':
      default:
        echo form_input($data);
        return;
    }
  }

  function generateSubmitButton($value = '') {
    $inputData = array(
      'name'  => 'submit',
      'class' => 'btn btn-default',
      'value' => $value
    );
    echo form_submit($inputData);
  }
?>