<?php
  if($this->session->inAdminMode) {
    $href = site_url('categories/create');
    echo '<a class="btn btn-default" href='.$href.' >';
      echo '<i class="fa fa-plus fa-fw" aria-hidden="true"></i>';
      echo 'New Category';
    echo '</a>';
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