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
    echo '<div class="col-sm-6 col-lg-4">';

    //parent Category
    $label       = 'Parent Category';
    $hasErrorDiv = TRUE;
    $name        = 'parent';

    $attributes  = array (
      'id'       => 'parent',
      'required' => '',
      'class'    => 'form-control'
    );

    if(!empty($possibleParents)){
      $options = $possibleParents;
    } else {
      $options = FALSE;
    }

    generateFormGroupSelect($label, $name, $attributes, $options, $hasErrorDiv);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      //name
      $label         = 'Name';
      $iconData      = FALSE;
      $inputData     = array (
        'type'        => 'text',
        'name'        => 'name',
        'id'          => 'name',
        'class'       => 'form-control',
        'placeholder' => $label,
        'value'       => set_value('name'),
        'required'    => ''
      );
      $hasErrorDiv   = $isRequired = TRUE;

      generateFormGroupInput($label, $iconData, $inputData, $hasErrorDiv, $isRequired);

    echo '</div>';
  echo '</div>';

  //submit button
  $inputData = array(
    'name'  => 'submit',
    'class' => 'submit-btn btn btn-default',
    'value' => 'Create Category'
  );
  echo form_submit($inputData);
  echo form_close();
?>