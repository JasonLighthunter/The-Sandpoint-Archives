<?php echo form_open('login/submit'); ?>

<!-- username -->
<div class="form-group">
  <?php echo form_label('Username', 'username'); ?>
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-user fa-fw"></i>
    </span>
    <!-- input -->
    <?php
      $inputData = array(
        'name'        => 'username',
        'id'          => 'username',
        'class'       => 'form-control',
        'placeholder' => 'Username'
      );
      echo form_input($inputData);
    ?>
  </div>  
</div>

<!-- password -->
<div class="form-group">
  <?php echo form_label('Password', 'password'); ?>
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-unlock-alt fa-fw"></i>
    </span>
    <!-- input -->
    <?php
      $inputData = array(
        'name'        => 'password',
        'id'          => 'password',
        'class'       => 'form-control'
      );
      echo form_input($inputData);
    ?>
  </div>
</div>

<!-- submit button -->
<?php 
  $inputData = array(
    'name'  => 'submit',
    'class' => 'btn btn-default',
    'value' => 'Log in'
  );
  echo form_submit($inputData);
  echo form_close($string);
?>