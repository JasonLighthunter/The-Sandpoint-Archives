<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('accounts/create', $attributes);
?>

<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!--username-->
    <?php
      $label       = 'Username';
      $iconData    = 'fa fa-user fa-fw';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'username',
        'placeholder' => $label,
        'value'       => set_value('username'),
        'maxlength'   => 50
      );
      generateFormGroup($label, 'input', $iconData, $inputData, TRUE, TRUE);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!--password-->
    <?php
      $label         = 'Password';
      $iconData      = 'fa fa-unlock-alt fa-fw';
      $helpBlockText = 'Minimum of 6 characters';
      $inputData     = array (
        'type'           => 'password',
        'name'           => 'password',
        'placeholder'    => $label,
        'value'          => set_value('password'),
        'maxlength'      => 72,
        'data-minlength' => 6
      );
      generateFormGroup($label, 'password', $iconData, $inputData, TRUE, TRUE, $helpBlockText);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!--password-confirm-->
    <?php
      $label         = 'Password Confirmation';
      $iconData      = 'fa fa-unlock-alt fa-fw';
      $inputData     = array (
        'type'        => 'password',
        'name'        => 'password-confirm',
        'placeholder' => 'Repeat Password',
        'value'       => set_value('password-confirm'),
        'data-match'  => '#password'
      );
      generateFormGroupInput($label, 'password', $iconData, $inputData, TRUE, TRUE);
    ?>
  </div>
</div>
<!--submit button-->
<?php
  generateSubmitButton('Create Account');
  echo form_close();
?>