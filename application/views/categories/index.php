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
      <th>Name</th>
      <th></th>
      <th></th>
    </tr>
    <?php foreach ($categories as $item) { ?>
      <tr>
        <td >
          <?php
            //name
            echo anchor(
              'categories/'.$item['id'],
              $item['name']
            );
          ?>
        </td>
        <td >
          <?php
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
          ?>
        </td>
        <td >
          <?php
            // edit
            if($this->session->inAdminMode) {
              $inputData = array(
                'href'       => site_url('#'),
                'text'       => '',
                'attributes' => array(
                  'class' => 'btn btn-default',
                  'title' => 'Edit this Category'
                )
              );
              $iconData  = 'fa fa-pencil fa-fw';
              generateButton($inputData, $iconData);
            }
          ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>
