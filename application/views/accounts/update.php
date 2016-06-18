<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $hidden     = array ('id' => $account['id']);
  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('accounts/update/'.$account['id'], $attributes, $hidden);
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
        'id'          => 'username',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['username'],
        'maxlength'   => 50,
        'required'    => ''
      );
      //                     label,  iconData,  inputdata,  hasErrorDiv isRequired
      generateFormGroupInput($label, $iconData, $inputData, TRUE,       TRUE);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!-- first-name -->
    <?php
      $label       = 'First Name';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'first-name',
        'id'          => 'first-name',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['first_name'],
        'maxlength'   => 50,
        'required'    => ''
      );
      //                     label,  iconData inputdata,  hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-lg-4">
    <!-- last-name -->
    <?php
      $label       = 'Last Name';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'last-name',
        'id'          => 'last-name',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['last_name'],
        'maxlength'   => 50,
        'required'    => ''
      );
      //                     label,  iconData inputdata,  hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-3 col-lg-2">
    <!-- street -->
    <?php
      $label       = 'Street';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'street',
        'id'          => 'street',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['street'],
        'maxlength'   => 50,
        'required'    => ''
      );
      //                     label,  iconData inputdata   hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
  <div class="col-sm-2 col-lg-1">
    <!-- number -->
    <?php
      $label       = 'House Number';
      $inputData   = array (
        'type'        => 'number',
        'name'        => 'number',
        'id'          => 'number',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['number'],
        'min'         => 0,
        'data-error'  => 'invalid value',
        'max'         => 9999,
        'required'    => ''
      );
      //                     label,  iconData inputdata   hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
  <div class="col-sm-1 col-lg-1">
    <!-- extra-info -->
    <?php
      $label       = 'Addition';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'extra-info',
        'id'          => 'extra-info',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['extra_info'],
        'maxlength'   => 50,
      );
      //                     label   iconData inputdata
      generateFormGroupInput($label, FALSE,   $inputData);
    ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-3 col-lg-2">
    <!-- city -->
    <?php
      $label       = 'City';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'city',
        'id'          => 'city',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => $account['city'],
        'maxlength'   => 50,
        'required'    => ''
      );
      //                     label,  iconData inputdata   hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
  <div class="col-sm-3 col-lg-2">
    <!-- postal-code -->
    <?php
      $label       = 'Postal Code';
      $inputData   = array (
        'type'           => 'text',
        'name'           => 'postal-code',
        'id'             => 'postal-code',
        'class'          => 'form-control',
        'placeholder'    => 'ex: 1234 AB',
        'value'          => $account['postal_code'],
        'maxlength'      => 7,
        'data-minlength' => 7,
        'data-error'     => 'postal code does not match the pattern (4 numbers, a space, 2 capitals) eg: 1234 AB',
        'pattern'        => '^\d{4} [A-Z]{2}$',
        'required'       => ''
      );
      //                     label,  iconData inputdata   hasErrorDiv isRequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);
    ?>
  </div>
</div>
<!--submit button-->
<?php
  $inputData = array(
    'name'  => 'submit',
    'class' => 'btn btn-default',
    'value' => 'Edit Account'
  );
  echo form_submit($inputData);
  echo form_close();
?>