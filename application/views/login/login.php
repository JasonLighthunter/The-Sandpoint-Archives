<?php
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('login/submit/'.$formTarget, $attributes);

  echo '<div class="row">';
    echo '<div class="col-md-4">';

  //username
  $label       = 'Username';
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
  $isRequired  = TRUE;
  $hasErrorDiv = TRUE;
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-md-4">';

  //password
  $label       = 'Password';
  $hasIcon     = TRUE;
  $iconData    = array ('fa', 'fa-unlock-alt', 'fa-fw');
  $inputData   = array (
    'type'        => 'password',
    'name'        => 'password',
    'id'          => 'password',
    'class'       => 'form-control',
    'placeholder' => 'Password',
    'value'       => set_value('password'),
    'required'    => ''
  );
  $hasErrorDiv = TRUE;
  $isRequired  = TRUE;
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  //submit button
  $inputData = array(
    'name'  => 'submit',
    'class' => 'btn btn-default',
    'value' => 'Log in'
  );
  echo form_submit($inputData);
  echo form_close();
?>