<div class="row">
  <div class="col-xs-12">
    <?php
      require APPPATH.'helpers/buttonGenerator.php';
      require APPPATH.'helpers/messageGenerator.php';
      // create
      if($this->session->inAdminMode) {
        $inputData = array(
          'href'       => site_url('categories/create'),
          'attributes' => array('class' => 'btn btn-default'),
          'text'       => 'New Category'
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
      <?php
        if($this->session->inAdminMode) {
          echo '<th></th>';
          echo '<th></th>';
        }
      ?>
    </tr>
    <?php
      foreach ($categories as $item) {
        echo '<tr>';

          echo '<td>';
            echo '<img src='.base_url('assets/images/uploads/'.$item['image_name']).'>';
          echo '</td>';

          echo '<td>';
            //name
            echo anchor(
              'categories/'.$item['id'],
              $item['name']
            );
          echo '</td>';

          echo '<td>';
            // delete
            if($this->session->inAdminMode) {
              $inputData = array (
                'href'       => site_url('categories/delete/'.$item['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-danger',
                  'title' => 'Delete this Category'
                )
              );
              $iconData  = 'fa fa-trash-o fa-fw';
              generateButton($inputData, $iconData);
            }
          echo '</td>';

          echo '<td>';
            // edit
            if($this->session->inAdminMode) {
              $inputData = array (
                'href'       => site_url('categories/update/'.$item['id']),
                'text'       => '',
                'attributes' => array (
                  'class' => 'btn btn-default',
                  'title' => 'Edit this Category'
                )
              );
              $iconData  = 'fa fa-pencil fa-fw';
              generateButton($inputData, $iconData);
            }
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </table>
</div>
