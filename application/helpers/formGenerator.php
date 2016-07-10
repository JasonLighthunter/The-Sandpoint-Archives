<?php
  function generateFormGroupInput($label, $iconData = FALSE, $inputData, $hasErrDiv = FALSE, $isReq = FALSE, $helpBlockText = '') {
    include APPPATH.'helpers/formGenIncludes/formGroupBegin.php';
      if ($iconData !== FALSE || $isReq ) {
        echo '<div class="input-group">';
        include APPPATH.'helpers/formGenIncludes/infoIcon.php';
        include APPPATH.'helpers/formGenIncludes/formDataPreparation.php';
        echo form_input($data);
        include APPPATH.'helpers/formGenIncludes/requiredIcon.php';
        echo '</div>';
      } else {
        echo form_input($inputData);
      }
      include APPPATH.'helpers/formGenIncludes/errorDiv.php';
    include APPPATH.'helpers/formGenIncludes/formGroupEnd.php';
  }

  function generateFormGroupTextArea($label, $iconData = FALSE, $inputData, $hasErrDiv = FALSE, $isReq = FALSE, $helpBlockText = '') {
    include APPPATH.'helpers/formGenIncludes/formGroupBegin.php';
      if ($iconData !== FALSE || $isReq ) {
        echo '<div class="input-group">';
        include APPPATH.'helpers/formGenIncludes/infoIcon.php';
        include APPPATH.'helpers/formGenIncludes/formDataPreparation.php';
        echo form_textarea($data);
        include APPPATH.'helpers/formGenIncludes/requiredIcon.php';
        echo '</div>';
      } else {
        echo form_textarea($inputData);
      }
      include APPPATH.'helpers/formGenIncludes/errorDiv.php';
    include APPPATH.'helpers/formGenIncludes/formGroupEnd.php';
  }

  function generateFormGroupSelect($label, $name, $attributes, $options, $hasErrDiv = FALSE, $helpBlockText = '', $selectedOption = 0) {
    include APPPATH.'helpers/formGenIncludes/formGroupBegin.php';
      if ($options === FALSE) {
        $options = array(0 => 'No Category Possible');
        echo form_dropdown(
          $name,
          $options,
          $selectedOption
        );
      } else {
        echo form_dropdown(
          $name,
          $options,
          $selectedOption,
          $attributes
        );
      }
      include APPPATH.'helpers/formGenIncludes/errorDiv.php';
    include APPPATH.'helpers/formGenIncludes/formGroupEnd.php';
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