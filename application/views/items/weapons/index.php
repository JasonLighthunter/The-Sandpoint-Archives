<div class="row">
  <div class="col-xs-12">
    <?php
      require APPPATH.'helpers/buttonGenerator.php';
      require APPPATH.'helpers/messageGenerator.php';
      require APPPATH.'helpers/formGenerator.php';
      // create
      if($this->session->inAdminMode) {
        $inputData = array(
          'href'       => site_url('items/create'),
          'attributes' => array('class' => 'btn btn-default'),
          'text'       => 'New Weapon'
        );
        $iconData  = 'fa fa-plus fa-fw';
        generateButton($inputData, $iconData);
      }
    ?>
  </div>
</div>

<?php
  $attributes = array (
    'data-toggle' => 'validator',
    'role'        => 'form'
  );
  echo form_open('items/search', $attributes);

  echo '<div class="row">';
    echo '<div class="col-xs-6 col-lg-3">';

      //Name
      $inputData   = array (
        'type'        => 'text',
        'name'        => 'query',
        'id'          => 'query',
        'class'       => 'form-control',
        'maxlength'   => 50,
        'required'    => ''
      );
      //                      label  icondata inputdata
      generateFormGroupInput(FALSE, FAlSE,   $inputData);

    echo '</div>';

    echo '<div class="col-xs-6 col-lg-3">';
      $inputData = array (
        'name'  => 'submit',
        'class' => 'btn btn-default',
        'value' => 'Search'
      );
      echo form_submit($inputData);
    echo '</div>';
  echo '</div>';
  echo form_close();
?>

<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Desc</th>
      <th>Price (in gold pieces)</th>
      <th>Category</th>
      <th></th>
      <?php
        if($this->session->inAdminMode) {
          echo '<th></th>';
          echo '<th></th>';
        }
      ?>
    </tr>
    <?php foreach ($items as $weapon) { ?>
      <tr>
        <td>
          <?php
            echo '<img src='.base_url('assets/images/uploads/'.$weapon['image_name']).'>';
          ?>
        </td>
        <td>
          <?php
            echo anchor(
              $weapon['class_uri'].'/'.$weapon['id'],
              $weapon['name']
            );
          ?>
        </td>

        <td>
          <?php echo $weapon['desc_short']; ?>
        </td>

        <td>
          <?php echo $weapon['price_gold'].' Gold'; ?>
        </td>
        <!--webs-->
        <td>
          <?php
            if($weapon['category_id'] === NULL) {
              echo '-';
            } else {
              echo anchor(
                'categories/'.$weapon['category_id'],
                $weapon['category']
              );
            }
          ?>
        </td>
        <td>
          <?php
            echo anchor(
              site_url('shoppingBag/addI/'.$weapon['id']),
              'add to shopping bag',
              array('class' => 'btn btn-default')
            );
          ?>
        </td>
        <?php
          // delete
          if($this->session->inAdminMode) {
            echo '<td>';
              $inputData = array (
                'href'       => site_url('items/delete/'.$weapon['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-danger',
                  'title' => 'Delete this Category'
                )
              );
              $iconData  = 'fa fa-trash-o fa-fw';
              generateButton($inputData, $iconData);
            echo '</td>';
          }

          // edit
          if($this->session->inAdminMode) {
            echo '<td >';
              $inputData = array (
                'href'       => site_url('items/update/'.$weapon['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-default',
                  'title' => 'Edit this Category'
                )
              );
              $iconData  = 'fa fa-pencil fa-fw';
              generateButton($inputData, $iconData);
            echo '</td>';
          }
        ?>
        <!--webs-->
      </tr>
    <?php } ?>
  </table>
</div>