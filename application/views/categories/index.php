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