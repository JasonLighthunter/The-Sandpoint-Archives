<?php
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('login/submit/'.$formTarget, $attributes);

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

  //username
  $label       = 'Username';
  $hasErrorDiv = $isRequired = TRUE;
  $iconData    = 'fa fa-user fa-fw';
  $inputData   = array (
    'type'        => 'text',
    'name'        => 'username',
    'id'          => 'username',
    'class'       => 'form-control',
    'placeholder' => $label,
    'value'       => set_value('username'),
    'required'    => ''
  );
  generateFormGroup($label, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

  //password
  $label       = 'Password';
  $hasErrorDiv = $isRequired = TRUE;
  $iconData    = 'fa fa-unlock-alt fa-fw';
  $inputData   = array (
    'type'        => 'password',
    'name'        => 'password',
    'id'          => 'password',
    'class'       => 'form-control',
    'placeholder' => $label,
    'value'       => set_value('password'),
    'required'    => ''
  );
  generateFormGroup($label, $iconData, $inputData, $hasErrorDiv, $isRequired);

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