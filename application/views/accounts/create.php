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
      generateFormGroupInput($label, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      //password
      $label         = 'Password';
      $hasErrorDiv   = $isRequired = TRUE;
      $iconData      = 'fa fa-unlock-alt fa-fw';
      $inputData     = array (
        'type'           => 'password',
        'name'           => 'password',
        'id'             => 'password',
        'class'          => 'form-control',
        'placeholder'    => $label,
        'value'          => set_value('password'),
        'maxlength'      => 72,
        'data-minlength' => 6,
        'required'       => ''
      );
      $helpBlockText = 'Minimum of 6 characters';
      generateFormGroupInput($label, $iconData, $inputData, $hasErrorDiv, $isRequired, $helpBlockText);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      //password - confirm
      $label         = 'Password Confirmation';
      $hasErrorDiv   = $isRequired = TRUE;
      $iconData      = 'fa fa-unlock-alt fa-fw';
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
      generateFormGroupInput($label, $iconData, $inputData, $hasErrorDiv, $isRequired);

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