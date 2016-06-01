<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );

  echo form_open('categories/create', $attributes);

  echo '<div class="row">';
    echo '<div class="col-sm-3">';

  //name
  $label         = 'Name';
  $hasIcon       = FALSE;
  $inputData     = array (
    'type'        => 'text',
    'name'        => 'name',
    'id'          => 'name',
    'class'       => 'form-control',
    'placeholder' => 'Name',
    'value'       => set_value('name'),
    'required'    => ''
  );
  $hasErrorDiv   = TRUE;
  $isRequired    = TRUE;
  generateFormGroup($label, $hasIcon, FALSE, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  //submit button
  $inputData = array(
    'name'  => 'submit',
    'class' => 'btn btn-default',
    'value' => 'Create Category'
  );
  echo form_submit($inputData);
  echo form_close();
?>