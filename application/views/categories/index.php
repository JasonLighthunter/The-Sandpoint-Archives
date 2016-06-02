<?php
  require APPPATH.'helpers/buttonGenerator.php';

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
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($categories as $item) { ?>
      <tr>
        <td>
          <?php
            echo anchor(
              'categories/'.$item['id'],
              $item['name']
            );
          ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>