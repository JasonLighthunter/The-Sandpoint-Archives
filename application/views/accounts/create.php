<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('accounts/create', $attributes);

  echo '<div class="row">';
    echo '<div class="col-md-3">';

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
  $hasErrorDiv = TRUE;
  $isRequired  = TRUE;
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-md-3">';

  //password
  $label         = 'Password';
  $hasIcon       = TRUE;
  $iconData      = array ('fa', 'fa-unlock-alt', 'fa-fw');
  $inputData     = array (
    'type'           => 'password',
    'name'           => 'password',
    'id'             => 'password',
    'class'          => 'form-control',
    'placeholder'    => 'Password',
    'value'          => set_value('password'),
    'maxlength'      => 72,
    'data-minlength' => 6,
    'required'       => ''
  );
  $hasErrorDiv   = TRUE;
  $isRequired    = TRUE;
  $helpBlockText = 'Minimum of 6 characters';
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv, $isRequired, $helpBlockText);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-3">';

  //password - confirm
  $label         = 'Password Confirmation';
  $hasIcon       = TRUE;
  $iconData      = array ('fa', 'fa-unlock-alt', 'fa-fw');
  $inputData     = array (
    'type'        => 'password',
    'name'        => 'password-confirm',
    'id'          => 'password-confirm',
    'class'       => 'form-control',
    'placeholder' => 'Repeat Password',
    'value'       => set_value('password-confirm'),
    'data-match'  => '#password',
    'required'    => ''
  );
  $hasErrorDiv   = TRUE;
  $isRequired    = TRUE;
  generateFormGroup($label, $hasIcon, $iconData, $inputData, $hasErrorDiv, $isRequired);

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