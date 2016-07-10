<?php
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('login/submit/'.$formTarget, $attributes);
?>
<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!-- username -->
    <?php
      $label       = 'Username';
      $iconData    = 'fa fa-user fa-fw';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'username',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => set_value('username'),
        'required'    => ''
      );
      generateFormGroupInput($label, $iconData, $inputData, TRUE, TRUE);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!-- password -->
    <?php
      $label       = 'Password';
      $iconData    = 'fa fa-unlock-alt fa-fw';
      $inputData   = array (
        'type'        => 'password',
        'name'        => 'password',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => set_value('password'),
        'required'    => ''
      );
      generateFormGroupInput($label, $iconData, $inputData, TRUE, TRUE);
    ?>
  </div>
</div>
<!-- submit -->
<?php
  generateSubmitButton('Log In');
  echo form_close();
?>