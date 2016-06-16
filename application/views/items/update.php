<?php
  require APPPATH.'helpers/messageGenerator.php';
  require APPPATH.'helpers/formGenerator.php';
  require APPPATH.'helpers/errorGenerator.php';

  $hidden     = array (
    'item_class'   => '5',
    'weapon_class' => '2'
  );
  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open_multipart('items/update/'.$item['id'], $attributes, $hidden);

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

    $inputData = array(
      'name' => 'newFile'
    );
    echo form_upload($inputData);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      //Name
      $label       = 'Name';
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'name',
        'id'          => 'name',
        'class'       => 'form-control',
        'placeholder' => $label,
        'maxlength'   => 50,
        'value'       => $item['name'],
        'required'    => ''
      );
      //                      label  icondata inputdata   hasErrorDiv isrequired
      generateFormGroupInput($label, FAlSE,   $inputData, TRUE,       TRUE);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      $label       = 'Description';
      $inputData   = array (
        'type'        => 'textarea',
        'name'        => 'desc',
        'id'          => 'desc',
        'class'       => 'form-control',
        'placeholder' => $label,
        'maxlength'   => 5000,
        'value'       => $item['description'],
        'required'    => ''
      );
      //                      label  icondata inputdata   hasErrorDiv isrequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      //Category
      $label       = 'Category';
      $name        = 'category_id';

      $attributes  = array (
        'id'       => 'category_id',
        'required' => '',
        'class'    => 'form-control'
      );

      if(!empty($possibleCategories)){
        $options = $possibleCategories;
      } else {
        $options = FALSE;
      }

      if($item['category_id'] !== NULL) {
        generateFormGroupSelect($label, $name, $attributes, $options, TRUE, '', $item['category_id']);
      } else {
        generateFormGroupSelect($label, $name, $attributes, $options, TRUE);
      }

    echo '</div>';
  echo '</div>';

  echo '<div class="row">';
    echo '<div class="col-sm-6 col-lg-4">';

      $label       = 'Price';
      $inputData   = array (
        'type'        => 'number',
        'name'        => 'price',
        'id'          => 'price',
        'class'       => 'form-control',
        'placeholder' => $label,
        'maxlength'   => 8,
        'value'       => $item['price_gold'],
        'step'        => 0.01,
        'min'         => 0.00,
        'max'         => 999999.99,
        'required'    => ''
      );
      //                      label  icondata inputdata   hasErrorDiv isrequired
      generateFormGroupInput($label, FALSE,   $inputData, TRUE,       TRUE);

    echo '</div>';
  echo '</div>';
  //submit button
  $inputData = array (
    'name'  => 'submit',
    'class' => 'submit-btn btn btn-default',
    'value' => 'Edit Weapon'
  );
  echo form_submit($inputData);
  echo form_close();
?>