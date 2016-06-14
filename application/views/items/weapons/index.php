<div class="row">
  <div class="col-xs-12">
    <?php
      require APPPATH.'helpers/buttonGenerator.php';
      require APPPATH.'helpers/messageGenerator.php';
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
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Weapon Class</th>
      <th>Category</th>
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
          <?php echo $weapon['weapon_class']; ?>
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
        <td >
          <?php
            // delete
            if($this->session->inAdminMode) {
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
            }
          ?>
        </td>
        <td >
          <?php
            // edit
            if($this->session->inAdminMode) {
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
            }
          ?>
        </td>
        <!--webs-->
      </tr>
    <?php } ?>
  </table>
</div>