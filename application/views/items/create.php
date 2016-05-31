<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('items/create', $attributes);

  echo '<div class="row">';
    echo '<div class="col-sm-3">';

  //username
  $label       = 'Name';
  $hasIcon     = TRUE;
  $iconData    = array ('fa','fa-user','fa-fw');
  $inputData   = array (
    'type'        => 'text',
    'name'        => 'username',
    'id'          => 'username',
    'class'       => 'form-control',
    'placeholder' => 'Username',
    'value'       => set_value('username'),
    'required'    => ''
  );
  $hasErrorDiv = TRUE;
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv);

    echo '</div>';
  echo '</div>';

  //submit button
  $inputData = array(
    'name'  => 'submit',
    'class' => 'btn btn-default',
    'value' => 'Create Account'
  );
  echo form_submit($inputData);
  echo form_close();
?>